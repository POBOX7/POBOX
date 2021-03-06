@extends('admin.layouts.admin', ['pageTitle' => 'Add Category'])

@section('content')
<center><div id="result"></div></center>
<div class="row">
  <div class="col-md-12 d-flex align-items-stretch grid-margin">
    <div class="row flex-grow">
      
      <div class="col-12 stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">UPDATE ABOUT US DETAILS</h4>
            {{-- <p class="card-description">
              Horizontal form layout
            </p> --}}
            <form class="forms-sample" action="{{route('update.aboutus',$id)}}" method="POST" enctype="multipart/form-data">
              {{ csrf_field() }}

              <div class="form-group row">
                <label for="heading_image" class="col-sm-3 col-form-label">Heading Image</label>
                <div class="col-sm-4">
                  <input type="file" class="form-control image-file-default" id="heading_image" name="heading_image" accept="image/*">
                  <div class="product-image-file-default-img"></div>
                  @if ($errors->has('heading_image'))
                    <span style="color: red">{{ $errors->first('heading_image') }}</span>
                  @endif
                </div>

                <div class="col-sm-4">
                  @if(isset($aboutUsDetail->heading_image))
                  <img src="{{asset('assets/upload_images/about')}}/{{$aboutUsDetail['heading_image']}}"  style="width:200px;height: 100px;"> 
                  @endif
                 

                </div>
              </div>

             <!--  <div class="form-group row">
                <label for="image" class="col-sm-3 col-form-label">Image</label>
                <div class="col-sm-4">
                  <input type="file" class="form-control image-file" id="image" name="image" accept="image/*">
                  <div class="result"></div>
                  @if ($errors->has('image'))
                    <span style="color: red">{{ $errors->first('image') }}</span>
                  @endif
                </div>

                <div class="col-sm-4">
                  @if(isset($aboutUsDetail->image))
                  <img src="{{asset('assets/upload_images/about')}}/{{$aboutUsDetail->image}}"  style="width:200px;height: 100px;"> 
                  @endif
                </div>
              </div> -->

              <div class="form-group row">
                <label for="content" class="col-sm-3 col-form-label">Content</label>
                <div class="col-sm-9">
                  @if(isset($aboutUsDetail->content))
                  <textarea id="editor" name="content" maxlength="10">{{$aboutUsDetail->content}}</textarea>
                  @endif
                  @if(!isset($aboutUsDetail->content))
                   <textarea id="editor" name="content" maxlength="10"></textarea>
                   @endif
                  @if ($errors->has('content'))
                    <span style="color: red">Content is required</span>
                  @endif
                </div>
              </div>
              
              <button type="submit" id="submit" class="btn btn-success mr-2">Submit</button>
              <a href="{{route('edit.aboutus')}}"   class="btn btn-light">Cancel</a>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
<script src="{{ asset('admin/ckeditor/ckeditor.js') }}"></script>

<script>
    //var wysiwygareaAvailable = !!CKEDITOR.plugins.get( 'wysihtml5' );
    //CKEDITOR.replace( 'editor' );
      CKEDITOR.replace( 'editor',{
      filebrowserBrowseUrl: '../../../public/uploads',
    //filebrowserBrowseUrl: '../../../assets/upload_images/blog',
    filebrowserUploadUrl: '../../../upload.php'
} );
</script>

@endsection