<?php
namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Useraddresses;
use App\Orderbillingaddresses;
use App\Cart;
use App\Order;
use App\OrderDetail;
use App\Wishlist;
use Auth;
use App\ProductSize;
use App\User;
use App\Product;
use App\PaymentHistory;
use App\Coupon;
use App\UserCoupons;
use App\Country;
use App\State;
use Mail;
use PDF;
use Session;
class NewCartController extends Controller {


  public function cartPage() 
  {

     session()->forget('coupon_discount_data');
     session()->forget('coupon_code_data');
     session()->forget('coupon_id_data');
	  
    $productDetail = [];
	
	  /*if(Auth::id() > 0){
        $user_id = Auth::id(); 
        $productDetail =  DB::table('cart')
                            ->join('products', 'products.id', '=', 'cart.product_id')
                            // ->join('product_size', 'product_size.size_id', '=', 'cart.size')
                            ->join('sizes', 'cart.size', '=', 'sizes.id')
                            ->join('colors', 'colors.id', '=', 'products.color_id')
                            ->select('products.id as product_id','products.name','products.image','cart.id AS cart_id','cart.size as size_id','cart.qty','cart.cart_total_price','cart.cart_total_mrp_price','sizes.name as size_name','products.price','products.mrp','hex_code','discount','gst','gstper')
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
                    ->select('products.id as product_id','product_size.product_id','product_size.size_id as size_id','products.name','products.image','sizes.name as size_name','products.price','products.mrp','hex_code','discount','gst','gstper')
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

        $productDetail =  DB::table('cart')
                            ->join('products', 'products.id', '=', 'cart.product_id')
                            // ->join('product_size', 'product_size.size_id', '=', 'cart.size')
                            ->join('sizes', 'cart.size', '=', 'sizes.id')
                            ->join('colors', 'colors.id', '=', 'products.color_id')
                            ->select('products.id as product_id','products.name','products.image','cart.id AS cart_id','cart.size as size_id','cart.qty','cart.cart_total_price','cart.cart_total_mrp_price','sizes.name as size_name','products.price','products.mrp','hex_code','discount','gst','gstper','hsn_no')
                            ->where('cart.user_id',$user_id)->get();
                           // dd($productDetail);
    if(!empty($productDetail)){
        // dd($productDetail);
        foreach ($productDetail as $key => $value) {
                $product_size_data = ProductSize::where('product_id',$value->product_id)
                                        ->where('size_id',$value->size_id)
                                        ->first();


                $productDetail[$key]->max_qty = $product_size_data->qty;
				
            }
		
     }
//dd($productDetail);
     
    return view('cart.cart',compact('productDetail'));
  }
  public function checkoutShipping() 
  {
    return view('cart.checkout_shipping');
  }
  
  public function checkoutDetail() 
  {
    $addresses = [];
    $productDetail = [];
    /*if(Auth::id() > 0){
        $user_id = Auth::id(); 
        $productDetail =  DB::table('cart')
                            ->join('products', 'products.id', '=', 'cart.product_id')
                            //->join('product_size', 'product_size.size_id', '=', 'cart.size')
                            ->join('sizes', 'cart.size', '=', 'sizes.id')
                            ->join('colors', 'colors.id', '=', 'products.color_id')
                            ->select('products.id as product_id','products.name','products.image','cart.id as cart_id','cart.qty','cart.cart_total_price','cart.cart_total_mrp_price','sizes.name as size_name','products.price','products.mrp','hex_code','discount','gst','gstper')
                            ->where('cart.user_id',$user_id)->get();
        
        foreach ($productDetail as $key => $value) {
          
          $sizeDetail = DB::table('sizes')
                            ->select('id')
                            ->where('name',$value->size_name)
                            ->first();
          $itemDetail = DB::table('product_size')
                            ->select('qty')
                            ->where('product_id',$value->product_id)
                            ->where('size_id',$sizeDetail->id)
                            ->first();
          if(!empty($itemDetail) && $itemDetail->qty >= $value->qty){
            $productDetail[$key]->out_of_stock = 'No';
          }else{
            $productDetail[$key]->out_of_stock = 'Yes';
          }
        }
        $addresses = Useraddresses::where('user_id',$user_id)->get();
    } else {
        if(!empty(Session::get('shoppingCart'))){
            $allData = Session::get('shoppingCart');
            $productVal = array_filter($allData);
             foreach($allData as $productKey => $productVal){
                //dd($productVal);
                      $productData =  DB::table('products')
                            ->join('product_size', 'product_size.product_id', '=', 'products.id')
                            ->join('sizes', 'sizes.id', '=', 'product_size.size_id')
                            ->join('colors', 'colors.id', '=', 'products.color_id')
                            ->select('products.id as product_id','product_size.product_id','product_size.qty as stock_qty','product_size.size_id as size_id','products.name','products.image','sizes.name as size_name','products.price','products.mrp','hex_code','discount','gst','gstper')
                            ->where('products.id',$productVal['user_product_id'])
                            ->where('product_size.size_id',$productVal['user_size'])->first();

                      if(!empty($productData)){
                          if(!empty($productData) && $productData->stock_qty >= $productVal['user_qty']){
                            $productData->out_of_stock = 'No';
                          }else{
                            $productData->out_of_stock = 'Yes';
                          }
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
        $productDetail =  DB::table('cart')
                            ->join('products', 'products.id', '=', 'cart.product_id')
                            //->join('product_size', 'product_size.size_id', '=', 'cart.size')
                            ->join('sizes', 'cart.size', '=', 'sizes.id')
                            ->join('colors', 'colors.id', '=', 'products.color_id')
                            ->select('products.id as product_id','products.name','products.image','cart.id as cart_id','cart.qty','cart.cart_total_price','cart.cart_total_mrp_price','sizes.name as size_name','products.price','products.mrp','hex_code','discount','gst','gstper')
                            ->where('cart.user_id',$user_id)->get();
        
        foreach ($productDetail as $key => $value) {
          
          $sizeDetail = DB::table('sizes')
                            ->select('id')
                            ->where('name',$value->size_name)
                            ->first();
          $itemDetail = DB::table('product_size')
                            ->select('qty')
                            ->where('product_id',$value->product_id)
                            ->where('size_id',$sizeDetail->id)
                            ->first();
          if(!empty($itemDetail) && $itemDetail->qty >= $value->qty){
            $productDetail[$key]->out_of_stock = 'No';
          }else{
            $productDetail[$key]->out_of_stock = 'Yes';
          }
        }
        $addresses = Useraddresses::where('user_id',$user_id)->get();
    
    $country = Country::all();
    return view('cart.checkout_detail',compact('productDetail','addresses','country'));
  }

  public function checkUserEmail(Request $request){
      
      $userData = User::where('email',$request->email)->first();
      if(empty($userData)){
        echo 1;
        exit();
      }else{
        echo 2;
        exit();
      }
    }
   public function getCountryState(Request $request) 
    {
      
      $country = Country::where('country_name',$request->countryVal)->first();
        $state = State::where('country_id',$country['id'])->orderBy('name')->get()->toArray();

        $response = '<root>';

        foreach ($state as $key => $value) {
            $response .= '<object><id>'.$value['name'].'</id><name>'.$value['name'].'</name></object>';
        }

        $response .= "</root>";

        echo $response;

        exit();

    }
     public function getCountryStatebilling(Request $request) 
    {
         $country = Country::where('country_name',$request->countryVal)->first();
        $state = State::where('country_id',$country['id'])->orderBy('name')->get()->toArray();

        $response = '<root>';

        foreach ($state as $key => $value) {
            $response .= '<object><id>'.$value['name'].'</id><name>'.$value['name'].'</name></object>';
        }

        $response .= "</root>";

        echo $response;

        exit();

    }
public function cartPageQtyUpdate(Request $request)
  {
    if(Auth::Check())
      {
       //dd($request);
        //Quntity minus update
        $current_qty  = $request['current_qty'];
        $product_id  = $request['product_id'];
        $total_price  = $request['total_price'];
        $total_mrp_price  = $request['total_mrp_price'];
        $size  = $request['size'];

        $user_id  = Auth::user()->id;

        $quantity_update = Cart::where('user_id',(string)$user_id)
                       ->where('product_id',$product_id)
                       ->where('size',$size)
                       ->update([
                       'qty'=>$current_qty,
                       'cart_total_price'=>$total_price,
                       'cart_total_mrp_price'=>$total_mrp_price,
                       ]);

      }
  }
  public function updatecart(Request $request)
  {
    //dd(Session::get('shoppingCart'));
     
     	if(Auth::Check())
	    {
		  foreach($request['product_id'] as $key => $id)
			  {
				  $check_list = Cart::where('user_id',$request->userid)
                     ->where('size',$request->size)
										 ->where('product_id',$id)
									   ->update([
									   'size'=>$request['size'][$key],
									   'qty'=>$request['qty'][$key],
									   ]);
															
			}	 
		}	
		else
		{
      //dd(Session::get('shoppingCart'));
		if(!empty(Session::get('shoppingCart'))){
        /*  $productData['user_product_id'] = $request->product_id;
          $productData['user_size'] = $request->size;
          $productData['user_qty'] = $request->qty;
          $productData['user_price'] = $request->price;
          $productData['user_mrp'] = $request->mrp;*/
 
             $item = Session::get('shoppingCart');
             //dd(Session::get('shoppingCart'));
              foreach(Session::get('shoppingCart')  as $productkey => $item) {

                if ($item['user_product_id'] == $request['product_id']) { 
                    $productData[$productkey]['user_product_id'] = $item['user_product_id'];
                    $productData[$productkey]['user_size'] = $request->size;
                    $productData[$productkey]['user_price'] = $request['price'];
                    $productData[$productkey]['user_mrp'] = $request['mrp'];
                    $productData[$productkey]['user_qty'] = $item['user_qty'];
                    $productData[$productkey]['cart_id'] = $item['cart_id'];
                  
                }else{
                 $productData[$productkey] = $item;
                 Session::put('shoppingCart',$productData);
                }
            }
           // dd($productData);
            Session::put('shoppingCart',$productData);
            //dd(Session::get('shoppingCart'));
         }
		  /*foreach($request['product_id'] as $key => $id)
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
		 } */
		  
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
      //size check
      if ($request->size == 0) {
            return "Please select product size";exit();
      }
      //Quantity check
      $check_quantity = ProductSize::where('product_id',$request->product_id)
                                ->where('size_id',$request->size)
                                ->first();
                                //dd($check_quantity->qty);
      if ($check_quantity->qty == 0) {
        return "Product quantity not available";exit();
      }
	  
