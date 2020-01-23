<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
      protected $dates = [
        'created_at',
        'updated_at',
    ];
    protected $table = "products";
    public static function ProductList()
    {
        
    }
}
