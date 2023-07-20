<?php

namespace App\Models;

use App\Models\Weather\Data;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $table = "cities";

    public function weatherData() {
        return $this->hasMany(Data::class);
    }
}
