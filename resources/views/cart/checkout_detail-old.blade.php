@extends('new_resources.layouts.new_app') 
@section('content')
<div class="checkout-detail-page">
  <div class="container">
    <div class="box-border shop-cart">
      <form class="form-horizontal form-label-left" action="" method="post" id="checkout_form" >
      {{ csrf_field() }}
      <h1>Checkout Details </h1>
      <div class="row">
      <div class="col-sm-4 col-md-7 col-xs-12" style="background: #ffffff none repeat scroll 0 0;border-radius: 3px;float: left;<!--padding: 30px;-->line-height: 35px;">
       <div class="panel-group" id="accordion">
        <div class="panel panel-default">
            <a data-toggle="collapse" href="#collapseOne" class="changeState">
              <div class="panel-heading" style="border: 1px solid rgb(141, 153, 174)!important;">
                  <h4 class="panel-title" >
                      1. Shipping Information 
                  </h4>
                 
                  <h4 class="pull-right" style="margin-top: -17px;">
                     <i class="fa fa-minus changeIcon"></i> 
                  </h4>
              </div>
            </a>  
            <div id="collapseOne" class="panel-collapse collapse in" style="width: 100%">
                <div class="panel-body" style="border: 1px solid rgb(141, 153, 174);">
                    <div class="col-md-12">
                        <label>Shipping Destination * (In order to ship your package timely and accurately, please input all the shipping information in English)</label>
                        <br/>
                        
                        <input name="address_selection" type="radio" value="old" checked="true" /><label>Choose from existing addresses.</label><br>
                        <select type="text" name="address" id="address_old"   class="choose_address form-control " > <!-- disabled -->
                            <option class="tick_shipping" value="0">Select Address</option>
                            @foreach($addresses as $keye => $value)
                              <option class="tick_shipping" address-value='' name="{{$value->name}}" phone_number="{{$value->phone_number}}" pincode="{{$value->pincode}}"  address_line_one="{{$value->address_line_one}}" address_line_two="{{$value->address_line_two}}" address_line_three="{{$value->address_line_three}}" city="{{$value->city}}" state="{{$value->state}}" >{{$value->name .' - '. $value->address_line_one.', '.$value->address_line_two.', '.$value->address_line_three.', '.$value->pincode.', '.$value->city.', '.$value->state }}</option> 
                            @endforeach
                        </select>   
                      <input name="address_selection"  type="radio" value="new"/><label>Add a new shipping address</label>
                    </div>
                  
                    <div class="col-md-12">
                      <label for="first_name">Full Name<span class="redColor">*</span></label>
                      <input type="text" name="name" id="name" type="text" onKeyPress = "return ValidateAlpha(event)" class="address_name form-control" pattern="[a-zA-Z]*" oninvalid="setCustomValidity('Please enter on alphabets only. ')" required="required" disabled="disabled">
                    </div>

                      <div class="col-md-12">
                      <label for="address1">Phone no<span class="redColor">*</span></label>
                      <input type="text" name="phone_number" id="phone_number" type="text" maxlength="10" class="address_address form-control" required="required" disabled="disabled">
                    </div>

                    <div class="col-md-12">
                      <label for="address1">Pin code<span class="redColor">*</span></label>
                      <input type="text" name="pincode" id="pincode" type="text" class="address_address form-control" maxlength="6" required="required" disabled="disabled">
                    </div>

                     <div class="col-md-12">
                      <label for="address1">Locality/Area/Street<span class="redColor">*</span></label>
                      <input type="text" name="address_line_one" id="address_line_one" type="text" maxlength="30" class="address_address form-control" required="required" disabled="disabled">
                    </div>
             
                     <div class="col-md-12">
                      <label for="address1">Flat number / Building Name<span class="redColor">*</span></label>
                      <input type="text" name="address_line_two" id="address_line_two" type="text" maxlength="30" class="address_address form-control" required="required" disabled="disabled">
                    </div>
                   
                    <div class="col-md-12">
                      <label for="address1">Landmark<span class="redColor">*</span> </label>
                      <input type="text" name="address_line_three" id="address_line_three" type="text" maxlength="30" class="address_address form-control" disabled="disabled">
                    </div>
                    <div class="col-md-12">
                      <label for="address1">District / City<span class="redColor">*</span> </label>
                      <input type="text" name="city" id="city" type="text" class="address_address form-control" maxlength="30" disabled="disabled">
                    </div>
                    <div class="col-md-12">
                      <label for="address1">State<span class="redColor">*</span> </label>
                      <input type="text" name="state" id="state" type="text" class="address_address form-control" maxlength="30" disabled="disabled">
                    </div>
                   
                   
                </div>
            </div>
        </div>

        <div class="panel panel-default ">
            <a data-toggle="collapse" href="#collapseTwo" class="changeState">
              <div class="panel-heading" style="border: 1px solid rgb(141, 153, 174)!important;">
                  <h4 class="panel-title" >
                      2. Billing Information
                  </h4>
                  <h4 class="pull-right" style="margin-top: -17px;">
                     <i class="fa fa-minus changeIcon"></i> 
                  </h4>
              </div>
            </a>
            <div id="collapseTwo" class="panel-collapse collapse in" style="width: 100%">
                <div class="panel-body" style="border: 1px solid rgb(141, 153, 174);">
                    <!-- <div class="col-md-2 hidden-lg">
                         <input  class="styled-checkbox tick  " id="styled-checkbox-2" type="checkbox" value="value1" style="width: 23px;opacity: 1;height: 23px;margin-top: 7px;margin-left: -26px;">
                    </div> -->
                    <!-- <div class="col-md-8 hidden-lg ">
                        Billing address same as shipping address?
                    </div> -->
                    <div class="col-md-10 hidden-sm ">
                      <p>
                        <input class="styled-checkbox tick" id="biiling_same_as_address" type="checkbox" value="value1" style="width: 23px;opacity: 1;height: 23px;margin-top: 7px;margin-left: 0px;">
                       <!-- <label for="styled-checkbox-2" >--><span>Billing address same as shipping address?</span><!--</label>-->
                      </p>
                    </div>
                    <div class="col-md-12">
                      <label for="first_name">Full Name<span class="redColor">*</span></label>
                      <input type="text" name="billing_name" id="billing_name" type="text" onKeyPress = "return ValidateAlpha(event)" class="address_name form-control" pattern="[a-zA-Z]*" oninvalid="setCustomValidity('Please enter on alphabets only. ')" required="required">
                    </div>

                      <div class="col-md-12">
                      <label for="address1">Phone no<span class="redColor">*</span></label>
                      <input type="text" name="billing_phone_number" id="billing_phone_number" type="text" class="address_address form-control" required="required">
                    </div>

                    <div class="col-md-12">
                      <label for="address1">Pin code<span class="redColor">*</span></label>
                      <input type="text" name="billing_pincode" id="billing_pincode" type="text" class="address_address form-control" required="required">
                    </div>

                     <div class="col-md-12">
                      <label for="address1">Locality/Area/Street<span class="redColor">*</span></label>
                      <input type="text" name="billing_address_line_one" id="billing_address_line_one" type="text" class="address_address form-control" required="required">
                    </div>
             
                     <div class="col-md-12">
                      <label for="address1">Flat number / Building Name<span class="redColor">*</span></label>
                      <input type="text" name="billing_address_line_two" id="billing_address_line_two" type="text" class="address_address form-control" required="required">
                    </div>
                   
                    <div class="col-md-12">
                      <label for="address1">Landmark<span class="redColor">*</span> </label>
                      <input type="text" name="billing_address_line_three" id="billing_address_line_three" type="text" class="address_address form-control">
                    </div>
                    <div class="col-md-12">
                      <label for="address1">District / City<span class="redColor">*</span> </label>
                      <input type="text" name="billing_city" id="billing_city" type="text" class="address_address form-control">
                    </div>

                    <div class="col-md-12">
                      <label for="address1">State<span class="redColor">*</span> </label>
                      <input type="text" name="billing_state" id="billing_state" type="text" class="address_address form-control">
                    </div>
                </div>
            </div>
        </div>

         <div class="panel panel-default">
             <a data-toggle="collapse" href="#collapseThree" class="changeState">
              <div class="panel-heading" style="border: 1px solid rgb(141, 153, 174)!important;">
                  <h4 class="panel-title" >
                      3. Payment Methods
                  </h4>
                  <h4 class="pull-right" style="margin-top: -17px;">
                     <i class="fa fa-minus changeIcon"></i> 
                  </h4>
              </div>
             </a> 
            <div id="collapseThree" class="panel-collapse collapse in" style="width: 100%">
                <div class="panel-body" style="border: 1px solid rgb(141, 153, 174);">
                   <div class="payment-methods payment-5">
                    <!--   <h3>PAYMENT METHODS</h3> -->
                      <div class="col-md-6">
                     
                      </div>

                     
                       
                      <div class="col-md-6">
                        <input class="styled-checkbox payment_option" id="payment5" type="radio" name="payment_option" value="5"  > 
                      
                            <label for="payment5">Alipay/WeChat Pay/Union Pay 
                           <!--  <img src="{{ asset('images/png4.png') }}" style="width:215px;"> -->
                      </div>
                   
                      <div class="col-md-6">
                        <input class="styled-checkbox payment_option" name="payment_option" id="payment3" type="radio" value="2" >
                        <label for="payment3">Paypal <!-- <img src="{{ asset('images/png3.png') }}" style="width:70px;"> --></label>
                      </div>
                      
                      <span class="error" id="messageBox"></span>
                      <span class="error" id="messageBox"></span>
                      
                    </div>
                </div>
            </div>
        </div>

    </div>
  </div>

      <div class="col-lg-4">
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
                                                <td class="price-col">₹{{$value->qty * $value->price}}</td>
                                            </tr>
                                              @php
                                               $Subtotal += ($value->qty * $value->price);
                                              @endphp
                                            @endforeach
                                            
                                        </tbody>    
                                    </table>
                                    <table class="table table-totals">
                                    <tbody>
                                        <tr>
                                            <td>Subtotal</td>
                                            <td style="text-align: right!important;">₹{{$Subtotal }}</td>
                                        </tr>
                                         <tr>
                                            <td>Coupan Discount</td>
                                            <td style="text-align: right!important;">₹0.00</td>
                                        </tr>
                                        <tr>
                                            <td>Shipping</td>
                                            <td style="text-align: right!important;">₹0.00</td>
                                        </tr>
                                        <tr>
                                            <td>Tax</td>
                                            <td style="text-align: right!important;">₹0.00</td>
                                        </tr>
                                       
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td style="text-align: left!important;padding-left: 5px;">Order Total</td>
                                            <td>₹{{$Subtotal }}</td>
                                        </tr>
                                    </tfoot>
                                </table>
                                </div><!-- End #order-cart-section -->
                            </div><!-- End .order-summary -->
                            <div class="row">
                            <div class="col-lg-12">
                                <div class="checkout-steps-action">
                                    @if(!(Auth::id() > 0))
                                     <a href="javascript:void(0)" data-toggle="modal" data-dismiss="modal"  data-target="#login" class="btn btn-primary float-right">Proceed to Payment</a>
                                    @else 
                                     <a href="" class="btn btn-primary float-right">Proceed to Payment</a>
                                    @endif
                                </div><!-- End .checkout-steps-action -->
                            </div><!-- End .col-lg-8 -->
                        </div><!-- End .row -->

                   <!--  <div class="mb-4"></div> --><!-- margin -->
                        </div>
     </div></form>
    </div>
  </div>
