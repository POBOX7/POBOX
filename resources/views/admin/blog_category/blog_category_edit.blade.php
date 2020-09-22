@extends('admin.layouts.admin', ['pageTitle' => 'Add blog'])

@section('content')

<div class="row">
  <div class="col-md-12 d-flex align-items-stretch grid-margin">
    <div class="row flex-grow">
      
      <div class="col-12 stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">UPDATE BLOG CATEGORY DETAILS</h4>
            {{-- <p class="card-description">
              Horizontal form layout
            </p> --}}
            <form class="forms-sample" action="{{route('update.blog_category',$id)}}" method="POST" enctype="multipart/form-data">
              {{ csrf_field() }}

              
              <div class="form-group row">
                <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Title</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control" id="category_name" name="category_name" placeholder="Title" value="{{$blogCategoryDetail->category_name}}" required>
                  @if ($errors->has('category_name'))
                    <span style="color: red">{{ $errors->first('category_name') }}</span>
                  @endif
                  
                </div>
              </div>

              

              
              <button type="submit" class="btn btn-success mr-2">Submit</button>
              <a href="{{route('admin.blog_category.index')}}"   class="btn btn-light">Cancel</a>
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