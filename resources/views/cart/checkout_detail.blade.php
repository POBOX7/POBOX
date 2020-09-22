
@extends('new_resources.layouts.new_app') 
@section('content')
<center><div id="result"></div></center>
<nav aria-label="breadcrumb" class="breadcrumb-nav">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home_1')}}"><!-- <i class="icon-home"></i> -->Home</a></li>
             <li class="breadcrumb-item active" aria-current="page"><a href="{{route('newArrival')}}">Product Details</a></li>
             <li class="breadcrumb-item active" aria-current="page"><a href="{{route('cartPage')}}">Cart</a></li>
            <li class="breadcrumb-item active" aria-current="page">Checkout Detail</li>
        </ol>
    </div><!-- End .container -->
</nav>
<div class="checkout-detail-page">
  <div class="container">
    
    <div class="box-border shop-cart">

      <form class="form-horizontal form-label-left" {{-- action="{{route('checkoutPlaceOrder')}}" --}} method="post" id="checkout_form" >

      {{ csrf_field() }}
      
    
      
    
      <div class="row">
    <div class="col-sm-4 col-md-7 col-xs-12" style="background: #ffffff none repeat scroll 0 0;border-radius: 3px;float: left;<!--padding: 30px;-->line-height: 35px;">
       @if(!Auth::check())
      <div class=""> 
       <h1>Contact Information</h1>
         <label for="address1">Email<span class="redColor">*</span></label>
        <input type="email" name="email" id="guest_email" value="" class="address_address form-control" required="required" >
        <span class="text-danger" class="error"></span>     
                   
           
       </div>
        @endif
       <h1>Checkout Details </h1>
       <div class="panel-group" id="accordion">
        <div class="panel panel-default">
            <!-- <a data-toggle="collapse" href="#collapseOne" class="changeState"> -->
              <div class="panel-heading" style="border: 1px solid #ddd!important;">
                  <h4 class="panel-title" >
                      1. Shipping Information 
                  </h4>
                 
                  <h4 class="pull-right" style="margin-top: -17px;">
                    <!--  <i class="fa fa-minus changeIcon"></i> --> 
                  </h4>
              </div>
            </a>  
            <div id="collapseOne" class="panel-collapse collapse in show" style="width: 100%">
                <div class="panel-body" style="border: 1px solid #ddd;">
                    
                  
          <div class="col-md-12">
                        <label>Shipping Destination * (In order to ship your package timely and accurately, please input all the shipping information in English)</label>
                        <br/>
                        
              @if(Auth::check())
          
              <input name="address_selection" type="radio" value="old" checked="true" required="required" /><label>Choose from existing addresses.</label><br>
                <span class="text-danger" class="error" id="spanaddress"></span>
                <select type="text" name="address" id="address_old"  class="choose_address form-control"  style="min-width: 100%;" required="required"> <!-- disabled -->
                  <option class="tick_shipping" value="">Select Address</option>
                  @foreach($addresses as $keye => $value)
                    <option class="tick_shipping" value="{{$value->id}}" address-value='' name="{{$value->name}}" last_name="{{$value->last_name}}" company_name="{{$value->company_name}}"  phone_number="{{$value->phone_number}}" pincode="{{$value->pincode}}"  address_line_one="{{$value->address_line_one}}" address_line_two="{{$value->address_line_two}}"  city="{{$value->city}}"  country="{{$value->country}}" state="{{$value->state}}" >{{$value->name .' '.$value->last_name.','.$value->company_name.' - '. $value->address_line_one.', '.$value->address_line_two.', '.$value->address_line_three.'  '.$value->pincode.', '.$value->city.', '.$value->state, '.$value->country.' }}</option> 
                  @endforeach
                </select>   
                <input name="address_selection"  type="radio" value="new"/><label>Add a new shipping address</label>
                @else
                   <input name="address_selection"  type="hidden" value="new"/>
                @endif
            
                    
                    </div>
          
                    <div class="col-md-6 col-xs-12 float-left">
                      <label for="first_name">First name<span class="redColor">*</span></label>
                       <input type="text" name="first_name" id="first_name" type="text" class="address_name form-control"  required="required" {{Auth::check()? "disabled":""}}>
                       <span class="text-danger" class="error"></span>
                    </div>
                     <div class="col-md-6 col-xs-12 float-left">
                      <label for="first_name">Last name<span class="redColor">*</span></label>
                       <input type="text" name="last_name" id="last_name" type="text" class="address_name form-control"  required="required" {{Auth::check()? "disabled":""}}>
                       <span class="text-danger" class="error"></span>
                    </div>
                    <div class="col-md-12 col-xs-12 float-left">
                      <label for="company name">Company (optional)<!-- <span class="redColor">*</span> --></label>
                       <input type="text" name="company_name" id="company_name" type="text" class="address_name form-control" {{Auth::check()? "disabled":""}}>
                       <span class="text-danger" class="error"></span>
                    </div>

                    <div class="col-md-12 col-xs-12 float-left">
                      <label for="address1">Address<span class="redColor">*</span></label>
                      <input type="text" name="address_line_one" id="address_line_one" type="text" maxlength="30" class="address_address form-control" required="required" {{Auth::check()? "disabled":""}}>
                      <span class="text-danger" class="error"></span>                  
                    </div>
                    
                  
                    <div class="col-md-12 col-xs-12 float-left">
                      <label for="address1">Apartment suite,etc.(optional)<!-- <span class="redColor">*</span> --></label>
                      <input type="text" name="address_line_two" id="address_line_two" type="text" maxlength="30" class="address_address form-control"  {{Auth::check()? "disabled":""}}>
                      <span class="text-danger" class="error"></span>                   
                    </div>

                   <div class="col-md-6 col-xs-12 float-left">
                    <label for="address1">City<span class="redColor">*</span> </label>
                    <input type="text" name="city" id="city" type="text" class="address_address form-control" maxlength="30" {{Auth::check()? "disabled":""}}>
                    <span class="text-danger" class="error"></span>
                  </div>
                    
                    <div class="col-md-6 col-xs-12 float-left">
                      <label for="address1">Country<span class="redColor">*</span> </label>
                     <select id="country" name="country" {{Auth::check()? "disabled":""}} class="address_address form-control">
                      <option value="">Select Country</option>
                                 @if(count($country) > 0)
                                 @foreach($country as $key => $value)
                                    <option value="{{$value->country_name}}">{{$value->country_name}}</option>
                                 @endforeach
                                 @endif                             
                  </select>
 
                       <span class="text-danger" class="error"></span> 
                    </div>
                   <div class="col-md-6 col-xs-12 float-left">
                      <label for="address1">State<span class="redColor">*</span> </label>
                      <select id="state"  name="state" class="state_value address_address col-md-12 col-xs-12 form-control" {{Auth::check()? "disabled":""}}>
                        
                      </select>

                    <!--   <input type="text" name="" class="state_value"> -->

                     <span class="text-danger" class="error"></span> 
                   </div>
                
                    
                  <script type="text/javascript">
                   $(document).on('change','#country',function(){
                     //var countryVal = $("#country option:selected").attr('data-id');
                      var countryVal = $('#country').val();
                      var MySelectBox = '<option value="">Select State</option>';
                      var pdata = {'area': 'state','country_id':countryVal, 'state_id':""};

                      $.ajax({
                            type: "post",
                            data: pdata,
                            dataType:"xml",
                            url : '{{url('/getCountryState')}}',
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

                        $("#state").html(MySelectBox);

                        },

                        error: function(err) {

                        //called when there is an error

                        alert(err.message+"test");

                        }
                            });
                          });
                  </script>
                   

                    <div class="col-md-6 col-xs-12 float-left">
                      <label for="address1">Pin code<span class="redColor">*</span></label>
                      <input type="number" name="pincode" id="pincode" type="text" class="address_address form-control" maxlength="6" required="required" {{Auth::check()? "disabled":""}}>
                        <span class="text-danger" class="error"></span>                    
                    </div>


                      <div class="col-md-6 col-xs-12 float-left">
                      <label for="address1">Phone no<span class="redColor">*</span></label>
                      <input type="number" onKeyPress="if(this.value.length==10) return false;" name="phone_number" id="phone_number"  maxlength="10" class="address_address form-control"  minlength="10" required="required" {{Auth::check()? "disabled":""}}>
            <span class="text-danger" class="error"></span>
          </div>
          
         
                </div>
            </div>
        </div>

        <div class="panel panel-default ">
           <!--  <a data-toggle="collapse" href="#collapseTwo" class="changeState"> -->
            </a>
              <div class="panel-heading" style="border: 1px solid #ddd!important;float: left;width: 100%;">
                  <h4 class="panel-title" >
                      2. Billing Information
                  </h4>
                  <h4 class="pull-right" style="margin-top: -17px;">
                    <!--  <i class="fa fa-minus changeIcon"></i> --> 
                  </h4>
              </div>
            <script>

