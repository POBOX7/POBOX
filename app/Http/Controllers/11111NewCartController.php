<?php
namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Useraddresses;
use App\Cart;
use App\Order;
use App\OrderDetail;
use App\Wishlist;
use Auth;
use App\ProductSize;
use App\PaymentHistory;

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
                            ->select('products.id as product_id','products.name','products.image','cart.id AS cart_id','cart.size as size_id','cart.qty','sizes.name as size_name','products.price','products.mrp','hex_code','discount','gst')
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
                            ->select('products.id as product_id','product_size.product_id','product_size.size_id as size_id','products.name','products.image','sizes.name as size_name','products.price','products.mrp','hex_code','discount','gst')
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
                            ->select('products.id as product_id','products.name','products.image','cart.qty','sizes.name as size_name','products.price','products.mrp','hex_code','discount','gst')
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
                        ->select('products.id as product_id','product_size.product_id','product_size.size_id as sizeid','products.name','products.image','sizes.name as size_name','products.price','products.mrp','hex_code','discount','gst')
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
  public function updatecart(Request $request)
  {
	  
     	if(Auth::Check())
	    {
		  foreach($request['product_id'] as $key => $id)
			  {
				  $check_list = Cart::where('user_id',$request->userid)
										 ->where('product_id',$id)
									   ->update([
									   'size'=>$request['size'][$key],
									   'qty'=>$request['qty'][$key],
									   ]);
															
			}	 
		}	
		else
		{
		
		  foreach($request['product_id'] as $key => $id)
			{
				  $productData = [];
				  $productData['user_product_id'] = $id;
				  $productData['user_size'] = $request['size'][$key];
				  $productData['user_qty'] = $request['qty'][$key];
				
				
				if(!empty(Session::get('shoppingCart'))){
					
				$allData = Session::get('shoppingCart');
				$allData = array_filter($allData);
				$isAdd = 0;
				foreach ($allData as $key => $array) {
                    if($array['user_product_id'] == $productData['user_product_id'])
					{
					  session()->forget("shoppingCart.$key");
					
					}
				}
				
				  $productData['cart_id'] = mt_rand(100000, 999999);
				  Session::push('shoppingCart',$productData);
            }		
		 } 
		  
       }	
   
	return redirect()->route('checkoutDetail'); 
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
	  
	$check_wishlist = Wishlist::where('user_id',$request->user_id)
                                ->where('product_id',$request->product_id)
                                ->first();
    if($check_wishlist){
        $check_wishlist->delete();
     }
	  
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
            $productData['cart_id'] = mt_rand(100000, 999999);
            Session::push('shoppingCart',$productData);
        }
        
        return "Product added in the cart";
    }

    public function removeProduct($id){
	
	 if(Auth::check())
	 {
	  $user_id    = Auth::id();
      $cart_data  = Cart::where('id',$id)->delete();
	 }
	 else{
		
		 foreach (array_filter(Session::get('shoppingCart')) as $key => $value) {
          
			if ($value['cart_id'] == $id) {
			  session()->forget("shoppingCart.$key");
			   
			}
		 }
	 }
 
      return redirect()->route('cartPage'); 
    }

    public function removeCart(){
		
       if(Auth::check())
	   {
		    $user_id    = Auth::id();
            $cart_data  = Cart::where('user_id',$user_id)->delete();
	   }	
		else
		{
			session()->forget('shoppingCart');
			session()->flush();
		}	   
     

      return redirect()->route('cartPage'); 
    }
	
	// checkoutPlaceOrder
	
	
	public function checkoutPlaceOrder(Request $request)
	{
  
    $newaddress = null;
		$productDetail = [];
		$user_id = Auth::id(); 
	  $ordernumber =  mt_rand(100000, 999999);
		


		
		if($request['address_selection'] == "new")
		{
			$arry_address = array(
					'user_id'=>Auth::check()?auth()->user()->id:1,
					'name'=>$request['name'],
					'email'=>Auth::check()?null:$request['email'],
					'phone_number'=>$request['phone_number'],
					'pincode'=>$request['pincode'],
					'address_line_one'=>$request['address_line_one'],
					'address_line_two'=>$request['address_line_two'],
					'address_line_three'=>$request['address_line_three'],
					'city'=>$request['city'],
					'isGuest'=>Auth::check()?0:1,
					'state'=>$request['state'],
					'address_type'=>3,
					'is_permanent'=>0);
				   
					$newaddress = Useraddresses::create($arry_address);
			}
		 
	
	  if(Auth::id() > 0)
	  {
        
        $productDetail =  DB::table('cart')
                            ->join('products', 'products.id', '=', 'cart.product_id')
                            // ->join('product_size', 'product_size.size_id', '=', 'cart.size')
                            ->join('sizes', 'cart.size', '=', 'sizes.id')
                            ->join('colors', 'colors.id', '=', 'products.color_id')
                            ->select('products.id as product_id','products.name','products.image','cart.id AS cart_id','cart.size as size_id','cart.qty','sizes.name as size_name','products.price','products.mrp','hex_code','discount','gst')
                            ->where('cart.user_id',$user_id)->get();
        
    } else
		{
            if(!empty(Session::get('shoppingCart'))){
                $allData = Session::get('shoppingCart');
                $allData = array_filter($allData);

                foreach($allData as $productKey => $productVal){
                      $productData =  DB::table('products')
                            ->join('product_size', 'product_size.product_id', '=', 'products.id')
                            ->join('sizes', 'sizes.id', '=', 'product_size.size_id')
                            ->join('colors', 'colors.id', '=', 'products.color_id')
                            ->select('products.id as product_id','product_size.product_id','product_size.size_id as size_id','products.name','products.image','sizes.name as size_name','products.price','products.mrp','hex_code','discount','gst')
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
		if(!empty($productDetail))
		{
         
			foreach ($productDetail as $key => $value) {
                $product_size_data = ProductSize::where('product_id',$value->product_id)
                                        ->where('size_id',$value->size_id)
                                        ->first();


                $productDetail[$key]->max_qty = $product_size_data->qty;

            }
		}
     
		if(count($productDetail) != 0)
		{
			$order = Order::create([
			   'user_id'=>Auth::check()?auth()->user()->id:1,
			   'address_id' =>$newaddress == null?$request['address']:$newaddress->id,
			   'ordernumber'=>$ordernumber,
			   'isGuest'=>Auth::check()?0:1,
			   'payment_status'=>1,
			   'totalamount'=>$request['totalamount']
			]);
			
		
			if($order != null)
			{
				
				PaymentHistory::create([
				   'user_id'=>Auth::check()?auth()->user()->id:1,
				   'payment_id' =>$request['paymentid'],
				   'order_id'=>$order->id,
				   'isGuest'=>Auth::check()?0:1,
				   'status'=>$request['paymentid'] != null ?1:0,
				   'totalamount'=>$request['totalamount']
				]);
			
				foreach($productDetail as $value)
				{
			        OrderDetail::create([
						'order_id'=>$order->id,	
						'product_id'=>$value->product_id,	
						'qty'=>$value->qty,	
						'size_name'=>$value->size_name,	
						'price'=>$value->price,	
						'mrp'=>$value->mrp,	
						'hex_code'=>$value->hex_code,	
						'discount'=>$value->discount,	
				]);
			  }
           //sms send to mobile
             $orderNumberGet = Order::where('id',$order->id)->first();

             $order_detail_product_id = OrderDetail::where('order_id',$orderNumberGet->id)->pluck('product_id');
                  $user_data = User::where('id',$user_id)->first();
                  $apiKey = urlencode('8IQV4ZXumYQ-tOLYwsFk9H3PUHJW1BEaLI6tFMIjqM');
                 // Message details
                    $numbers = array($user_data['phone_number']);  /*array(919574250320, 916355664902);*/
                    $sender = urlencode('TXTLCL');
                    $productData = Product::whereIn('id',$order_detail_product_id)->first();
                    $messageText = 'You ' .$ordernumber. ' for ' .$productData->name. ' with pobox is confirmed' ;  
                    
                    $message = rawurlencode($messageText);

                    $numbers = implode(',', $numbers);
                    // Prepare data for POST request
                    $data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender, "message" => $message);
                  // Send the POST request with cURL
                  $ch = curl_init('https://api.textlocal.in/send/');
                  curl_setopt($ch, CURLOPT_POST, true);
                  curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                  $response = curl_exec($ch);
                  //dd($response);
                  curl_close($ch);
                  
                  // Process your response here
                  //echo $response;

            //sms send code end


			  return redirect()->route('orderSummary',$order->id);
			}
		}
		else
		{
			  return redirect()->back()->with('status','Order Not Place..!');
		}		
		
	}
	

	
	public function orderSummary($id)
	{

         if(Auth::Check())
			 {
				  Cart::where('user_id',$user_id)->delete();
			 }
			
			session()->forget('shoppingCart');
			session()->flush();
	
	  $ordersummry = Order::find($id);
	
	  $productDetail = OrderDetail::where('order_id',$ordersummry->id)->get();

	return view('order.order_summary',compact('productDetail','ordersummry'));
	}

}
