<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductSingle extends Model
{
    // For Product
    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}
