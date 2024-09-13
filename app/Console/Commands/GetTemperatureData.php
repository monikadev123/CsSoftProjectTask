<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use Illuminate\Support\Facades\Http;
use App\Models\{City,CityTemperatureData};


class GetTemperatureData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'get-temperature';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get temperature data for mohali';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $response = Http::get('https://api.open-meteo.com/v1/forecast', [
            'latitude' => 30.7046,
            'longitude' => 76.7179,
            'hourly' => 'temperature_2m',
            'timezone' => 'Asia/Kolkata',
        ]);

        $city = City::where('name', 'Mohali')->first();

        if(isset($response['hourly']['temperature_2m'])){
            $time_data = $response['hourly']['time'];
            $temperature = $response['hourly']['temperature_2m'];
                foreach ($time_data as $index => $timestamp) {
                    CityTemperatureData::updateOrInsert(
                        [
                            'city_id' => $city['id'],
                            'temp_timestamp' => $timestamp,
                        ],
                        [
                            'temperature' => $temperature[$index],
                        ]
                    );
                }
        }
    }

}
