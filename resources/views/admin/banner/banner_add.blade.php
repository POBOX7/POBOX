@extends('admin.layouts.admin', ['pageTitle' => 'Add Category'])

@section('content')
<center><div id="result"></div></center>
<link rel="stylesheet" href="{{ asset('assets/imagecrop/imgareaselect.css') }}">
<div class="row">
  <div class="col-md-12 d-flex align-items-stretch grid-margin">
    <div class="row flex-grow">
      
      <div class="col-12 stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">ADD NEW BANNER DETAILS</h4>
            {{-- <p class="card-description">
              Horizontal form layout
            </p> --}}
            <form class="forms-sample" action="{{route('store.banner')}}" method="POST" enctype="multipart/form-data">
              {{ csrf_field() }}
              <div class="form-group row">
                <label for="page_id" class="col-sm-3 col-form-label">Page</label>
                <div class="col-sm-4">
                  
                  
                    

                  <select class="form-control" id="page" name="page_id" style="width:100%">

                      <option value="1">Home Page</option>
                     
                      @if(is_null($bannerPageNewArrival))
                        <option value="2">New arrival Page</option>
                      @endif
                     <!--  @if(is_null($bannerPageTrending))
                        <option value="3">Trending Page</option>
                      @endif
                      @if(is_null($bannerPageKurties))
                        <option value="4">Kurties Page</option>
                      @endif
                      @if(is_null($bannerPageKurtaSet))
                        <option value="5">Kurta Set Page</option>
                      @endif
                      @if(is_null($bannerPageDress))
                        <option value="6" >Dress Page</option>
                      @endif
                      @if(is_null($bannerPageMyAccount))
                      <option value="7">My account</option>
                      @endif
                      @if(is_null($bannerPageBlog))
                      <option value="8">Blog</option>
                      @endif
                      @if(is_null($bannerPageContactUs))
                      <option value="9">Contact Us</option>
                       @endif
                      @if(is_null($bannerPageSizeGuide))
                      <option value="10">Size Guide</option>
                       @endif -->
                     
                    </select>
                  @if ($errors->has('page_id'))
                    <span style="color: red">{{ $errors->first('page_id') }}</span>
                  @endif
                </div>
              </div>

             

              <div class="form-group row">
                <label for="image" class="col-sm-3 col-form-label">Image</label>

                <div class="col-sm-4">
                  <input type="file" class="form-control image-file" id="image" name="image" accept="image/*" required>
                  <div class="result"></div>
                  (Size : 1425x813)
                  @if ($errors->has('image'))
                    <span style="color: red">{{ $errors->first('image') }}</span>
                  @endif
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
                  <input type="text" class="form-control" id="url" name="url" placeholder="">
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

<script>
    jQuery(function($) {

        var p = $("#previewimage");
        /*$("body").on("change", "#image", function(){

            var imageReader = new FileReader();
            imageReader.readAsDataURL(document.querySelector("#image").files[0]);

            imageReader.onload = function (oFREvent) {
                p.attr('src', oFREvent.target.result).fadeIn();
            };
        });*/

        /*$('#previewimage').imgAreaSelect({aspectRatio: '2:1',
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