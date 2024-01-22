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

Route::get('/', function () {
    return view('welcome');
});


Route::group(['prefix' => 'region'], function () {

    Route::get('/', [App\Http\Controllers\RegionController::class, 'getRegion'])->name('get_region');
    Route::post('/add-region', [App\Http\Controllers\RegionController::class, 'addRegion'])->name('admin_add_region');
    Route::any('/update-region', [App\Http\Controllers\RegionController::class, 'update_region'])->name('update_admin_region');
    Route::get('/delete-region', [App\Http\Controllers\RegionController::class, 'delete'])->name('delete_region');
    Route::get('/getregion_detail', [App\Http\Controllers\RegionController::class, 'getRegionInfor'])->name('getRegionInfos');
    Route::get('/get-region', [App\Http\Controllers\RegionController::class, 'getRegionByType'])->name('get_region_by_type');
});