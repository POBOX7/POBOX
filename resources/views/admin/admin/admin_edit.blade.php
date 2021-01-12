@extends('admin.layouts.admin', ['pageTitle' => 'Add Category'])

@section('content')
<div class="row">
  <div class="col-md-12 d-flex align-items-stretch grid-margin">
    <div class="row flex-grow">
      
      <div class="col-12 stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">UPDATE ADMIN DETAILS</h4>
            {{-- <p class="card-description">
              Horizontal form layout
            </p> --}}
            <form class="forms-sample" action="{{route('update.admin',$id)}}" method="POST">
              {{ csrf_field() }}
              <div class="form-group row">
                <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Name</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control" id="name" name="name" placeholder="Name" maxlength="15" onkeyup="countChar(this)" value="{{$adminDetail->name}}">
                  <span id="nameLimit" style="color: red;">(15/15)</span>
                  @if ($errors->has('name'))
                    <span style="color: red">{{ $errors->first('name') }}</span>
                  @endif
                  
                </div>
              </div>

              <div class="form-group row">
                <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-4">
                  <input type="email" class="form-control" id="email" name="email" placeholder="Name" value="{{$adminDetail->email}}">
                  @if ($errors->has('email'))
                    <span style="color: red">{{ $errors->first('email') }}</span>
                  @endif
                </div>
              </div>

              <div class="form-group row">
                <label for="email" class="col-sm-3 col-form-label">New Password</label>
                <div class="col-sm-4">
                  <input type="password" onChange="onChange()" class="form-control" id="password" name="password" placeholder="Password">
                 <!--  @if ($errors->has('password'))
                    <span style="color: red">{{ $errors->first('password') }}</span>
                  @endif -->
                </div>
                <span class="focus-input100"></span>
              </div>

              <div class="form-group row">
                <label for="password_confirmation" class="col-sm-3 col-form-label">Confirm Password</label>
                <div class="col-sm-4">
                  <input type="password" onChange="onChange()" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password">
                 <!--  @if ($errors->has('password_confirmation'))
                    <span style="color: red">{{ $errors->first('password_confirmation') }}</span>
                  @endif -->
                </div>
                 <span class="focus-input100">
              </div>
              
<script type="text/javascript">
  function onChange() {
  const password = document.querySelector('input[name=password]');
  const confirm = document.querySelector('input[name=password_confirmation]');
  if (confirm.value === password.value) {
    confirm.setCustomValidity('');
  } else {
    confirm.setCustomValidity('Passwords do not match');
  }
}
</script>

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
  $(document).ready(function() {
    
    var name = $('#name').val();
    var len = name.length;
    tlength = len,
    set = 15,
    remain = parseInt(set - tlength);
    $('#nameLimit').text('('+remain+'/'+set+')');
    });
</script>
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