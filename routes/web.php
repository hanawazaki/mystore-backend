<?php

use Illuminate\Support\Facades\Route ;

use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\ProductGalleryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::view('/', 'welcome')->name('welcome');

Route::middleware('auth', 'verified')->group(function () {
	Route::view('dashboard', 'dashboard')->name('dashboard');
	Route::view('profile', 'profile')->name('profile');

	Route::get('products/{id}/gallery', [ProductController::class,'gallery'])->name('products.gallery');

	Route::resource('products', ProductController::class);

	Route::get('cari-produk', [ProductController::class,'seacrh']);

	Route::resource('categories', CategoryController::class);

	Route::get('cari-kategori', [CategoryController::class,'search']);

	Route::resource('product-galleries', ProductGalleryController::class);

	Route::resource('transactions', TransactionController::class);

	Route::get('transactions/{id}/set-status', [TransactionController::class,'setstatus'])->name('transactions.status');
});
