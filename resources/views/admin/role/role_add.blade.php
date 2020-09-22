@extends('admin.layouts.admin', ['pageTitle' => 'Add Category'])

@section('content')
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
  <div class="row">
    <div class="col-lg-12">

      <!--begin::Portlet-->
      <div class="kt-portlet">
        <div class="kt-portlet__head">
          <div class="kt-portlet__head-label">
            <h3 class="kt-portlet__head-title">
              Add New Service
            </h3>
          </div>
        </div>

        <!--begin::Form-->
        <form action="{{route('store.service')}}" name='contactform' class="kt-form kt-form--fit kt-form--label-right" method="POST"> 
          {{ csrf_field() }}
            <div class="kt-portlet__body">
              <div class="form-group row">
                <label class="col-lg-2 col-form-label">Title:</label>
                <div class="col-lg-6">
                  <input type="text" class="form-control" placeholder="Enter title" name="vTitle">
                  @if ($errors->has('vAddress'))
                    <span class="form-text text-muted">{{ $errors->first('vTitle') }}</span>
                  @endif
                </div>
                
              </div>
              <div class="form-group row">
                <label class="col-lg-2 col-form-label">Content:</label>
                <div class="col-lg-6">
                  <input type="text" class="form-control" placeholder="Enter Content" name="tText">
                  @if ($errors->has('vAddress'))
                    <span class="form-text text-muted">{{ $errors->first('tText') }}</span>
                  @endif
                </div>
                
              </div>
            </div>
            <div class="kt-portlet__foot kt-portlet__foot--fit-x">
              <div class="kt-form__actions">
                <div class="row">
                  <div class="col-lg-2"></div>
                  <div class="col-lg-10">
                    {{-- <button type="reset" class="btn btn-success">Submit</button>
                    <button type="reset" class="btn btn-secondary">Cancel</button> --}}
                    <button type="submit" class="btn btn-primary">Submit</button>
                  <a href="{{route('service')}}"  type="reset" class="btn btn-secondary">Cancel</a>
                  </div>
                </div>
              </div>
            </div>
          </form>

        <!--end::Form-->
      </div>

      <!--end::Portlet-->

      <!--begin::Portlet-->
      

      <!--end::Portlet-->
    </div>
  </div>
</div>
<!-- /.content -->
@endsection