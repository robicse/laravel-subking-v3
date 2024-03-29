<?php

namespace App\Http\Controllers\Frontend;


use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class RegistrationController extends Controller
{
    public function userRegForm()
    {
        return view('frontend.reg');
    }
    public function UserStore(Request $request)
    {

        $this->validate($request, [
           'name' =>  'required',
           'email' =>  'required|email|unique:users,email',
            //'mobile_number' => 'required|unique:users,mobile_number',
           'password' =>  'required|confirmed|min:6',
        ]);
        //dd($request);
        $userReg = new User();
        $userReg->name = $request->name;
        $userReg->email = $request->email;
        $userReg->mobile_number = $request->mobile_number;
        $userReg->address = $request->address;
        $userReg->lat = $request->lat;
        $userReg->lng = $request->lng;
        $userReg->password = Hash::make($request->password);
       // dd($request);
        //dd($userReg);
        $userReg->save();
        //dd($userReg);
        Toastr::success('Your registration successfully done!');
        $credential = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ];
        if (Auth::attempt($credential)) {
            return redirect()->route('user.dashboard');
        }
    }
}
