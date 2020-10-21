<?php

namespace App;
use Hash;
use Illuminate\Database\Eloquent\Model;
class Order extends Model
{
    protected $table = 'order';
	 protected $fillable = [
				'user_id',
				'address_id',
				'ordernumber',
				'payment_option',
				'isGuest',
				'totalamount',
				'bag_total',
				'saveAmount',
				'gstAmount',
				'coupon_id',
				'coupon_code',
				'coupon_amount',
				'bill_address'
	 ];
	 
	 public function getUser()
	 {
		 return $this->belongsTo('App\User','user_id');
	 }
	public function getAddress()
	 {
		 return $this->belongsTo('App\Useraddresses','address_id');
	 }
}
