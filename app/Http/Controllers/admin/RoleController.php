<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;



class RoleController extends Controller 
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
        $roles = DB::table('role')->select('id','type')->get();
        return view('admin.role.role_index')->with('roles', $roles); 
    }

    public function editRole(Request $request ,$id)
    {
        $id = base64_decode($id);
        //$video = Videos::where('id',$id)->get()->first();
        $roleDetail = DB::table('role')->select('id','type')->where('id',$id)->get()->first();
        return view('admin.role.role_edit',compact('roleDetail','id'));
    }

    public function updateRole(Request $request ,$id)
    {
        $request->validate([
                'type' => 'required'  
        ]);

        $update_data = array(
                                'type' => $request->type,
                                'updated_at'    => date('Y-m-d H:i:s')
                            );

        $update = DB::table('role')->where('id',$id)
        ->update($update_data);
        return redirect()->route('role')->with('success', 'Role details updated successfully.');
    }
} 
