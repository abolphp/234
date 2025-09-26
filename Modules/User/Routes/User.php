<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Modules\User\Http\Controllers\Auth\ForgotPasswordController;
use Modules\User\Http\Controllers\Auth\LoginController;
use Modules\User\Http\Controllers\Auth\RegisterController;
use Modules\User\Http\Controllers\Auth\ResetPasswordController;
use Modules\User\Http\Controllers\Auth\VerificationController;


Route::group([
    'namespace' => 'Modules\User\Http\Controllers',
    'middleware' => 'web',
], function ($router) {

    Auth::routes(
        [
            'verify' => true,
        ]
    );
});
