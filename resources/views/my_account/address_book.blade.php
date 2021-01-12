@extends('new_resources.layouts.new_app') 
@section('content')
 <script src="{{ asset('assets/js/countries.js') }}"></script>
<!--  <div class="hero-section hero-background style-02" style="background: url('../assets/images/hero_bg.jpg');">
      <h1 class="page-title">Address Book</h1>
</div>    -->
 <!-- <div class="main" style="padding-left: 70px;padding-right: 70px;">
  <nav aria-label="breadcrumb" class="breadcrumb-nav">
      <ol class="breadcrumb" style="background: transparent;padding-left: 0;">
          <li class="breadcrumb-item"><a href="{{route('home_1')}}">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Address Book</a></li>
      </ol>
  </nav>
</div>   --> 

<div class="my_account_bg">
<div class="container"> 
 @include('new_resources.layouts.leftside_my_account')  
    <div id="address_book" class="col-sm-12 col-xs-12 col-md-12 col-lg-9 tabcontent float-right">
      <h1 style="text-align: center;">Address Book</h1>
      <p style="text-align: center;">Save all your addresses for a faster checkout experience.</p>
      <div class="address-section ">
        <div class="col-lg-4 col-sm-4 col-xs-12 float-left">
           <div class="addAddrBox">
              <div class="addrcenter"><span class="ic-Add-Address"></span><span data-toggle="modal" data-target="#add_new_address">Add new address</span></div>
           </div>
        </div>
   @foreach($addresses as $address)
   <div class="col-lg-4 col-sm-4 col-xs-12 float-left">
       <div class="mobaddr-box  @if($address->is_permanent == 1)active-address @endif" > 
          <div class="address-info-wrapper">
             <span class="address-book-user-name">{{$address->name}}</span>
             <!-- <div class="default-address-tag tan-color">Default Address</div> -->
             <div class="address-info">
                <div class="address-first">{{$address->address_line_one}}</div>
                <div class="address-second">{{$address->address_line_two}} , {{$address->address_line_three}}</div> 
                <div class="address-third">{{$address->city}}, {{$address->state}}</div>
                <div class="address-fifth">{{$address->country}}- {{$address->pincode}}</div>
             </div>
             <div class="address-mobile"><span>Mobile </span><span class="addFontWeight">{{$address->phone_number}}</span></div>
          </div>
          <div></div>
          <div class="edit-remove-button-container">
             <span class="mobaddr-editc" data-toggle="modal" data-target="#edit_address-{{$address->id}}"><span class="ic-Edit ic--icon-right-gutter-space"></span>Edit</span><span class="mobaddr-icon-mar" data-toggle="modal" data-target="#delete-{{$address->id}}">Delete</span>
             <div class="mobaddr-selected-addr"><a href="{{route('set_as.default.address',[$address->id])}}">Set as default</a></div> 
          </div>
       </div>
    </div>

   <!-- Edit address pop start -->
