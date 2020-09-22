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
                <label for="image" class="col-sm-3 col-form-label">Content</label>
                <div class="col-sm-9">
                  {!! $staticpageDetail->content !!}
                </div>
              </div>

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