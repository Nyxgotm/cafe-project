<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    function index(){

        $categories = Category::all();
        $products = Product::query();
        if (request("category")){
            $products = $products->where('category_id', request("category"))->get();
        }
        if (request('search')){
            $search=request("search");
            $products = $products->where('title', 'LIKE', '%'.$search.'%')->get();
        }
        $products=$products->get();

        return view('home.index', compact('categories','products'));
        dd(Auth::user());
    }
}
