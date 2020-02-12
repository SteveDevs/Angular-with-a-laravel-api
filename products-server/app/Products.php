<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends CustomeBase
{
	protected $primaryKey = 'sku'; 
	
    protected $fillable = [
        'sku'      
    ];

    public function productAttributes()
    {
    	return $this->hasMany('App\ProductAttributes', 'sku');
    }
}
