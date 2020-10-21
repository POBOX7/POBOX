<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>PO Box</title>

    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="pobox">
    <meta name="author" content="SW-THEMES">
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.png') }}">
    
    <script type="text/javascript">
        WebFontConfig = {
            google: { families: [ 'Open+Sans:300,400,600,700,800','Poppins:300,400,500,600,700','Segoe Script:300,400,500,600,700' ] }
        };
        (function(d) {
            var wf = d.createElement('script'), s = d.scripts[0];
            wf.src = '{{ asset("new_theme/assets/js/webfont.js") }}';
            wf.async = true;
            s.parentNode.insertBefore(wf, s);
        })(document);
    </script>

    <!-- Plugins CSS File -->
    <link rel="stylesheet" href="{{ asset('new_theme/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/blog/style.css') }}">
    <!-- Main CSS File -->
    <link rel="stylesheet" href="{{ asset('new_theme/assets/css/style.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('new_theme/assets/vendor/fontawesome-free/css/all.min.css') }}">
    
</head>
<body>
  
    <div class="page-wrapper">
        @include('new_resources.layouts.header') 
        @yield('content')
        @include('new_resources.layouts.footer')
    </div><!-- End .page-wrapper -->

    <div class="mobile-menu-overlay"></div><!-- End .mobil-menu-overlay -->

    <div class="mobile-menu-container">
        <div class="mobile-menu-wrapper">
           <span style="color: #fff;text-transform: capitalize;padding-left: 16px;text-align: left;width: 100%;position: absolute;float: left;top: 10px;">
                      @if(Auth::user())
                      Hi {{Auth::user()->name}}
                      @endif
                  </span>
            <span class="mobile-menu-close"><i class="icon-cancel"></i></span>
            <nav class="mobile-nav">
                <ul class="mobile-menu">
                   
                    <li {{ Request::is('home_1') ? ' class=active' : null }}><a href="{{route('home_1')}}">Home</a></li> 
                    <li {{ Request::is('newArrival') ? ' class=active' : null }}><a href="{{route('newArrival')}}">New Arrival</a></li> 
                    <li {{ Request::is('trending') ? ' class=active' : null }}><a href="{{route('trending')}}">Trending</a></li> 
                    <li {{ Request::is('kurties') ? ' class=active' : null }}><a href="{{route('kurties')}}">Kurties</a></li> 
                    <li {{ Request::is('kurta-sets') ? ' class=active' : null }}><a href="{{route('kurta.sets')}}">Kurta Sets</a></li> 
                    <li {{ Request::is('dresses') ? ' class=active' : null }}><a href="{{route('dresses')}}">Dresses</a></li>  
                    <li class=""><a href="{{route('contactUs')}}">Contact Us</a></li>
                     @if(Auth::user())  
                     
                   <li class=""><a href="{{route('myAccountPage')}}">MY ACCOUNT</a></li>
                     <li class=""><a href="{{route('wishlist')}}">MY WISHLIST </a></li>
                     <li class=""><a href="{{route('logout')}}">Sign Out</a></li> 
                     @elseif(!(Auth::user()))
                     <li class="">
                        <div >
                        <a href="#"  class="close_menu inline" style="margin-right: 10px; font-size: 13px;" data-toggle="modal" data-target="#login">SIGN IN</a> 
                        <span class="inline slash" style="font-size: 13px;" >/</span>
                        <a href="#" style="font-size: 13px;" class="close_menu inline" data-toggle="modal" data-target="#register">SIGN UP</a>
                       </div>
                     </li>
                     
                     @endif         
                </ul>
            </nav><!-- End .mobile-nav -->

          
        </div><!-- End .mobile-menu-wrapper -->
    </div><!-- End .mobile-menu-container -->

    
    <!-- Add Cart Modal -->
    <div class="modal fade" id="addCartModal" tabindex="-1" role="dialog" aria-labelledby="addCartModal" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-body add-cart-box text-center">
            <p>You've just added this product to the<br>cart:</p>
            <h4 id="productTitle"></h4>
            <img src="" id="productImage" width="100" height="100" alt="adding cart image">
            <div class="btn-actions">
                <a href="#"><button class="btn-primary">Go to cart page</button></a>
                <a href="#"><button class="btn-primary" data-dismiss="modal">Continue</button></a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <a id="scroll-top" href="#top" title="Top" role="button"><i class="icon-angle-up"></i></a>
    <script type="text/javascript">
        $('.close_menu').click(function () { // on a click on the button with id 'one'
  $('.mobile-menu-close').trigger('click');// trigger the click on second, and go on 
});
    </script>
    <!-- Plugins JS File -->
    {{-- <!-- <script src="{{ asset('new_theme/assets/js/jquery.min.js') }}"></script> --> --}}
    <script src="{{ asset('new_theme/assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('new_theme/assets/js/plugins.min.js') }}"></script>

    <!-- Main JS File -->
    <script src="{{ asset('new_theme/assets/js/main.js') }}"></script>
    <style type="text/css">
        .inline
            {
              display: inline-block !important;
            }
          .slash
          {
            color: white;
          }  

          @media only screen and (max-width: 768px) {
  /* For mobile phones: */
   .modal-header { 
    height: 50px;
}
.modal-footer {
    height: 0px;
}
.col-md-12.col-xs-12.form-control {
    height: 10px;
}
}
          
       
  </style>
  <script>
    function padStart(str) {
        return ('0' + str).slice(-2)
    }

    function demoSuccessHandler(transaction) {
      
      	$("#paymentid").val(transaction.razorpay_payment_id);

        if($("#biiling_same_as_address").prop("checked") != true){
          var billing_address = 'New';
        }else{
          var billing_address = 'Same';
        }

      	$.ajax({
          	url : '{{ route('checkoutPlaceOrder') }}',
          	headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
          	type: 'POST',
          	data: { 
                'first_name'      :$('#first_name').val(),
                'last_name'       :$('#last_name').val(),
                'company_name'    :$('#company_name').val(),
                'phone_number'    :$('#phone_numbers').val(),
                'pincode'         :$('#pincode').val(),
                'address_line_one':$('#address_line_one').val(),
                'address_line_two':$('#address_line_two').val(),
                'city'            :$('#city').val(),
                'country'         :$('#country').val(),
                'state'           :$('#state').val(),
                'state_textbox'   :$('.state_textbox').val(),
                'totalamount'     :$(".final_price_payment").val(),
                'paymentid'       :$("#paymentid").val(),
                'address_selection':$('input[name="address_selection"]:checked').val(),
                'address'         :$('#address_old').val(),
                'billing_first_name':$("#billing_first_name").val(),
                'billing_last_name':$("#billing_last_name").val(),
                'billing_company_name':$("#billing_company_name").val(),
                'billing_phone_number':$("#billing_phone_number").val(),
                'billing_pincode'   :$("#billing_pincode").val(),
                'billing_address_line_one':$("#billing_address_line_one").val(),
                'billing_address_line_two':$("#billing_address_line_two").val(),
                'billing_city'      :$("#billing_city").val(),
                'billing_country'   :$("#billing_country").val(),
                'billing_state'     :$("#billing_state").val(),
                'billing_address'   :billing_address,
                'guest_email'       :$('#guest_email').val()
          },
        }).done(function(data) {
          window.location.href = 'order-summary/'+data.order_id;
        });
    }
