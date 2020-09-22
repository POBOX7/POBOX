@extends('admin.layouts.admin')

@section('content')

<link rel="stylesheet" href="{{ asset('admin/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}" />
<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">
<style>
  .toggle-group label{
    top: 8px;
  }
  .modal-body table,.modal-body tr,.modal-body td,.modal-body tbody{
    border: 1px solid #ddd8d8;
  }
  .table th img, .jsgrid .jsgrid-table th img, .table td img, .jsgrid .jsgrid-table td img {
    width: 100px!important;
    height: 100px!important;
     border-radius: unset!important; 
}
</style>
<div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-md-3">
                  <h4 class="card-title">ORDER LIST</h4>
                </div>
                <div class="col-md-9" style="text-align: right">

                  <form class="forms-sample" action="{{route('export.order')}}" method="GET" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  <div class="row">
                    <div class="col-md-4" style="text-align: right">
                      <span>From:</span>
                      <input type="date" name="start_date">
                    </div>
                    <div class="col-md-4" style="text-align: right">
                      <span>To: </span>
                      <input type="date" name="end_date">
                    </div>
                    <div class="col-md-4" style="text-align: right">
                      <button type="submit" class="btn btn-danger mr-2">Export</button>
                    </div>
                  </div>
                  </form>
                </div>
                <!-- <div class="col-md-6" style="text-align: right">
                  <a href=""   class="btn btn-success">Add New</a>
                </div> -->
              </div>
              <div class="row">
                <div class="col-12">
                  <div class="table-responsive">
                    <table id="order-listing" class="table">
                      <thead>
                        <tr>
                            <th>Sr. No #</th>
                            <th>Date</th>
                            <th>Order Number</th>
                            <th>Order By</th>
                            <th>Amount</th>
                            <th>Payment By</th>
                            <th>Txn Id</th>
                            <th>Current Status</th>

                            <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        @if(count($oderData))
                          @foreach($oderData as $keyOderData => $OderDatas)
                            <tr>
                                <td>{{$keyOderData + 1}}</td>
                                <td>{{date('d-m-Y', strtotime($OderDatas->created_at)) }}</td>
                                <td>{{$OderDatas->ordernumber}}</td>
                                <td>{{$oderData[$keyOderData]['user_data']['name']}}</td>
                                <td>₹{{$OderDatas->totalamount}}</td>
                                <td>Razorpay</td>
                                <td>{{$oderData[$keyOderData]['PaymentHistoryData']['payment_id']}}</td>
                                <td>
                                   <select class="orderStatus" id="status_{{$OderDatas->id}}">
                                       <!--  <option value="0" <?php //if ($OderDatas->status == 0) {echo  'selected'; } ?>>PENDING</option> -->
                                        <option value="1" <?php if ($OderDatas->status == 1) {echo  'selected'; } ?>
                                        >CONFIRM</option>
                                        <option value="2" <?php if ($OderDatas->status == 2) {echo  'selected'; } ?>>DISPATCH</option>
                                       <!--  <option value="4">OUT FOR DELIVERY</option> -->
                                        <option value="3" <?php if ($OderDatas->status == 3) {echo  'selected'; } ?>>DELIVERED</option>
                                    </select>
                                    <script type="text/javascript">
                                      var lastValue;
                                      $("#status_{{$OderDatas->id}}").bind("click", function(e){
                                          lastValue = $(this).val();
                                      }).bind("change", function(e){
                                          changeConfirmation = confirm("Are you sure? You won't be able to revert this!");
                                          if (changeConfirmation) {
                                              // Proceed as planned
                                          } else {
                                              $(this).val(lastValue);
                                          }
                                      });
                                    </script>
                                </td>
                                
                                <td>
                                 
                                 
                                  <a href="{{route('edit.order',$OderDatas->id)}}"><i class="ti-pencil-alt" style="font-size: 2rem;"></i></a>
                                

                                 <a onclick="showSwal({{$OderDatas->id}})"><i class="ti-trash" style="font-size: 2rem;color: #007bfe;"></i></a>
                              <a href="{{route('view.order',$OderDatas->id)}}"><i class="ti-eye" style="font-size: 2rem;"></i></a>
                                  <!-- <a href="" id="myBtn_{{$OderDatas->id}}" data-toggle="modal" data-target="#myModal_{{$OderDatas->id}}"><i class="ti-eye" style="font-size: 2rem;"></i></a> -->
                                   <a href="{{route('admin.viewInvoice',$OderDatas->id)}}"><i class="fa fa-files-o" style="font-size: 2rem;"></i></a>


                                  <!-- Show order data code start -->
                                  <!-- The Modal -->
                                    <div id="myModal_{{$OderDatas->id}}" class="modal fade" role="dialog">
                                      <div class="modal-dialog modal-lg">

                                        <!-- Modal content-->
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h4 class="modal-title">Order Details</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            
                                          </div>
                                          <div class="modal-body">
                                    
                                            
                                            <table width="100%">
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
                                              </tr>
                                               
                                               @foreach($oderData[$keyOderData]['product_data'] as $keyProduct_data => $product_data)
                                              
                                                        <tr>
                                                    <td>{{$keyOderData + 1 }}</td>
                                                    <td><img src="{{asset('../assets/upload_images/product')}}/{{$product_data['image'] }}" width="50%"></td>
                                                    <td>{{$product_data['name'] }}</td>
                                                    
                                                       <td>{{$product_data['order_detail_data']['size_name'] }}</td>
                                                   
                                                    <td><p style="color:white;background:{{$product_data['order_detail_data']['hex_code'] }}!important;border: 1px solid #000;height: 15px;width: 15px;"></p></td>
                                                    <td>{{$product_data['order_detail_data']['qty'] }}</td>
                                                    <td>{{$product_data['sku'] }}</td>
                                                    <td>{{$product_data['price'] * $product_data['order_detail_data']['qty'] }}</td>
                                                  </tr>
                                                   @endforeach
                                               
                                            </tbody>
                                           
                                          </table>

                                          <br>
                                          <br>
                                          <div style="overflow-x:auto;">
                                          <!-- <table width="100%">
                                            <tbody><tr>
                                              <td>Shipment ID</td>
                                              <td>Tracking Code</td>
                                              <td>Tracking Url</td>
                                              <td>Tracking Label</td>
                                            </tr>

                                                    <tr>
                                                  <td>shp_9e026e4060e94b01a7f05432997b0a22</td>
                                                  <td>9400136897846112054998</td>
                                                  <td><a href="https://track.easypost.com/djE6dHJrXzNiYWQ1Yjg1OGYxNTRmYWFhMWE1MmMyYmFmMzYyNjYw" class="btn btn-success" target="_blank">Tracking URL</a></td>
                                                  <td><a href="https://easypost-files.s3-us-west-2.amazonaws.com/files/postage_label/20171007/a8c20a8aa4a5441aa88af72ab738e4be.png" class="btn btn-success" target="_blank">View Tracking Label</a></td>
                                                </tr>
                                                
                                           
                                          </tbody>
                                        </table>
                                        
                                        <br>
                                        <br> -->
                                          </div>

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
                                              <td>{{$OderDatas['totalamount']}}</td>
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
                                          <table width="45%" style="float:right;">
  
                                            <tbody><tr>
                                              <td><b>Order By</b></td>
                                              <td>{{$oderData[$keyOderData]['user_data']['name']}}</td>
                                            </tr> 
                                            <tr>
                                              <td><b>Contact</b></td>
                                              <td>{{$oderData[$keyOderData]['user_data']['phone_number']}}</td>
                                            </tr> 
                                            <tr>
                                              <td><b>Email</b></td>
                                              <td>{{$oderData[$keyOderData]['user_data']['email']}}</td>
                                            </tr> 
                                           
                                            <tr>
                                              <td><b>Shipping Address:</b></td>
                                              <td>
                                                    <b>Name :</b> {{$oderData[$keyOderData]['address_data']['name']}}<br>
                                                    <b>Address Line 1 :</b> {{$oderData[$keyOderData]['address_data']['address_line_one']}}<br>
                                                    <b>Address Line 2 :</b> {{$oderData[$keyOderData]['address_data']['address_line_two']}}<br>
                                                    <b>Address Line 3 :</b> {{$oderData[$keyOderData]['address_data']['address_line_three']}}<br><br>
                                                    <b>City :</b> {{$oderData[$keyOderData]['address_data']['city']}}<br>
                                                    <b>State :</b> {{$oderData[$keyOderData]['address_data']['state']}}<br>
                                                    <b>Phone no :</b> {{$oderData[$keyOderData]['address_data']['phone_number']}}
                                            </td>
                                            </tr>  
                                             
                                          </tbody></table>
                                          </div>
                                          <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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





         <script>

            $(function() {
              $("select.orderStatus").change(function(){
                var status = $(this).children("option:selected").val();
                //alert(status);
                var id = $(this).attr('id').split('_');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                  data: {'id':id,'status':status},
                  url: "{{ route('status.order') }}",
                  type: "POST",
                  dataType: 'json',
                  success: function (data) {
                      
                  },
                  error: function (data) {
                      
                  }
              });
              })
            })
          </script>
          
          <script type="text/javascript">
            (function($) {
              showSwal = function(id){
                  swal({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonshippings: '#3085d6',
                    cancelButtonshippings: '#d33',
                    confirmButtonText: 'Yes, I am sure! '
                  }).then(function (isConfirm) {
                    if (isConfirm) {
                      window.location.replace("{{url('admin')}}/order-destroy/"+id);
                    }else{
                      //console.log('out');
                    }
                })
              }
            })(jQuery);
          </script>

           <script type="text/javascript" src="{{ asset('assets/fancybox/lib/jquery.mousewheel.pack.js?v=3.1.3') }}"></script>

<!-- Add fancyBox main JS and CSS files -->
<script type="text/javascript" src="{{ asset('assets/fancybox/source/jquery.fancybox.pack.js?v=2.1.5') }}"></script>
<link rel="stylesheet" type="text/css" href="{{ asset('assets/fancybox/source/jquery.fancybox.css?v=2.1.5') }}" media="screen" />

<!-- Add Button helper (this is optional) -->
<link rel="stylesheet" type="text/css" href="{{ asset('assets/fancybox/source/helpers/jquery.fancybox-buttons.css?v=1.0.5') }}" />
<script type="text/javascript" src="{{ asset('assets/fancybox/source/helpers/jquery.fancybox-buttons.js?v=1.0.5') }}"></script>

<!-- Add Thumbnail helper (this is optional) -->
<link rel="stylesheet" type="text/css" href="{{ asset('assets/fancybox/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7') }}" />
<script type="text/javascript" src="{{ asset('assets/fancybox/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7') }}"></script>

<!-- Add Media helper (this is optional) -->
<script type="text/javascript" src="{{ asset('assets/fancybox/source/helpers/jquery.fancybox-media.js?v=1.0.6') }}"></script>

@endsection