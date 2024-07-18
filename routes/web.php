<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;


Route::get('/',[JobController::class,'index']);
Route::get('/job',[JobController::class,'create']);
Route::post('/job',[JobController::class,'store']);

Route::get('/search',SearchController::class);
Route::get('/tags/{tag:name}',TagController::class);

Route::middleware('auth')->group(function (){

    Route::delete('/logout',[AuthController::class,'destroy']);
});

Route::middleware('guest')->group(function (){
    Route::get('/register', [AuthController::class,'registerUser']);
    Route::post('/register', [AuthController::class,'store']);
    Route::get('/login', [AuthController::class,'login']);
    Route::post('/login',[AuthController::class,'loginUser']);

});


