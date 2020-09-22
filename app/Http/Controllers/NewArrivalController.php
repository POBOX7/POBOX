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
use Illuminate\Support\Facades\DB;
use Session;
use Auth;

class NewArrivalController extends Controller {

  public function newArrival() 
  { 
    $bannerSlider = Banners::where('page_id',2)->first(); 
    $newArrivalProductData = Product::where('is_new_arrival',1)->where('status',1)->where('is_deleted',0)->paginate(9);
    
    //Left side bar 

    //Categories Data
    $categoryData = Category::where('status','1')->where('is_deleted','0')->get();
   
    //Brands Data
    $brandsData = Brands::where('status','1')->where('is_deleted','0')->get();
    foreach ($brandsData as $keyBrandsData => $valueBrandsData) {
      $brandsData[$keyBrandsData] = $valueBrandsData;
      $brandsData[$keyBrandsData]['product_count'] = $product = Product::where('brand_id',$valueBrandsData['id'])->where('is_new_arrival','1')->where('status','1')->where('is_deleted','0')->count('brand_id');
    }

    //FEATURED PRODUCTS
     $featuredProduct = Product::where('is_new_arrival','1')->where('is_featured','1')->where('status','1')->where('is_deleted','0')->take(3)->get();
     foreach ($featuredProduct as $keyFeaturedProductReview => $valueFeaturedProductReview) {
      $featuredProduct[$keyFeaturedProductReview] = $valueFeaturedProductReview;
      $featuredProduct[$keyFeaturedProductReview]['review'] = $review = Review::where('product_id',$valueFeaturedProductReview['id'])->get();
    }
      //sizes data view
      $sizeData = Sizes::where('status',1)->where('is_deleted',0)->get();

      //$colors data view
      $colorsData = Colors::where('status',1)->where('is_deleted',0)->get();
      
      //SizeInformation 
     /* $sizeInformation = SizeInformation::all();
      foreach ($sizeInformation as $keySizeInformation => $valueSizeInformation) {
          $sizeInformation[$keySizeInformation]['size_name'] = Sizes::where('id',$valueSizeInformation->id)->where('status',1)->where('is_deleted',0)->get()->toArray();
      }  */
     //$sizeInformation = SizeInformation::select('size_information.id','size_id','chest','waist','hips','length','shoulder','sizes.name AS size_name')
                                            //->join('sizes', 'sizes.id', '=', 'size_information.size_id')
                                            //->orderByDesc('size_information.id')->get();
    return view('new_resources.new_arrival',compact('bannerSlider','newArrivalProductData','categoryData','brandsData','featuredProduct','sizeData','colorsData','sizeInformation'));
  }

  public function productDetailNew($id){
    $user       = Auth::user(); 
    if($user){
        $user_id    = $user->id;
    }else{
        $user_id    = null;

    }
    //$productDetail = Product::where('id',$id)->first();
    $productDetail =  DB::table('products')->join('colors', 'colors.id', '=', 'products.color_id')->select('products.id as product_id','products.name','products.sku','products.price','products.mrp','products.short_description','hex_code')->where('products.id',$id)->first(); 
    $productDetail->product_image =  ProductImage::where('product_id',$id)->skip(0)->take(4)->get();

    $productDetail->product_color =  DB::table('products')->join('colors', 'colors.id', '=', 'products.color_id')->select('products.id as product_id','hex_code')->where('products.id','!=',$id)->where('products.sku',$productDetail->sku)->where('products.status','1')->where('products.is_deleted','0')->get();

    $productDetail->product_size =  DB::table('product_size')->join('sizes', 'sizes.id', '=', 'product_size.size_id')->select('product_size.product_id as product_id','sizes.name')->where('product_size.product_id',$id)->get();

    // $product_qty = ProductSize::where('product_id',$id)->pluck('qty')->first();
    // $product_price = Product::where('id',$id)->pluck('price')->first();

    $product_size =  DB::table('product_size')->select('size_id')->where('product_size.product_id',$id)->pluck('size_id')->toArray();
    $product_size_data =  DB::table('product_size')->select('qty','size_id')->where('product_size.product_id',$id)->pluck('qty','size_id')->toArray();
    $sizeData = Sizes::where('status',1)->where('is_deleted',0)->get();
    
    $returnHTML = view('ajax.pop_up_div_badal',compact('productDetail','product_size','product_size_data','sizeData','user_id'))->render();
    return response()->json(array('success' => true, 'html'=>$returnHTML));
    //return view('ajax.pop_up_div_badal',compact('productDetail'));


    //return response()->json($productDetail, 200);
  }



