<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\RoleController;

Route::group(['as' => 'role.'], function () {
    Route::get('/roles', [RoleController::class, 'index'])->name('role.index');

});


