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
</style>
<div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-md-6">
                  <h4 class="card-title">PURCHASE DETAILS</h4>
                </div>
              </div>

              <div class="row form-group">
                  <label class="col-form-label col-md-2">Supplier Name :</label>
                  <input type="text" class="form-control col-md-2" value="{{$purchaseDetail->supplier_name}}" readonly>

                  <label class="col-form-label col-md-1" style="text-align: right;">Bill No :</label>
                  <input type="text" class="form-control col-md-1" value="{{$purchaseDetail->bill_no}}" readonly>

                  <label class="col-form-label col-md-1" style="text-align: right;">Bill Date:</label>
                  <input type="text" class="form-control col-md-1" value="{{$purchaseDetail->bill_date}}" readonly>
                  <label class="col-form-label col-md-2" style="text-align: right;">Payment type:</label>
                  <input type="text" class="form-control col-md-1" value="{{$purchaseDetail->payment_type == 1 ? 'Cash' : 'Credit'}}" readonly>
              </div>

                
              <div class="row">
                <div class="col-12">
                  <div class="table-responsive">
                    <table id="order-listing" class="table">
                      <thead>
                        <tr>
                            <th>Sr. No #</th>
                            <th>Product name</th>
                            <th>Image</th>
                            <th>Color</th>
                            <th>SKU</th>
                            <th>Size</th>
                            <th>Qty</th>
                            <th>price</th>
                            
                        </tr>
                      </thead>
                      <tbody>
                        @if(count($productList))
                          @foreach($productList as $key => $product)
                            <tr>
                                <td>{{$key + 1}}</td>
                                <td>{{$product->product_name}}</td>
                                <td><img src="{{url('assets/upload_images/product')}}/thumb/{{$product->product_image}}"  style="width:50px;height: 50px;"></td>
                                <td><p style="background: {{$product->hex_code}};height: 20px;width: 20px;"></p></td>
                                <td>{{$product->sku}}</td>
                                <td>{{$product->size_name}}</td>
                                <td>{{$product->qty}}</td>
                                <td>{{$product->price}}</td>
                                
                            </tr>
                          @endforeach
                        @else 
                          <tr><td colspan="5"><center>No Data Found</center></td></tr>
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
              $('.status').change(function() {
                var status = $(this).prop('checked');
                var id = $(this).attr('id').split('_');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                  data: {'id':id['1'],'status':status},
                  url: "{{ route('status.brand') }}",
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
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, I am sure! '
                  }).then(function (isConfirm) {
                    if (isConfirm) {
                      window.location.replace("{{url('admin')}}/brand-destroy/"+id);
                    }else{
                      //console.log('out');
                    }
                })
              }
            })(jQuery);
          </script>

@endsection