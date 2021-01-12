<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\PaymentMode;
use Mail;
use Illuminate\Support\Facades\Auth;
// use App\Terms;
// use App\Form;

class AdminController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
   /**/
   public function paymentStatus(Request $request)
   {
    $PaymentMode = PaymentMode::first();
    
       
      return view('admin.payment_mode.payment_index',compact('PaymentMode'));
   }
    public function paymentStatusChange()
    {
        extract($_POST);
        
        if($status == 'true' ){
            $status = 1;
        }else{
            $status = 0;
        }
        $update_data = array(
                                'status' => $status,
                                'updated_at'    => date('Y-m-d H:i:s')
                            );

        $update = DB::table('payment_mode')->where('id',$id)
        ->update($update_data);

        echo '1';
    }
    public function index(){
        $admins = DB::table('users')->select('id','name','email','status','created_at')->where('role_id',1)->where('id','!=',1)->orderByDesc('id')->get();
        return view('admin.admin.admin_index')->with('admins', $admins); 
    }

    public function addAdmin( Request $request ) {
        return view('admin.admin.admin_add');
    }

    /**
     * Store Category Method
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function storeAdmin( Request $request ) {
        /*print_r('<pre>');
        print_r($request->all());
        exit;*/
        $validatedData = $request->validate([
            'name'=> 'required', 
            //'email' => 'required|unique:users,email,2,role_id', 
            'password' => 'required|confirmed|min:6'       
        ]); 
        //$check_user = User::where('email','=',$request->email)->where('role_id','=',1)->first();
        
        $user = User::where('email','=',$request->email)->where('is_deleted','=',0)->where('role_id','=',1)->first();
        if($user){
             return redirect()->route('admin')->with('error', 'Email id already exist');
        }
        
        if(empty($user)){
            $admin = new User(); 
            $admin->name = $request->name;
            $admin->role_id = 1;
            $admin->email = $request->email;
            $admin->password = Hash::make($request->password);
            $admin->created_at = date('Y-m-d H:i:s');
            $admin->updated_at = date('Y-m-d H:i:s');
            if($admin->save()) {
                return redirect()->route('admin')->with('success', 'Admin created successfully.');
            } else{
                return redirect()->route('admin')->with('error', 'Error occured while saving Admin.');
            }
        }else{
            return redirect()->route('admin')->with('error', 'Email id already exist');
        }
        
    }

    public function editAdmin(Request $request ,$id){
        $id = base64_decode($id);
        $adminDetail = DB::table('users')->select('id','name','email')->where('id',$id)->get()->first();
        return view('admin.admin.admin_edit',compact('adminDetail','id'));
    }

    public function updateAdmin(Request $request ,$id){
        $request->validate([
                //'email' => 'required|unique:users,email,'.$id,
                'email' => 'required|unique:users,email,'.$id.',',
                'name'  => 'required',
                'password'=>'confirmed'
        ]);

        $update_data = array(
                                'name' => $request->name,
                                'email' => $request->email,
                                'updated_at'    => date('Y-m-d H:i:s')
                            );
        if($request->password!=''){
            $update_data['password'] = Hash::make($request->password);
        }

        $update = DB::table('users')->where('id',$id)
        ->update($update_data);
        return redirect()->route('admin')->with('success', 'Admin details updated successfully.');
    }

    public function adminDestroy($id)
    {
        DB::table('users')->where('id',$id)->delete();
        return redirect()->route('admin')->with('success', 'Admin removed successfully.'); 
    }

    public function adminStatus()
    {
        extract($_POST);
        
        if($status == 'true' ){
            $status = 1;
        }else{
            $status = 0;
        }
        $update_data = array(
                                'status' => $status,
                                'updated_at'    => date('Y-m-d H:i:s')
                            );

        $update = DB::table('users')->where('id',$id)
        ->update($update_data);

        echo '1';
    }

    public function forgotpassword()
    {
        return view('admin.password.forgot_password');
    }

    public function forgetPasswordEmail(Request $request){
        
        $check_user = User::where('email',$request['email'])->first();
        if(isset($check_user)){
            Mail::send(['html'=>'email.forgotpassword_mail'],['check_user'=>$check_user],function($message) use ($check_user){
                $message->to($check_user['email'])->subject('ChangePassword');
                $message->from('rakeshsathwara.rc@gmail.com','pobox');
            });
            return redirect()->route('login')->with('success','Mail has been sent successfully to your registered email');
        }else{
            return redirect()->route('login')->with('error','Email Not found, Please try again');
        }
        
    }

    public function changePassword()
    {
        return view('admin.admin.changepassword');
    }

    public function updatePassword(Request $request ,$id){
        $request->validate([
                'password' => 'required|confirmed|min:6'
        ]);
        $old_password  = Auth::user()->password;
        if (Hash::check($request->current_password, $old_password)) { 
            $update_data = array(
                                'password' => Hash::make($request->password),
                                'updated_at'    => date('Y-m-d H:i:s')
                            );
       
            $update = DB::table('users')->where('id',$id)->update($update_data);
            return redirect()->route('admin.changepassword')->with('success', 'Password changed successfully.');

        } else {
            $request->session()->flash('error', 'Current Password does not match');
            return redirect()->route('admin.changepassword');
        }
    }
    
}
