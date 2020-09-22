@extends('admin.layouts.admin')

@section('content')

<link rel="stylesheet" href="{{ asset('admin/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}" />
<div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-md-6">
                  <h4 class="card-title">Customer Inquiry Details</h4>
                </div>
                <!-- <div class="col-md-6" style="text-align: right">
                  <a href=""   class="btn btn-info">Add New</a>
                </div> -->
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
                            <th>Phone</th>
                            <th>Message</th>
                            <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        @if(count($contactUsData))
                          @foreach($contactUsData as $key => $contactUs)
                            <tr>
                                <td>{{$key + 1}}</td>
                                <td>{{$contactUs->name}}</td>
                                <td>{{$contactUs->email}}</td>
                                <td>{{$contactUs->phone_number}}</td>
                                <td>{{$contactUs->contact_message}}</td>
                                <td>
                                 
                                  <a onclick="showSwal({{$contactUs->id}})"><i class="ti-trash" style="font-size: 2rem;color: #007bfe;"></i></a>
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
                      window.location.replace("{{url('admin')}}/contact_us-destroy/"+id);
                    }else{
                      //console.log('out');
                    }
                })
              }
            })(jQuery);
          </script>

@endsection