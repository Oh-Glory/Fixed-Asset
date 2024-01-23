<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContinentController;
use App\Http\Controllers\ProvinceController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// continent API
Route::get('/continentslist', [ContinentController::class, 'getContinentList']);
Route::get('/continents', [ContinentController::class, 'getContinent']);
Route::post('/create_continent', [ContinentController::class, 'createContinent']);
Route::post('/upodate_continent', [ContinentController::class, 'updateContinent']);
Route::get('/delete_continent', [ContinentController::class, 'destroy']);

//Province API
Route::group(['prefix' => 'province'], function () {
    Route::get('/', [ProvinceController::class, 'getProvince']);
    Route::get('/provinceslist', [ProvinceController::class, 'getProvincelist']);
    Route::post('/create_provinces', [ProvinceController::class, 'createProvince']);
    Route::put('/update_provinces', [ProvinceController::class, 'updateProvince']);
    Route::delete('/delete_provinces', [ProvinceController::class, 'destroy']);

});
