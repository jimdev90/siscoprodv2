<?php

use App\Http\Controllers\Api\ApiBasicPersonalController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
*/

Route::get('/search-personal', [ApiBasicPersonalController::class, 'searchPersonal']);
