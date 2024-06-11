<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    function index()
    {
        $categories = Category::all();
        return view('panel.categories.index', compact('categories'));
    }

    function create()
    {
        return view('panel.categories.create');
    }

    function store(Request $request)
    {

        Category::create([
            $path = $request->file('image')->store('public/'),
            'title' => $request->title,
            'image' => str_replace('public/', '', $path),
        ]);
        return redirect('/categories');
    }

    function destroy(Category $category)
    {
        $category->delete();
        return redirect('/categories');
    }

    function edit(Category $category)
    {
        return view('panel.categories.edit', compact('category'));
    }
    function update(Request $request, Category $category)
    {
        $data = ['title'=>$request ->title];
        if ($request->hasFile('image')){
            $path = $request->file('image')->store('public/');
            $data['image'] = str_replace('public/', '', $path);
        }
            $category->update($data);

        return redirect('/categories');
    }
}
