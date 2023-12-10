<?php

namespace App\Http\Controllers;

class PageController extends Controller
{
    public function about()
    {
        $keywords = ['PHP', 'Laravel', 'Blade', 'Eloquent', 'PostgreSQL', 'Breeze', 'Tailwind CSS'];
        $listOfIps = [];
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = explode(',', $_SERVER['HTTP_CLIENT_IP']);
            $listOfIps = array_merge($listOfIps, $ip);
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
            $listOfIps = array_merge($listOfIps, $ip);
        } elseif (!empty($_SERVER['REMOTE_ADDR'])) {
            $listOfIps[] = $_SERVER['REMOTE_ADDR'];
        }
        $listOfIps = array_unique($listOfIps);
        $ipList = implode(',', $listOfIps);
        $clientIp = $listOfIps[0] ?? '';
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
            'ipList' => $ipList,
            'location' => $locationCity,
        ]);
    }
}
