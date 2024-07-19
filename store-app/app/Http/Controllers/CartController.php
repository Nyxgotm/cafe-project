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
            $user_id = Auth::id();
            $cart=Cart::where('user_id', $user_id)->first();
            if (isset($cart)){

            }
            else{
                $cart=new Cart();
                $cart->user_id = Auth::id();
                $cart->save();

            }

        }
        else{
            return  redirect(route('login'));

        }
    }

}
