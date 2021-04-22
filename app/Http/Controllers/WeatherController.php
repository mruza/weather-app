<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateMeasurementRequest;
use App\Models\Measurement;
use Illuminate\Http\Request;

class WeatherController extends Controller
{

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @author Martin Ruza <martin.ruza@01people.com>
     */
    public function index()
    {
        $measurements = Measurement::latest()
            ->get()
            ->unique('city');

        return view('weather.index')->with('measurements', $measurements);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @author Martin Ruza <martin.ruza@01people.com>
     */
    public function create(Request $request)
    {
        $response = Measurement::getData($request->input('city'));
        if ($response->ok()) {
            $body = json_decode($response->body());

            Measurement::create([
                'city' => $body->name,
                'temp' => $body->main->temp,
                'data' => $response->body(),
            ]);
        }
        return redirect()->route('weather.index');
    }

    /**
     * @param Measurement $measurement
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @author Martin Ruza <martin.ruza@01people.com>
     */
    public function edit(Measurement $measurement)
    {
        return view('weather.edit', compact('measurement', $measurement));
    }

    /**
     * @param Measurement $measurement
     * @param UpdateMeasurementRequest $request
     * @return \Illuminate\Http\RedirectResponse
     * @author Martin Ruza <martin.ruza@01people.com>
     */
    public function update(Measurement $measurement, UpdateMeasurementRequest $request)
    {
        if ($measurement->city != $request->city) {
            $response = Measurement::getData($request->input('city'));
            if ($response->ok()) {
                $body = json_decode($response->body());
                $measurement->update([
                    'city' => $body->name,
                    'temp' => $body->main->temp,
                    'data' => $response->body(),
                ]);
            }
        } else {
            $measurement->update($request->all());
        }
        return redirect()->route('weather.index');

    }

    /**
     * @param Measurement $measurement
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @author Martin Ruza <martin.ruza@01people.com>
     */
    public function show(Measurement $measurement)
    {
        return view('weather.show')
            ->with('measurement', $measurement)
            ->with('measurementsByCity', Measurement::whereCity($measurement->city)->latest()->get());
    }

    /**
     * @param Measurement $measurement
     * @return \Illuminate\Http\RedirectResponse
     * @author Martin Ruza <martin.ruza@01people.com>
     */
    public function delete(Measurement $measurement)
    {
        if ($measurement->is(Measurement::whereCity($measurement->city)->latest()->first())) {
            Measurement::whereCity($measurement->city)->delete();
        } else {
            $measurement->delete();
        }

        return redirect()->back();
    }


}
