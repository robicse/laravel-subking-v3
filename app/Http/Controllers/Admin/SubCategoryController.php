<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\SubCategory;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class SubCategoryController extends Controller
{

    public function index()
    {
        $subcategories = SubCategory::latest()->get();
        return view('backend.admin.products.subcategory.index',compact('subcategories'));
    }


    public function create()
    {
        $categories = Category::all();
        return view('backend.admin.products.subcategory.create', compact('categories'));
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:sub_categories',
            'category_id' => 'required'
        ]);
        $subCat = new SubCategory();
        $subCat->name = $request->name;
        $subCat->category_id = $request->category_id;
        $subCat->slug = Str::slug($request->name);
        $image = $request->file('image');
        if (isset($image)) {
            //make unique name for image
            $currentDate = Carbon::now()->toDateString();
            $imagename = $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
            //resize image for hospital and upload
            $proImage =Image::make($image)->resize(1200, 800)->save($image->getClientOriginalExtension());
            Storage::disk('public')->put('uploads/sub_category/'.$imagename, $proImage);

        }else {
            $imagename = "default.png";
        }
        $subCat->image = $imagename;
        $subCat->save();
        Toastr::success('SubCategory Created Successfully','Success');
        return  redirect()->route("admin.subcategory.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *m  @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $categories = Category::all();
        $subcategory = SubCategory::find($id);
        return view('backend.admin.products.subcategory.edit', compact('categories','subcategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'category_id' => 'required'
        ]);
        $subCat =  SubCategory::find($id);
        $subCat->name = $request->name;
        $subCat->slug = Str::slug($request->name);
        $subCat->category_id = $request->category_id;
        $image = $request->file('image');
        if (isset($image)) {
            //make unique name for image
            $currentDate = Carbon::now()->toDateString();
            $imagename = $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
            //delete old image.....
            if (Storage::disk('public')->exists('uploads/sub_category/'. $subCat->image)) {
                Storage::disk('public')->delete('uploads/sub_category/'. $subCat->image);
            }
//            resize image for hospital and upload
            $proImage =Image::make($image)->resize(1200, 800)->save($image->getClientOriginalExtension());
            Storage::disk('public')->put('uploads/sub_category/'.$imagename, $proImage);
        }else {
            $imagename = $subCat->image;
        }

        $subCat->image = $imagename;
        $subCat->save();
        Toastr::success('SubCategory Updated Successfully','Success');
        return  redirect()->route("admin.subcategory.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        SubCategory::destroy($id);
        Toastr::success('SubCategory Deleted Successfully','Success');
        return  redirect()->route("admin.subcategory.index");
    }
}
