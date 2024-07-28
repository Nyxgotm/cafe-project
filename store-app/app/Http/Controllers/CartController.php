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
        $user_id =Auth::id();

        $cartitems=Cart_Item::with('product')->where('user_id',$user_id)->get();

        $transformcartitem=$cartitems->transform(function ($cartitem, $key) {
           return[
               'title'=>$cartitem->product->title,
               'price'=>$cartitem->product->price,
               'image'=>$cartitem->product->image,
               'quantity'=>$cartitem->quantity,
               'total_price'=> $cartitem->product->price * $cartitem->quantity,
           ];
        });

        return view('home.cart' , compact('transformcartitem'));
    }
    function create(Product $product)
    {

        if (Auth::check()) {

            $user_id = Auth::id();
            $cart = Cart::where('user_id' , $user_id)->first();

            if ($cart) {

                $cart_id = $cart->cart_id;
                $product_id = $product->product_id;
                $cart_item =Cart_Item::where(['cart_id' => $cart_id, 'product_id' => $product_id])->first();

                if($cart_item) {


                    $cart_item->increment('quantity');

                    return redirect('/cart');

                }
                else {
                         Cart_Item::create([
                        'cart_id' => $cart_id,
                        'product_id' => $product->product_id,
                        'quantity' => 1,
                    ]);
                    return redirect('/cart');

                }
            }
           else {

                if ($cart = Cart::create([
                    'user_id' => $user_id ,
                ]))
                {
                    $cart_id = $cart->cart_id;
                         Cart_Item::create([
                        'cart_id' => $cart_id,
                        'product_id' => $product->product_id,
                        'quantity' => 1,
                    ]);

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
