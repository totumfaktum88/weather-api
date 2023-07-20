<?php

namespace App\Models\Weather;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    use HasFactory;

    protected $table = "city_weather_data";

    protected $fillable = [
        "city_id",
        "datetime",
        "latitude",
        "longitude",
        "temperature",
        "air_pressure",
        "humidity",
        "minimum_temperature",
        "maximum_temperature"
    ];

    protected $casts = [
        "datetime" => "datetime"
    ];

    public function scopeLast24Hours($query) {
        $query->where("datetime", ">", now()->subDay());
    }
}