  public function productDetail(Request $request , $id)
  {
    $productDetailDatas = Product::where('id',$id)->where('is_new_arrival','1')->where('status','1')->where('is_deleted','0')->get();
    foreach ($productDetailDatas as $keyProductReview => $valueNewArrivalProductReview) {
      $productDetailData[$keyProductReview] = $valueNewArrivalProductReview;
      $productDetailData[$keyProductReview]['review'] = $review = Review::where('product_id',$valueNewArrivalProductReview['id'])->get();
    }

    foreach ($productDetailDatas as $keyProductImage => $valueProductImage) {
      $productDetailData[$keyProductImage] = $valueProductImage;
      $productDetailData[$keyProductImage]['product_image'] = $ProductImage = ProductImage::where('product_id',$valueProductImage['id'])->take('4')->get();
      $productDetailData[$keyProductImage]['product_qty'] = ProductSize::where('product_id',$valueProductImage['id'])->pluck('qty')->first();
    }
     

    //FEATURED PRODUCTS
     $featuredProduct = Product::where('is_new_arrival','1')->where('is_featured','1')->where('status','1')->where('is_deleted','0')->get();
     foreach ($featuredProduct as $keyFeaturedProductReview => $valueFeaturedProductReview) {
      $featuredProduct[$keyFeaturedProductReview] = $valueFeaturedProductReview;
      $featuredProduct[$keyFeaturedProductReview]['review'] = $review = Review::where('product_id',$valueFeaturedProductReview['id'])->get();
    }

    return view('product_detail',compact('productDetailData','featuredProduct'));
  }



  
  public function PriceFilter(Request $request){
 /////////////////////////////////////// Default sorting filter start////////////////
//featured filter sorting
if ($request->brand_filter)
{
  // $brand = Session::get('brand');
  if ($request->brand_filter == $brand)
  {
    
    $request->brand_filter = null ;   
  }
}



if($request->sorting_filter == "featured" ){  
      $newArrivalProductDatas = Product::where('is_new_arrival','1')->where('status','1')->where('is_deleted','0')->where('is_featured','1')->get();
          foreach ($newArrivalProductDatas as $keyNewArrivalProductReview => $valueNewArrivalProductReview) {
            $newArrivalProductData[$keyNewArrivalProductReview] = $valueNewArrivalProductReview;
            //$newArrivalProductData[$keyNewArrivalProductReview]['review'] = $review = Review::where('product_id',$valueNewArrivalProductReview['id'])->get();
          }

          foreach ($newArrivalProductDatas as $keyProductImage => $valueProductImage) {
            $newArrivalProductData[$keyProductImage] = $valueProductImage;
            $newArrivalProductData[$keyProductImage]['product_image'] = $ProductImage = ProductImage::where('product_id',$valueProductImage['id'])->take('4')->get();
          }

}

if($request->sorting_filter == "name_a_to_z" ){  
      $newArrivalProductDatas = Product::where('is_new_arrival','1')->where('status','1')->where('is_deleted','0')->orderBy('name','ASC')->get();
          foreach ($newArrivalProductDatas as $keyNewArrivalProductReview => $valueNewArrivalProductReview) {
            $newArrivalProductData[$keyNewArrivalProductReview] = $valueNewArrivalProductReview;
            //$newArrivalProductData[$keyNewArrivalProductReview]['review'] = $review = Review::where('product_id',$valueNewArrivalProductReview['id'])->get();
          }

          foreach ($newArrivalProductDatas as $keyProductImage => $valueProductImage) {
            $newArrivalProductData[$keyProductImage] = $valueProductImage;
            $newArrivalProductData[$keyProductImage]['product_image'] = $ProductImage = ProductImage::where('product_id',$valueProductImage['id'])->take('4')->get();
          }

}

if($request->sorting_filter == "name_z_to_a" ){  
   $newArrivalProductDatas = Product::where('is_new_arrival','1')->where('status','1')->where('is_deleted','0')->orderBy('name','DESC')->get();
          foreach ($newArrivalProductDatas as $keyNewArrivalProductReview => $valueNewArrivalProductReview) {
            $newArrivalProductData[$keyNewArrivalProductReview] = $valueNewArrivalProductReview;
            //$newArrivalProductData[$keyNewArrivalProductReview]['review'] = $review = Review::where('product_id',$valueNewArrivalProductReview['id'])->get();
          }

          foreach ($newArrivalProductDatas as $keyProductImage => $valueProductImage) {
            $newArrivalProductData[$keyProductImage] = $valueProductImage;
            $newArrivalProductData[$keyProductImage]['product_image'] = $ProductImage = ProductImage::where('product_id',$valueProductImage['id'])->take('4')->get();
          }

}

if($request->sorting_filter == "price_low_to_high" ){  
       $newArrivalProductDatas = Product::where('is_new_arrival','1')->where('status','1')->where('is_deleted','0')->orderBy('price','ASC')->get();
          foreach ($newArrivalProductDatas as $keyNewArrivalProductReview => $valueNewArrivalProductReview) {
            $newArrivalProductData[$keyNewArrivalProductReview] = $valueNewArrivalProductReview;
            //$newArrivalProductData[$keyNewArrivalProductReview]['review'] = $review = Review::where('product_id',$valueNewArrivalProductReview['id'])->get();
          }

          foreach ($newArrivalProductDatas as $keyProductImage => $valueProductImage) {
            $newArrivalProductData[$keyProductImage] = $valueProductImage;
            $newArrivalProductData[$keyProductImage]['product_image'] = $ProductImage = ProductImage::where('product_id',$valueProductImage['id'])->take('4')->get();
          }
}

if($request->sorting_filter == "price_high_to_low" ){  
        $newArrivalProductDatas = Product::where('is_new_arrival','1')->where('status','1')->where('is_deleted','0')->orderBy('price','DESC')->get();
          foreach ($newArrivalProductDatas as $keyNewArrivalProductReview => $valueNewArrivalProductReview) {
            $newArrivalProductData[$keyNewArrivalProductReview] = $valueNewArrivalProductReview;
            //$newArrivalProductData[$keyNewArrivalProductReview]['review'] = $review = Review::where('product_id',$valueNewArrivalProductReview['id'])->get();
          }

          foreach ($newArrivalProductDatas as $keyProductImage => $valueProductImage) {
            $newArrivalProductData[$keyProductImage] = $valueProductImage;
            $newArrivalProductData[$keyProductImage]['product_image'] = $ProductImage = ProductImage::where('product_id',$valueProductImage['id'])->take('4')->get();
          }
}

/////////////////////////////////////// Default sorting filter end////////////////




        if($request->min_price != null){    
            foreach ($request->min_price as $value) {
                $min_price = $value;
            }
        }else{
                $min_price = null;
        }

        if($request->max_price != null){    
            foreach ($request->max_price as $value) {
                $max_price = $value;
            }
        }else{
                $max_price = null;
        }


        if($request->clearall != null){    
            foreach ($request->clearall as $value) {
                $clearall = $value;
            }
        }else{
                $clearall = null;
        }

        

     
    if ($min_price != null && $max_price != null) {
          //dd($min_price , $max_price);
          $newArrivalProductDatas = Product::where('is_new_arrival','1')->where('status','1')->where('is_deleted','0')->where('price','>=',$min_price)->where('price','<=',$max_price)->get();
          foreach ($newArrivalProductDatas as $keyNewArrivalProductReview => $valueNewArrivalProductReview) {
            $newArrivalProductData[$keyNewArrivalProductReview] = $valueNewArrivalProductReview;
            //$newArrivalProductData[$keyNewArrivalProductReview]['review'] = $review = Review::where('product_id',$valueNewArrivalProductReview['id'])->get();
          }

          foreach ($newArrivalProductDatas as $keyProductImage => $valueProductImage) {
            $newArrivalProductData[$keyProductImage] = $valueProductImage;
            $newArrivalProductData[$keyProductImage]['product_image'] = $ProductImage = ProductImage::where('product_id',$valueProductImage['id'])->take('4')->get();
          }
    }  


    //New arrival categories filter

    if (isset($request->department)) {
        $newArrivalId =  $request->department;
        $newArrivalProductDatas = Product::where('is_new_arrival','1')->where('status','1')->where('is_deleted','0')->whereIn('category_id',$newArrivalId)->get();
        //dd($newArrivalProductDatas);
        foreach ($newArrivalProductDatas as $keyNewArrivalProductReview => $valueNewArrivalProductReview) {
          $newArrivalProductData[$keyNewArrivalProductReview] = $valueNewArrivalProductReview;
          //$newArrivalProductData[$keyNewArrivalProductReview]['review'] = $review = Review::where('product_id',$valueNewArrivalProductReview['id'])->get();
        }

        foreach ($newArrivalProductDatas as $keyProductImage => $valueProductImage) {
          $newArrivalProductData[$keyProductImage] = $valueProductImage;
          $newArrivalProductData[$keyProductImage]['product_image'] = $ProductImage = ProductImage::where('product_id',$valueProductImage['id'])->take('4')->get();
        }
    }

    //Brand filter
    if (isset($request->brand_filter)){
      Session::put('brand',$request->brand_filter);
       $newArrivalId = $request->brand_filter;
         $newArrivalProductDatas = Product::where('is_new_arrival','1')->where('status','1')->where('is_deleted','0')->whereIn('brand_id',$newArrivalId)->get();
          foreach ($newArrivalProductDatas as $keyNewArrivalProductReview => $valueNewArrivalProductReview) {
            $newArrivalProductData[$keyNewArrivalProductReview] = $valueNewArrivalProductReview;
            //$newArrivalProductData[$keyNewArrivalProductReview]['review'] = $review = Review::where('product_id',$valueNewArrivalProductReview['id'])->get();
          }

          foreach ($newArrivalProductDatas as $keyProductImage => $valueProductImage) {
            $newArrivalProductData[$keyProductImage] = $valueProductImage;
            $newArrivalProductData[$keyProductImage]['product_image'] = $ProductImage = ProductImage::where('product_id',$valueProductImage['id'])->take('4')->get();
          }

    } 

    //Size filter
     if (isset($request->size_filter)){
      $size_filter = $request->size_filter;
      $sizeProductId = ProductSize::where('qty','!=',0)->whereIn('size_id',$size_filter)->pluck('product_id');
    
      $newArrivalProductDatas = Product::where('is_new_arrival','1')->where('status','1')->where('is_deleted','0')->whereIn('id',$sizeProductId)->get();
          foreach ($newArrivalProductDatas as $keyNewArrivalProductReview => $valueNewArrivalProductReview) {
            $newArrivalProductData[$keyNewArrivalProductReview] = $valueNewArrivalProductReview;
            //$newArrivalProductData[$keyNewArrivalProductReview]['review'] = $review = Review::where('product_id',$valueNewArrivalProductReview['id'])->get();
          }

          foreach ($newArrivalProductDatas as $keyProductImage => $valueProductImage) {
            $newArrivalProductData[$keyProductImage] = $valueProductImage;
            $newArrivalProductData[$keyProductImage]['product_image'] = $ProductImage = ProductImage::where('product_id',$valueProductImage['id'])->take('4')->get();
          }

     
    }

    //Colors filter
    
    if (isset($request->color_filter)){
       $newArrivalId = $request->color_filter;
         $newArrivalProductDatas = Product::where('is_new_arrival','1')->where('status','1')->where('is_deleted','0')->whereIn('color_id',$newArrivalId)->get();
          foreach ($newArrivalProductDatas as $keyNewArrivalProductReview => $valueNewArrivalProductReview) {
            $newArrivalProductData[$keyNewArrivalProductReview] = $valueNewArrivalProductReview;
           //$newArrivalProductData[$keyNewArrivalProductReview]['review'] = $review = Review::where('product_id',$valueNewArrivalProductReview['id'])->get();
          }

          foreach ($newArrivalProductDatas as $keyProductImage => $valueProductImage) {
            $newArrivalProductData[$keyProductImage] = $valueProductImage;
            $newArrivalProductData[$keyProductImage]['product_image'] = $ProductImage = ProductImage::where('product_id',$valueProductImage['id'])->take('4')->get();
          }

    } 
   //dd ($request->min_price, $request->sorting_filter, $request->color_filter,$request->size_filter,$request->brand_filter,$request->department,$request->max_price,$request->clearall);

    if($request->clearall )
      if ($request->min_price == null &&  $request->sorting_filter == null && $request->color_filter == null && $request->size_filter == null && $request->brand_filter == null && $request->department == null  && $request->max_price == null  ) 
      
      { 
          $newArrivalProductDatas = Product::where('is_new_arrival','1')->where('status','1')->where('is_deleted','0')->get();
          foreach ($newArrivalProductDatas as $keyNewArrivalProductReview => $valueNewArrivalProductReview) {
            $newArrivalProductData[$keyNewArrivalProductReview] = $valueNewArrivalProductReview;
            //$newArrivalProductData[$keyNewArrivalProductReview]['review'] = $review = Review::where('product_id',$valueNewArrivalProductReview['id'])->get();
          }

          foreach ($newArrivalProductDatas as $keyProductImage => $valueProductImage) {
            $newArrivalProductData[$keyProductImage] = $valueProductImage;
            $newArrivalProductData[$keyProductImage]['product_image'] = $ProductImage = ProductImage::where('product_id',$valueProductImage['id'])->take('4')->get();
          }
      }  
        return view('ajax.ajaxfilter_price',compact('newArrivalProductDatas'));
  }


