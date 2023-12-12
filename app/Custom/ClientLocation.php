<?php

namespace App\Custom;

class ClientLocation
{
    private function findLocation(string $ip)
    {
        $locationUrl = "http://ip-api.com/json/{$ip}?lang=ru";
        $contentLocationJson = file_get_contents($locationUrl);
        $contentLocationArray = json_decode($contentLocationJson, true);
        if ($contentLocationArray['status'] === 'success') {
            $locationCity = $contentLocationArray['city'];
            $locationLat = $contentLocationArray['lat'];
            $locationLon = $contentLocationArray['lon'];
            $locationTimezone = $contentLocationArray['timezone'];
        } else {
            return null;
        }
        return [$locationLat, $locationLon, $locationTimezone, $locationCity];
    }

    public function getLocation(string $ip)
    {
        return $this->findLocation($ip);
    }
}
