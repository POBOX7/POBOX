<?php
namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Testinomials;
use App\Banners;
use App\DiscountBanners; 
use App\Colors;
use App\Review; 
use App\ProductImage;
use App\Pages;
use App\Blogs;
use App\AboutUs;
use App\SizeInformation;
use App\Sizes;
use App\ContactUs;
use Mail;
class HomeController extends Controller 

{

  public function index () 
  {

    //is_trending
    $trendingData = Product::where('is_trending',1)->where('status','1')->where('is_deleted','0')->limit(4)->get(); 

    //is_new_arrival 
    $newArrival = Product::where('is_new_arrival',1)->where('highlight',1)->where('status','1')->where('is_deleted','0')->limit(4)->get();
    //dd($newArrival);
    $category = Category::where('status','1')->where('is_deleted','0')->limit(3)->get();
    foreach ($category as $key => $value) {
      $category[$key] = $value; 
      if($value->id == 1){
        $link = "http://3.7.41.47/pobox_new/pobox/public/kurties";
      }
      if($value->id == 2){
        $link = "http://3.7.41.47/pobox_new/pobox/public/kurta-sets";
      }
      if($value->id == 3){
        $link = "http://3.7.41.47/pobox_new/pobox/public/dresses";
      }
      $category[$key]['link'] =  $link;
    } 
    //testinomials
    $testinomials = Testinomials::all();

    //home slider
    $banners_slider = Banners::where('page_id',1)->get();
    
    //Qick view colors

      
        $newArrivalProductDatas = Product::where('is_new_arrival',1)->where('highlight',1)->where('status','1')->where('is_deleted','0')->limit(4)->get();
        foreach ($newArrivalProductDatas as $keyNewArrivalProductReview => $valueNewArrivalProductReview) {
           $productSku = Product::where('id',$valueNewArrivalProductReview->id)->pluck('sku')->toArray();
           $selectSkuProductColorId = Product::whereIn('sku',$productSku)->pluck('color_id')->toArray();

          
          $newArrival[$keyNewArrivalProductReview] = $valueNewArrivalProductReview;
          $newArrival[$keyNewArrivalProductReview]['review'] = $review = Review::where('product_id',$valueNewArrivalProductReview['id'])->get();
           $newArrival[$keyNewArrivalProductReview]['color'] = Colors::whereIn('id',$selectSkuProductColorId)->where('status',1)->where('is_deleted',0)->get(); 
        }

        foreach ($newArrivalProductDatas as $keyProductImage => $valueProductImage) {
          $newArrival[$keyProductImage] = $valueProductImage;
          $newArrival[$keyProductImage]['product_image'] = $ProductImage = ProductImage::where('product_id',$valueProductImage['id'])->take('4')->get();
         
        } 
    //Trending
    $trendings = Product::where('is_new_arrival',1)->where('status','1')->where('is_trending',1)->where('is_deleted','0')->limit(4)->get();
        foreach ($trendings as $keyTrendingProductReview => $valueTrendingProductReview) {
           $productSku = Product::where('id',$valueTrendingProductReview->id)->pluck('sku')->toArray();
           $selectSkuProductColorId = Product::whereIn('sku',$productSku)->pluck('color_id')->toArray();

          
          $trending[$keyTrendingProductReview] = $valueTrendingProductReview;
          $trending[$keyTrendingProductReview]['review'] = $review = Review::where('product_id',$valueTrendingProductReview['id'])->get();
          $trending[$keyTrendingProductReview]['color'] =  Colors::whereIn('id',$selectSkuProductColorId)->where('status',1)->where('is_deleted',0)->get(); 
        }

        foreach ($trendings as $keyProductImage => $valueProductImage) {
          $trending[$keyProductImage] = $valueProductImage;
          $trending[$keyProductImage]['product_image'] = $ProductImage = ProductImage::where('product_id',$valueProductImage['id'])->take('4')->get();
        }
        

    //DiscountBanners
    $static_banners = DiscountBanners::take(3)->get();
    return view('new_resources.home',compact('newArrival','trendingData','category','testinomials','banners_slider','static_banners')); 
  }

   public function aboutUs(){
    $aboutData = AboutUs::where('status','1')->where('is_deleted','0')->first(); 
    return view('about_us',compact('aboutData'));
    
  }
  public function contactUs(){
    return view('contact_us');
  }
  public function contactUsStore(Request $request){
        $addContactUsData = new ContactUs;   
        $addContactUsData->name = $request['name'];
        $addContactUsData->email = $request['email'];
        $addContactUsData->phone_number = $request['phone_number'];
        $addContactUsData->contact_message = $request['contact_message'];
        $addContactUsData->save(); 

         Mail::send(['html'=>'email.contact_us_mail'],['addContactUsData'=>$addContactUsData],function($message) use ($addContactUsData){
                    $message->to($addContactUsData['email'])->subject('Thank you for contacting PO Box !');
                    $message->from('rakeshsathwara.rc@gmail.com','Pobox');
                });

       return redirect()->route('contactUs')->with('status','Thanks for registration.Please check your email');
  }
   

} 
