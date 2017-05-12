<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $timestamps = false;
    protected $table = "products";

    public function one_category()
    {
        return $this->hasOne('App\Models\ProductCategory','id','cate_id');
    }

    public function discount()
	{
    	return $this->hasOne('App\Models\Discountm','id','discount_id');
	}

	public function merchant()
    {
    	return $this->hasOne('App\User','id','merchant_id');
    }
}
