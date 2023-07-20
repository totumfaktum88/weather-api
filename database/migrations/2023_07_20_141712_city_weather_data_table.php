<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create("city_weather_data", function(Blueprint $table){
            $table->id();
            $table->foreignId("city_id");
            $table->timestamp("datetime");
            $table->double("latitude");
            $table->double("longitude");
            $table->string("temperature")->comment("celsius");
            $table->double("air_pressure");
            $table->double("humidity");
            $table->double("minimum_temperature");
            $table->double("maximum_temperature");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("city_weather_data");
    }
};
