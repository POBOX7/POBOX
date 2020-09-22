<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Category;
use Image;
use App\Product;

class CategoryController extends Controller 
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
        $categories = Category::select('id','name','image','status','name')->where('is_deleted','0')->orderByDesc('id')->get();
        return view('admin.category.category_index')->with('categories', $categories); 
    }

    public function addCategory( Request $request ) {
        return view('admin.category.category_add');
    }

    /**
     * Store Category Method
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function storeCategory( Request $request ) {    
        $validatedData = $request->validate([
            'name'=> 'required|max:20'
        ]); 

        $image = $request->image;
        $destinationPath = 'assets/upload_images/category';
        $extension= $image->getClientOriginalExtension();
        $originalName= $image->getClientOriginalName();         
        
        $filename = time().'.'.$extension;

        $image_resize = Image::make($request->file('image')->getRealPath());              
        $image_resize->resize(200, 100);
        $image_resize->save(public_path('assets/upload_images/category/thumb/' .$filename));
        $image->move($destinationPath, $filename); 
        
        //Compress Image Code Here
            $filenametostore = $filename;
            $filepath = public_path('assets/upload_images/category/' .$filenametostore);

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
                            'name'          => $request->name,
                            'image'         => $filename,
                            'created_at'    => date('Y-m-d H:i:s'),
                            'updated_at'    => date('Y-m-d H:i:s')
                        );

        Category::insert($add_data);
        return redirect()->route('category')->with('success', 'Category created successfully.');
        
    }

    public function editCategory(Request $request ,$id)
    {
        $id = base64_decode($id);
        $categoryDetail = Category::select('id','name','image')->where('id',$id)->get()->first();
        return view('admin.category.category_edit',compact('categoryDetail','id'));
    }

    public function updateCategory(Request $request ,$id)
    {
        $request->validate([
                'name' => 'required|max:20'  
        ]);

        $update_data = array(
                                'name' => $request->name,
                                'updated_at'    => date('Y-m-d H:i:s')
                            );

        $image = $request->image;
        if(!empty($image)){
            $destinationPath = 'assets/upload_images/category';
            $extension= $image->getClientOriginalExtension();
            $filename = time().'.'.$extension;

            $image_resize = Image::make($request->file('image')->getRealPath());              
            $image_resize->resize(200, 100);
            $image_resize->save(public_path('assets/upload_images/category/thumb/' .$filename));
            $image->move($destinationPath, $filename); 

            $update_data['image'] = $filename;
        }

        $update = Category::where('id',$id)
        ->update($update_data);
        return redirect()->route('category')->with('success', 'Category Details updated successfully.');
    }

    public function categoryDestroy($id)
    {
        $productCategory = Product::select('id')->where('category_id',$id)->get()->first();
        if(!empty($productCategory)){
            return redirect()->route('category')->with('error', 'Category is used in product, Please remove first');
        }else{
            $update_data = array(
                                'is_deleted' => 1,
                                'updated_at'    => date('Y-m-d H:i:s')
                            );

            $update = Category::where('id',$id)->update($update_data);
            return redirect()->route('category')->with('success', 'Category removed successfully.'); 
        }
        
    }

    public function categoryStatus()
    {
        extract($_POST);
        
        if($status == 'true' ){
            $status = 1;
        }else{
            $status = 0;
        }
        $update_data = array(
                                'status' => $status,
                                'updated_at'    => date('Y-m-d H:i:s')
                            );

        $update = Category::where('id',$id)
        ->update($update_data);

        echo '1';
    }
} 
