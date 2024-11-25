<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommentController;

Route::controller(CommentController::class)->prefix('comments')->group(function () {
    Route::get('/', 'index');
    Route::get('show/{id}', 'show');
    Route::post('/store', 'store');
    Route::put('update/{id}', 'update');
    Route::delete('delete/{id}', 'destroy');
});
