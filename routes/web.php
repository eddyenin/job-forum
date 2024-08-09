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
    Route::get('/job/edit/{job:title}',[JobController::class,'edit'])->name('job.edit');
    Route::patch('/job/update/{job:name}',[JobController::class,'update'])->name('job.update');
    Route::delete('/job/destroy/{job:name}',[JobController::class,'delete'])->name('job.delete');

    Route::delete('/logout',[AuthController::class,'destroy'])->name('logout');
});


Route::middleware('guest')->group(function (){
    Route::get('/register', [AuthController::class,'registerUser'])->name('register');
    Route::post('/register', [AuthController::class,'store']);
    Route::get('/login', [AuthController::class,'login'])->name('login');
    Route::post('/login',[AuthController::class,'loginUser'])->name('login.store');

});


