@extends('admin.layouts.admin', ['pageTitle' => 'Add static-pages'])

@section('content')

<div class="row">
  <div class="col-md-12 d-flex align-items-stretch grid-margin">
    <div class="row flex-grow">
      
      <div class="col-12 stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">UPDATE PAGE DETAILS</h4>
            {{-- <p class="card-description">
              Horizontal form layout
            </p> --}}
            <form class="forms-sample" action="{{route('update.static-pages',$id)}}" method="POST" enctype="multipart/form-data">
              {{ csrf_field() }}
              <div class="form-group row">
                <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Title</label>
                <div class="col-sm-4">
                 
                  <input type="text" class="form-control" id="title" name="title" placeholder="Title" value="{{$staticpageDetail->title}}" readonly>
                
                  @if ($errors->has('title'))
                    <span style="color: red">{{ $errors->first('title') }}</span>
                  @endif
                  
                </div>
              </div>

              <div class="form-group row">
                <label for="heading_image" class="col-sm-3 col-form-label">Heading Banner</label>
                <div class="col-sm-4">
                   
                  <input type="file" class="form-control" id="heading_image" name="heading_image" accept="image/*">
                   
                  <p>(Size : 1232x194)</p>
                  @if ($errors->has('heading_image'))
                    <span style="color: red">{{ $errors->first('heading_image') }}</span>
                  @endif
                </div>
               
              </div>

              <div class="form-group row">
                <label for="image" class="col-sm-3 col-form-label">Content</label>
                <div class="col-sm-9">
                  
                  <textarea id="editor" name="content" placeholder="">{{$staticpageDetail->content}}</textarea>
                  
                   
                  @if ($errors->has('content'))
                    <span style="color: red">{{ $errors->first('content') }}</span>
                  @endif
                </div>
              </div>

              
              <button type="submit" class="btn btn-success mr-2">Submit</button>
              <a href="{{route('static-pages')}}"   class="btn btn-light">Cancel</a>
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
    CKEDITOR.replace( 'editor' );   
</script>
@endsection