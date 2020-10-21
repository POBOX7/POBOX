<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;

use App\Helpers\Exporter;

use App\Product;
use App\Suppliers;
use App\Purchases;
use App\PurchaseProduct;
use App\ProductSize;
use App\Sizes;
use App\parsecsv;
use Image;


class PurchaseController extends Controller 
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
        $purchaseList = DB::table('purchase')
                            ->join('suppliers', 'suppliers.id', '=', 'purchase.supplier_id')
                            ->select(\DB::raw('(SELECT COUNT(purchase_product.id) as `total_product` FROM purchase_product WHERE purchase_product.purchase_id = purchase.id ) AS total_product,
                                purchase.id,purchase.bill_no,purchase.bill_date,purchase.payment_type,suppliers.name AS supplier_name'))
                            
                            ->where('purchase.is_deleted','0')
                            ->orderByDesc('id')
                            ->get();
        return view('admin.purchase.purchase_index')->with('purchaseList', $purchaseList); 
    }

    public function addPurchase( Request $request ) {
              
    	$productList = Product::select('products.id','products.name','price','image','sku','colors.hex_code')
                        ->join('colors', 'colors.id', '=', 'products.color_id')
                        ->where('products.status',1)
                        ->where('products.is_deleted','=',0)
                        ->get();
        $sizeList = Sizes::select('id','name')->where('status',1)->where('is_deleted','=',0)->get();
        $supplierList = Suppliers::select('id','name')->where('status',1)->where('is_deleted','=',0)->get();
        return view('admin.purchase.purchase_add')->with('productList', $productList)->with('sizeList', $sizeList)->with('supplierList', $supplierList);
    }

    /**
     * Store Product Method
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function storePurchase( Request $request ) {   
        $checkBill_no = Purchases::where('bill_no',$request->bill_no)->first();
        
        /* $validatedData = $request->validate([
            'bill_no' => 'required|unique:purchase,bill_no',   
        ]); 
        */

           $request->validate([
            'bill_no' => 'required|unique:purchase,bill_no',   
        ]); 
       
        $add_data = array(
                            'supplier_id'       => isset($request->supplier_id)?$request->supplier_id:0,
                            'bill_no'           => $request->bill_no,
                            'bill_date'         => $request->bill_date,
                            'payment_type'      => $request->payment_type,
                            'created_at'	    => date('Y-m-d H:i:s'),
                            'updated_at'	    => date('Y-m-d H:i:s')
                        );

        $id = Purchases::insertGetId($add_data);

        if(!empty($request->size)){
            foreach ($request->size as $key => $value) {
                if($request->qty[$key]!= '' && $value!=''){
                    $product_data = array(
                                            'purchase_id'=>$id,
                                            'product_id'=>$request->product[$key],
                                            'size_id'   =>$value,
                                            'qty'       =>$request->qty[$key],
                                            'price'     =>$request->price[$key]
                                        );
                    PurchaseProduct::insertGetId($product_data);

                    $add_data = array(
                            'product_id'    => $request->product[$key],
                            'size_id'       => $value,
                            'qty'           => $request->qty[$key],
                            'type'          => 1,
                            'order_id'      => $id,
                            'description'   => 'Purchase (Bill No.'.$request->bill_no.')',
                            'created_at'    => date('Y-m-d H:i:s'),
                            'updated_at'    => date('Y-m-d H:i:s')
                        );

                    DB::table('product_stock_history')->insert($add_data);

                    $productSizeData = ProductSize::select('id','size_id','qty')->where('product_id',$request->product[$key])->where('size_id',$value)->get()->first();
                    if(!empty($productSizeData)){
                        
                        $update_data = array(
                                'qty'           => $productSizeData->qty + $request->qty[$key],
                                'updated_at'    => date('Y-m-d H:i:s')
                            );
                        ProductSize::where('product_id',$request->product[$key])->where('size_id',$value)->update($update_data);
                    }else{
                        $product_size = array(
                                            'product_id'=>$request->product[$key],
                                            'size_id'   =>$value,
                                            'qty'       =>$request->qty[$key]
                                        );
                        ProductSize::insertGetId($product_size);
                    }
                }
            }
        }
        
        return redirect()->route('purchase')->with('success', 'Added successfully.');
        
    }

    public function editPurchase(Request $request ,$id)
    {
        $id = base64_decode($id);

        $productList =Product::select('id','name','price')->where('status',1)->where('is_deleted','=',0)->get();
        $sizeList = Sizes::select('id','name')->where('status',1)->where('is_deleted','=',0)->get();
        $supplierList = Suppliers::select('id','name')->where('status',1)->where('is_deleted','=',0)->get();
        $purchaseDetail = DB::table('purchase')
        								->select('id','supplier_id','bill_no','bill_date','payment_type')
        								->where('id',$id)
        								->get()
        								->first();
        $purchaseDetail->allProduct = PurchaseProduct::select('id','product_id','size_id','qty','price')->where('purchase_id',$id)->get();
        
        return view('admin.purchase.purchase_edit',compact('purchaseDetail','id','productList','sizeList','supplierList'));
    }

    public function updatePurchase(Request $request ,$id)
    {
        $request->validate([
               
        ]);
       
        $update_data = array(
                                'supplier_id'       => isset($request->supplier_id)?$request->supplier_id:0,
                                'bill_no'           => $request->bill_no,
                                'bill_date'         => $request->bill_date,
                                'payment_type'      => $request->payment_type,
                                'updated_at'        => date('Y-m-d H:i:s')
                            );
        $update = Purchases::where('id',$id)->update($update_data);
        $bill_no = $request->bill_no;
        
        //PurchaseProduct::where('purchase_id',$id)->delete();
        if(!empty($request->size)){
            foreach ($request->size as $key => $value) {
                if($request->qty[$key]!= ''){
                    if($request->purchase_product_id[$key] != 0){
                        $update_data = array(
                                'qty'           => $request->qty[$key],
                                'updated_at'    => date('Y-m-d H:i:s')
                            );
                        PurchaseProduct::where('id',$request->purchase_product_id[$key])->update($update_data);
                        $old_qty = $request->old_qty[$key];

                        $note = 'Qty Updated in product Purchase bill';
                    }else{
                        $product_data = array(
                                            'purchase_id'=>$id,
                                            'product_id'=>$request->product[$key],
                                            'size_id'   =>$value,
                                            'qty'       =>$request->qty[$key],
                                            'price'     =>$request->price[$key]
                                        );
                        PurchaseProduct::insertGetId($product_data);
                        $note = 'Qty Added in product Purchase bill';
                        $old_qty = 0;
                    }
                    

                    $add_data = array(
                            'product_id'    => $request->product[$key],
                            'size_id'       => $value,
                            'qty'           => $request->qty[$key],
                            'type'          => 2,
                            'description'   => 'Purchase (Bill No.'.$bill_no.')',
                            'created_at'    => date('Y-m-d H:i:s'),
                            'updated_at'    => date('Y-m-d H:i:s')
                        );

                    DB::table('product_stock_history')->insert($add_data);

                    $productSizeData = ProductSize::select('id','size_id','qty')->where('product_id',$request->product[$key])->where('size_id',$value)->get()->first();
                    if(!empty($productSizeData)){
                        
                        $update_data = array(
                                'qty'           => $productSizeData->qty + $request->qty[$key] - $old_qty,
                                'updated_at'    => date('Y-m-d H:i:s')
                            );
                        ProductSize::where('product_id',$request->product[$key])->where('size_id',$value)->update($update_data);
                    }else{
                        $product_size = array(
                                            'product_id'=>$request->product[$key],
                                            'size_id'   =>$value,
                                            'qty'       =>$request->qty[$key]
                                        );
                        ProductSize::insertGetId($product_size);
                    }
                }
            }
        }

        return redirect()->route('purchase')->with('success', 'Product details updated successfully.');
    }

    public function purchaseDestroy($id)
    {
        $update_data = array(
                                'is_deleted' => 1,
                                'updated_at'    => date('Y-m-d H:i:s')
                            );

        $update = Purchases::where('id',$id)->update($update_data);

        $allProduct = PurchaseProduct::select('id','product_id')->where('purchase_id',$id)->get();
        foreach ($allProduct as $key => $value) {
            $this->removePurchaseProduct($value->id,'delete');
        }

        return redirect()->route('purchase')->with('success', 'Product removed successfully.');
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

        $update = Product::where('id',$id)->update($update_data);

        echo '1';
    }

    public function removePurchaseProduct($id,$type ='')
    {
        $productData = PurchaseProduct::select('id','product_id','size_id','qty','price')->where('id',$id)->get()->first();
        $productSizeData = ProductSize::select('id','size_id','qty')->where('product_id',$productData->product_id)->where('size_id',$productData->size_id)->get()->first();
        
        $update_data = array(
                                'qty'           => $productSizeData->qty - $productData->qty,
                                'updated_at'    => date('Y-m-d H:i:s')
                            );
        ProductSize::where('product_id',$productData->product_id)->where('size_id',$productData->size_id)->update($update_data);
        $description = 'Purchase';
        if($type!=''){
            $description = 'Delete Purchase ';
        }

        $add_data = array(
                            'product_id'    => $productData->product_id,
                            'size_id'       => $productData->size_id,
                            'qty'           => $productData->qty,
                            'type'          => 3,
                            'description'   => $description,
                            'created_at'    => date('Y-m-d H:i:s'),
                            'updated_at'    => date('Y-m-d H:i:s')
                        );

        DB::table('product_stock_history')->insert($add_data);

        PurchaseProduct::where('id',$id)->delete();
        echo '1';
    }

    public function allSize()
    {

        $sizeDetail = Sizes::select('id','name')
                                        ->where('status',1)
                                        ->where('is_deleted',0)
                                        ->get();
        return response()->json($sizeDetail, 200);
        
    }

    public function purchaseDetail($purchase_id)
    {

        $purchase_id = base64_decode($purchase_id);
      
       
        $purchaseDetail = DB::table('purchase')
                            ->join('suppliers', 'suppliers.id', '=', 'purchase.supplier_id')
                            ->select('purchase.id','purchase.bill_no','purchase.bill_date','purchase.payment_type','suppliers.name AS supplier_name')
                            ->where('purchase.id',$purchase_id)
                            ->get()
                            ->first();
                           

        $productList = DB::table('purchase_product')
                                            ->join('products', 'products.id', '=', 'purchase_product.product_id')
                                            ->join('colors', 'colors.id', '=', 'products.color_id')
                                            ->join('sizes', 'sizes.id', '=', 'purchase_product.size_id')
                                            ->select('purchase_product.id','product_id','size_id','products.name as product_name','sizes.name as size_name','qty','sku','purchase_product.price','products.image as product_image','colors.hex_code')
                                            ->where('purchase_id',$purchase_id)
                                            ->get();
                                           
        return view('admin.purchase.purchase_detail')->with('purchaseDetail', $purchaseDetail)->with('productList', $productList); 
    }
} 
