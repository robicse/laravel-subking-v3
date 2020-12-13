<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductDouble extends Model
{
    // For Product
    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}