</div>
<style type="text/css">
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
</style>

<script type="text/javascript">
  $('input[type=radio][name=address_selection]').change(function() {
    if(this.value == 'old'){
      $('#name').attr("disabled", "disabled");
      $('#phone_number').attr("disabled", "disabled");
      $('#pincode').attr("disabled", "disabled");
      $('#address_line_one').attr("disabled", "disabled");
      $('#address_line_two').attr("disabled", "disabled");
      $('#address_line_three').attr("disabled", "disabled");
      $('#city').attr("disabled", "disabled");
      $('#state').attr("disabled", "disabled");

      $("#address_old").prop("disabled", false);
    }else{
      $('#name').removeAttr("disabled"); 
      $('#phone_number').removeAttr("disabled"); 
      $('#pincode').removeAttr("disabled");
      $('#address_line_one').removeAttr("disabled"); 
      $('#address_line_two').removeAttr("disabled"); 
      $('#address_line_three').removeAttr("disabled"); 
      $('#city').removeAttr("disabled"); 
      $('#state').removeAttr("disabled"); 

      $('#name').val('');
      $('#phone_number').val('');
      $('#pincode').val('');
      $('#address_line_one').val('');
      $('#address_line_two').val('');
      $('#address_line_three').val('');
      $('#city').val('');
      $('#state').val('');

      $('#address_old').val(0);
      $("#address_old").prop("disabled", true);
      
    }
  });

  $('#address_old').change(function() {
    var name = $('option:selected', this).attr('name');
    var phone_number = $('option:selected', this).attr('phone_number');
    var pincode = $('option:selected', this).attr('pincode');
    var city = $('option:selected', this).attr('city');
    var state = $('option:selected', this).attr('state');
    var address_line_one = $('option:selected', this).attr('address_line_one');
    var address_line_two = $('option:selected', this).attr('address_line_two');
    var address_line_three = $('option:selected', this).attr('address_line_three');

    $('#name').val(name);
    $('#phone_number').val(phone_number);
    $('#pincode').val(pincode);
    $('#address_line_one').val(address_line_one);
    $('#address_line_two').val(address_line_two);
    $('#address_line_three').val(address_line_three);
    $('#city').val(city);
    $('#state').val(state);
  });

  $('#biiling_same_as_address').change(function() {
        if(this.checked) {
            $('#billing_name').attr("disabled", "disabled");
            $('#billing_phone_number').attr("disabled", "disabled");
            $('#billing_pincode').attr("disabled", "disabled");
            $('#billing_address_line_one').attr("disabled", "disabled");
            $('#billing_address_line_two').attr("disabled", "disabled");
            $('#billing_address_line_three').attr("disabled", "disabled");
            $('#billing_city').attr("disabled", "disabled");
            $('#billing_state').attr("disabled", "disabled");

            var name = $('#name').val();
            var phone_number = $('#phone_number').val();
            var pincode = $('#pincode').val();
            var address_line_one = $('#address_line_one').val();
            var address_line_two = $('#address_line_two').val();
            var address_line_three = $('#address_line_three').val();
            var city = $('#city').val();
            var state = $('#state').val();

            $('#billing_name').val(name);
            $('#billing_phone_number').val(phone_number);
            $('#billing_pincode').val(pincode);
            $('#billing_address_line_one').val(address_line_one);
            $('#billing_address_line_two').val(address_line_two);
            $('#billing_address_line_three').val(address_line_three);
            $('#billing_city').val(city);
            $('#billing_state').val(state);
            
        }else{
          $('#billing_name').removeAttr("disabled"); 
          $('#billing_phone_number').removeAttr("disabled"); 
          $('#billing_pincode').removeAttr("disabled");
          $('#billing_address_line_one').removeAttr("disabled"); 
          $('#billing_address_line_two').removeAttr("disabled"); 
          $('#billing_address_line_three').removeAttr("disabled"); 
          $('#billing_city').removeAttr("disabled"); 
          $('#billing_state').removeAttr("disabled"); 

          $('#billing_name').val('');
          $('#billing_phone_number').val('');
          $('#billing_pincode').val('');
          $('#billing_address_line_one').val('');
          $('#billing_address_line_two').val('');
          $('#billing_address_line_three').val('');
          $('#billing_city').val('');
          $('#billing_state').val('');
        }
           
    });

</script>
@endsection
