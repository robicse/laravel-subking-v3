<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MapController extends Controller
{
    public function map()
    {
        return view('frontend.pages.map');
    }
}
