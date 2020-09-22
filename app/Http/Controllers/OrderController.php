<?php
namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Product;
use App\Review;
use App\Category;
use App\ProductImage;
use App\Brands;
use App\Sizes;
use App\ProductSize;
use App\Wishlist;
use App\Colors;
use App\Order;
use App\OrderDetail;
use App\Banners;
use App\SizeInformation;
use Illuminate\Support\Facades\DB;
use Session;
use Auth;
use App\User;
use App\Useraddresses;
use PDF;
class OrderController extends Controller {

  public function order(Request $request){
    
	if(Auth::check())
	{
		$userorders = Order::where('user_id',auth()->user()->id)->orderBy('id','desc')->paginate(10);
	
	}
	return view('order.order',compact('userorders'));
  }
  public function orderDetail($id){ 
  
    $order = Order::find($id);
    $orderDetails = OrderDetail::where('order_id',$order->id)->get();
    return view('order.order.order_detail',compact('orderDetails','order'));
  }
   public function orderSummary(Request $request){ 
    return view('order.order_summary');
  }
  public function orderStatus($id){ 
  
    $order = Order::find($id);
 
    if($order)
	{
	  if($order->status == 0)
	  {
		$order->status=1;
		$order->save();
		return redirect()->route('order')->with('status','Order Cancel..!');
	  }	
	}
	else
	{
		return redirect()->back()->with('status','No Order Found..!');
	}	
  }
  
  public function viewInvoice($id , Request $request)
     {
        $oderData = Order::where('is_deleted','0')->where('id',$request->id)->get();
        foreach ($oderData as $keyOderData => $valueOderData) {
           $oderData[$keyOderData] = $valueOderData;
           $user_data = User::where('id',$valueOderData->user_id)->first();
           $oderData[$keyOderData]['user_data'] = $user_data;

           $address_data = Useraddresses::where('id',$valueOderData->address_id)->first();
           $oderData[$keyOderData]['address_data'] = $address_data;

           $order_detail_product_id = OrderDetail::where('order_id',$valueOderData->id)->pluck('product_id');
           $productData = Product::whereIn('id',$order_detail_product_id)->get();
           foreach ($productData as $keyProductData => $valueProductData) {
            $proData[$keyProductData]= $valueProductData;
            
              $OrderDetailData[$keyProductData]= OrderDetail::where('order_id',$valueOderData->id)->where('product_id',$valueProductData->id)->first();
             foreach ($OrderDetailData as $key => $value) {
               $proData[$key]['order_detail_data']= $value;
              
              }
           }

        $oderData[$keyOderData]['product_data']= $proData;
        }
        $productDetail = OrderDetail::where('order_id',$id)->get();
        $pdf = PDF::loadView('admin.order.download_invoice',compact('oderData','productDetail')); 
        return $pdf->stream('invoice.pdf');
        //return $pdf->download('invoice.pdf');
    }
}
