@extends('admin.layouts.admin', ['pageTitle' => 'Add Category'])

@section('content')
<div class="row">
  <div class="col-md-12 d-flex align-items-stretch grid-margin">
    <div class="row flex-grow">
      
      <div class="col-12 stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">UPDATE BANNER</h4>
            {{-- <p class="card-description">
              Horizontal form layout
            </p> --}}
            <form class="forms-sample" action="{{route('update.testimonial',$id)}}" method="POST" enctype="multipart/form-data">
              {{ csrf_field() }}
              <div class="form-group row">
                <label for="name" class="col-sm-3 col-form-label">Name</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control" id="name" name="name" value="{{$testimonialDetail->name}}"  onkeyup="countChar(this)" maxlength="15" required>
                  <span id="nameLimit_name" style="color: red;">(15/15)</span>
                  @if ($errors->has('name'))
                    <span style="color: red">{{ $errors->first('name') }}</span>
                  @endif
                </div>
              </div>

              <div class="form-group row">
                <label for="description" class="col-sm-3 col-form-label">Description</label>
                <div class="col-sm-8">
                  
                  <textarea class="form-control" name="description" id="description" maxlength="120" onkeyup="countDesc(this)"  required>{{$testimonialDetail->description}}</textarea>
                  <span id="nameLimit_description" style="color: red;">(120/120)</span>
                  @if ($errors->has('description'))
                    <span style="color: red">{{ $errors->first('description') }}</span>
                  @endif
                </div>
              </div>
              <div class="form-group row">
                <label for="image" class="col-sm-3 col-form-label">Image</label>
                <div class="col-sm-4">
                  <input type="file" class="form-control" id="image" name="image" accept="image/*">
                  <p>(Size : 84x84)</p>
                  @if ($errors->has('image'))
                    <span style="color: red">{{ $errors->first('image') }}</span>
                  @endif
                </div>

                <div class="col-sm-4">
                 {{--  <img src="{{url('assets/upload_images/testimonial')}}/{{$testimonialDetail->image}}"  style="width:100px;height: 100px;">  --}}
                  <a class="fancybox" href="{{url('assets/upload_images/testimonial')}}/{{$testimonialDetail->image}}" data-fancybox-group="gallery"><img src="{{url('assets/upload_images/testimonial/thumb')}}/{{$testimonialDetail->image}}"  style="width:100px;height: 100px;"> </a>
                  
                </div>
              </div>

              <button type="submit" class="btn btn-success mr-2">Submit</button>
              <a href="{{route('testimonial')}}"   class="btn btn-light">Cancel</a>
            </form>
          </div>
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


</script>
<script type="text/javascript">
  $(document).ready(function() {
    var set_name = 15;
    var name = $('#name').val().length;
    var set_desc = 120;
    var description = $('#description').val().length;
    
    remain_name = parseInt(set_name - name);
    remain_desc = parseInt(set_desc - description);
    console.log(name);
    $('#nameLimit_name').text('('+remain_name+'/'+set_name+')');
    $('#nameLimit_description').text('('+remain_desc+'/'+set_desc+')');
    });
</script>
<script type="text/javascript">
  function countChar(val) {
    var id = val.id;
    var len = val.value.length;
    tlength = len,
    set = 15,
    remain = parseInt(set - tlength);

    if(remain > -1){
      $('#nameLimit_name').text('('+remain+'/'+set+')');
    }
    
  };

  function countDesc(val) {
    var id = val.id;
    var len = val.value.length;
    tlength = len,
    set = 120,
    remain = parseInt(set - tlength);

    if(remain > -1){
      $('#nameLimit_description').text('('+remain+'/'+set+')');
    }
    
  };
</script>
@endsection