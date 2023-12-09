<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function about(Request $request)
    {
        $keywords = ['PHP', 'Laravel', 'Blade', 'Eloquent', 'PostgreSQL', 'Breeze', 'Tailwind CSS'];
        $list = [];
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            echo 'HTTP_CLIENT_IP';
            echo "\n";
            var_dump($_SERVER['HTTP_CLIENT_IP']);
            echo "\n";
            $ip = explode(',', $_SERVER['HTTP_CLIENT_IP']);
            $list = array_merge($list, $ip);
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            echo 'HTTP_X_FORWARDED_FOR';
            echo "\n";
            var_dump($_SERVER['HTTP_X_FORWARDED_FOR']);
            echo "\n";
            $ip = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
            $list = array_merge($list, $ip);
        } elseif (!empty($_SERVER['REMOTE_ADDR'])) {
            echo 'REMOTE_ADDR';
            echo "\n";
            var_dump($_SERVER['REMOTE_ADDR']);
            $list[] = $_SERVER['REMOTE_ADDR'];
        }
        $list = array_unique($list);
        $ipList = implode(',', $list);
        $clientIp = $list[0];
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
        $temperatureUrl = "https://api.open-meteo.com/v1/forecast?latitude=54.625&longitude=43.875" .
            '&current=temperature_2m,relative_humidity_2m,apparent_temperature,is_day,precipitation,rain,' .
            'showers,snowfall,weather_code,cloud_cover,pressure_msl,surface_pressure,wind_speed_10m,' .
            'wind_direction_10m,wind_gusts_10m&daily=sunrise,sunset&timezone=Europe%2FMoscow&forecast_days=1';
        $contentTemperatureJson = file_get_contents($temperatureUrl);
        $contentTemperatureArray = json_decode($contentTemperatureJson, true);
        $currentTemperature = $contentTemperatureArray['current']['temperature_2m'];
        return view('page.about', [
            'tags' => $keywords,
            'currentTemperature' => $currentTemperature,
            'locationTemperature' => $locationTemperature,
            'clientIp' => $clientIp,
            'ipList' => $ipList,
            'location' => $locationCity,
        ]);
    }
}
