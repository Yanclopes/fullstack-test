<?php

namespace App\Service\Location;

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
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, ($this->baseUrl.'/estados'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($ch);

        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        curl_close($ch);

        if ($httpcode >= 200 && $httpcode < 300) {
            return json_decode($response, true);
        } else {
            throw new Exception('Falha ao buscar os estados');
        }
    }

    public function getIbgeCities($state)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, ($this->baseUrl."/estados/{$state[0]}/municipios"));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($ch);

        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        curl_close($ch);

        if ($httpcode >= 200 && $httpcode < 300) {
            return json_decode($response, true);
        } else {
            throw new Exception('Falha ao buscar as cidades');
        }
    }
}