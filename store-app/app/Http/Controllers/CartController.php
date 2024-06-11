<?php

namespace App\Http\Controllers;

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
            return  redirect('/');

        }


    }
}