$(document).ready(function(){
  $("input[type='radio'][name='answer']").change(function(){
    if($(this).val()=="add_new_billing_address"){
      //alert("hii");
      $("#test1").show();
      $("#test2").show();
      $("#test3").show();
      $("#test4").show();
      $("#test5").show();
      $("#test6").show();
      $("#test7").show();
      $("#test8").show();
      $("#test9").show();
      $("#test10").show();

       $('#billing_first_name').val('');
       $('#billing_last_name').val('');
       $('#billing_company_name').val('');
       $('#billing_pincode').val('');
       $('#billing_address_line_one').val('');
       $('#billing_address_line_two').val('');
       $('#billing_city').val('');
       $('#billing_country').val('');
       $('#billing_state').val('');
       $('#billing_phone_number').val('');

       $('#billing_first_name').removeAttr("disabled");
       $('#billing_last_name').removeAttr("disabled");
       $('#billing_company_name').removeAttr("disabled");
       $('#billing_pincode').removeAttr("disabled"); 
       $('#billing_address_line_one').removeAttr("disabled");
       $('#billing_address_line_two').removeAttr("disabled");
       $('#billing_city').removeAttr("disabled");
       $('#billing_country').removeAttr("disabled");
       $('#billing_state').removeAttr("disabled");
       $('#billing_phone_number').removeAttr("disabled");




    }else{
      $("#test1").hide(); 
      $("#test2").hide(); 
      $("#test3").hide(); 
      $("#test4").hide(); 
      $("#test5").hide(); 
      $("#test6").hide(); 
      $("#test7").hide(); 
      $("#test8").hide();
      $("#test9").hide();
      $("#test10").hide(); 
    }
  });
});
</script>
            <div id="collapseTwo" class="panel-collapse collapse in show" style="width: 100%">
                <div class="panel-body" style="border:1px solid #ddd;border-bottom: 1px solid #ddd!important">
                
                    <div class="col-md-12 hidden-sm ">
                     <!--  <p> -->
                      

                         <input class="styled-checkbox tick" id="biiling_same_as_address" type="radio" name="answer" checked="checked"  value="no"/> 
                         <span>Billing address same as shipping address?</span>
                          <!-- <span class="text-danger" class="error" id="billingid"></span> --> 
                         <br>


                        <input type="radio" name="answer" id="add_new_billing_address" value="add_new_billing_address"/>Add new billing address
                        <br>
                       
                      <div class="col-md-6 col-xs-12 float-left" style="display:none;" id="test1">
                         <label for="first_name">First Name<span class="redColor">*</span></label>
                          <input type="text" name="billing_first_name" id="billing_first_name" type="text" class="address_name form-control">
                          <span class="text-danger" class="error"></span>     
                      </div>
                      <div class="col-md-6 col-xs-12 float-left" style="display:none;" id="test2">
                         <label for="first_name">Last Name<span class="redColor">*</span></label>
                 
                          <input type="text" name="billing_last_name" id="billing_last_name" type="text" class="address_name form-control">
                          <span class="text-danger" class="error"></span>     
                      </div>
                      <div class="col-md-12 col-xs-12 float-left" style="display:none;" id="test3">
                         <label for="first_name">Company (optional)<!-- *<span class="redColor">*</span> --></label>
                 
                          <input type="text" name="billing_company_name" id="billing_company_name" type="text" class="address_name form-control" >
                          <span class="text-danger" class="error"></span>     
                      </div>
                      
                       <div class="col-md-6 col-xs-12 float-left" style="display:none;" id="test4">
                          <label for="address1">Pin code<span class="redColor">*</span></label>
                      <input type="number" name="billing_pincode" id="billing_pincode" type="text" class="address_address form-control" maxlength="6">
                      <span class="text-danger" class="error"></span>      
                      </div>
                       <div class="col-md-6 col-xs-12 float-left" style="display:none;" id="test5">
                          <label for="address1">Address<span class="redColor">*</span></label>
                          <input type="text" name="billing_address_line_one" id="billing_address_line_one" type="text" class="address_address form-control">
                          <span class="text-danger" class="error"></span>      
                      </div>
                       <div class="col-md-6 col-xs-12 float-left" style="display:none;" id="test6">
                         <label for="address1">Apartment suite,etc.(optional)<!-- <span class="redColor">*</span> --></label>
                            <input type="text" name="billing_address_line_two" id="billing_address_line_two" type="text" class="address_address form-control">
                         <span class="text-danger" class="error"></span>     
                      </div>
                     
                      <div class="col-md-6 col-xs-12 float-left" style="display:none;" id="test7">
                          <label for="address1">City<span class="redColor">*</span> </label>
                            <input type="text" name="billing_city" id="billing_city" type="text" class="address_address form-control">
                            <span class="text-danger" class="error"></span>  
                      </div>
                      <div class="col-md-6 col-xs-12 float-left" style="display:none;" id="test8">
                          <label for="address1">Country<span class="redColor">*</span> </label>
                     <!--  <input type="text" name="billing_country" id="billing_country" type="text" class="address_address form-control"> -->
                     <!--  <select id="billing_country" name="billing_country"  class="address_address form-control">
                        <option value="">Select country</option>
                        <option value ="India">India</option>
                     </select> -->
                             <select id="billing_country" name="billing_country"  class="address_address form-control">
                                <option value="">Select Country</option>
                               @if(count($country) > 0)
                               @foreach($country as $key => $value)
                                  <option value="{{$value->country_name}}">{{$value->country_name}}</option>
                               @endforeach
                               @endif        
                             </select>
 
                      <span class="text-danger" class="error"></span>       
                      </div>
                      <div class="col-md-6 col-xs-12 float-left" style="display:none;" id="test9">
                          <label for="address1">State<span class="redColor">*</span> </label>
                         
                        <select name="billing_state" id="billing_state"  class="address_address col-md-12 col-xs-12 form-control" >
                        </select>
                      <span class="text-danger" class="error"></span>       
                    </div>
                   <script type="text/javascript">
                   $(document).on('change','#billing_country',function(){
                     //var countryVal = $("#country option:selected").attr('data-id');
                      var countryVal = $('#billing_country').val();
                      var MySelectBox = '<option value="">Select State</option>';
                      var pdata = {'area': 'state','country_id':countryVal, 'state_id':""};

                      $.ajax({
                            type: "post",
                            data: pdata,
                            dataType:"xml",
                            url : '{{url('/getCountryStatebilling')}}',
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

                        $("#billing_state").html(MySelectBox);

                        },

                        error: function(err) {

                        //called when there is an error

                        alert(err.message+"test");

                        }
                            });
                          });
                  </script>
  

                    <div class="col-md-6 col-xs-12 float-left" style="display:none;" id="test10">
                           <label for="address1">Phone no<span class="redColor">*</span></label>
                            <input type="number" name="billing_phone_number" id="billing_phone_number" onKeyPress="if(this.value.length==10) return false;"  type="text" class="address_address form-control" maxlength="10" minlength="10">
                            <span class="text-danger" class="error"></span>         
                    </div>
                 <!--  </p> -->
                </div>
        <div class="col-md-6 col-xs-12 float-left" style="display: none;">
            <label for="first_name">First Name<span class="redColor">*</span></label>
            <input type="text" name="billing_first_name" id="billing_first_name" type="text" class="address_name form-control" >
            <span class="text-danger" class="error"></span>      
          </div>

           <div class="col-md-6 col-xs-12 float-left" style="display: none;">
            <label for="first_name">Last Name<span class="redColor">*</span></label>
            <input type="text" name="billing_last_name" id="billing_last_name" type="text" class="address_name form-control" >
            <span class="text-danger" class="error"></span>      
          </div>

          <div class="col-md-12 col-xs-12 float-left" style="display: none;">
            <label for="first_name">Company (optional)<!-- <span class="redColor">*</span> --></label>
            <input type="text" name="billing_company_name" id="billing_company_name" type="text" class="address_name form-control" >
            <span class="text-danger" class="error"></span>      
          </div>

          

                    <div class="col-md-6 col-xs-12 float-left" style="display: none;">
                      <label for="address1">Pin code<span class="redColor">*</span></label>
                      <input type="number" name="billing_pincode" id="billing_pincode" type="text" class="address_address form-control" maxlength="6">
                      <span class="text-danger" class="error"></span>      
          </div>

          <div class="col-md-6 col-xs-12 float-left" style="display: none;">
                <label for="address1">Address<span class="redColor">*</span></label>
                <input type="text" name="billing_address_line_one" id="billing_address_line_one" type="text" class="address_address form-control">
                <span class="text-danger" class="error"></span>      
          </div>
             
          <div class="col-md-6 col-xs-12 float-left" style="display: none;">
              <label for="address1">Apartment suite,etc.(optional)<!-- <span class="redColor">*</span> --></label>
              <input type="text" name="billing_address_line_two" id="billing_address_line_two" type="text" class="address_address form-control">
           <span class="text-danger" class="error"></span>                        
          </div>
                   
        
          <div class="col-md-6 col-xs-12 float-left" style="display: none;">
            <label for="address1">City<span class="redColor">*</span> </label>
            <input type="text" name="billing_city" id="billing_city" type="text" class="address_address form-control">
            <span class="text-danger" class="error"></span>      
          </div>

          <div class="col-md-6 col-xs-12 float-left" style="display: none;">
            <label for="address1">Country<span class="redColor">*</span> </label>
           <!--  <input type="text" name="billing_country" id="billing_country" type="text" class="address_address form-control"> -->
            <select id="billing_country" name="billing_country" {{Auth::check()? "disabled":""}} class="address_address form-control">
              <option value="">Select country</option>
              <option value ="India">India</option>
               
             </select>
            <span class="text-danger" class="error"></span>      
          </div>
          <div class="col-md-6 col-xs-12 float-left" style="display: none;">
            <label for="address1">State<span class="redColor">*</span> </label>
           <!--  <input type="text" name="billing_state" id="billing_state" type="text" class="address_address form-control"> -->
            <select name="billing_state" id="billing_state" class="address_address col-md-12 col-xs-12 form-control" {{Auth::check()? "disabled":""}}><option value="">Select State</option><option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option><option value="Andhra Pradesh">Andhra Pradesh</option><option value="Arunachal Pradesh">Arunachal Pradesh</option><option value="Assam">Assam</option><option value="Bihar">Bihar</option><option value="Chandigarh">Chandigarh</option><option value="Chhattisgarh">Chhattisgarh</option><option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option><option value="Daman and Diu">Daman and Diu</option><option value="Delhi">Delhi</option><option value="Goa">Goa</option><option value="Gujarat">Gujarat</option><option value="Haryana">Haryana</option><option value="Himachal Pradesh">Himachal Pradesh</option><option value="Jammu and Kashmir">Jammu and Kashmir</option><option value="Jharkhand">Jharkhand</option><option value="Karnataka">Karnataka</option><option value="Kerala">Kerala</option><option value="Lakshadweep">Lakshadweep</option><option value="Madhya Pradesh">Madhya Pradesh</option><option value="Maharashtra">Maharashtra</option><option value="Manipur">Manipur</option><option value="Meghalaya">Meghalaya</option><option value="Mizoram">Mizoram</option><option value="Nagaland">Nagaland</option><option value="Orissa">Orissa</option><option value="Pondicherry">Pondicherry</option><option value="Punjab">Punjab</option><option value="Rajasthan">Rajasthan</option><option value="Sikkim">Sikkim</option><option value="Tamil Nadu">Tamil Nadu</option><option value="Tripura">Tripura</option><option value="Uttar Pradesh">Uttar Pradesh</option><option value="Uttaranchal">Uttaranchal</option><option value="West Bengal">West Bengal</option></select>
            <span class="text-danger" class="error"></span>      
          </div>
          <div class="col-md-6 col-xs-12 float-left" style="display: none;">
                <label for="address1">Phone no<span class="redColor">*</span></label>
                <input type="number" name="billing_phone_number" id="billing_phone_number"  type="text" onKeyPress="if(this.value.length==10) return false;" class="address_address form-control" maxlength="10" minlength="10">
                <span class="text-danger" class="error"></span>      
          </div>
                </div>
            </div>
      
        </div>
    </div>
  </div>

      <div class="col-lg-4" style="margin-top:1px;!important">
                            <div class="order-summary">
                                <h3>Summary</h3>

                                <h4>
                                    <a data-toggle="collapse" href="#order-cart-section" class="" role="button" aria-expanded="true" aria-controls="order-cart-section">
                                    {{count($productDetail)}} products in Cart</a>
                                </h4>

                                <div class="collapse show" id="order-cart-section" style="">
                                    <table class="table table-mini-cart">
                                        <tbody>
                    
                                      @php
                                        $Subtotal  = 0;
                                        $GST=0;
                                        $discount=0;
                                        $total_out_of_stock_item = 0;
                                      @endphp
                      
                                  @foreach($productDetail as $keye => $value)
                       
                                            <tr>
                                                <td class="product-col">
                                                    <figure class="product-image-container">
                                                        <a href="" class="product-image">
                                                            <img src="{{ asset('assets/upload_images/product') }}/{{$value->image}}" alt="product">
                                                        </a>
                                                    </figure>
                                                    <div>
                                                        <h2 class="product-title">
                                                            <a href="">{{$value->name}}</a>
                                                        </h2>
                                                        @if($value->out_of_stock == 'Yes')
                                                          <span  class="product-qty" style="color:red ">some of your products are out of stock,please upadate cart or remove Product <a href="{{route('removeproductfromcheckout',$value->cart_id)}}">Remove</a></span>

                                                            {{$total_out_of_stock_item = $total_out_of_stock_item + 1}}


                                                        @endif
                                                        <span class="product-qty">Qty: {{$value->qty}}</span>
                                                        <div class="cart_size">
                                                           <ul>
                                                              <li>{{$value->size_name}}</li>
                                                          </ul>
                                                        </div>
                                                        <div class="cart_color">
                                                            <ul>
                                                                <li style="background: {{$value->hex_code}}">Red</li>
                                                            </ul>
                                                        </div>
                                                        
                                                    </div>
                                                </td>
                                                <td class="price-col">₹{{$value->qty * $value->price}}<br/><strike>₹{{$value->qty * $value->mrp}}</strike></td>
                                            </tr>
                                            <!-- $Subtotal += ($value->qty * $value->mrp); -->
                                           <!--  $GST = $GST + ($value->qty * $value->gst); -->
                                               @php
                                               
                                               if(isset($value->cart_total_mrp_price)){
                                                 $Subtotal += ($value->cart_total_mrp_price);
                                               }
                                               if(!isset($value->cart_total_mrp_price)){
                                                    $Subtotal += ($value->qty * $value->mrp);
                                                }
                                               
                                               $discount += $value->qty * ($value->mrp - $value->price) ;
                                              $GST= ($Subtotal - $discount) * $value->gstper / 100;
                                              @endphp
                                            @endforeach
                                            <input type="hidden" id="out_of_stock_item" value="{{$total_out_of_stock_item}}">
                                        </tbody>    
                                    </table>
                                    <table class="table table-totals">
                                    <tbody>
                                        <tr>
                                            <td>Bag Total</td>
                                            {{ session()->put('bag_total',$Subtotal)}}
                                            <td style="text-align: right!important;">₹{{$Subtotal }}</td>
                                        </tr>
                                         <tr>
                                            <td>You Saved</td>
                                            <td style="text-align: right!important;">
                                            ₹{{$discount}}
                                  
                                          </td>
                                            <input type="hidden" name="you_save_amount" value="{{$discount}}">
                                            {{ session()->put('you_save_amount',$discount)}}
                                        </tr>
                                       
                                         <tr>
                                           

                                            <td>Promo Code Discount</td>
                                            <td id="discount" class="CouponDiscount remove_coupon_discount">₹0</td>

                                            <input id="CouponAmount" type="hidden" name="coupon" value="" class="CouponDiscountFinal remove_coupon_discount">
                                        </tr> 
                                        
                                        <tr>
                                            <td>Applicable GST(5%)</td>
                                            <td style="text-align: right!important;">
                                            ₹{{round($GST)}}

                                    <input type="hidden" name="gst_amount_total" value="{{round($GST)}}">
                                    {{ session()->put('gst_amount_total',$GST)}}

                                          </td>
                                    
                                        </tr>
                                       
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td style="text-align: left!important;padding-left: 5px;">Order Total</td>
<input type="hidden" name="nnnn" value="0" class="ttt">
                        <input type="hidden" name="totalamount" class="final_price_payment" value="{{round(($Subtotal - $discount) + $GST)}}">
                            <!-- Amount pass in payment -->
                            <input type="hidden"  name="totalamount" class="totalAfterDiscountssss totalAfterDiscount remove_original_sub_total_price" value="{{($Subtotal - $discount) + $GST}}" id="ordertotal"/>
                          <input type="hidden" name="paymentid" value="" id="paymentid"/>
                      <td><span class="totalAfterDiscount remove_original_sub_total_price">₹{{round(($Subtotal - $discount) + $GST)}}</span></td>
                                        </tr>
                                        

                                    </tfoot>
                                </table>
                                <h4 style="padding-bottom: 10px;padding-top: 10px;border-bottom: 0;">Apply Discount Code</h4>
                                <div class="apply-coupons coupons-div" style="float: left;width: 100%;">

                        <input type="text" id="couponCode" class="form-control" name="couponCode" placeholder="Coupon Code"  style="border: 1px solid #dededf;border-radius: 3px;float: left;font-family: Roboto;font-size: 15px;margin-bottom: 15px;padding: 18px 20px;width: 65%;" />
                      
                        

                           @if (Auth::check() == 1)
                               <a  href="javascript:void(0);" class="couponButton button btn btn-sm btn-primary" style="float: left;width: 32%;margin-left: 5px;padding: 13px;">Apply coupon</a>
                                @else
                          

                                  <script type="text/javascript">
                                  $(document).ready(function(){
                                  $("p").click(function(){
                                    alert("Please login to apply coupon");
                                  });
                                });
                                </script>

                                        <a  href="javascript:void(0);" class="button btn btn-sm btn-primary" style="float: left;width: 32%;margin-left: 5px;padding: 13px;color: #ffff !important;" id="login" data-toggle="modal" data-dismiss="modal"  data-target="#login">Apply coupon</a>
                    
                                @endif

                           <a href="javascript:void(0);" class="close remove-coupon-code" data-dismiss="alert" aria-label="close" style="position: absolute;margin-top: 10px;" >&times;</a>
                       </div>
                                </div><!-- End #order-cart-section -->

                            </div><!-- End .order-summary -->
                            <div class="row">
                            <div class="col-lg-12">
                                <div class="checkout-steps-action">
                                    @if(!(Auth::id() > 0))
                                     <input type="button" class="btn btn-primary float-right" id="paybtn" value="Proceed to Payment" />
                                     <!-- <button type="button" class="btn btn-primary float-right" id="paybtn">Proceed to Payment</a> -->
                                    @else 
                                     <input type="button" class="btn btn-primary float-right" id="paybtn" value="Proceed to Payment" />
                                     <!-- <button type="button"class="btn btn-primary float-right" id="paybtn">Proceed to Payment</a> -->
                                    @endif  
                                </div><!-- End .checkout-steps-action -->
                            </div><!-- End .col-lg-8 -->
                        </div><!-- End .row -->
                <input type="hidden" name="original_tax_price" class="original_tax_price" value="{{$GST}}"> 
              <input type="hidden" name="original_sub_total_price" class="original_sub_total_price" value="{{round(($Subtotal - $discount) + $GST)}}">
              <input type="hidden" class="processing_price" name="processing_price" value="{{($Subtotal - $discount) + $GST}}">

              <input type="hidden" name="main_price"  class="main_price" value="{{round(($Subtotal - $discount))}}">
                  
                        </div>
     </div></form>
    </div>
  </div>
