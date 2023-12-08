<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function about(Request $request)
    {
        $keywords = ['PHP', 'Laravel', 'Blade', 'Eloquent', 'PostgreSQL', 'Breeze', 'Tailwind CSS'];
        $clientIp = $request->getClientIp();
        $locationUrl = "http://ip-api.com/json/{$clientIp}?lang=ru";
        $contentLocationJson = file_get_contents($locationUrl);
        $contentLocationArray = json_decode($contentLocationJson, true);
        $locationCity = $contentLocationArray['status'] === 'success'
            ? $contentLocationArray['city']
            : 'не удалось определить';
        $temperatureUrl = 'https://api.open-meteo.com/v1/forecast?latitude=54.625&longitude=43.875' .
        '&current=temperature_2m,relative_humidity_2m,apparent_temperature,is_day,precipitation,rain,' .
        'showers,snowfall,weather_code,cloud_cover,pressure_msl,surface_pressure,wind_speed_10m,wind_direction_10m,' .
        'wind_gusts_10m&daily=sunrise,sunset&timezone=Europe%2FMoscow&forecast_days=1';
        $contentTemperatureJson = file_get_contents($temperatureUrl);
        $contentTemperatureArray = json_decode($contentTemperatureJson, true);
        $currentTemperature = $contentTemperatureArray['current']['temperature_2m'];
        return view('page.about', [
                'tags' => $keywords,
                'currentTemperature' => $currentTemperature,
                'clientIp' => $clientIp,
                'location' => $locationCity,
            ]);
    }
}