<div class="modal fade" id="edit_address-{{$address->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" onclick="myFunction()"   data-dismiss="modal" aria-hidden="true">&times;</button>
       <!--  <h4 class="modal-title" id="myModalLabel">Modal title</h4> -->
      </div>
      <div class="modal-body">
    <div class="login-form">
      
     <form action="{{route('update.address',[$address->id])}}" method="POST">
        @csrf
        <h2 class="text-center">Edit Address Details</h2>        
        <div class="form-group">
            <div class="input-group"> 
                <input type="text" name="first_name" value="{{$address->name}}" class="col-md-12 col-xs-12 form-control" placeholder="Full Name" maxlength="30" onkeypress="return ValidateAlpha(event);" required>
                 @if ($errors->has('first_name'))
                 <span class="help-block">
                 <strong>{{ $errors->first('first_name') }}</strong>
                 </span> 
                 @endif
            </div>
        </div>
        <div class="form-group">
            <div class="input-group"> 
                <input type="text" name="last_name" value="{{$address->last_name}}" class="col-md-12 col-xs-12 form-control" placeholder="Last Name" maxlength="30" onkeypress="return ValidateAlpha(event);" required>
                 @if ($errors->has('last_name'))
                 <span class="help-block">
                 <strong>{{ $errors->first('last_name') }}</strong>
                 </span> 
                 @endif
            </div>
        </div>
        <div class="form-group">
            <div class="input-group"> 
                <input type="text" name="company_name" value="{{$address->company_name}}" class="col-md-12 col-xs-12 form-control" placeholder="Company Name" maxlength="30" onkeypress="return ValidateAlpha(event);" >
                 @if ($errors->has('company_name'))
                 <span class="help-block">
                 <strong>{{ $errors->first('company_name') }}</strong>
                 </span> 
                 @endif
            </div>
        </div>


        <div class="form-group">
            <div class="input-group">
                <!-- {!! Form::text('phone_number', null, ['class' => 'col-md-12 col-xs-12 form-control','placeholder' => 'Phone No','maxlength' => '10','required' => 'required','onKeyPress' => 'return isNumberKey(event)']) !!} -->
               

                 <input readonly  style="padding-left: 9px;width: 53px;border-radius: 19px;color:#9788a7;padding-right: 0;border-right: 0;border-bottom-right-radius: 0;border-top-right-radius: 0;border-right: 1px solid #e6e6e6;" type="text" placeholder="+91" name="code" value="+91" style="width: 15px;">
                 <input type="text" style="border-left: 0;border-bottom-left-radius: 0;border-top-left-radius: 0;" name="phone_number" value="{{$address->phone_number}}" class="col-md-12 col-xs-12 form-control" placeholder="Phone No"  maxlength="14"  required>
               
               <!--  onkeypress="return isNumberKey(event);" -->
                 @if ($errors->has('phone_number'))
                 <span class="help-block">
                 <strong>{{ $errors->first('phone_number') }}</strong>
                 </span> 
                 @endif
            </div>
        </div>

        <div class="form-group">
            <div class="input-group">
                <!-- {!! Form::text('pin_code', null, ['class' => 'col-md-12 col-xs-12 form-control','placeholder' => 'Pin Code','maxlength' => '6','required' => 'required','onKeyPress' => 'return isNumberKey(event)']) !!} -->
                 <input type="text" name="pin_code" value="{{$address->pincode}}" class="col-md-12 col-xs-12 form-control" placeholder="Pin Code" maxlength="6" onkeypress="return isNumberKey(event);" required>

                 @if ($errors->has('pin_code'))
                 <span class="help-block">
                 <strong>{{ $errors->first('pin_code') }}</strong>
                 </span> 
                 @endif
            </div>
        </div>

        <div class="form-group">
            <div class="input-group">
                <!-- {!! Form::text('address_line_one', null, ['class' => 'col-md-12 col-xs-12 form-control','placeholder' => 'Locality/Area/Street','required' => 'required']) !!} -->
                <input type="text" name="address_line_one" value="{{$address->address_line_one}}" class="col-md-12 col-xs-12 form-control"  placeholder="Address" maxlength="200" required>
                 @if ($errors->has('address_line_one'))
                 <span class="help-block">
                 <strong>{{ $errors->first('address_line_one') }}</strong>
                 </span> 
                 @endif
            </div>
        </div>
         
        
        <div class="form-group">
            <div class="input-group">
                <!-- {!! Form::text('address_line_two', null, ['class' => 'col-md-12 col-xs-12 form-control','placeholder' => 'Flat number / Building Name','required' => 'required']) !!} -->
                <input type="text"  name="address_line_two" value="{{$address->address_line_two}}" class="col-md-12 col-xs-12 form-control" placeholder="Apartment suite,etc.(optional)" maxlength="200">
                 @if ($errors->has('address_line_two'))
                 <span class="help-block">
                 <strong>{{ $errors->first('address_line_two') }}</strong>
                 </span> 
                 @endif
            </div>
        </div>

         <!-- <div class="form-group">
            <div class="input-group">
                <input type="text" name="address_line_three" value="{{$address->address_line_three}}" class="col-md-12 col-xs-12 form-control" placeholder="Landmark" maxlength="30" required>
                 @if ($errors->has('address_line_three'))
                 <span class="help-block">
                 <strong>{{ $errors->first('address_line_three') }}</strong>
                 </span> 
                 @endif
            </div>
        </div> -->

        <div class="form-group">
            <div class="input-group">
                <input type="text" name="city" value="{{$address->city}}" maxlength="30" class="col-md-12 col-xs-12 form-control" placeholder="District / City"  required>
                 @if ($errors->has('city'))
                 <span class="help-block">
                 <strong>{{ $errors->first('city') }}</strong>
                 </span> 
                 @endif
            </div>
        </div>
        <div class="form-group">
            <div class="input-group">
              <!--   <input type="text" name="country" value="{{$address->country}}" maxlength="30" class="col-md-12 col-xs-12 form-control" placeholder="country"  required> -->
               <select id="country" name="country" class="col-md-12 col-xs-12 form-control">
                      <option value="India">{{$address->country}}</option>
                      <option value ="India">India</option>
               </select>
                 @if ($errors->has('country'))
                 <span class="help-block">
                 <strong>{{ $errors->first('country') }}</strong>
                 </span> 
                 @endif
            </div>
        </div>
        <div class="form-group">
            <div class="input-group">
               <!--  {!! Form::text('state', null, ['class' => 'col-md-12 col-xs-12 form-control','placeholder' => 'State','required' => 'required']) !!} -->
                <!-- <input type="text" name="state" value="{{$address->state}}" maxlength="30" class="col-md-12 col-xs-12 form-control" placeholder="State"  required> -->
                 <select name="state" id="state" class="col-md-12 col-xs-12 form-control">
                    <option value="{{$address->state}}">{{$address->state}}</option>
                    <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option><option value="Andhra Pradesh">Andhra Pradesh</option><option value="Arunachal Pradesh">Arunachal Pradesh</option><option value="Assam">Assam</option><option value="Bihar">Bihar</option><option value="Chandigarh">Chandigarh</option><option value="Chhattisgarh">Chhattisgarh</option><option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option><option value="Daman and Diu">Daman and Diu</option><option value="Delhi">Delhi</option><option value="Goa">Goa</option><option value="Gujarat">Gujarat</option><option value="Haryana">Haryana</option><option value="Himachal Pradesh">Himachal Pradesh</option><option value="Jammu and Kashmir">Jammu and Kashmir</option><option value="Jharkhand">Jharkhand</option><option value="Karnataka">Karnataka</option><option value="Kerala">Kerala</option><option value="Lakshadweep">Lakshadweep</option><option value="Madhya Pradesh">Madhya Pradesh</option><option value="Maharashtra">Maharashtra</option><option value="Manipur">Manipur</option><option value="Meghalaya">Meghalaya</option><option value="Mizoram">Mizoram</option><option value="Nagaland">Nagaland</option><option value="Orissa">Orissa</option><option value="Pondicherry">Pondicherry</option><option value="Punjab">Punjab</option><option value="Rajasthan">Rajasthan</option><option value="Sikkim">Sikkim</option><option value="Tamil Nadu">Tamil Nadu</option><option value="Tripura">Tripura</option><option value="Uttar Pradesh">Uttar Pradesh</option><option value="Uttaranchal">Uttaranchal</option><option value="West Bengal">West Bengal</option></select>
                 @if ($errors->has('state'))
                 <span class="help-block">
                 <strong>{{ $errors->first('state') }}</strong>
                 </span> 
                 @endif
            </div>
        </div>

        <div class="form-group">
            <div class="input-group">
              <p class="input-box radioButton">
                    <div class="radioButton-header">Address Type</div> 
                    @if($address->address_type == 1)
                         <input type="radio" class="radioButton" checked name="selectedAddressType" value="WORK">
                    @else
                         <input type="radio" class="radioButton" name="selectedAddressType" value="WORK">
                    @endif 

                    <label class="radio-text">Home</label>
                    @if($address->address_type == 2)
                         <input type="radio" class="radioButton" checked name="selectedAddressType" value="WORK">
                    @else
                         <input type="radio" class="radioButton" name="selectedAddressType" value="WORK">
                    @endif  
                   
                    <label class="radio-text">Work</label>
                    @if($address->address_type == 3)
                        <input type="radio" class="radioButton" checked name="selectedAddressType" value="OTHER">
                    @else
                        <input type="radio" class="radioButton" name="selectedAddressType" value="OTHER">
                    @endif        
                    <label class="radio-text">Others</label>
                </p>
            </div>

        </div> 
        <div class="form-group"> 
            <button type="submit" class="btn btn-success btn-block login-btn">Save</button>
        </div> 
   </form>
 </div>
      </div>
    <!--   <div class="modal-footer">
      </div> -->
    </div>
  </div>
