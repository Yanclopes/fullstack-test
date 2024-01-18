<?php

namespace App\Controller;

use App\Response\JsonResponse;
use App\Service\Location\LocationIpService;
use App\Service\Weather\WeatherService;

class WeatherByIpController
{
    public function getWeatherByIp()
    {
        $location = new LocationIpService();
        $weather = new WeatherService();
        JsonResponse::Response($weather->getWeatherfromAPI($location->getCityByIp($_GET['ip'])['city']));
    }
}