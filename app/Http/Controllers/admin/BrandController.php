<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Brands;
use App\Product;

class BrandController extends Controller 
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
        $brands = Brands::select('id','name','status')->where('is_deleted','0')->orderByDesc('id')->get();
        return view('admin.brand.brand_index')->with('brands', $brands); 
    }

    public function addBrand( Request $request ) {
        return view('admin.brand.brand_add');
    }

    /**
     * Store brand Method
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function storeBrand( Request $request ) {    
        $validatedData = $request->validate([
            'name'=> 'required|max:15',
             //'image' => 'required|image|mimes:jpeg,png,jpg|max:5120'
        ]); 


        $add_data = array(
                            'name'      => $request->name,
                            'created_at'=> date('Y-m-d H:i:s'),
                            'updated_at'=> date('Y-m-d H:i:s')
                        );

        Brands::insert($add_data);
        return redirect()->route('brand')->with('success', 'Brand created successfully.');
        
    }

    public function editBrand(Request $request ,$id)
    {
        $id = base64_decode($id);
        $brandDetail = Brands::select('id','name')->where('id',$id)->get()->first();
        return view('admin.brand.brand_edit',compact('brandDetail','id'));
    }

    public function updateBrand(Request $request ,$id)
    {
        $request->validate([
                'name' => 'required|max:15' ,
                // 'image' => 'required|image|mimes:jpeg,png,jpg|max:5120' 
        ]);

        $update_data = array(
                                'name' => $request->name,
                                'updated_at'    => date('Y-m-d H:i:s')
                            );

        $update = Brands::where('id',$id)->update($update_data);
        return redirect()->route('brand')->with('success', 'Brand Details updated successfully.');
    }

    public function brandDestroy($id)
    {
        $productBrand = Product::select('id')->where('brand_id',$id)->get()->first();
        if(!empty($productBrand)){
            return redirect()->route('brand')->with('error', 'Brand is used in product, Please remove first');
        }else{
            $update_data = array(
                                'is_deleted' => 1,
                                'updated_at'    => date('Y-m-d H:i:s')
                            );

            $update = Brands::where('id',$id)->update($update_data);
            return redirect()->route('brand')->with('success', 'Brand removed successfully.');
        }
        
    }

    public function brandStatus()
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

        $update = Brands::where('id',$id)
        ->update($update_data);

        echo '1';
    }
}