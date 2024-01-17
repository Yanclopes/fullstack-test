<?php

namespace App\Http\Controllers\locations;

use App\Http\Controllers\Controller;
use App\Services\Location\IbgeService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CityController extends Controller
{
    public function getCities(Int $state)
    {
        try {
            $IBGE = new IbgeService();
            return $IBGE->getIbgeCities($state);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
