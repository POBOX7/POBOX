<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Testinomials;
use Image;

class TestimonialController extends Controller 
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
        $testimonials = Testinomials::select('id','image','description','name')->orderByDesc('id')->get();
        return view('admin.testimonial.testimonial_index')->with('testimonials', $testimonials); 
    }

    public function addTestimonial( Request $request ) {
        return view('admin.testimonial.testimonial_add');
    }

    /**
     * Store testimonial Method
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function storeTestimonial( Request $request ) {    
        $validatedData = $request->validate([
            'image' => 'required',
            'description'=>'required|max:120',
            'name'=>'required|max:15'
        ]); 
        if (isset($request->image)) {
                  $maxFileSize = 5242880;
                    $fileSize = $request->image->getSize();
                    if($fileSize >= $maxFileSize){
                        return redirect()->back()->with('error', 'Image too large. Image must be less than 5MB.');
                  }
              }
        $image = $request->image;
        $destinationPath = 'assets/upload_images/testimonial';
        $extension= $image->getClientOriginalExtension();
        $filename = time().'.'.$extension;

        $image_resize = Image::make($request->file('image')->getRealPath());              
        $image_resize->resize(200, 100);
        $image_resize->save(public_path('assets/upload_images/testimonial/thumb/' .$filename));
        $image->move($destinationPath, $filename); 


         //Compress Image Code Here
            $filenametostore = $filename;
            $filepath = public_path('assets/upload_images/testimonial/' .$filenametostore);

            $mime = mime_content_type($filepath);

            $output = new \CURLFile($filepath, $mime, $filenametostore);
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
            
        $add_data = array(
                            'description'   => $request->description,
                            'name'          => $request->name,
                            'image'         => $filename,
                            'created_at'    => date('Y-m-d H:i:s'),
                            'updated_at'    => date('Y-m-d H:i:s')
                        );
        
        Testinomials::insert($add_data);
        return redirect()->route('testimonial')->with('success', 'Testimonial added successfully.');
    }

    public function editTestimonial(Request $request ,$id){
        $id = base64_decode($id);
        $testimonialDetail = Testinomials::select('id','description','name','image')->where('id',$id)->get()->first();
        return view('admin.testimonial.testimonial_edit',compact('testimonialDetail','id'));
    }

    public function updateTestimonial(Request $request ,$id){
        $validatedData = $request->validate([
            'description'=>'required|max:120',
            'name'=>'required|max:15'
        ]); 
         if (isset($request->image)) {
                  $maxFileSize = 5242880;
                    $fileSize = $request->image->getSize();
                    if($fileSize >= $maxFileSize){
                        return redirect()->back()->with('error', 'Image too large. Image must be less than 5MB.');
                  }
              }

        $update_data = array(
                                'description'       => $request->description,
                                'name'           => $request->name,
                                'updated_at'    => date('Y-m-d H:i:s')
                            );
         
        $image = $request->image;
       // dd($image);

     if(!empty($image)){
       
           
            $destinationPath = 'assets/upload_images/testimonial';
            $filename = $image->getClientOriginalName(); 
            $extension= $image->getClientOriginalExtension();
            $filename = time().'.'.$extension;

            $image_resize = Image::make($request->file('image')->getRealPath());              
            $image_resize->resize(200, 100);
            $image_resize->save(public_path('assets/upload_images/testimonial/thumb/' .$filename));
            
            $image->move($destinationPath, $filename); 
            $update_data['image'] = $filename;
        
        //Compress Image Code Here

            $filenametostore = $filename;
            $filepath = public_path('assets/upload_images/testimonial/' .$filenametostore);

            $mime = mime_content_type($filepath);

            $output = new \CURLFile($filepath, $mime, $filenametostore);
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

        $update = Testinomials::where('id',$id)->update($update_data);
        return redirect()->route('testimonial')->with('success', 'Testimonial updated successfully.');
    }

    public function testimonialDestroy($id)
    {
        Testinomials::where('id',$id)->delete();
        return redirect()->route('testimonial')->with('success', 'Testimonial removed successfully.'); 
    }
} 
