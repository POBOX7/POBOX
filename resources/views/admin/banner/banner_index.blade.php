@extends('admin.layouts.admin')

@section('content')

<link rel="stylesheet" href="{{ asset('admin/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}" />
<div class="card">
  <div class="card-body">
    <div class="row">
      <div class="col-md-6">
        <h4 class="card-title">BANNERS DETAILS</h4>
      </div>
      <div class="col-md-6" style="text-align: right">
        <a href="{{route('add.banner')}}"   class="btn btn-success">Add New</a>
      </div>
    </div>
    
    <div class="row">
      <div class="col-12">
        <div class="table-responsive">
          <table id="order-listing" class="table">
            <thead>
              <tr>
                  <th>Sr. No #</th>
                  <th>Page</th>
                  <th>Image</th>
                  <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              @if(count($banners))
                @foreach($banners as $key => $banner)
                  <tr>
                      <td>{{$key + 1}}</td>
                      <td>
                        @if($banner->page_id == 1)
                        Home Page
                        @elseif($banner->page_id == 2 )
                          New Arrival
                        @elseif($banner->page_id == 3 )
                          Trending
                        @elseif($banner->page_id == 4 )
                          Kurties
                        @elseif($banner->page_id == 5 )
                          Kurta set
                         @elseif($banner->page_id == 6 )
                          Dress
                          @elseif($banner->page_id == 7 )
                          User profile
                          @elseif($banner->page_id == 8 )
                          Blog
                          @elseif($banner->page_id == 9 )
                          Contact Us
                        @endif
                        
                      </td>
                      <td>
                        {{-- <img src="{{url('assets/upload_images/banner')}}/thumb/{{$banner->image}}"  style="width:100px;height: 100px;">  --}}
                        <a class="fancybox" href="{{url('assets/upload_images/banner')}}/{{$banner->image}}"><img src="{{url('assets/upload_images/banner')}}/thumb/{{$banner->image}}"  style="width:100px;height: 100px;"> </a>
                      </td>
                      <td>
                        {{-- <a href="{{route('edit.banner',base64_encode($banner->id) )}}" class="btn btn-outline-primary">Edit</a> --}}
                        <a href="{{route('edit.banner',base64_encode($banner->id) )}}"><i class="ti-pencil-alt" style="font-size: 2rem;"></i></a>
                        <a onclick="showSwal({{$banner->id}})"><i class="ti-trash" style="font-size: 2rem;color: #007bfe;"></i></a>
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
  
  <script type="text/javascript">
    $(document).ready(function() {
      $('.fancybox').fancybox({
          
        });
    });
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
              window.location.replace("{{url('admin')}}/banner-destroy/"+id);
            }else{
              //console.log('out');
            }
        })
      }
    })(jQuery);
  </script>

@endsection