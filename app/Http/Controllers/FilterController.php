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
use App\Colors;
use App\Banners;
use App\SizeInformation;
use Session;
use Auth;

class FilterController extends Controller {
 
  public function CommonFilter(Request $request) 
  {   
    //dd($request->categories,$request->size,$request->brand,$request->color,$request->min_price,$request->max_price,$request->sorting_filter);
    /*min_price*/
    $user       = Auth::user(); 
    if($user){
        $user_id    = $user->id;
    }else{
        $user_id    = null;

    }
    $requestclearall = $request->clearall;
      if($request->min_price != null){    
        foreach ($request->min_price as $value) {
            $min_price = $value;
        }
        $requestclearall = null;
      }else{
        $min_price = null;
      }
    /*max_price*/
      if($request->max_price != null){    
        foreach ($request->max_price as $value) {
            $max_price = $value;
        }
        $requestclearall = null;
      }else{
        $max_price = null;
      } 
    /*categories*/
      if($request->categories != null){    
        foreach ($request->categories as $value) {
            $categories[] = $value; 
          }
      }else{
        $categories = null;
      } 
    /*size*/
      if($request->size != null){    
        foreach ($request->size as $value) {
            $size = $value;
        }
      }else{
        $size = null;
      }  
    /*brand*/
      if($request->brand != null){    
        foreach ($request->brand as $value) {
            $brand = $value;
        }
      }else{
        $brand = null;
      }
    /*color*/
      if($request->color != null){    
        foreach ($request->color as $value) {
            $color[] = $value;
        }
      }else{
        $color= array();
      } 
      /*Sorting Filter*/
        
      if($request->sorting_filter != null){ 
        foreach ($request->sorting_filter as $value) {
            $sorting_filter[] = $value;
        } 
      }else{
        $sorting_filter= null;
      } 
     /*Clear all*/  
      if($requestclearall != null){  
          $min_price = null;
          $max_price = null;
          $categories = null; 
          $size = null;
          $brand =  null;
          $color = null;
          $sorting_filter = null;
          $clearall = 1;  
      }else{
        $clearall = null;
      } 
    //dd($min_price, $max_price, $categories, $size, $brand, $color,$clearall,$sorting_filter,$request->page[0],$request->page_url); 
 if($request->page_url == "Trending"){ 

       if($clearall != null){  
          $products = Product::where('is_trending',1)->where('status',1)->where('is_deleted',0)->orderBy('created_at','DESC');   
        }else{ 

            $clearall = null;
            $products = new Product();
            $products = $products->where('is_trending',1)->where('status',1)->where('is_deleted',0)->take(9);

            if($min_price != null && $max_price != null){ 
               $products = $products->where('price', '>=' , $min_price)->where('price', '<=', $max_price);
            }
            if($categories != null){ 
              $products = $products->whereIn('category_id',$categories);
            }
            if($size != null){ 
              $product_id = ProductSize::select('product_id')->where('qty','!=',0)->where('size_id',$size)->get(); 
              $products = $products->whereIn('id',$product_id);
            }
            if($brand != null){  
              $products = $products->where('brand_id',$brand);
            }
            if($color != null){  
              $products = $products->whereIn('color_id',$color);
            }
            if($sorting_filter[0] == "featured"){  
              $products = $products->where('is_featured',1);
            }  
            if($sorting_filter[0] == "name_a_to_z"){  
              $products = $products->orderBy('name','ASC');
            }
            if($sorting_filter[0] == "name_z_to_a"){  
              $products = $products->orderBy('name','DESC');
            }
            if($sorting_filter[0] == "price_low_to_high"){  
              $products = $products->orderBy('price','ASC');
            }
            if($sorting_filter[0] == "price_high_to_low"){  
              $products = $products->orderBy('price','DESC');
            }
            if($sorting_filter[0] == "menu_order"){ 
              $products = $products;
            }
       }  
      $products = $products->get(); 
      $newArrivalProductDatas = array();
      foreach ($products as $key => $value) {
         $newArrivalProductDatas[$key] = $value;
          $newArrivalProductDatas[$key]['product_image'] = $ProductImage = ProductImage::where('product_id',$value['id'])->get();
          $productSku = Product::where('is_trending','1')->where('status','1')->where('is_deleted','0')->where('id',$value->id)->pluck('sku')->toArray();
           $selectSkuProductColorId = Product::where('is_trending','1')->where('status','1')->where('is_deleted','0')->whereIn('sku',$productSku)->pluck('color_id')->toArray(); 
        $newArrivalProductDatas[$key]['review'] = $review = Review::where('product_id',$value['id'])->get();
        $newArrivalProductDatas[$key]['color'] = Colors::whereIn('id',$selectSkuProductColorId)->where('status',1)->where('is_deleted',0)->get();
        $newArrivalProductDatas[$key]['product_qty'] = ProductSize::where('product_id',$value['id'])->pluck('qty')->first();
      }
 }
/*Trending filter over*/

/*Kurties filter start*/ 
if($request->page_url == "kurties"){ 
    if($clearall != null){  
          $products = Product::where('category_id',1)->where('status',1)->where('is_deleted',0)->orderBy('created_at','DESC');   
        }else{ 

            $clearall = null;
            $products = new Product();
            $products = $products->where('category_id',1)->where('status',1)->where('is_deleted',0)->take(9);

            if($min_price != null && $max_price != null){ 
               $products = $products->where('price', '>=' , $min_price)->where('price', '<=', $max_price);
            }
            if($categories != null){ 
              $products = $products->whereIn('category_id',$categories);
            }
            if($size != null){ 
              $product_id = ProductSize::select('product_id')->where('qty','!=',0)->where('size_id',$size)->get(); 
              $products = $products->whereIn('id',$product_id);
            }
            if($brand != null){  
              $products = $products->where('brand_id',$brand);
            }
            if($color != null){  
              $products = $products->whereIn('color_id',$color);
            }
            if($sorting_filter[0] == "featured"){  
              $products = $products->where('is_featured',1);
            }  
            if($sorting_filter[0] == "name_a_to_z"){  
              $products = $products->orderBy('name','ASC');
            }
            if($sorting_filter[0] == "name_z_to_a"){  
              $products = $products->orderBy('name','DESC');
            }
            if($sorting_filter[0] == "price_low_to_high"){  
              $products = $products->orderBy('price','ASC');
            }
            if($sorting_filter[0] == "price_high_to_low"){  
              $products = $products->orderBy('price','DESC');
            }
            if($sorting_filter[0] == "menu_order"){ 
              $products = $products;
            }
       }  
      $products = $products->get(); 
	  
      $newArrivalProductDatas = array();
      foreach ($products as $key => $value) {
         $newArrivalProductDatas[$key] = $value;
          $newArrivalProductDatas[$key]['product_image'] = $ProductImage = ProductImage::where('product_id',$value['id'])->get();
          $productSku = Product::where('category_id','1')->where('status','1')->where('is_deleted','0')->where('id',$value->id)->pluck('sku')->toArray();
           $selectSkuProductColorId = Product::where('category_id','1')->where('status','1')->where('is_deleted','0')->whereIn('sku',$productSku)->pluck('color_id')->toArray(); 
        $newArrivalProductDatas[$key]['review'] = $review = Review::where('product_id',$value['id'])->get();
        $newArrivalProductDatas[$key]['color'] = Colors::whereIn('id',$selectSkuProductColorId)->where('status',1)->where('is_deleted',0)->get();
        $newArrivalProductDatas[$key]['product_qty'] = ProductSize::where('product_id',$value['id'])->pluck('qty')->first();
      }
}
/*Kurties filter over*/

/*kurta-sets filter start*/ 
if($request->page_url == "kurta-sets"){ 
    if($clearall != null){  
          $products = Product::where('category_id',2)->where('status',1)->where('is_deleted',0)->orderBy('created_at','DESC');   
        }else{ 

            $clearall = null;
            $products = new Product();
            $products = $products->where('category_id',2)->where('status',1)->where('is_deleted',0)->take(9);

            if($min_price != null && $max_price != null){ 
               $products = $products->where('price', '>=' , $min_price)->where('price', '<=', $max_price);
            }
            if($categories != null){ 
              $products = $products->whereIn('category_id',$categories);
            }
            if($size != null){ 
              $product_id = ProductSize::select('product_id')->where('qty','!=',0)->where('size_id',$size)->get(); 
              $products = $products->whereIn('id',$product_id);
            }
            if($brand != null){  
              $products = $products->where('brand_id',$brand);
            }
            if($color != null){  
              $products = $products->whereIn('color_id',$color);
            }
            if($sorting_filter[0] == "featured"){  
              $products = $products->where('is_featured',1);
            }  
            if($sorting_filter[0] == "name_a_to_z"){  
              $products = $products->orderBy('name','ASC');
            }
            if($sorting_filter[0] == "name_z_to_a"){  
              $products = $products->orderBy('name','DESC');
            }
            if($sorting_filter[0] == "price_low_to_high"){  
              $products = $products->orderBy('price','ASC');
            }
            if($sorting_filter[0] == "price_high_to_low"){  
              $products = $products->orderBy('price','DESC');
            }
            if($sorting_filter[0] == "menu_order"){ 
              $products = $products;
            }
       }  
      $products = $products->get(); 
      $newArrivalProductDatas = array();
      foreach ($products as $key => $value) {
         $newArrivalProductDatas[$key] = $value;
          $newArrivalProductDatas[$key]['product_image'] = $ProductImage = ProductImage::where('product_id',$value['id'])->get();
          $productSku = Product::where('category_id','2')->where('status','1')->where('is_deleted','0')->where('id',$value->id)->pluck('sku')->toArray();
           $selectSkuProductColorId = Product::where('category_id','2')->where('status','1')->where('is_deleted','0')->whereIn('sku',$productSku)->pluck('color_id')->toArray(); 
        $newArrivalProductDatas[$key]['review'] = $review = Review::where('product_id',$value['id'])->get();
        $newArrivalProductDatas[$key]['color'] = Colors::whereIn('id',$selectSkuProductColorId)->where('status',1)->where('is_deleted',0)->get();
        $newArrivalProductDatas[$key]['product_qty'] = ProductSize::where('product_id',$value['id'])->pluck('qty')->first();
      }
}
/*kurta-sets filter over*/


/*Dresses filter start*/ 
if($request->page_url == "dresses"){ 
    if($clearall != null){  
          $products = Product::where('category_id',3)->where('status',1)->where('is_deleted',0)->orderBy('created_at','DESC');   
        }else{ 

            $clearall = null;
            $products = new Product();
            $products = $products->where('category_id',3)->where('status',1)->where('is_deleted',0)->take(9);

            if($min_price != null && $max_price != null){ 
               $products = $products->where('price', '>=' , $min_price)->where('price', '<=', $max_price);
            }
            if($categories != null){ 
              $products = $products->whereIn('category_id',$categories);
            }
            if($size != null){ 
              $product_id = ProductSize::select('product_id')->where('qty','!=',0)->where('size_id',$size)->get(); 
              $products = $products->whereIn('id',$product_id);
            }
            if($brand != null){  
              $products = $products->where('brand_id',$brand);
            }
            if($color != null){  
              $products = $products->whereIn('color_id',$color);
            }
            if($sorting_filter[0] == "featured"){  
              $products = $products->where('is_featured',1);
            }  
            if($sorting_filter[0] == "name_a_to_z"){  
              $products = $products->orderBy('name','ASC');
            }
            if($sorting_filter[0] == "name_z_to_a"){  
              $products = $products->orderBy('name','DESC');
            }
            if($sorting_filter[0] == "price_low_to_high"){  
              $products = $products->orderBy('price','ASC');
            }
            if($sorting_filter[0] == "price_high_to_low"){  
              $products = $products->orderBy('price','DESC');
            }
            if($sorting_filter[0] == "menu_order"){ 
              $products = $products;
            }
       }  
      $products = $products->get(); 
      $newArrivalProductDatas = array();
      foreach ($products as $key => $value) {
         $newArrivalProductDatas[$key] = $value;
          $newArrivalProductDatas[$key]['product_image'] = $ProductImage = ProductImage::where('product_id',$value['id'])->get();
          $productSku = Product::where('category_id','3')->where('status','1')->where('is_deleted','0')->where('id',$value->id)->pluck('sku')->toArray();
           $selectSkuProductColorId = Product::where('category_id','3')->where('status','1')->where('is_deleted','0')->whereIn('sku',$productSku)->pluck('color_id')->toArray(); 
        $newArrivalProductDatas[$key]['review'] = $review = Review::where('product_id',$value['id'])->get();
        $newArrivalProductDatas[$key]['color'] = Colors::whereIn('id',$selectSkuProductColorId)->where('status',1)->where('is_deleted',0)->get();
        $newArrivalProductDatas[$key]['product_qty'] = ProductSize::where('product_id',$value['id'])->pluck('qty')->first();
      }
}
/*kurta-sets filter over*/


/*New arrival filter start*/ 
if($request->page_url == "new-arrival"){
    if($clearall != null){
          $products = Product::where('is_new_arrival',1)->where('status',1)->where('is_deleted',0)->orderBy('created_at','DESC');   
        }else{ 
		     $clearall = null;
            $products = new Product();
            $products = $products->where('is_new_arrival',1)->where('status',1)->where('is_deleted',0);

            if($min_price != null && $max_price != null){ 
               $products = $products->whereBetween('price',[$min_price,$max_price]);
            }
            if($categories != null){ 
              $products = $products->whereIn('category_id',$categories);
            }
            if($size != null){ 
              $product_id = ProductSize::select('product_id')->where('qty','!=',0)->where('size_id',$size)->get(); 
              $products = $products->whereIn('id',$product_id);
            }
            if($brand != null){  
		      $products = $products->where('brand_id',$brand);
            }
            if($color != null){  
		      $products = $products->whereIn('color_id',$color);
            }
            if($sorting_filter[0] == "featured"){
		      $products = $products->where('is_featured',1);
            }  
            if($sorting_filter[0] == "name_a_to_z"){  
		      $products = $products->orderBy('name','ASC');
            }
            if($sorting_filter[0] == "name_z_to_a"){  
		      $products = $products->orderBy('name','DESC');
            }
            if($sorting_filter[0] == "price_low_to_high"){  
        	  $products = $products->orderBy('price','ASC');
            }
            if($sorting_filter[0] == "price_high_to_low"){  
			 $products = $products->orderBy('price','DESC');
            }
            if($sorting_filter[0] == "menu_order"){ 
       	  $products = $products;
            }
       }  
       
		$products = $products->get(); 


    //$products = $products->paginate(9)->get();
   // dd($products);

      $newArrivalProductDatas = array();
      foreach ($products as $key => $value) {
         $newArrivalProductDatas[$key] = $value;
          $newArrivalProductDatas[$key]['product_image'] = $ProductImage = ProductImage::where('product_id',$value['id'])->get();
          $productSku = Product::where('is_new_arrival','1')->where('status','1')->where('is_deleted','0')->where('id',$value->id)->pluck('sku')->toArray();
           $selectSkuProductColorId = Product::where('is_new_arrival','1')->where('status','1')->where('is_deleted','0')->whereIn('sku',$productSku)->pluck('color_id')->toArray(); 
        $newArrivalProductDatas[$key]['review'] = $review = Review::where('product_id',$value['id'])->get();
        $newArrivalProductDatas[$key]['color'] = Colors::whereIn('id',$selectSkuProductColorId)->where('status',1)->where('is_deleted',0)->get();
        $newArrivalProductDatas[$key]['product_qty'] = ProductSize::where('product_id',$value['id'])->pluck('qty')->first();
      } 
    }

  
	/*New arrival filter over*/  

    $view = view('new_resources.ajax.ajax_filter',compact('newArrivalProductDatas','user_id'))->render();
	
	echo $view;

  //return view('new_resources.ajax.ajax_filter',compact('newArrivalProductDatas','user_id'));
	
   
	
  } 

  
  public function CommonPopupFilter(Request $request) 
  { 
      
    /*size*/
      if($request->popup_size != null){    
        foreach ($request->popup_size as $value) {
            $popup_size[] = $value;
        }
      }else{
        $popup_size = null;
      }  
    /*color*/
      if($request->popup_color != null){    
        foreach ($request->popup_color as $value) {
            $popup_color[] = $value;
        }
      }else{
        $popup_color= array();
      }  
    //dd($popup_size, $popup_color,$request->product_id);


      $product_sku = Product::where('id',$request->product_id)->pluck('sku')->first(); 
     // $newArrivalProductDatas = Product::where('is_new_arrival','1')->where('color_id',$popup_color)->where('sku',$product_sku)->get();
     // dd($newArrivalProductDatas);
            $products = new Product();
            $products = $products->where('is_new_arrival',1)->where('status',1)->where('is_deleted',0); 
           // dd($products->get());

            if($popup_color != null){   
              $products = $products->whereIn('color_id',$popup_color)->where('id','!=',$request->product_id)->where('sku',$product_sku);
            } 
            //dd($products->get());
            if($popup_size != null){ 
              $productsize_id = ProductSize::select('product_id')->where('product_id',$request->product_id)->where('size_id',$popup_size)->first();  
              $products = $products->where('id',$productsize_id->product_id)->where('sku',$product_sku); 
            }  
            $product = $products->get();  
           // dd($products);
      $newArrivalProductData = array();
      foreach ($product as $key => $value) {
         $newArrivalProductData[$key] = $value;
          $newArrivalProductData[$key]['product_image'] = $ProductImage = ProductImage::where('product_id',$value['id'])->take('4')->get();
          $productSku = Product::where('id',$value->id)->pluck('sku')->toArray();
           $selectSkuProductColorId = Product::whereIn('sku',$productSku)->pluck('color_id')->toArray(); 
        $newArrivalProductData[$key]['review'] = $review = Review::where('product_id',$value['id'])->get();
        $newArrivalProductData[$key]['color'] = Colors::whereIn('id',$selectSkuProductColorId)->where('status',1)->where('is_deleted',0)->get();
         $newArrivalProductData[$key]['product_qty'] = ProductSize::where('product_id',$value['id'])->where('size_id',$popup_size)->pluck('qty')->first(); 
      }  

      $user       = Auth::user(); 
      if($user){
          $user_id    = $user->id;
      }else{
          $user_id    = null;

      }
       // /dd($newArrivalProductData); 
       return view('new_resources.ajax.popup_ajax_filter',compact('newArrivalProductData','popup_size','user_id'));
  } 


  public function ClearallDiv(Request $request) 
  {   
    return view('new_resources.ajax.clear_all');
  } 
  public function Sorting(Request $request) 
  {   
    return view('new_resources.ajax.sorting_div');
  } 
  public function CountDiv(Request $request) 
  {   
    $countdata = $request->productcount; 
    $view = view('new_resources.ajax.',compact('countdata'))->render();
	
	echo $view;
  } 


}
