<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\VoituresController;
use App\Http\Controllers\API\AutController;

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
//getVoitures
Route::get('voitures',[VoituresController::class,'getVoitures']);
//getVoituresbyId
Route::get('voitures/{id}',[VoituresController::class,'getVoituresById']);
//addVoitures
Route::post('addVoitures',[VoituresController::class,'addVoitures']);
//updateVoitures
Route::put('updateVoitures/{id}',[VoituresController::class,'updateVoitures']);
//deleteVoitures
Route::delete('deleteVoitures/{id}',[VoituresController::class,'deleteVoitures']);

//test login
Route::post('/login',[AutController::class,'login']);
Route::post('/logout',[AutController::class,'logout']);