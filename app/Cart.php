<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{

	protected $table = 'cart';

    protected $fillable = ['product_id','user_id','size','qty','cart_total_price','cart_total_mrp_price','gstper'];

}