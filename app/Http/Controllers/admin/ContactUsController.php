<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\ContactUsDetail;
use App\ContactUs;


class ContactUsController extends Controller 
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
    public function adminContactUs()
    {
        $contactUsData = ContactUs::orderBy('id','DESC')->where('is_deleted',0)->get();
        return view('admin.contact_us.contact_us_index',compact('contactUsData')); 
    }
    public function contactUsDestroy($id)
    {
        ContactUs::where('id',$id)->delete();
        return redirect()->route('admin.contact_us.index')->with('success', 'Contact Us removed successfully.'); 
    }


     public function contactUsDetailindex()
    {
        $contactUsDetailData = ContactUsDetail::all();
        return view('admin.contact_us.contact_us_detail_index',compact('contactUsDetailData')); 
    }
    public function editContactUsDetail(Request $request , $id){
        $id = base64_decode($id);
        $ContactUsDetailEdit = ContactUsDetail::where('id',$id)->first();
       
        return view('admin.contact_us.contact_us_detail_edit',compact('id','ContactUsDetailEdit'));
    }
    public function contactUsDetailDestroy($id)
    {
        ContactUsDetail::where('id',$id)->delete();
        return redirect()->route('admin.contact_us.contact_us_detail')->with('success', 'Contact Us Detail removed successfully.'); 
    }

    public function updateContactUsDetail(Request $request ,$id)
    {

        $request->validate([
                'email'=> 'required',
                'phone_number'=> 'required',
        ]);
       
        $update_data = array(
                                'email'       => $request->email,
                                'phone_number' => $request->phone_number,
                                'address'       => $request->address,
                                'facebook_link' => $request->facebook_link,
                                'twitter_link'       => $request->twitter_link,
                                'linkedin_link' => $request->linkedin_link
                                
                            );

       
        $update = ContactUsDetail::where('id',$id)
        ->update($update_data);
        return redirect()->route('admin.contact_us_detail.index')->with('success', 'Contact Us Details updated successfully.');
    }

   

} 
