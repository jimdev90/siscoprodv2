<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Profile\AcademicDataController;
use App\Http\Controllers\Profile\BasicDataController;
use App\Http\Controllers\Profile\AccountDataController;


Route::group(['as' => 'profile.'], function (){

    Route::get('/perfil', [AccountDataController::class, 'index'])->name('account.index');
    Route::get('/perfil/datos-personales', [BasicDataController::class, 'index'])->name('basic.index');
    Route::get('/perfil/datos-academicos', [AcademicDataController::class, 'index'])->name('academic.index');

});
