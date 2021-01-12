@extends('admin.layouts.admin')
@section('content')
@php $status = array('0' => 'Deleted','1' => 'Active','2' => 'In Active'); @endphp

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
                  <h4 class="card-title">COUPON LIST</h4>
                </div>
                <div class="col-md-6" style="text-align: right">
                  <a href="{{route('add.coupon')}}"   class="btn btn-success">Add New</a>
                 
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <div class="table-responsive">
                    <table id="order-listing" class="table">
                      <thead>
                        <tr>
                           <th>Sr No.</th>
                          <th>Name</th>
                          <th>Code</th>
                          <th>Discount %</th>
                          <th>Valid</th>
                          <th>Status</th>
                          <th>Usage</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @if(count($couponLists) > 0)
                        @foreach ($couponLists as $key => $couponList)
                        <tr>
                       <td>{{ $loop->iteration}}</td>
                            <td>{{ $couponList->name }}</td>
                            <td>{{ $couponList->code }}</td>
                           
                            <td>{{ $couponList->total == '' ? '-----' : $couponList->total  }}</td>
                           

                            <td>  {{ \Carbon\Carbon::parse($couponList->valid_form)->format('d-m-Y') }} to {{ \Carbon\Carbon::parse($couponList->valid_to)->format('d-m-Y') }}</td>

                                <td><input id="status_{{$couponList->id}}" type="checkbox" <?php echo ($couponList->status == 1)?'Checked':'' ?> class="status" data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-style="ios"></td>
                                 <td>{{$couponList['usage']}}  / {{$couponList['total_used']}} <!-- (Total available / Total used) --></td>
                                <td>
                                  
                                  <a href="{{route('edit-coupon',base64_encode($couponList->id) )}}" data-toggle="tooltip" title="Edit"><i class="ti-pencil-alt" style="font-size: 2rem;"></i></a>
                                  <a onclick="showSwal({{$couponList->id}})" data-toggle="tooltip" title="Delete"><i class="ti-trash" style="font-size: 2rem;color: #007bfe;cursor: pointer;"></i></a>
                                  
                                  <a href="{{route('view-coupon',base64_encode($couponList->id) )}}"><i class="ti-eye" style="font-size: 2rem;" data-toggle="tooltip" title="View"></i></a>
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
                  url: "{{ route('status.coupon') }}",
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
                      window.location.replace("{{url('admin')}}/coupon-destroy/"+id);
                    }else{
                      //console.log('out');
                    }
                })
              }
            })(jQuery);
          </script>

@endsection