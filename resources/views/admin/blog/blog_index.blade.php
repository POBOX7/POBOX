@extends('admin.layouts.admin')

@section('content')

<link rel="stylesheet" href="{{ asset('admin/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}" />
<div class="card">
            <div class="card-body">
              <div class="row">
                
                <div class="col-md-6">
                  <h4 class="card-title">BLOG DETAILS</h4>
                </div>
                <div class="col-md-6" style="text-align: right">
                  <a href="{{route('add.blog')}}"   class="btn btn-success">Add New</a>
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
                            <th>Created date</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Author</th>
                            <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        @if(count($blogs))
                          @foreach($blogs as $key => $blog)
                            <tr>
                                <td>{{$key + 1}}</td>
                                <td><img src="{{url('assets/upload_images/blog')}}/{{$blog->blog_image}}"  style="width:100px;height: 100px;">  </td>
                                <td style="width: 73px;"><?php $date = date_create($blog->blog_date);
                                      $newDate = date_format($date,"d-m-Y"); ?> {{$newDate}}</td>
                                <td>{{$blog->blog_title}}</td>
                                <td>{{$blog->post_category}}</td>
                                
                                <td>{!! $blog->author !!}</td>
                                <td style="width: 113px;">
                                   <a href="{{route('view.blog_comment',base64_encode($blog->id) )}}" data-toggle="tooltip" title="View"><i class="ti-eye" style="font-size: 2rem;color: #007bfe;"></i></a>
                                  <a href="{{route('edit.blog',base64_encode($blog->id) )}}" data-toggle="tooltip" title="Edit"><i class="ti-pencil-alt" style="font-size: 2rem;"></i></a>
                                  <a onclick="showSwal({{$blog->id}})" data-toggle="tooltip" title="Delete"><i class="ti-trash" style="font-size: 2rem;color: #007bfe;cursor: pointer;"></i></a>
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
                      window.location.replace("{{url('admin')}}/blog-destroy/"+id);
                    }else{
                      //console.log('out');
                    }
                })
              }
            })(jQuery);
          </script>

@endsection