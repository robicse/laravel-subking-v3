<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    public function sideCategories()
    {
        return $this->hasMany('App\SideCategory');
    }
}
