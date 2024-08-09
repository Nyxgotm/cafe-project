<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CouponController extends Controller
{
    function index()
    {
        return view('panel.coupons.index');
    }
    function create()
    {
        $categories = Category::all();
        return view('panel.coupons.create',compact('categories'));
    }
    function store(Request $request){
        $errors=[];
        if($request->input('amount_type')==0){
            if($request->input('amount')<1 && $request->input('amount')>99){
                $errors=['Amount as percent must be between 1 and 99.'];
            }
        }
        else{
            if($request->input('amount_type')==1){
                if($request->input('amount')<10000 && $request->input('amount')>1000000){
                    $errors=['Amount as number must be between 10000 and 1000000.'];
                }
            }
        }
        $errors=array_merge($errors,Validator::make($request->all(),[
            'title'=>['required','unique:coupons'],
            'type'=>['required','in:0,1'],
            'category_id'=>['required_if:type,1'],
            'amount'=>['required','integer'],
            'expire_date'=>['required','after:today'],
        ],[
            'title.required' => ' The field is required.',
            'title.unique' => ' The field is already taken.',
            'type.required' => ' The field is required.',
            'type.in' => ' The field must be user or category.',
            'category_id.required_if' => ' The field is required.',
            'amount.required' => ' The field is required.',
            'amount.integer' => ' The field must be integer.',
            'expire_date.required' => ' The field is required.',
            'expire_date.after' => ' The field must be date after today.',
        ])->errors()->all());
        if (empty($errors)){
            Category::create([
                'title'=>$request->title,
                'type'=>$request->type,
                'category_id'=>$request->category,
                'amount'=>$request->amount,
                'expire_date'=>$request->expire_date,
            ]);
        }



    }
}
