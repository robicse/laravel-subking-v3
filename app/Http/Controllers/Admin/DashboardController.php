<?php

namespace App\Http\Controllers\Admin;

use App\BlogPost;
use App\Order;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
         return view('backend.admin.dashboard');
    }
}
