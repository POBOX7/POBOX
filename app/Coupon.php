<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Order;
class Coupon extends Model
{   
    protected $table = 'coupons';
      public  function order()
    {
    	return $this->hasMany(Order::class);	
    }
}
