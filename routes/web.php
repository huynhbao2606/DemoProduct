<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SanPhamController;
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

Auth::routes();

Route::get('/home', [SanPhamController::class, 'index']);
Route::get('/list-cate/{MaLoai}', [SanPhamController::class, 'listCate']);
Route::get('/add-product',[SanPhamController::class,'addproduct']);
Route::post('/add-product-post',[SanPhamController::class,'addproductpost']);
Route::get('/search', [SanPhamController::class, 'search']);

