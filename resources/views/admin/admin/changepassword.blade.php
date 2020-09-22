@extends('admin.layouts.admin', ['pageTitle' => 'Add Category'])

@section('content')
<div class="row">
  <div class="col-md-12 d-flex align-items-stretch grid-margin">
    <div class="row flex-grow">
      
      <div class="col-12 stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">CHANGE ADMIN PASSWORD</h4>
            {{-- <p class="card-description">
              Horizontal form layout
            </p> --}}
            <form class="forms-sample" action="{{route('admin.updatepassword',1)}}" method="POST">
              {{ csrf_field() }}

              <div class="form-group row">
                <label for="email" class="col-sm-3 col-form-label">Current Password</label>
                <div class="col-sm-4">
                  <input type="password" class="form-control" id="current_password" name="current_password" placeholder="Current Password">
                  @if ($errors->has('current_password'))
                    <span style="color: red">{{ $errors->first('current_password') }}</span>
                  @endif
                </div>
              </div>
              <div class="form-group row">
                <label for="email" class="col-sm-3 col-form-label">New Password</label>
                <div class="col-sm-4">
                  <input type="password" class="form-control" id="password" name="password" placeholder="Password">
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
@endsection