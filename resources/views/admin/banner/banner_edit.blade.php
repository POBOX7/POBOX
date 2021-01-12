@extends('admin.layouts.admin', ['pageTitle' => 'Add Category'])

@section('content')
<center><div id="result"></div></center>
<link rel="stylesheet" href="{{ asset('assets/imagecrop/imgareaselect.css') }}">

  <!-- Add mousewheel plugin (this is optional) -->
  
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
            <form class="forms-sample" action="{{route('update.banner',$id)}}" method="POST" enctype="multipart/form-data">
              {{ csrf_field() }}
              
              <div class="form-group row">
                <label for="page_id" class="col-sm-3 col-form-label">Page</label>
                <div class="col-sm-4">
                	<select class="form-control" id="page" name="page_id" style="width:100%">
	                  	<option value="1" <?php echo ($bannerDetail->page_id == 1)?'selected':'' ?>>Home Page</option>
	                  	<option value="2" <?php echo ($bannerDetail->page_id == 2)?'selected':'' ?>>New arrival Page</option>
	                  	<!-- <option value="3" <?php echo ($bannerDetail->page_id == 3)?'selected':'' ?>>Trending Page</option>
	                  	<option value="4" <?php echo ($bannerDetail->page_id == 4)?'selected':'' ?>>Kurties Page</option>
	                  	<option value="5" <?php echo ($bannerDetail->page_id == 5)?'selected':'' ?>>Kurta Set Page</option>
	                  	<option value="6" <?php echo ($bannerDetail->page_id == 6)?'selected':'' ?>>Dress Page</option>
                      <option value="7" <?php echo ($bannerDetail->page_id == 7)?'selected':'' ?>>User profile Page</option>
                      <option value="8" <?php echo ($bannerDetail->page_id == 8)?'selected':'' ?>>Blog Page</option>

                      <option value="9" <?php echo ($bannerDetail->page_id == 9)?'selected':'' ?>>Contact Us Page</option>
                       <option value="10" <?php echo ($bannerDetail->page_id == 10)?'selected':'' ?>>Size Guide</option> -->
                  	</select>
                  @if ($errors->has('page_id'))
                    <span style="color: red">{{ $errors->first('page_id') }}</span>
                  @endif
                </div>
              </div>

              <div class="form-group row">
                <label for="image" class="col-sm-3 col-form-label">Image</label>
                <div class="col-sm-4">
                  <input type="file" class="form-control image-file" id="image" name="image" accept="image/*">
                  <div class="result"></div>
                  (Size : 1425x813)
                  @if ($errors->has('image'))
                    <span style="color: red">{{ $errors->first('image') }}</span>
                  @endif
                </div>

                <div class="col-sm-4">
                  
                  <a class="fancybox" href="{{url('assets/upload_images/banner')}}/{{$bannerDetail->image}}" data-fancybox-group="gallery"><img src="{{url('assets/upload_images/banner')}}/{{$bannerDetail->image}}"  style="width:200px;height: 100px;"> </a>
                </div>
              </div>

              <div class="form-group row">
                <div class="col-sm-12">
                  <img id="previewimage" style="display:none;width: 100%;"/>
                </div>
              </div>

              <input type="hidden" name="x1" value="" />
              <input type="hidden" name="y1" value="" />
              <input type="hidden" name="w" value="" />
              <input type="hidden" name="h" value="" />

              <div class="form-group row">
                <label for="url" class="col-sm-3 col-form-label">URL</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control" id="url" name="url" value="{{$bannerDetail->url}}">
                  @if ($errors->has('url'))
                    <span style="color: red">{{ $errors->first('url') }}</span>
                  @endif
                </div>
              </div>

              
              <button type="submit" id="submit" class="btn btn-success mr-2">Submit</button>
              <a href="{{route('banner')}}"   class="btn btn-light">Cancel</a>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="{{ asset('assets/imagecrop/jquery.imgareaselect.js') }}"></script>
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
    jQuery(function($) {
        $('.fancybox').fancybox({
          prevEffect : 'none',
          nextEffect : 'none'
        });
        var p = $("#previewimage");
        /*$("body").on("change", "#image", function(){

            var imageReader = new FileReader();
            imageReader.readAsDataURL(document.querySelector("#image").files[0]);

            imageReader.onload = function (oFREvent) {
                p.attr('src', oFREvent.target.result).fadeIn();
            };
        });

        $('#previewimage').imgAreaSelect({aspectRatio: '2:1',
            onSelectEnd: function (img, selection) {
                $('input[name="x1"]').val(selection.x1);
                $('input[name="y1"]').val(selection.y1);
                $('input[name="w"]').val(selection.width);
                $('input[name="h"]').val(selection.height);            
            }
        });*/
    });
</script>

@endsection