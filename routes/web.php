<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

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

//CLIENT
Route::get('/', function () {
    return view('client.home');
});

Route::get('/all-product', [ClientController::class, 'product']);
Route::get('/product-by-cate/{cate_id}', [ClientController::class, 'product_by_cate']);
Route::get('/product-info/{id}', [ClientController::class, 'product_info']);
Route::get('/find-product', [ClientController::class, 'find_product']);




//ADMIN
Route::get('/admin', action: function () {
    return view('admin.dashboard');
});

//Category
Route::resource('/categories', CategoryController::class);

//Product
Route::resource('/products', ProductController::class);