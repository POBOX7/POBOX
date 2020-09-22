<?php

namespace App;
use Hash;
use Illuminate\Database\Eloquent\Model;
class Orderbillingaddresses extends Model
{
    protected $table = 'order_billing_address';
	 protected $fillable = [
				'order_id',
				'name',
				'last_name',
			   'phone_number',
			   'email',
			   'pincode',
			   'address_line_one',
			   'address_line_two',
			   'city',
			   'company_name',
			   'country',
			   'state'
			   
	 ];

}
