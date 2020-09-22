<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\AboutUs;



class AboutusController extends Controller 
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
    
    public function editAboutUs(Request $request)
    {
        $id = 1;
        //$video = Videos::where('id',$id)->get()->first();
        $aboutUsDetail = AboutUs::select('id','image','heading_image','content')
                                    ->where('id',$id)->get()->first();
        return view('admin.aboutus.about_us_edit',compact('aboutUsDetail','id'));
    }

    public function updateAboutUs(Request $request ,$id)
    {
        $request->validate([
                'content'=>'required'
        ]);

        $update_data = array(
                                'content'           => $request->content,
                                'updated_at'        => date('Y-m-d H:i:s')
                            );

        $image = $request->heading_image;
        if(!empty($image)){
            $destinationPath = 'assets/upload_images/about';
            $extension= $image->getClientOriginalExtension();
            $filename = time().'_1.'.$extension;
            $image->move($destinationPath, $filename); 
            $update_data['heading_image'] = $filename;
        }

        $image = $request->image;
        if(!empty($image)){
            $destinationPath = 'assets/upload_images/about';
            $extension= $image->getClientOriginalExtension();
            $filename = time().'_2.'.$extension;
            $image->move($destinationPath, $filename); 
            $update_data['image'] = $filename;
        }

        $update = AboutUs::where('id',$id)->update($update_data);
        return redirect()->route('edit.aboutus')->with('success', 'Details updated successfully.');
    }

} 
