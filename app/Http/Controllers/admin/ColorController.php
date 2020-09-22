<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Colors;
use App\Product;

class ColorController extends Controller 
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
        $colors = Colors::select('id','name','status','hex_code')->where('is_deleted','0')->orderByDesc('id')->get();
        return view('admin.color.color_index')->with('colors', $colors); 
    }

    public function addColor( Request $request ) {
        return view('admin.color.color_add');
    }

    /**
     * Store color Method
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function storeColor( Request $request ) {    
        $validatedData = $request->validate([
            'name'=> 'required|unique:colors,name',
            'hex_code'=> 'required'
        ]); 

        $add_data = array(
                            'name'      => $request->name,
                            'hex_code'  => $request->hex_code,
                            'created_at'=> date('Y-m-d H:i:s'),
                            'updated_at'=> date('Y-m-d H:i:s')
                        );

        Colors::insert($add_data);
        return redirect()->route('color')->with('success', 'Color added successfully.');
        
    }

    public function editColor(Request $request ,$id)
    {
        $id = base64_decode($id);
        $colorDetail = Colors::select('id','name','hex_code')->where('id',$id)->get()->first();
        return view('admin.color.color_edit',compact('colorDetail','id'));
    }

    public function updateColor(Request $request ,$id)
    {
        $request->validate([
                'name' => 'required|unique:colors,name,'.$id,
                'hex_code'=> 'required' 
        ]);

        $update_data = array(
                                'name' => $request->name,
                                'hex_code'  => $request->hex_code,
                                'updated_at'    => date('Y-m-d H:i:s')
                            );

        $update = Colors::where('id',$id)->update($update_data);
        return redirect()->route('color')->with('success', 'Color updated successfully.');
    }

    public function colorDestroy($id)
    {
        $productColor = Product::select('id')->where('color_id',$id)->get()->first();
        if(!empty($productColor)){
            return redirect()->route('color')->with('error', 'Color is used in product, Please remove first');
        }else{
           /* $update_data = array(
                                'is_deleted' => 1,
                                'updated_at'    => date('Y-m-d H:i:s')
                            );*/

            //$update = Colors::where('id',$id)->update($update_data);
            $update = Colors::where('id',$id)->delete();
            return redirect()->route('color')->with('success', 'Color removed successfully.');
        }
        
    }

    public function colorStatus()
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

        $update = Colors::where('id',$id)
        ->update($update_data);

        echo '1';
    }
}