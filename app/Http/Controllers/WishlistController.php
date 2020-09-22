<?php
namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Useraddresses;
use App\Product;
use App\ProductImage;
use App\Wishlist;
use App\Cart;
use Auth;
use Session;
class WishlistController extends Controller {

  public function cartPage() 
  {
    return view('cart.cart');
  }
  public function checkoutShipping() 
  {
    return view('cart.checkout_shipping');
  }
  public function checkoutDetail() 
  {
    //$id = 136;
    $user_id = Auth::id(); 
    $productDetail =  DB::table('cart')
                        ->join('products', 'products.id', '=', 'cart.product_id')
                        ->join('product_size', 'product_size.id', '=', 'cart.size')
                        ->join('sizes', 'product_size.size_id', '=', 'sizes.id')
                        ->join('colors', 'colors.id', '=', 'products.color_id')
                        ->select('products.id as product_id','products.name','products.image','cart.qty','sizes.name as size_name','products.price','products.mrp','hex_code','discount')
                        ->where('cart.user_id',$user_id)->get();

    $addresses = Useraddresses::where('user_id',$user_id)->get(); 
    
    return view('cart.checkout_detail',compact('productDetail','addresses'));
  }
   public function wishlist() 
  {
    $user_id = Auth::id(); 
    if($user_id){
      $wishlist       = Wishlist::where('user_id',$user_id)->get()->pluck('product_id');
      $productDetail  = Product::whereIn('id',$wishlist)->get()->toArray();
      foreach ($productDetail as $key => $value) {
         $product = ProductImage::where('product_id',$value['id'])->first();
         $productDetail[$key]['product_image'] = $product->product_image;
      }

      if(empty($productDetail)){
        return view('wishlist.Blankwishlist');

      }else{
	
        return view('wishlist.wishlist',compact('productDetail'));
      }
    }else{
      return view('wishlist.Blankwishlist');

    }
  }
  
   public function cartStore(Request $request)
   {
		  $request->validate([
         
        'first_name' => 'required',
		
      
        ]);
		
		 $addCartData->name = $request['full_name'];
		 $addCartData->save(); 

       return redirect()->route('cart.cart')->with('status','Thank you for save data');
   }

   public function addToWishList(Request $request){
      $check_list = Wishlist::where('user_id',$request->user_id)
                                ->where('product_id',$request->product_id)
                                ->first();
      if($check_list){
        $check_list->delete();
          return "Product is removed from wishlist";
      }else{
          $add_movie = array(
                      'product_id' => $request->product_id,
                      'user_id'  => $request->user_id,
                  );

          $add_wishList = Wishlist::create($add_movie);

          return "Product added in the wishlist";

      }
    }

    public function hoverCart(){
      $productDetail = [];
      /*if((Auth::id()) > 0){
            $user_id        = Auth::id(); 
            $cart_data      = Cart::where('user_id',$user_id)->get()->pluck('product_id');
            $productDetail =  DB::table('cart')
                              ->join('products', 'products.id', '=', 'cart.product_id')
                              ->join('sizes', 'cart.size', '=', 'sizes.id')
                              ->join('colors', 'colors.id', '=', 'products.color_id')
                              ->select('cart.id as cart_id','products.id as product_id','products.name','products.image','cart.qty','sizes.name as size_name','products.price','products.mrp','hex_code','discount')
                              ->where('cart.user_id',$user_id)->get();
      } else {
          if(!empty(Session::get('shoppingCart'))){
              $allData = Session::get('shoppingCart');
              $allData = array_filter($allData);
              
              foreach($allData as $productKey => $productVal){
                  $productData =  DB::table('products')
                        ->join('product_size', 'product_size.product_id', '=', 'products.id')
                        ->join('sizes', 'sizes.id', '=', 'product_size.size_id')
                        ->join('colors', 'colors.id', '=', 'products.color_id')
                        ->select('products.id as product_id','product_size.product_id','product_size.size_id as sizeid','products.name','products.image','sizes.name as size_name','products.price','products.mrp','hex_code','discount')
                        ->where('products.id',$productVal['user_product_id'])
                        ->where('product_size.size_id',$productVal['user_size'])->first();
                  
                  if(!empty($productData)){
                      $productData->cart_id = $productVal['cart_id'];
                      $productData->qty = $productVal['user_qty'];
                      
                      $productDetail[] = $productData;
                  }
                  
              }
          }
      }*/

      if (!Auth::user()){
          $user_id  = Session::getId();
      }else{
          $user_id = Auth::id(); 
      }
      $cart_data      = Cart::where('user_id',$user_id)->get()->pluck('product_id');
      $productDetail =  DB::table('cart')
                        ->join('products', 'products.id', '=', 'cart.product_id')
                        ->join('sizes', 'cart.size', '=', 'sizes.id')
                        ->join('colors', 'colors.id', '=', 'products.color_id')
                        ->select('cart.id as cart_id','products.id as product_id','products.name','products.image','cart.qty','sizes.name as size_name','products.price','products.mrp','hex_code','discount')
                        ->where('cart.user_id',$user_id)->get();
      
      $data_array = array('product_details' => $productDetail);
      if($productDetail){
        return $data_array;
      }else{
        return "No product found";
      }
 
    }

    public function removeCartData(Request $request){
      $cart_id = $request->cart_id; 
      /*if((Auth::id()) > 0){
          $user_id    = Auth::id();
          $cart_data  = Cart::where('user_id',$user_id)->where('id',$cart_id)->delete();
      } else {
          $cart_data = 1;
          if(!empty(Session::get('shoppingCart'))){
            $allData = Session::get('shoppingCart');
            $allData = array_filter($allData);
            
            foreach($allData as $productKey => $productVal){
                if($productVal['cart_id'] == $cart_id){
                    unset($allData[$productKey]);
                }
            }
            Session::put('shoppingCart',$allData);
          }
      }*/

      $cart_data  = Cart::where('id',$cart_id)->delete();
      
      if($cart_data){
        return "record deleted";
      }else{
        return "error while deleting record";
      }
    }

    public function removeWatchlistData(Request $request){
      $user_id    = Auth::id();
      $product_id = $request->product_id; 
      $cart_data  = Wishlist::where('user_id',$user_id)->where('product_id',$request->product_id)->delete();
      
      $all_data  = Wishlist::where('user_id',$user_id)->count();
      if($all_data == 0){
          return 0;
      } else {
        if($cart_data){
            return "record deleted";
          }else{
            return "error while deleting record";
          }
      }
      
    }

}
