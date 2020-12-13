<?php

namespace App\Http\Controllers\Admin;

use App\Ingredient;
use App\SideCategory;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class IngredientController extends Controller
{

    public function index()
    {
        $ingredients = Ingredient::latest()->get();
        return view('backend.admin.products.ingredient.index',compact('ingredients'));
    }


    public function create()
    {
        $sideCategories =SideCategory::all();
        return view('backend.admin.products.ingredient.create',compact('sideCategories'));
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'name' =>  'required',
            //'price_status' =>  'required',
            'price' =>  'required',
            'status' =>  'required',
        ]);
        $ingredients = new Ingredient();
        $ingredients->name = $request->name;
        $ingredients->slug = Str::slug($request->name);
        $ingredients->side_category_id = $request->side_category_id;
        $ingredients->price_status = 0;
        $ingredients->price = $request->price;
        $ingredients->status = $request->status;
        $image = $request->file('image');
        if (isset($image)) {
            //make unique name for image
            $currentDate = Carbon::now()->toDateString();
            $imagename = $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
//            resize image for hospital and upload
            $proImage =Image::make($image)->resize(400, 400)->save($image->getClientOriginalExtension());
            Storage::disk('public')->put('uploads/ingredient/'.$imagename, $proImage);


        }else {
            $imagename = "default.png";
        }

        $ingredients->image = $imagename;
        //dd($image);
        $ingredients->save();
        Toastr::success('Ingredient Updated successfully !');
        return redirect()->route('admin.ingredient.index');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $sideCategories = SideCategory::all();
        $ingredients = Ingredient::find($id);
        return view('backend.admin.products.ingredient.edit',compact('sideCategories','ingredients'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' =>  'required',
            //'price_status' =>  'required',
            'price' =>  'required',
            'status' =>  'required',
        ]);
        $ingredients = Ingredient::find($id);
        $ingredients->name = $request->name;
        $ingredients->slug = Str::slug($request->name);
        $ingredients->side_category_id = $request->side_category_id;
        $ingredients->price_status = 0;
        $ingredients->price = $request->price;
        $ingredients->status = $request->status;
        $image = $request->file('image');
        if (isset($image)) {
            //make unique name for image
            $currentDate = Carbon::now()->toDateString();
            $imagename = $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
            //delete old image.....
            if (Storage::disk('public')->exists('uploads/ingredient/'. $ingredients->image)) {
                Storage::disk('public')->delete('uploads/ingredient/'. $ingredients->image);
            }
//            resize image for hospital and upload
            $proImage =Image::make($image)->resize(400, 400)->save($image->getClientOriginalExtension());
            Storage::disk('public')->put('uploads/ingredient/'.$imagename, $proImage);


        }else {
            $imagename = $ingredients->image;
        }

        $ingredients->image = $imagename;
        //dd($image);
        $ingredients->save();
        Toastr::success('Ingredient Updated successfully !');
        return redirect()->route('admin.ingredient.index');
    }


    public function destroy($id)
    {
        $ingredients = Ingredient::find($id);
        //delete old image.....
        Storage::disk('public')->delete('uploads/ingredient/' . $ingredients->pro_image);
        $ingredients->delete();
        Toastr::success('Ingredient Deleted Successfully Done!');
        return redirect()->route('admin.ingredient.index');
    }
}
