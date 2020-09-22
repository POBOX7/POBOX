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
class TestNewArrivalController extends Controller {

  public function newArrival() 
  {
    $bannerSlider = Banners::where('page_id',2)->get();
  
  
    $newArrivalProductData = Product::where('is_new_arrival','1')->where('status','1')->where('is_deleted','0')->paginate(9);

    $newArrivalProductDatas = Product::where('is_new_arrival','1')->where('status','1')->where('is_deleted','0')->get();
    foreach ($newArrivalProductDatas as $keyNewArrivalProductReview => $valueNewArrivalProductReview) {
      $newArrivalProductData[$keyNewArrivalProductReview] = $valueNewArrivalProductReview;
      $newArrivalProductData[$keyNewArrivalProductReview]['review'] = $review = Review::where('product_id',$valueNewArrivalProductReview['id'])->get();
    }
   
    foreach ($newArrivalProductDatas as $keyProductImage => $valueProductImage) {
    	$newArrivalProductData[$keyProductImage] = $valueProductImage;
    	$newArrivalProductData[$keyProductImage]['product_image'] = $ProductImage = ProductImage::where('product_id',$valueProductImage['id'])->take('4')->get();
      $newArrivalProductData[$keyProductImage]['product_qty'] = ProductSize::where('product_id',$valueProductImage['id'])->pluck('qty')->first();
    }
   
   /*echo "<pre>";
   print_r($newArrivalProductData);
   die();*/
    $newArrivalHighlightProductData = Product::where('is_new_arrival','1')->where('highlight','1')->where('status','1')->where('is_deleted','0')->get();

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
      }*/
       $sizeInformation = SizeInformation::select('size_information.id','size_id','chest','waist','hips','length','shoulder','sizes.name AS size_name')
                                            ->join('sizes', 'sizes.id', '=', 'size_information.size_id')
                                            ->orderByDesc('size_information.id')->get();
       
     
    return view('new_arrival',compact('bannerSlider','newArrivalProductData','newArrivalHighlightProductData','categoryData','brandsData','featuredProduct','sizeData','colorsData','sizeInformation'));
  }
  public function productDetail(Request $request , $id)
  {

   

    $productDetailDatas = Product::where('id',$id)->where('is_new_arrival','1')->where('status','1')->where('is_deleted','0')->get();
    foreach ($productDetailDatas as $keyProductReview => $valueNewArrivalProductReview) {
      $productSku = Product::where('id',$valueNewArrivalProductReview->id)->pluck('sku')->toArray();
           $selectSkuProductColorId = Product::where('is_new_arrival','1')->where('status','1')->where('is_deleted','0')->whereIn('sku',$productSku)->pluck('color_id')->toArray();
      $productDetailData[$keyProductReview] = $valueNewArrivalProductReview;
      $productDetailData[$keyProductReview]['review'] = $review = Review::where('product_id',$valueNewArrivalProductReview['id'])->get();
       $productDetailData[$keyProductReview]['color'] = Colors::where('status','1')->where('is_deleted','0')->whereIn('id',$selectSkuProductColorId)->where('status',1)->where('is_deleted',0)->get();  
      
    }   

    foreach ($productDetailDatas as $keyProductImage => $valueProductImage) {
      $productDetailData[$keyProductImage] = $valueProductImage;
      $productDetailData[$keyProductImage]['product_image'] = $ProductImage = ProductImage::where('product_id',$valueProductImage['id'])->take(5)->get();
      $productDetailData[$keyProductImage]['product_qty'] = ProductSize::where('product_id',$valueProductImage['id'])->pluck('qty')->first();
    }
     

    //RELATED PRODUCTS
    $category_id = Product::where('status','1')->where('is_deleted','0')->where('id',$id)->pluck('category_id');

    $brand_id = Product::where('status','1')->where('is_deleted','0')->where('id',$id)->pluck('brand_id');

    $brandName = Brands::where('id',$brand_id[0])->first();
    //dd($brandName->name);
   $CategoryName = Category::where('id',$category_id[0])->first();
    $selectedBrandAndCat = Product::whereIn('category_id',$category_id)->whereIn('brand_id',$brand_id)->where('status','1')->where('is_deleted','0')->pluck('id');

     $featuredProduct = Product::where('is_new_arrival','1')->whereIn('id',$selectedBrandAndCat)->where('status','1')->where('is_deleted','0')->get();

     foreach ($featuredProduct as $keyFeaturedProductReview => $valueFeaturedProductReview) {
      $featuredProduct[$keyFeaturedProductReview] = $valueFeaturedProductReview;
      $featuredProduct[$keyFeaturedProductReview]['review'] = $review = Review::where('product_id',$valueFeaturedProductReview['id'])->get();
    } 
 $selectedColor =  $productColor = Product::where('status','1')->where('is_deleted','0')->where('id',$id)->pluck('color_id');
 
    $selectedSize =$productSize = ProductSize::where('product_id',$id)->pluck('size_id');

    //SizeInformation 
      /*$sizeInformation = SizeInformation::all();
      foreach ($sizeInformation as $keySizeInformation => $valueSizeInformation) {
          $sizeInformation[$keySizeInformation]['size_name'] = Sizes::where('id',$valueSizeInformation->id)->where('status',1)->where('is_deleted',0)->get()->toArray();
      }*/
  $sizeInformation = SizeInformation::select('size_information.id','size_id','chest','waist','hips','length','shoulder','sizes.name AS size_name')
                                            ->join('sizes', 'sizes.id', '=', 'size_information.size_id')
                                            ->orderByDesc('size_information.id')->get();


    return view('product_detail_old',compact('productDetailData','featuredProduct','selectedColor','selectedSize','brandName','CategoryName','sizeInformation'));
  }

