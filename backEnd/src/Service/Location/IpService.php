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
        return Http::get($_ENV['GETIP_URL'])['ip'];
    }
}