<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Product;
use App\Shipping;


class ShippingController extends Controller 
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
        $shipping = Shipping::where('is_deleted','0')->orderByDesc('id')->get();
        return view('admin.shipping.shipping_index')->with('shipping', $shipping); 
    }

    public function addShipping( Request $request ) {
        return view('admin.shipping.shipping_add');
    }

    /**
     * Store color Method
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function storeShipping( Request $request ) {    
        $validatedData = $request->validate([
            'from_km'=> 'required',
            'to_km'=> 'required',
            'rate'=> 'required'
        ]); 

        $add_data = array(
                            'from_km'      => $request->from_km,
                            'to_km'  => $request->to_km,
                            'rate'  => $request->rate,
                            'created_at'=> date('Y-m-d H:i:s'),
                            'updated_at'=> date('Y-m-d H:i:s')
                        );
       

        Shipping::insert($add_data);
        return redirect()->route('shipping')->with('success', 'Shipping details added successfully.');
        
    }

    public function editShipping(Request $request ,$id)
    {
        $id = base64_decode($id);
        $shippingDetail = Shipping::where('id',$id)->first();
        return view('admin.shipping.shipping_edit',compact('shippingDetail','id'));
    }

    public function updateShipping(Request $request ,$id)
    {
        $request->validate([
                'from_km' => 'required',
                'to_km'=> 'required',
                'rate'=> 'required' 
        ]);

        $update_data = array(
                                'from_km' => $request->from_km,
                                'to_km'  => $request->to_km,
                                'rate'  => $request->rate,
                                'updated_at'    => date('Y-m-d H:i:s')
                            );

        $update = Shipping::where('id',$id)->update($update_data);
        return redirect()->route('shipping')->with('success', 'Shipping details updated successfully.');
    }

    public function shippingDestroy($id)
    {

        $shipping = Shipping::where('id',$id)->first();
        //if(!empty($shipping)){
           // return redirect()->route('shipping')->with('error', 'Shipping is used in product, Please remove first');
        //}else{
            $update_data = array(
                                'is_deleted' => 1,
                                'updated_at'    => date('Y-m-d H:i:s')
                            );

            $update = Shipping::where('id',$id)->update($update_data);
            return redirect()->route('shipping')->with('success', 'Shipping details removed successfully.');
        //}
        
    }
    public function shippingStatus()
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

        $update = Shipping::where('id',$id)
        ->update($update_data);

        echo '1';
    }

}