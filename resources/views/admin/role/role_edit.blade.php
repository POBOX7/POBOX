@extends('admin.layouts.admin', ['pageTitle' => 'Add Category'])

@section('content')
<div class="row">
  <div class="col-md-12 d-flex align-items-stretch grid-margin">
    <div class="row flex-grow">
      
      <div class="col-12 stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">UPDATE ROLE DETAILS</h4>
            {{-- <p class="card-description">
              Horizontal form layout
            </p> --}}
            <form class="forms-sample" action="{{route('update.role',$id)}}" method="POST">
              {{ csrf_field() }}
              <div class="form-group row">
                <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Type</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control" id="type" name="type" placeholder="Type" value="{{$roleDetail->type}}">
                  @if ($errors->has('type'))
                    <span style="color: red">{{ $errors->first('type') }}</span>
                  @endif
                  
                </div>
              </div>
              <button type="submit" class="btn btn-success mr-2">Submit</button>
              <a href="{{route('role')}}"   class="btn btn-light">Cancel</a>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
@endsection