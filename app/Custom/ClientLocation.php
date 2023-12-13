<?php

namespace App\Custom;

class ClientLocation
{
    private function findLocation(string $ip)
    {
        $locationUrl = "http://ip-api.com/json/{$ip}?lang=ru";
        $ch = curl_init($locationUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 2);
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        $json = curl_exec($ch);
        curl_close($ch);
        if (!$json) {
            return null;
        }
        $contentLocationArray = json_decode($json, true);
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