public function productDetailFilter(Request $request){
  
  //dd($product);

  //$selectSkuProduct = Product::where('id',$request->product_id)->pluck('sku');
  //$productDetailDatas = Product::whereIn('sku',$selectSkuProduct)->whereIn('color_id',$request->popup_color)->where('is_new_arrival','1')->where('status','1')->where('is_deleted','0')->get();
   /* foreach ($product as $keyProductReview => $valueNewArrivalProductReview) {
      $productSku = Product::where('id',$valueNewArrivalProductReview->id)->pluck('sku')->toArray();
           $selectSkuProductColorId = Product::whereIn('sku',$productSku)->pluck('color_id')->toArray();
      $productDetailData[$keyProductReview] = $valueNewArrivalProductReview;
      $productDetailData[$keyProductReview]['review'] = $review = Review::where('product_id',$valueNewArrivalProductReview['id'])->get();
       $productDetailData[$keyProductReview]['color'] = Colors::whereIn('id',$selectSkuProductColorId)->where('status',1)->where('is_deleted',0)->get();  
      
    }   


    foreach ($product as $keyProductImage => $valueProductImage) {
      $productDetailData[$keyProductImage] = $valueProductImage;
      $productDetailData[$keyProductImage]['product_image'] = $ProductImage = ProductImage::where('product_id',$valueProductImage['id'])->take('4')->get();
      $productDetailData[$keyProductImage]['product_qty'] = ProductSize::where('product_id',$valueProductImage['id'])->pluck('qty')->first();
    }*/
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


      $product_sku = Product::where('is_new_arrival','1')->where('status','1')->where('is_deleted','0')->where('id',$request->product_id)->pluck('sku')->first(); 
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
              $productsize_id = ProductSize::select('product_id')->where('size_id',$popup_size)->get();   
              $products = $products->whereIn('id',$productsize_id)->where('id','!=',$request->product_id)->where('sku',$product_sku); 
            }  
            $product = $products->get();  
      $productDetailData = array();
      foreach ($product as $key => $value) {
         $productDetailData[$key] = $value;
          $productDetailData[$key]['product_image'] = $ProductImage = ProductImage::where('product_id',$value['id'])->take('5')->get();
          $productSku = Product::where('is_new_arrival','1')->where('status','1')->where('is_deleted','0')->where('id',$value->id)->pluck('sku')->toArray();
           $selectSkuProductColorId = Product::whereIn('sku',$productSku)->pluck('color_id')->toArray(); 
        $productDetailData[$key]['review'] = $review = Review::where('product_id',$value['id'])->get();
        $productDetailData[$key]['color'] = Colors::whereIn('id',$selectSkuProductColorId)->where('status',1)->where('is_deleted',0)->get();
      }  
      $selectedColor = $popup_color;
      $selectedSize =$popup_size;


      $category_id = Product::where('status','1')->where('is_deleted','0')->where('id',$request->product_id)->pluck('category_id');

    $brand_id = Product::where('status','1')->where('is_deleted','0')->where('id',$request->product_id)->pluck('brand_id');

    $brandName = Brands::where('id',$brand_id[0])->first();
    //dd($brandName->name);
   $CategoryName = Category::where('id',$category_id[0])->first();

   // Releted product
   $selectedBrandAndCat = Product::whereIn('category_id',$category_id)->whereIn('brand_id',$brand_id)->where('status','1')->where('is_deleted','0')->pluck('id');

     $featuredProduct = Product::where('is_new_arrival','1')->whereIn('id',$selectedBrandAndCat)->where('status','1')->where('is_deleted','0')->get();

     foreach ($featuredProduct as $keyFeaturedProductReview => $valueFeaturedProductReview) {
      $featuredProduct[$keyFeaturedProductReview] = $valueFeaturedProductReview;
      $featuredProduct[$keyFeaturedProductReview]['review'] = $review = Review::where('product_id',$valueFeaturedProductReview['id'])->get();
    } 


    //SizeInformation 
      /*$sizeInformation = SizeInformation::all();
      foreach ($sizeInformation as $keySizeInformation => $valueSizeInformation) {
          $sizeInformation[$keySizeInformation]['size_name'] = Sizes::where('id',$valueSizeInformation->id)->where('status',1)->where('is_deleted',0)->get()->toArray();
      }*/
       $sizeInformation = SizeInformation::select('size_information.id','size_id','chest','waist','hips','length','shoulder','sizes.name AS size_name')
                                            ->join('sizes', 'sizes.id', '=', 'size_information.size_id')
                                            ->orderByDesc('size_information.id')->get();
    //dd($popup_size,$popup_color);
  return view('ajax.product_detail_filter',compact('productDetailData','selectedColor','selectedSize','brandName','CategoryName','featuredProduct','sizeInformation'));
}

  
  public function PriceFilter(Request $request){
 /////////////////////////////////////// Default sorting filter start////////////////
//featured filter sorting
if ($request->brand_filter)
{
  $brand = Session::get('brand');
  if ($request->brand_filter == $brand)
  {
    
    $request->brand_filter = null ;   
  }
}



if($request->sorting_filter == "featured" ){  
      $newArrivalProductDatas = Product::where('is_new_arrival','1')->where('status','1')->where('is_deleted','0')->where('is_featured','1')->get();
          foreach ($newArrivalProductDatas as $keyNewArrivalProductReview => $valueNewArrivalProductReview) {
            $newArrivalProductData[$keyNewArrivalProductReview] = $valueNewArrivalProductReview;
            $newArrivalProductData[$keyNewArrivalProductReview]['review'] = $review = Review::where('product_id',$valueNewArrivalProductReview['id'])->get();
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
            $newArrivalProductData[$keyNewArrivalProductReview]['review'] = $review = Review::where('product_id',$valueNewArrivalProductReview['id'])->get();
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
            $newArrivalProductData[$keyNewArrivalProductReview]['review'] = $review = Review::where('product_id',$valueNewArrivalProductReview['id'])->get();
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
            $newArrivalProductData[$keyNewArrivalProductReview]['review'] = $review = Review::where('product_id',$valueNewArrivalProductReview['id'])->get();
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
            $newArrivalProductData[$keyNewArrivalProductReview]['review'] = $review = Review::where('product_id',$valueNewArrivalProductReview['id'])->get();
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
            $newArrivalProductData[$keyNewArrivalProductReview]['review'] = $review = Review::where('product_id',$valueNewArrivalProductReview['id'])->get();
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
          $newArrivalProductData[$keyNewArrivalProductReview]['review'] = $review = Review::where('product_id',$valueNewArrivalProductReview['id'])->get();
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
            $newArrivalProductData[$keyNewArrivalProductReview]['review'] = $review = Review::where('product_id',$valueNewArrivalProductReview['id'])->get();
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
            $newArrivalProductData[$keyNewArrivalProductReview]['review'] = $review = Review::where('product_id',$valueNewArrivalProductReview['id'])->get();
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
            $newArrivalProductData[$keyNewArrivalProductReview]['review'] = $review = Review::where('product_id',$valueNewArrivalProductReview['id'])->get();
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
            $newArrivalProductData[$keyNewArrivalProductReview]['review'] = $review = Review::where('product_id',$valueNewArrivalProductReview['id'])->get();
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
          $newArrivalProductData[$keyNewArrivalProductReview]['review'] = $review = Review::where('product_id',$valueNewArrivalProductReview['id'])->get();
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
            $newArrivalProductData[$keyNewArrivalProductReview]['review'] = $review = Review::where('product_id',$valueNewArrivalProductReview['id'])->get();
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
            $newArrivalProductData[$keyNewArrivalProductReview]['review'] = $review = Review::where('product_id',$valueNewArrivalProductReview['id'])->get();
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
