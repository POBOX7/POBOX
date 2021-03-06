@extends('admin.layouts.admin', ['pageTitle' => 'Add Category'])

@section('content')
<center><div id="result"></div></center>
<div class="row">
  <div class="col-md-12 d-flex align-items-stretch grid-margin">
    <div class="row flex-grow">
      
      <div class="col-12 stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">UPDATE CATEGORY DETAILS</h4>
            {{-- <p class="card-description">
              Horizontal form layout
            </p> --}}
            <form class="forms-sample" action="{{route('update.category',$id)}}" method="POST" enctype="multipart/form-data">
              {{ csrf_field() }}

              <div class="form-group row">
                <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Name</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{$categoryDetail->name}}" onkeyup="countChar(this)" maxlength="20" required>
                  <span id="nameLimit" style="color: red;">(20/20)</span>
                  @if ($errors->has('name'))
                    <span style="color: red">{{ $errors->first('name') }}</span>
                  @endif
                </div>
              </div>

              <div class="form-group row">
                <label for="image" class="col-sm-3 col-form-label">Image</label>
                <div class="col-sm-4">
                  <input type="file" class="form-control image-file" id="type" name="image" accept="image/*">
                  <div class="result"></div>
                  <p>(Size : 380x555)</p>
                  @if ($errors->has('image'))
                    <span style="color: red">{{ $errors->first('image') }}</span>
                  @endif
                </div>

                <div class="col-sm-4">
                 {{--  <img src="{{url('assets/upload_images/category')}}/thumb/{{$categoryDetail->image}}"  style="width:100px;height: 100px;">  --}}
                 <a class="fancybox" href="{{url('assets/upload_images/category')}}/{{$categoryDetail->image}}" data-fancybox-group="gallery"><img src="{{url('assets/upload_images/category/thumb')}}/{{$categoryDetail->image}}"  style="width:100px;height: 100px;"> </a>
                </div>
              </div>

              <button type="submit" id="submit" class="btn btn-success mr-2">Submit</button>
              <a href="{{route('category')}}"   class="btn btn-light">Cancel</a>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="{{ asset('admin/vendors/select2/select2.min.js') }}"></script>
<script src="{{ asset('admin/js/select2.js') }}"></script>
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
    
    var name = $('#name').val();
    var len = name.length;
    tlength = len,
    set = 20,
    remain = parseInt(set - tlength);
    $('#nameLimit').text('('+remain+'/'+set+')');
    });
</script>
<script type="text/javascript">
  function countChar(val) {
    var len = val.value.length;
    tlength = len,
    set = 20,
    remain = parseInt(set - tlength);
    $('#nameLimit').text('('+remain+'/'+set+')');
  };

</script>

@endsection