</div>


<!-- Delete address pop start -->
<div class="modal fade" id="out_of_stock_popup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" onclick="myFunction()"   data-dismiss="modal" aria-hidden="true">&times;</button>
       <!--  <h4 class="modal-title" id="myModalLabel">Modal title</h4> -->
      </div>
      <div class="modal-body">
        <div class="login-form">
            <h3 class="text-center"> Please remove out of stock product </h3> 
            <div class="address-info-wrapper">
               
            </div>
          <div>
            
          </div> 
        </div> 
        {{-- <div class="form-group"> 
            <button type="submit" class="btn btn-success btn-block deletebutton"  >Ok</button>
        </div>  --}}
      </div>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>   
<!-- Edit address pop end --> 
<script type="text/javascript">
    $('.remove-coupon-code').hide();
    $('.couponButton').on('click',function(){
    
    $('.remove-coupon-code').show();
    var coupon = $('#couponCode').val();
    var total_price = $('.processing_price').val();
     var main_price = $('.main_price').val();
     
    if(coupon){        
      $.ajax({
          type: "post",
          url : '{{url('/check-coupon')}}',
          cache:false,
          data:{
            'coupon' : coupon,
            'total_price' : total_price,
            'main_price' : main_price,
            
            "_token": "{{ csrf_token() }}",
          },
          success:function(data){
           //userCouponsUseOneTime
           if (data.userCouponsUseOneTime == 1) {
                $("#result").html('<div class="alert alert-success"><button type="button" class="close">×</button>This promo code is already used by you once. You can not redeem promo code more than one time.</div>');
                 window.setTimeout(function() {
                    $(".alert").fadeTo(500, 0).slideUp(500, function(){
                        $(this).remove(); 
                    });
                 }, 5000);
                 $('.alert .close').on("click", function(e){
                    $(this).parent().fadeTo(500, 0).slideUp(500);
                 });

            }

            // Expired coupon 
            if (data.expired_coupon == 0) {
                $("#result").html('<div class="alert alert-success"><button type="button" class="close">×</button>Your discount code has expired!</div>');
                 window.setTimeout(function() {
                    $(".alert").fadeTo(500, 0).slideUp(500, function(){
                        $(this).remove(); 
                    });
                 }, 5000);
                 $('.alert .close').on("click", function(e){
                    $(this).parent().fadeTo(500, 0).slideUp(500);
                 });
            }
            if(data.couponInvalid== 0){
                        $("#result").html('<div class="alert alert-success"><button type="button" class="close">×</button>Discount code is invalid!</div>');
                         window.setTimeout(function() {
                            $(".alert").fadeTo(500, 0).slideUp(500, function(){
                                $(this).remove(); 
                            });
                         }, 5000);
                         $('.alert .close').on("click", function(e){
                            $(this).parent().fadeTo(500, 0).slideUp(500);
                         });
                    }
         
                    if (data.userCouponsUseOneTime == 0) {
                 if (data.expired_coupon == 1) {
                       if(data.discount !== 0){
                         $('.totalAfterDiscount').html(data.afterdiscount);
                         $('.totalAfterDiscountssss').val(data.afterdiscount);
                        $('.CouponDiscount').html(data.discount);
                        $(".CouponDiscountFinal").val(data.discount);
                        $('.final_price_payment').attr('value',data.afterdiscount);
                        $('.ttt').attr('value',data.discount);
                       
                        $("#result").html('<div class="alert alert-success"><button type="button" class="close">×</button>Coupon Successfully applied!</div>');
                         window.setTimeout(function() {
                            $(".alert").fadeTo(500, 0).slideUp(500, function(){
                                $(this).remove(); 
                            });
                         }, 5000);
                         $('.alert .close').on("click", function(e){
                            $(this).parent().fadeTo(500, 0).slideUp(500);
                         });
                     }
                  }
              }

            }
      });

    } else {
        $('.remove-coupon-code').hide();
      //swal("Please Enter Coupon");
            $("#result").html('<div class="alert alert-success"><button type="button" class="close">×</button>Please Enter Coupon!</div>');
                 window.setTimeout(function() {
                    $(".alert").fadeTo(500, 0).slideUp(500, function(){
                        $(this).remove(); 
                    });
                 }, 5000);
                 $('.alert .close').on("click", function(e){
                    $(this).parent().fadeTo(500, 0).slideUp(500);
                 });
      
    }
   
  });

    $('.remove-coupon-code').on('click',function(){
     $('.remove-coupon-code').hide();
      var coupon = $('#couponCode').val();
      $('#couponCode').val("");
      
      var total_price = $('.processing_price').val();
      var original_sub_total_price = $('.original_sub_total_price').val();
      var original_tax_price = $('.original_tax_price').val();


       if(coupon){
      $.ajax({
          type: "post",
          url : '{{url('/remove-coupon')}}',
          cache:false,
          data:{
            "coupon":coupon,
            "original_tax_price":original_tax_price,
            "original_sub_total_price":original_sub_total_price,
            "total_price" : total_price,
            "_token": "{{ csrf_token() }}",
          },
          success:function(data){
           //toastr[data.type](data.message);
             $('.remove_original_tax_price').html(data.original_tax_price);
            $('.remove_original_sub_total_price').html(data.original_sub_total_price);
            //alert(data.original_sub_total_price);
             $(".remove_coupon_discount").html("0");
             $(".remove_coupon_discount").val("0");
             $('.remove_message').html(data.message);

                 $("#result").html('<div class="alert alert-success"><button type="button" class="close">×</button>Coupon removed successfully!</div>');
                 window.setTimeout(function() {
                    $(".alert").fadeTo(500, 0).slideUp(500, function(){
                        $(this).remove(); 
                    });
                 }, 5000);
                 $('.alert .close').on("click", function(e){
                    $(this).parent().fadeTo(500, 0).slideUp(500);
                 });
             //swal("Coupon removed successfully");
          }
      });
  }
  });
