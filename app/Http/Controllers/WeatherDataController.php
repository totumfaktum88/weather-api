<?php

namespace App\Http\Controllers;

use App\Http\Resources\WeatherDataResource;
use App\Models\Weather\Data;
use Illuminate\Http\Request;

class WeatherDataController extends Controller
{
    public function index(Request $request) {
        return WeatherDataResource::collection(Data::query()->get());
    }
}
