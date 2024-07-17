<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    function index()
    {
        if (Auth::check()){
            $products = Product::all();
            return view('home.cart', compact('products'));
        }
        else{
            return  redirect(route('login'));

        }
    }
    function create(Product $product)
    {
        if (Auth::check()){

            
        }
        else{
            return  redirect(route('login'));

        }
    }

}
