<?php

namespace App\Http\Controllers\Admin;

use App\Order;
use App\OrderDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function orderList(){
        $orders = Order::all();
        return view('backend.admin.orders.order_list', compact('orders'));
    }

    public function orderDetails($order_id){
        //echo $order_id;exit;
        $order = Order::find($order_id);
        $order_details = OrderDetail::where('order_id',$order_id)->get();
        //dd($order_details);
        return view('backend.admin.orders.order_details', compact('order','order_details'));
    }

    public function orderTransactionList(){
        $order_transactions = Order::all();
        return view('backend.admin.orders.order_transaction_list', compact('order_transactions'));
    }
}
