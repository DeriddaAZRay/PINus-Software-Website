<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GalleryController;
use App\Http\Middleware\AdminAuth;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::prefix('about')->group(function () {
    Route::get('/legality', [AboutController::class, 'legality'])->name('about.legality');
    Route::get('/history', [AboutController::class, 'history'])->name('about.history');
    Route::get('/visimisi', [AboutController::class, 'visiMisi'])->name('about.visimisi');
    Route::get('/logo-philosophy', [AboutController::class, 'logoPhilosophy'])->name('about.logo-philosophy');
    Route::get('/logo-transition', [AboutController::class, 'logoTransition'])->name('about.logo-transition');
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

// Product
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');
Route::get('/products/{id}/features', [ProductController::class, 'getFeatures'])->name('products.features');

// Gallery
Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery.index');
Route::get('/gallery/image/{id}', [GalleryController::class, 'getImage'])->name('gallery.image');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Protected route (dashboard)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('admin.auth')->name('dashboard');

Route::middleware([AdminAuth::class])->group(function () {
    Route::get('/admin', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users');
    Route::post('/admin/users', [UserController::class, 'store'])->name('admin.users.store');
    Route::put('/admin/users/{cUsername}', [UserController::class, 'update'])->name('admin.users.update');
    Route::delete('/admin/users/{cUsername}', [UserController::class, 'destroy'])->name('admin.users.destroy');

    Route::get('/admin/articles', [ArticleController::class, 'adminIndex'])->name('admin.articles.index');
    Route::get('/admin/articles/create', [ArticleController::class, 'create'])->name('admin.articles.create');
    Route::post('/admin/articles', [ArticleController::class, 'store'])->name('admin.articles.store');
    Route::get('/admin/articles/{id}/edit', [ArticleController::class, 'edit'])->name('admin.articles.edit');
    Route::put('/admin/articles/{id}', [ArticleController::class, 'update'])->name('admin.articles.update');
    Route::delete('/admin/articles/{id}', [ArticleController::class, 'destroy'])->name('admin.articles.destroy');
    Route::post('/admin/categories/store', [ArticleController::class, 'storeCategory'])->name('admin.articles.storeCategory');
    Route::post('/admin/categories', [ArticleController::class, 'storeCategory'])->name('admin.categories.store');
    Route::delete('/admin/categories/{id}', [ArticleController::class, 'destroyCategory'])->name('admin.categories.destroy');

    Route::get('/admin/products', [ProductController::class, 'adminIndex'])->name('admin.products.index');
    Route::get('/admin/products/create', [ProductController::class, 'create'])->name('admin.products.create');
    Route::post('/admin/products', [ProductController::class, 'store'])->name('admin.products.store');
    Route::get('/admin/products/{id}/edit', [ProductController::class, 'edit'])->name('admin.products.edit');
    Route::put('/admin/products/{id}', [ProductController::class, 'update'])->name('admin.products.update');
    Route::delete('/admin/products/{id}', [ProductController::class, 'destroy'])->name('admin.products.destroy');
    Route::get('admin/products/product-logo/{id}', [ProductController::class, 'getLogo'])->name('product.logo');

});

