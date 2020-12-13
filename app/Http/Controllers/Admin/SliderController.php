<?php

namespace App\Http\Controllers\Admin;

use App\Slider;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class SliderController extends Controller
{

    public function index()
    {
        $sliders=Slider::latest()->get();
        return view('backend.admin.slider.index',compact('sliders'));
    }


    public function create()
    {
        $sliders = Slider::all();
        return view('backend.admin.slider.create',compact('sliders'));
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'title'=> 'required',
            'image'=> 'required',
        ]);
        $sliders = new Slider();
        $sliders->title = $request->title;
        $image = $request->file('image');
        if (isset($image)) {
            //make unique name for image
            $currentDate = Carbon::now()->toDateString();
            $imagename = $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
//            resize image for hospital and upload
            $proImage =Image::make($image)->resize(818, 461)->save($image->getClientOriginalExtension());
            Storage::disk('public')->put('slider/' . $imagename, $proImage);


        }else {
            $imagename = "default.png";
        }

        $sliders->image = $imagename;
        $sliders->save();
        Toastr::success('Slider Created Successfully', 'Success');
        return redirect()->route('admin.slider.index');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $sliders = Slider::find($id);
        return view('backend.admin.slider.edit',compact('sliders'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title'=> 'required',

        ]);

        $sliders =  Slider::find($id);
        $sliders->title = $request->title;
        $image = $request->file('image');
        if (isset($image)) {
            //make unique name for image
            $currentDate = \Illuminate\Support\Carbon::now()->toDateString();
            $imagename = $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
            //delete old image.....
            if(Storage::disk('public')->exists('slider/'.$sliders->image))
            {
                Storage::disk('public')->delete('slider/'.$sliders->image);
            }

//            resize image for hospital and upload
            $proImage = Image::make($image)->resize(818, 461)->save($image->getClientOriginalExtension());
            Storage::disk('public')->put('slider/' . $imagename, $proImage);

        }else {
            $imagename = $sliders->image;
        }

        $sliders->image = $imagename;
        $sliders->save();
        Toastr::success('Slider Updated Successfully', 'Success');
        return redirect()->route('admin.slider.index');
    }

    public function destroy($id)
    {
        //.dd($id);
        $sliders = Slider::find($id);
        //delete old image.....
        if (Storage::disk('public')->exists('slider/' . $sliders->image)) {
            Storage::disk('public')->delete('slider/' . $sliders->image);

        }
        $sliders->delete();
        Toastr::success('Slider Deleted Successfully', 'Success');
        return redirect()->back();
    }
}