//
</script>
<style type="text/css">
.panel-body {
    float: left;
    width: 100%;
    border: 1px solid rgb(141, 153, 174);
}
.table.table-totals tbody tr td {
    padding-top: 1.6rem;
    text-align: left!important;
    padding-left: 5px!important;
}
form h2 {
    margin-top: 0;
}
.order-summary {
    margin-top: 0!important;
    }
  .checkout-detail-page {
    padding-top: 30px;
    padding-bottom: 30px;
}
#shoping-cart .box-border {
    margin-bottom: 15px;
}
.panel-group .panel {
    margin-bottom: 0;
    border-radius: 4px;
}
.panel-default {
    border-color: #fff!important;
}
.panel-default {
    border-color: #ddd;
}
.panel {
    margin-bottom: 20px;
    background-color: #fff;
    border: 1px solid transparent;
    border-radius: 4px;
    -webkit-box-shadow: 0 1px 1px rgba(0,0,0,.05);
    box-shadow: 0 1px 1px rgba(0,0,0,.05);
}
.panel-group .panel-heading {
    border-bottom: 0;
}
td#discount {
    float: right;
}
.panel-heading {
    padding: 10px 15px;
    border-bottom: 1px solid transparent;
    border-top-left-radius: 3px;
    border-top-right-radius: 3px;
}
td.product-col {
    margin-left: 5px;
}

