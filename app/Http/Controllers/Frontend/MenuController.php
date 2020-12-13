<?php

namespace App\Http\Controllers\Frontend;

use App\Category;
use App\Ingredient;
use App\Product;
use App\ProductDouble;
use App\ProductSideCategoryIngredient;
use App\ProductSingle;
use App\ShopLocation;
use App\SideCategory;
use App\SubCategory;
use Brian2694\Toastr\Facades\Toastr;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Session;

class MenuController extends Controller
{
    public function menuList(){
        return view('frontend.pages.menuList');
    }
    public function menu(){
        $categoriesForTwo = Category::all();
        //$categoriesForFour = Category::skip(2)->take(4)->get();
        //dd($categoriesForFour);
        //Session::forget('rid');
        $rid = Session::get('rid') ? Session::get('rid') : '';
        $rpickedOrDeliveredValue = Session::get('rpickedOrDeliveredValue') ? Session::get('rid') : '';


        if(!empty($rid) && !empty($rpickedOrDeliveredValue)){
            return view('frontend.pages.menu', compact('categoriesForTwo'));
        }else{
            return redirect('map');
        }
    }
    /*public function foodList(){
        return view('frontend.pages.food-list');
    }*/
    public function subCategoryfoodList($category_id = null, $sub_category_id = null){
        $products = Product::where('category_id',$category_id)->where('sub_category_id',$sub_category_id)->get();
        return view('frontend.pages.food-list', compact('products','category_id','sub_category_id'));
    }
    public function categoryfoodList($category_id = null){
        $sub_category_id = null;
        $products = Product::where('category_id',$category_id)->get();
        return view('frontend.pages.food-list', compact('products','category_id','sub_category_id'));
    }
    public function orderMenu(){
        return view('frontend.Pages.order_menu');
    }

    public function subCategory($id){
        $category_id = $id;
        $sub_categories = SubCategory::where('category_id',$id)->get();
        return view('frontend.pages.subCategory', compact('category_id','sub_categories'));
    }

    public function subCategoryProduct($category_id, $sub_category_id){
        $products = Product::where('category_id', $category_id)->where('sub_category_id',$sub_category_id)->get();
        //dd($products);
        //return view('frontend.pages.singleFood', compact('products'));
        return view('frontend.pages.food-list', compact('products','sub_category_id'));
    }

    public function order_edit_single($slug){

        $product=Product::where('slug',$slug)->first();
        //dd($product);

        if($product->single==0 && $product->double==0){
            return redirect()->route('order.edit',$slug);
        }else{

            $sideCat=SideCategory::all();
            $productIng=ProductSideCategoryIngredient::where('product_id',$product->id)->get();
            $singleProduct=ProductSingle::where('product_id',$product->id)->get();
            $doubleProduct=ProductDouble::where('product_id',$product->id)->get();

            $final_price = 0;
            if($product->single == 1 && $product->double == 1){
                $product_price = 0;
                $product_double_price = ProductDouble::where('product_id',$product->id)->pluck('double_price')->first();
                $final_price = $product_price + $product_double_price;
            }else{
                $product_price = $product->price;
                $final_price = $product_price;
            }
            if(!empty($productIng)){
                foreach($productIng as $proIng){
                    //dd($proIng);
                    $ingredient_ids = $proIng->ingredient_ids;
                    if(!empty($ingredient_ids)){
                        //dd($ingredient_ids);
                        //dd(explode(',', $ingredient_ids));
                        $in_ids = explode(',', $ingredient_ids);
                        foreach($in_ids as $in_id){
                            //dd($data);
                            $ingredient_price = Ingredient::where('id',$in_id)->pluck('price')->first();
                            //dd($ingredient_price);
                            $final_price += $ingredient_price;
                        }
                    }
                }
            }

            return view('frontend.pages.singleFood',compact('product','productIng','sideCat','singleProduct','doubleProduct','final_price'));
        }

    }

    public function order_edit($slug){

        $product=Product::where('slug',$slug)->first();
        $sideCat=SideCategory::all();
        $productIng=ProductSideCategoryIngredient::where('product_id',$product->id)->get();

        $final_price = 0;
        if($product->single == 1 && $product->double == 1){
            $product_price = 0;
            $product_double_price = ProductDouble::where('product_id',$product->id)->pluck('double_price')->first();
            $final_price = $product_price + $product_double_price;
        }else{
            $product_price = $product->price;
            $final_price = $product_price;
        }
        if(!empty($productIng)){
            foreach($productIng as $proIng){
                //dd($proIng);
                $ingredient_ids = $proIng->ingredient_ids;
                if(!empty($ingredient_ids)){
                    //dd($ingredient_ids);
                    //dd(explode(',', $ingredient_ids));
                    $in_ids = explode(',', $ingredient_ids);
                    foreach($in_ids as $in_id){
                        //dd($data);
                        $ingredient_price = Ingredient::where('id',$in_id)->pluck('price')->first();
                        //dd($ingredient_price);
                        $final_price += $ingredient_price;
                    }
                }
            }
        }

        return view('frontend.pages.order-add',compact('product','productIng','sideCat','final_price'));
    }

