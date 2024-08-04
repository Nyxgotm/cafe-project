<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
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
Route::middleware(['web','auth','role:admin'])->group(function (){
    //Start Category Route

    Route::get('/categories', [CategoryController::class, 'index'])->name('categories');

    Route::get('/create', [CategoryController::class,'create'])->name('create');

    Route::post('/categories/store', [CategoryController::class,'store'])->name('categories.store');

    Route::get('/categories/delete/{category}',[CategoryController::class,'destroy'])->name('categories.delete');

    Route::get('/categories/edit/{category}' ,[CategoryController::class,'edit'])->name('categories.edit');

    Route::post('/categories/update/{category}',[CategoryController::class,'update'])->name('categories.update');

    //End Category Route

    //Start Product Route

    Route::get('/products',[ProductController::class,'index'])->name('products');

    Route::get('/create/product',[ProductController::class,'create'])->name('create.products');

    Route::post('/products/store',[ProductController::class,'store'])->name('products.store');

    Route::get('/products/delete/{product}',[ProductController::class,'destroy'])->name('products.delete');

    Route::get('/products/edit/{product}', [ProductController::class,'edit'])->name('products.edit');

    Route::post('/products/update/{product}',[ProductController::class,'update'])->name('products.update');

//End Product Route
});




//start home Route

Route::get('/',[HomeController::class,'index'])->name('home');

Route::get('/home',[HomeController::class,'index'])->name('home');

//End home Route



Auth::routes();

//start cart Route

Route::get('/cart',[CartController::class,'index'])->name('cart');

Route::get('/cart/add/{product}',[CartController::class,'create'])->name('add.cart');

Route::get('/cart/decrease/{item}',[CartController::class,'destroy'])->name('decrease.item');

Route::get('/cart/increase/{item}',[CartController::class,'update'])->name('increase.item');

//End cart Route

//Start Article Route

Route::get('/article',[ArticleController::class,'index'])->name('article');

Route::get('/article/create',[ArticleController::class,'create'])->name('article.create');

Route::post('/article/store',[ArticleController::class,'store'])->name('article.store');

Route::get('/article/delete/{article}',[ArticleController::class,'delete'])->name('article.delete');

Route::get('article/edit/{article}',[ArticleController::class,'edit'])->name('article.edit');

Route::post('article/update/{article}',[ArticleController::class,'update'])->name('article.update');

Route::get('article/show/{article}',[ArticleController::class,'show'])->name('article.show');

//End Article Route
