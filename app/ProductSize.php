<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductSize extends Model
{
  protected $table = 'product_size';
  
  protected $fillable = [
				'product_id',
				'size_id',
				'qty'
	 ];

     public function getSize()
	 {
		 return $this->belongsTo('App\Sizes','size_id');
	 }

}