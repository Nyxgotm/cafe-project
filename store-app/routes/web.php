<?php

use App\Http\Controllers\Panel\CategoryController;
use App\Http\Controllers\Panel\ProductController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

//Start Category Route

Route::get('/categories', [CategoryController::class, 'index'])->name('categories');

Route::get('/create', [CategoryController::class,'create'])->name('create');

Route::post('/categories/store', [CategoryController::class,'store'])->name('categories.store');

Route::get('/categories',[CategoryController::class,'show']);

Route::get('/categories/delete/{category}',[CategoryController::class,'destroy'])->name('categories.delete');

Route::get('/categories/edit/{category}' ,[CategoryController::class,'edit'])->name('categories.edit');

Route::post('/categories/update/{category}',[CategoryController::class,'update'])->name('categories.update');

//End Category Route

//Start Product Route

Route::get('/products',[ProductController::class,'index'])->name('products');

Route::get('/create/product',[ProductController::class,'create'])->name('create.products');

Route::post('/products/store',[ProductController::class,'store'])->name('products.store');

//End Product Route



