<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    function index()
    {

        return view('panel.products.index');

    }
    function create()
    {
        $categories = Category::all();
        return view('panel.products.create' , compact('categories'));
    }
    function store(Request $request)
    {
        Product::create([
            $path = $request->file('image')->store('public/'),
            'title' => $request->title,
            'image' => str_replace('public/', '', $path),
            'price'=>$request->price,
            'description'=>$request->description
        ]);
        return redirect('/products');
    }
}
