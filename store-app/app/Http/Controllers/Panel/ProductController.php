<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    function index()
    {

        $products=Product::all();
        return view('panel.products.index' ,compact('products'));

    }
    function create()
    {
        $categories = Category::all();
        return view('panel.products.create' , compact('categories'));
    }

    function store(Request $request)
    {
        $errors = [];
        $errors = array_merge($errors, Validator::make($request->all(), [
            'title' => ['required', 'max:255'],
            'image' => 'required',
            'price' => 'required',
            'description' => 'required'

        ], [
            'title.required' => 'Entering the title is mandatory',
            'title.max' => 'The entered title cannot be more than 255 characters',
            'image.required' => 'Entering the image is mandatory',
            'price.required' => 'Entering the price is mandatory',
            'description.required' => 'Entering the description is mandatory',

        ])->errors()->all());;

        if (empty($errors)) {
            Product::create([
                $path = $request->file('image')->store('public/'),
                'title' => $request->title,
                'category_id' => $request->category,
                'image' => str_replace('public/', '', $path),
                'price' => $request->price,
                'description' => $request->description
            ]);
            return redirect('/products');
        }
        return redirect("/products")
            ->with('errors',$errors);

    }

    function destroy(Product $product){
        $product->delete();
        return redirect('/products');

    }

    function edit(Product $product){
        $categories = Category::all();
        return view('panel.products.update', compact('product' ,'categories'));
    }

    function update(Request $request ,Product $product){
        $data = [
                 'title'=>$request ->title,
                 'category_id'=>$request->category,
                 'price'=>$request->price,
                 'description'=>$request->description
                ];
        if ($request->hasFile('image')){
            $path = $request->file('image')->store('public/');
            $data['image'] = str_replace('public/', '', $path);
        }

        $product->update($data);

        return redirect('/products');
    }
}
