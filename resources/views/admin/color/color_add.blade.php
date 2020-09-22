@extends('admin.layouts.admin', ['pageTitle' => 'Add Category'])

@section('content')
<div class="row">
  <div class="col-md-12 d-flex align-items-stretch grid-margin">
    <div class="row flex-grow">
      
      <div class="col-12 stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">ADD NEW COLOR DETAILS</h4>
            
            <form class="forms-sample" action="{{route('store.color')}}" method="POST" enctype="multipart/form-data">
              {{ csrf_field() }}
              <div class="form-group row">
                <label for="name" class="col-sm-3 col-form-label">Name</label>
                <div class="col-sm-3">
                  <input type='text' class="form-control" id="name" name="name" onkeyup="countChar(this)" maxlength="20"  required/>
                  <span id="nameLimit" style="color: red;">(20/20)</span>
                  @if ($errors->has('name'))
                    <span style="color: red">{{ $errors->first('name') }}</span>
                  @endif
                  
                </div>
              </div>

              <div class="form-group row">
                <label for="hex_code" class="col-sm-3 col-form-label">Hex Code</label>
                <div class="col-sm-3">
                  <input type='color' class="form-control" id="hex_code" name="hex_code" required/>
                  @if ($errors->has('hex_code'))
                    <span style="color: red">{{ $errors->first('hex_code') }}</span>
                  @endif
                  
                </div>
              </div>

              <button type="submit" class="btn btn-success mr-2">Submit</button>
              <a href="{{route('color')}}"   class="btn btn-light">Cancel</a>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  $(document).ready(function() {
    
    var name = $('#name').val();
    var len = name.length;
    tlength = len,
    set = 20,
    remain = parseInt(set - tlength);
    $('#nameLimit').text('('+remain+'/'+set+')');
    });
</script>
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