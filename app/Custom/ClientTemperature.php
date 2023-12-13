<?php

namespace App\Custom;

class ClientTemperature
{
    private function findTemperature(array $location)
    {
        [$locationLat, $locationLon, $locationTimezone] = $location;
        $locationTemperatureUrl = "https://api.open-meteo.com/v1/forecast?latitude={$locationLat}" .
            "&longitude={$locationLon}&current=temperature_2m&timezone={$locationTimezone}";
        $ch = curl_init($locationTemperatureUrl);
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
        $locationTemperatureArray = json_decode($json, true);
        if (array_key_exists('error', $locationTemperatureArray)) {
            return null;
        }
        return $locationTemperatureArray['current']['temperature_2m'];
    }

    public function getTemperature(array $location)
    {
        return $this->findTemperature($location);
    }
}
