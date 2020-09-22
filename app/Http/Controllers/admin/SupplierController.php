<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Suppliers;

class SupplierController extends Controller 
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
        $suppliers = Suppliers::select('id','name','address','gst_no','adhar_no','pan_no','bank_name','account_no','ifsc_code','status')->where('is_deleted','0')->orderByDesc('id')->get();
        return view('admin.supplier.supplier_index')->with('suppliers', $suppliers); 
    }

    public function addSupplier( Request $request ) {
        return view('admin.supplier.supplier_add');
    }

    /**
     * Store brand Method
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function storeSupplier( Request $request ) {    
        $validatedData = $request->validate([
            'name'=> 'required'
        ]); 

        $add_data = array(
                            'name'          => $request->name,
                            'address'       => $request->address,
                            'gst_no'        => $request->gst_no,
                            'adhar_no'      => $request->adhar_no,
                            'pan_no'        => $request->pan_no,
                            'bank_name'     => $request->bank_name,
                            'account_no'    => $request->account_no,
                            'ifsc_code'     => $request->ifsc_code,
                            'created_at'    => date('Y-m-d H:i:s'),
                            'updated_at'    => date('Y-m-d H:i:s')
                        );

        Suppliers::insert($add_data);
        return redirect()->route('supplier')->with('success', 'Supplier created successfully.');
        
    }

    public function editSupplier(Request $request ,$id)
    {
        $id = base64_decode($id);
        $supplierDetail = Suppliers::select('id','name','address','gst_no','adhar_no','pan_no','bank_name','account_no','ifsc_code')->where('id',$id)->get()->first();
        return view('admin.supplier.supplier_edit',compact('supplierDetail','id'));
    }

    public function updateSupplier(Request $request ,$id)
    {
        $request->validate([
                'name' => 'required|max:15'  
        ]);

        $update_data = array(
                                'name'          => $request->name,
                                'address'       => $request->address,
                                'gst_no'        => $request->gst_no,
                                'adhar_no'      => $request->adhar_no,
                                'pan_no'        => $request->pan_no,
                                'bank_name'     => $request->bank_name,
                                'account_no'    => $request->account_no,
                                'ifsc_code'     => $request->ifsc_code,
                                'updated_at'    => date('Y-m-d H:i:s')
                            );

        $update = Suppliers::where('id',$id)->update($update_data);
        return redirect()->route('supplier')->with('success', 'Supplier Details updated successfully.');
    }

    public function supplierDestroy($id)
    {
        $update_data = array(
                                'is_deleted' => 1,
                                'updated_at'    => date('Y-m-d H:i:s')
                            );

        $update = Suppliers::where('id',$id)->update($update_data);
        return redirect()->route('supplier')->with('success', 'Supplier removed successfully.');
        
    }

    public function supplierStatus()
    {
        extract($_POST);
        
        if($status == 'true' ){
            $status = 1;
        }else{
            $status = 0;
        }
        $update_data = array(
                                'status'        => $status,
                                'updated_at'    => date('Y-m-d H:i:s')
                            );

        $update = Suppliers::where('id',$id)
        ->update($update_data);

        echo '1';
    }
}