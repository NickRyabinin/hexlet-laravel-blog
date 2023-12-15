<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use App\Custom\ClientIp;
use App\Custom\ClientLocation;
use App\Custom\ClientTemperature;

class LocationWidget extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
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

        return view('widgets.location_widget', [
            'config' => $this->config,
            'clientIp' => $clientIp,
            'clientLocation' => $locationCity,
            'locationTemperature' => $locationTemperature,
        ]);
    }
}
