<?php

use App\Http\Controllers\Auth\LoginCustomController;
use Illuminate\Support\Facades\Route;


Route::get('/login', [LoginCustomController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginCustomController::class, 'login']);
Route::get('/activar-usuario', [LoginCustomController::class, 'showActivateForm'])->name('activate');
Route::put('/activar-usuario', [LoginCustomController::class, 'activateUser']);
Route::post('/logout', [LoginCustomController::class, 'logout'])->name('logout');
