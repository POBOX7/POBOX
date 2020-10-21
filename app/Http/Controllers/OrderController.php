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
use App\Orderbillingaddresses;
use App\Banners;
use App\SizeInformation;
use Illuminate\Support\Facades\DB;
use Session;
use Auth;
use App\User;
use App\Useraddresses;
use PDF;
use App\OrderShipment;
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
    $oderShipmentData = OrderShipment::where('order_id',$id)->orderByDesc('id')->get();
    return view('order.order.order_detail',compact('orderDetails','order','oderShipmentData'));
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
        $billAddress = array();
        foreach ($oderData as $key => $value) {
          if($value->bill_address == 'New'){
            $billAddress = Orderbillingaddresses::where('order_id',$value->id)->first();
          }
        }
        
        $productDetail = OrderDetail::where('order_id',$id)->get();
        $pdf = PDF::loadView('admin.order.download_invoice',compact('oderData','productDetail','billAddress')); 
        return $pdf->stream('invoice.pdf');
        //return $pdf->download('invoice.pdf');
    }
}
