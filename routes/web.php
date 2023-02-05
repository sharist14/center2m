<?php

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

use App\Http\Controllers\Api;
Route::prefix('center2m.local')->group(function() {
    Route::get('/api/cars', [Api\CarController::class, 'index']);
    Route::post('/api/cars', [Api\CarController::class, 'store']);
});
