<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\PermissionController;

Route::group(['as' => 'admin.'], function () {
    Route::get('/roles', [RoleController::class, 'index'])->name('role.index');
    Route::post('/roles', [RoleController::class, 'store'])->name('role.store');
    Route::put('/roles/{role}', [RoleController::class, 'update'])->name('role.update');
    Route::delete('/roles/{role}', [RoleController::class, 'delete'])->name('role.delete');

    Route::get('/permisos', [PermissionController::class, 'index'])->name('permission.index');
    Route::post('/permisos', [PermissionController::class, 'store'])->name('permission.store');
    Route::put('/permisos/{permission}', [PermissionController::class, 'update'])->name('permission.update');
    Route::delete('/permisos/{permission}', [PermissionController::class, 'delete'])->name('permission.delete');

});


