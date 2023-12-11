<?php

namespace App\Http\Controllers;

use App\Custom\ClientIp;

class PageController extends Controller
{
    public function about()
    {
        $keywords = ['PHP', 'Laravel', 'Blade', 'Eloquent', 'PostgreSQL', 'Breeze', 'Tailwind CSS'];
        $ip = new ClientIp();
        $clientIp = $ip->getIp();
        $locationUrl = "http://ip-api.com/json/{$clientIp}?lang=ru";
        $contentLocationJson = file_get_contents($locationUrl);
        $contentLocationArray = json_decode($contentLocationJson, true);
        if ($contentLocationArray['status'] === 'success') {
            $locationCity = $contentLocationArray['city'];
            $locationLat = $contentLocationArray['lat'];
            $locationLon = $contentLocationArray['lon'];
            $locationTimezone = $contentLocationArray['timezone'];
            $locationTemperatureUrl = "https://api.open-meteo.com/v1/forecast?latitude={$locationLat}" .
                "&longitude={$locationLon}&current=temperature_2m&timezone={$locationTimezone}";
            $locationTemperatureJson = file_get_contents($locationTemperatureUrl);
            $locationTemperatureArray = json_decode($locationTemperatureJson, true);
            $locationTemperature = $locationTemperatureArray['current']['temperature_2m'];
        } else {
            $locationCity = 'не удалось определить';
            $locationTemperature = 'не удалось определить';
        }
        return view('page.about', [
            'tags' => $keywords,
            'locationTemperature' => $locationTemperature,
            'clientIp' => $clientIp,
            'location' => $locationCity,
        ]);
    }
}
