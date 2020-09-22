<?php

namespace App;
use Hash;
use Illuminate\Database\Eloquent\Model;
class Useraddresses extends Model
{
    protected $table = 'user_addresses';
	 protected $fillable = [
				'user_id',
				'name',
				'last_name',
				'company_name',
			   'phone_number',
			   'email',
			   'pincode',
			   'address_line_one',
			   'address_line_two',
			   'address_line_three',
			   'city',
			   'country',
			   'state',
			   'isGuest',
			   'address_type',
			   'is_permanent'
	 ];

}
