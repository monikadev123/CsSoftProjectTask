<?php
namespace App\Http\Controllers\Web;

use App\Http\Controllers\BaseController;

use App\Models\CityTemperatureData;

class TemperatureController extends BaseController
{
    public function tempGraph()
    {
        $temperatures = CityTemperatureData::select('temperature', 'temp_timestamp')->get();
        
        return view('temp-graph', compact('temperatures'));
    }
}