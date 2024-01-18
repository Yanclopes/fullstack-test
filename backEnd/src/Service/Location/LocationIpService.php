<?php

namespace App\Service\Location;

use App\Utils\Http;
use Exception;

class LocationIpService
{
    private string $baseUrl;

    public function __construct()
    {
        $this->baseUrl = $_ENV['IP_BASEURL'];
    }

    /**
     * @throws Exception
     */
    public function getCityByIp($ip)
    {
        return Http::get($this->baseUrl.'/'.$ip);
    }
}