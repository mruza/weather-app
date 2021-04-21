<?php

namespace App\Http\Controllers;

use App\Models\Measurement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WeatherController extends Controller
{

    public function fetch(Request $request)
    {
        $response = Http::get(config('custom.weather_api_url'), [
            'q' => $request->input('city'),
            'appid' => config('custom.weather_api_key'),
            'units' => config('custom.weather_units')
        ]);
        if ($response->ok()) {
            $body = json_decode($response->body());

            Measurement::create([
                'city' => $body->name,
                'temp' => $body->main->temp,
                'data' => $response->body(),
            ]);
        }
    }
}