</div>  
 <!-- Delete address pop start -->
<div class="modal fade" id="delete-{{$address->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" onclick="myFunction()"   data-dismiss="modal" aria-hidden="true">&times;</button>
       <!--  <h4 class="modal-title" id="myModalLabel">Modal title</h4> -->
      </div>
      <div class="modal-body">
    <div class="login-form"> 
    <form action="{{route('delete.address',[$address->id])}}" method="POST">
        @csrf
        <h3 class="text-center"> Are You sure you want to delete this Address? </h3> 
        <div class="mobaddr-box deleteboxaddress @if($address->is_permanent == 1)active-address @endif"  > 
      <div class="address-info-wrapper">
         <span class="address-book-user-name">{{$address->name}}</span>
         <!-- <div class="default-address-tag tan-color">Default Address</div> -->
         <div class="address-info">
            <div class="address-first">{{$address->address_line_one}}</div>
            <div class="address-second">{{$address->address_line_two}} , {{$address->address_line_three}}</div> 
            <div class="address-third">{{$address->city}}, {{$address->state}}</div>
            <div class="address-fifth">{{$address->country}}- {{$address->pincode}}</div>
         </div>
         <div class="address-mobile"><span>Mobile </span><span class="addFontWeight">{{$address->phone_number}}</span></div>
      </div>
      <div></div> 
   </div> 
        <div class="form-group"> 
            <button type="submit" class="btn btn-success btn-block deletebutton"  >Delete</button>
        </div> 
    </form>
 </div>
      </div>
     <!--  <div class="modal-footer">
      </div> -->
    </div>
  </div>
