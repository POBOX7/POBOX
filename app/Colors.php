<?php

namespace App;
use App\Product;
use Illuminate\Database\Eloquent\Model;

class Colors extends Model
{
protected $table = 'colors';

	public static function getColorFromSKU ( $sku  )
	{
		$sku = Product::where('is_new_arrival','1')->where('sku',$sku)->pluck('color_id');
		$colorsData = Colors::whereIn('id',$sku)->get();
		return $colorsData;
	}

}