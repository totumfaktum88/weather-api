<?php

namespace App\Services;

use App\Models\City;
use Illuminate\Support\Facades\Http;

class OpenWeatherApi
{
    protected string $url = "https://api.openweathermap.org/data/2.5/weather";
    protected ?string $apiKey = null;

    public function __construct(string $apiKey) {
        $this->apiKey = $apiKey;
    }

    public function updateCityWeatherStatistics(City $record) {
        if ($record->exists) {
            try {
                $response = Http::get(
                    $this->url,
                    [
                        "appid" => $this->apiKey,
                        "lat" => $record->latitude,
                        "lon" => $record->longitude
                    ]
                );

                if ($response->ok()) {
                    $data = $response->json();
                    $record->weatherData()->create([
                        "city_id" => $record->id,
                        "datetime" => now(),
                        "latitude" => $data["coord"]["lat"],
                        "longitude" => $data["coord"]["lon"],
                        "temperature" => $data["main"]["temp"],
                        "air_pressure" => $data["main"]["pressure"],
                        "humidity" => $data["main"]["humidity"],
                        "minimum_temperature" => $data["main"]["temp_min"],
                        "maximum_temperature" => $data["main"]["temp_max"]
                    ]);
                }
            } catch (\Exception $e) {
                dd($e->getMessage());
            }
        }
    }
}