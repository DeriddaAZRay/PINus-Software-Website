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
use App\Http\Controllers\VideoController;
use App\Http\Controllers\ClientController;
use App\Http\Middleware\AdminAuth;
use App\Http\Controllers\AdminDashboardController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::prefix('about')->group(function () {
    Route::get('/legality', [AboutController::class, 'legality'])->name('about.legality');
    Route::get('/history', [AboutController::class, 'history'])->name('about.history');
    Route::get('/visimisi', [AboutController::class, 'visiMisi'])->name('about.visimisi');
    Route::get('/product-logo-philosophy', [AboutController::class, 'productlogoPhilosophy'])->name('about.product-logo-philosophy');
    Route::get('/company-logo-philosophy', [AboutController::class, 'companylogoPhilosophy'])->name('about.company-logo-philosophy');
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
Route::post('/login', [AuthController::class, 'login'])
    ->middleware('throttle:5,1');;
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Protected route (dashboard)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('admin.auth')->name('dashboard');

Route::middleware([AdminAuth::class])->group(function () {

    Route::get('/admin', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/api/stats', [AdminDashboardController::class, 'apiStats'])->name('admin.api.stats');
    Route::get('/admin/api/activities', [AdminDashboardController::class, 'apiActivities'])->name('admin.api.activities');
    Route::get('/admin/api/stats/{type}', [AdminDashboardController::class, 'getDetailedStats'])->name('admin.api.detailed-stats');

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

    Route::post('/admin/articles/categories', [ArticleController::class, 'storeCategory'])->name('admin.categories.store');
    Route::delete('/admin/articles/categories/{id}', [ArticleController::class, 'destroyCategory'])->name('admin.categories.destroy');

    Route::get('/admin/products', [ProductController::class, 'adminIndex'])->name('admin.products.index');
    Route::get('/admin/products/create', [ProductController::class, 'create'])->name('admin.products.create');
    Route::post('/admin/products', [ProductController::class, 'store'])->name('admin.products.store');
    Route::get('/admin/products/{id}/edit', [ProductController::class, 'edit'])->name('admin.products.edit');
    Route::put('/admin/products/{id}', [ProductController::class, 'update'])->name('admin.products.update');
    Route::delete('/admin/products/{id}', [ProductController::class, 'destroy'])->name('admin.products.destroy');
    Route::get('admin/products/product-logo/{id}', [ProductController::class, 'getLogo'])->name('product.logo');

    Route::get('/admin/videos', [VideoController::class, 'index'])->name('admin.videos.index');
    Route::get('/admin/videos/create', [VideoController::class, 'create'])->name('admin.videos.create');
    Route::post('/admin/videos', [VideoController::class, 'store'])->name('admin.videos.store');
    Route::get('/admin/videos/{id}', [VideoController::class, 'show'])->name('admin.videos.show');
    Route::get('/admin/videos/{id}/edit', [VideoController::class, 'edit'])->name('admin.videos.edit');
    Route::put('/admin/videos/{id}', [VideoController::class, 'update'])->name('admin.videos.update');
    Route::delete('/admin/videos/{id}', [VideoController::class, 'destroy'])->name('admin.videos.destroy');
    Route::post('/admin/videos/bulk-delete', [VideoController::class, 'bulkDelete'])->name('admin.videos.bulk-delete');
    Route::patch('/admin/videos/{id}/toggle-type', [VideoController::class, 'toggleType'])->name('admin.videos.toggle-type');
    Route::get('/admin/videos/type/{type}', [VideoController::class, 'getVideosByType'])->name('admin.videos.by-type'); 

    Route::get('/admin/gallery', [GalleryController::class, 'adminIndex'])->name('admin.gallery.index');
    Route::get('/admin/gallery/image/{id}', [GalleryController::class, 'getImage'])->name('admin.gallery.image');
    Route::get('/admin/gallery/create', [GalleryController::class, 'create'])->name('admin.gallery.create');
    Route::post('/admin/gallery', [GalleryController::class, 'store'])->name('admin.gallery.store');
    Route::get('/admin/gallery/{id}/edit', [GalleryController::class, 'edit'])->name('admin.gallery.edit');
    Route::put('/admin/gallery/{id}', [GalleryController::class, 'update'])->name('admin.gallery.update');
    Route::delete('/admin/gallery/{id}', [GalleryController::class, 'destroy'])->name('admin.gallery.destroy');

    Route::get('/admin/clients', [ClientController::class, 'index'])->name('admin.clients.index');
    Route::get('/admin/clients/create', [ClientController::class, 'create'])->name('admin.clients.create');
    Route::post('/admin/clients', [ClientController::class, 'store'])->name('admin.clients.store');
    Route::get('/admin/clients/{id}/edit', [ClientController::class, 'edit'])->name('admin.clients.edit');
    Route::put('/admin/clients/{id}', [ClientController::class, 'update'])->name('admin.clients.update');
    Route::delete('/admin/clients/{id}', [ClientController::class, 'destroy'])->name('admin.clients.destroy');

    Route::get('/admin/testimonials', [TestimonialController::class, 'adminIndex'])->name('admin.testimonials.index');
    Route::get('/admin/testimonials/{id}', [TestimonialController::class, 'show'])->name('admin.testimonials.show');
    Route::put('/admin/testimonials/{id}', [TestimonialController::class, 'update'])->name('admin.testimonials.update');
    Route::delete('/admin/testimonials/{id}', [TestimonialController::class, 'destroy'])->name('admin.testimonials.destroy');
    Route::patch('/admin/testimonials/{id}/toggle-status', [TestimonialController::class, 'toggleStatus'])->name('admin.testimonials.toggle-status');

    Route::get('/debug-video-system', [VideoController::class, 'debugTest'])->name('debug.video.test');

}); // Close AdminAuth middleware group
