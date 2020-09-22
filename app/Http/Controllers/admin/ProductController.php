<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;

use App\Helpers\Exporter;

use App\Product;
use App\ProductImage;
use App\ProductSize;
use App\Brands;
use App\Category;
use App\Colors;
use App\Sizes;
use App\parsecsv;
use Image;
use Storage;
use Milon\Barcode\DNS1D;
use PDF;

class ProductController extends Controller 
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
        $productList = DB::table('products')
                            ->join('colors', 'colors.id', '=', 'products.color_id')
                            ->select(\DB::raw('(SELECT GROUP_CONCAT(qty) as `qty` FROM product_size WHERE product_size.product_id = products.id) AS qty,(SELECT GROUP_CONCAT(name) as `size_name` FROM product_size INNER JOIN sizes ON sizes.id = product_size.size_id WHERE product_size.product_id = products.id) AS size_name,
                                products.id,products.image,products.status,products.name,products.sku,products.price,colors.hex_code'))
                            ->where('products.is_deleted','0')
                            ->orderByDesc('id')
                            ->get();
        return view('admin.product.product_index')->with('productList', $productList); 
    }

    public function addProduct( Request $request ) {
    	$categoryList =Category::select('id','name')->where('status',1)->where('is_deleted','=',0)->get();
        $brandList =Brands::select('id','name')->where('status',1)->where('is_deleted','=',0)->get();
        $colorList =Colors::select('id','name')->where('status',1)->where('is_deleted','=',0)->get();
        $sizeList = Sizes::select('id','name')->where('status',1)->where('is_deleted','=',0)->get();
    	return view('admin.product.product_add')->with('categoryList', $categoryList)->with('brandList', $brandList)->with('colorList', $colorList)->with('sizeList', $sizeList);
    }

    public function bulkUpload( Request $request ) {
        return view('admin.product.product_csv_import');
    }

    public function storeBulkUpload( Request $request ) {    
        $validatedData = $request->validate([
            'image'  => 'required',
        ]); 
        
        $image = $request->image;
        $csv = new parseCSV();
        $csv->parse($image);
        $excel_data = $csv->data;
        print_r('<pre>');
        print_r($excel_data);
        exit;
        

        $add_data = array(
                            'department_id'     => $request->department_id,
                            'category_id'       => isset($request->category_id)?$request->category_id:0,
                            'sub_category_id'   => isset($request->sub_category_id)?$request->sub_category_id:0,
                            'vendor_id'         => $request->vendor_id,
                            'image'             => $filename,
                            'name'              => $request->name,
                            'sub_title'         => $request->sub_title,
                            'additional_text'   => $request->additional_text,
                            'additional_image'  => $additional_image_name,
                            'description'       => $request->description,
                            'short_description' => $request->short_description,
                            'price'             => $request->price,
                            'sku'               => $request->sku,
                            'gst'               => isset($request->gst)?$request->gst:0,
                            'pst'               => isset($request->pst)?$request->pst:0,
                            'discount_price'    => $request->discount_price,
                            'created_at'        => date('Y-m-d H:i:s'),
                            'updated_at'        => date('Y-m-d H:i:s')
                        );

        $id = Product::insertGetId($add_data);

        if(!empty($request->product_image)){
            foreach ($request->product_image as $key => $value) {
                if(!empty($value)){
                    $image = $value;
                    $destinationPath = 'assets/upload_images/product';
                    $extension = $image->getClientOriginalExtension();
                    if($extension == 'mp4'){
                        $type = 'video';
                    }else{
                        $type = 'image';
                    }
                    $originalName = $image->getClientOriginalName();         
                    $image->move($destinationPath, $originalName); 

                    $product_image = array(
                                            'product_id'=>$id,
                                            'product_image'=>$originalName
                                        );
                    ProductImage::insertGetId($product_image);
                }
            }
        }
        

        return redirect()->route('product')->with('success', 'Product created successfully.');
        
    }

    /**
     * Store Product Method
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function storeProduct( Request $request ) {    
        $validatedData = $request->validate([
            'category_id'  => 'required',
            'name'=>'required|max:40',
            'mrp'  => 'required',
            'price'  => 'required',
            'discount'  => 'required',
            'sku'  => 'required',
            'size'  => 'required',

        ]); 

        if(isset($request->is_featured) && $request->is_featured == 'on' ){
            $is_featured = 1;
        }else{
            $is_featured = 0;
        }

        if(isset($request->is_trending) && $request->is_trending == 'on' ){
            $is_trending = 1;
        }else{
            $is_trending = 0;
        }

        if(isset($request->is_new_arrival) && $request->is_new_arrival == 'on' ){
            $is_new_arrival = 1;
        }else{
            $is_new_arrival = 0;
        }
        
        $image = $request->image;
        $destinationPath = 'assets/upload_images/product';
        $extension= $image->getClientOriginalExtension();
        $filename = time().rand(5, 15).'.'.$extension;

        $image_resize = Image::make($request->file('image')->getRealPath());              
       $image_resize->resize(277, 400);
        $image_resize->save(public_path('assets/upload_images/product/thumb/' .$filename));
        $image->move($destinationPath, $filename); 

        //Compress Image Code Here
            $filenametostore = $filename;
            $filepath = public_path('assets/upload_images/product/' .$filenametostore);

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
                            'category_id'       => isset($request->category_id)?$request->category_id:0,
                            'brand_id'          => $request->brand_id,
                            'color_id'          => $request->color_id,
                            'image'             => $filename,
                            'name'              => $request->name,
                            'sub_title'         => $request->sub_title,
                            'description'       => $request->description,
                            'short_description' => $request->short_description,
                            'sku'               => $request->sku,
                            'barcode'           => $request->barcode,
                            'is_featured'       => $is_featured,
                            'is_trending'       => $is_trending,
                            'is_new_arrival'    => $is_new_arrival,
                            'mrp'               => $request->mrp,
                            'price'             => $request->price,
                            'gst'               => $request->gst,
                            'gstper'             => $request->gstper,
                            'discount'          => $request->discount,
                            'created_at'	    => date('Y-m-d H:i:s'),
                            'updated_at'	    => date('Y-m-d H:i:s')
                        );

        $id = Product::insertGetId($add_data);

        if(!empty($request->product_image)){
            foreach ($request->product_image as $key => $value) {
                if(!empty($value)){
                    $image = $value;
                    $destinationPath = 'assets/upload_images/product';
                    $extension= $image->getClientOriginalExtension();
                    $filename = time().rand(5, 15).'.'.$extension;
                    if($extension == 'mp4'){
                        $type = 'video';
                    }else{
                        $type = 'image';
                        $image_resize = Image::make($image->getRealPath());              
                        $image_resize->resize(277, 400);
                        $image_resize->save(public_path('assets/upload_images/product/thumb/' .$filename)); 
                    }

                    $image->move($destinationPath, $filename); 
                    
                    //Compress Image Code Here
                        $filenametostore = $filename;
                        $filepath = public_path('assets/upload_images/product/' .$filenametostore);

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


                    $product_image = array(
                                            'product_id'=>$id,
                                            'product_image'=>$filename
                                        );
                    ProductImage::insertGetId($product_image);
                }
            }
        }

        if(!empty($request->size)){
            foreach ($request->size as $key => $value) {
                if($request->qty[$key]!= ''){
                    $product_size = array(
                                            'product_id'=>$id,
                                            'size_id'   =>$value,
                                            'qty'       =>$request->qty[$key]
                                        );
                    ProductSize::insertGetId($product_size);
                }
            }
        }
        
        return redirect()->route('product')->with('success', 'Product added successfully.');
        
    }

    public function editProduct(Request $request ,$id)
    {
        $id = base64_decode($id);

        $categoryList =Category::select('id','name')->where('status',1)->where('is_deleted','=',0)->get();
        $brandList =Brands::select('id','name')->where('status',1)->where('is_deleted','=',0)->get();
        $colorList =Colors::select('id','name')->where('status',1)->where('is_deleted','=',0)->get();
        $sizeList = Sizes::select('id','name')->where('status',1)->where('is_deleted','=',0)->get();
        $productDetail = DB::table('products')
        								->select('id','category_id','image','status','name','sku','price','sub_title','short_description','description','brand_id','color_id','mrp','discount','is_featured','gst','is_new_arrival','is_trending','barcode')
        								->where('id',$id)
        								->get()
        								->first();
        // print_r('<pre>');
        // print_r($productDetail);
        // exit;
        $productDetail->allMedia = ProductImage::select('id','product_image')->where('product_id',$id)->get();
        $productDetail->allSize = ProductSize::select('id','size_id','qty')->where('product_id',$id)->get();
        
        return view('admin.product.product_edit',compact('productDetail','id','categoryList','brandList','colorList','sizeList'));
    }

    public function viewProduct(Request $request ,$id)
    {
        $id = base64_decode($id);

        $sizeList = Sizes::select('id','name')->where('status',1)->where('is_deleted','=',0)->get();
        $productDetail = DB::table('products')
                            ->join('category', 'category.id', '=', 'products.category_id')
                            ->join('brands', 'brands.id', '=', 'products.brand_id')
                            ->join('colors', 'colors.id', '=', 'products.color_id')
                            ->select('products.id','products.image','products.status','products.name','category.name AS category_name','brands.name AS brand_name','colors.name AS color_name','sku','price','sub_title','short_description','description','mrp','discount','is_featured','is_new_arrival','is_trending','sku','gst','barcode')
                            ->where('products.id',$id)
                            ->first();
        // print_r('<pre>');
        // print_r($productDetail);
        // exit;
        $productDetail->allMedia = ProductImage::select('id','product_image')->where('product_id',$id)->get();
        $productDetail->allSize = ProductSize::select('qty','name')
                                    ->join('sizes', 'sizes.id', '=', 'product_size.size_id')
                                    ->where('product_id',$id)->get();
        
        return view('admin.product.product_view',compact('productDetail','id','sizeList'));
    }

    public function printProduct($id)
    {
        $id = base64_decode($id);

        
        $productDetail = DB::table('products')
                            ->select('products.id','barcode')
                            ->where('products.id',$id)
                            ->first();


        //echo DNS1D::getBarcodePNGPath('333', 'C128A');

        // $pdf = \App::make('dompdf.wrapper');
        // $pdf->loadHTML('<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($productDetail->barcode, 'C39+',3,33) . '" alt="barcode"   />');
        // return $pdf->stream();
        $barcode = $productDetail->barcode;
        //$barcode = '90907970';
        //Storage::disk('local')->put('test.png',DNS1D::getBarcodePNGPath($barcode, 'C128A'));
        Storage::disk('public')->put('test.png',DNS1D::getBarcodePNGPath($barcode, 'C128A'));
        //Storage::disk('local')->put('test.png',DNS1D::getBarcodePNG("4", "PDF417"));
        $myfile = public_path($barcode.'.png');
        return response()->download($myfile);
        //Response::download('44555222.png');
        //Storage::disk('local')->put('test.png',DNS1D::getBarcodePNG("4", "PDF417"));
        //Storage::disk('public')->put('test.png',DNS1D::getBarcodePNGPath('45555', 'C128A'));
        
        //Storage::disk('public')->put('image_name.extension',base64_decode(DNS2D::getBarcodePNG("4", "barcode_content")));
        //return view('admin.product.product_print',compact('productDetail'));
    }

    public function updateProduct(Request $request ,$id)
    {
        $request->validate([
                'category_id'   => 'required',
                'name'          =>'required|max:20',
                'mrp'           => 'required',
                'price'         => 'required',
                'discount'      => 'required',
                'sku'           => 'required',
                'size'          => 'required',
        ]);
       
        if(isset($request->is_featured) && $request->is_featured == 'on' ){
            $is_featured = 1;
        }else{
            $is_featured = 0;
        }

        if(isset($request->is_trending) && $request->is_trending == 'on' ){
            $is_trending = 1;
        }else{
            $is_trending = 0;
        }

        if(isset($request->is_new_arrival) && $request->is_new_arrival == 'on' ){
            $is_new_arrival = 1;
        }else{
            $is_new_arrival = 0;
        }

        $update_data = array(
                                'category_id'       => isset($request->category_id)?$request->category_id:0,
                                'brand_id'          => $request->brand_id,
                                'color_id'          => $request->color_id,
                                'name'              => $request->name,
                                'sub_title'         => $request->sub_title,
                                'description'       => $request->description,
                                'short_description' => $request->short_description,
                                'sku'               => $request->sku,
                                'barcode'           => $request->barcode,
                                'is_featured'       => $is_featured,
                                'is_trending'       => $is_trending,
                                'is_new_arrival'    => $is_new_arrival,
                                'mrp'               => $request->mrp,
                                'price'             => $request->price,
                                'gst'               => $request->gst,
                                'gstper'            => $request->gstper,
                                'discount'          => $request->discount,
                                'updated_at'        => date('Y-m-d H:i:s')
                            );
        $image = $request->image;
        if(!empty($image)){
            $destinationPath = 'assets/upload_images/product';
            $extension = $image->getClientOriginalExtension();
            $filename = time().rand(5, 15).'.'.$extension;

            $image_resize = Image::make($image->getRealPath());              
            $image_resize->resize(277, 400);
            $image_resize->save(public_path('assets/upload_images/product/thumb/' .$filename)); 
            $image->move($destinationPath, $filename); 

            //Compress Image Code Here
            $filenametostore = $filename;
            $filepath = public_path('assets/upload_images/product/' .$filenametostore);

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

            $update_data['image'] = $filename;
        }

        $update = Product::where('id',$id)->update($update_data);

        if(!empty($request->product_image)){
            foreach ($request->product_image as $key => $value) {
                if(!empty($value)){
                    $image = $value;
                    $destinationPath = 'assets/upload_images/product';
                    $extension = $image->getClientOriginalExtension();
                    $filename = time().rand(5, 15).'.'.$extension;

                    $image_resize = Image::make($image->getRealPath());              
                    $image_resize->resize(277, 400);
                    $image_resize->save(public_path('assets/upload_images/product/thumb/' .$filename));     

                    $image->move($destinationPath, $filename); 

                    //Compress Image Code Here
                    $filenametostore = $filename;
                    $filepath = public_path('assets/upload_images/product/' .$filenametostore);

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

                    $product_image = array(
                                            'product_id'   =>$id,
                                            'product_image' =>$filename
                                        );
                    ProductImage::insertGetId($product_image);
                }
            }
        }

        ProductSize::where('product_id',$id)->delete();
        if(!empty($request->size)){
            foreach ($request->size as $key => $value) {
                if($request->qty[$key]!= ''){
                    $product_size = array(
                                            'product_id'=>$id,
                                            'size_id'   =>$value,
                                            'qty'       =>$request->qty[$key]
                                        );
                    ProductSize::insertGetId($product_size);
                }
            }
        }

        return redirect()->route('product')->with('success', 'Product details updated successfully.');
    }

    public function productDestroy($id)
    {
        $update_data = array(
                                'is_deleted' => 1,
                                'updated_at'    => date('Y-m-d H:i:s')
                            );

        $update = Product::where('id',$id)
        ->update($update_data);
        return redirect()->route('product')->with('success', 'Product removed successfully.');
    }

    public function productStatus()
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

        $update = Product::where('id',$id)
        ->update($update_data);

        echo '1';
    }

    public function productImageDestroy($id)
    {
        ProductImage::where('id',$id)->delete();
        echo '1';
    }

    public function allProduct()
    {

        $sizeDetail = Product::select('products.id','products.name','price','image','sku','colors.hex_code')
                        ->join('colors', 'colors.id', '=', 'products.color_id')
                        ->where('products.status',1)
                        ->where('products.is_deleted',0)
                        ->get();
        return response()->json($sizeDetail, 200);
        
    }

    public function allSize()
    {

        $sizeDetail = Sizes::select('id','name')
                                        ->where('status',1)
                                        ->where('is_deleted',0)
                                        ->get();
        return response()->json($sizeDetail, 200);
        
    }

    public function export(Request $request) 
    {
        
        $columns = array(
                        '0'=>'Sr No',
                        '1'=>'Name',
                        '2'=>'SKU',
                        '3'=>'Price',
                        '4'=>'Color',
                        '5'=>'Size',
                        '6'=>'Qty',
                        '7'=>'Status',
                    );
        if($request->start_date != '' && $request->end_date){
           $productList = DB::table('products')
                             ->join('colors', 'colors.id', '=', 'products.color_id')
                            ->select(\DB::raw('(SELECT GROUP_CONCAT(qty) as `qty` FROM product_size WHERE product_size.product_id = products.id) AS qty,(SELECT GROUP_CONCAT(name) as `size_name` FROM product_size INNER JOIN sizes ON sizes.id = product_size.size_id WHERE product_size.product_id = products.id) AS size_name,
                                products.id,products.image,products.status,products.name,products.sku,products.price,colors.name AS color_name'))
                            ->where('products.is_deleted','0')
                            ->whereDate('products.created_at', '>=', $request->start_date)
                            ->whereDate('products.created_at', '<=', $request->end_date)
                            ->orderByDesc('id')->get();

                           
        }else{
            $productList =  DB::table('products')
                             ->join('colors', 'colors.id', '=', 'products.color_id')
                            ->select(\DB::raw('(SELECT GROUP_CONCAT(qty) as `qty` FROM product_size WHERE product_size.product_id = products.id) AS qty,(SELECT GROUP_CONCAT(name) as `size_name` FROM product_size INNER JOIN sizes ON sizes.id = product_size.size_id WHERE product_size.product_id = products.id) AS size_name,
                                products.id,products.image,products.status,products.name,products.sku,products.price,colors.name AS color_name'))
                            ->where('products.is_deleted','0')
                            ->orderByDesc('id')->get();
        }
        
        $final_data = array();

        foreach ($productList as $key => $product) {
            if($product->status == 1){
                $status = 'Active';
            }else{
                $status = 'Inactive';
            }
            $final_data[] = array(
                            '0'=>$key + 1,
                            '1'=>$product->name,
                            '2'=>$product->sku,
                            '3'=>$product->price,
                            '4'=>$product->color_name,
                            '5'=>$product->size_name,
                            '6'=>$product->qty,
                            '7'=>$status,
                        );  
            
        }
        
        return Excel::download(new Exporter($final_data, $columns), 'product.xlsx');
        
    }
} 
