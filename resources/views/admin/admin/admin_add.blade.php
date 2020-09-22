@extends('admin.layouts.admin', ['pageTitle' => 'Add Category'])

@section('content')
<div class="row">
  <div class="col-md-12 d-flex align-items-stretch grid-margin">
    <div class="row flex-grow">
      
      <div class="col-12 stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">ADD NEW ADMIN</h4>
            {{-- <p class="card-description">
              Horizontal form layout
            </p> --}}
            <form class="forms-sample" action="{{route('store.admin')}}" method="POST">
              {{ csrf_field() }}
              <div class="form-group row">
                <label for="name" class="col-sm-3 col-form-label">Name</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control" id="name" name="name" placeholder="Name" maxlength="15" onkeyup="countChar(this)" required>
                  <span id="nameLimit" style="color: red;">(15/15)</span>
                  @if ($errors->has('name'))
                    <span style="color: red">{{ $errors->first('name') }}</span>
                  @endif
                  
                </div>
              </div>

              <div class="form-group row">
                <label for="email" class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-4">
                  <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="" required>
                  @if ($errors->has('email'))
                    <span style="color: red">{{ $errors->first('email') }}</span>
                  @endif
                  
                </div>
              </div>

              <div class="form-group row">
                <label for="email" class="col-sm-3 col-form-label">Password</label>
                <div class="col-sm-4">
                  <input type="password" class="form-control" id="password" name="password" placeholder="Password" value="" required>
                  @if ($errors->has('password'))
                    <span style="color: red">{{ $errors->first('password') }}</span>
                  @endif
                </div>
              </div>

              <div class="form-group row">
                <label for="password_confirmation" class="col-sm-3 col-form-label">Confirm Password</label>
                <div class="col-sm-4">
                  <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password">
                  @if ($errors->has('password_confirmation'))
                    <span style="color: red">{{ $errors->first('password_confirmation') }}</span>
                  @endif
                </div>
              </div>
              
              <button type="submit" class="btn btn-success mr-2">Submit</button>
              <a href="{{route('admin')}}"   class="btn btn-light">Cancel</a>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
<script type="text/javascript">
  function countChar(val) {
    var len = val.value.length;
    tlength = len,
    set = 15,
    remain = parseInt(set - tlength);
    $('#nameLimit').text('('+remain+'/'+set+')');
  };

</script>
@endsection