<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

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
        $errors=[];
        $data = [];
        $errors = array_merge($errors,Validator::make($request->all(),[

            'title'=>['required','max:255'],
            'image'=>'required'

        ],[

            'title.required' =>'Entering the title is mandatory',
            'title.unique' =>'Your selected title is duplicate',
            'title.max' =>'The entered title cannot be more than 255 characters',
            'image.required' =>'Entering the image is mandatory',

        ])->errors()->all());


        if (empty($errors)){
           (Category::create([
                $path = $request->file('image')->store('public/'),
                'title' => $request->title,
                'image' => str_replace('public/', '', $path),
                $data ='Data was successfully recorded'
            ]));


        }
        return redirect("/categories")
            ->with('data',$data)
            ->with('errors',$errors);
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
