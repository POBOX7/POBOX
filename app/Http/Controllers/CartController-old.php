<?php
namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Useraddresses;
use App\Cart;
use App\Wishlist;
use Auth;
use App\ProductSize;

use Session;
class CartController extends Controller {


  public function cartPage() 
  {
      $productDetail = [];
   if(Auth::id() > 0){
        $user_id = Auth::id(); 
        $productDetail =  DB::table('cart')
                            ->join('products', 'products.id', '=', 'cart.product_id')
                            // ->join('product_size', 'product_size.size_id', '=', 'cart.size')
                            ->join('sizes', 'cart.size', '=', 'sizes.id')
                            ->join('colors', 'colors.id', '=', 'products.color_id')
                            ->select('products.id as product_id','products.name','products.image','cart.id AS cart_id','cart.size as size_id','cart.qty','sizes.name as size_name','products.price','products.mrp','hex_code','discount')
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
                            ->select('products.id as product_id','product_size.product_id','product_size.size_id as size_id','products.name','products.image','sizes.name as size_name','products.price','products.mrp','hex_code','discount')
                            ->where('products.id',$productVal['user_product_id'])
                            ->where('product_size.size_id',$productVal['user_size'])->first();

                      if(!empty($productData)){
                          $productData->cart_id = $productVal['cart_id'];
                          $productData->qty = $productVal['user_qty'];
                          $productDetail[] = $productData;
                      }

                  }
                  
       }
    }
     if(!empty($productDetail)){
         
        foreach ($productDetail as $key => $value) {
                $product_size_data = ProductSize::where('product_id',$value->product_id)
                                        ->where('size_id',$value->size_id)
                                        ->first();


                $productDetail[$key]->max_qty = $product_size_data->qty;

            }
     }
        
    return view('cart.cart',compact('productDetail'));
  }
  public function checkoutShipping() 
  {
    return view('cart.checkout_shipping');
  }
  public function checkoutDetail() 
  {
    //$id = 136;
    $addresses = [];
    $productDetail = [];
    if(Auth::id() > 0){
        $user_id = Auth::id(); 
        $productDetail =  DB::table('cart')
                            ->join('products', 'products.id', '=', 'cart.product_id')
                            //->join('product_size', 'product_size.size_id', '=', 'cart.size')
                            ->join('sizes', 'cart.size', '=', 'sizes.id')
                            ->join('colors', 'colors.id', '=', 'products.color_id')
                            ->select('products.id as product_id','products.name','products.image','cart.qty','sizes.name as size_name','products.price','products.mrp','hex_code','discount')
                            ->where('cart.user_id',$user_id)->get();

        $addresses = Useraddresses::where('user_id',$user_id)->get();
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
    }
    return view('cart.checkout_detail',compact('productDetail','addresses'));
  }
   public function wishlist() 
  {
    return view('wishlist.wishlist');
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

   public function addToCart(Request $request){
      $check_list = Cart::where('user_id',$request->user_id)
                                ->where('product_id',$request->product_id)
                                ->where('size',$request->size)
                                ->where('qty',$request->qty)
                                ->first();
      
      //$checkWishList = Wishlist::where('user_id',$request->user_id)->where('product_id',$request->product_id)->delete();
      if($check_list){
          return "Product is already in the cart";exit();
      }else{
          $add_cart = array(
                      'product_id' => $request->product_id,
                      'user_id'  => $request->user_id,
                      'size' => $request->size,
                      'qty'  => $request->qty,
                  );

          $add_wishList = Cart::create($add_cart);

          return "Product added in the cart";exit();
      }
    }
    
    public function addCartForGuestUser(Request $request){
        $productData = [];
        $productData['user_product_id'] = $request->product_id;
        $productData['user_size'] = $request->size;
        $productData['user_qty'] = $request->qty;
        
        if(!empty(Session::get('shoppingCart'))){
            $allData = Session::get('shoppingCart');
            $allData = array_filter($allData);
            $isAdd = 0;
            foreach ($allData as $array) {
                if(isset($array['user_product_id']) && $array['user_product_id'] == $productData['user_product_id'] && isset($array['user_size']) && $array['user_size'] == $productData['user_size'] && isset($array['user_qty']) && $array['user_qty'] == $productData['user_qty']){
                    $isAdd = 0;
                }else {
                    $isAdd = 1;
                }
            }
            if($isAdd == 1){
                $productData['cart_id'] = mt_rand(100000, 999999);
                Session::push('shoppingCart',$productData);
            } else {
                return "Product is already in the cart";
            }
            
        } else {
            Session::push('shoppingCart',[]);
            $productData['cart_id'] = mt_rand(100000, 999999);
            Session::push('shoppingCart',$productData);
        }
        
        return "Product added in the cart";
    }

    public function removeProduct($id){
      print_r($id);
      exit;
      $user_id    = Auth::id();
      $cart_data  = Cart::where('id',$id)->delete();

      return redirect()->route('cartPage'); 
    }

    public function removeCart(){
      $user_id    = Auth::id();
      $cart_data  = Cart::where('user_id',$user_id)->delete();

      return redirect()->route('cartPage'); 
    }
	
	// checkoutPlaceOrder
	
	
	public function(Request $request)
	{
		return $request;
	}

}
