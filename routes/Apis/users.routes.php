<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::controller(UserController::class)->prefix('users')->group(function () {
    Route::get('/', 'index');
    Route::get('show/{id}', 'show');
    Route::post('/store', 'store');
    Route::put('update/{id}', 'update');
    Route::delete('delete/{id}', 'destroy');
});
