<?php

$routes = [
    '/states' => 'StateController@getStates',
    '/cities/{id}' => 'CityController@getCities',

    '/ip/weather' => 'WeatherByIpController@getWeatherByIp',
    '/weather/{id}' => 'WeatherController@getWeather',
];
