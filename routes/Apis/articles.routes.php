<?php

use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;


Route::controller(ArticleController::class)->prefix('articles')->group(function () {
    Route::get('/', 'index');
    Route::get('/show/{id}', 'showone');
    Route::post('/store', 'create');
    Route::post('update/{id}', 'update');
    Route::delete('delete/{id}', 'destroy');
});
