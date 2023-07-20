<?php

namespace App\Console\Commands\Weather;

use App\Models\City;
use App\Services\OpenWeatherApi;
use Illuminate\Console\Command;

class Sync extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'weather:sync-cities';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $api = new OpenWeatherApi(env("OPEN_WEATHER_MAP_API_KEY"));

        $cities = City::query()->get();

        foreach($cities as $city) {
            $api->updateCityWeatherStatistics($city);
        }
    }
}
