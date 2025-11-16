<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');

/**
    * - Middleware: `auth`
    * - Rute terkait ulasan (reviews):
    *       - POST `/reviews` → `ReviewController@store` (route name: `reviews.store`)
    *       - DELETE `/reviews/{review}` → `ReviewController@destroy` (route name: `reviews.destroy`)
*/
Route::middleware(['auth', 'role:admin,mahasiswa'])->group(function () {
    // 1. Tambahkan route untuk menyimpan review baru
    route::post('/articles', [ReviewController::class, 'store'])->name('reviews.store');
    // 2. Tambahkan route untuk menghapus review
    route::delete('/articles/{articles}', [ReviewController::class, 'destroy'])->name('reviews.destroy');
});

/**
*   - Middleware: `auth` dan `role:admin`
*   - Prefix URL: `/admin`
*   - Rute-rute terkait CRUD produk:
*       - GET `/products` → `ProductController@index` (route name: `admin.index`)
*       - GET `/products/create` → `ProductController@create` (route name: `admin.create`)
*       - POST `/products` → `ProductController@store` (route name: `admin.store`)
*       - GET `/products/{product}/edit` → `ProductController@edit` (route name: `admin.edit`)
*       - PUT `/products/{product}` → `ProductController@update` (route name: `admin.update`)
*       - DELETE `/products/{product}` → `ProductController@destroy` (route name: `admin.destroy`)
*/
Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    // 1. Tambahkan route untuk menampilkan daftar produk
    route::get('/products', [ProductController::class, 'index'])->name('admin.index');
    // 2. Tambahkan route untuk menampilkan form tambah produk
    route::get('/products/create', [ProductController::class, 'create'])->name('admin.create');
    // 3. Tambahkan route untuk menyimpan produk baru
    route::post('/products', [ProductController::class, 'store'])->name('admin.store');
    // 4. Tambahkan route untuk menampilkan form edit produk
    route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('admin.edit');
    // 5. Tambahkan route untuk menyimpan perubahan produk
    route::put('/products/{product}', [ProductController::class, 'update'])->name('admin.update');
    // 6. Tambahkan route untuk menghapus produk
    route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('admin.destroy');
});
