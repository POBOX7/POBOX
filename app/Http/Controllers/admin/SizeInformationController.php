<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\SizeInformation;
use App\Sizes;

class SizeInformationController extends Controller 
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
        $sizeInformations = SizeInformation::select('size_information.id','size_id','chest','waist','hips','length','shoulder','sizes.name AS size_name')
                                            ->join('sizes', 'sizes.id', '=', 'size_information.size_id')
                                            ->orderByDesc('size_information.id')->get();
        return view('admin.size_information.size_information_index')->with('sizeInformations', $sizeInformations); 
    }

    public function addSizeInformation( Request $request ) {
        $sizeList = Sizes::select('id','name')->where('status',1)->where('is_deleted','=',0)->get();
        return view('admin.size_information.size_information_add')->with('sizeList',$sizeList);
    }

    /**
     * Store sizeInformation Method
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function storeSizeInformation( Request $request ) {    
        $validatedData = $request->validate([
            'chest' => 'required|max:5',
            'waist' => 'required|max:5',
            'hips' => 'required|max:5',
            'length' => 'required|max:5',
            'shoulder' => 'required|max:5',
        ]); 

        $add_data = array(
                            'size_id'       => $request->size_id,
                            'chest'         => $request->chest,
                            'waist'         => $request->waist,
                            'hips'          => $request->hips,
                            'length'        => $request->length,
                            'shoulder'      => $request->shoulder,
                            'created_at'    => date('Y-m-d H:i:s'),
                            'updated_at'    => date('Y-m-d H:i:s')
                        );
        
        SizeInformation::insert($add_data);
        return redirect()->route('sizeinformation')->with('success', 'Size Information aaded successfully.');
    }

    public function editSizeInformation(Request $request ,$id){
        $id = base64_decode($id);
        $sizeList = Sizes::select('id','name')->where('status',1)->where('is_deleted','=',0)->get();
        $sizeInformationDetail = SizeInformation::select('id','size_id','chest','waist','hips','length','shoulder')->where('id',$id)->get()->first();
        return view('admin.size_information.size_information_edit',compact('sizeInformationDetail','id','sizeList'));
    }

    public function updateSizeInformation(Request $request ,$id){
        $validatedData = $request->validate([
            'chest' => 'required|max:5',
            'waist' => 'required|max:5',
            'hips' => 'required|max:5',
            'length' => 'required|max:5',
            'shoulder' => 'required|max:5',
        ]); 
        $update_data = array(
                                'size_id'       => $request->size_id,
                                'chest'         => $request->chest,
                                'waist'         => $request->waist,
                                'hips'          => $request->hips,
                                'length'        => $request->length,
                                'shoulder'      => $request->shoulder,
                                'updated_at'    => date('Y-m-d H:i:s')
                            );

        $update = SizeInformation::where('id',$id)->update($update_data);
        return redirect()->route('sizeinformation')->with('success', 'Size Information updated successfully.');
    }

    public function sizeInformationDestroy($id)
    {
        SizeInformation::where('id',$id)->delete();
        return redirect()->route('sizeinformation')->with('success', 'Size Information removed successfully.'); 
    }

} 
