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
                <div class="col-md-3">
                  <h4 class="card-title">TRENDING PRODUCTS</h4>
                </div>
                <div class="col-md-9" style="text-align: right">

                  <form class="forms-sample" action="{{route('export.product.trending')}}" method="GET" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  <div class="row mobile-view-date-filter">
                     <div class="col-md-4" style="text-align: right">
                      <span>From: </span>
                      <input type="date" name="start_date" placeholder="mm/dd/yyyy" required>
                    </div>
                    <div class="col-md-4" style="text-align: right">
                      <span>To: </span>
                      <input type="date" name="end_date"  placeholder="mm/dd/yyyy" required>
                    </div>
                    <div class="col-md-4" style="text-align: right">
                      <button type="submit" class="btn btn-danger mr-2">Export</button>
                      <!-- <a href="{{route('add.product.trending')}}"   class="btn btn-success">Add New</a> -->
                    </div>
                  </div>
                  </form>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <div class="table-responsive">
                    <table id="order-listing" class="table">
                      <thead>
                        <tr>
                            <th>Sr. No #</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>SKU</th>
                            <th>Price</th>
                            <th>Color</th>
                            <th>Size/Qty</th>

                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        @if(count($productList))
                          @foreach($productList as $key => $product)
                            <tr>
                                <td>{{$key + 1}}</td>
                                <td>
                                 {{--  <img src="{{url('assets/upload_images/product')}}/thumb/{{$product->image}}"  style="width:50px;height: 50px;">  --}}
                                  <a class="fancybox" href="{{url('assets/upload_images/product')}}/{{$product->image}}"><img src="{{url('assets/upload_images/product')}}/thumb/{{$product->image}}"  style="width:50px;height: 50px;"> </a>
                                </td>
                                <td>{{$product->name}}</td>
                                <td>{{$product->sku}}</td>
                                <td>{{$product->price}}</td>
                                <td><p style="background: {{$product->hex_code}};height: 20px;width: 20px;"></p> </td>
                                <td>
                                  <?php 
                                    $qtyArr =  explode(',', $product->qty); 
                                    $sizeArr =  explode(',', $product->size_name);
                                    $finalStr = '';
                                    $comaCheck = 0;
                                    foreach ($sizeArr as $key => $value) {
                                      if($value!=''){
                                        if($comaCheck == 0){
                                          $finalStr .= $value.' - '.$qtyArr[$key];
                                          $comaCheck = 1;
                                        }else{
                                          $finalStr .= ','.$value.' - '.$qtyArr[$key]; 
                                        }
                                        
                                      }
                                    } 

                                    ?>
                                    {{$finalStr}}
                                </td>
                                <td><input id="status_{{$product->id}}" type="checkbox" <?php echo ($product->status == 1)?'Checked':'' ?> class="status" data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-style="ios"></td>
                                <td style="width: 180px;">
                                  {{-- <a href="{{route('edit.product.trending',base64_encode($product->id) )}}" class="btn btn-outline-primary">Edit</a> --}}
                                  <a href="{{route('edit.product.trending',base64_encode($product->id) )}}" data-toggle="tooltip" title="Edit"><i class="ti-pencil-alt" style="font-size: 2rem;"></i></a>
                                  <a onclick="showSwal({{$product->id}})" data-toggle="tooltip" title="Delete"><i class="ti-trash" style="font-size: 2rem;color: #007bfe;cursor: pointer;"></i></a>
                                  <a href="{{route('view.product.trending',base64_encode($product->id) )}}"><i class="ti-eye" style="font-size: 2rem;" data-toggle="tooltip" title="View"></i></a>
                                   @if($product->barcode !== null )
                                  <a href="{{route('print.product.trending',base64_encode($product->id) )}}" target="_blank" data-toggle="tooltip" title="Print"><i class="ti-printer" style="font-size: 2rem;"></i></a>
                                  @endif
                                </td>
                            </tr>
                          @endforeach
                        @else 
                          <tr><td colspan="8"><center>No Data Found</center></td></tr>
                        @endif
                      </tbody>
                    </table>                    
                  </div>
                </div>
              </div>
            </div>
          </div>

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

          <script>
            $(document).ready(function() {
              $('.fancybox').fancybox({
                  
                });
            });
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
                  url: "{{ route('status.product.trending') }}",
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
                      window.location.replace("{{url('admin')}}/product-destroy/"+id);
                    }else{
                      //console.log('out');
                    }
                })
              }
            })(jQuery);
          </script>
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
                </style>
@endsection