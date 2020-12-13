<?php

namespace App\Http\Controllers\Frontend;

use App\Coupon;
use App\Order;
use App\OrderDetail;
use Brian2694\Toastr\Facades\Toastr;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;

class OrderController extends Controller
{
    public function order_place(){
        // remove carts data
        //Cart::destroy();
        // remove coupon data
        //Session::forget(['coupon_amount','coupon_discount_type','coupon_expired_date']);
        // remove location data
        //Session::forget(['rid','rpickedOrDeliveredValue','location_title','address','phn_no','lat','lng','open_close_time','pick_up','delivery']);
        return view('frontend.pages.order');
    }

    public function couponApply(Request $request){
        //dd($request->all());
        $coupon = $request->coupon;
        if(!empty($coupon)){
            $coupon_data = Coupon::where('code',$coupon)->first();
            //dd($coupon_data);
            if(!empty($coupon_data)){
                $amount = $coupon_data->amount;
                $discount_type = $coupon_data->discount_type;
                $expired_date = $coupon_data->expired_date;
                Session::put('coupon_amount',$amount);
                Session::put('coupon_discount_type',$discount_type);
                Session::put('coupon_expired_date',$expired_date);
            }else{
                Toastr::warning('Coupon does not exists !','warning');
                //return redirect()->back();
                return redirect('order/place/checkout');
            }

        }
        Toastr::success('Coupon discount added successfully !','success');
        //return redirect()->back();
        return redirect('order/place/checkout');
    }

    public function order_checkout(Request $request){
        $delivery_time = $request->delivery_time;
        $delivery_schedule_day = $request->delivery_schedule_day;
        $delivery_schedule_time = $request->delivery_schedule_time;
        return view('frontend.pages.checkout', compact('delivery_time','delivery_schedule_day','delivery_schedule_time'));
    }

    public function checkout_add(Request $request){
        //dd(Cart::content());
        $shipping_information_data = [
            'delivery_time' =>  $request->delivery_time ? $request->delivery_time : '',
            'delivery_schedule_day' =>  $request->delivery_schedule_day ? $request->delivery_schedule_day : '',
            'delivery_schedule_time' =>  $request->delivery_schedule_time ? $request->delivery_schedule_time : '',
            'location_title' =>  Session::get('location_title') ? Session::get('location_title') : '',
            'address' =>  Session::get('address') ? Session::get('address') : '',
            'phn_no' =>  Session::get('phn_no') ? Session::get('phn_no') : '',
            'lat' =>  Session::get('lat') ? Session::get('lat') : '',
            'lng' =>  Session::get('lng') ? Session::get('lng') : '',
        ];

        $order = new Order();
        $order->first_name = $request->first_name;
        $order->last_name = $request->last_name;
        $order->email = $request->email;
        $order->phone = $request->phone;
        $order->shipping_process = Session::get('rpickedOrDeliveredValue') ? Session::get('rpickedOrDeliveredValue') : '';
        $order->shipping_information = json_encode($shipping_information_data);
        $order->coupon_discount_type = Session::get('coupon_discount_type') ? Session::get('coupon_discount_type') : NULL;
        $order->coupon_discount_amount = Session::get('coupon_amount') ? Session::get('coupon_amount') : 0;
        $order->total_amount = 0;
        $order->save();





        $sum_total_amount = 0;
        $total_amount = 0;
        foreach(Cart::content() as $cart_data){

            $total_amount += $cart_data->options->final_price;

            $order_detail = new OrderDetail;
            $order_detail->order_id = $order->id;
            $order_detail->product_id = $cart_data->id;
            $order_detail->qty = $cart_data->qty;
            $order_detail->price = $cart_data->price;
            $order_detail->ingredient_ids = json_encode($cart_data->options->ingredients);
            $order_detail->save();
        }


        if(Session::get('coupon_amount')){
            $sum_total_amount = $total_amount - Session::get('coupon_amount');
        }
        //$sum_total_amount = ($total_amount - Session::get('coupon_amount') ? Session::get('coupon_amount') : 0);




        // start stripe payment gateway
        //dd($request->all());
        // locally workable
//        $token = $_POST['stripeToken'];
//        $stripe = new \Stripe\StripeClient(
//            'sk_test_51HMcwLFCAzEBifE7YToLkPnhp9NmExvKVphXYSR7BUT4DtXNZ46MH4IjOS1oIQurME7TPgCgGeNuZPZWLv14Botd00B5ReEZHr'
//        );
//        $charge = $stripe->charges->create([
//            'amount' => $total_amount*100, // stripe knows default cents value, so multiply 100 all time for dollar
//            'currency' => 'usd',
//            'source' => $token,
//            'description' => 'Transaction Successfully done.',
//        ]);
        //dd($charge);
        // end stripe payment gateway



        $order_update = Order::find($order->id);
        $order_update->total_amount = $sum_total_amount;
        $order_update->pay_online = $request->pay_online;
        //$order_update->calculated_statement_descriptor = $charge->calculated_statement_descriptor;
        $order_update->transaction_amount = $sum_total_amount;
        //$order_update->transaction_amount_refunded = $charge->amount_refunded;
        //$order_update->transaction_currency = $charge->currency;
        //$order_update->transaction_status = $charge->status;
        $order_update->update();

        // remove carts data
        Cart::destroy();
        // remove coupon data
        Session::forget(['coupon_amount','coupon_discount_type','coupon_expired_date']);
        // remove location data
        Session::forget(['rid','rpickedOrDeliveredValue','location_title','address','phn_no','lat','lng','open_close_time','pick_up','delivery']);

        Toastr::success('Your order added successfully !','success');
        return redirect()->route('index');
    }
}
