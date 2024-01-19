<?php

namespace App\Service\Location;

use App\Utils\Http;
use Exception;

class IpService
{
    /**
     * @throws Exception
     */
    public static function getIp()
    {
        if($_ENV['APP_ENV'] === 'prod'){
            return $_SERVER['REMOTE_ADDR'];
        }
        return Http::get($_ENV['GETIP_URL'])['ip'];
    }
}