</div>   
<!-- Edit address pop end -->   
    @endforeach 
</div>
    </div> 
  </div>  
</div> 
<style type="text/css">
  div#add_new_address .modal-content {
    margin-top: 8px;
}
.modal-header {
    height: 25px!important;
}
</style>
<!-- Add new address pop start -->
<div class="modal fade" id="add_new_address" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" onclick="myFunction()"   data-dismiss="modal" aria-hidden="true">&times;</button>
       <!--  <h4 class="modal-title" id="myModalLabel">Modal title</h4> -->
      </div>
      <div class="modal-body">
    <div class="login-form">
     {!! Form::open(['route' => 'store.address' , 'enctype' => 'multipart/form-data']) !!}
        <h2 class="text-center">Add new address</h2>        
        <div class="form-group">
            <div class="input-group">
                {!! Form::text('first_name', null, ['class' => 'col-md-12 col-xs-12 form-control','placeholder' => 'Full Name','maxlength' => '30','onKeyPress' => 'return ValidateAlpha(event);','required' => 'required','onKeyPress' => 'return ValidateAlpha(event);']) !!}
                 @if ($errors->has('first_name'))
                 <span class="help-block">
                 <strong>{{ $errors->first('first_name') }}</strong>
                 </span> 
                 @endif
            </div>
        </div>

        <div class="form-group">
            <div class="input-group">
                {!! Form::text('last_name', null, ['class' => 'col-md-12 col-xs-12 form-control','placeholder' => 'Last Name','maxlength' => '30','onKeyPress' => 'return ValidateAlpha(event);','required' => 'required','onKeyPress' => 'return ValidateAlpha(event);']) !!}
                 @if ($errors->has('last_name'))
                 <span class="help-block">
                 <strong>{{ $errors->first('last_name') }}</strong>
                 </span> 
                 @endif
            </div>
        </div>

        <div class="form-group">
            <div class="input-group">
                {!! Form::text('company_name', null, ['class' => 'col-md-12 col-xs-12 form-control','placeholder' => 'Company Name','maxlength' => '30','onKeyPress' => 'return ValidateAlpha(event);','onKeyPress' => 'return ValidateAlpha(event);']) !!}
                 @if ($errors->has('company_name'))
                 <span class="help-block">
                 <strong>{{ $errors->first('company_name') }}</strong>
                 </span> 
                 @endif
            </div>
        </div>


        <div class="form-group">
            <div class="input-group">
                <input readonly  style="padding-left: 9px;width: 53px;border-radius: 19px;color:#9788a7;padding-right: 0;border-right: 0;border-bottom-right-radius: 0;border-top-right-radius: 0;border-right: 1px solid #e6e6e6;" type="text" placeholder="+91" name="code" value="+91" style="width: 15px;">
                {!! Form::text('phone_number', null, ['class' => 'col-md-12 col-xs-12 form-control','placeholder' => 'Phone No','maxlength' => '14','required' => 'required','style' => 'border-left: 0;border-bottom-left-radius: 0;border-top-left-radius: 0;']) !!}
             
               <!--  ,'onKeyPress' => 'return isNumberKey(event)' -->
                 @if ($errors->has('phone_number'))
                 <span class="help-block">
                 <strong>{{ $errors->first('phone_number') }}</strong>
                 </span> 
                 @endif
            </div>
        </div>

        <div class="form-group">
            <div class="input-group">
                {!! Form::text('pin_code', null, ['class' => 'col-md-12 col-xs-12 form-control','placeholder' => 'Pin Code','maxlength' => '6','required' => 'required','onKeyPress' => 'return isNumberKey(event)']) !!}
                 @if ($errors->has('pin_code'))
                 <span class="help-block">
                 <strong>{{ $errors->first('pin_code') }}</strong>
                 </span> 
                 @endif
            </div>
        </div>

        <div class="form-group">
            <div class="input-group">
                {!! Form::text('address_line_one', null, ['class' => 'col-md-12 col-xs-12 form-control','placeholder' => 'Address','maxlength' => '200','required' => 'required']) !!}
                 @if ($errors->has('address_line_one'))
                 <span class="help-block">
                 <strong>{{ $errors->first('address_line_one') }}</strong>
                 </span> 
                 @endif
            </div>
        </div>
         
        
        <div class="form-group">
            <div class="input-group">
                {!! Form::text('address_line_two', null, ['class' => 'col-md-12 col-xs-12 form-control','placeholder' => 'Apartment suite,etc.(optional)','maxlength' => '200']) !!}
                 @if ($errors->has('address_line_two'))
                 <span class="help-block">
                 <strong>{{ $errors->first('address_line_two') }}</strong>
                 </span> 
                 @endif
            </div>
        </div>

         <!-- <div class="form-group">
            <div class="input-group">
                {!! Form::text('address_line_three', null, ['class' => 'col-md-12 col-xs-12 form-control','placeholder' => 'Landmark','maxlength' => '30','required' => 'required']) !!}
                 @if ($errors->has('address_line_three'))
                 <span class="help-block">
                 <strong>{{ $errors->first('address_line_three') }}</strong>
                 </span> 
                 @endif
            </div>
        </div>
 -->
        <div class="form-group">
            <div class="input-group">
                {!! Form::text('city', null, ['class' => 'col-md-12 col-xs-12 form-control','placeholder' => 'District / City','maxlength' => '30','required' => 'required']) !!}
                 @if ($errors->has('city'))
                 <span class="help-block">
                 <strong>{{ $errors->first('city') }}</strong>
                 </span> 
                 @endif
            </div>
        </div>

        <div class="form-group">
            <div class="input-group">
                <select id="add_address_country" name="country"  class="col-md-12 col-xs-12 form-control" required="required">
                      <option value="">Select Country</option>
                           @if(count($country) > 0)
                           @foreach($country as $key => $value)
                              <option value="{{$value->id}}">{{$value->country_name}}</option>
                           @endforeach
                           @endif                             
                  </select>
                 @if ($errors->has('country'))
                 <span class="help-block">
                 <strong>{{ $errors->first('country') }}</strong>
                 </span> 
                 @endif
            </div>
        </div>
         <div class="form-group">
            <div class="input-group">
             <select  id="state_address" name="state"class="col-md-12 col-xs-12 form-control" required="required">
              <option value="">Select State</option>
                      </select>
                 @if ($errors->has('state'))
                 <span class="help-block">
                 <strong>{{ $errors->first('state') }}</strong>
                 </span> 
                 @endif
            </div>
        </div>
       <script type="text/javascript">
                   $(document).on('change','#add_address_country',function(){
                     //var countryVal = $("#country option:selected").attr('data-id');
                      var countryVal = $('#add_address_country').val();
                      var MySelectBox = '<option value="">Select State</option>';
                      var pdata = {'area': 'state','country_id':countryVal, 'state_id':""};

                      $.ajax({
                            type: "post",
                            data: pdata,
                            dataType:"xml",
                            url : '{{url('/getCountryStateAddress')}}',
                            cache:false,
                            data:{
                              'countryVal' : countryVal,
                              "_token": "{{ csrf_token() }}",
                            },
                           success: function(xml) {

                          //called when successful
                          $(xml).find('root').each(function(index, element) {

                             $(this).find('object').each(function(index, element) {

                              var obj_id   = $(this).find('id').text();

                              var obj_name = $(this).find('name').text();

                              MySelectBox +='<option value="'+obj_id+'">'+obj_name+'</option>';

                            })

                        });

                        $("#state_address").html(MySelectBox);

                        },

                        error: function(err) {

                        //called when there is an error

                        alert(err.message+"test");

                        }
                            });
                          });
                  </script>
        <div class="form-group">
            <div class="input-group">
              <p class="input-box radioButton"><div class="radioButton-header">Address Type</div><input type="radio" class="radioButton" name="selectedAddressType" value="HOME" checked=""><label class="radio-text">Home</label><input type="radio" class="radioButton" name="selectedAddressType" value="WORK"><label class="radio-text">Work</label><input type="radio" class="radioButton" name="selectedAddressType" value="OTHER"><label class="radio-text">Others</label></p>
            </div>
        </div> 


        <div class="form-group">
           
            <button type="submit" class="btn btn-success btn-block login-btn">Save</button>
        </div>
        
    {!! Form::close() !!}
 </div>
      </div>
      <!-- <div class="modal-footer">
      </div> -->
    </div>
  </div>
