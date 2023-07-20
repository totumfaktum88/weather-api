<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WeatherDataResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "datetime" => $this->datetime,
            "latitude" => $this->latitude,
            "longitude" => $this->longitude,
            "temperature" => $this->temperature,
            "air_pressure" => $this->air_pressure,
            "humidity" => $this->humidity,
            "minimum_temperature" => $this->minimum_temperature,
            "maximum_temperature" => $this->maximum_temperature
        ];
    }
}
