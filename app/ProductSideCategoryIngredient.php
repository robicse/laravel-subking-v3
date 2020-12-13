<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductSideCategoryIngredient extends Model
{
    // For Product
    public function product()
    {
        return $this->belongsTo('App\Product');
    }

    // For Product
    public function side_category()
    {

        return $this->belongsTo('App\SideCategory','side_category_id');
    }
}
