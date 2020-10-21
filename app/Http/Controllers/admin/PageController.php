<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

use App\Pages;

class PageController extends Controller 
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
        $staticPages = Pages::where('is_delete',0)->get();
        return view('admin.staticpage.staticpage_index')->with('staticPages', $staticPages); 
    }

    public function editPage(Request $request ,$id)
    {
        $id = base64_decode($id);
        $staticpageDetail = DB::table('pages')->select('id','title','content','heading_image')->where('id',$id)->get()->first();
        return view('admin.staticpage.staticpage_edit',compact('staticpageDetail','id'));
    }

    public function updatePage(Request $request ,$id)
    {
        $request->validate([
                    'content'=> 'required',
                    ]);
        $update_data = array(
                                'content'        => $request->content,
                                'updated_at'    => date('Y-m-d H:i:s')
                            );

        $heading_image = $request->heading_image;
        if(!empty($heading_image)){
            $destinationPath = 'assets/upload_images/pages';
            $filename = $heading_image->getClientOriginalName(); 
            $heading_image->move($destinationPath, $filename); 
            $update_data['heading_image'] = $filename;
        }


      $checkPagesData = Pages::where('id',$id)->first();
         if (is_null($checkPagesData)) {
           Pages::insert($update_data);
       }
       if (!is_null($checkPagesData)) {
      $update = DB::table('pages')->where('id',$id)->update($update_data);
       }
       
        return redirect()->route('static-pages')->with('success', 'Details updated successfully.');
    }

    public function viewPage(Request $request ,$id)
    {
        $id = base64_decode($id);
        $staticpageDetail = DB::table('pages')->select('id','title','content')->where('id',$id)->get()->first();
        return view('admin.staticpage.staticpage_view',compact('staticpageDetail','id'));
    }

    public function pageDestroy($id)
    {
        DB::table('pages')->where('id',$id)->delete();
        return redirect()->route('static-pages')->with('success', 'Removed successfully.'); 
    }
} 
