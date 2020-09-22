@extends('admin.layouts.admin', ['pageTitle' => 'Order Edit'])
@section('content')
@if (session('status'))
   <div class="alert alert-success" id="myElem">
      <strong>{{ session('status') }}</strong>
   </div>
@endif
<script type="text/javascript">
  $("#myElem").show();
setTimeout(function() { $("#myElem").hide(); }, 12000);
</script>
<div class="row">
  <div class="col-md-12 d-flex align-items-stretch grid-margin">
    <div class="row flex-grow">
      
      <div class="col-12 stretch-card">
        <div class="card">
          <div class="card-body">
            <script>
            function goBack() {
              window.history.back();
            }
            </script>
            <button onclick="goBack()" style="background: #00c292;color: #ffff!important;border: 0;border-radius: 3px;padding: 5px 20px;margin-bottom: 10px;">Go Back</button>
            <h4 class="card-title">UPDATE ORDER DETAILS</h4>
            @if(count($oderData))
            @foreach($oderData as $keyOderData => $OderDatas)
           <table width="100%" class="edit-order">
              <tbody>
                <tr>
                <td>Sr. No #</td>
                <td>Image</td>
                <td>Name</td>
                <td>Size</td>
                <td>Color</td>
                <td>Qty</td>
                <td>SKU</td>
                <td>Price</td>
                <!-- <td>Refund</td> -->
              </tr>
               
               @foreach($productDetail as $keyProduct_data => $product_data)
              
                        <tr>
                    <td>{{$keyProduct_data + 1}}</td>
                    <td><img src="{{asset('/assets/upload_images/product')}}/{{$product_data->getProduct['image'] }}" style="width: 100px!important;height: 100px!important;"></td>
                    <td>{{$product_data->getProduct['name'] }}</td>
                    
                       <td>{{$product_data['size_name'] }}</td>
                   
                    <td style="padding-left: 24px;"><p style="color:white;background:{{$product_data['hex_code'] }}!important;border: 1px solid #000;height: 15px;width: 15px;"></p></td>
                    <td>{{$product_data['qty'] }}</td>
                    <td>{{$product_data->getProduct['sku'] }}</td>
                    <td>₹{{$product_data['price'] * $product_data['qty'] }}</td>
                      <!-- <td>
                        <a href="{{route('refund.order',$OderDatas['id'])}}"> 
                          <i class="fa fa-times" style="font-size: 2rem;color: #007bfe;"></i></a>
                      </td> -->
                  </tr>
                   @endforeach
               
            </tbody>
           
          </table>
          <br>
          <br>
         <table width="45%" style="float:left;">
                                           
                                            <tbody>
                                              <tr>
                                              <td><b>Order Number</b></td>
                                              <td>{{$OderDatas['ordernumber']}}</td>
                                            </tr>
                                            <tr>
                                              <td><b>Payment Method</b></td>
                                              <td>Razorpay</td>
                                            </tr>   
                                            <tr>
                                              <td><b>Payment Status</b></td>
                                              
                                                 <!-- <td>Failed</td> -->
                                                 <td>Success</td>
                                             
                                            </tr> 
                                            <tr>
                                              <td><b>Current Order Status</b></td>
                                              <!-- PENDING   = 0 
                                              CONFIRM   = 1
                                              DISPATCH  = 2
                                              DELIVERED = 3  -->
                                              @if($OderDatas['status'] == 0)
                                                 <td>PENDING</td>
                                              @elseif($OderDatas['status'] == 1)
                                                 <td>CONFIRM</td>
                                              @elseif($OderDatas['status'] == 2)
                                                 <td>DISPATCH</td>
                                              @elseif($OderDatas['status'] == 3)
                                                 <td>DELIVERED</td>
                                              @endif
                                              
                                            </tr> 
                                            <tr>
                                              <td><b>Total Amount</b></td>
                                              <td>₹{{$OderDatas['totalamount']}}</td>
                                            </tr> 
                                            <tr>
                                              <td><b>Currency</b></td>
                                              <td>₹</td>
                                            </tr> 
                                            <tr>
                                              <td><b>Txn ID</b></td>
                                              <td>{{$oderData[$keyOderData]['PaymentHistoryData']['payment_id']}}</td>
                                            </tr> 

                                          </tbody>
                                         
                                          </table>
                                          <form class="forms-sample" action="{{route('update.order',$id)}}" method="POST" enctype="multipart/form-data">
                                          {{ csrf_field() }}
                                          <table width="45%" style="float:right;">
  
                                            <tbody><tr>
                                              <td><b>Order By</b></td>
                                              <td>
                                                {{$oderData[$keyOderData]['user_data']['name']}}
                                               </td>
                                            </tr> 
                                            <tr>
                                              <td><b>Contact</b></td>
                                              <td>
                                                {{$oderData[$keyOderData]['user_data']['phone_number']}}
                                               
                                              </td>
                                            </tr> 
                                            <tr>
                                              <td><b>Email</b></td>
                                              <td>
                                                {{$oderData[$keyOderData]['user_data']['email']}}
                                               
                                              </td>
                                            </tr> 
                                           
                                            <tr>
                                              <td><b>Shipping Address:</b></td>
                                              <td>
                                                    <b>Name :</b>
                                                    <input type="text" name="shipping_name_new" value="{{$oderData[$keyOderData]['address_data']['name']}}">
                                                     <br>
                                                    <b>Address Line 1 :</b>
                                                    <input type="text" name="address_line_one" value="{{$oderData[$keyOderData]['address_data']['address_line_one']}}">
                                                     <br>
                                                    <b>Address Line 2 :</b>
                                                     <input type="text" name="address_line_two" value="{{$oderData[$keyOderData]['address_data']['address_line_two']}}">
                                                     <br>
                                                    <b>Address Line 3 :</b> 
                                                    <input type="text" name="address_line_three" value="{{$oderData[$keyOderData]['address_data']['address_line_three']}}">
                                                    <br><br>
                                                    <b>City :</b>
                                                    <input type="text" name="city" value="{{$oderData[$keyOderData]['address_data']['city']}}">
                                                     <br>
                                                    <b>State :</b>
                                                    <input type="text" name="state" value="{{$oderData[$keyOderData]['address_data']['state']}}">
                                                     <br>
                                                    <b>Phone no :</b>
                                                    <input type="text" name="shippinig_phone_number" value="{{$oderData[$keyOderData]['address_data']['phone_number']}}">
                                                     
                                            </td>
                                            </tr> 
                                            <tr>
                                              <td colspan="2" style="text-align: left;">  <button type="submit" class="btn btn-success">Update Address</button>
                                              </td>
                                            </tr> 
                                             
                                          </tbody></table>
                                        </form>
                                          </div>
                                          
                                        </div>

                                      </div>
                                    </div>
                                   
                                  <!-- Show order data code end -->
                               
                                </td>
                               
                            </tr>
                          @endforeach
                        @else 
                          <tr><td colspan="3"><center>No Data Found</center></td></tr>
                        @endif
                      </tbody>
                    </table>                    
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="{{ asset('admin/vendors/select2/select2.min.js') }}"></script>
<script src="{{ asset('admin/js/select2.js') }}"></script>
<style type="text/css">
  table, tr, td {
    border: 1px solid #eee;
    
}
input[type="text"] {
    width: 100%;
    border: 1px solid #eee;
}
table.edit-order{
  text-align: center;
}
</style>
@endsection