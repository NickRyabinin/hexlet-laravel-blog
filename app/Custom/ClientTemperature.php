<?php

namespace App\Custom;

class ClientTemperature
{
    private function findTemperature(array $location)
    {
        [$locationLat, $locationLon, $locationTimezone] = $location;
        $locationTemperatureUrl = "https://api.open-meteo.com/v1/forecast?latitude={$locationLat}" .
            "&longitude={$locationLon}&current=temperature_2m&timezone={$locationTimezone}";
        $locationTemperatureJson = file_get_contents($locationTemperatureUrl);
        $locationTemperatureArray = json_decode($locationTemperatureJson, true);
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
