<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Product;
use App\Order;
use App\OrderDetail;
use App\Useraddresses;
use App\ProductSize;
use App\PaymentHistory;
use App\User;
use Maatwebsite\Excel\Facades\Excel;
use App\Helpers\Exporter;

use PDF;
use Mail;


class OrderController extends Controller 
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
    public function orderIndex()
    {
         /* $apiKey = urlencode('8IQV4ZXumYQ-tOLYwsFk9H3PUHJW1BEaLI6tFMIjqM');
  
          // Message details
          $numbers = array(919574250320, 916355664902);
          $sender = urlencode('TXTLCL');
          $message = rawurlencode('This is your message2');
         
          $numbers = implode(',', $numbers);
         
          // Prepare data for POST request
          $data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender, "message" => $message);
         
          // Send the POST request with cURL
          $ch = curl_init('https://api.textlocal.in/send/');
          curl_setopt($ch, CURLOPT_POST, true);
          curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
          $response = curl_exec($ch);
          //dd($response);
          curl_close($ch);
          
          // Process your response here
          echo $response;


          // Account details
            $apiKey = urlencode('8IQV4ZXumYQ-tOLYwsFk9H3PUHJW1BEaLI6tFMIjqM');
           
            // Prepare data for POST request
            $data = array('apikey' => $apiKey);
           
            // Send the POST request with cURL
            $ch = curl_init('https://api.textlocal.in/balance/');
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($ch);
            curl_close($ch);
            
            // Process your response here
            echo $response;
            exit();*/









        $oderData = Order::where('is_deleted','0')->orderByDesc('id')->get();
        foreach ($oderData as $keyOderData => $valueOderData) {
           $oderData[$keyOderData] = $valueOderData;
           $user_data = User::where('id',$valueOderData->user_id)->first();
           $oderData[$keyOderData]['user_data'] = $user_data;

           $paymentHistoryData = PaymentHistory::where('user_id',$user_data['id'])->first();
           $oderData[$keyOderData]['PaymentHistoryData'] = $paymentHistoryData;

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
        /*echo "<pre>";
        print_r($oderData);
        die();
       */

       
        return view('admin.order.order_index')->with('oderData', $oderData); 
    }
      public function viewInvoice($id = null , Request $request)
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

    public function orderDestroy($id)
    {

        $shipping = Order::where('id',$id)->first();
        $update_data = array(
                          'is_deleted' => 1,
                          'updated_at'    => date('Y-m-d H:i:s')
                        );

        $update = Order::where('id',$id)->update($update_data);
        return redirect()->route('admin.order')->with('success', 'Order details removed successfully.');
    }
    public function orderStatus(Request $request)
    {
      /*$textlocal = new Textlocal('demo@txtlocal.com', 'apidemo123');

    $numbers = array(918123456789);
    $sender = 'Textlocal';
    $message = 'This is a message';*/

    
        extract($_POST);
        $update_data = array(
                            'status' => $request->status,
                            'updated_at'    => date('Y-m-d H:i:s')
                            );  
        $update = Order::where('id',$request->id[1])
        ->update($update_data);
        
        $user_id = Order::where('id',$request->id[1])->first();
        $user_data = User::where('id',$user_id->user_id)->first();
        
      $orderNumberGet = Order::where('id',$request->id[1])->first();

      $order_detail_product_id = OrderDetail::where('order_id',$orderNumberGet->id)->pluck('product_id');

      //mail data
      $oderData = Order::where('is_deleted','0')->where('id',$orderNumberGet->id)->get();
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
        
        $productDetail = OrderDetail::where('order_id',$orderNumberGet->id)->get();





       //text local sms send to mobile code  
       $apiKey = urlencode('8IQV4ZXumYQ-tOLYwsFk9H3PUHJW1BEaLI6tFMIjqM');
  
  
        //confirm order mail send
        if ($request->status == 0) {
        // Message details
          $mobileNo = "91".$user_data['phone_number'];
          $numbers = array($mobileNo); /*array(919574250320, 916355664902);*/
          $sender = urlencode('TXTLCL');
          $message = rawurlencode('Your order is pendding');
          $numbers = implode(',', $numbers);
          // Prepare data for POST request
          $data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender, "message" => $message);


           //mail send
             Mail::send(['html'=>'email.order_pendding_mail'],['user_data'=>$user_data],function($message) use ($user_data){
                      $message->to($user_data->email)->subject('Pendding order');
                      $message->from('info@poboxfashion.com','pobox');
                  });
        }
        if ($request->status == 1) {

          
    // dd($user_data['phone_number']);
         // Message details
          $mobileNo = "91".$user_data['phone_number'];
          $numbers = array($mobileNo);  /*array(919574250320, 916355664902);*/
          $sender = urlencode('TXTLCL');
          $productData = Product::whereIn('id',$order_detail_product_id)->first();
          //$messageText = 'You ' .$orderNumberGet->ordernumber. ' for ' .$productData->name. ' with pobox is confirmed' ;  
           $messageText = "Hi ".$user_data['name']. " your order number " .$orderNumberGet->ordernumber. " for " .$productData['name']. " with pobox is confirmed";
          
          $message = rawurlencode($messageText);

          $numbers = implode(',', $numbers);
          // Prepare data for POST request
          $data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender, "message" => $message);

          //mail send
          /*$user_data['user_name'] =$user_data['name'];
          $user_data['ordernumber'] =$orderNumberGet->ordernumber;
          $user_data['product_name'] =$productData['name'];
          Mail::send(['html'=>'email.order_confirm_mail'],['user_data'=>$user_data],function($message) use ($user_data){
                      $message->to($user_data->email)->subject('Confirm order');
                      $message->from('info@poboxfashion.com','pobox');
                  });*/
               //mail send
          

  $pdf = PDF::loadView('email.order_confirm_mail', ['oderData' => $oderData , 'productDetail' => $productDetail]);
      
          
          Mail::send(['html'=>'email.order_confirm_mail'],['oderData' => $oderData , 'productDetail' => $productDetail] ,function($message) use ($user_data,$pdf){
                      $message->to($user_data['email'])->subject('Your order has been confirmed-po box')
                      ->attachData($pdf->output(), "invoice.pdf");
                      $message->from('info@poboxfashion.com','pobox');

                  });






        }
        if ($request->status == 2) {
         // Message details
          $mobileNo = "91".$user_data['phone_number'];
          $numbers = array($mobileNo);  /*array(919574250320, 916355664902);*/
          $sender = urlencode('TXTLCL');
          $productData = Product::whereIn('id',$order_detail_product_id)->first();
          //$messageText = 'You ' .$orderNumberGet->ordernumber. ' for ' .$productData->name. ' with pobox is dispatch' ; 
           $messageText = "Hi ".$user_data['name']. " your order number " .$orderNumberGet->ordernumber. " for " .$productData['name']. " with pobox is dispatch"; 
          
          $message = rawurlencode($messageText);
          $numbers = implode(',', $numbers);
          // Prepare data for POST request
          $data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender, "message" => $message);
          
          //mail send
         /*  $user_data['user_name'] =$user_data['name'];
          $user_data['ordernumber'] =$orderNumberGet->ordernumber;
          $user_data['product_name'] =$productData['name'];

             Mail::send(['html'=>'email.order_dispatch_mail'],['user_data'=>$user_data],function($message) use ($user_data){
                      $message->to($user_data->email)->subject('Dispatch order');
                      $message->from('info@poboxfashion.com','pobox');
                  });*/

                 //  $pdf = PDF::loadView('email.order_dispatch_mail', ['oderData' => $oderData , 'productDetail' => $productDetail]);
      
          
          Mail::send(['html'=>'email.order_dispatch_mail'],['oderData' => $oderData , 'productDetail' => $productDetail] ,function($message) use ($user_data){
                      $message->to($user_data['email'])->subject('Dispatch order');
                      $message->from('info@poboxfashion.com','pobox');

                  });
        }
        if ($request->status == 3) {
          // Message details
          $mobileNo = "91".$user_data['phone_number'];
          $numbers = array($mobileNo);
          $sender = urlencode('TXTLCL');
           $productData = Product::whereIn('id',$order_detail_product_id)->first();
          //$messageText = 'You ' .$orderNumberGet->ordernumber. ' for ' .$productData->name. ' with pobox is delivered' ;
          $messageText = "Hi ".$user_data['name']. " your order number " .$orderNumberGet->ordernumber. " for " .$productData['name']. " with pobox is delivered";  
          
          $message = rawurlencode($messageText);
          $numbers = implode(',', $numbers);
          // Prepare data for POST request
          $data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender, "message" => $message);
          
          //mail send
          /*$user_data['user_name'] =$user_data['name'];
          $user_data['ordernumber'] =$orderNumberGet->ordernumber;
          $user_data['product_name'] =$productData['name'];
             Mail::send(['html'=>'email.order_delivered_mail'],['user_data'=>$user_data],function($message) use ($user_data){
                      $message->to($user_data->email)->subject('Delivered  order');
                      $message->from('info@poboxfashion.com','pobox');
                  });*/
                   $pdf = PDF::loadView('email.order_delivered_mail', ['oderData' => $oderData , 'productDetail' => $productDetail]);
      
          
          Mail::send(['html'=>'email.order_delivered_mail'],['oderData' => $oderData , 'productDetail' => $productDetail] ,function($message) use ($user_data,$pdf){
                      $message->to($user_data['email'])->subject('Delivered  order')
                      ->attachData($pdf->output(), "invoice.pdf");
                      $message->from('info@poboxfashion.com','pobox');

                  });
        } 

         // Send the POST request with cURL
          $ch = curl_init('https://api.textlocal.in/send/');
          curl_setopt($ch, CURLOPT_POST, true);
          curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
          $response = curl_exec($ch);
          //dd($response);
          curl_close($ch);
          
          // Process your response here
          echo $response;

        

        echo '1';

    }
    public function editOrder(Request $request,$id){
      $oderData = Order::where('id',$id)->where('is_deleted','0')->orderByDesc('id')->get();
        foreach ($oderData as $keyOderData => $valueOderData) {
           $oderData[$keyOderData] = $valueOderData;
           $user_data = User::where('id',$valueOderData->user_id)->first();
           $oderData[$keyOderData]['user_data'] = $user_data;

           $paymentHistoryData = PaymentHistory::where('user_id',$user_data->id)->first();
           $oderData[$keyOderData]['PaymentHistoryData'] = $paymentHistoryData;

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
           $productDetail = OrderDetail::where('order_id',$id)->get();

        $oderData[$keyOderData]['product_data']= $proData;
            
           
        }
         return view('admin.order.order_edit',compact('oderData','id','productDetail'));
    }
    public function viewOrder(Request $request,$id){

      $oderData = Order::where('id',$id)->where('is_deleted','0')->orderByDesc('id')->get();
        foreach ($oderData as $keyOderData => $valueOderData) {
           $oderData[$keyOderData] = $valueOderData;
           $user_data = User::where('id',$valueOderData->user_id)->first();
           $oderData[$keyOderData]['user_data'] = $user_data;

           $paymentHistoryData = PaymentHistory::where('user_id',$user_data->id)->first();
           $oderData[$keyOderData]['PaymentHistoryData'] = $paymentHistoryData;

           $address_data = Useraddresses::where('id',$valueOderData->address_id)->first();
           $oderData[$keyOderData]['address_data'] = $address_data;

           $order_detail_product_id = OrderDetail::where('order_id',$valueOderData->id)->pluck('product_id');
          // dd($order_detail_product_id);
           $productData = Product::whereIn('id',$order_detail_product_id)->get();
           foreach ($productData as $keyProductData => $valueProductData) {
            $proData[$keyProductData]= $valueProductData;
            
              $OrderDetailData[$keyProductData]= OrderDetail::where('order_id',$valueOderData->id)->where('product_id',$valueProductData->id)->first();
             foreach ($OrderDetailData as $key => $value) {
               $proData[$key]['order_detail_data']= $value;
              
              }
           }
           $productDetail = OrderDetail::where('order_id',$id)->get();


        $oderData[$keyOderData]['product_data']= $proData;


            
           
        }
         return view('admin.order.order_view',compact('oderData','id','productDetail'));
    }

    public function export( Request $request ) 
    {
        
        $columns = array(
                        '0'=>'Sr No',
                        '1'=>'Date',
                        '2'=>'Order Number',
                        '3'=>'order by',
                        '4'=>'Amount',
                        '5'=>'Payment By',
                        '6'=>'Txn id',
                        '7'=>'Status',
                    );
        if($request->start_date != '' && $request->end_date){
            $orders = DB::table('order')
                          ->join('users', 'users.id', '=', 'order.user_id')
                          ->join('paymenthistory', 'order.id', '=', 'paymenthistory.order_id')
                          ->select('order.id','users.name','order.user_id','coupon_code','users.name','coupon_amount','ordernumber','totalamount','gstAmount','saveAmount','bag_total','order.status','paymenthistory.payment_id','order.created_at')
                            ->whereDate('order.created_at', '>=', $request->start_date)
                            ->whereDate('order.created_at', '<=', $request->end_date)
                            ->orderByDesc('order.id')->get();
                            
        }else{
            $orders = DB::table('order')
                          ->join('users', 'users.id', '=', 'order.user_id')
                          ->join('paymenthistory', 'order.id', '=', 'paymenthistory.order_id')
                          ->select('order.id','users.name','order.user_id','coupon_code','users.name','coupon_amount','ordernumber','totalamount','gstAmount','saveAmount','bag_total','order.status','paymenthistory.payment_id','order.created_at')
                          ->orderByDesc('id')->get();
        }

        
        //
        
        $final_data = array();
        
        foreach ($orders as $key => $order) {
            if($order->status == 0){
                $status = 'Pending';
            }elseif ($order->status == 1) {
              $status = 'Confirm';
            }elseif ($order->status == 2) {
              $status = 'Dispatch';
            }else{
                $status = 'Delivered';
            }
            $final_data[] = array(
                            '0'=>$key + 1,
                            '1'=>date('d-m-Y', strtotime($order->created_at)),
                            '2'=>$order->ordernumber,
                            '3'=>$order->name,
                            '4'=>$order->totalamount,
                            '5'=>'Razorpay',
                            '6'=>$order->payment_id,
                            '7'=>$status
                        );  
            
        }
        
        return Excel::download(new Exporter($final_data, $columns), 'order.xlsx');
        
    }

    public function updateOrder(Request $request,$id){
      $user_id = Order::where('id',$id)->pluck('user_id');
      
      /* $user_email_update = User::where('id',$user_id[0])->update([
        'name'=> $request->user_name,
        'phone_number'=> $request->phone_number,
        'email'=> $request->email
      ]);*/
     
      $UseraddressesUpdate = Useraddresses::where('user_id',$user_id[0])->update([
        'name'=> $request->shipping_name_new,
        'phone_number'=> $request->shippinig_phone_number,
        'address_line_one'=> $request->address_line_one,
        'address_line_two'=> $request->address_line_two,
        'address_line_three'=> $request->address_line_three,
        'city'=> $request->city,
        'state'=> $request->state
      ]);
      return redirect()->back()->with('status','Order details updated successfully');
      
         //return redirect()->back();
    }
    public function refundOrder(Request $request , $id)
    {
        dd($id);
    }
}