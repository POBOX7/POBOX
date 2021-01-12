<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use Mail; 
use Auth;
use App\Subscribe;
use App\Banners;
use App\Useraddresses;
use App\Cart;
use Session;
use Hash;
use App\Country;
use App\State;

class RegisterController extends Controller
{
    public function checkemail(Request $req)
    {
        $email = $req->email;
        if (!is_null($req->email)) {
          $emailcheck = User::where('email',$email)->where('role_id','2')->count();

          if($emailcheck > 0)
          {
          echo "Email Already In Use.";
          }
        }
        
    }
    public function registerStore(Request $request)
    {
       if (is_null($request['g-recaptcha-response'])) {
       return redirect()->route('contactUs')->with('status','You can not leave Captcha Code empty');
    }

       $checkEmail = User::where('email',$request['email'])->first();
       
        /* $request->validate([
         
        'email' => 'required|email|unique:users'
      
        ]);*/

        $addRegisterData = new User;   
        $addRegisterData->name = $request['full_name'];
        $addRegisterData->email = $request['email'];
        $addRegisterData->role_id = 2;
        $addRegisterData->phone_number = $request['phone_number'];
        //$addRegisterData->address = $request['address'];
        $addRegisterData->password = bcrypt($request['confirm_password']);
        $addRegisterData->save(); 

        $password = $request['confirm_password'];
      


         //mail
        Mail::send(['html'=>'email.register_mail'],['addRegisterData'=>$addRegisterData ,'password'=> $password],function($message) use ($addRegisterData){
                    $message->to($addRegisterData['email'])->subject('Thank you for register PO Box !');
                    $message->from('info@poboxfashion.com','Pobox');
                });
        
        if(!empty(Session::get('shoppingCart'))){
            $user = User::where('email',$request['email'])->first();
            auth()->login($user, true);
            Session::put('user',$user);
            $this->addGuestUserCartDataToDB();
                
            Session::forget('shoppingCart');
            return redirect()->route('cartPage')->with('status','Thank you for sign up');
        } else {
			  $user = User::where('email',$request['email'])->first();
            
			if (auth()->login($user, true)){
				 Session::put('user',$user);
                return redirect()->route('home_1')->with('status','Thank you for sign up');

            }else{
				 //return redirect()->route('home_1')->with('status','Try Again Please Login..');
         return redirect()->route('home_1')->with('status','Thank you for sign up');
			}
        }
        
      
    }
    //My account
    public function myAccountPage(Request $request)
    {
       return view('my_account');
    }
    public function addressBook(Request $request)
    {
       $user_id = Auth::id(); 
       $bannerSlider = Banners::where('page_id',7)->first(); 
       $addresses = Useraddresses::where('user_id',$user_id)->get();
       $country = Country::all(); 
       return view('my_account.address_book',compact('bannerSlider','addresses','country'));
    } 
    public function getCountryStateAddress(Request $request) 
    {

        $state = State::where('country_id',$request->countryVal)->orderBy('name')->get()->toArray();
        $response = '<root>';

        foreach ($state as $key => $value) {
            $response .= '<object><id>'.$value['name'].'</id><name>'.$value['name'].'</name></object>';
        }

        $response .= "</root>";

        echo $response;

        exit();

    }


    public function StoreAddress(Request $request)
    {
      
      $contry = Country::where('id',$request['country'])->first();
   

         $request->validate([  
        'first_name' => 'required',
        'last_name' => 'required',
        //'company_name' => 'required',
        'phone_number' => 'required',
        'pin_code' => 'required',
        'address_line_one' => 'required',
        //'address_line_two' => 'required',
        'city' => 'required',
        'country' => 'required',
        //'address_line_three' => 'required' 
        ]);
        // dd($request->selectedAddressType);
        if($request->selectedAddressType == "HOME"){
            $address_type = 1;
        }elseif ($request->selectedAddressType == "WORK"){
            $address_type = 2;
        }else{
            $address_type = 3;
        }
        $user_id = Auth::id();
        $address = new Useraddresses;   
        $address->name = $request->first_name;
        $address->last_name = $request->last_name;
        $address->company_name = $request->company_name;
        $address->user_id = $user_id;
        $address->phone_number = $request->phone_number;
        $address->pincode = $request->pin_code;
        $address->address_line_one = $request->address_line_one;
        $address->address_line_two = $request->address_line_two;
        $address->address_line_three = $request->address_line_three;
        $address->city = $request->city;
        $address->country = $contry['country_name'];
        $address->state = $request->state;
        $address->address_type = $address_type;
        $address->is_permanent = 0;
        $address->save(); 

       return redirect()->route('addressBook')->with('status','Address added successfully!');
      
    }


