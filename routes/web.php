<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'apotek.home')->name('home');
Route::get('/media/{path}', function (string $path) {
    $cleanPath = ltrim($path, '/');
    $isStorageMedia = str_starts_with($cleanPath, 'banner/') || str_starts_with($cleanPath, 'partners/');
    $relativePath = $isStorageMedia
        ? $cleanPath
        : preg_replace('#^news/?#', '', $cleanPath);
    $baseDirectory = $isStorageMedia ? storage_path() : storage_path('news');
    $resolvedBase = realpath($baseDirectory);
    $resolvedPath = realpath($baseDirectory.DIRECTORY_SEPARATOR.$relativePath);

    abort_unless(
        $resolvedBase && $resolvedPath && is_file($resolvedPath) && str_starts_with($resolvedPath, $resolvedBase.DIRECTORY_SEPARATOR),
        404
    );

    return response()->file($resolvedPath);
})->where('path', '.*')->name('media.show');
Route::get('/konten/{content}', [ContentController::class, 'show'])->name('content.show');
Route::get('/berita/{news}', [NewsController::class, 'show'])->name('news.show');
Route::view('/tentang-kami', 'apotek.about')->name('about');
Route::get('/mitra-kami', [PartnerController::class, 'publicIndex'])->name('partners');
Route::view('/hubungi-kami', 'apotek.contact')->name('contact');

// Auth Routes
Route::get('/admin/login', [AuthController::class, 'showLoginForm'])->name('auth.login.form');
Route::post('/admin/login', [AuthController::class, 'login'])->name('auth.login');
Route::post('/admin/logout', [AuthController::class, 'logout'])->name('auth.logout')->middleware('auth');

// Admin Dashboard (Protected)
Route::middleware('auth')->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    // Banner Routes
    Route::resource('/admin/banner', BannerController::class, ['as' => 'admin']);

    // Partner Routes
    Route::resource('/admin/partner', PartnerController::class, ['as' => 'admin']);

    // Content Routes
    Route::resource('/admin/content', ContentController::class, ['as' => 'admin']);

    // News Routes
    Route::resource('/admin/news', NewsController::class, ['as' => 'admin']);
});

// Produk dihapus sesuai kebutuhan landing page apotek.

Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{product:slug}', [ProductController::class, 'show'])->name('products.show');

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/{product}', [CartController::class, 'add'])->name('cart.add');
Route::patch('/cart/{productId}', [CartController::class, 'update'])->name('cart.update');
Route::delete('/cart/{productId}', [CartController::class, 'remove'])->name('cart.remove');
Route::delete('/cart', [CartController::class, 'clear'])->name('cart.clear');

Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');
Route::get('/checkout/success/{orderNumber}', [CheckoutController::class, 'success'])->name('checkout.success');
