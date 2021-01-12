<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Sizes;
use App\ProductSize;

class SizeController extends Controller 
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
        $sizes = Sizes::select('id','name','status')->where('is_deleted','0')->get();
        return view('admin.size.size_index')->with('sizes', $sizes); 
    }

    public function addSize( Request $request ) {
        return view('admin.size.size_add');
    }

    /**
     * Store size Method
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function storeSize( Request $request ) {

        $sizeDetail = Sizes::select('id','name')->where('name',$request->name)->where('is_deleted',1)->get()->first();
        if(!empty($sizeDetail)){
            $update_data = array(
                                'is_deleted' => 0
                            );

        $update = Sizes::where('id',$sizeDetail->id)->update($update_data);
        }else{
           $validatedData = $request->validate([
            'name'=> 'required|max:3|unique:sizes,name'
            ]); 

            $add_data = array(
                                'name'      => $request->name,
                                'created_at'=> date('Y-m-d H:i:s'),
                                'updated_at'=> date('Y-m-d H:i:s')
                            );

            Sizes::insert($add_data); 
        }

        
        return redirect()->route('size')->with('success', 'Size created successfully.');
        
    }

    public function editSize(Request $request ,$id)
    {
        $id = base64_decode($id);
        $sizeDetail = Sizes::select('id','name')->where('id',$id)->get()->first();
        return view('admin.size.size_edit',compact('sizeDetail','id'));
    }

    public function updateSize(Request $request ,$id)
    {
        /*$request->validate([
                'name' => 'required|max:3|unique:sizes,name,'.$id  
        ]);*/

        $sizeDetail = Sizes::select('id','name')->where('name',$request->name)->where('is_deleted',1)->get()->first();
        //dd($sizeDetail);
        if(!empty($sizeDetail)){
            $update_data = array(
                                'is_deleted' => 0
                            );

        $update = Sizes::where('id',$sizeDetail->id)->update($update_data);
        return redirect()->route('size')->with('success', 'Size Details updated successfully.');
        }else{

            $update_data = array(
                                    'name' => $request->name,
                                    'updated_at'    => date('Y-m-d H:i:s')
                                );

            $update = Sizes::where('id',$id)->update($update_data);
            return redirect()->route('size')->with('success', 'Size Details updated successfully.');
        }
    }

    public function sizeDestroy($id)
    {
        $productSize = ProductSize::select('id')->where('size_id',$id)->get()->first();
        if(!empty($productSize)){
            return redirect()->route('size')->with('error', 'Size is used in product, Please remove first');
        }else{
            $update_data = array(
                                'is_deleted' => 1,
                                'updated_at'    => date('Y-m-d H:i:s')
                            );

            $update = Sizes::where('id',$id)->update($update_data);
            return redirect()->route('size')->with('success', 'Size removed successfully.');
        }
        
    }

    public function sizeStatus()
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

        $update = Sizes::where('id',$id)
        ->update($update_data);

        echo '1';
    }
}