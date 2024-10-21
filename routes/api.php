<?php

use App\Http\Controllers\ProductsController;
use App\Http\Controllers\SuppliersController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// PRODUCTS
Route::get('/getAll', [ProductsController::class, 'getAll']);
Route::post('/getStoreProducts', [ProductsController::class, 'getStoreProducts']);
Route::post('/insertStoreProduct', [ProductsController::class, 'insertStoreProduct']);
// SUPPLIERS
Route::get('/getStoreSuppliers', [SuppliersController::class, 'getStoreSuppliers']);
