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
                  <h4 class="card-title">CUSTOMERS DETAILS</h4>
                </div>
                <div class="col-md-9" style="text-align: right">

                  <form class="forms-sample" action="{{route('export.customer')}}" method="POST" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  <div class="row">
                    <div class="col-md-4" style="text-align: right">
                      <span>From:</span>
                      <input type="date" name="start_date">
                    </div>
                    <div class="col-md-4" style="text-align: right">
                      <span>To:</span>
                      <input type="date" name="end_date">
                    </div>
                    <div class="col-md-4" style="text-align: right">
                      <button type="submit" class="btn btn-danger mr-2">Export</button>
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
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone no</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @if(count($customers))
                          @foreach($customers as $key => $customer)
                            <tr>
                                <td>{{$key + 1}}</td>
                                <td>{{$customer->name}}</td>
                                <td>{{$customer->email}}</td>
                                <td>{{$customer->phone_number}}</td>
                                <td><input id="status_{{$customer->id}}" type="checkbox" <?php echo ($customer->status == 1)?'Checked':'' ?> class="status" data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-style="ios"></td>
                                <td>
                                  {{-- <a href="{{route('edit.customer',base64_encode($customer->id) )}}"><i class="ti-pencil-alt" style="font-size: 2rem;"></i></a> --}}
                                  <a onclick="showSwal({{$customer->id}})"><i class="ti-trash" style="font-size: 2rem;color: #007bfe;"></i></a>
                                </td>
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
                  url: "{{ route('status.customer') }}",
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
                      window.location.replace("{{url('admin')}}/customer-destroy/"+id);
                    }else{
                      //console.log('out');
                    }
                })
              }
            })(jQuery);
          </script>

@endsection