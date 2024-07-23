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

        if (Auth::check()) {

            $user_id = Auth::id();
            $cart = Cart::where('user_id' , $user_id)->first();

            if ($cart) {

                $cart_id = $cart->cart_id;
                $cart_item = Cart_Item::where(['cart_id' => $cart_id, 'product_id' => $product]);

                if (isset($cart_item)) {

                    $cart_item ->increment('quantity');
                    $cart_item ->update();

                }
                else {
                    $cart_item = Cart_Item::create([
                        $path = $product->file('image')->store('public/'),
                        'cart|_id' => $cart_id,
                        'product_id' => $product->product_id,
                        'quantity' => 1,
                        'title' => $product->title,
                        'price'=>$product->price,
                        'image' => str_replace('public/', '', $path),
                        'description'=>$product->description

                    ]);

                }
            }
           else {
              $cart = Cart::create([
                    'user_id' => $user_id ,
              ]);
                if ($cart){

                $cart_id = $cart->cart_id;


                $cart_item = Cart_Item::create([
                    $path = $product->file('image')->store('public/'),
                    'cart|_id' => $cart_id,
                    'product_id' => $product->product_id,
                    'quantity' => 1,
                    'title' => $product->title,
                    'price'=>$product->price,
                    'image' => str_replace('public/', '', $path),
                    'description'=>$product->description]);
                return redirect('/cart');

                }
                else{
                    echo "Error";
                }
           }

        }
        else{
            return  redirect(route('login'));

        }
    }
}
