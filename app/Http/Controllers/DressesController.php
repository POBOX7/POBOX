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
class DressesController extends Controller {

  public function DressesList() 
  { 
    $bannerSlider = Banners::where('page_id',6)->first(); 
    $newArrivalProductData = Product::where('category_id',3)->where('status',1)->where('is_deleted',0)->paginate(9);
    //dd($newArrivalProductData);
    $newArrivalProductDatas = Product::where('category_id',3)->where('status',1)->where('is_deleted',0)->paginate(9);
    
    foreach ($newArrivalProductDatas as $keyNewArrivalProductReview => $valueNewArrivalProductReview) {
      $productSku = Product::where('id',$valueNewArrivalProductReview->id)->where('category_id','3')->where('status','1')->where('is_deleted','0')->pluck('sku')->toArray();
           $selectSkuProductColorId = Product::where('category_id','3')->where('status','1')->where('is_deleted','0')->whereIn('sku',$productSku)->pluck('color_id')->toArray();
      $newArrivalProductData[$keyNewArrivalProductReview] = $valueNewArrivalProductReview;
      $newArrivalProductData[$keyNewArrivalProductReview]['review'] = $review = Review::where('product_id',$valueNewArrivalProductReview['id'])->get();
       $newArrivalProductData[$keyNewArrivalProductReview]['color'] = Colors::whereIn('id',$selectSkuProductColorId)->where('status',1)->where('is_deleted',0)->get();  
      
    }   
    
    foreach ($newArrivalProductDatas as $keyProductImage => $valueProductImage) {
      
      $newArrivalProductData[$keyProductImage] = $valueProductImage;
      $newArrivalProductData[$keyProductImage]['product_image'] = $ProductImage = ProductImage::where('product_id',$valueProductImage['id'])->get();
      $newArrivalProductData[$keyProductImage]['product_qty'] = ProductSize::where('product_id',$valueProductImage['id'])->pluck('qty')->first(); 
       $size_id = ProductSize::where('product_id',$valueProductImage['id'])->pluck('size_id')->toArray();
      $newArrivalProductData[$keyProductImage]['size'] = Sizes::whereIn('id',$size_id)->get();
    }

   
   /*echo "<pre>";
   print_r($newArrivalProductData);
   die();*/
    $newArrivalHighlightProductData = Product::where('category_id','3')->where('highlight','1')->where('status','1')->where('is_deleted','0')->get();

   //Left side bar 

    //Categories Data
    $categoryData = Category::where('status','1')->where('is_deleted','0')->get();
   
    //Brands Data
    $brandsData = Brands::where('status','1')->where('is_deleted','0')->get();
    foreach ($brandsData as $keyBrandsData => $valueBrandsData) {
      $brandsData[$keyBrandsData] = $valueBrandsData;
      $brandsData[$keyBrandsData]['product_count'] = $product = Product::where('brand_id',$valueBrandsData['id'])->where('category_id','3')->where('status','1')->where('is_deleted','0')->count('brand_id');
    }

    //FEATURED PRODUCTS
     $featuredProduct = Product::where('category_id','3')->where('is_featured','1')->where('status','1')->where('is_deleted','0')->take(3)->get();
     foreach ($featuredProduct as $keyFeaturedProductReview => $valueFeaturedProductReview) {
      $featuredProduct[$keyFeaturedProductReview] = $valueFeaturedProductReview;
      $featuredProduct[$keyFeaturedProductReview]['review'] = $review = Review::where('product_id',$valueFeaturedProductReview['id'])->get();
    }
    $featuredProduct = Product::where('category_id','3')->where('is_featured','1')->where('status','1')->where('is_deleted','0')->take(3)->get();
     foreach ($featuredProduct as $keyFeaturedProductReview => $valueFeaturedProductReview) {
      $featuredProduct[$keyFeaturedProductReview] = $valueFeaturedProductReview;
      $featuredProduct[$keyFeaturedProductReview]['review'] = $review = Review::where('product_id',$valueFeaturedProductReview['id'])->get();
    }
     
     //sizes data view

      $sizeData = Sizes::where('status',1)->where('is_deleted',0)->get();

      //$sizeData = Sizes::where('status',1)->where('is_deleted',0)->orderBy('name','ASC')->get();
      //$colors data view
      $colorsData = Colors::where('status',1)->where('is_deleted',0)->get();
      
      //SizeInformation 
      /*$sizeInformation = SizeInformation::all();
      foreach ($sizeInformation as $keySizeInformation => $valueSizeInformation) {
          $sizeInformation[$keySizeInformation]['size_name'] = Sizes::where('id',$valueSizeInformation->id)->where('status',1)->where('is_deleted',0)->get()->toArray();
      }  */ 

      $sizeInformation = SizeInformation::select('size_information.id','size_id','chest','waist','hips','length','shoulder','sizes.name AS size_name')
                                            ->join('sizes', 'sizes.id', '=', 'size_information.size_id')
                                            ->orderByDesc('size_information.id')->get();
        $left_sidebar_featuredProduct = Product::where('is_featured','1')->where('status','1')->where('is_deleted','0')->limit(3)->orderBy('id', 'DESC')->get();                                     
    return view('new_resources.dresses',compact('bannerSlider','newArrivalProductDatas','newArrivalHighlightProductData','categoryData','brandsData','featuredProduct','sizeData','colorsData','sizeInformation','left_sidebar_featuredProduct')); 
  }  

}
