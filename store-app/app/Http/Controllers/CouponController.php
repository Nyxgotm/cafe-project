<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    function index()
    {
        return view('panel.coupons.index');
    }
    function create()
    {
        return view('panel.coupons.create');
    }
}
