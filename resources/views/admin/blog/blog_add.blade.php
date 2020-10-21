@extends('admin.layouts.admin', ['pageTitle' => 'Add blog'])

@section('content')
<center><div id="result"></div></center>
<div class="row">
  <div class="col-md-12 d-flex align-items-stretch grid-margin">
    <div class="row flex-grow">
      
      <div class="col-12 stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">ADD NEW BLOG DETAILS</h4>
            {{-- <p class="card-description">
              Horizontal form layout
            </p> --}}
            <form class="forms-sample" action="{{route('store.blog')}}" method="POST" enctype="multipart/form-data">
              {{ csrf_field() }}
              <div class="form-group row">
                <label for="image" class="col-sm-3 col-form-label">Category</label>
                <div class="col-sm-4">
                  <select class="form-control" id="category" name="post_category" style="width:100%" required>
                      @foreach($categoryList as $key => $category)
                        <option value="{{$category->category_name}}">{{$category->category_name}}</option>
                      @endforeach
                    </select>
                  @if ($errors->has('category_id'))
                    <span style="color: red">Please select category</span>
                  @endif
                </div>
              </div>

              <div class="form-group row">
                <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Title</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control" id="blog_title" name="blog_title" placeholder="Title" required>
                  @if ($errors->has('blog_title'))
                    <span style="color: red">{{ $errors->first('blog_title') }}</span>
                  @endif
                  
                </div>
              </div>

              <div class="form-group row">
                <label for="author" class="col-sm-3 col-form-label">Author</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control" id="author" name="author" placeholder="name" required>
                  @if ($errors->has('author'))
                    <span style="color: red">{{ $errors->first('author') }}</span>
                  @endif
                  
                </div>
              </div>

              <!-- <div class="form-group row">
                <label for="slug" class="col-sm-3 col-form-label">Slug</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control" id="slug" name="slug" placeholder="slug" required>
                  @if ($errors->has('slug'))
                    <span style="color: red">{{ $errors->first('slug') }}</span>
                  @endif
                  
                </div>
              </div> -->

              <div class="form-group row">
                <label for="blog_image" class="col-sm-3 col-form-label">Image</label>
                <div class="col-sm-4">
                  <input type="file" class="form-control image-file" id="blog_image" name="blog_image" accept="image/*" required>
                  <div class="result"></div>
                  @if ($errors->has('blog_image'))
                    <span style="color: red">{{ $errors->first('blog_image') }}</span>
                  @endif
                  
                </div>
              </div>

              <div class="form-group row">
                <label for="blog_date" class="col-sm-3 col-form-label">Date</label>
                <div class="col-sm-4">
                  <div id="datepicker-popup" class="input-group date datepicker">
                    <input type="text" class="form-control" name="blog_date" required>
                    <div class="input-group-addon input-group-text">
                      <span class="mdi mdi-calendar"></span>
                    </div>
                  </div>
                  @if ($errors->has('blog_date'))
                    <span style="color: red">{{ $errors->first('blog_date') }}</span>
                  @endif
                  
                </div>
              </div>

              {{-- <div class="form-group row">
                <label for="orderby" class="col-sm-3 col-form-label">Order </label>
                <div class="col-sm-4">
                  <input type="text" class="form-control" id="orderby" name="orderby" placeholder="Order No." value="">
                  @if ($errors->has('orderby'))
                    <span style="color: red">{{ $errors->first('orderby') }}</span>
                  @endif
                  
                </div>
              </div> --}}

              <div class="form-group row">
                <label for="image" class="col-sm-3 col-form-label">Description</label>
                <div class="col-sm-9">
                  <textarea id='editor' name="blog_description" placeholder="Edit your text here..."></textarea>
                  @if ($errors->has('blog_description'))
                    <span style="color: red">{{ $errors->first('blog_description') }}</span>
                  @endif
                </div>
              </div>

              
              <button type="submit" id="submit" class="btn btn-success mr-2">Submit</button>
              <a href="{{route('admin.blog')}}"   class="btn btn-light">Cancel</a>
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