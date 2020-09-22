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
use App\Coupon;
use PDF;
use Mail;
use Carbon\Carbon;


class TestCouponController extends Controller 
{
    /**
     * Create a Coupon Controller instance.
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
    public function couponlist()
    {

      $couponLists = Coupon::where('is_deleted','!=',1)
                ->get();

      return view('admin.coupon.coupon_list',compact('couponLists'));
    }

    public function addCoupon()
    {

      return view('admin.coupon.add_coupon');             
    }
     
   
    public function saveCoupon(Request $request)
    {
       
        $valid_form = Carbon::parse($request->valid_form)->format('Y/m/d');
        $valid_to = Carbon::parse($request->valid_to)->format('Y/m/d');

      $coupon = new Coupon;
      $coupon->name = $request->name;
      $coupon->code = $request->code;
      $coupon->total = $request->total;
      $coupon->valid_form = $valid_form;
      $coupon->valid_to = $valid_to;
      $coupon->usage = $request->usage;
     // $coupon->conditions = $request->conditions;
      $coupon->save();

      return redirect()->route('coupon-lists')->with('success', 'Coupon Successfully Added.');
     
    }

    public function editCoupon($id)
    {
      $id = base64_decode($id);
      $coupon = Coupon::where('id',$id)->first();

      return view('admin.coupon.edit_coupon',compact('coupon','id'));
    }
    public function viewCoupon($id)
    {
      $id = base64_decode($id);
      $coupon = Coupon::where('id',$id)->first();

      //view order
      $orderCouponData = Order::where('coupon_id',$id)->orderBy('id','DESC')->get();
     

      return view('admin.coupon.view_coupon',compact('coupon','id','orderCouponData'));
    }
    public function couponStatus(){
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

        $update = Coupon::where('id',$id)
        ->update($update_data);

        echo '1';
    }

    public function saveEditedCoupon(Request $request)
    {

       $date1 = date_create($request->valid_form);
       $valid_form_newDate = date_format($date1,"Y/m/d H:i:s");

       $date2 = date_create($request->valid_to);
       $valid_to_newDate = date_format($date2,"Y/m/d H:i:s");

      $coupon = Coupon::findOrFail($request->id);
      $coupon->name = $request->name;
      $coupon->code = $request->code;
      $coupon->total = $request->total;
      $coupon->valid_form = $valid_form_newDate;
      $coupon->valid_to = $valid_to_newDate;
      $coupon->usage = $request->usage;
      //$coupon->conditions = $request->conditions;
      $coupon->save();
     return redirect()->route('coupon-lists')->with('success', 'Coupon Successfully Update.');
    }

    public function couponDestroy($id)
    {

      if($id != ''){
        $cpn = Coupon::where('id',$id)->update(['is_deleted' => 1]);
          return redirect("admin/coupon-lists")->with('messages', [
              [
                  'type' => 'success',
                  'title' => 'Coupon',
                  'message' => 'Coupon Successfully Deleted.',
              ],
          ]); 
      } else {

        return redirect("admin/coupon-lists")->with('messages', [
              [
                  'type' => 'errors',
                  'title' => 'Coupon',
                  'message' => 'Something went wrong.',
              ],
          ]);   
      }
    }

    public function changeCouponStatus($cpn_id = null,$option_id = null)
    {

      $cpn = Coupon::where('id','=',$cpn_id)->update(['status' => $option_id]);
        if($cpn){
            echo "1";
        } else {
            echo "0";
        }
        exit;
    }

}