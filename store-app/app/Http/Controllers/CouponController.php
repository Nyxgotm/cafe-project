<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Coupon;
use Illuminate\Http\Request;
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
        if($request->amount_type==0){
            if($request->amount<1 && $request->amount>99){
                $errors=['Amount as percent must be between 1 and 99.'];
            }
        }
        else{
            if($request->amount_type==1){
                if($request->amount<10000 && $request->amount>1000000){
                    $errors=['Amount as number must be between 10000 and 1000000.'];
                }
            }
        }
        $errors=array_merge($errors,Validator::make($request->all(),[
            'title'=>['required','unique:coupons'],
            'type'=>['required','in:0,1'],
            //'category_id'=>['required_if:type,1','exists:categories,category_id'],
            'amount_type'=>['required','in:0,1'],
            'amount'=>['required','integer'],
            'expire_date'=>['required','after:today'],
        ],[
            'title.required' => ' The title field is required.',
            'title.unique' => ' The field is already taken.',
            'type.required' => ' The type field is required.',
            'type.in' => ' The field must be user or category.',
            //'category_id.required_if' => ' The category field is required.',
            'amount_type.required' => ' The amount_type field is required.',
            'amount_type.in' => ' The amount_type must be percent or number.',
            'amount.required' => ' The amount field is required.',
            'amount.integer' => ' The field must be integer.',
            'expire_date.required' => ' The expire_date field is required.',
            'expire_date.after' => ' The field must be date after today.',
        ])->errors()->all());


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
}
