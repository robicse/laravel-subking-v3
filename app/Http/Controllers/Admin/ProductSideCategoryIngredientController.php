<?php

namespace App\Http\Controllers\Admin;

use App\Ingredient;
use App\Product;
use App\ProductSideCategoryIngredient;
use App\SideCategory;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductSideCategoryIngredientController extends Controller
{
    public function index()
    {
        $productSideCategoryIngredients = ProductSideCategoryIngredient::orderBy('id','desc')->paginate(10);
        return view('backend.admin.products.productSideCategoryIngredient.index',compact('productSideCategoryIngredients'));
    }

    public function create()
    {
        $products =Product::all();
        $sideCategories = SideCategory::all();
        $ingredients = Ingredient::all();
        return view('backend.admin.products.productSideCategoryIngredient.create',compact('products','sideCategories', 'ingredients'));
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $this->validate($request, [
            'product_id' =>  'required',
            'side_category_id' =>  'required',
            'ingredient_ids' =>  'required',
        ]);
        $productSideCategoryIngredient = new ProductSideCategoryIngredient;
        $productSideCategoryIngredient->product_id = $request->product_id;
        $productSideCategoryIngredient->side_category_id = $request->side_category_id;
        $productSideCategoryIngredient->ingredient_ids = implode(',', $request->ingredient_ids);
        //dd($productSideCategoryIngredient);
        $productSideCategoryIngredient->save();

        Toastr::success('Product Site Category Ingredient Created successfully !');
        return redirect()->route('admin.productsidecategoryingredient.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $productSideCategoryIngredient = ProductSideCategoryIngredient::find($id);
        //dd($productSideCategoryIngredient);
        $products =Product::all();
        $sideCategories = SideCategory::all();
        $ingredients = Ingredient::where('side_category_id',$productSideCategoryIngredient->side_category_id)->get();
        return view('backend.admin.products.productSideCategoryIngredient.edit',compact('productSideCategoryIngredient','products','sideCategories', 'ingredients'));
    }

    public function update(Request $request, $id)
    {
        //dd($request->all());
        $this->validate($request, [
            'product_id' =>  'required',
            'side_category_id' =>  'required',
            'ingredient_ids' =>  'required',
        ]);
        $productSideCategoryIngredient = ProductSideCategoryIngredient::find($id);
        $productSideCategoryIngredient->product_id = $request->product_id;
        $productSideCategoryIngredient->side_category_id = $request->side_category_id;
        $productSideCategoryIngredient->ingredient_ids = implode(',', $request->ingredient_ids);
        $productSideCategoryIngredient->update();

        Toastr::success('Product Site Category Ingredient Updated successfully !');
        return redirect()->route('admin.productsidecategoryingredient.index');
    }

    public function destroy($id)
    {
        $productSideCategoryIngredient = ProductSideCategoryIngredient::destroy($id);
        $productSideCategoryIngredient->delete();

        Toastr::success('Product Site Category Ingredient Deleted Successfully Done!');
        return redirect()->route('admin.productsidecategoryingredient.index');
    }

    public function IngredientList(Request $request){
        $ingredients = Ingredient::where('side_category_id',$request->side_category_id)->get();
        $options = '';
        if(!empty($ingredients)){
            foreach($ingredients as $ingredient){
                $options .= "<option value='$ingredient->id'>$ingredient->name</option>";
            }
        }else{
            $options .= "<option value=''>No Result Found!</option>";
        }
        return response()->json(['success'=>true, 'data'=>$options]);
    }
}
