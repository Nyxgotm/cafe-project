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
        if (Auth::check()){
            $user = Auth::user();
            $cart = $user->cart;
            $data = Cart_Item::where('cart_id',$cart->cart_id)->get();

           $cartitems= $data->transform(function ($item) {
               return[
                   'cart_item_id'=>$item->cart_item_id,
                   'product_id'=>$item->product->product_id,
                   'title'=>$item->product->title,
                   'price'=>$item->product->price,
                   'category'=>$item->product->category->title,
                   'description'=>$item->product->description,
                   'image'=>$item->product->image,
                   'quantity'=>$item->quantity,
                   'total_price'=> $item->product->price * $item->quantity,
               ];
            });



                return view('home.cart', compact('cartitems'));
        }
        else{
        return  redirect(route('login'));

    }
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
    function destroy(Cart_Item $item){

        $quantity =$item->quantity;

            if ($quantity==1){

                $item->delete();
            }
            else{
                $item->decrement('quantity',1);
            }

        return redirect('/cart');

    }
    function update(Cart_Item $item){

        $item->increment('quantity');

        return redirect('/cart');


    }
}
