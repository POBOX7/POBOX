@extends('admin.layouts.admin', ['pageTitle' => 'Add Category'])

@section('content')
<center><div id="result"></div></center>
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
            <form class="forms-sample" action="{{route('store.testimonial')}}" method="POST" enctype="multipart/form-data">
              {{ csrf_field() }}
              
              <div class="form-group row">
                <label for="name" class="col-sm-3 col-form-label">Name</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control" id="name" name="name" placeholder="Customer name" onkeyup="countChar(this)" maxlength="15" required>
                  <span id="nameLimit_name" style="color: red;">(15/15)</span>
                  @if ($errors->has('name'))
                    <span style="color: red">{{ $errors->first('name') }}</span>
                  @endif
                </div>
              </div>

              <div class="form-group row">
                <label for="description" class="col-sm-3 col-form-label">Description</label>
                <div class="col-sm-8">
                  <textarea class="form-control" name="description" maxlength="120" onkeyup="countDesc(this)" required></textarea>
                  <span id="nameLimit_description" style="color: red;">(120/120)</span>
                  @if ($errors->has('description'))
                    <span style="color: red">{{ $errors->first('description') }}</span>
                  @endif
                </div>
              </div>

              <div class="form-group row">
                <label for="image" class="col-sm-3 col-form-label">Image</label>
                <div class="col-sm-4">
                  <input type="file" class="form-control image-file" id="image" name="image" accept="image/*" required>
                  <div class="result"></div>
                  <p>(Size : 84x84)</p>
                  @if ($errors->has('image'))
                    <span style="color: red">{{ $errors->first('image') }}</span>
                  @endif
                </div>
              </div>

               
              
              <button type="submit" id="submit" class="btn btn-success mr-2">Submit</button>
              <a href="{{route('testimonial')}}"   class="btn btn-light">Cancel</a>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>

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