@extends('admin.layouts.admin', ['pageTitle' => 'Add Category'])

@section('content')
<div class="row">
  <div class="col-md-12 d-flex align-items-stretch grid-margin">
    <div class="row flex-grow">
      
      <div class="col-12 stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">IMPORT PRODUCT DETAILS</h4>
            {{-- <p class="card-description">
              Horizontal form layout
            </p> --}}
            <form class="forms-sample" action="{{route('store.bulkupload')}}" method="POST" enctype="multipart/form-data">
              {{ csrf_field() }}
              
              <div class="form-group row">
                <label for="image" class="col-sm-3 col-form-label">Image</label>
                <div class="col-sm-4">
                  <input type="file" class="form-control" name="image">
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
@endsection