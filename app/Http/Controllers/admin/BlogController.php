<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

use App\Category;
use App\BlogCategory;
use App\BlogLeaveReply;
use App\Blogs;

class BlogController extends Controller 
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
        $blogs = Blogs::select('id','blog_title','blog_date','blog_description','blog_image','author','category_id','slug','post_category')->get();
        return view('admin.blog.blog_index')->with('blogs', $blogs); 
    }

    public function addBlog( Request $request ) {
        $categoryList =BlogCategory::where('status',1)->where('is_deleted','=',0)->get();
        return view('admin.blog.blog_add',compact('categoryList'));
    }
    
    public function storeBlog( Request $request ) {   

        $validatedData = $request->validate([
            'blog_title'=> 'required|unique:blogs,blog_title',
            'blog_date'=> 'required',
            'blog_description'=> 'required',
        ]); 


          if (isset($request->blog_image)) {
                  $maxFileSize = 5242880;
                    $fileSize = $request->blog_image->getSize();
                    if($fileSize >= $maxFileSize){
                        return redirect()->back()->with('error', 'Image too large. Image must be less than 5MB.');
                  }
              }
             

       
        $image = $request->blog_image;
        $destinationPath = 'assets/upload_images/blog';
        $extension = $image->getClientOriginalExtension();
        $filename = time().rand(5, 15).'.'.$extension;       
        $image->move($destinationPath, $filename); 



           //Compress Image Code Here
            
            $filepath = public_path('assets/upload_images/blog/' .$filename);

            $mime = mime_content_type($filepath);

            $output = new \CURLFile($filepath, $mime, $filename);
            $data = ["files" => $output];

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, 'http://api.resmush.it/?qlty=80');
            curl_setopt($ch, CURLOPT_POST,1);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            $result = curl_exec($ch);
            if (curl_errno($ch)) {
                $result = curl_error($ch);
            }
            curl_close ($ch);
             
            $arr_result = json_decode($result);
             
            // store the optimized version of the image
            $ch = curl_init($arr_result->dest);
            $fp = fopen($filepath, 'wb');
            curl_setopt($ch, CURLOPT_FILE, $fp);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_exec($ch);
            curl_close($ch);
            fclose($fp);

        // $admin = new User(); 
        // $admin->name = $request->name;
        // $admin->image = $filename;
        // $admin->created_at = date('Y-m-d H:i:s');
        // $admin->updated_at = date('Y-m-d H:i:s');

        $date = date_create($request->blog_date);
        $newDate = date_format($date,"Y/m/d H:i:s");

        $new_slug = strtolower($request->blog_title);
        $new_slugs =preg_replace('/[-?]/', '', $new_slug);                    
        $new_slug = str_replace(' ', '-', $new_slugs);
        $add_data = array(
                            'post_category'       => $request->post_category,
                            'blog_title'        => $request->blog_title,
                            'author'            => $request->author,
                            'slug'              => $new_slug,
                            'blog_image'        => $filename,
                            'blog_date'         => $newDate,
                            'blog_description'  => $request->blog_description,
                            'created_at'        => date('Y-m-d H:i:s'),
                            'updated_at'        => date('Y-m-d H:i:s')
                        );


        Blogs::insert($add_data);
        return redirect()->route('admin.blog')->with('success', 'Blog created successfully.');
        
    }
   

    public function editBlog(Request $request ,$id)
    {
        $id = base64_decode($id);
        $categoryList = BlogCategory::where('status',1)->where('is_deleted','=',0)->get();
        $blogDetail = Blogs::select('id','blog_image','blog_title','blog_description','blog_date','author','category_id','slug')->where('id',$id)->get()->first();
        return view('admin.blog.blog_edit',compact('blogDetail','id','categoryList'));
    }
    public function viewBlogComment(Request $request ,$id)
    {
        $id = base64_decode($id);
        $viewBlogComment = BlogLeaveReply::where('blog_id',$id)->where('is_deleted','=',0)->get();
         $blogDetail = Blogs::select('id','blog_image','blog_title','blog_description','blog_date','author','category_id','slug')->where('id',$id)->get()->first();
          $categoryList = BlogCategory::where('status',1)->where('is_deleted','=',0)->get();
        
        return view('admin.blog.blog_comment_show',compact('viewBlogComment','id','blogDetail','categoryList'));
    }
    public function blogCommentDestroy($id)
    {
        BlogLeaveReply::where('id',$id)->delete();
        
        return redirect()->back()->with('success', 'Blog comment removed successfully.');
    }

    public function updateBlog(Request $request ,$id)
    {

        $request->validate([
                'blog_title'=> 'required',
                //'blog_date'=> 'required',
                'blog_description'=> 'required',
                //'blog_image' => 'required|blog_image|mimes:jpeg,png,jpg|max:5120'
        ]);
         if (isset($request->blog_image)) {
                  $maxFileSize = 5242880;
                    $fileSize = $request->blog_image->getSize();
                    if($fileSize >= $maxFileSize){
                        return redirect()->back()->with('error', 'Image too large. Image must be less than 5MB.');
                  }
              }
        $date = date_create($request->blog_date);
        $newDate = date_format($date,"Y/m/d H:i:s");

         $new_slug = strtolower($request->blog_title);
        $new_slugs =preg_replace('/[-?]/', '', $new_slug); 
         $new_slugsss =strip_tags($new_slugs);
                           
        $new_slug = str_replace(' ', '-', $new_slugsss);
        $update_data = array(
                                'post_category'       => $request->post_category,
                                'blog_title'        => $request->blog_title,
                                'author'            => $request->author,
                                'slug'              => $new_slug,
                                'blog_date'         => $newDate,
                                'blog_description'  => $request->blog_description,
                                'updated_at'    => date('Y-m-d H:i:s')
                            );

        $image = $request->blog_image;
        
        if(!empty($image)){
            $destinationPath = 'assets/upload_images/blog';
            $extension = $image->getClientOriginalExtension();
            $filename = time().rand(5, 15).'.'.$extension;
            $image->move($destinationPath, $filename); 
            $update_data['blog_image'] = $filename;

            //Compress Image Code Here
            
            $filepath = public_path('assets/upload_images/blog/' .$filename);

            $mime = mime_content_type($filepath);

            $output = new \CURLFile($filepath, $mime, $filename);
            $data = ["files" => $output];

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, 'http://api.resmush.it/?qlty=80');
            curl_setopt($ch, CURLOPT_POST,1);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            $result = curl_exec($ch);
            if (curl_errno($ch)) {
                $result = curl_error($ch);
            }
            curl_close ($ch);
             
            $arr_result = json_decode($result);
             
            // store the optimized version of the image
            $ch = curl_init($arr_result->dest);
            $fp = fopen($filepath, 'wb');
            curl_setopt($ch, CURLOPT_FILE, $fp);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_exec($ch);
            curl_close($ch);
            fclose($fp);
        }



        $update = Blogs::where('id',$id)
        ->update($update_data);
        return redirect()->route('admin.blog')->with('success', 'Blog Details updated successfully.');
    }

    public function blogDestroy($id)
    {
        Blogs::where('id',$id)->delete();
        return redirect()->route('admin.blog')->with('success', 'Blog removed successfully.'); 
    }


