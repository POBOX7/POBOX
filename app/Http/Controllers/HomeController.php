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
use App\ContactUsDetail;
use Mail;
class HomeController extends Controller 

{
  public function errors()
  {
   return view('errors.404'); 
  }
  
  public function index () 
  {
    //CHECK IF THE REQUEST COMES FROM ADMIN SUBDOMAIN
      $url = (explode('.', $_SERVER['HTTP_HOST']));
      if(isset($url[0]) && $url[0]=='admin'){
      return view('auth.admin-login');
          return redirect()->route('login')->with('status','Thank you for contacting us,we will get back to you soon');
     }
    //CHECK IF THE REQUEST COMES FROM ADMIN SUBDOMAIN
    //is_trending
    $trendingData = Product::where('is_trending',1)->where('status','1')->where('is_deleted','0')->limit(4)->get(); 

    //is_new_arrival 
    $newArrival = Product::where('is_new_arrival',1)->where('highlight',1)->where('status','1')->where('is_deleted','0')->limit(4)->get();
    //dd($newArrival);
    $category = Category::where('status','1')->where('is_deleted','0')->limit(3)->get();
    foreach ($category as $key => $value) {
      $category[$key] = $value; 
      if($value->id == 1){
        $link = "https://poboxfashion.com/kurties";
      }
      if($value->id == 2){
        $link = "https://poboxfashion.com/kurta-sets";
      }
      if($value->id == 3){
        $link = "https://poboxfashion.com/dresses";
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
    $ContactUsDetail = ContactUsDetail::first();
    return view('contact_us',compact('ContactUsDetail'));
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
                    $message->from('info@poboxfashion.com','Pobox');
                });

       return redirect()->route('contactUs')->with('status','Thank you for contacting us,we will get back to you soon');
  }
 /* public function blog(){
    $blogsData = Blogs::where('status','1')->where('is_deleted','0')->paginate(9);
    return view('blog',compact('blogsData'));
  }*/
  public function affiliate(){
    $pagesData = Pages::where('id','8')->where('is_delete','0')->where('active','1')->first();
    return view('pages.affiliate',compact('pagesData'));
  }

  public function howToOrder(){
     $pagesData = Pages::where('id','4')->where('is_delete','0')->where('active','1')->first();
    return view('pages.how_to_order',compact('pagesData'));
  }

  public function howToTrack(){
     $pagesData = Pages::where('id','5')->where('is_delete','0')->where('active','1')->first();
    return view('pages.how_to_track',compact('pagesData'));
  }

  public function PrivacyPolicy(){
     $pagesData = Pages::where('id','6')->where('is_delete','0')->where('active','1')->first();
   return view('pages.privacy_policy',compact('pagesData'));
  }

  public function returnPolicy(){
     $pagesData = Pages::where('id','3')->where('is_delete','0')->where('active','1')->first();
    return view('pages.return_policy',compact('pagesData'));
  }

  public function termAndCondition(){
     $pagesData = Pages::where('id','2')->where('is_delete','0')->where('active','1')->first();
    return view('pages.term_and_condition',compact('pagesData'));
  }
  public function sizeInformation(){
     $bannerSlider = Banners::where('page_id',10)->first(); 
     //SizeInformation 
     /* $sizeInformation = SizeInformation::all();

      foreach ($sizeInformation as $keySizeInformation => $valueSizeInformation) {
          $sizeInformation[$keySizeInformation]['size_name'] = Sizes::where('id',$valueSizeInformation->id)->where('status',1)->where('is_deleted',0)->get()->toArray();
      }*/
      $sizeInformations = SizeInformation::select('size_information.id','size_id','chest','waist','hips','length','shoulder','sizes.name AS size_name')
                                            ->join('sizes', 'sizes.id', '=', 'size_information.size_id')
                                            ->orderByDesc('size_information.id')->get();
                                            //dd($sizeInformation);
     
    return view('pages.size_guide',compact('sizeInformations','bannerSlider'));
  }
  public function shippingInfo(){
     $pagesData = Pages::where('id','9')->where('is_delete','0')->where('active','1')->first();
    return view('pages.shipping_info',compact('pagesData'));
  }



} 
