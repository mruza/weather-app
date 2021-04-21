<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WeatherController extends Controller
{
    //

    public function fetch()
    {
        $url = 'http://api.openweathermap.org/data/2.5/weather?';
        $response = Http::get($url, [
            'q' => 'bratislava',
            'appid' => '9877f88cec9db79e9e74254de7a470b6',
        ]);
        dd($response);
    }
}
