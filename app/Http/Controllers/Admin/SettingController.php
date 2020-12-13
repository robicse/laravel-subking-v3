<?php

namespace App\Http\Controllers\Admin;

use App\Coupon;
use App\Setting;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::latest()->get();
        return view('backend.admin.setting.index', compact('settings'));
    }

    public function create()
    {
        return view('backend.admin.setting.create');
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $this->validate($request, [
            'logo' => 'required',
        ]);

        $setting = new Setting();
        $image = $request->file('logo');
        if (isset($image)) {
            //make unique name for image
            $currentDate = Carbon::now()->toDateString();
            $imagename = $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
//            resize image for hospital and upload
            $proImage =Image::make($image)->resize(860, 315)->save($image->getClientOriginalExtension());
            Storage::disk('public')->put('uploads/setting/' . $imagename, $proImage);


        }else {
            $imagename = "default.png";
        }

        $setting->logo = $imagename;
        $setting->save();

        Toastr::success('Setting Created Successfully');
        return redirect()->route('admin.setting.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $setting = Setting::find($id);
        return view('backend.admin.setting.edit',compact('setting'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'logo' => 'required',
        ]);

        $setting = Setting::find($id);
        $image = $request->file('logo');
        if (isset($image)) {
            //make unique name for image
            $currentDate = Carbon::now()->toDateString();
            $imagename = $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();

            //delete old image.....
            if(Storage::disk('public')->exists('uploads/setting/'.$setting->logo))
            {
                Storage::disk('public')->delete('uploads/setting/'.$setting->logo);
            }

//            resize image for hospital and upload
            $proImage =Image::make($image)->resize(860, 315)->save($image->getClientOriginalExtension());
            Storage::disk('public')->put('uploads/setting/' . $imagename, $proImage);


        }else {
            $imagename = $setting->logo;
        }

        $setting->logo = $imagename;
        $setting->save();

        Toastr::success('Setting Updated Successfully');
        return redirect()->route('admin.setting.index');
    }

    public function destroy($id)
    {
        Setting::destroy($id);
        Toastr::success('Setting Deleted Successfully');
        return redirect()->route('admin.setting.index');
    }
}
