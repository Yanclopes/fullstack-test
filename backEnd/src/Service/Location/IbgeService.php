<?php

namespace App\Service\Location;

use App\Utils\Http;
use Exception;

class IbgeService
{
    private string $baseUrl;

    public function __construct()
    {
        $this->baseUrl = $_ENV['IBGE_BASEURL'];
    }

    /**
     * @throws Exception
     */
    public function getIbgeStates()
    {
        return Http::get($this->baseUrl.'/estados');
    }

    /**
     * @throws Exception
     */
    public function getIbgeCities($state)
    {
        return Http::get($this->baseUrl."/estados/{$state[0]}/municipios");
    }
}