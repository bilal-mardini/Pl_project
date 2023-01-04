<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ConsualtingController;
use App\Http\Controllers\UploadImg;
use App\Http\Controllers\UploadImgController;


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
Route::get('/Dates',[ConsualtingController::class,'Date']);
Route::post('/BookAppiotment',[ConsualtingController::class,'BookAnAppointment']);
Route::get('/Appointments',[ConsualtingController::class,'Appointments']);
Route::get('/rate',[AuthController::class,'rate']);
Route::post('/uploadImage',[UploadImgController::class,'uploadImage']);