    public function UpdateAddress(Request $request,$address_id)
    {
         $request->validate([  
        'first_name' => 'required',
        'last_name' => 'required',
       // 'company_name' => 'required',
        'phone_number' => 'required',
        'pin_code' => 'required',
        'address_line_one' => 'required',
        //'address_line_two' => 'required',
        'city' => 'required',
        'country' => 'required',
        //'address_line_three' => 'required' 
        ]);
        //dd($request->selectedAddressType);
        if($request->selectedAddressType == "HOME"){
            $address_type = 1;
        }elseif ($request->selectedAddressType == "WORK"){
            $address_type = 2;
        }else{
            $address_type = 3;
        }  
        $user_id = Auth::id();
        //dd($request->full_name,$request->phone_number,$request->pin_code,$request->address_line_one,$request->address_line_two,$request->address_line_three,$request->city,$request->state,$address_type );
        $address = Useraddresses::where('user_id',$user_id)->where('id',$address_id)->update([ 
                  'name' => $request->first_name,
                  'last_name' => $request->last_name,
                  'company_name' => $request->company_name,  
                  'user_id' => $user_id,  
                  'phone_number' => $request->phone_number,
                  'pincode' => $request->pin_code,
                  'address_line_one' => $request->address_line_one,
                  'address_line_two' => $request->address_line_two,  
                  'address_line_three' => $request->address_line_three,
                  'city' => $request->city,
                  'state' => $request->state,
                  'country' => $request->country, 
                  'address_type' => $address_type,
                  'is_permanent' => 0, 
              ]);

       return redirect()->route('addressBook')->with('status','Address Updated successfully!');
      
    }
    
    public function DeleteAddress($address_id)
    {
       $user_id = Auth::id(); 
       $address = Useraddresses::where('id',$address_id)->delete();  
        return redirect()->route('addressBook')->with('status','Address deleted successfully!');
    }

     public function SetDefaultAddress ($address_id)
    {
       $user_id = Auth::id();  
       $address = Useraddresses::where('user_id',$user_id)->where('id',$address_id)->update([ 
                  'is_permanent' => 1, 
              ]); 
        $address = Useraddresses::where('user_id',$user_id)->where('id','!=',$address_id)->update([ 
                  'is_permanent' => 0, 
              ]);         
        return redirect()->route('addressBook')->with('status','Address Selected successfully!');
    }

    public function updateProfile(Request $request)
    {   
       $user_id = null; 
       $user_id = Auth::id(); 
       $bannerSlider = Banners::where('page_id',7)->first();
       $user_informations = User::select('name','email','phone_number')->where('id',$user_id)->first(); 
       return view('my_account.update_profile',compact('user_informations','bannerSlider'));
    }

    public function updateUserProfile(Request $request)
    {
        $user_id = Auth::id();
        $validatedData = $request->validate([ 
            'full_name' => 'required',
            'phone_number' => 'required',  
        ]); 
             $student = User::where('id',$user_id)->update([ 
                  'name' => $request->full_name,  
                  'phone_number' => $request->phone_number,  
              ]);
          
      return redirect()->route('updateProfile')->with('status','Your details has been updated successfully!');
    }

    