      $check_list = Cart::where('user_id',$request->user_id)
                                ->where('product_id',$request->product_id)
                                ->where('size',$request->size)
                                // ->where('qty',$request->qty)
                                ->first();
      // print_r('<pre>');
      // print_r($check_list);
      // exit;
      //$checkWishList = Wishlist::where('user_id',$request->user_id)->where('product_id',$request->product_id)->delete();
      if(!empty($check_list)){
          $qty = $request->qty + $check_list->qty;
          $mrp = $request->mrp + $check_list->cart_total_mrp_price;
          $price = $request->price + $check_list->cart_total_price;
          $updateCoupon = Cart::where('id',$check_list->id)
                                    ->update([
                                      'qty' => $qty,
                                      'cart_total_mrp_price' => $mrp,
                                      'cart_total_price'  => $price,
                                    ]);  
          return "Product added in the cart";exit();
      }else{
       
          $add_cart = array(
                      'product_id' => $request->product_id,
                      'user_id'  => $request->user_id,
                      'size' => $request->size,
                      'qty'  => $request->qty,
                      'cart_total_mrp_price' => $request->mrp,
                      'cart_total_price'  => $request->price,
                  );

          $add_wishList = Cart::create($add_cart);

          return "Product added in the cart";exit();
      }
    }
    /*public function updateCartForGuestUser(Request $request){

         if(!empty(Session::get('shoppingCart'))){

             $item = Session::get('shoppingCart');

              foreach(Session::get('shoppingCart')  as $productkey => $item) {

                if ($item['user_product_id'] == $request['product_id']) { 
                    $productData[$productkey]['user_product_id'] = $item['user_product_id'];
                    $productData[$productkey]['user_size'] = $item['user_size'];
                    $productData[$productkey]['user_price'] = $request['price'];
                    $productData[$productkey]['user_mrp'] = $request['mrp'];
                    $productData[$productkey]['user_qty'] = $request['current_qty'];
                    $productData[$productkey]['cart_id'] = $item['cart_id'];
                  
                }else{
                 $productData[$productkey] = $item;
                 Session::put('shoppingCart',$productData);
                }
            }
            Session::put('shoppingCart',$productData);
           // dd(Session::get('shoppingCart'));
         }
    }*/

    public function updateCartForGuestUser(Request $request){
        /*print_r('<pre>');
        print_r($request->all());
        exit;*/
        $current_qty  = $request['current_qty'];
        $product_id  = $request['product_id'];
        $total_price  = $request['price'];
        $total_mrp_price  = $request['mrp'];
        $size  = $request['size'];

        $user_id  = Session::getId();
        
        $quantity_update = Cart::where('user_id',(string)$user_id)
                       ->where('product_id',$product_id)
                       ->where('size',$size)
                       ->update([
                              'qty'                 =>$current_qty,
                              'cart_total_price'    =>$total_price,
                              'cart_total_mrp_price'=>$total_mrp_price,
                          ]);
         
    }
    
    // public function addCartForGuestUser(Request $request){
    //     $productData = [];

    //     $productData['user_product_id'] = $request->product_id;
    //     $productData['user_size'] = $request->size;
    //     $productData['user_qty'] = $request->qty;
    //     $productData['user_price'] = $request->price;
    //     $productData['user_mrp'] = $request->mrp;
    //     //size check
    //     if ($request->size == 0) {
    //         return "Please select product size";exit();
    //       }
    //     // Quantity check
    //     $check_quantity = ProductSize::where('product_id',$request->product_id)
    //                             ->where('size_id',$request->size)
    //                             ->first();
    //                             //dd($check_quantity->qty);
    //       if ($check_quantity->qty == 0) {
    //         return "Product quantity not available";exit();
    //       }

        
    //     if(!empty(Session::get('shoppingCart'))){

    //         $allData = Session::get('shoppingCart');

    //         $allData = array_filter($allData);

    //         $isAdd = 0;
    //         foreach ($allData as $array) {
    //             if(isset($array['user_product_id']) && $array['user_product_id'] == $productData['user_product_id'] && isset($array['user_size']) && $array['user_size'] == $productData['user_size'] && isset($array['user_qty']) && $array['user_qty'] == $productData['user_qty']){

    //               if ($productData['user_product_id'] == $array['user_product_id']) {
    //                  return "Product is already in the cart";
    //                 }
    //                 $isAdd = 0;
    //             }else {
    //                 $isAdd = 1;
    //             }
    //         }
           
            
    //         if($isAdd == 1){
    //             $productData['cart_id'] = mt_rand(100000, 999999);
    //             Session::push('shoppingCart',$productData);
    //         } else {
    //             return "Product is already in the cart";
    //         }
            
    //     } else {
        
    //         $productData['cart_id'] = mt_rand(100000, 999999);
    //         Session::push('shoppingCart',$productData);
    //     }
        
    //     return "Product added in the cart";
    // }

    public function addCartForGuestUser(Request $request){
       
        if(!isset($request->size)){
          return "Please select size";exit();
        }
        $session_id  = Session::getId();
        Session::put('session_id',$session_id);
        $check_list = Cart::where('user_id',$session_id)
                                ->where('product_id',$request->product_id)
                                ->where('size',$request->size)
                                // ->where('qty',$request->qty)
                                ->first();
      if(!empty($check_list)){
          $qty = $request->qty + $check_list->qty;
          $mrp = $request->mrp + $check_list->cart_total_mrp_price;
          $price = $request->price + $check_list->cart_total_price;
          $updateCoupon = Cart::where('id',$check_list->id)
                                    ->update([
                                      'qty' => $qty,
                                      'cart_total_mrp_price' => $mrp,
                                      'cart_total_price'  => $price,
                                    ]);  
          return "Product added in the cart";exit();
      }else{
       
          $add_cart = array(
                      'product_id' => $request->product_id,
                      'user_id'  => $session_id,
                      'size' => $request->size,
                      'qty'  => $request->qty,
                      'cart_total_mrp_price' => $request->mrp,
                      'cart_total_price'  => $request->price,
                  );

          $add_wishList = Cart::create($add_cart);

          return "Product added in the cart";exit();
      }
    }



    public function removeProduct($id){
	
    	/*if(Auth::check()){
    	  $user_id    = Auth::id();
        $cart_data  = Cart::where('id',$id)->delete();
    	}else{	
    		foreach (array_filter(Session::get('shoppingCart')) as $key => $value) {
              
    			if ($value['cart_id'] == $id) {
    			  session()->forget("shoppingCart.$key");
    			}
    		}
    	}*/

      $cart_data  = Cart::where('id',$id)->delete();
 
      return redirect()->route('cartPage'); 
    }

    public function removeProductFromCheckout($id){
  
     /*if(Auth::check()){
      $user_id    = Auth::id();
        $cart_data  = Cart::where('id',$id)->delete();
      }else{
       foreach (array_filter(Session::get('shoppingCart')) as $key => $value) {
          if ($value['cart_id'] == $id) {
            session()->forget("shoppingCart.$key");
          }
        }
      }*/
      $cart_data  = Cart::where('id',$id)->delete();
      return redirect()->route('checkoutDetail'); 
    }

    public function removeCart(){
		
       if(Auth::check())
	   {
		    $user_id    = Auth::id();
        //$cart_data  = Cart::where('user_id',$user_id)->delete();
        
	   }	
		else
		{
      $user_id  = Session::getId();
			/*session()->forget('shoppingCart');
			session()->flush();*/
		}	   
     $cart_data  = Cart::where('user_id',(string)$user_id)->delete();

      return redirect()->route('cartPage'); 
    }
	
	// checkoutPlaceOrder
	
	
	public function checkoutPlaceOrder(Request $request)
	{
	    $coupon_discount_datas = Session::get('coupon_discount_data');
	    $coupon_id_datas = Session::get('coupon_id_data');
	    $coupon_code_datas = Session::get('coupon_code_data');
	    $address_id = Session::get('address_id');
	    $coupon_discount_per = Session::get('coupon_discount_per');
  
    	$newaddress = null;
		$productDetail = [];
		
	    $ordernumber =  mt_rand(100000, 999999);
		
		if(Auth::id() > 0){
        $user_id = Auth::id();
        $productDetail =  DB::table('cart')
                            ->join('products', 'products.id', '=', 'cart.product_id')
                            // ->join('product_size', 'product_size.size_id', '=', 'cart.size')
                            ->join('sizes', 'cart.size', '=', 'sizes.id')
                            ->join('colors', 'colors.id', '=', 'products.color_id')
                            ->select('products.id as product_id','products.name','products.image','cart.id AS cart_id','cart.size as size_id','cart.qty','sizes.name as size_name','products.price','products.mrp','hex_code','discount','gst','gstper','hsn_no')
                            ->where('cart.user_id',$user_id)->get();
    } else{
          $userData =  DB::table('users')
                            ->select('id')
                            ->where('email',Session::get('guest_email'))
                            ->where('status',1)
                            ->where('is_deleted',0)
                            ->first();
          	if(empty($userData)){
	            $arry_address = array(
	                          'role_id'     =>3,
	                          'name'        =>Session::get('first_name').' '.Session::get('last_name'),
	                          'phone_number'=>Session::get('phone_number'),
	                          'email'       =>Session::get('guest_email'),
	                        );
	                           
	            $userData = User::create($arry_address);
          	}

          	$session_id  = Session::getId();
          	Useraddresses::where('user_id',$session_id)
	                                ->update([
	                                  'user_id' => $userData->id,
	                                  
	                                ]); 
            /*if (!is_null($request->state)) {  
              $state = $request->state;
               
            }
            if (!is_null($request->state_textbox)) {
               $state = $request->state_textbox;
            }
            $arry_address = array(
              'user_id'     =>$userData->id,
              'name'        =>$request['first_name'],
              'last_name'   =>$request['last_name'],
              'company_name'=>$request['company_name'],
              'email'       =>$request['guest_email'],
              'phone_number'=>$request['phone_number'],
              'pincode'     =>$request['pincode'],
              'address_line_one'  =>$request['address_line_one'],
              'address_line_two'  =>$request['address_line_two'],
             // 'address_line_three'=>$request['address_line_three'],
              'city'        =>$request['city'],
              'country'     =>$request['country'],
              'isGuest'     =>1,
              'state'       =>$state,
              'address_type'=>3,
              'is_permanent'=>0);
               
            $newaddress = Useraddresses::create($arry_address);*/

            $productDetail =  DB::table('cart')
                            ->join('products', 'products.id', '=', 'cart.product_id')
                            // ->join('product_size', 'product_size.size_id', '=', 'cart.size')
                            ->join('sizes', 'cart.size', '=', 'sizes.id')
                            ->join('colors', 'colors.id', '=', 'products.color_id')
                            ->select('products.id as product_id','products.name','products.image','cart.id AS cart_id','cart.size as size_id','cart.qty','sizes.name as size_name','products.price','products.mrp','hex_code','discount','gst','gstper','hsn_no')
                            ->where('cart.user_id',$session_id)->get();
            
            $user_id = $userData->id;
		}

		if(count($productDetail) != 0){
		    $gst_amount_totals = $request->gst_amount_total;
		      //$you_save_amounts = Session::get('you_save_amount');
		    $you_save_amounts = 0;
		    $bag_totals = $request->bag_total;
		    $afterDiscountTotalPrice = $bag_totals + $gst_amount_totals;

			$order = Order::create([
								   'user_id'         =>Auth::check()?auth()->user()->id:$userData->id,
								   'address_id'      =>$address_id,
								   'ordernumber'     =>$ordernumber,
								   'isGuest'         =>Auth::check()?0:1,
								   'payment_status'  =>1,
								   'totalamount'     =>$afterDiscountTotalPrice,
							        'bag_total'      =>$bag_totals,
							        'saveAmount'     =>$you_save_amounts,
							        'gstAmount'      =>$gst_amount_totals,
							        'coupon_id'      =>$coupon_id_datas,
							        'coupon_code'    =>$coupon_code_datas,
							        'coupon_amount'  =>$coupon_discount_datas,
							        'bill_address'   =>Session::get('bill'),
								]);

       //Coupon update 
      	$coupon_code = $coupon_code_datas;
	    if($coupon_code != ''){
	        $couponDetail = Coupon::where('code',$coupon_code)->where('status',1)->where('is_deleted',0)->first();
	        if($couponDetail->usage != '' || $couponDetail->usage != 0){
	          	$updateCoupon = Coupon::where('id',$couponDetail->id)
	                                ->update([
	                                  'usage' => $couponDetail->usage - 1,
	                                  'total_used' => $couponDetail->total_used + 1,
	                                ]);    
	          	$user_id = Auth::user()->id;   
	          	$addUserCoupons = new UserCoupons;
	          	$addUserCoupons->order_id = $order->id;
	          	$addUserCoupons->user_id = $user_id;
	          	$addUserCoupons->coupon_id = $couponDetail->id;
	          	$addUserCoupons->usage = "1";
	          	$addUserCoupons->user_id = $user_id;
	          	$addUserCoupons->save();
	        }
	    }  
     // end Coupon update

      	if(Session::get('bill') == "New"){
        
        	$billing_address = array(
	            'order_id'          =>$order->id,
	            'name'              =>Session::get('billing_first_name'),
	            'last_name'         =>Session::get('billing_last_name'),
	            'company_name'      =>Session::get('billing_company_name'),
	            'phone_number'      =>Session::get('billing_phone_number'),
	            'pincode'           =>Session::get('billing_pincode'),
	            'address_line_one'  =>Session::get('billing_address_line_one'),
	            'address_line_two'  =>Session::get('billing_address_line_two'),
	            'city'              =>Session::get('billing_city'),
	            'country'           =>Session::get('billing_country'),
	            'state'             =>Session::get('billing_state')
	        );
          	$billingaddress = Orderbillingaddresses::create($billing_address);
      	}
			
		
		if($order != null){
				PaymentHistory::create([
				   'user_id'            =>Auth::check()?auth()->user()->id:$userData->id,
				   'payment_id'         =>$request['paymentid'],
				   'order_id'           =>$order->id,
				   'isGuest'            =>Auth::check()?0:1,
				   'status'             =>$request['paymentid'] != null ?1:0,
				   'totalamount'        =>$request['totalamount']
				]);
			
				foreach($productDetail as $value){

		            if($coupon_discount_per > 0){
		              $discount_price = $value->price * $coupon_discount_per / 100;
		              $product_price = $value->price - $discount_price;
		            }else{
		              $product_price = $value->price;
		              $discount_price = 0;
		            }

		            if($product_price > 1000){
		              $gst_amount = ($product_price * 12 / 100) * $value->qty;
		              $gst_per = 12;
		            }else{
		              $gst_per = 5;
		              $gst_amount = ($product_price * 5 / 100) * $value->qty;
		            }
		            
				    OrderDetail::create([
		                  						'order_id'      =>$order->id,	
		                  						'product_id'    =>$value->product_id,	
		                  						'qty'           =>$value->qty,	
		                  						'size_name'     =>$value->size_name,	
		                  						'price'         =>$product_price,
		                  						'mrp'           =>$value->mrp,	
		                  						'hex_code'      =>$value->hex_code,	
					                            'gst_amount'    =>$gst_amount,
					                            'gst_per'       =>$gst_per,
					                            'discount_price'=>$discount_price,
					                            'hsn_no'		=>$value->hsn_no,
		                  						'discount'      =>$value->discount,	
		                  				]);
		            $product_size_data = ProductSize::where('product_id',$value->product_id)
		                                        ->where('size_id',$value->size_id)
		                                        ->first();
		            $old_stock = $product_size_data->qty;

		            $updated_stock = $old_stock - $value->qty;

		            ProductSize::where('product_id',$value->product_id)
		                     ->where('size_id',$value->size_id)
		                     ->update([
		                      'qty'=>$updated_stock,
		                     ]);

		            $add_data = array(
		                            'product_id'    => $value->product_id,
		                            'size_id'       => $value->size_id,
		                            'qty'           => $value->qty,
		                            'type'          => 4,
		                            'description'   => 'Order ( Order# '.$ordernumber.')',
		                            'order_id'      => $order->id,
		                            'created_at'    => date('Y-m-d H:i:s'),
		                            'updated_at'    => date('Y-m-d H:i:s')
		                        );

		            DB::table('product_stock_history')->insert($add_data);
				}

            //sms send to mobile
            $orderNumberGet = Order::where('id',$order->id)->first();

            $order_detail_product_id = OrderDetail::where('order_id',$orderNumberGet->id)->pluck('product_id');
            $user_data = User::where('id',$user_id)->first();
            $apiKey = urlencode('8IQV4ZXumYQ-tOLYwsFk9H3PUHJW1BEaLI6tFMIjqM');
                 // Message details
            $mobileNo = "91".$user_data['phone_number'];
            $numbers = array($mobileNo);  /*array(919574250320, 916355664902);*/
            $sender = urlencode('TXTLCL');
            $productData = Product::whereIn('id',$order_detail_product_id)->first();
                    //$messageText = 'You ' .$ordernumber. ' for ' .$productData->name. ' with pobox is confirmed' ;  
            $messageText = "Hi ".$user_data['name']. " your order number " .$ordernumber. " for " .$productData['name']. " with pobox is confirmed";

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
            //sms send code end
            //mail send
            $oderData = Order::where('is_deleted','0')->where('id',$orderNumberGet->id)->get();
	        foreach ($oderData as $keyOderData => $valueOderData) {
	           $oderData[$keyOderData] = $valueOderData;
	           $user_data = User::where('id',$valueOderData->user_id)->first();
	           $oderData[$keyOderData]['user_data'] = $user_data;

	           $address_data = Useraddresses::where('id',$valueOderData->address_id)->first();
	           $oderData[$keyOderData]['address_data'] = $address_data;

	           $order_detail_product_id = OrderDetail::where('order_id',$valueOderData->id)->pluck('product_id');
	           $productData = Product::whereIn('id',$order_detail_product_id)->get();
	           foreach ($productData as $keyProductData => $valueProductData) {
	            $proData[$keyProductData]= $valueProductData;
	            
	              $OrderDetailData[$keyProductData]= OrderDetail::where('order_id',$valueOderData->id)->where('product_id',$valueProductData->id)->first();
	             foreach ($OrderDetailData as $key => $value) {
	               $proData[$key]['order_detail_data']= $value;
	              
	              }
	           }

	          $oderData[$keyOderData]['product_data']= $proData;
	        }
        
        	$productDetail = OrderDetail::where('order_id',$orderNumberGet->id)->get();
        	//Customer send mail
        	$pdf = PDF::loadView('email.order_confirm_mail', ['oderData' => $oderData , 'productDetail' => $productDetail]);

	       Mail::send(['html'=>'email.order_confirm_mail'],['oderData' => $oderData , 'productDetail' => $productDetail] ,function($message) use ($user_data,$pdf){
	                      $message->to($user_data['email'])->subject('Your order has been confirmed-po box')
	                      ->attachData($pdf->output(), "invoice.pdf");
	                      $message->from('info@poboxfashion.com','pobox');

	                  });

	        //Admin send mail
	        $adminData = User::where('role_id','1')->where('status',1)->where('is_deleted',0)->get();
	        $pdf = PDF::loadView('email.admin_new_order_received_mail', ['oderData' => $oderData , 'productDetail' => $productDetail]);

	        Mail::send(['html'=>'email.admin_new_order_received_mail'],['oderData' => $oderData , 'productDetail' => $productDetail] ,function($message) use ($pdf){
	              $message->to('info@poboxfashion.com')->subject('New order received')
	              ->attachData($pdf->output(), "invoice.pdf");
	              $message->from('info@poboxfashion.com','pobox');

	          });
      		return response()->json(array('success' => true, 'order_id'=>$order->id));
			  //return redirect()->route('orderSummary',$order->id);
			}
		}else{
			  return redirect()->back()->with('status','Order Not Place..!');
		}		
	}
	

	
	public function orderSummary($id){
    if(Auth::Check()){
		  Cart::where('user_id',(string)auth()->user()->id)->delete();
	  }else{
      $user_id  = Session::getId();
      Cart::where('user_id',(string)$user_id)->delete();
      session()->forget('shoppingCart');
      session()->flush();
    }
	$ordersummry = Order::find($id);
	$productDetail = OrderDetail::where('order_id',$ordersummry->id)->get();
    
    /*print_r('<pre>');
    print_r($ordersummry->getAddress->name);
    exit;*/
	  return view('order.order_summary',compact('productDetail','ordersummry'));
	}


  public function orderConfirm( ){
    
    if (!Auth::user()){
          $user_id  = Session::getId();
      }else{
          $user_id = Auth::id(); 
      }
      $productDetail =  DB::table('cart')
                            ->join('products', 'products.id', '=', 'cart.product_id')
                            //->join('product_size', 'product_size.size_id', '=', 'cart.size')
                            ->join('sizes', 'cart.size', '=', 'sizes.id')
                            ->join('colors', 'colors.id', '=', 'products.color_id')
                            ->select('products.id as product_id','products.name','products.image','cart.id as cart_id','cart.qty','cart.cart_total_price','cart.cart_total_mrp_price','sizes.name as size_name','products.price','products.mrp','hex_code','discount','gst','gstper','hsn_no')
                            ->where('cart.user_id',$user_id)->get();
    
    $address_id = Session::get('address_id');
    $coupon_discount_per = Session::get('coupon_discount_per');
    $addresses = Useraddresses::where('id',$address_id)->first();

    return view('order.order_confirm',compact('productDetail','addresses','coupon_discount_per'));
  }

  public function checkCoupon(Request $request){
    //User one time use coupon
     $now = Carbon::now();
    $coupon_id = Coupon::where('code', $request->coupon)->where('status',1)->where('is_deleted',0)->whereDate('valid_form', '<=', $now)
    ->whereDate('valid_to', '>=', $now)
    ->first();

    $userCouponsUseOneTime = UserCoupons::where('coupon_id',$coupon_id['id'])->where('user_id',auth()->user()['id'])->where('usage',1)->first();
//dd($userCouponsUseOneTime);
    if (is_null($userCouponsUseOneTime)) {

        $userCouponsUseOneTime  =  0;
    }
    if ($userCouponsUseOneTime != null) {
      
        $userCouponsUseOneTime  =  1;
    }
    

 //Check usage
  $userUsageCoupon = Coupon::where('code', $request->coupon)->where('status',1)->where('is_deleted',0)->whereDate('valid_form', '<=', $now)
    ->whereDate('valid_to', '>=', $now)
    ->first();
   
     if ($userUsageCoupon['usage'] == 0) {
         $userUsageOrNotCoupon   = 0;
  }else{
     $userUsageOrNotCoupon   = 1;
  }

//Expired date
  if ($userUsageOrNotCoupon == 0) {
       $dateCheck = null;
  }
  if ($userUsageOrNotCoupon !== 0) {
       $dateCheck = Coupon::where('code', $request->coupon)->where('status',1)->where('is_deleted',0)->whereDate('valid_form', '<=', $now)
      ->whereDate('valid_to', '>=', $now)
      ->first();
  }

   
  // dd($dateCheck);
    
    if (is_null($dateCheck)) {
      $expired_coupon = 0;
    }else{
      $expired_coupon = 1;

    }

    //Invalid coupon code
    $couponInvalid= Coupon::where('code', $request->coupon)
    ->where('status',1)
    ->where('is_deleted',0)
    ->first();
    if (is_null($couponInvalid)) {
      $couponInvalid = 0;
    }else{
      $couponInvalid = 1;
    }
    
   

    $couponData = Coupon::where('code', $request->coupon)->where('status',1)->where('is_deleted',0)->whereDate('valid_form', '<=', $now)
    ->whereDate('valid_to', '>=', $now)
    ->first();

    $coupon_discount_db =$couponData['total'];
    $coupon_code  = $couponData['code'];
    $coupon_id = $couponData['id'];
    $total_price = $request['total_price'];
    $main_price = $request['main_price'];
    $tax_percentage = 5;
    $original_price_with_tax =  round($total_price * $tax_percentage / 100);
    $discount =  round($main_price * $coupon_discount_db / 100);

   // dd($userCouponsUseOneTime);
      if ($userCouponsUseOneTime == 0) {
        if ($expired_coupon == 1) {
            if($discount !== 0){
              Session::put('coupon_discount_data',$discount);
              Session::put('coupon_id_data',$coupon_id);
              Session::put('coupon_code_data',$coupon_code);
              Session::put('coupon_discount_per',$coupon_discount_db);
            }
        }
      }

    $afterdiscount =round($total_price - $discount);

    $message = "Coupon Successfully applied";
    $type = "success";

    $data = array(
      'message' => $message,
      'type' => $type,
      'discount' => $discount,
      'afterdiscount' => $afterdiscount,
      'coupon_code' => $coupon_code,
      'coupon_id' => $coupon_id,
      'expired_coupon' =>$expired_coupon,
      'couponInvalid' =>$couponInvalid,
      'userCouponsUseOneTime' =>$userCouponsUseOneTime
    );        

   // Session::put('coupon_data', $data);
    
   
    //$data = array('message' => $message,'type' => $type,'discount' => $discount,'afterdiscount' => $afterdiscount,'coupon_code' => $coupon_code,'coupon_id' => $coupon_id);

    return $data;  
  }
  public function removeCoupon(Request $request)
    {


      session()->forget('coupon_discount_data');
      session()->forget('coupon_code_data');
      session()->forget('coupon_id_data');
      session()->forget('coupon_discount_per');
     
      $original_tax_price = $request['original_tax_price'];
      $original_sub_total_price = $request['original_sub_total_price'];
      $total_price = $request->total_price;
      $message = "Coupon removed successfully";
      $type = "success";

      $data = array(
        'message' => $message,
        'type' => $type,
        'total_price' => $total_price,
        'original_sub_total_price' => $original_sub_total_price,
        'original_tax_price' => $original_tax_price
      );
      
      return $data;
    }

  public function checkoutOrder(Request $request)
  {
    if($request['couponCode']==''){
      session()->forget('coupon_discount_per');
    }
  	if(Auth::check()){
      	if($request['address_selection'] == "new"){
          
          	if (!is_null($request->state)) {  
            	$state = $request->state;
          	}
          	if (!is_null($request->state_textbox)) {
             	$state = $request->state_textbox;
          	}

          	$arry_address = array(
                          'user_id'           =>auth()->user()->id,
                          'name'              =>$request['first_name'],
                          'last_name'         =>$request['last_name'],
                          'company_name'      =>$request['company_name'],
                          'email'             =>null,
                          'phone_number'      =>$request['phone_number'],
                          'pincode'           =>$request['pincode'],
                          'address_line_one'  =>$request['address_line_one'],
                          'address_line_two'  =>$request['address_line_two'],
                          'address_line_three'=>$request['address_line_three'],
                          'city'              =>$request['city'],
                          'country'           =>$request['country'],
                          'isGuest'           =>0,
                          'state'             =>$state,
                          'address_type'      =>3,
                          'is_permanent'      =>0
            );
            
            $newaddress = Useraddresses::create($arry_address);
            $arry_address['state'] = $request->state;
            Session::put('new_address',$arry_address);
            Session::put('new_address_flag',"True");
            Session::put('address_id',$newaddress->id);
        }else{
          Session::put('address_id',$request->address);
        }

        if($request['answer'] !='no'){
        	Session::put('bill','New');
        	Session::put('billing_first_name',$request->billing_first_name);
        	Session::put('billing_last_name',$request->billing_last_name);
        	Session::put('billing_company_name',$request->billing_company_name);
        	Session::put('billing_pincode',$request->billing_pincode);
        	Session::put('billing_address_line_one',$request->billing_address_line_one);
        	Session::put('billing_address_line_two',$request->billing_address_line_two);
        	Session::put('billing_city',$request->billing_city);
        	Session::put('billing_country',$request->billing_country);
        	Session::put('billing_state',$request->billing_state);
        	Session::put('billing_phone_number',$request->billing_phone_number);
        }else{
        	Session::put('bill','Same');
        }
    }else{

    	$arry_address = array(
                          'user_id'           =>Session::getId(),
                          'name'              =>$request['first_name'],
                          'last_name'         =>$request['last_name'],
                          'company_name'      =>$request['company_name'],
                          'email'             =>$request['email'],
                          'phone_number'      =>$request['phone_number'],
                          'pincode'           =>$request['pincode'],
                          'address_line_one'  =>$request['address_line_one'],
                          'address_line_two'  =>$request['address_line_two'],
                          'address_line_three'=>$request['address_line_three'],
                          'city'              =>$request['city'],
                          'country'           =>$request['country'],
                          'isGuest'           =>1,
                          'state'             =>$request['state'],
                          'address_type'      =>3,
                          'is_permanent'      =>0
            );
            
            $newaddress = Useraddresses::create($arry_address);

            Session::put('address_id',$newaddress->id);

            Session::put('guest_email',$request->email);
            Session::put('first_name',$request->first_name);
            Session::put('last_name',$request->last_name);
            Session::put('phone_number',$request->phone_number);
    	
    	if($request['answer'] !='no'){
        	Session::put('bill','New');
        	Session::put('billing_first_name',$request->billing_first_name);
        	Session::put('billing_last_name',$request->billing_last_name);
        	Session::put('billing_company_name',$request->billing_company_name);
        	Session::put('billing_pincode',$request->billing_pincode);
        	Session::put('billing_address_line_one',$request->billing_address_line_one);
        	Session::put('billing_address_line_two',$request->billing_address_line_two);
        	Session::put('billing_city',$request->billing_city);
        	Session::put('billing_country',$request->billing_country);
        	Session::put('billing_state',$request->billing_state);
        	Session::put('billing_phone_number',$request->billing_phone_number);
        }else{
        	Session::put('bill','Same');
        }
    }
    
    return redirect()->route('orderConfirm'); 
    
  }

}
