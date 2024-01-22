<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContinentController;

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



Route::get('/continentslist', [ContinentController::class, 'getContinentList']);
Route::get('/continents', [ContinentController::class, 'getContinent']);
Route::post('/create_continent', [ContinentController::class, 'createContinent']);
Route::post('/upodate_continent', [ContinentController::class, 'updateContinent']);
Route::get('/delete_continent', [ContinentController::class, 'destroy']);

