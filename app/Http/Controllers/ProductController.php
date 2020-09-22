<?php
namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Product;
use App\Review;
use App\Category;
use App\ProductImage;
use App\Brands;
use App\Sizes;
use App\ProductSize;
use App\Wishlist;
use App\Colors;
use App\Banners;
use App\SizeInformation;
use Illuminate\Support\Facades\DB;
use Session;
use Auth;
class ProductController extends Controller {

  public function productDetail($id){ 
  
    $user       = Auth::user(); 
    if($user){
        $user_id    = $user->id;
    }else{
        $user_id    = null;

    }
    //$productDetail = Product::where('id',$id)->first();
    $productDetail =  DB::table('products')
                        ->join('colors', 'colors.id', '=', 'products.color_id')
                        ->join('brands', 'brands.id', '=', 'products.brand_id')
                        ->join('category', 'category.id', '=', 'products.category_id')
                        ->select('products.id as product_id','products.name','products.sku','products.price','products.mrp','products.short_description','hex_code','discount','description','category.name as category_name','brands.name as brand_name')
                        ->where('products.id',$id)->first();
     
    $productDetail->product_image =  ProductImage::where('product_id',$id)->get();

    $productDetail->product_color =  DB::table('products')->join('colors', 'colors.id', '=', 'products.color_id')->select('products.id as product_id','hex_code')->where('products.id','!=',$id)->where('products.sku',$productDetail->sku)->where('products.is_deleted',0)->where('products.status',1)->get();

    $product_size =  DB::table('product_size')->select('size_id')->where('product_size.product_id',$id)->pluck('size_id')->toArray();
    $product_size_data =  DB::table('product_size')->select('qty','size_id')->where('product_size.product_id',$id)->pluck('qty','size_id')->toArray();
    $sizeData = Sizes::where('status',1)->where('is_deleted',0)->get();
    $sizeInformation = SizeInformation::select('size_information.id','size_id','chest','waist','hips','length','shoulder','sizes.name AS size_name')
                                            ->join('sizes', 'sizes.id', '=', 'size_information.size_id')
                                            ->orderByDesc('size_information.id')->get();
    
    // $returnHTML = view('ajax.pop_up_div_badal')->with('productDetail', $productDetail)->render();
    // return response()->json(array('success' => true, 'html'=>$returnHTML));
    $wishlist = Wishlist::where('user_id',$user_id)->where('product_id',$id)->first();
    // Releted product
    $brand_id = Product::where('status','1')->where('is_deleted','0')->where('id',$id)->pluck('brand_id');
    $category_id = Product::where('status','1')->where('is_deleted','0')->where('id',$id)->pluck('category_id');
   $selectedBrandAndCat = Product::whereIn('category_id',$category_id)->whereIn('brand_id',$brand_id)->where('status','1')->where('is_deleted','0')->pluck('id');

    $product_detail_id = intval($id);
  $product_detail_idss =array($product_detail_id);

   $all_pro_id = Product::whereIn('category_id',$category_id)->whereIn('brand_id',$brand_id)->where('status','1')->where('is_deleted','0')->pluck('id')->toArray();
   $selectedBrandAndCat_diffsss = array_diff($all_pro_id, $product_detail_idss);

  $reletedProduct = Product::whereIn('id',$selectedBrandAndCat_diffsss)->where('status','1')->where('is_deleted','0')->get();
    return view('product_detail',compact('productDetail','sizeData','sizeInformation','product_size','product_size_data','user_id','wishlist','reletedProduct','id'));
  }

}
