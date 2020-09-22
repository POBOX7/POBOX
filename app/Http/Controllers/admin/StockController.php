<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Product;

class StockController extends Controller 
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
        $productList = DB::table('product_size')
                            ->join('products', 'products.id', '=', 'product_size.product_id')
                            ->join('sizes', 'sizes.id', '=', 'product_size.size_id')
                            ->select('sizes.name AS size_name','products.name','products.image AS product_image','qty','product_size.id','products.id AS product_id','sizes.id AS size_id')
                            // ->where('product_size.is_deleted','0')
                            ->orderByDesc('products.id')
                            ->get();
        return view('admin.stock.stock_index')->with('productList', $productList); 
    }

    public function history($product_id,$size_id)
    {
        $size_id = base64_decode($size_id);
        $product_id = base64_decode($product_id);
        $productDetail = DB::table('product_size')
                            ->join('products', 'products.id', '=', 'product_size.product_id')
                            ->join('sizes', 'sizes.id', '=', 'product_size.size_id')
                            ->select('sizes.name AS size_name','products.name','qty')
                            ->where('size_id',$size_id)
                            ->where('product_id',$product_id)
                            ->get()
                            ->first();
        $productList = DB::table('product_stock_history')
                            ->select('qty','type','description','order_id','created_at')
                            ->where('size_id',$size_id)
                            ->where('product_id',$product_id)
                            ->orderByDesc('id')
                            ->get();

        return view('admin.stock.stock_history')->with('productList', $productList)->with('productDetail', $productDetail); 
    }

    
}