<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class HomeController extends Controller
{
    function index(){

        $categories = Category::all();
        $products = [];
        if (request("category")){
            $products = Product::where('category_id', request("category"))->get();
        }
        elseif (request('search')){
            $search=request("search");
            $products = Product::where('title', 'LIKE', '%'.$search.'%')->get();
        }
        else {
            $products = Product::all();
        }

        return view('home.index', compact('categories','products'));

    }
}
