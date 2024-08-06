<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ArticleController extends Controller
{
    function index()
    {
        $articles=Article::all();
        return view('panel.article.index',compact('articles'));

    }
    function create()
    {
        return view('panel.article.create');
    }
    function store(Request $request){
        $errors=[];
        $errors =array_merge($errors,Validator::make($request->all(),[
            'title'=>['required','max:255'],
            'image'=>['required'],
            'description' => ['required','min:20']
        ],[
            'title.required' => 'Entering the title is mandatory',
            'title.max' => 'The entered title cannot be more than 255 characters',
            'image.required' => 'Entering the image is mandatory',
            'description.required' => 'Entering the description is mandatory',
            'description.min'=>'The entered description cannot be less than 20 characters'

        ])->errors()->all());

        if (empty($errors)){
            Article::create([
                $article_path=$request->file('image')->store('public/'),
                'title'=>$request->title,
                'image'=>str_replace('public/','',$article_path),
                'description'=>$request->description
            ]);
        }
        return redirect('/article')
            ->with('errors',$errors);
    }
    function delete(Article $article)
    {
        $article->delete();
        return redirect('/article');
    }
    function edit(Article $article)
    {
        return view('panel.article.edit',compact('article'));
    }
    function update(Article $article ,Request $request  )
    {
        $errors=[];
        $errors =array_merge($errors,Validator::make($request->all(),[
            'title'=>['required','max:255'],
            'image'=>['required'],
            'description' => ['required','min:20']
        ],[
            'title.required' => 'Entering the title is mandatory',
            'title.max' => 'The entered title cannot be more than 255 characters',
            'image.required' => 'Entering the image is mandatory',
            'description.required' => 'Entering the description is mandatory',
            'description.min'=>'The entered description cannot be less than 20 characters'

        ])->errors()->all());
        if (empty($errors)){
            $data=['title'=>$request->title];
            if ($request->hasFile('image')){
                $path = $request->file('image')->store('public/');
                $data['image'] = str_replace('public/', '', $path);
            }
            $article->update($data);
        }


        return redirect('/article')->with('errors',$errors);

    }
    function show(Article $article)
    {
        $article->increment('view',1);

        return view('home.show',compact('article'));

        return view('panel.article.create');

    }
    function store(Request $request){
        $errors=[];
        $errors =array_merge($errors,Validator::make($request->all(),[
            'title'=>['required','max:255'],
            'image'=>['required'],
            'description' => ['required','min:20']
        ],[
            'title.required' => 'Entering the title is mandatory',
            'title.max' => 'The entered title cannot be more than 255 characters',
            'image.required' => 'Entering the image is mandatory',
            'description.required' => 'Entering the description is mandatory',
            'description.min'=>'The entered description cannot be less than 20 characters'

        ])->errors()->all());

        if (empty($errors)){
            Article::create([
                $article_path=$request->file('image')->store('public/'),
                'title'=>$request->title,
                'image'=>str_replace('public/','',$article_path),
                'description'=>$request->description
            ]);
        }
        return redirect('/article')
            ->with('errors',$errors);


    }
    function delete(Article $article)
    {
        $article->delete();
        return redirect('/article');

    }
    function edit(Article $article)
    {

        return view('panel.article.edit',compact('article'));

    }
    function update(Article $article ,Request $request  )
    {
        $errors=[];
        $errors =array_merge($errors,Validator::make($request->all(),[
            'title'=>['required','max:255'],
            'image'=>['required'],
            'description' => ['required','min:20']
        ],[
            'title.required' => 'Entering the title is mandatory',
            'title.max' => 'The entered title cannot be more than 255 characters',
            'image.required' => 'Entering the image is mandatory',
            'description.required' => 'Entering the description is mandatory',
            'description.min'=>'The entered description cannot be less than 20 characters'

        ])->errors()->all());
        if (empty($errors)){
            $data=['title'=>$request->title];
            if ($request->hasFile('image')){
                $path = $request->file('image')->store('public/');
                $data['image'] = str_replace('public/', '', $path);
            }
            $article->update($data)->with('errors',$errors);
        }


        return redirect('/article');

    }
    function show(Article $article)
    {
        $article->increment('view',1);

        return view('home.show',compact('article'));

    }
}
