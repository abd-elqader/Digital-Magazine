<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;

Route::controller(PaymentController::class)->prefix('payments')->group(function () {
    Route::get('/', 'index');
    Route::get('show/{id}', 'show');
    Route::post('/store', 'store');
    Route::put('update/{id}', 'update');
    Route::delete('delete/{id}', 'destroy');
});
