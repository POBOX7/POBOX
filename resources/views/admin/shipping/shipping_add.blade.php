@extends('admin.layouts.admin', ['pageTitle' => 'Add Category'])

@section('content')
<div class="row">
  <div class="col-md-12 d-flex align-items-stretch grid-margin">
    <div class="row flex-grow">
      
      <div class="col-12 stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">ADD NEW SHIPPING DETAILS</h4>
            
            <form class="forms-sample" action="{{route('store.shipping')}}" method="POST" enctype="multipart/form-data">
              {{ csrf_field() }}    
              <div class="form-group row">
                <label for="from_km" class="col-sm-3 col-form-label">From Km</label>
                <div class="col-sm-3">
                  <input type='text' class="form-control" onKeyPress = 'return isNumberKey(event)' id="from_km" name="from_km" onkeyup="fromKmCountChar(this)" maxlength="5"  required/>
                  <span id="fromKmLimit" style="color: red;">(5/5)</span>
                  @if ($errors->has('from_km'))
                    <span style="color: red">{{ $errors->first('from_km') }}</span>
                  @endif
                  
                </div>
              </div>

              <div class="form-group row">
                <label for="to_km" class="col-sm-3 col-form-label">To Km</label>
                <div class="col-sm-3">
                  <input type='text' class="form-control" onKeyPress = 'return isNumberKey(event)' id="to_km" name="to_km" onkeyup="toKmCountChar(this)" maxlength="5"  required/>
                  <span id="toKmLimit" style="color: red;">(5/5)</span>
                  @if ($errors->has('to_km'))
                    <span style="color: red">{{ $errors->first('to_km') }}</span>
                  @endif
                  
                </div>
              </div>
              
              <div class="form-group row">
                <label for="rate" class="col-sm-3 col-form-label">Rate</label>
                <div class="col-sm-3">
                  <input type='text' class="form-control" onKeyPress = 'return isNumberKey(event)' id="rate" name="rate" onkeyup="rateCountChar(this)" maxlength="5"  required/>
                  <span id="rateLimit" style="color: red;">(5/5)</span>
                  @if ($errors->has('rate'))
                    <span style="color: red">{{ $errors->first('rate') }}</span>
                  @endif
                  
                </div>
              </div>


              <button type="submit" class="btn btn-success mr-2">Submit</button>
              <a href="{{route('shipping')}}"   class="btn btn-light">Cancel</a>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
 function isNumberKey(e){var h=e.which?e.which:e.keyCode;return!(46!=h&&h>31&&(h<48||h>57))}function ValidateAlpha(e){var h=e.which?e.which:e.keyCode;return!(h<65||h>90)||!(h<97||h>123)||32==h}
</script> 
<script type="text/javascript">
  $(document).ready(function() {
    
    var name = $('#from_km').val();
    var len = name.length;
    tlength = len,
    set = 5,
    remain = parseInt(set - tlength);
    $('#fromKmLimit').text('('+remain+'/'+set+')');
    

    var name = $('#to_km').val();
    var len = name.length;
    tlength = len,
    set = 5,
    remain = parseInt(set - tlength);
    $('#toKmLimit').text('('+remain+'/'+set+')');


    var name = $('#rate').val();
    var len = name.length;
    tlength = len,
    set = 5,
    remain = parseInt(set - tlength);
    $('#rateLimit').text('('+remain+'/'+set+')');

});



</script>
<script type="text/javascript">
  function fromKmCountChar(val) {
    var len = val.value.length;
    tlength = len,
    set = 5,
    remain = parseInt(set - tlength);
    $('#fromKmLimit').text('('+remain+'/'+set+')');
  };

  function toKmCountChar(val) {
    var len = val.value.length;
    tlength = len,
    set = 5,
    remain = parseInt(set - tlength);
    $('#toKmLimit').text('('+remain+'/'+set+')');
  };

  function rateCountChar(val) {
    var len = val.value.length;
    tlength = len,
    set = 5,
    remain = parseInt(set - tlength);
    $('#rateLimit').text('('+remain+'/'+set+')');
  };

</script>

@endsection