</div>  
<!-- Add new address pop end --> 

<style>
@media only screen and (max-width : 576px) {
  input{
    padding: 0!important;
    padding-left: 15px !important;
  }

    .addAddrBox {
        margin-bottom: 15px;
    }
}
.mobaddr-box {
    width: 100%;
}
.address-section .addAddrBox {
    color: #1d70ba!important;
}
.address-section .mobaddr-box.active-address {
    background-color: #f7f7f7!important;
    }
.modal-dialog {
    max-width: 660px!important;
}
.deletebutton{
    top:30px;
}
div#address_book {
    margin-top: 15px;
    margin-bottom: 15px;
}
.radioButton-header {
    float: left;
    width: 100%;
}
.mobaddr-box.deleteboxaddress.active-address {
    width: 100%!important;
}
input.radioButton {
    margin: 7px;
}
.btn-success {
    color: #fff;
    background-color: #1d70ba!important;
    border-color: #1d70ba!important;
}
.address-section {
    display: inline-block;
    width: 100%;
}
.address-section .addAddrBox {
    width: 100%;
    float: left;
    border: 1px solid #f0f0f0;
    height: 220px;
    color: #d5a249;
    /*margin-right: 20px;*/
    font-size: 14px;
    font-weight: 600;
}
#dAccountWrapper .mobaddr-pageadj .address-section .mobaddr-box {
   width: 100%;
    float: left;
   /* margin-right: 20px;*/
}
.address-section .addAddrBox .addrcenter {
    text-align: center;
    cursor: pointer;
    line-height: 220px;
}
.address-section .addAddrBox .addrcenter {
    text-align: center;
    cursor: pointer;
    line-height: 220px;
}
.address-section .addAddrBox {
  /*  width: 30.33%;*/
    float: left;
    border: 1px solid #f0f0f0;
    height: 220px;
    color: #d5a249;
    /*margin-right: 20px;*/
    font-size: 14px;
    font-weight: 600;
}
.address-section .mobaddr-box.active-address {
    border: 1px solid #f0f0f0;
    background-color: #fff8eb;
}
.active-address {
    border: 1px solid #1d70ba!important;
    background-color: #fff8eb;
}

