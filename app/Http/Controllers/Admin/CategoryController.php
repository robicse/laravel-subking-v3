<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;


class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::latest()->get();
        return view('backend.admin.products.category.index', compact('categories'));
    }


    public function create()
    {
        return view('backend.admin.products.category.create');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'image' => 'required'
        ]);

        $cat = new Category();
        $cat->name = $request->name;
        $cat->slug = Str::slug($request->name);
        $image = $request->file('image');
        if (isset($image)) {
            //make unique name for image
            $currentDate = Carbon::now()->toDateString();
            $imagename = $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
//            resize image for hospital and upload
            $proImage =Image::make($image)->resize(1200, 800)->save($image->getClientOriginalExtension());
            Storage::disk('public')->put('uploads/category/'.$imagename, $proImage);

        }else {
            $imagename = "default.png";
        }
        $cat->image = $imagename;
        $cat->save();
        Toastr::success('Category Created Successfully', 'Success');
        return redirect()->route('admin.category.index');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $cat = Category::find($id);
        return view('backend.admin.products.category.edit',compact('cat'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);
        $cat = Category::find($id);
        $cat->name = $request->name;
        $cat->slug = Str::slug($request->name);
        $image = $request->file('image');
        if (isset($image)) {
            //make unique name for image
            $currentDate = Carbon::now()->toDateString();
            $imagename = $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
            //delete old image.....
            if (Storage::disk('public')->exists('uploads/category/'. $cat->image)) {
                Storage::disk('public')->delete('uploads/category/'. $cat->image);
            }
//            resize image for hospital and upload
            $proImage =Image::make($image)->resize(1200, 800)->save($image->getClientOriginalExtension());
            Storage::disk('public')->put('uploads/category/'.$imagename, $proImage);
        }else {
            $imagename = $cat->image;
        }

        $cat->image = $imagename;
        $cat->save();
        Toastr::success('Category Updated Successfully', 'Success');
        return redirect()->route('admin.category.index');
    }


    public function destroy($id)
    {
        Category::destroy($id);
        Toastr::success('Category Updated Successfully', 'Success');
        return redirect()->route('admin.category.index');
    }

    //test for git
}
