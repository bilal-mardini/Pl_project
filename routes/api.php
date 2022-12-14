<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ConsualtingController;

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
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/register',[AuthController::class,'register']);
Route::post('/login',[AuthController::class,'login']);
Route::post('/logout',[AuthController::class,'logout']);
Route::post('/compeleteprofile',[AuthController::class,'compeleteprofile']);
Route::resource('consualting', ConsualtingController::class);
Route::post('/search/{data}',[ConsualtingController::class,'search']);
Route::post('/expert_detalis/{id}',[AuthController::class,'show']);


