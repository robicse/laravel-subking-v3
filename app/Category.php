<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    public function subcategories()
    {
        return $this->hasMany('App\SubCategory','category_id');
    }

    //For Product
    public function products()
    {
        return $this->hasMany('App\Product');
    }
}
