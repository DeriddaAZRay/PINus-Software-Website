<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\videosController;
use App\Http\Controllers\AboutController;

Route::get('/', function () {
    return view('home');
});

Route::get('/', [videosController::class, 'index']);
Route::prefix('about')->group(function () {
    Route::get('/introduction', [AboutController::class, 'introduction']);
    Route::get('/legality', [AboutController::class, 'legality']);
    Route::get('/history', [AboutController::class, 'history']);
    Route::get('/visimisi', [AboutController::class, 'visiMisi']);
});

