@extends('admin.layouts.admin')

@section('content')
<div id="result"></div>
<div id="shipment_addd"><span></span></div>
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
option:disabled {
    background: lightgray!important;
}
option:disabled selected {
    background: lightgray!important;
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
                  <div class="row mobile-view-date-filter">
                    <div class="col-md-4" style="text-align: right">
                      <span>From:</span>
                
                      <input type="date" name="start_date" placeholder="mm/dd/yyyy" required>
                    </div>
                    <div class="col-md-4" style="text-align: right">
                      <span>To: </span>
                      <input type="date" name="end_date" placeholder="mm/dd/yyyy" required>
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
                            <th>GST</th>
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
                                <td>₹{{$OderDatas->gstAmount}}</td>
                                <td>Razorpay</td>
                                <td>
                                 @if(isset($oderData[$keyOderData]['PaymentHistoryData']['payment_id']))
                                  {{$oderData[$keyOderData]['PaymentHistoryData']['payment_id']}}
                                  
                                  @endif
                                            </td>
                                <td>
                                   <select class="orderStatus" id="status_{{$OderDatas->id}}">
                                   <?php if ($OderDatas->status == 1) { ?>
                                          <option value="1" disabled <?php if ($OderDatas->status == 1) {echo  'selected'; } ?>
                                          >CONFIRM</option>
                                          <option value="2" <?php if ($OderDatas->status == 2) {echo  'selected'; } ?>>DISPATCH</option>
                                          <option value="3" <?php if ($OderDatas->status == 3) {echo  'selected'; } ?>>DELIVERED</option>
                                   <?php } ?>

                                   <?php if ($OderDatas->status == 2) { ?>
                                        <option value="1" disabled <?php if ($OderDatas->status == 1) {echo  'selected'; } ?>
                                        >CONFIRM</option>
                                        <option value="2" disabled <?php if ($OderDatas->status == 2) {echo  'selected'; } ?>>DISPATCH</option>
                                        <option value="3" <?php if ($OderDatas->status == 3) {echo  'selected'; } ?>>DELIVERED</option>
                                    <?php } ?>


                                    <?php if ($OderDatas->status == 3) { ?>
                                        <option value="1" disabled <?php if ($OderDatas->status == 1) {echo  'selected'; } ?>
                                        >CONFIRM</option>
                                        <option value="2" disabled <?php if ($OderDatas->status == 2) {echo  'selected'; } ?>>DISPATCH</option>
                                        <option value="3" <?php if ($OderDatas->status == 3) {echo  'selected'; } ?>>DELIVERED</option>
                                    <?php } ?>




                                     
                                        
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
                                
                                <td style="min-width: 180px;">
                                 
                                 
                                  <a href="{{route('edit.order',$OderDatas->id)}}" data-toggle="tooltip" title="Edit"><i class="ti-pencil-alt" style="font-size: 2rem;"></i></a>
                                  <a onclick="showSwal({{$OderDatas->id}})" data-toggle="tooltip" title="Delete"><i class="ti-trash" style="font-size: 2rem;color: #007bfe;cursor: pointer;"></i></a>
                                  <a href="{{route('view.order',$OderDatas->id)}}" data-toggle="tooltip" title="View"><i class="ti-eye" style="font-size: 2rem;"></i></a>
                                  <a href="" id="myBtn_{{$OderDatas->id}}" data-toggle="modal" data-target="#myModal_{{$OderDatas->id}}" data-toggle="tooltip" title="Shipping"><i class="ti-truck" style="font-size: 2rem;"></i></a>
                                   <a href="{{route('admin.viewInvoice',$OderDatas->id)}}"><i class="fa fa-files-o" style="font-size: 2rem;" data-toggle="tooltip" title="View Invoice"></i></a>


                                  <!-- Show order data code start -->
                                  <!-- The Modal -->
                                    <div id="myModal_{{$OderDatas->id}}" class="modal fade" role="dialog">
                                      <div class="modal-dialog modal-lg" style="width: 600px;">

                                        <!-- Modal content-->
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h4 class="modal-title">Shipping Details</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                          </div>
                                          <form class="form-horizontal form-label-left" method="post">
                                            {{ csrf_field() }}  
                                          <div class="modal-body">
                                            <div class="row">
                                              <div class="col-md-2 col-sm-2 col-xs-2" style="padding-left: 0;">
                                                <label style="margin: 12px;">Description</label> 
                                              </div>

                                              <div class="col-md-10 col-sm-10 col-xs-10">
                                                <!-- <input id="description_{{$OderDatas->id}}" class="form-control col-md-7 col-xs-12" name="description_{{$OderDatas->id}}" placeholder="Description"  required="required" type="text" maxlength="160"> -->
                                                <textarea id="description_{{$OderDatas->id}}" class="form-control col-md-7 col-xs-12" name="description_{{$OderDatas->id}}" placeholder="Description"  required="required" type="text" maxlength="160"></textarea>
                                                <input type="hidden" id="orderid_{{$OderDatas->id}}" value="{{$OderDatas->id}}">
                                              </div>
                                            </div>
                                          </div>
                                        </form>
                                          <div class="modal-footer">
                                            <button type="button" class="btn btn-success submit_shipping" id="submit_{{$OderDatas->id}}" style="line-height: 2.2;">Submit</button>
                                            <button type="button" class="btn btn-default" data-dismiss="modal" style="line-height: 2.2;">Close</button>
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

          <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg">

              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Order Details</h4>
                </div>
                <div class="modal-body" id="modaldata">
                  
                </div>
                <div class="modal-footer" style="margin-top: 300px;">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
              </div>

            </div>
          </div>


<style type="text/css">
  .modal .modal-dialog .modal-content .modal-header {
    padding: 10px 26px!important;
}
.modal-header .close {
    margin: -13px -18px -25px auto!important;
}
</style>

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

          <script type="text/javascript">
              $(".submit_shipping").click(function( event ) {
                event.preventDefault();
                var shipping_data = this.id;
                var result = shipping_data.split('_');
                console.log(result);
                var order_id = $('#orderid_'+result[1]).val();
                var description = $('#description_'+result[1]).val();
                console.log(result[1]);
                console.log(order_id);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                  data: {'order_id':order_id,'description':description},
                  url: "{{ route('shipment.order') }}",
                  type: "POST",
                  dataType: 'json',
                  success: function (data) {
                     $("#result").html('<div class="alert alert-success"><button type="button" class="close">×</button>Shipping details submitted successfully</div>');
                 window.setTimeout(function() {
                    $(".alert").fadeTo(500, 0).slideUp(500, function(){
                        $(this).remove(); 
                    });
                 }, 5000);
                 $('.alert .close').on("click", function(e){
                    $(this).parent().fadeTo(500, 0).slideUp(500);
                 });
                    
                    $('#description_'+result[1]).val('');
                    $('#myModal_'+result[1]).modal('hide');
                  },
                  error: function (data) {
                      
                  }
              });

              
             }); 

             $(".sendshipment").on("click",function(){
               var address_id = $(this).attr('data-value');
                $.ajax({
                      type: "get",
                      url: '/admin/getUserAddress/'+address_id,
                      success:function(data){
                        $(".to_name").val(data.name);
                        $(".to_address").val(data.street_1);  
                        $(".to_city").val(data.city);
                        $(".to_state").val(data.state);
                        $(".to_country").val(data.country);
                        $(".to_zipcode").val(data.zipcode);
                        $(".to_phone").val(data.phone);
                      }
                  });
             }); 
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
 <style type="text/css">
                  input[type="date"]::before {
                  color: #999999;
                  content: attr(placeholder);
                }
                input[type="date"] {
                  color: #ffffff;
                }

                input[type="date"]:valid {
                  color: #666666;
                }
                input[type="date"]:valid::before {
                  content: "" !important;
                }
                input[type="date"] {
                  width: 163px;
                  padding: 0px 10px 0px 10px;
              }
              @media only screen and (max-width: 768px){
                 .row.mobile-view-date-filter span {
                      float: left;
                      margin-top: 15px;
                  }
                  select#category_name_filter {
                      margin-bottom: 10px;
                  }
              }
              .modal-dialog.modal-lg {
    width: auto !important;
}
                </style>
@endsection