</script>

<script>
    function validateEmail($email) {
      var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
      return emailReg.test( $email );
    } 
   /* document.getElementById('paybtn').onclick = function () {*/
    $( "#paybtn" ).click(function() {
      	var out_of_stock_item =  $("#out_of_stock_item").val();
	    if(out_of_stock_item > 0){
	        $('#out_of_stock_popup').modal('show');
	        return false;
	    }

	    if($('input[name="address_selection"]:checked').val() == 'old'){
	        if($("#address_old").val() == 0){
	          $("#spanaddress").text("Please Select Address..!");
	        }else if($("#biiling_same_as_address").prop("checked") != true){
	          
	          $("#spanaddress").text("");
	          $("#billingid").text("Please Select Billing Address..!");
	            
	          var first_name = $("#billing_first_name").val();
	          var last_name = $("#billing_last_name").val();
	          var company_name = $("#billing_company_name").val();
	          var phone_number = $("#billing_phone_number").val();
	          var pincode = $("#billing_pincode").val();
	          var address_line_one = $("#billing_address_line_one").val();
	          var address_line_two = $("#billing_address_line_two").val();
	          var city = $("#billing_city").val();
	          var billing_country = $("#billing_country").val();
	          var billing_state = $("#billing_state").val();
	          var guest_email = $("#guest_email").val();
	          var numbers = /^[0-9]+$/;
	          
	          $("#billing_first_name").next().text("");
	          $("#billing_last_name").next().text("");
	          $("#billing_company_name").next().text("");
	          $("#billing_phone_number").next().text("");
	          $("#billing_pincode").next().text("");
	          $("#billing_address_line_one").next().text("");
	          $("#billing_address_line_two").next().text("");
	          $("#billing_city").next().text("");
	          $("#billing_country").next().text("");
	          $("#billing_state").next().text("");
	          $("#guest_email").next().text("");
	          
	          if(first_name == "")
	          {
	            $("#billing_first_name").next().text("First Name Field is Required..!");
	          }
	          if(last_name == "")
	          {
	            $("#billing_last_name").next().text("Last Name Field is Required..!");
	          }
	          if(phone_number == "")
	          {
	            $("#billing_phone_number").next().text("Mobile Field is Required..!");
	          }
	          if(pincode == "")
	          {
	            $("#billing_pincode").next().text("Pincode Field is Required..!");
	          }if(address_line_one == "")
	          {
	            $("#billing_address_line_one").next().text("Address Field is Required..!");
	          }if(city == "")
	          {
	            $("#billing_city").next().text("City Field is Required..!");
	          }if(country == "")
	          {
	            $("#billing_country").next().text("Country Field is Required..!");
	          }if(billing_state == "")
	          {
	            $("#billing_state").next().text("State Field is Required..!");
	          }
	          if(guest_email == "")
	          {
	            $("#guest_email").next().text("Email Field is Required..!");
	          }
	          else if(phone_number.length != 10)
	          {
	            $("#billing_phone_number").next().text("Mobile Number Must Be 10 Digits.");
	          }
	          else{
	            $("#billing_first_name").next().text("");
	            $("#billing_last_name").next().text("");
	            $("#billing_company_name").next().text("");
	            $("#billing_phone_number").next().text("");
	            $("#billing_pincode").next().text("");
	            $("#billing_address_line_one").next().text("");
	            $("#billing_address_line_two").next().text("");
	            $("#billing_city").next().text("");
	            $("#billing_country").next().text("");
	            $("#billing_state").next().text("");
	            $("#guest_email").next().text("");
	            $("#billingid").text("");

	            var options = {
	                key: "{{ env('RAZORPAY_KEY') }}",
	                amount: Math.floor($(".final_price_payment").val())*100,
	                name: 'POBOX',
	                description: 'Purchase Product',
	                image: 'https://i.imgur.com/n5tjHFD.png',
	                handler: demoSuccessHandler

	            }
	            window.r = new Razorpay(options);
	            r.open()

	          }
	        }else if($("#biiling_same_as_address").prop("checked") == true){
	            $("#billing_first_name").next().text("");
	            $("#billing_last_name").next().text("");
	            $("#billing_company_name").next().text("");
	            $("#billing_phone_number").next().text("");
	            $("#billing_pincode").next().text("");
	            $("#billing_address_line_one").next().text("");
	            $("#billing_address_line_two").next().text("");
	            $("#billing_city").next().text("");
	            $("#billing_country").next().text("");
	            $("#billing_state").next().text("");
	            $("#billingid").text("");

	            var options = {
	              key: "{{ env('RAZORPAY_KEY') }}",
	              amount: Math.floor($(".final_price_payment").val())*100,
	              name: 'POBOX',
	              description: 'Purchase Product',
	              image: 'https://i.imgur.com/n5tjHFD.png',
	              handler: demoSuccessHandler
	            }
	            window.r = new Razorpay(options);
	              r.open()
	        }   
      	}else if($('input[name="address_selection"]:checked').val() == 'new'){
	        if($("#biiling_same_as_address").prop("checked") != true){
	          
	          $("#spanaddress").text("");
	          $("#billingid").text("Please Select Billing Address..!");
	            
	          var first_name = $("#billing_first_name").val();
	          var last_name = $("#billing_last_name").val();
	          var company_name = $("#billing_company_name").val();
	          var phone_number = $("#billing_phone_number").val();
	          var pincode = $("#billing_pincode").val();
	          var address_line_one = $("#billing_address_line_one").val();
	          var address_line_two = $("#billing_address_line_two").val();
	          var city = $("#billing_city").val();
	          var billing_country = $("#billing_country").val();
	          var billing_state = $("#billing_state").val();
	          var guest_email = $("#guest_email").val();
	          var numbers = /^[0-9]+$/;
	          
	          $("#billing_first_name").next().text("");
	          $("#billing_last_name").next().text("");
	          $("#billing_company_name").next().text("");
	          $("#billing_phone_number").next().text("");
	          $("#billing_pincode").next().text("");
	          $("#billing_address_line_one").next().text("");
	          $("#billing_address_line_two").next().text("");
	          $("#billing_city").next().text("");
	          $("#billing_country").next().text("");
	          $("#billing_state").next().text("");
	          $("#guest_email").next().text("");
	          
	          if(first_name == "")
	          {
	            $("#billing_first_name").next().text("First Name Field is Required..!");
	          }
	          if(last_name == "")
	          {
	            $("#billing_last_name").next().text("Last Name Field is Required..!");
	          }
	          if(phone_number == "")
	          {
	            $("#billing_phone_number").next().text("Mobile Field is Required..!");
	          }
	          if(pincode == "")
	          {
	            $("#billing_pincode").next().text("Pincode Field is Required..!");
	          }if(address_line_one == "")
	          {
	            $("#billing_address_line_one").next().text("Address Field is Required..!");
	          }if(city == "")
	          {
	            $("#billing_city").next().text("City Field is Required..!");
	          }if(country == "")
	          {
	            $("#billing_country").next().text("Country Field is Required..!");
	          }if(billing_state == "")
	          {
	            $("#billing_state").next().text("State Field is Required..!");
	          }
	          if(guest_email == "")
	          {
	            $("#guest_email").next().text("Email Field is Required..!");
	          }
	          else if(phone_number.length != 10)
	          {
	            $("#billing_phone_number").next().text("Mobile Number Must Be 10 Digits.");
	          }
	          else{
	            $("#billing_first_name").next().text("");
	            $("#billing_last_name").next().text("");
	            $("#billing_company_name").next().text("");
	            $("#billing_phone_number").next().text("");
	            $("#billing_pincode").next().text("");
	            $("#billing_address_line_one").next().text("");
	            $("#billing_address_line_two").next().text("");
	            $("#billing_city").next().text("");
	            $("#billing_country").next().text("");
	            $("#billing_state").next().text("");
	            $("#guest_email").next().text("");
	            $("#billingid").text("");

	            var options = {
	                key: "{{ env('RAZORPAY_KEY') }}",
	                amount: Math.floor($(".final_price_payment").val())*100,
	                name: 'POBOX',
	                description: 'Purchase Product',
	                image: 'https://i.imgur.com/n5tjHFD.png',
	                handler: demoSuccessHandler

	            }
	            window.r = new Razorpay(options);
	              r.open()

	          }
	        }else if($("#biiling_same_as_address").prop("checked") == true){
	            $("#billing_first_name").next().text("");
	            $("#billing_last_name").next().text("");
	            $("#billing_company_name").next().text("");
	            $("#billing_phone_number").next().text("");
	            $("#billing_pincode").next().text("");
	            $("#billing_address_line_one").next().text("");
	            $("#billing_address_line_two").next().text("");
	            $("#billing_city").next().text("");
	            $("#billing_country").next().text("");
	            $("#billing_state").next().text("");
	            $("#billingid").text("");

	            var first_name = $("#first_name").val();
	            var last_name = $("#last_name").val();
	            var company_name = $("#company_name").val();
	            var phone_number = $("#phone_numbers").val();
	            var pincode = $("#pincode").val();
	            var address_line_one = $("#address_line_one").val();
	            var city = $("#city").val();
	            var country = $("#country").val();
	            var state = $("#state").val();
	            /*alert(state);*/
	            var state_textbox = $(".state_textbox").val();
	            //alert(state_textbox);

	            $("#first_name").next().text("");
	            $("#last_name").next().text("");
	            $("#company_name").next().text("");
	            $("#phone_numbers").next().text("");
	            $("#pincode").next().text("");
	            $("#address_line_one").next().text("");
	            $("#address_line_two").next().text("");
	            $("#city").next().text("");
	            $("#country").next().text("");
	            $("#state").next().text("");
	            var numbers = /^[0-9]+$/;

	             if( first_name != "" && last_name != "" && phone_number != "" && pincode != "" && address_line_one != "" && city != "" && country != "" && state != ""  && phone_number != ""){

	               if(phone_number.length != 10)
	                {
	                  $("#phone_numbers").next().text("Mobile Number Must Be 10 Digits.");
	                }else{
	                    var options = {
	                      key: "{{ env('RAZORPAY_KEY') }}",
	                      amount: Math.floor($(".final_price_payment").val())*100,
	                      name: 'POBOX',
	                      description: 'Purchase Product',
	                      image: 'https://i.imgur.com/n5tjHFD.png',
	                      handler: demoSuccessHandler

	                  }
	                  window.r = new Razorpay(options);
	                    r.open()
	                }
	            }else{
	                if( first_name == "" ){
	                  $("#first_name").next().text("First Name Field is Required..!");
	                }
	                if( last_name == "" ){
	                  $("#last_name").next().text("Last Name Field is Required..!");
	                }
	                if(phone_number == "")
	                {
	                  $("#phone_numbers").next().text("Mobile Field is Required..!");
	                }
	                if($("#email").val)
	                {
	                  if(email == "")
	                  {
	                    $("#email").next().text("Email Field is Required..!");
	                  }else if(!validateEmail(email))
	                  {
	                    $("#email").next().text("Enter Valid Email..!");
	                  }
	                }       
	                
	                if(pincode == "")
	                {
	                  $("#pincode").next().text("Pincode Field is Required..!");
	                }if(address_line_one == "")
	                {
	                  $("#address_line_one").next().text("Address Field is Required..!");
	                }if(city == "")
	                {
	                  $("#city").next().text("City Field is Required..!");
	                }if(country == "" )
	                {
	                  $("#country").next().text("Country Field is Required..!");
	                }
	                
	                 if(state == "")
	                {
	                  $("#state").next().text("State Field is Required..!");
	                }
	                if(guest_email == "")
	                {
	                  $("#guest_email").next().text("Email Field is Required..!");
	                }else if(guest_email_check == 'exist' ){
	                  $("#guest_email").next().text("Email already register, please try with new one");
	                }else if(valid_emai == 'No' ){
	                  $("#guest_email").next().text("Pleae enter correct email id");
	                }
	                if(phone_number.length != 10)
	                {
	                  $("#phone_numbers").next().text("Mobile Number Must Be 10 Digits.");
	                }   
	            }
	        } 
      	}else{
	        var first_name = $("#first_name").val();
	        var last_name = $("#last_name").val();
	        var company_name = $("#company_name").val();
	        var phone_number = $("#phone_numbers").val();
	        var pincode = $("#pincode").val();
	        var address_line_one = $("#address_line_one").val();
	        var address_line_two = $("#address_line_two").val();
	        var city = $("#city").val();
	        var country = $("#country").val();
	        var state = $("#state").val();
	        /*alert(state);*/
	        var state_textbox = $(".state_textbox").val();
	        //alert(state_textbox);
	        var email = $("#email").val();
	        var guest_email = $("#guest_email").val();
	        var valid_emai = '';
	        if( !validateEmail(guest_email)) { 
	          var valid_emai = 'No';
	        }else{
	          var valid_emai = 'Yes';
	        }

	        var numbers = /^[0-9]+$/;
	        var guest_email_check = '';
	        
	        $("#first_name").next().text("");
	        $("#last_name").next().text("");
	        $("#company_name").next().text("");
	        $("#phone_numbers").next().text("");

	        $("#pincode").next().text("");
	        $("#address_line_one").next().text("");
	        $("#address_line_two").next().text("");
	        $("#city").next().text("");
	        $("#country").next().text("");
	        $("#state").next().text("");
	        //$(".state_textbox").next().text("");
	        
	        $("#email").next().text("");
	        $("#guest_email").next().text("");
	        $.ajaxSetup({
	              headers: {
	                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	              }
	          });
	          $.ajax({
	            data: { 
	                  'email' : guest_email,
	                "_token": "{{ csrf_token() }}",
	                },
	            url : '{{url('/checkUserEmail')}}',
	            type: "POST",
	            async:false,
	            dataType: 'json',
	            success: function (data) {
	              //console.log('iiiii');
	              if(data == 2){
	                guest_email_check = 'exist';
	              }
	            },
	            error: function (data) {
	              
	            }
	        });

	        if( first_name != "" && last_name != "" && phone_number != "" && pincode != "" && address_line_one != "" && city != "" && country != "" && state != ""   && guest_email != "" && guest_email_check != 'exist' && valid_emai == 'Yes'  ){
	                //console.log('1111');
	                if(phone_number.length != 10)
	                {
	                  $("#phone_numbers").next().text("Mobile Number Must Be 10 Digits.ss");
	                }else{
	                    var options = {
	                      key: "{{ env('RAZORPAY_KEY') }}",
	                      amount: Math.floor($(".final_price_payment").val())*100,
	                      name: 'POBOX',
	                      description: 'Purchase Product',
	                      image: 'https://i.imgur.com/n5tjHFD.png',
	                      handler: demoSuccessHandler

	                  }
	                  window.r = new Razorpay(options);
	                    r.open()
	                }
	        }else{
	                if( first_name == "" ){
	                  $("#first_name").next().text("First Name Field is Required..!");
	                }
	                if( last_name == "" ){
	                  $("#last_name").next().text("Last Name Field is Required..!");
	                }
	                if(phone_number == "")
	                {
	                  $("#phone_numbers").next().text("Mobile Field is Required..!");
	                }
	                if($("#email").val)
	                {
	                  if(email == "")
	                  {
	                    $("#email").next().text("Email Field is Required..!");
	                  }else if(!validateEmail(email))
	                  {
	                    $("#email").next().text("Enter Valid Email..!");
	                  }
	                }       
	                
	                if(pincode == "")
	                {
	                  $("#pincode").next().text("Pincode Field is Required..!");
	                }if(address_line_one == "")
	                {
	                  $("#address_line_one").next().text("Address Field is Required..!");
	                }if(city == "")
	                {
	                  $("#city").next().text("City Field is Required..!");
	                }if(country == "" )
	                {
	                  $("#country").next().text("Country Field is Required..!");
	                }
	                
	                 if(state == "")
	                {
	                  $("#state").next().text("State Field is Required..!");
	                }
	                if(guest_email == "")
	                {
	                  $("#guest_email").next().text("Email Field is Required..!");
	                }else if(guest_email_check == 'exist' ){
	                  $("#guest_email").next().text("Email already register, please try with new one");
	                }else if(valid_emai == 'No' ){
	                  $("#guest_email").next().text("Pleae enter correct email id");
	                }
	        }
      	}

       	/*var options = {
                key: "{{ env('RAZORPAY_KEY') }}",
                amount: Math.floor($(".final_price_payment").val())*100,
                name: 'POBOX',
                description: 'Purchase Product',
                image: 'https://i.imgur.com/n5tjHFD.png',
                handler: demoSuccessHandler

            }
            window.r = new Razorpay(options);
            r.open();*/
    });
  function validateEmail(email) {
    const re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}
</script>
<script>
  //alert($(".final_price_payment").val());
   // var discount = $(".ttt").val();
    /*var options = {
        key: "{{ env('RAZORPAY_KEY') }}",
        amount: Math.floor($(".final_price_payment").val())*100,
        name: 'POBOX',
        description: 'Purchase Product',
        image: 'https://i.imgur.com/n5tjHFD.png',
        handler: demoSuccessHandler

    }*/

</script>
</body>
</html>