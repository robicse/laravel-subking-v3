<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    public function cartOne(){
        return view('frontend.pages.cart');
    }
    public function cartTwo(){
        return view('frontend.pages.cart2');
    }
    public function cartThree(){
        return view('frontend.pages.cart3');
    }
}
