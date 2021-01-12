<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Product;
use App\Order;
use App\User;
use App\Suppliers;
use App\Purchases;
use App\Category;
use App\OrderDetail;
use Carbon\Carbon;


class HomeController extends Controller 
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
    public function adminErrors()
    {
      //dd("hhh");
     return view('errors.404_admin'); 
    }
    public function index()
    {
        $dailySalesCount = Order::whereDate('created_at', Carbon::today())->count();
       // dd($dailySalesCount);
        $totalSaleAmount = Order::where('is_deleted',0)->sum('totalamount');
        $totalOrderCount = Order::where('is_deleted',0)->count();
        $customersCount = User::where('status',1)->where('role_id','2')->where('is_deleted',0)->count();
        
        $suppliersCount = Suppliers::where('status',1)->where('is_deleted',0)->count();
        $productCount = Product::where('status',1)->where('is_deleted',0)->count();
        

        $users = DB::table('users')->select('id','name','email')->get();


       //pie chart show data
        $categories = Category::where('status',1)->where('is_deleted',0)->get();
          foreach ($categories as $catKey => $catValue) {
              $categories_pi_chart_datas[$catKey]['label'] = $catValue['name'];

        $productId = Product::where('category_id',$catValue['id'])->pluck('id');

        $categories_pi_chart_datas[$catKey]['value'] = $KurtiesProductIdCount = OrderDetail::whereIn('product_id',$productId)->count('product_id');

         }
       
        //Order Graph
        $orderGraphData =array();
        $month[0] = date('Y-m');
        $monthname[0] = date('F');

        $current_year = date('Y');
        $current_month = date('m');
        if ($current_year) {
          $current_month = date('m');
        }




        for ($i = 1; $i < $current_month; $i++) {
          $month[$i] = date('Y-m', strtotime("-$i month"));
          $monthname[$i] = date('F',strtotime("-$i month"));
        }

        if(!empty($month)){
          foreach ($month as $key => $value){
            $appordersgraph = Order::where('created_at','>=',$value.'-01')->where('created_at','<=',$value.'-29')->count();
            $orderGraphData[$key]['month'] = $monthname[$key];
            $orderGraphData[$key]['apporder'] = $appordersgraph;
          }
        }


        //Purchase Graph
        $purchaseGraphData =array();
        $month[0] = date('Y-m');
        $monthname[0] = date('F');

      $current_year = date('Y');
        $current_month = date('m');
        if ($current_year) {
          $current_month = date('m');
        }




        for ($i = 1; $i < $current_month; $i++) {
          $month[$i] = date('Y-m', strtotime("-$i month"));
          $monthname[$i] = date('F',strtotime("-$i month"));
        }

        if(!empty($month)){
          foreach ($month as $key => $value){
            $appordersgraph = Purchases::where('created_at','>=',$value.'-01')->where('created_at','<=',$value.'-29')->count();
            $purchaseGraphData[$key]['month'] = $monthname[$key];
            $purchaseGraphData[$key]['apporder'] = $appordersgraph;
          }
        }

        //Revenue Graph Data
        $revenueGraphData =array();
        $month[0] = date('Y-m');
        $monthname[0] = date('F');

        $current_year = date('Y');
        $current_month = date('m');
        if ($current_year) {
          $current_month = date('m');
        }




        for ($i = 1; $i < $current_month; $i++) {
          $month[$i] = date('Y-m', strtotime("-$i month"));
          $monthname[$i] = date('F',strtotime("-$i month"));
        }

        if(!empty($month)){
          foreach ($month as $key => $value){
            $appordersgraph = Order::where('created_at','>=',$value.'-01')->where('created_at','<=',$value.'-29')->sum('totalamount');
            $revenueGraphData[$key]['month'] = $monthname[$key];
            $revenueGraphData[$key]['apporder'] = $appordersgraph;
          }
        }
//dd("hii");
        return view('admin.dashboard.index',compact('users','dailySalesCount','productCount','customersCount','suppliersCount','totalSaleAmount','totalOrderCount','orderGraphData','purchaseGraphData','revenueGraphData','categories_pi_chart_datas')); 
    }
    public function orderYearAjax(Request $request){
    
      $order_year_value = $request->order_year_value;
     //Order Graph
        $orderGraphData =array();
        $month[0] = date('Y-m');
        $monthname[0] = date('F');

        $current_year = date('Y');
        $current_month = date('m');
        if ($current_year) {
          $current_month = date('m');
        }
        for ($i = 1; $i < $current_month; $i++) {
          $month[$i] = date('Y-m', strtotime("-$i month"));
          $monthname[$i] = date('F',strtotime("-$i month"));
        }

        if(!empty($month)){
          foreach ($month as $key => $value){
            $appordersgraph = Order::whereYear('created_at',$order_year_value)->where('created_at','>=',$value.'-01')->where('created_at','<=',$value.'-31')->count();
            $orderGraphData[$key]['month'] = $monthname[$key];
            $orderGraphData[$key]['apporder'] = $appordersgraph;
          }
        }

        
        return view('admin.ajax.ajax_order_graph',compact('orderGraphData'));

    }
     public function  purchaseYearAjax(Request $request){
    
      $order_year_value = $request->order_year_value;
    
        //Purchase Graph
        $purchaseGraphData =array();
        $month[0] = date('Y-m');
        $monthname[0] = date('F');

       $current_year = date('Y');
        $current_month = date('m');
        if ($current_year) {
          $current_month = date('m');
        }
        for ($i = 1; $i < $current_month; $i++) {
          $month[$i] = date('Y-m', strtotime("-$i month"));
          $monthname[$i] = date('F',strtotime("-$i month"));
        }

        if(!empty($month)){
          foreach ($month as $key => $value){
            $appordersgraph = Purchases::whereYear('created_at',$order_year_value)->where('created_at','>=',$value.'-01')->where('created_at','<=',$value.'-31')->count();
            $purchaseGraphData[$key]['month'] = $monthname[$key];
            $purchaseGraphData[$key]['apporder'] = $appordersgraph;
          }
        }

       
        
        return view('admin.ajax.ajax_purchase_graph',compact('purchaseGraphData'));

    }
     public function revenueYearAjax(Request $request){
    
      $order_year_value = $request->order_year_value;
    


        //Revenue Graph Data
        $revenueGraphData =array();
        $month[0] = date('Y-m');
        $monthname[0] = date('F');

        $current_year = date('Y');
        $current_month = date('m');
        if ($current_year) {
          $current_month = date('m');
        }
        for ($i = 1; $i < $current_month; $i++) {
          $month[$i] = date('Y-m', strtotime("-$i month"));
          $monthname[$i] = date('F',strtotime("-$i month"));
        }

        if(!empty($month)){
          foreach ($month as $key => $value){
            $appordersgraph = Order::whereYear('created_at',$order_year_value)->where('created_at','>=',$value.'-01')->where('created_at','<=',$value.'-31')->sum('totalamount');
            $revenueGraphData[$key]['month'] = $monthname[$key];
            $revenueGraphData[$key]['apporder'] = $appordersgraph;
          }
        }
        
        return view('admin.ajax.ajax_revenue_graph',compact('revenueGraphData'));

    }
    

} 
