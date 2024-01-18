<?php

namespace App\Controller;

use App\Response\JsonResponse;
use App\Service\Location\IpService;
use App\Service\Location\LocationIpService;
use App\Service\Weather\WeatherService;
use Exception;

class WeatherByIpController
{
    /**
     * @throws Exception
     */
    public function getWeatherByIp()
    {
        $location = new LocationIpService();
        $weather = new WeatherService();
        JsonResponse::Response($weather->getWeatherfromAPI($location->getCityByIp(IpService::getIp())['city']));
    }
}