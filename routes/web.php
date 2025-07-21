<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\ArticleController;

Route::get('/', function () {
    return view('home');
});

Route::get('/', [HomeController::class, 'index']);
Route::prefix('about')->group(function () {
    Route::get('/introduction', [AboutController::class, 'introduction']);
    Route::get('/legality', [AboutController::class, 'legality']);
    Route::get('/history', [AboutController::class, 'history']);
    Route::get('/visimisi', [AboutController::class, 'visiMisi']);
});
Route::get('/testimonials', [TestimonialController::class, 'index'])->name('testimonials.index');
Route::get('/testimonials/create', [TestimonialController::class, 'create'])->name('testimonials.create');
Route::post('/testimonials', [TestimonialController::class, 'store'])->name('testimonials.store');

// Article routes
Route::get('/articles', [App\Http\Controllers\ArticleController::class, 'index'])->name('articles');
Route::get('/articles/{id}', [App\Http\Controllers\ArticleController::class, 'show'])->name('articles.show');

// Blob image article
Route::get('/article/{id}/image', [ArticleController::class, 'serveImage'])
    ->name('article.image')
    ->where('id', '[0-9]+');

// Cache image article
Route::get('/article/{id}/image-cached', [ArticleController::class, 'serveImageCached'])
    ->name('article.image.cached')
    ->where('id', '[0-9]+');