<?php

namespace App\Http\Controllers;

use App\Http\Resources\CityWeatherResource;
use App\Models\City;
use Illuminate\Http\Request;

class CityWeatherController extends Controller
{
    public function index(Request $request, $city) {
        $city = City::query()->where("name", $city)->firstOrFail();

        return CityWeatherResource::collection(
            $city->weatherData()->where("datetime", ">", now()->subDay())->get()
        );
    }
}
