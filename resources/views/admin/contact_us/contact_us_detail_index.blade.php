@extends('admin.layouts.admin')

@section('content')

<link rel="stylesheet" href="{{ asset('admin/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}" />
<div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-md-6">
                  <h4 class="card-title">Contact Details </h4>
                </div>
                <!-- contactUsDetailData -->
              </div>
              <div class="row">
                <div class="col-12">
                  <div class="table-responsive">
                    <table  class="table">
                      <thead>
                        <tr>
                            <th>Sr. No #</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>Address</th>
                            <th>Facebook Link</th>
                            <th>Twitter Link</th>
                            <th>Linkedin</th>
                            <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        @if(count($contactUsDetailData))
                          @foreach($contactUsDetailData as $key => $contactUsDetail)
                            <tr>
                                <td>{{$key + 1}}</td>
                                <td>{{$contactUsDetail->email}}</td>
                                 <td>{{$contactUsDetail->phone_number}}</td>
                                 <td>{{$contactUsDetail->address}}</td>
                                 <td>{{$contactUsDetail->facebook_link}}</td>
                                 <td>{{$contactUsDetail->twitter_link}}</td>
                                 <td>{{$contactUsDetail->linkedin_link}}</td>
                                 
                                <td>
                                 
                                  <a href="{{route('edit.contact_us_detail',base64_encode($contactUsDetail->id) )}}"><i class="ti-pencil-alt" style="font-size: 2rem;"></i></a>
                                  <!-- <a onclick="showSwal({{$contactUsDetail->id}})"><i class="ti-trash" style="font-size: 2rem;color: #007bfe;"></i></a> -->
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
                      window.location.replace("{{url('admin')}}/contact_us_detail-destroy/"+id);
                    }else{
                      //console.log('out');
                    }
                })
              }
            })(jQuery);
          </script>

@endsection