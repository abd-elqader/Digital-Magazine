<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubscriptionController;

Route::controller(SubscriptionController::class)->prefix('subscriptions')->group(function () {
    Route::get('/', 'index');
    Route::get('show/{id}', 'show');
    Route::post('/store', 'store');
    Route::put('update/{id}', 'update');
    Route::delete('delete/{id}', 'destroy');
});
