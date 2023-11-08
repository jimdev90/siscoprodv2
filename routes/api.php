<?php

use App\Http\Controllers\Api\ApiBasicPersonalController;
use App\Http\Controllers\Api\ApiRoleController;
use App\Http\Controllers\Api\ApiPermissionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
*/

Route::get('/search-personal', [ApiBasicPersonalController::class, 'searchPersonal']);
Route::get('/roles', [ApiRoleController::class, 'index']);
Route::get('/permisos', [ApiPermissionController::class, 'index']);