// Blog category 
    public function blogCategoryindex( Request $request ) {
        $blogCategory = BlogCategory::all();
        return view('admin.blog_category.blog_category_index' , compact('blogCategory')); 
    }
   
    public function addBlogCategory( Request $request ) {

        return view('admin.blog_category.blog_category_add');
    }

    /**
     * Store Category Method
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function storeBlogCategory( Request $request ) {    
        $validatedData = $request->validate([
            'category_name'=> 'required',
        ]); 

       
        $add_data = array(
                            'category_name'       => $request->category_name
                        );

        BlogCategory::insert($add_data);
        return redirect()->route('admin.blog_category.index')->with('success', 'Blog category created successfully.');
        
    }


    public function editBlogCategory(Request $request ,$id)
    {
        $id = base64_decode($id);
        $blogCategoryDetail =BlogCategory::where('id',$id)->where('status',1)->where('is_deleted',0)->first();
        return view('admin.blog_category.blog_category_edit',compact('blogCategoryDetail','id'));
    }

    public function updateBlogCategory(Request $request ,$id)
    {
        $request->validate([
                'category_name'=> 'required',
        ]);
       
        $update_data = array(
                                'category_name'       => $request->category_name
                            );

        
        $update = BlogCategory::where('id',$id)
        ->update($update_data);
        return redirect()->route('admin.blog_category.index')->with('success', 'Blog Category Details updated successfully.');
    }

    public function blogCategoryDestroy($id)
    {
        BlogCategory::where('id',$id)->delete();
        return redirect()->route('admin.blog_category.index')->with('success', 'Blog removed successfully.'); 
    }




} 
