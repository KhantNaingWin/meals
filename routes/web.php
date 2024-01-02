<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UI\ProductController as UIProductController;

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
Route::get('ui/product', [UIProductController::class, 'index']);
Route::get('cart', [UIProductController::class, 'cart'])->name('cart');
Route::get('add-to-cart/{id}', [UIProductController::class, 'addToCart'])->name('add.to.cart');
Route::patch('update-cart', [UIProductController::class, 'update'])->name('update.cart');
Route::delete('remove-from-cart', [UIProductController::class, 'remove'])->name('remove.from.cart');


Route::get('/', function () {
    return view('welcome');
});
Route::resource('products', ProductController::class);
Route::resource('categories', CategoryController::class);
