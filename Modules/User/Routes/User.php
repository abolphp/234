<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::group(["namespace" => "Modules\User\Http\Controllers" , "middleware" => "web"] , function ($router) {
    Route::middleware('guest')->group(function () {
        Route::get('/Login' , [\Modules\User\Http\Controllers\Auth\LoginController::class , 'showLoginForm'])->name('login');
        Route::post('/Login' , [\Modules\User\Http\Controllers\Auth\LoginController::class , 'login']);
        });

    Route::middleware('guest')->group(function () {
        Route::get("Register" , [\Modules\User\Http\Controllers\Auth\RegisterController::class , 'showRegistrationForm'])->name('register');
        Route::post("Register" , [\Modules\User\Http\Controllers\Auth\RegisterController::class , 'register']);
    });
    Route::get('/home', [\Modules\User\Http\Controllers\HomeController::class, 'index'])->middleware('auth')->name('home');
    Route::post('/Logout' , [\Modules\User\Http\Controllers\Auth\LoginController::class , 'Logout'])->middleware('auth')->name('logout');
});
