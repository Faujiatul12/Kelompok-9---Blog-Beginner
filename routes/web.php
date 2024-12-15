<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;

// Halaman utama
Route::get('/', function () {
    return view('home');
})->name('home');

// Routes untuk kategori
Route::resource('categories', CategoryController::class);
Route::get('/gallery/category/{category}', [GalleryController::class, 'showCategory'])->name('gallery.category');

Route::get('/category/{category}', [CategoryController::class, 'show'])->name('category.show');

// Routes untuk galeri budaya
Route::resource('gallery', GalleryController::class);

// Middleware untuk tamu (belum login)
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('/login', [AuthenticatedSessionController::class, 'store']);

    Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('/register', [RegisteredUserController::class, 'store']);
});

// Middleware untuk pengguna yang sudah login
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'showDashboard'])->name('dashboard');
    Route::get('/profile/edit', function () {
        return view('profile.edit');
    })->name('profile.edit');

    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});
Route::middleware(['auth', 'is_admin'])->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'adminDashboard'])->name('admin.dashboard');
});

Route::get('/category/adat', function () {
    return view('categories.adat');
})->name('category.adat');

Route::get('/category/tarian-khas', function () {
    return view('categories.tarian');
})->name('category.tarian');

Route::get('/category/makanan-khas', function () {
    return view('categories.makanan');
})->name('category.makanan');


// Rute untuk kategori
Route::get('/category/adat', [CategoryController::class, 'adat'])->name('category.adat');
Route::get('/category/tarian', [CategoryController::class, 'tarian'])->name('category.tarian');
Route::get('/category/makanan', [CategoryController::class, 'makanan'])->name('category.makanan');

// Contoh rute dengan middleware 'auth' atau middleware lainnya
Route::get('/category/{slug}', [CategoryController::class, 'show'])
    ->middleware('auth') // Atau middleware lainnya seperti 'can:view-category'
    ->name('category.show');
