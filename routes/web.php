<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
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

Route::prefix('/admin')->name('admin.')->group(function () {
    Route::get('/', [Controller::class, 'home'])->name('home');
    // =============================== user ============================================
    Route::prefix('/user')->name('users.')->group(function () {
        Route::get('/', [UserController::class, 'list'])->name('list');
        Route::get('/tao-moi', [UserController::class, 'getCreate'])->name('getCreate');
        Route::post('/tao-moi', [UserController::class, 'postCreate'])->name('postCreate');
        Route::get('/cap-nhat/{id}', [UserController::class, 'getUpdate'])->name('getUpdate');
        Route::post('/cap-nhat/{id}', [UserController::class, 'postUpdate'])->name('postUpdate');
        Route::delete('/xoa/{id}', [UserController::class, 'delete'])->name('delete');
        Route::post('/cap-nhat-trang-thai/{id}', [UserController::class, 'upStatus'])->name('upStatus');
    });
    // =============================== product ============================================
    Route::prefix('/product')->name('products.')->group(function () {
        Route::get('/', [ProductController::class, 'list'])->name('list');
        Route::get('/tao-moi', [ProductController::class, 'getCreate'])->name('getCreate');
        Route::post('/tao-moi', [ProductController::class, 'postCreate'])->name('postCreate');
        Route::get('/cap-nhat/{id}', [ProductController::class, 'getUpdate'])->name('getUpdate');
        Route::post('/cap-nhat/{id}', [ProductController::class, 'postUpdate'])->name('postUpdate');
        Route::delete('/xoa/{id}', [ProductController::class, 'delete'])->name('delete');
        Route::post('/cap-nhat-trang-thai/{id}', [ProductController::class, 'upStatus'])->name('upStatus');
    });
    // =============================== category ============================================
    Route::prefix('/category')->name('categories.')->group(function () {
        Route::get('/', [CategoryController::class, 'list'])->name('list');
        Route::get('/tao-moi', [CategoryController::class, 'getCreate'])->name('getCreate');
        Route::post('/tao-moi', [CategoryController::class, 'postCreate'])->name('postCreate');
        Route::get('/cap-nhat/{id}', [CategoryController::class, 'getUpdate'])->name('getUpdate');
        Route::post('/cap-nhat/{id}', [CategoryController::class, 'postUpdate'])->name('postUpdate');
        Route::delete('/xoa/{id}', [CategoryController::class, 'delete'])->name('delete');
        Route::post('/cap-nhat-trang-thai/{id}', [CategoryController::class, 'upStatus'])->name('upStatus');
    });
    // =============================== blog ============================================
    Route::prefix('/blog')->name('blogs.')->group(function () {
        Route::get('/', [BlogController::class, 'list'])->name('list');
        Route::get('/tao-moi', [BlogController::class, 'getCreate'])->name('getCreate');
        Route::post('/tao-moi', [BlogController::class, 'postCreate'])->name('postCreate');
        Route::get('/cap-nhat/{id}', [BlogController::class, 'getUpdate'])->name('getUpdate');
        Route::post('/cap-nhat/{id}', [BlogController::class, 'postUpdate'])->name('postUpdate');
        Route::delete('/xoa/{id}', [BlogController::class, 'delete'])->name('delete');
    });
    // =============================== brand ============================================
    Route::prefix('/brand')->name('brands.')->group(function () {
        Route::get('/', [BrandController::class, 'list'])->name('list');
        Route::get('/tao-moi', [BrandController::class, 'getCreate'])->name('getCreate');
        Route::post('/tao-moi', [BrandController::class, 'postCreate'])->name('postCreate');
        Route::get('/cap-nhat/{id}', [BrandController::class, 'getUpdate'])->name('getUpdate');
        Route::post('/cap-nhat/{id}', [BrandController::class, 'postUpdate'])->name('postUpdate');
        Route::delete('/xoa/{id}', [BrandController::class, 'delete'])->name('delete');
        Route::post('/cap-nhat-trang-thai/{id}', [BrandController::class, 'upStatus'])->name('upStatus');
    });
    // =============================== order ============================================
    Route::prefix('/order')->name('orders.')->group(function () {
        Route::get('/', [OrderController::class, 'list'])->name('list');
        Route::get('/tao-moi', [OrderController::class, 'getCreate'])->name('getCreate');
        Route::post('/tao-moi', [OrderController::class, 'postCreate'])->name('postCreate');
        Route::get('/cap-nhat/{id}', [OrderController::class, 'getUpdate'])->name('getUpdate');
        Route::post('/cap-nhat/{id}', [OrderController::class, 'postUpdate'])->name('postUpdate');
        Route::delete('/xoa/{id}', [OrderController::class, 'delete'])->name('delete');
    });
});

Route::prefix('')->name('clients.')->group(function () {
    Route::get('/', [HomeController::class, 'home'])->name('home');
});