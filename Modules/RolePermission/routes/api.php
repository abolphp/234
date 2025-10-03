<?php

use Illuminate\Support\Facades\Route;
use Modules\RolePermission\app\Http\Controllers\RolePermissionController;

Route::apiResource('RolePermissions', RolePermissionController::class)->names('rolepermission');

