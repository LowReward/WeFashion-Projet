<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', [ProductController::class, 'index'])->name('products.index');
Route::get('/homme', [ProductController::class, 'homme'])->name('products.homme');
Route::get('/femme', [ProductController::class, 'femme'])->name('products.femme');
Route::get('/solde', [ProductController::class, 'solde'])->name('products.solde');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');
Route::match(['get', 'post'],'/admin/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login');
Route::get('/admin/products', [AdminController::class, 'dashboard']);

Route::get('/admin/products', [ProductController::class, 'dashboard'])->name('admin.products');
Route::get('/admin/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/admin/producsts', [ProductController::class, 'store'])->name('products.store');
Route::get('/admin/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::put('/admin/products/{id}', [ProductController::class, 'update'])->name('products.update');
Route::delete('/admin/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');

Route::get('/admin/categories', [CategoryController::class, 'index'])->name('admin.categories');
Route::get('/admin/categories/create', [CategoryController::class, 'create']);
Route::post('/admin/categories', [CategoryController::class, 'store'])->name('categories.store');
Route::get('/admin/categories/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
Route::put('/admin/categories/{id}', [CategoryController::class, 'update'])->name('categories.update');
Route::delete('/admin/categories/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');

