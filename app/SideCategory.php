<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SideCategory extends Model
{
    // For Ingredient
    public function ingredient()
    {
        return $this->belongsTo('App\Ingredient');
    }

    // For Product Side Category Ingredient
    public function product_side_category_ingredient()
    {
        return $this->hasOne('App\ProductSideCategoryIngredient');
    }
}
