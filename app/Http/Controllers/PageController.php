<?php

namespace App\Http\Controllers;

use App\Custom\ClientIp;
use App\Custom\ClientLocation;
use App\Custom\ClientTemperature;

class PageController extends Controller
{
    public function about()
    {
        $keywords = ['PHP', 'Laravel', 'Blade', 'Eloquent', 'PostgreSQL', 'Breeze', 'Tailwind CSS'];

        $ip = new ClientIp();
        $clientIp = $ip->getIp();
        $location = new ClientLocation();
        $clientLocation = $location->getLocation($clientIp);
        if ($clientLocation) {
            [, , , $locationCity] = $clientLocation;
            $temperature = new ClientTemperature();
            $locationTemperature = "{$temperature->getTemperature($clientLocation)}°C";
        } else {
            $locationCity = null;
            $locationTemperature = null;
        }

        return view('page.about', [
            'tags' => $keywords,
            'clientIp' => $clientIp,
            'clientLocation' => $locationCity,
            'locationTemperature' => $locationTemperature,
        ]);
    }
}
