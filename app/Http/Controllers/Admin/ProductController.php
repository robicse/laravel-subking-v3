<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Product;
use App\ProductDouble;
use App\ProductSingle;
use App\SubCategory;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('id','desc')->paginate(10);
        return view('backend.admin.products.product.index',compact('products'));
    }

    public function create()
    {
        $categories =Category::all();
        $subCategories = SubCategory::all();
        return view('backend.admin.products.product.create',compact('categories','subCategories'));
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $this->validate($request, [
            'name' =>  'required',
            'category_id' =>  'required',
            //'sub_category_id' =>  'required',
            'price' =>  'required',
            'image' =>  'required',
        ]);
        $products = new Product();
        $products->name = $request->name;
        $products->slug = Str::slug($request->name);
        $products->category_id = $request->category_id;
        $products->sub_category_id = $request->sub_category_id ? $request->sub_category_id : NULL;
        $products->price = $request->price;
        $products->single = $request->single;
        $products->double = $request->double;
        $products->status = $request->status;
        $image = $request->file('image');
        if (isset($image)) {
            //make unique name for image
            $currentDate = Carbon::now()->toDateString();
            $imagename = $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
            //resize image for product and upload
            $proImage =Image::make($image)->resize(1200, 800)->save($image->getClientOriginalExtension());
            Storage::disk('public')->put('uploads/product/'.$imagename, $proImage);
        }else {
            $imagename = "default.png";
        }
        $products->image = $imagename;
        $products->save();
        if(!empty($products->id)){
            // single product
            if($request->single == 1){
                $productSingle = new ProductSingle;
                $productSingle->product_id=$products->id;
                $productSingle->single_name=$request->single_name;
                $productSingle->single_price=$request->single_price;
                $productSingle->single_active_inactive=1;
                $single_image = $request->file('single_image');
                if (isset($single_image)) {
                    //make unique name for image
                    $currentDate = Carbon::now()->toDateString();
                    $singleimagename = $currentDate . '-' . uniqid() . '.' . $single_image->getClientOriginalExtension();
                    //resize image for product and upload
                    $singleproImage =Image::make($single_image)->resize(400, 400)->save($single_image->getClientOriginalExtension());
                    Storage::disk('public')->put('uploads/product_single/'.$singleimagename, $singleproImage);
                }else {
                    $singleimagename = "default.png";
                }
                $productSingle->single_image = $singleimagename;
                //dd($productSingle);
                $productSingle->save();
            }
            // double product
            if($request->double == 1){
                $productDouble = new ProductDouble;
                $productDouble->product_id=$products->id;
                $productDouble->double_name=$request->double_name;
                $productDouble->double_price=$request->double_price;
                $productDouble->double_active_inactive=1;
                $double_image = $request->file('double_image');
                if (isset($double_image)) {
                    //make unique name for image
                    $currentDate = Carbon::now()->toDateString();
                    $doubleimagename = $currentDate . '-' . uniqid() . '.' . $double_image->getClientOriginalExtension();
                    //resize image for product and upload
                    $doubleproImage =Image::make($double_image)->resize(400, 400)->save($double_image->getClientOriginalExtension());
                    Storage::disk('public')->put('uploads/product_double/'.$doubleimagename, $doubleproImage);
                }else {
                    $doubleimagename = "default.png";
                }
                $productDouble->double_image = $doubleimagename;
                $productDouble->save();
            }

        }
        Toastr::success('Product Created successfully !');
        return redirect()->route('admin.product.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $product = Product::find($id);
        $productSingle = ProductSingle::where('product_id',$id)->get();
        $productDouble = ProductDouble::where('product_id',$id)->get();
        $categories =Category::all();
        $subCategories = SubCategory::all();
        return view('backend.admin.products.product.edit',compact('product','productSingle','productDouble','categories','subCategories'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' =>  'required',
            'category_id' =>  'required',
            //'sub_category_id' =>  'required',
            'price' =>  'required',
        ]);
        $products = Product::find($id);
        $products->name = $request->name;
        $products->slug = Str::slug($request->name);
        $products->category_id = $request->category_id;
        $products->sub_category_id = $request->sub_category_id ? $request->sub_category_id : NULL;
        $products->price = $request->price;
        $products->single = $request->single;
        $products->double = $request->double;
        $products->status = $request->status;
        $image = $request->file('image');
        if (isset($image)) {
            //make unique name for image
            $currentDate = Carbon::now()->toDateString();
            $imagename = $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
            //resize image for product and upload
            $proImage =Image::make($image)->resize(1200, 800)->save($image->getClientOriginalExtension());
            Storage::disk('public')->put('uploads/product/'.$imagename, $proImage);
        }else {
            $imagename = $products->image;
        }
        $products->image = $imagename;
        $products->update();
        if(!empty($products->id)){
            // single product
            if($request->single == 1){
                $product_single_check_id = ProductSingle::where('product_id',$products->id)->pluck('id')->first();
                if(empty($product_single_check_id)){
                    $productSingle = new ProductSingle;
                    $productSingle->product_id=$products->id;
                    $productSingle->single_name=$request->single_name;
                    $productSingle->single_price=$request->single_price;
                    $productSingle->single_active_inactive=1;
                    $single_image = $request->file('single_image');
                    if (isset($single_image)) {
                        //make unique name for image
                        $currentDate = Carbon::now()->toDateString();
                        $singleimagename = $currentDate . '-' . uniqid() . '.' . $single_image->getClientOriginalExtension();
                        //resize image for product and upload
                        $singleproImage =Image::make($single_image)->resize(400, 400)->save($single_image->getClientOriginalExtension());
                        Storage::disk('public')->put('uploads/product_single/'.$singleimagename, $singleproImage);
                    }else {
                        $singleimagename = "default.png";
                    }
                    $productSingle->single_image = $singleimagename;
                    //dd($productSingle);
                    $productSingle->save();
                }else{
                    $productSingle = ProductSingle::find($product_single_check_id);
                    $productSingle->product_id=$products->id;
                    $productSingle->single_name=$request->single_name;
                    $productSingle->single_price=$request->single_price;
                    $productSingle->single_active_inactive=1;
                    $single_image = $request->file('single_image');
                    if (isset($single_image)) {
                        //make unique name for image
                        $currentDate = Carbon::now()->toDateString();
                        $singleimagename = $currentDate . '-' . uniqid() . '.' . $single_image->getClientOriginalExtension();
                        //resize image for product and upload
                        $singleproImage =Image::make($single_image)->resize(400, 400)->save($single_image->getClientOriginalExtension());
                        Storage::disk('public')->put('uploads/product_single/'.$singleimagename, $singleproImage);
                    }else {
                        $singleimagename = "default.png";
                    }
                    $productSingle->single_image = $singleimagename;
                    $productSingle->update();
                }
            }
            // double product
            if($request->double == 1){
                $product_double_check_id = ProductDouble::where('product_id',$products->id)->pluck('id')->first();
                if(empty($product_double_check_id)){
                    $productDouble = new ProductDouble;
                    $productDouble->product_id=$products->id;
                    $productDouble->double_name=$request->double_name;
                    $productDouble->double_price=$request->double_price;
                    $productDouble->double_active_inactive=1;
                    $double_image = $request->file('double_image');
                    if (isset($double_image)) {
                        //make unique name for image
                        $currentDate = Carbon::now()->toDateString();
                        $doubleimagename = $currentDate . '-' . uniqid() . '.' . $double_image->getClientOriginalExtension();
                        //resize image for product and upload
                        $doubleproImage =Image::make($double_image)->resize(400, 400)->save($double_image->getClientOriginalExtension());
                        Storage::disk('public')->put('uploads/product_double/'.$doubleimagename, $doubleproImage);
                    }else {
                        $doubleimagename = "default.png";
                    }
                    $productDouble->double_image = $doubleimagename;
                    $productDouble->save();
                }else{
                    $productDouble = ProductDouble::find($product_double_check_id);
                    $productDouble->product_id=$products->id;
                    $productDouble->double_name=$request->double_name;
                    $productDouble->double_price=$request->double_price;
                    $productDouble->double_active_inactive=1;
                    $double_image = $request->file('double_image');
                    if (isset($double_image)) {
                        //make unique name for image
                        $currentDate = Carbon::now()->toDateString();
                        $doubleimagename = $currentDate . '-' . uniqid() . '.' . $double_image->getClientOriginalExtension();
                        //resize image for product and upload
                        $doubleproImage =Image::make($double_image)->resize(400, 400)->save($double_image->getClientOriginalExtension());
                        Storage::disk('public')->put('uploads/product_double/'.$doubleimagename, $doubleproImage);
                    }else {
                        $doubleimagename = "default.png";
                    }
                    $productDouble->double_image = $doubleimagename;
                    $productDouble->update();
                }
            }

        }
        Toastr::success('Product Updated successfully !');
        return redirect()->route('admin.product.index');
    }

    public function destroy($id)
    {
        $products = Product::find($id);
        //delete old image.....
        Storage::disk('public')->delete('uploads/product/' . $products->image);
        $products->delete();
        Toastr::success('Product Deleted Successfully Done!');
        return redirect()->route('admin.product.index');
    }

    public function subCategoryList(Request $request){
        //echo $request->category_id;
        $sub_categories = SubCategory::where('category_id',$request->category_id)->get();
        $options = '';
        if(!empty($sub_categories)){
            foreach($sub_categories as $sub_category){
                $options .= "<option value='$sub_category->id'>$sub_category->name</option>";
            }
        }else{
            $options .= "<option value=''>No Result Found!</option>";
        }
        return response()->json(['success'=>true, 'data'=>$options]);
    }
}