     public function customerSubcribeStore(Request $request)
     { 
           $addSubscribeData = new Subscribe; 
           $addSubscribeData->email = $request['email'];
           $addSubscribeData->save(); 
             
                Mail::send(['html'=>'email.subcribe_mail'],['addSubscribeData'=>$addSubscribeData],function($message) use ($addSubscribeData){
                    $message->to($addSubscribeData['email'])->subject('Subscribe Email');
                    $message->from('info@poboxfashion.com','Pobox');
                });
           
       
       return redirect()->route('home_1')->with('status','Thank you for subscribe. Please check your email');
     }
     public function forgetPasswordEmail(Request $request){
       if (is_null($request['g-recaptcha-response'])) {
             return redirect()->route('contactUs')->with('status','You can not leave Captcha Code empty');
          }
             $check_user = User::where('email',$request['email'])->first();
             if(isset($check_user)){
                Mail::send(['html'=>'email.forgotpassword_mail'],['check_user'=>$check_user],function($message) use ($check_user){
                    $message->to($check_user['email'])->subject('ChangePassword');
                    $message->from('info@poboxfashion.com','pobox');
                });
            }
           return redirect()->back()->with('status','Mail has been sent successfully to your registered mail id');

     }
     public function forgotpassword($id)
    {
       //$bannerSlider = Banners::where('page_id',7)->first();
      $checkUser = User::where('id',$id)->first();
      if ($checkUser->role_id == 1 ) {
        return view('password.admin_forgot_password');
      }
      if ($checkUser->role_id == 2 ) {
        return view('password.forgot_password');
      }
		
       
    }
	  public function updatepasswordview()
		{
		
	        $bannerSlider = Banners::where('page_id',7)->first();
    		return view('my_account.user_change_password',compact('bannerSlider'));
		}
		public function cahngepassword(Request $request)
         {
     
        if ($request->new_password == $request->confrom_password)
        {
           /*if ($request['role'] == "customer") {*/
            if (isset($request->confrom_password)) {
              
              Customer::where('id',$request->id)->update(['password'=>bcrypt($request->new_password)]);
           }
           /*if ($request['role'] == "business") {*/
            if (isset($request->confrom_password)) {
               Business::where('id',$request->id)->update(['password'=>bcrypt($request->new_password)]);

           }
               
               return redirect()->route('home_1')->with('status','Password successfully change.');
        }
        else
        {
            
            return redirect()->route('home_1')->with('status','Password change Fail.');
        }
        
    }
    public function forgotpasswordapi(Request $request){
	
	
		$this->validate($request,[
		  'new_password' =>'same:confrom_password'
		]);
		
		
       if ($request->new_password == $request->confrom_password)
        {
           /*if ($request['role'] == "customer") {*/
            if (isset($request->confrom_password)) {
              
              User::where('id',$request->id)->update(['password'=>bcrypt($request->new_password)]);
           }
         
               
           return redirect()->route('home_1')->with('status','Password successfully change.');
        }
        else
        {
            
              return redirect()->route('home_1')->with('status','Password change Fail.');
        }
    }
    public function forgotpasswordapiuser(Request $request){
		
		
		if (!Hash::check($request->get('password'),Auth::user()->password)) {
            // The passwords matches
            return redirect()->back()->with("status","Your current password does not matches with the password you provided. Please try again.");
        }
		
       if ($request->new_password == $request->confrom_password)
        {
           /*if ($request['role'] == "customer") {*/
            if (isset($request->confrom_password)) {
              if (is_null($request->id)) {
                 $user_id =Auth::user()->id;
              }
              if (!is_null($request->id)) {
                 $user_id =$request->id;
              }
            
              User::where('id',$user_id)->update(['password'=>bcrypt($request->new_password)]);
           }
         
               
           return redirect()->route('home_1')->with('status','Password successfully change.');
        }
        else
        {
            
              return redirect()->route('home_1')->with('status','Password change Fail.');
        }
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
                
                $cart_records = [];
                foreach($allData as $productKey => $productVal){
                    
                    $cart_records[] = array(
                      'product_id' => $productVal['user_product_id'],
                      'user_id'  => Auth::id(),
                      'size' => $productVal['user_size'],
                      'qty'  => $productVal['user_qty'],
                    );
                }
                
                Cart::insert($cart_records);
        }
    }
}
