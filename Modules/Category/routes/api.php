<?php

use Illuminate\Support\Facades\Route;
use Modules\Category\app\Http\Controllers\CategoryController;

Route::apiResource('Category', CategoryController::class)->names('category');

