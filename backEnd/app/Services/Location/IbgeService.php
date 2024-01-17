<?php

namespace App\Services\Location;

use Exception;
use Illuminate\Support\Facades\Http;

class IbgeService
{
    private string $baseUrl;

    public function __construct()
    {
        $this->baseUrl = env('IBGE_BASEURL');
    }

    /**
     * @throws Exception
     */
    public function getIbgeStates()
    {
        $response = Http::get($this->baseUrl.'/estados');
        if ($response->successful()) {
            return $response->json();
        } else {
            throw new Exception('Falha ao buscar os estados');
        }
    }

    public function getIbgeCities(Int $state)
    {
        $response = Http::get($this->baseUrl . "/estados/{$state}/municipios");
        if ($response->successful()) {
            return $response->json();
        } else {
            throw new Exception('Falha ao buscar as cidades');
        }
    }
}
