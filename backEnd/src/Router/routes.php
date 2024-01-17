<?php

$routes = [
    '/states' => 'StateController@getStates',
    '/cities/{id}' => 'CityController@getCities',

    '/ip/weather/{id}' => 'WeatherController@getWeather',
    '/weather/{id}' => 'WeatherByIpController@getWeatherByIp',
];
