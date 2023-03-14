<?php

use App\Http\Controllers\Admin\CategoryController;
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
Route::get('/admin/products', [AdminController::class, 'dashboard'])->name('admin.product');
Route::get('/admin/categories', [CategoryController::class, 'index'])->name('admin.categories');

/*Route::middleware(['auth','isAdmin'])->group(function () {
    Route::get('/dashboard', function () {
       //return view('admin.dashboard');
       return 'this is admin';
    });

 });*/
