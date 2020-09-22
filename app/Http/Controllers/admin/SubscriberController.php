<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

use App\Helpers\Exporter;
use App\Subscribe;


class SubscriberController extends Controller 
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
        $subscribersList = DB::table('subscribe')->select('id','email')->orderByDesc('id')->get();
        return view('admin.subscriber.subscriber_index')->with('subscribersList', $subscribersList); 
    }
   public function subscribersDestroy($id)
    {
        Subscribe::where('id',$id)->delete();
        return redirect()->route('subscriber')->with('success', 'Subscriber removed successfully.'); 
    }

    public function export() 
    {
        $columns = array(
                        '0'=>'Sr No',
                        '1'=>'Email'
                    );

        $subscribersList = DB::table('subscribe')->select('id','email')->orderByDesc('id')->get();
        $final_data = array();

        foreach ($subscribersList as $key => $subscriber) {
            
            $final_data[] = array(
                            '0'=>$key + 1,
                            '1'=>$subscriber->email
                        );  
            
        }
        
        return Excel::download(new Exporter($final_data, $columns), 'subscribers.xlsx');
        
    }

} 
