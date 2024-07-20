<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Cart_Item;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    function index()
    {
        return view('home.cart');
    }
    function create(Product $product)
    {
        dd($product);
        if (Auth::check()) {
            $user_id = Auth::id();
            $cart = Cart::where('user_id', $user_id)->first();
            if (isset($cart)) {

                $cart_id = $cart->cart_id;

                $cart_item = Cart_Item::where(['cart_id' => $cart_id, 'product_id' => $product]);
                if (isset($cart_item)) {


                }
                else {
                    $cart_item = Cart_Item::create([
                        'cart|_id' => $cart_id,
                        'product_id' => $product->product_id
                    ]);

                }
            }
//            else {
//                $cart = Cart::create([
//                    'user_id' => $user_id,
//                ]);
//            } else{
//                $cart=new Cart();
//                $cart->user_id = Auth::id();
//                $cart->save();
//
//
//            }

        }
        else{
            return  redirect(route('login'));

        }
    }
}
