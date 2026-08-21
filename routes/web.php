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
Route::view('/franchise', 'apotek.franchise')->name('franchise');
Route::get('/cabang/{branch}', function (string $branch) {
    $branches = [
        'sintang' => ['name' => 'Alfa Sintang', 'logo' => 'Logo sintang.jpg', 'phone' => '0857-0593-5715', 'instagram' => 'https://www.instagram.com/apotekalfasintang/', 'tiktok' => 'https://www.tiktok.com/@apotekalfasintang', 'address' => 'Jl. MT. Haryono, Kapuas Kanan Hulu, Kec. Sintang, Kabupaten Sintang, Kalimantan Barat 78613'],
        'air-upas' => ['name' => 'Alfa Air Upas', 'logo' => 'Logo Air upas.jpg', 'phone' => '0815-4923-3935', 'instagram' => 'https://www.instagram.com/apotek_alfaairupas/', 'tiktok' => 'https://www.tiktok.com/@apotekalfaairupas', 'address' => 'MRMF+FM9, Air Upas, Kec. Air Upas, Kabupaten Ketapang, Kalimantan Barat 78863'],
        'kendawangan' => ['name' => 'Alfa Kendawangan', 'logo' => 'Logo kendawangan.jpeg', 'phone' => '0822-5423-9530', 'instagram' => 'https://www.instagram.com/apotek_alfakendawangann/', 'tiktok' => 'https://www.tiktok.com/@apotekalfakendawangan', 'address' => 'F6F8+44V, Jl. Pangeran Adi, Kendawangan Kiri, Kec. Kendawangan, Kabupaten Ketapang, Kalimantan Barat 78862'],
        'balai-berkuak' => ['name' => 'Alfa Balai Berkuak', 'logo' => 'Logo balai berkuak.jpg', 'phone' => '0821-1442-2090', 'instagram' => 'https://www.instagram.com/apotek.alfabalaiberkuak/', 'tiktok' => 'https://www.tiktok.com/@apotekalfabalaiberkuak', 'address' => 'Jl. Istana Jaya, Kelurahan Balai Pinang, Kec. Simpang Hulu, Kabupaten Ketapang, Kalimantan Barat 78854'],
        'nanga-tayap' => ['name' => 'Alfa Nanga Tayap', 'logo' => 'Logo nangatayap.jpg', 'phone' => '0858-4926-3704', 'instagram' => 'https://www.instagram.com/apotek_alfa_tayap/', 'tiktok' => 'https://www.tiktok.com/@apotekalfanangatayap', 'address' => 'FHG8+859, Nanga Tayap, Kec. Nanga Tayap, Kabupaten Ketapang, Kalimantan Barat 78873'],
        'tumbang-titi' => ['name' => 'Alfa Tumbang Titi', 'logo' => 'Logo tumbang titi.jpg', 'phone' => '0858-2196-0187', 'instagram' => 'https://www.instagram.com/apotek.alfatumbangtiti/', 'tiktok' => 'https://www.tiktok.com/@apotek_alfatumbangtiti', 'address' => 'Jl. Kyai Yauma, Desa Tumbang Titi Baru, Kec. Tumbang Titi, Kabupaten Ketapang, Kalimantan Barat 78874'],
        'sosok' => ['name' => 'Alfa Sosok', 'logo' => 'Logo Sosok.jpg', 'phone' => '0857-9603-2370', 'instagram' => 'https://www.instagram.com/apotek_alfasosok/', 'tiktok' => 'https://www.tiktok.com/@apotek_alfasosok', 'address' => 'Sosok, Kec. Tayan Hulu, Kabupaten Sanggau, Kalimantan Barat 78562'],
        'bodok' => ['name' => 'Alfa Bodok', 'logo' => 'Logo bodok.jpg', 'phone' => '0831-9151-1444', 'instagram' => 'https://www.instagram.com/apotek_alfabodok/', 'tiktok' => 'https://www.tiktok.com/@apotekalfaabodok', 'address' => '6C5M+89Q, Palem Jaya, Kec. Parindu, Kabupaten Sanggau, Kalimantan Barat 78561'],
        'kembayan' => ['name' => 'Alfa Kembayan', 'logo' => 'Logo kembayan.jpg', 'phone' => '0857-9603-2366', 'instagram' => 'https://www.instagram.com/apotek_alfakembayan/', 'tiktok' => 'https://www.tiktok.com/@apotek_alfakembayan', 'address' => 'APOTEK ALFA, Tj. Merpati, Kec. Kembayan, Kabupaten Sanggau, Kalimantan Barat 78516'],
        'ambawang' => ['name' => 'Alfa Ambawang', 'logo' => 'Logo ambawang.jpg', 'phone' => '0851-1941-3105', 'instagram' => 'https://www.instagram.com/apotek_alfaambawang/', 'tiktok' => 'https://www.tiktok.com/@apotekalfaambawang', 'address' => 'Jl. Trans Kalimantan, Desa Jawa Tengah, Kec. Sungai Ambawang, Kabupaten Kubu Raya, Kalimantan Barat 78319'],
        'jungkat' => ['name' => 'Alfa Jungkat', 'logo' => 'Logo jungkat.jpg', 'phone' => '0857-5497-9060', 'instagram' => 'https://www.instagram.com/apotek_alfajungkat/', 'tiktok' => 'https://www.tiktok.com/@apotek_alfajungkat', 'address' => 'Jl. Raya Jungkat, Sei Nipah, Kec. Jongkat, Kab. Mempawah, Kalimantan Barat 78351'],
        'mempawah' => ['name' => 'Alfa Mempawah', 'logo' => 'Logo mempawah.jpg', 'phone' => '0858-2071-2029', 'instagram' => 'https://www.instagram.com/apotek_alfamempawah/', 'tiktok' => 'https://www.tiktok.com/@apotek_alfamempawah', 'address' => 'Jl. Sujarwo, Terusan, Kec. Mempawah Hilir, Kab. Mempawah, Kalimantan Barat 78912'],
    ];

    $mapQueries = [
        'sintang' => 'Jl. MT. Haryono, Kapuas Kanan Hulu, Kec. Sintang, Kab. Sintang, Kalimantan Barat 78613',
        'air-upas' => 'MRMF+FM9, Air Upas, Kec. Air Upas, Kab. Ketapang, Kalimantan Barat 78863',
        'kendawangan' => 'F6F8+44V, Jl. Pangeran Adi, Kendawangan Kiri, Kab. Ketapang, Kalimantan Barat 78862',
        'balai-berkuak' => 'Jl. Istana Jaya, Kel. Balai Pinang, Kec. Simpang Hulu, Kab. Ketapang, Kalimantan Barat',
        'nanga-tayap' => 'FHG8+859, Nanga Tayap, Kec. Nanga Tayap, Kab. Ketapang, Kalimantan Barat 78873',
        'tumbang-titi' => '5JC6+QV7, Tumbang Titi, Kec. Tumbang Titi, Kab. Ketapang, Kalimantan Barat 78874',
        'sosok' => 'Sosok, Kec. Tayan Hulu, Kab. Sanggau, Kalimantan Barat 78562',
        'bodok' => '6C5M+89Q, Palem Jaya, Kec. Parindu, Kab. Sanggau, Kalimantan Barat 78561',
        'kembayan' => 'Apotek Alfa, Tanjung Merpati, Kec. Kembayan, Kab. Sanggau, Kalimantan Barat 78516',
        'ambawang' => 'Jl. Trans Kalimantan, Desa Jawa Tengah, Kec. Sungai Ambawang, Kab. Kubu Raya, Kalimantan Barat 78319',
        'jungkat' => 'Jl. Raya Jungkat, Sei Nipah, Kab. Mempawah, Kalimantan Barat 78351',
        'mempawah' => 'Jl. Sujarwo, Terusan, Kec. Mempawah Hilir, Kab. Mempawah, Kalimantan Barat 78912',
    ];

    foreach ($branches as $slug => $branchData) {
        $branches[$slug]['maps'] = 'https://www.google.com/maps/search/?api=1&query='.urlencode($mapQueries[$slug]);
    }

    abort_unless(isset($branches[$branch]), 404);

    return view('apotek.branch-detail', ['branch' => $branches[$branch]]);
})->name('branch.show');
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
