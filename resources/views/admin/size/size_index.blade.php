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
                  <h4 class="card-title">SIZE DETAILS</h4>
                </div>
                <div class="col-md-6" style="text-align: right">
                  <a href="{{route('add.size')}}"   class="btn btn-success">Add New</a>
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
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        @if(count($sizes))
                          @foreach($sizes as $key => $size)
                            <tr>
                                <td>{{$key + 1}}</td>
                                <td>{{$size->name}}</td>
                                <td><input id="status_{{$size->id}}" type="checkbox" <?php echo ($size->status == 1)?'Checked':'' ?> class="status" data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-style="ios"></td>
                                <td>
                                  <a href="{{route('edit.size',base64_encode($size->id) )}}" data-toggle="tooltip" title="Edit"><i class="ti-pencil-alt" style="font-size: 2rem;"></i></a>
                                  <a onclick="showSwal({{$size->id}})"><i class="ti-trash" style="font-size: 2rem;color: #007bfe;cursor: pointer;" data-toggle="tooltip" title="Delete"></i></a>
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
                  url: "{{ route('status.size') }}",
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
                      window.location.replace("{{url('admin')}}/size-destroy/"+id);
                    }else{
                      //console.log('out');
                    }
                })
              }
            })(jQuery);
          </script>

@endsection