    public function order_edit_type($type,$slug){
        //dd($slug);

        $product=Product::where('slug',$slug)->first();
        $sideCat=SideCategory::all();
        $productIng=ProductSideCategoryIngredient::where('product_id',$product->id)->get();

        $final_price = 0;
        if($product->single == 1 && $product->double == 1){
            $product_price = 0;
            if($type=="single"){
                $product_double_price = ProductSingle::where('product_id',$product->id)->pluck('single_price')->first();
                $final_price = $product_price + $product_double_price;
            }else{
                $product_double_price = ProductDouble::where('product_id',$product->id)->pluck('double_price')->first();
                $final_price = $product_price + $product_double_price;
            }

        }else{
            $product_price = $product->price;
            $final_price = $product_price;
        }
        if(!empty($productIng)){
            foreach($productIng as $proIng){
                //dd($proIng);
                $ingredient_ids = $proIng->ingredient_ids;
                if(!empty($ingredient_ids)){
                    //dd($ingredient_ids);
                    //dd(explode(',', $ingredient_ids));
                    $in_ids = explode(',', $ingredient_ids);
                    foreach($in_ids as $in_id){
                        //dd($data);
                        $ingredient_price = Ingredient::where('id',$in_id)->pluck('price')->first();
                        //dd($ingredient_price);
                        $final_price += $ingredient_price;
                    }
                }
            }
        }

        return view('frontend.pages.order-add-double',compact('product','productIng','sideCat','final_price','type'));
    }

    public function order_add_cart(Request $request){
        //dd($request->all());

        //Cart::destroy();
//        echo "Sjs";
        //dd(Cart::content());

        $product=Product::find($request->product_id);
        $data = array();
        $data['id'] = $product->id;
        $data['name'] = $product->name;
        $data['qty'] = 1;
        $data['price'] = $product->price;
        $data['options']['base_price'] = $request->product_final_price;
        $data['options']['final_price'] = $request->product_final_price;
        $data['options']['ingredients'] = $request->ing_name;
        $data['options']['type'] = "normal";

        Cart::add($data);

        //dd(Cart::content());
        return redirect()->route('order.place.checkout');
    }
    public function order_add_cart_double(Request $request){
        //dd($request->all());

        //Cart::destroy();
//        echo "Sjs";
        //dd(Cart::content());
        $ing_name=[];
        $product=Product::find($request->product_id);
        $productIng=ProductSideCategoryIngredient::where('product_id',$product->id)->get();
        foreach($productIng as $ing){
            $pingred = explode(",", $ing->ingredient_ids);
            foreach($pingred as $ingr){
                $ir=Ingredient::find($ingr);
                array_push($ing_name,$ir->name);
            }
        }


        $product=Product::find($request->product_id);
        $data = array();
        $data['id'] = $product->id;
        $data['name'] = $product->name;
        $data['qty'] = 1;
        $data['price'] = $product->price;
        $data['options']['base_price'] = $request->product_final_price;
        $data['options']['final_price'] = $request->product_final_price;
        $data['options']['ingredients'] = $ing_name;
        $data['options']['type'] = "double";

        Cart::add($data);

        //dd(Cart::content());
        return redirect()->route('order.place.checkout');
    }

    public function order_edit_cart(Request $request){
        //dd($request->all());

        $data = array();
        $data['options']['base_price'] = $request->product_final_price;
        $data['options']['final_price'] = $request->product_final_price;
        $data['options']['ingredients'] = $request->ing_name;
        $data['options']['type'] = "normal";
        Toastr::success('Updated Successfully');
        Cart::update($request->cartID, $data);

        //dd(Cart::content());
        return redirect()->route('order.place.checkout');
    }

    public function cartRemove($rowId)
    {
        Toastr::error('Removed');
        Cart::remove($rowId);
        Session::forget('coupon_amount');
        Session::forget('coupon_discount_type');
        Session::forget('coupon_expired_date');
        if(!empty(Cart::content())){
            return back();
        }else{
            return redirect()->route('menu');

        }


    }
    public function quantityUpdate($rowId)
    {
        //dd(Cart::content());

        $cartData = Cart::get($rowId);
        $qty = Input::get('quantity');
        $data['qty']=$qty;
        $data['options']['base_price'] = $cartData->options->base_price;
        $data['options']['final_price'] =$cartData->options->base_price*$qty;
        $data['options']['ingredients'] = $cartData->options->ingredients;
        $data['options']['type'] = "normal";

        Toastr::success('Quantity Updated Successfully');
        Cart::update($rowId, $data);

        return back();
    }
    public function menu_edit($cartid){

        $cartProduct = Cart::get($cartid);
        if(!empty($cartProduct)){
        $product=Product::find($cartProduct->id);
        $productIng=ProductSideCategoryIngredient::where('product_id',$product->id)->get();
        //dd($productIng);
        return view('frontend.pages.order-edit',compact('product','productIng','cartProduct'));
        }else{
            return redirect()->route('menu');
        }
    }
}
