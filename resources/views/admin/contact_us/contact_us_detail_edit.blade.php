@extends('admin.layouts.admin', ['pageTitle' => 'Add blog'])

@section('content')

<div class="row">
  <div class="col-md-12 d-flex align-items-stretch grid-margin">
    <div class="row flex-grow">
      
      <div class="col-12 stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">UPDATE CONTACT US DETAILS</h4>
            {{-- <p class="card-description">
              Horizontal form layout
            </p> --}}
            <form class="forms-sample" action="{{route('update.contact_us_detail',$id)}}" method="POST" enctype="multipart/form-data">
              {{ csrf_field() }}

              
              <div class="form-group row">
                <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="{{$ContactUsDetailEdit->email}}" required>
                  @if ($errors->has('email'))
                    <span style="color: red">{{ $errors->first('email') }}</span>
                  @endif
                  
                </div>
              </div>
              <div class="form-group row">
                <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Phone Number</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control" id="phone_number" name="phone_number" placeholder="Phone Number" maxlength="14" value="{{$ContactUsDetailEdit->phone_number}}" required>
                  @if ($errors->has('phone_number'))
                    <span style="color: red">{{ $errors->first('phone_number') }}</span>
                  @endif
                  
                </div>
              </div>
               <div class="form-group row">
                <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Address</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control" id="address" name="address" placeholder="Address" value="{{$ContactUsDetailEdit->address}}" required>
                  @if ($errors->has('address'))
                    <span style="color: red">{{ $errors->first('address') }}</span>
                  @endif
                  
                </div>
              </div>
              <div class="form-group row">
                <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Facebook Link</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control" id="facebook_link" name="facebook_link" placeholder="Facebook Link" value="{{$ContactUsDetailEdit->facebook_link}}" required>
                  @if ($errors->has('facebook_link'))
                    <span style="color: red">{{ $errors->first('facebook_link') }}</span>
                  @endif
                  
                </div>
              </div>
              <div class="form-group row">
                <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Twitter Link</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control" id="twitter_link" name="twitter_link" placeholder="Twitter Link" value="{{$ContactUsDetailEdit->twitter_link}}" required>
                  @if ($errors->has('twitter_link'))
                    <span style="color: red">{{ $errors->first('twitter_link') }}</span>
                  @endif
                  
                </div>
              </div>
              <div class="form-group row">
                <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Linkedin</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control" id="linkedin_link" name="linkedin_link" placeholder="Linkedin link" value="{{$ContactUsDetailEdit->linkedin_link}}" required>
                  @if ($errors->has('linkedin_link'))
                    <span style="color: red">{{ $errors->first('linkedin_link') }}</span>
                  @endif
                  
                </div>
              </div>

              

              
              <button type="submit" class="btn btn-success mr-2">Submit</button>
              <a href="{{route('admin.contact_us_detail.index')}}"   class="btn btn-light">Cancel</a>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
<script src="{{ asset('admin/ckeditor/ckeditor.js') }}"></script>

<script>
    //var wysiwygareaAvailable = !!CKEDITOR.plugins.get( 'wysihtml5' );
    CKEDITOR.replace( 'editor' );
</script>
@endsection