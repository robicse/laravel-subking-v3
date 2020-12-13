<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // For Category
    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    // For Sub Category
    public function sub_category()
    {
        return $this->belongsTo('App\SubCategory');
    }

    // For Product Single
    public function product_singles()
    {
        return $this->hasOne('App\ProductSingle');
    }

    // For Product Double
    public function product_Doubles()
    {
        return $this->hasOne('App\ProductDouble');
    }

    // For Product Side Category Ingredient
    public function product_side_category_ingredient()
    {
        return $this->hasOne('App\ProductSideCategoryIngredient');
    }

    //For Order Detail
    public function order_details()
    {
        return $this->hasMany('App\OrderDetail');
    }
}
