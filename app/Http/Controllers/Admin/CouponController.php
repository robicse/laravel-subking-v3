<?php

namespace App\Http\Controllers\Admin;

use App\Coupon;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CouponController extends Controller
{
    public function index()
    {
        $coupons = Coupon::latest()->get();
        return view('backend.admin.coupon.index', compact('coupons'));
    }

    public function create()
    {
        return view('backend.admin.coupon.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'discount_type' => 'required',
            'code' => 'required',
            'amount' => 'required',
            'expired_date' => 'required',
        ]);

        $coupon = new Coupon();
        $coupon->discount_type = $request->discount_type;
        $coupon->code = $request->code;
        $coupon->amount = $request->amount;
        $coupon->expired_date = $request->expired_date;
        $coupon->save();

        Toastr::success('Coupon Created Successfully');
        return redirect()->route('admin.coupon.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $coupon = Coupon::find($id);
        return view('backend.admin.coupon.edit',compact('coupon'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'discount_type' => 'required',
            'code' => 'required',
            'amount' => 'required',
            'expired_date' => 'required',
        ]);

        $coupon = Coupon::find($id);
        $coupon->discount_type = $request->discount_type;
        $coupon->code = $request->code;
        $coupon->amount = $request->amount;
        $coupon->expired_date = $request->expired_date;
        $coupon->update();

        Toastr::success('Coupon Updated Successfully');
        return redirect()->route('admin.coupon.index');
    }

    public function destroy($id)
    {
        Coupon::destroy($id);
        Toastr::success('Coupon Deleted Successfully');
        return redirect()->route('admin.coupon.index');
    }
}
