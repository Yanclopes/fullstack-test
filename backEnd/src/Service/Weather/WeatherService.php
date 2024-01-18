<?php

namespace App\Service\Weather;

use App\Utils\Http;
use Exception;

class WeatherService
{
    private string $baseUrl;
    private string $apiKey;

    public function __construct()
    {
        $this->baseUrl = $_ENV['WEATHER_BASEURL'];
        $this->apiKey = $_ENV['WEATHER_KEY'];
    }

    /**
     * @throws Exception
     */
    public function getWeatherfromAPI($city)
    {
        $location = $this->getLocationFromAPI($city)[0];
        return Http::get($this->baseUrl.'/data/2.5/weather?lat='.$location['lat'].'&lon='.$location['lon'].'&appid='.$this->apiKey.'&units=metric');
    }

    /**
     * @throws Exception
     */
    private function getLocationFromAPI($city)
    {
        return Http::get($this->baseUrl.'/geo/1.0/direct?q='.urlencode($city).'&appid='.$this->apiKey);
    }
}
