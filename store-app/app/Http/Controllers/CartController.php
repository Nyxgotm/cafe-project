<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    function index()
    {
        if (Auth::check()){
            return view('home.cart');
        }
        else{
            return  redirect(route('login'));

        }
    }
    function create(Product $product)
    {
        if (Auth::check()){

            $categories=Category::all();
            return view('home.cart',compact('product','categories'));
        }
        else{
            return  redirect(route('login'));

        }
    }

}
