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

        $image = $request->image;
        $destinationPath = 'assets/upload_images/testimonial';
        $extension= $image->getClientOriginalExtension();
        $filename = time().'.'.$extension;

        $image_resize = Image::make($request->file('image')->getRealPath());              
        $image_resize->resize(200, 100);
        $image_resize->save(public_path('assets/upload_images/testimonial/thumb/' .$filename));
        $image->move($destinationPath, $filename); 

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
        $update_data = array(
                                'description'       => $request->description,
                                'name'           => $request->name,
                                'updated_at'    => date('Y-m-d H:i:s')
                            );

        $image = $request->image;
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
