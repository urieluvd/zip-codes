<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


Route::apiResource('/federalEntities', 'App\Http\Controllers\FederalEntitiesController');
Route::apiResource('/municipalities', 'App\Http\Controllers\MunicipalitiesController');
Route::apiResource('/cities', 'App\Http\Controllers\CitiesController');
Route::apiResource('/settlements', 'App\Http\Controllers\SettlementsController');
Route::apiResource('/zip-codes', 'App\Http\Controllers\ZipCodesController');
