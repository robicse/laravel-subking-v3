<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //For Order Detail
    public function order_details()
    {
        return $this->hasMany('App\OrderDetail');
    }
}
