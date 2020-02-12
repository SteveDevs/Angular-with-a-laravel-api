<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attributes extends CustomeBase
{

    protected $fillable = 
    [
    	'id','attribute'
	];

    public function productAttributes()
    {
        return $this->hasMany('App\ProductAttributes', 'attribute_id');
    }
}
