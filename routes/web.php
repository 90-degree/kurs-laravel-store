<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Route;

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



Route::middleware(['guest'])->group(function () {
    Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);

    Route::get('/register', [AuthController::class, 'registerForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

Route::middleware(['auth'])->group(function () {
    Route::get('/', [ProductsController::class, 'index']);
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::get('/category/create', [CategoriesController::class, 'create']);
    Route::post('/category/create', [CategoriesController::class, 'store']);

    Route::get('/product/create', [ProductsController::class, 'create']);
    Route::post('/product/create', [ProductsController::class, 'store']);

    Route::get('/products/{product}', [ProductsController::class, 'show'])->name('products.show');
});
