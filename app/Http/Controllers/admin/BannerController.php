<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Banners;
use App\DiscountBanners;
use Image;

class BannerController extends Controller 
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
        $banners = Banners::select('id','image','page_id','url')->orderByDesc('id')->get();
        return view('admin.banner.banner_index')->with('banners', $banners); 
    }

    public function addBanner( Request $request ) {
        $bannerPageNewArrival = Banners::where('page_id',2)->first();
        $bannerPageTrending = Banners::where('page_id',3)->first();
        $bannerPageKurties = Banners::where('page_id',4)->first();
        $bannerPageKurtaSet = Banners::where('page_id',5)->first();
        $bannerPageDress = Banners::where('page_id',6)->first();
        $bannerPageMyAccount = Banners::where('page_id',7)->first();
        $bannerPageBlog = Banners::where('page_id','=',8)->first();
        $bannerPageContactUs = Banners::where('page_id',9)->first();
        $bannerPageSizeGuide = Banners::where('page_id',10)->first();

   
        return view('admin.banner.banner_add',compact('bannerPageNewArrival','bannerPageTrending','bannerPageKurties','bannerPageKurtaSet','bannerPageDress','bannerPageMyAccount','bannerPageBlog','bannerPageContactUs','bannerPageSizeGuide'));
    }

    /**
     * Store Banner Method
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function storeBanner( Request $request ) {    
        /*$validatedData = $request->validate([
            
           
        ]);*/ 
         if (isset($request->image)) {
                  $maxFileSize = 5242880;
                    $fileSize = $request->image->getSize();
                    if($fileSize >= $maxFileSize){
                        return redirect()->back()->with('error', 'Image too large. Image must be less than 5MB.');
                  }
              }
        $image = $request->image;

        $destinationPath = 'assets/upload_images/banner';
        $extension= $image->getClientOriginalExtension();
        $originalName= $image->getClientOriginalName();         
        
        //get filename without extension
        $filename = pathinfo($originalName, PATHINFO_FILENAME);
        //filename to store
        $filenametostore = time().'.'.$extension;

        $image_resize = Image::make($request->file('image')->getRealPath());              
        $image_resize->resize(200, 100);
        $image_resize->save(public_path('assets/upload_images/banner/thumb/' .$filenametostore));


        if($request->input('w')!=''){
            $image_crop = Image::make($request->file('image')->getRealPath());              
            $image_crop->crop($request->input('w'), $request->input('h'), $request->input('x1'), $request->input('y1'));
            $image_crop->save(public_path('assets/upload_images/banner/' .$filenametostore));
        }else{
            $image->move($destinationPath, $filenametostore);
        }

        //Compress Image Code Here
            $filenametostore = $filenametostore;
            $filepath = public_path('assets/upload_images/banner/' .$filenametostore);

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
                            'page_id'       => $request->page_id,
                            'url'           => $request->url,
                            'image'         => $filenametostore,
                            'created_at'    => date('Y-m-d H:i:s'),
                            'updated_at'    => date('Y-m-d H:i:s')
                        );
        
        Banners::insert($add_data);
        return redirect()->route('banner')->with('success', 'Banner created successfully.');
    }

    public function editBanner(Request $request ,$id){
        $id = base64_decode($id);
        $bannerDetail = Banners::select('id','page_id','url','image')->where('id',$id)->get()->first();
        return view('admin.banner.banner_edit',compact('bannerDetail','id'));
    }

    public function updateBanner(Request $request ,$id){
        /*$validatedData = $request->validate([
            
           
        ]);*/

        if (isset($request->image)) {
          $maxFileSize = 5242880;
            $fileSize = $request->image->getSize();
            if($fileSize >= $maxFileSize){
                return redirect()->back()->with('error', 'Image too large. Image must be less than 5MB.');
          }
      }
        $update_data = array(
                                'page_id'       => $request->page_id,
                                'url'           => $request->url,
                                'updated_at'    => date('Y-m-d H:i:s')
                            );

        $image = $request->image;
        
        if(!empty($image)){
            
            $destinationPath = 'assets/upload_images/banner';
            $extension= $image->getClientOriginalExtension();
            $originalName= $image->getClientOriginalName();         
            
            //get filename without extension
            $filename = pathinfo($originalName, PATHINFO_FILENAME);
            //filename to store
            $filenametostore = time().'.'.$extension;

            $image_resize = Image::make($image->getRealPath());              
            $image_resize->resize(200, 100);
            $image_resize->save(public_path('assets/upload_images/banner/thumb/' .$filenametostore));

            

            if($request->input('w')!=''){

                $image_crop = Image::make($request->file('image')->getRealPath());              
                $image_crop->crop($request->input('w'), $request->input('h'), $request->input('x1'), $request->input('y1'));
                $image_crop->save(public_path('assets/upload_images/banner/' .$filenametostore));
            }else{
                $image->move($destinationPath, $filenametostore);
            }

            //Compress Image Code Here
            $filenametostore = $filenametostore;
            $filepath = public_path('assets/upload_images/banner/' .$filenametostore);

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
            // alert("Uploaded file must be below 5MB");
            // store the optimized version of the image
            $ch = curl_init($arr_result->dest);
            $fp = fopen($filepath, 'wb');
            curl_setopt($ch, CURLOPT_FILE, $fp);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_exec($ch);
            curl_close($ch);
            fclose($fp);

            $update_data['image'] = $filenametostore;
        }

        $update = Banners::where('id',$id)->update($update_data);
        return redirect()->route('banner')->with('success', 'Banner updated successfully.');
    }

    public function bannerDestroy($id)
    {
        Banners::where('id',$id)->delete();
        return redirect()->route('banner')->with('success', 'Banner removed successfully.'); 
    }


    public function editDiscountBanner(){
        $id = 1;
        $bannerDetail = DiscountBanners::select('id','image','url')->where('id',$id)->get()->first();
        return view('admin.discountbanner.discount_banner_edit',compact('bannerDetail','id'));
    }

    public function updateDiscountBanner(Request $request ,$id){

        if (isset($request->image)) {
          $maxFileSize = 5242880;
            $fileSize = $request->image->getSize();
            if($fileSize >= $maxFileSize){
                return redirect()->back()->with('error', 'Image too large. Image must be less than 5MB.');
          }
      }
        $update_data = array(
                                'url'           => $request->url,
                                'updated_at'    => date('Y-m-d H:i:s')
                            );

        $image = $request->image;

        if(!empty($image)){
            $destinationPath = 'assets/upload_images/banner';
            $extension= $image->getClientOriginalExtension();
            $filenametostore = time().'.'.$extension;

            $image_resize = Image::make($image->getRealPath());              
            $image_resize->resize(200, 100);
            $image_resize->save(public_path('assets/upload_images/banner/thumb/' .$filenametostore));



            if($request->input('w')!=''){

                $image_crop = Image::make($request->file('image')->getRealPath());              
                $image_crop->crop($request->input('w'), $request->input('h'), $request->input('x1'), $request->input('y1'));
                $image_crop->save(public_path('assets/upload_images/banner/' .$filenametostore));
            }else{
                $image->move($destinationPath, $filenametostore);
            }

             //Compress Image Code Here
            $filenametostore = $filenametostore;

            $filepath = public_path('assets/upload_images/banner/' .$filenametostore);

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
            // alert("Uploaded file must be below 5MB");
            // store the optimized version of the image
            $ch = curl_init($arr_result->dest);
            $fp = fopen($filepath, 'wb');
            curl_setopt($ch, CURLOPT_FILE, $fp);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_exec($ch);
            curl_close($ch);
            fclose($fp);
            // $filename = $image->getClientOriginalName(); 
            // $image->move($destinationPath, $filename); 
            $update_data['image'] = $filenametostore;
        }
       
       $checkId = DiscountBanners::where('id',$id)->first();
       //dd($checkId);
       if (is_null($checkId)) {
           DiscountBanners::insert($update_data);
       }
       if (!is_null($checkId)) {
          $update = DiscountBanners::where('id',$id)->update($update_data);
       }
        
        return redirect()->route('edit.discountbanner')->with('success', 'Discount Banner updated successfully.');
    }
} 
