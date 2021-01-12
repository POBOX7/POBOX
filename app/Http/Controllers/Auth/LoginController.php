<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Session;
use Redirect;
use Auth;
use App\User;
use Illuminate\Http\Request;

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

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = 'admin/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function login(Request $request)
    {
        //dd($request);
        $email = $request->email;
        $password = $request->password;
        $user = User::where('email',$email)->where('role_id','=','1')->where('role_id','!=','0')->where('role_id','!=','2')->first(); 
       

        if(is_null($user)){ 
           return redirect()->route('login')->with('error', 'Email address is not registered.');
        }

        if ($user['role_id'] == 1) {
            if (Auth::attempt(array('email' => $email, 'password' => $password, 'role_id' => 1))){
                $user = User::where('email',$email)->first();
                return redirect()->route('home');
            }
            return redirect()->route('login')->with('error','Email address or password is incorrect.');
        }           
    }
    public function logout () 
    {
        Session::flush();
        //return Redirect::route('login');
        return redirect()->route('login');
    }
}