    public function Colorbox(Request $request){ 

      //$colors data view
      $colorsData = Colors::where('status',1)->where('is_deleted',0)->get(); 
          return view('ajax.colorbox',compact('colorsData'));
  }
   public function Sizebox(Request $request){ 
      $sizeData = Sizes::where('status',1)->where('is_deleted',0)->get(); 
          return view('ajax.sizebox',compact('sizeData'));
  }


  public function newArrivalPopFilter(Request $request){
    //color filter 



   if ($request->product_pop_color_filter !== null) {

        $color_id_data = $request->product_pop_color_filter;

        

        $newArrivalProductDatas = Product::where('is_new_arrival','1')->where('status','1')->where('is_deleted','0')->whereIn('color_id',$color_id_data)->get();
        foreach ($newArrivalProductDatas as $keyNewArrivalProductReview => $valueNewArrivalProductReview) {
           $productSku = Product::where('id',$valueNewArrivalProductReview->id)->pluck('sku')->toArray();
           $selectSkuProductColorId = Product::whereIn('sku',$productSku)->pluck('color_id')->toArray();

          
          $newArrivalProductData[$keyNewArrivalProductReview] = $valueNewArrivalProductReview;
          //$newArrivalProductData[$keyNewArrivalProductReview]['review'] = $review = Review::where('product_id',$valueNewArrivalProductReview['id'])->get();
        }

        foreach ($newArrivalProductDatas as $keyProductImage => $valueProductImage) {
          $newArrivalProductData[$keyProductImage] = $valueProductImage;
          $newArrivalProductData[$keyProductImage]['product_image'] = $ProductImage = ProductImage::where('product_id',$valueProductImage['id'])->take('4')->get();
        }
       

        $colorsData = Colors::whereIn('id',$selectSkuProductColorId)->where('status',1)->where('is_deleted',0)->get();
        $sizeData = Sizes::where('status',1)->where('is_deleted',0)->get();
        
   }


    if ($request->new_pop_size_filter !== null) {
      //sizes data view 
          $sizeProductId = ProductSize::where('qty','!=',0)->whereIn('size_id',$request->new_pop_size_filter)->pluck('product_id');
      
    
      $newArrivalProductDatas = Product::where('is_new_arrival','1')->where('status','1')->where('is_deleted','0')->whereIn('id',$sizeProductId)->get();
     
       
          foreach ($newArrivalProductDatas as $keyNewArrivalProductReview => $valueNewArrivalProductReview) {
            $newArrivalProductData[$keyNewArrivalProductReview] = $valueNewArrivalProductReview;
           // $newArrivalProductData[$keyNewArrivalProductReview]['review'] = $review = Review::where('product_id',$valueNewArrivalProductReview['id'])->get();
          }

          foreach ($newArrivalProductDatas as $keyProductImage => $valueProductImage) {
            $newArrivalProductData[$keyProductImage] = $valueProductImage;
            $newArrivalProductData[$keyProductImage]['product_image'] = $ProductImage = ProductImage::where('product_id',$valueProductImage['id'])->take('4')->get();
          }

           $colorsData = Colors::where('status',1)->where('is_deleted',0)->get();
           $sizeData = Sizes::where('status',1)->where('is_deleted',0)->get();
    }

    if ( $request->color_id && $request->sku)
    {
   
       $newArrivalProductDatas = Product::where('is_new_arrival','1')->where('color_id',$request->color_id)->where('sku',$request->sku)->get();
     
      
          foreach ($newArrivalProductDatas as $keyNewArrivalProductReview => $valueNewArrivalProductReview) {
            $newArrivalProductData[$keyNewArrivalProductReview] = $valueNewArrivalProductReview;
            //$newArrivalProductData[$keyNewArrivalProductReview]['review'] = $review = Review::where('product_id',$valueNewArrivalProductReview['id'])->get();
          }

          foreach ($newArrivalProductDatas as $keyProductImage => $valueProductImage) {
            $newArrivalProductData[$keyProductImage] = $valueProductImage;
            $newArrivalProductData[$keyProductImage]['product_image'] = $ProductImage = ProductImage::where('product_id',$valueProductImage['id'])->take('4')->get();
          }

           $colorsData = Colors::where('status',1)->where('is_deleted',0)->get();
           $sizeData = Sizes::where('status',1)->where('is_deleted',0)->get();
           return view('ajax.pop_up_div',compact('newArrivalProductData','colorsData','sizeData')); 
    } 
     

    return view('ajax.new_arrival_pop_filter',compact('newArrivalProductData','colorsData','sizeData'));
  }



}
