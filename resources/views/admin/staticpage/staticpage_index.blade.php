@extends('admin.layouts.admin')

@section('content')

<link rel="stylesheet" href="{{ asset('admin/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}" />
<div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-md-6">
                  <h4 class="card-title">PAGES DETAILS</h4>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <div class="table-responsive">
                    <table id="order-listing" class="table">
                      <thead>
                        <tr>
                            <th>Sr. No #</th>
                            <th>Title</th>
                            {{-- <th>Content</th> --}}
                            <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        @if(count($staticPages))
                          @foreach($staticPages as $key => $staticPage)
                            <tr>
                                <td>{{$key + 1}}</td>
                                <td>{{$staticPage->title}}</td>
                                {{-- <td>{!! $staticPage->content !!}</td> --}}
                                <td>
                                  <a href="{{route('edit.static-pages',base64_encode($staticPage->id) )}}"><i class="ti-pencil-alt" style="font-size: 2rem;"></i></a>
                                  <a href="{{route('view.static-pages',base64_encode($staticPage->id) )}}" style="margin-left: 15px;"><i class="icon icon-eye" style="font-size: 2rem;"></i></a>
                                  {{-- <a onclick="showSwal({{$staticPage->id}})"><i class="ti-trash" style="font-size: 2rem;color: #007bfe;"></i></a> --}}
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
                      window.location.replace("https://pw.rethinksoft.com/public/admin/static-pages-destroy/"+id);
                    }else{
                      //console.log('out');
                    }
                })
              }
            })(jQuery);
          </script>

@endsection