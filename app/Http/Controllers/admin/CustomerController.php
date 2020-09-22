<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

use App\Helpers\Exporter;



class CustomerController extends Controller 
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $customers = DB::table('users')->select('id','name','email','phone_number','status')->where('role_id','2')->where('is_deleted',0)->orderByDesc('id')->get();
        return view('admin.customer.customer_index')->with('customers', $customers); 
    }

    public function customerStatus()
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

    public function export( Request $request ) 
    {
        // print_r('<pre>');
        // print_r($request->all());
        // exit;
        $columns = array(
                        '0'=>'Sr No',
                        '1'=>'Name',
                        '2'=>'Email',
                        '3'=>'Phone number',
                        '4'=>'Status',
                    );
        if($request->start_date != '' && $request->end_date){
            $customers = DB::table('users')->select('id','name','email','phone_number','status')
                            ->where(function($q) {
                                  $q->where('role_id', '2')
                                    ->orWhere('role_id', '3');
                            })
                            ->whereDate('created_at', '>=', $request->start_date)
                            ->whereDate('created_at', '<=', $request->end_date)
                            ->orderByDesc('id')->get();
        }else{
            $customers = DB::table('users')->select('id','name','email','phone_number','status')
                            ->where(function($q) {
                                  $q->where('role_id', '2')
                                    ->orWhere('role_id', '3');
                            })
                            ->orderByDesc('id')->get();
        }
       /* print_r('<pre>');
        print_r($customers);
        exit;*/
        $final_data = array();
        
        foreach ($customers as $key => $customer) {
            if($customer->status == 1){
                $status = 'Active';
            }else{
                $status = 'Inactive';
            }
            $final_data[] = array(
                            '0'=>$key + 1,
                            '1'=>$customer->name,
                            '2'=>$customer->email,
                            '3'=>$customer->phone_number,
                            '4'=>$status,
                        );  
            
        }
        
        return Excel::download(new Exporter($final_data, $columns), 'customer.xlsx');
        
    }

    public function customerDestroy($id)
    {
       /* $update_data = array(
                                'is_deleted' => 1,
                                'updated_at'    => date('Y-m-d H:i:s')
                            );*/

        //DB::table('users')->where('id',$id)->update($update_data);
        DB::table('users')->where('id',$id)->delete();
        DB::table('order')->where('user_id',$id)->delete();
        return redirect()->route('customer')->with('success', 'Customer removed successfully.'); 
    }

    
} 
