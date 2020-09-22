<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Sizes;
use App\ProductSize;
class Product extends Model
{
protected $table = 'products';

	public static function getSizeFromProductId($product_id)
	{

		$size_id = ProductSize::where('product_id',$product_id)->pluck('size_id');
		//dd($size_id);
		$size = Sizes::whereIn('id',$size_id)->get(); 
		return $size;
	}

}