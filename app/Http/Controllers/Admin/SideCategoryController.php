<?php

namespace App\Http\Controllers\Admin;

use App\SideCategory;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class SideCategoryController extends Controller
{

    public function index()
    {
        $sideCategories = SideCategory::latest()->get();
        return view('backend.admin.products.sideCategory.index', compact('sideCategories'));
    }


    public function create()
    {
        return view('backend.admin.products.sideCategory.create');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        $cat = new SideCategory();
        $cat->name = $request->name;
        $cat->slug = Str::slug($request->name);
        $cat->save();
        Toastr::success('Side Category Created Successfully', 'Success');
        return redirect()->route('admin.sidecategory.index');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $sideCategories = SideCategory::find($id);
        return view('backend.admin.products.sideCategory.edit',compact('sideCategories'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);
        $cat = SideCategory::find($id);
        $cat->name = $request->name;
        $cat->slug = Str::slug($request->name);
        $cat->save();
        Toastr::success('Side Category Updated Successfully', 'Success');
        return redirect()->route('admin.sidecategory.index');
    }


    public function destroy($id)
    {
        SideCategory::destroy($id);
        Toastr::success('Side Category Updated Successfully', 'Success');
        return redirect()->route('admin.sidecategory.index');
    }
}
