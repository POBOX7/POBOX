@extends('admin.layouts.admin', ['pageTitle' => 'Add tag'])

@section('content')
<div class="row">
  <div class="col-md-12 d-flex align-items-stretch grid-margin">
    <div class="row flex-grow">
      
      <div class="col-12 stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">UPDATE SUPPLIER DETAILS</h4>
            {{-- <p class="card-description">
              Horizontal form layout
            </p> --}}
            <form class="forms-sample" action="{{route('update.supplier',$id)}}" method="POST" enctype="multipart/form-data">
              {{ csrf_field() }}
              <div class="form-group row">
                <label for="name" class="col-sm-3 col-form-label">Name</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control" id="name" name="name" value="{{$supplierDetail->name}}" onkeyup="countChar(this)" maxlength="30" placeholder="Name" required>
                  <span id="nameLimit_name" style="color: red;">(30/30)</span>
                  @if ($errors->has('name'))
                    <span style="color: red">{{ $errors->first('name') }}</span>
                  @endif
                </div>
              </div>

              <div class="form-group row">
                <label for="address" class="col-sm-3 col-form-label">Address</label>
                <div class="col-sm-4">
                  <textarea name="address" id="address" class="form-control" onkeyup="countChar(this)" maxlength="100">{{$supplierDetail->address}}</textarea>
                  <span id="nameLimit_address" style="color: red;">(100/100)</span>
                  @if ($errors->has('address'))
                    <span style="color: red">{{ $errors->first('address') }}</span>
                  @endif
                </div>
              </div>

              <div class="form-group row">
                <label for="gst_no" class="col-sm-3 col-form-label">GST No</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control" id="gst_no" name="gst_no" value="{{$supplierDetail->gst_no}}" onkeyup="countChar(this)" maxlength="20" placeholder="Gst no">
                  <span id="nameLimit_gst_no" style="color: red;">(30/30)</span>
                  @if ($errors->has('gst_no'))
                    <span style="color: red">{{ $errors->first('gst_no') }}</span>
                  @endif
                </div>
              </div>

              <div class="form-group row">
                <label for="adhar_no" class="col-sm-3 col-form-label">Adhar No</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control" id="adhar_no" name="adhar_no" value="{{$supplierDetail->adhar_no}}" onkeyup="countChar(this)" maxlength="20" placeholder="Adhar no">
                  <span id="nameLimit_adhar_no" style="color: red;">(30/30)</span>
                  @if ($errors->has('adhar_no'))
                    <span style="color: red">{{ $errors->first('adhar_no') }}</span>
                  @endif
                </div>
              </div>

              <div class="form-group row">
                <label for="pan_no" class="col-sm-3 col-form-label">Pan No</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control" id="pan_no" name="pan_no" value="{{$supplierDetail->pan_no}}" onkeyup="countChar(this)" maxlength="20" placeholder="Pan no">
                  <span id="nameLimit_pan_no" style="color: red;">(30/30)</span>
                  @if ($errors->has('pan_no'))
                    <span style="color: red">{{ $errors->first('pan_no') }}</span>
                  @endif
                </div>
              </div>

              <div class="form-group row">
                <label for="bank_name" class="col-sm-3 col-form-label">Bank Name</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control" id="bank_name" name="bank_name" value="{{$supplierDetail->bank_name}}" onkeyup="countChar(this)" maxlength="20" placeholder="bank name">
                  <span id="nameLimit_bank_name" style="color: red;">(30/30)</span>
                  @if ($errors->has('bank_name'))
                    <span style="color: red">{{ $errors->first('bank_name') }}</span>
                  @endif
                </div>
              </div>
              <div class="form-group row">
                <label for="account_no" class="col-sm-3 col-form-label">Account No</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control" id="account_no" name="account_no" value="{{$supplierDetail->account_no}}" onkeyup="countChar(this)" maxlength="20" placeholder="Account no">
                  <span id="nameLimit_account_no" style="color: red;">(30/30)</span>
                  @if ($errors->has('account_no'))
                    <span style="color: red">{{ $errors->first('account_no') }}</span>
                  @endif
                </div>
              </div>
              <div class="form-group row">
                <label for="ifsc_code" class="col-sm-3 col-form-label">IFSC CODE</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control" id="ifsc_code" name="ifsc_code" value="{{$supplierDetail->ifsc_code}}" onkeyup="countChar(this)" maxlength="20" placeholder="IFSC code">
                  <span id="nameLimit_ifsc_code" style="color: red;">(30/30)</span>
                  @if ($errors->has('ifsc_code'))
                    <span style="color: red">{{ $errors->first('ifsc_code') }}</span>
                  @endif
                </div>
              </div>

              <button type="submit" class="btn btn-success mr-2">Submit</button>
              <a href="{{route('supplier')}}"   class="btn btn-light">Cancel</a>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="{{ asset('admin/vendors/select2/select2.min.js') }}"></script>
<script src="{{ asset('admin/js/select2.js') }}"></script>
<script type="text/javascript">
  $(document).ready(function() {
    var set_name = 30;
    var set_address = 100;
    var set_gst_no = 20;
    var set_adhar_no = 20;
    var set_pan_no = 20;
    var set_bank_name = 20;
    var set_account_no = 20;
    var set_ifsc_code = 20;

    var name = $('#name').val().length;
    var address = $('#address').val().length;
    var gst_no = $('#gst_no').val().length;
    var adhar_no = $('#adhar_no').val().length;
    var pan_no = $('#pan_no').val().length;
    var bank_name = $('#bank_name').val().length;
    var account_no = $('#account_no').val().length;
    var ifsc_code = $('#ifsc_code').val().length;

    remain_name = parseInt(set_name - name);
    remain_address = parseInt(set_address - address);
    remain_gst_no = parseInt(set_gst_no - gst_no);
    remain_adhar_no = parseInt(set_adhar_no - adhar_no);
    remain_pan_no = parseInt(set_pan_no - pan_no);
    remain_bank_name = parseInt(set_bank_name - bank_name);
    remain_account_no = parseInt(set_account_no - account_no);
    remain_ifsc_code = parseInt(set_ifsc_code - ifsc_code);
    
    $('#nameLimit_name').text('('+remain_name+'/'+set_name+')');
    $('#nameLimit_address').text('('+remain_address+'/'+set_address+')');
    $('#nameLimit_gst_no').text('('+remain_gst_no+'/'+set_gst_no+')');
    $('#nameLimit_adhar_no').text('('+remain_adhar_no+'/'+set_adhar_no+')');
    $('#nameLimit_pan_no').text('('+remain_pan_no+'/'+set_pan_no+')');
    $('#nameLimit_bank_name').text('('+remain_bank_name+'/'+set_bank_name+')');
    $('#nameLimit_account_no').text('('+remain_account_no+'/'+set_account_no+')');
    $('#nameLimit_ifsc_code').text('('+remain_ifsc_code+'/'+set_ifsc_code+')');
  });

  function countChar(val) {
    var id = val.id;
    if(id == 'name'){
      var set = 30;
    }else if(id == 'address'){
      var set = 100;
    }else if(id == 'gst_no'){
      var set = 20;
    }else if(id == 'adhar_no'){
      var set = 20;
    }else if(id == 'pan_no'){
      var set = 20;
    }else if(id == 'bank_name'){
      var set = 20;
    }else if(id == 'account_no'){
      var set = 20;
    }else if(id == 'ifsc_code'){
      var set = 20;
    }

    var len = val.value.length;
    
    remain = parseInt(set - len);

    if(remain > -1){
      $('#nameLimit_'+id).text('('+remain+'/'+set+')');
    }
    
  };
</script>
@endsection