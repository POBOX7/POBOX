@extends('admin.layouts.admin', ['pageTitle' => 'Add Category'])

@section('content')
<div class="row">
  <div class="col-md-12 d-flex align-items-stretch grid-margin">
    <div class="row flex-grow">
      
      <div class="col-12 stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">ADD NEW CATEGORY DETAILS</h4>
            {{-- <p class="card-description">
              Horizontal form layout
            </p> --}}
            <form class="forms-sample" action="{{route('store.category')}}" method="POST" enctype="multipart/form-data">
              {{ csrf_field() }}

              <div class="form-group row">
                <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Name</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control" id="name" name="name" placeholder="Name" maxlength="20" required onkeyup="countChar(this)"> 
                  <span id="nameLimit" style="color: red;">(20/20)</span>
                  @if ($errors->has('name'))
                    <span style="color: red">{{ $errors->first('name') }}</span>
                  @endif
                  
                </div>
              </div>

              <div class="form-group row">
                <label for="image" class="col-sm-3 col-form-label">Image</label>
                <div class="col-sm-4">
                  <input type="file" class="form-control" id="type" name="image" accept="image/*" required>
                  <p>(Size : 277x306)</p>
                  @if ($errors->has('image'))
                    <span style="color: red">{{ $errors->first('image') }}</span>
                  @endif
                  
                </div>
              </div>

              <button type="submit" class="btn btn-success mr-2">Submit</button>
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