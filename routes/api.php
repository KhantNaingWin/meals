<?php

use App\Http\Controllers\api\ApiController;
use App\Http\Controllers\api\ProductApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('category',[ApiController::class,'all']);
Route::get('/category/{id}',[ApiController::class,'getCategoryById']);

//Product
Route::get('product',[ProductApiController::class,'all']);
Route::get('product/{id}',[ProductApiController::class,'getProductId']);
