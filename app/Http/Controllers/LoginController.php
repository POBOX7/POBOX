<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Cart;
use Input;
use Session;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */
    public function userLogin(Request $request)
    {
       $email = $request->email;
       $user = User::where('email',$email)->where('role_id','!=','1')->first(); 
       if($user != null){
       if ($user->role_id = 2) {
           $email = $request->email;
           $password = $request->password;
            if (Auth::attempt(array('email' => $email, 'password' => $password))){
                $user = User::where('email',$email)->first();
                Session::put('user',$user);
                $this->addGuestUserCartDataToDB();
                if(!empty(Session::get('shoppingCart'))){
                    Session::forget('shoppingCart');
                    return redirect()->route('cartPage');
                } else {
                    return redirect()->route('home_1');
                }
               return "success";
             // return "success";

            }
            else {    
          
              Session::put('status', 'Email address or password is incorrect.');
                 return redirect()->route('home_1')->with('status','Email address or password is incorrect.');
                 //return "Wrong Credentials";
            }
        }else{
          
          return redirect()->route('home_1')->with('status','Email address or password is incorrect.');
       }
     }else{
     
      return redirect()->route('home_1')->with('status', 'Email address is not registered.');
      
     }
    }
    public function logout(Request $request) {
        Auth::logout();
        Session::flush();
        return redirect('/home');
    }
    
    /**
     * This function is used to copy Guest User Cart Session into DB after Login (if any)
     * 
     * @param Request $request
     */
    public function addGuestUserCartDataToDB() {

        if(!empty(Session::get('shoppingCart'))){
                $allData = Session::get('shoppingCart');
                $allData = array_filter($allData);

                if (isset($productVal['user_price'])) {
                 $productVal['user_price'] ;
                }
                if (!isset($productVal['user_price'])) {
                 $productVal['user_price']  = 0;
                }
                if (isset($productVal['user_mrp'])) {
                 $productVal['user_mrp'] ;
                }
                if (!isset($productVal['user_mrp'])) {
                 $productVal['user_mrp']  = 0;
                }

               // dd($allData);
                $cart_records = [];
                foreach($allData as $productKey => $productVal){
                    
                    $cart_records[] = array(
                      'product_id' => $productVal['user_product_id'],
                      'user_id'  => Auth::id(),
                      'size' => $productVal['user_size'],
                      'qty'  => $productVal['user_qty'],
                      'cart_total_price'  => $productVal['user_price'],
                      'cart_total_mrp_price'  => $productVal['user_mrp'],
                    );
                }
                
                Cart::insert($cart_records);
        }
    }
    
    
}
