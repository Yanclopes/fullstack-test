<?php

namespace App\Controller;

use App\Response\JsonResponse;
use App\Service\Location\IbgeService;
use Exception;


class CityController
{
    public function getCities($state)
    {
        try {
            $IBGE = new IbgeService();
            JsonResponse::Response($IBGE->getIbgeCities($state));
        } catch (Exception $e) {
            JsonResponse::Response(['error' => 'Erro ao buscar as cidades: ' . $e->getMessage()], 500);
        }
    }
}