<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductsAttributes extends CustomeBase
{
    protected $fillable = [
        'sku',
        'attribute_id',
        'attribute_value'      
    ];

}
