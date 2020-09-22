<?php
namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Blogs;
use App\BlogLeaveReply;
use App\Banners;
use Mail;
use Auth;
class BlogController extends Controller 

{
  public function blog(){
    $bannerSlider = Banners::where('page_id',8)->first(); 
    $blogsData = Blogs::where('status','1')->where('is_deleted','0')->paginate(9);
    return view('blog',compact('blogsData','bannerSlider'));
  }
  public function blogDetail(Request $request , $slug){
    $blogId = Blogs::where('slug',$slug)->first();
    $id = $blogId['id'];
    $blogDetailData = Blogs::where('id',$id)->where('status','1')->where('is_deleted','0')->get();
    
     $recentPostsBlog = Blogs::where('status','1')->where('is_deleted','0')->orderBy('id','DESC')->take(3)->get();
     
      $user_id = Auth::id();      
      $blogLeaveReplyData  = BlogLeaveReply::where('blog_id',$id)->orderBy('id','DESC')->take(6)->get();
    return view('blog_detail',compact('blogDetailData','recentPostsBlog','id','blogLeaveReplyData'));
  }
  public function blogLeaveReply(Request $request ){
    $validatedData = $request->validate([
        'comment'=> 'required',
        'name'=> 'required',
        'email'=> 'required',
        
    ]); 

       $add_data = array(
                          'comment'       => $request->comment,
                          'name'        => $request->name,
                          'email'            => $request->email,
                          'user_id'              => $request->user_id,
                          'blog_id'        => $request->blog_id,
                          'created_at'        => date('Y-m-d H:i:s'),
                          'updated_at'        => date('Y-m-d H:i:s')
                        );

        BlogLeaveReply::insert($add_data);

       return redirect()->back()->with('success', 'successfully');
        //return redirect()->route('blog')->with('success', 'successfully.');
  }
  

} 
