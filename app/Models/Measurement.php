<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

class Measurement extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $dates = ['created_at', 'updated_at'];


    /**
     * @param $city
     * @return \Illuminate\Http\Client\Response
     * @author Martin Ruza <martin.ruza@01people.com>
     */
    public static function getData($city)
    {
        $response = Http::get(config('custom.weather_api_url'), [
            'q' => $city,
            'appid' => config('custom.weather_api_key'),
            'units' => config('custom.weather_units')
        ]);

        return $response;
    }
}
