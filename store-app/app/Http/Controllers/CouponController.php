<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Coupon;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;

class CouponController extends Controller
{
    function index()
    {
        $coupons=Coupon::all();
        return view('panel.coupons.index',compact('coupons'));
    }
    function create()
    {
        $categories = Category::all();
        return view('panel.coupons.create',compact('categories'));
    }
    function store(Request $request){
        $errors=[];
        $errors=array_merge($errors,Validator::make($request->all(),[
            'title'=>['required','unique:coupons'],
            'type'=>['required','in:0,1'],
            'amount_type'=>['required','in:0,1'],
            'expire_date'=>['required','after:today'],
        ],[
            'title.required' => ' The title field is required.',
            'title.unique' => ' The field is already taken.',
            'type.required' => ' The type field is required.',
            'type.in' => ' The field must be user or category.',
            'amount_type.required' => ' The amount_type field is required.',
            'amount_type.in' => ' The amount_type must be percent or number.',
            'expire_date.required' => ' The expire_date field is required.',
            'expire_date.after' => ' The field must be date after today.',
        ])->after(function ($c) use ($request){
            if ($request['type']==1){
                $c->errors()->merge(Validator::make($request->all(),[
                    'category'=>['required'],
                ],[
                    'category.required' => ' The category field is required.',

                ]));
            }
            if ($request['amount_type']==0){
                $c->errors()->merge(Validator::make($request->all(),[
                    'amount'=>['required','integer','min:1','max:99']
                ],[
                    'amount.required' => ' The amount field is required.',
                    'amount.integer' => ' The field must be integer.',
                    'amount.min'=>'The field must be more than 1',
                    'amount.max'=>'The field must be less than 99'

                ]));
            }
            else{
                $c->errors()->merge(Validator::make($request->all(),[
                    'amount'=>['required','integer','min:10000','max:1000000']
                ],[
                    'amount.required' => ' The amount field is required.',
                    'amount.integer' => ' The field must be integer.',
                    'amount.min'=>'The field must be more than 10000',
                    'amount.max'=>'The field must be less than 1000000'
                ]));

            }
        })->errors()->all());




        if (empty($errors)){
           Coupon::create([
                'title'=>$request->title,
                'type'=>$request->type,
                'category_id' => $request->type == 0 ? null : $request->category,
                'amount_type'=>$request->amount_type,
                'amount'=>$request->amount,
                'expire_date'=>$request->expire_date,
            ]);
        }
        return redirect('/coupon')
            ->with('errors',$errors);

    }
    function destroy(Coupon $coupon)
    {
        $coupon->delete();
        return redirect('/coupon');

    }
    function check(Request $request){
    $errors_coupon=[];
    $errors_coupon=array_merge($errors_coupon,Validator::make($request->all(),[
        'coupon'=>['required','exists:coupons,title']
    ],[
        'coupon.required' => ' The coupon field is required.',
        'coupon.exists' => ' The coupon is not exist.',
    ])->after(function ($t) use ($request){


    })->errors()->all());


    }
}