.address-section .mobaddr-box {
    font-size: 14px;
    text-align: left;
    background-color: #fff;
    border: 1px solid #f0f0f0;
    margin-bottom: 20px;
    /*width: 30.33%!important;*/
    float: left!important;
    /*margin-right: 20px!important;*/
}
.address-section .mobaddr-box .address-info-wrapper {
    padding: 10px;
}
.address-section .mobaddr-box .edit-remove-button-container {
    padding: 10px;
    color: #176d93;
    font-weight: 600;
}
.address-section .mobaddr-box .edit-remove-button-container .mobaddr-icon-mar {
    cursor: pointer;
    padding-left: 10px;
}
.address-section .mobaddr-box .edit-remove-button-container .mobaddr-editc {
    cursor: pointer;
}
.address-section .mobaddr-box .edit-remove-button-container .mobaddr-selected-addr {
    color: #d5a249;
    float: right;
}
#dAccountWrapper .mobaddr-pageadj .address-section .mobaddr-box {
    /*width: 30.33%!important;*/
    float: left!important;
    /*margin-right: 20px!important;*/
}

div#address_book {
  background: #fff;
  border: 0!important;
}
.tab {
    border: 0px !important;
    background: #fff!important;
}
.tabcontent {
    border-left: 1px solid #cccccc!important;
}
.my_account_bg{
  background: #f7f7f7;float: left;width: 100%;padding-bottom: 30px;
    padding-top: 30px;
}
footer.footer {
    margin-top: 0;
}
/* Style the tab */
.tab {
  float: left;
  border: 1px solid #ccc;
  background-color: #f1f1f1;
  /*width: 30%;*/
  height: 300px;
}

/* Style the buttons inside the tab */
.tab button {
  display: block;
  background-color: inherit;
  color: black;
  padding: 22px 16px;
  width: 100%;
  border: none;
  outline: none;
  text-align: left;
  cursor: pointer;
  transition: 0.3s;
  font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}

/* Create an active/current "tab button" class */
.tab button.active {
  background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
  float: left;
  padding: 0px 12px;
  border: 1px solid #ccc;
  /*width: 70%;*/
  border-left: none;
  height: auto;
}
.tab {
  
    padding: 20px 20px 0px 20px;
}
.tabcontent {
    padding: 20px 20px 0px 20px;
}
</style>
 

@endsection
