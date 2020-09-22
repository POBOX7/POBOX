@extends('admin.layouts.admin', ['pageTitle' => 'Add Coupon'])
@section('title', 'Add Coupon')
@section('content')
<div class="row">
  <div class="col-md-12 d-flex align-items-stretch grid-margin">
    <div class="row flex-grow">
      
      <div class="col-12 stretch-card">
        <div class="card">
          <div class="card-body">
           <h4 class="card-title">Add Coupon</h4>
        <form class="forms-sample"  action="{{ route('save-coupon') }}" method="POST" enctype="multipart/form-data">
           {{ csrf_field() }}
                <div class="form-group row">
                  <label for="from_km" class="col-sm-3 col-form-label">Name</label>
                  <div class="col-sm-3">
                       <input id="name" class="form-control" name="name" placeholder="Coupon Name" maxlength="30" required="required" type="text">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="from_km" class="col-sm-3 col-form-label">Code</label>
                  <div class="col-sm-3">
                      <input id="name" class="form-control" maxlength="15" name="code" placeholder="code" required="required" type="text">
                  </div>
                </div>
               
                 <div class="form-group row item per-open">
                  <label for="from_km" class="col-sm-3 col-form-label">Total Discount (%)</label>
                  <div class="col-sm-3">
                      <input id="name" class="form-control numberbox"  name="total" placeholder="Total Discount(%) .Numbers only." min="1" max="100"  type="number">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="from_km" class="col-sm-3 col-form-label">Valid From</label>
                  <div class="col-sm-3">
                      <input id="name" class="form-control datepicker"  name="valid_form" placeholder="Valid From" required="required" type="text" >
                  </div>
                </div>
                <div class="form-group row">
                  <label for="from_km" class="col-sm-3 col-form-label">Valid To</label>
                  <div class="col-sm-3">
                      <input id="name" class="form-control datepicker"  name="valid_to" placeholder="Valid to" required="required" type="text">
                  </div>
                </div>
                <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.css">
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>


<script type="text/javascript">

$('.datepicker').datepicker({
    //format: "yyyy/mm/dd", 
    startDate: new Date()

});
</script>
                <div class="form-group row">
                  <label for="from_km" class="col-sm-3 col-form-label">Usage</label>
                  <div class="col-sm-3">
                      <input id="name" onKeyPress = "return isNumberKey(event);" class="form-control" name="usage" placeholder="Usage" required="required"  type="number">
                  </div>
                </div>
              
            
          <script>
              $('.numberbox').keyup(function(){
              if ($(this).val() > 100){
                alert("No numbers above 100%");
                $(this).val('100');
              }
            });
          </script>
          
           
          <button type="submit" class="btn btn-success mr-2">Submit</button>
              <a href="{{route('coupon-lists')}}"   class="btn btn-light">Cancel</a>
        </form>
     </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
@section('js')
<script type="text/javascript">
  $('.type').on('change',function(){

    var option_val = $(this).val();

    if(option_val == 1){
      $('.price-open').show();
      $('.per-open').hide();
    }
    if(option_val == 2){
      $('.per-open').show();
      $('.price-open').hide();
    }

  });
</script>
<script type="text/javascript">
    function isNumberKey(evt){  <!--Function to accept only numeric values-->
    //var e = evt || window.event;
  var charCode = (evt.which) ? evt.which : evt.keyCode
    if (charCode != 46 && charCode > 31 
  && (charCode < 48 || charCode > 57))
        return false;
        return true;
  }
       
    function ValidateAlpha(evt)
    {
        var keyCode = (evt.which) ? evt.which : evt.keyCode
        if ((keyCode < 65 || keyCode > 90) && (keyCode < 97 || keyCode > 123) && keyCode != 32)
         
        return false;
            return true;
    }



          </script> 
@endsection