<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

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
    function store(){

    }
}
