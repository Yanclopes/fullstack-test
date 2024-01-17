<?php

namespace App\Http\Controllers\locations;

use App\Http\Controllers\Controller;
use App\Services\Location\IbgeService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class StateController extends Controller
{
    public function getStates()
    {
        try {
            $IBGE = new IbgeService();
            return $IBGE->getIbgeStates();
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
