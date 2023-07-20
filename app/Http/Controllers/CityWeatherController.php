<?php

namespace App\Http\Controllers;

use App\Http\Resources\WeatherDataResource;
use App\Models\City;
use Illuminate\Http\Request;

class CityWeatherController extends Controller
{
    public function index(Request $request, $city) {
        $city = City::query()->where("name", $city)->firstOrFail();

        return WeatherDataResource::collection(
            $city->weatherData()->Last24Hours()->get()
        );
    }
}
