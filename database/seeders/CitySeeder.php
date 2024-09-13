<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\City;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cities = [
            'name' => 'Mohali',           
            'Chandigarh',
            'Amritsar',
            'Jalandhar',
            'Ludhiana',
            'Patiala',
            'Bathinda',
            'Hoshiarpur',
            'Firozpur',
            'Moga',
            'Kapurthala',
            'Rupnagar',
            'Sangrur',
            'Faridkot',
            'Tarn Taran',
            'Nawanshahr',
            'Ropar',
            'Panchkula',
            'Yamunanagar',
            'Ambala',
            'Kurukshetra',
            'Hisar',
            'Sonipat',
            'Rohtak',
            'Jind',
            'Kaithal',
            'Panipat',
            'Fatehabad',
            'Sirsa',
            'Palwal',
            'Mahendragarh',
            'Rewari',
            'Gurugram',
            'Faridabad',
            'Jhajjar',
        ];

        foreach ($cities as $city) {
            City::insert([
                'name' => $city,
            ]);
        }
    }
}
