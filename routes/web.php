<?php

use App\Http\Controllers\WeatherController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('', [WeatherController::class, 'index'])->name('weather.index');
Route::post('/create', [WeatherController::class, 'fetch'])->name('weather.create');
Route::get('edit/{measurement}', [WeatherController::class, 'edit'])->name('weather.edit');
Route::put('update/{measurement}', [WeatherController::class, 'update'])->name('weather.update');
Route::get('show/{measurement}', [WeatherController::class, 'show'])->name('weather.show');
Route::delete('delete/{measurement}', [WeatherController::class, 'delete'])->name('weather.delete');

