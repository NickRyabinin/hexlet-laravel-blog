<?php

namespace App\Custom;

class ClientIp
{
    private function findIp()
    {
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
        return $listOfIps[0] ?? '';
    }

    public function getIp()
    {
        return $this->findIp();
    }
}
