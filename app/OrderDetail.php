<?php

namespace App;
use Hash;
use Illuminate\Database\Eloquent\Model;
class OrderDetail extends Model
{
    protected $table = 'orderDetails';
	 protected $fillable = [
				'order_id',
				'product_id',
				'qty',
				'size_name',
				'price',
				'mrp',
				'hex_code',
				'discount',
				'gst_amount',
				'gst_per',
				'hsn_no',
				'discount_price',
	 ];
	 
	 public function getProduct()
	 {
		 return $this->belongsTo('App\Product','product_id');
	 }	

}
