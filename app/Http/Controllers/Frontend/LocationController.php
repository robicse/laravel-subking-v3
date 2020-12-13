<?php

namespace App\Http\Controllers\Frontend;

use App\ShopLocation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LocationController extends Controller
{
    public function location($id)
    {
        $shopLocation = ShopLocation::find($id);
        return view('frontend.pages.location', compact('shopLocation'));
    }
}
