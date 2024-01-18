<?php

namespace App\Controller;

use App\Response\JsonResponse;
use App\Service\Weather\WeatherService;

class WeatherController
{
    /**
     * @throws Exception
     */
    public function getWeather()
    {
        $weather = new WeatherService();
        JsonResponse::Response($weather->getWeatherfromAPI($_GET['city']));
    }
}