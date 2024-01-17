<?php

namespace App\Controller;

use App\Response\JsonResponse;
use App\Service\Location\IbgeService;
use Exception;

class StateController
{
    public function getStates()
    {
        try {
            $IBGE = new IbgeService();
            JsonResponse::Response($IBGE->getIbgeStates());
        } catch (Exception $e) {
            JsonResponse::Response(['error' => 'Erro ao buscar os Estados: ' . $e->getMessage()], 500);
        }
    }
}