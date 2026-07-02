<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function getCitiesForCountry(Request $request)
    {
        return response()->json([]);
    }
}