input[type=checkbox], input[type=radio] {
    margin-right: 5px;
}
table.table.table-totals td {
    padding-right: 10px;
}
table.table.table-mini-cart tr {
    border-bottom: 1px solid #ccc!important;
}
table.table.table-mini-cart td {
    border-bottom: 0!important;
}
.cart_color {
    margin-left: 5px;
}
.cart_size, .cart_color {
    float: left;
}
.table-mini-cart .product-qty {
    text-align: left!important;
}
.cart_size ul li {
    font-size: 12px;
    margin: 2px 3px 2px 0;
    color: #7a7d82;
    line-height: 1.2!important;
}
h4.panel-title {
    padding: 0;
    margin: 4px;
}
.panel{
  border: 0px!important;
}
.panel-body {
  
    border-top: 0px!important;
    border-bottom: 0px!important;
}
.order-summary {
   
    padding-bottom: 60px;
}
select {
    -webkit-appearance: auto !important;
}
.alert.alert-success {
    top: 0%;
    right: 1%;
    z-index: 999999;
    margin-top: 0px;
    width: 346px;
    position: fixed;
}
</style>
{{-- <script type="text/javascript">
  $('input').on('invalid', function(e) {
        setTimeout(function(){
            $('html, body').animate($(window).scroll(errorPosition));
        })
      });
</script> --}}
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.min.js"></script>
 -->

