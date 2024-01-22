<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UI\ProductController as UIProductController;

Route::redirect('/','/home');
Route::prefix('admin')->group(function () {
    Route::get('order',[OrderController::class,'index'])->name('order#list');
    Route::get('ui/product', [UIProductController::class, 'index']);
    Route::get('cart', [UIProductController::class, 'cart'])->name('cart');
    Route::get('add-to-cart/{id}', [UIProductController::class, 'addToCart'])->name('add.to.cart');
    Route::patch('update-cart', [UIProductController::class, 'update'])->name('update.cart');
    Route::delete('remove-from-cart', [UIProductController::class, 'remove'])->name('remove.from.cart');
    Route::post('checkout',[UIProductController::class,'checkout'])->name('checkout')->middleware('auth');
    Route::resource('products', ProductController::class);
    Route::resource('categories', CategoryController::class);


});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('admin/list',AdminController::class);
