<?php

use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

Route::get('/home', function () {
    return view('home');
})->middleware(['auth' , 'verified']);


Route::get('/test', function () {
    Permission::create(['name' => 'dashboard']);
    Role::create(['name' => 'admin']);
    return "ok";
});