<script type="text/javascript">
  $('input[type=radio][name=address_selection]').change(function() {
    if(this.value == 'old'){
      $('#first_name').attr("disabled", "disabled");
      $('#last_name').attr("disabled", "disabled");
      $('#company_name').attr("disabled", "disabled");
      $('#phone_number').attr("disabled", "disabled");
      $('#pincode').attr("disabled", "disabled");
      $('#address_line_one').attr("disabled", "disabled");
      $('#address_line_two').attr("disabled", "disabled");
      //$('#address_line_three').attr("disabled", "disabled");
      $('#city').attr("disabled", "disabled");
      $('#country').attr("disabled", "disabled");
      $('#state').attr("disabled", "disabled");
      $('.state_value').attr("disabled", "disabled");

      $("#address_old").prop("disabled", false);
    }else{
      $('#first_name').removeAttr("disabled"); 
      $('#last_name').removeAttr("disabled"); 
      $('#company_name').removeAttr("disabled"); 
      $('#phone_number').removeAttr("disabled"); 
      $('#pincode').removeAttr("disabled");
      $('#address_line_one').removeAttr("disabled"); 
      $('#address_line_two').removeAttr("disabled"); 
      //$('#address_line_three').removeAttr("disabled"); 
      $('#city').removeAttr("disabled"); 
      $('#country').removeAttr("disabled"); 
      $('#state').removeAttr("disabled"); 
      $('.state_value').removeAttr("disabled"); 

      $('#first_name').val('');
      $('#last_name').val('');
      $('#company_name').val('');
      $('#phone_number').val('');
      $('#pincode').val('');
      $('#address_line_one').val('');
      $('#address_line_two').val('');
      //$('#address_line_three').val('');
      $('#city').val('');
      $('#country').val('');
      $('#state').val('');
      $('.state_value').val('');

      $('#address_old').val(0);
      $("#address_old").prop("disabled", true);
      
    }
  });

  $('#address_old').change(function() {
    var first_name = $('option:selected', this).attr('name');
    var last_name = $('option:selected', this).attr('last_name');
    var company_name = $('option:selected', this).attr('company_name');
    var phone_number = $('option:selected', this).attr('phone_number');
    var pincode = $('option:selected', this).attr('pincode');
    var city = $('option:selected', this).attr('city');
    var country = $('option:selected', this).attr('country');
    
    var state = $('option:selected', this).attr('state');
     var state_value = $('option:selected', this).attr('state');
   

     $('.state_value').html("<option selected>"+state_value+"</option>");

    var address_line_one = $('option:selected', this).attr('address_line_one');
    var address_line_two = $('option:selected', this).attr('address_line_two');
    //var address_line_three = $('option:selected', this).attr('address_line_three');

    $('#first_name').val(first_name);
    $('#last_name').val(last_name);
    $('#company_name').val(company_name);
    $('#phone_number').val(phone_number);
    $('#pincode').val(pincode);
    $('#address_line_one').val(address_line_one);
    $('#address_line_two').val(address_line_two);
    //$('#address_line_three').val(address_line_three);
    $('#country').val(country);
    $('#city').val(city);
    $('#state').val(state);
    $('.state_value').val(state);
  });

  $('#biiling_same_as_address').change(function() {
        if(this.checked) {
            $('#billing_first_name').attr("disabled", "disabled");
            $('#billing_last_name').attr("disabled", "disabled");
            $('#billing_company_name').attr("disabled", "disabled");
            $('#billing_phone_number').attr("disabled", "disabled");
            $('#billing_pincode').attr("disabled", "disabled");
            $('#billing_address_line_one').attr("disabled", "disabled");
            $('#billing_address_line_two').attr("disabled", "disabled");
           // $('#billing_address_line_three').attr("disabled", "disabled");
            $('#billing_city').attr("disabled", "disabled");
            $('#billing_country').attr("disabled", "disabled");
            $('#billing_state').attr("disabled", "disabled");

            var first_name = $('#first_name').val();
            var last_name = $('#last_name').val();
            var company_name = $('#company_name').val();
            var phone_number = $('#phone_number').val();
            var pincode = $('#pincode').val();
            var address_line_one = $('#address_line_one').val();
            var address_line_two = $('#address_line_two').val();
           // var address_line_three = $('#address_line_three').val();
            var city = $('#city').val();
            var country = $('#country').val();
            var billing_state = $('#billing_state').val();

            $('#billing_first_name').val(first_name);
            $('#billing_last_name').val(last_name);
            $('#billing_company_name').val(company_name);
            $('#billing_phone_number').val(phone_number);
            $('#billing_pincode').val(pincode);
            $('#billing_address_line_one').val(address_line_one);
            $('#billing_address_line_two').val(address_line_two);
           // $('#billing_address_line_three').val(address_line_three);
            $('#billing_city').val(city);
            $('#billing_country').val(country);
            $('#billing_state').val(billing_state);
            
        }else{
          $('#billing_first_name').removeAttr("disabled");
          $('#billing_last_name').removeAttr("disabled");
          $('#billing_company_name').removeAttr("disabled"); 
          $('#billing_phone_number').removeAttr("disabled"); 
          $('#billing_pincode').removeAttr("disabled");
          $('#billing_address_line_one').removeAttr("disabled"); 
          $('#billing_address_line_two').removeAttr("disabled"); 
          //$('#billing_address_line_three').removeAttr("disabled"); 
          $('#billing_city').removeAttr("disabled"); 
          $('#billing_country').removeAttr("disabled"); 
          $('#billing_state').removeAttr("disabled"); 

          $('#billing_first_name').val('');
          $('#billing_last_name').val('');
          $('#billing_company_name').val('');
          $('#billing_phone_number').val('');
          $('#billing_pincode').val('');
          $('#billing_address_line_one').val('');
          $('#billing_address_line_two').val('');
         // $('#billing_address_line_three').val('');
          $('#billing_city').val('');
          $('#billing_country').val('');
          $('#billing_state').val('');
        }
           
    });

</script>


              
@endsection
