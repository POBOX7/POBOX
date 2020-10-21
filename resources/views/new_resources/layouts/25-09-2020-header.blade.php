<style type="text/css">
.welcome-msg::after {
    border: 0!important;
  }
  @media only screen and (max-width: 768px) {
  /* For mobile phones: */
  [class*="login_popup"] {
    z-index: 99;
  }
}
@media (max-width: @screen-xs-min) {
  .modal-xs { width: @modal-sm; }
}
.modal-backdrop
{
  display: none;
}
.cart-dropdown .dropdown-toggle::before {
    display: inline-block!important;
    margin: 2px 0 0!important;
    color: #1d70ba!important;
    font-size: 3.3rem!important;
    line-height: 1!important;
    content: '\e87f'!important;
}
</style>
<!-- Login page code start -->
<!-- Login page code start -->

<div class="modal fade login_popup" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" id="login_close"  data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <!-- onclick="javascript:window.location.reload()" -->
      <div class="modal-body">
    <div class="login-form">
     {!! Form::open(['route' => 'userLogin' , 'enctype' => 'multipart/form-data']) !!}
        <h2 class="text-center">Sign In</h2>        
        <div class="form-group">
            <div class="input-group">
                <input type="email" pattern="[a-zA-Z0-9.-_]{1,}@[a-zA-Z.-]{2,}[.]{1}[a-zA-Z]{2,}" id="email" class="form-control"  name="email" placeholder="Email Address" required="required">
            </div>
        </div>
        <div class="form-group">
            <div class="input-group">
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required="required">
            </div>
        </div>        
        <div class="form-group">
           
            <button type="submit" class="btn btn-success btn-block login-btn">Sign In</button>
        </div>
        
        
    {!! Form::close() !!}
    <div class="col-sm-12">
    <div class="col-sm-7" style="float: left;">
        <div class="hint-text small">Don't have an Account?  <a href="#" id="login" data-toggle="modal" data-dismiss="modal"  data-target="#register" class="text-success">Create One</a></div>
    </div>
    <div class="col-sm-5" style="float: left;">
         <a href="#" id="login" data-toggle="modal" data-dismiss="modal"  data-target="#reset_password"   class="pull-right text-success">Forgot Password ?</a>
    </div>
  </div>
    
</div>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>         


<style type="text/css">


/*************************  Login page ***************/
@media only screen and (max-width: 767px){
     .login-form form {
          padding: 15px!important;
      }
}
a.login-link {
    cursor: pointer;
}
.modal {
    opacity: 1;
   background: transparent;
}
a#login {
    color: #0e7bc3!important;
}
/*body.modal-open {
    padding: 0px!important;
}*/
.modal.mobile-view.active {
    background: white!important;
}
.modal-footer {
     border-top: hidden; 
    margin-bottom: 15px;
}
.login-form button.btn.btn-success.btn-block.login-btn {
    background: #0e7bc3; 0% 0% no-repeat padding-box;
    border: 1px solid #E1E1E1;
    border-radius: 28px;
    opacity: 1;
}
.login-form .or-text {
    text-align: center;
    margin-top: 30px;
    margin-bottom: 30px;
}
.login-form a.btn.btn-primary.btn-block {
    background: #3B5998 0% 0% no-repeat padding-box;
    border-radius: 28px;
    opacity: 1;
    text-align: center;
}
.login-form a.btn.btn-danger.btn-block {
    background: #F44336 0% 0% no-repeat padding-box;
    border-radius: 28px;
    opacity: 1;
    text-align: center;
}
.login-form .input-group .form-control:last-child, .input-group-addon:last-child, .input-group-btn:last-child>.btn, .input-group-btn:last-child>.btn-group>.btn, .input-group-btn:last-child>.dropdown-toggle, .input-group-btn:first-child>.btn:not(:first-child), .input-group-btn:first-child>.btn-group:not(:first-child)>.btn,input#password,input#confirm_password {
    border-bottom-left-radius: 0;
    border-top-left-radius: 0;
    background: #FFFFFF 0% 0% no-repeat padding-box;
    border: 1px solid #E1E1E1;
    border-radius: 28px;
    opacity: 1;
}
input#cemail {
    width: 100%;
}
.login-form .input-group {
    width: 100%;
}
.login-form h2.text-center {
    font: Bold 36px/48px Segoe UI;
    letter-spacing: 0px;
    color: #0e7bc3;
    opacity: 1;
}
.login-form form a.text-success {
    color: #0e7bc3;
}
 .login-form form {
        margin-bottom: 15px;
        padding: 0 100px;
    }
    .login-form h2.text-center {
    font: Bold 36px/48px Segoe UI;
    letter-spacing: 0px;
    color: #0e7bc3;
    opacity: 1;
}
    .login-form h2 {
        margin: 0 0 15px;
    }
    .login-form .hint-text {
        color: #777;
        padding-bottom: 15px;
        text-align: center;
    }
    .form-control, .btn {
        min-height: 38px;
        border-radius: 2px;
    }
    .login-btn {        
        font-size: 15px;
        font-weight: bold;
    }
    .or-seperator {
        margin: 20px 0 10px;
        text-align: center;
        border-top: 1px solid #ccc;
    }
    .or-seperator i {
        padding: 0 10px;
        background: #f7f7f7;
        position: relative;
        top: -11px;
        z-index: 1;
    }
    .social-btn .btn {
        margin: 15px 0;
        font-size: 15px;
        text-align: left; 
        line-height: 24px;       
    }
    .social-btn .btn i {
        margin: 4px 15px  0 5px;
        min-width: 15px;
    }
    .input-group-addon .fa{
        font-size: 18px;
    }
div#reset_password p {
    text-align: center;
    font: Regular 18px/22px Lato;
    letter-spacing: 0px;
    color: #B7B7B7;
    opacity: 1;
    

</style>

<!------------------------------ Login page css end ------------------>

<!------------------------------Register page start ---------------------->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js">
  </script>
<script>
$(document).ready(function(){
  $("#register_close").click(function(){
    $("#full_name").val("");
    $("#cemail").val("");
     $("#phone_number").val("");
     $("#password").val("");
     $("#confirm_password").val("");
     
  });
});

$(document).ready(function(){
  $("#login_close").click(function(){
    $("#email").val("");
    $("#password").val("");
     
  });
});

$(document).ready(function(){
  $("#forgot_pass_close").click(function(){
    $("#email").val("");
     
  });
});
</script>
<div class="modal fade" id="register" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" id="register_close" onclick="myFunction()"   data-dismiss="modal" aria-hidden="true">&times;</button>
       <!--  <h4 class="modal-title" id="myModalLabel">Modal title</h4> -->
      </div>
      <div class="modal-body">
    <div class="login-form">
     {!! Form::open(['route' => 'register.store' , 'enctype' => 'multipart/form-data']) !!}
        <h2 class="text-center">Sign Up</h2>        
        <div class="form-group">
            <div class="input-group">
                {!! Form::text('full_name', null, ['class' => 'col-md-12 col-xs-12 form-control','placeholder' => 'Full Name','maxlength' => '30','onKeyPress' => 'return ValidateAlpha(event);','required' => 'required','onKeyPress' => 'return ValidateAlpha(event);','id'=>'full_name']) !!}
                 @if ($errors->has('job_title'))
                 <span class="help-block">
                 <strong>{{ $errors->first('job_title') }}</strong>
                 </span> 
                 @endif
            </div>
        </div>
        <div class="form-group">
            <div class="input-group">
              <meta name="csrf-token" content="{{ csrf_token() }}" />
                {!! Form::email('email', null, ['class' => 'col-md-12 col-xs-12 form-control','placeholder' => 'Email Address','required' => 'required','onblur' => 'checkmain(this.value)','id' => 'cemail','pattern' => '[a-zA-Z0-9.-_]{1,}@[a-zA-Z.-]{2,}[.]{1}[a-zA-Z]{2,}']) !!}
             <span id="myElem1"></span>
             {{-- <script type="text/javascript">
                $("#myElem1").show();
              setTimeout(function() { $("#myElem").hide(); }, 3000);
              </script> --}}
               <!--  <meta name="csrf-token" content="{{ csrf_token() }}" />
                <input onblur="checkmain(this.value)" id="cemail" autofocus="not" type="email"  name="email"> -->
                 @if ($errors->has('email'))
                
                 <span class="help-block">
                 <strong>{{ $errors->first('email') }}</strong>
                 </span> 
                 @endif
            </div>
        </div>

       

        <div class="form-group">
            <div class="input-group">
                {!! Form::text('phone_number', null, ['class' => 'col-md-12 col-xs-12 form-control','placeholder' => 'Phone No','maxlength' => '10','required' => 'required','onKeyPress' => 'return isNumberKey(event)','id'=>'phone_number']) !!}
                 @if ($errors->has('phone_number'))
                 <span class="help-block">
                 <strong>{{ $errors->first('phone_number') }}</strong>
                 </span> 
                 @endif
            </div>
        </div>
       <!--  <div class="form-group">
            <div class="input-group">
                {!! Form::text('address', null, ['class' => 'col-md-12 col-xs-12 form-control','placeholder' => 'Address','required' => 'required']) !!}
                 @if ($errors->has('address'))
                 <span class="help-block">
                 <strong>{{ $errors->first('address') }}</strong>
                 </span> 
                 @endif
            </div>
        </div> -->
       <div class="form-group">
            <div class="input-group">
             
             <input type="password" id="newPass" name="newpass" required="required" class="commanClass password1" placeholder="Password">
             
               <i onclick="show('newPass')" class="fas fa-eye-slash" id="display"></i>

                 @if ($errors->has('password'))
                 <span class="help-block">
                 <strong>{{ $errors->first('password') }}</strong>
                 </span> 
                 @endif
            </div>
        </div>

        <div class="form-group">
            <div class="input-group">
              
               <input name="confirm_password"  type="password"  required="required" class="form-control password2" placeholder="Confirm Password"  id="confirm_password" />
            
               <i onclick="show('confirm_password')" class="fas fa-eye-slash" id="display"></i>
                 @if ($errors->has('confirm_password'))
                 <span class="help-block">
                 <strong>{{ $errors->first('confirm_password') }}</strong>
                 </span> 
                 @endif
            </div>
           
        </div>
        <p id="validate-status"></p>

        <style type="text/css">
        i#display {
    position: absolute;
    right: 16px;
    margin-top: 18px;
}
          .show-button{
  position:absolute;
  right:22px;
  top: 32px;
  border:0px;
  background-color:transparent;
}
/*input{
width:100%;
}*/
input#newPass {
    width: 100%;
}
input#newPass {
    border-bottom-left-radius: 0;
    border-top-left-radius: 0;
    background: #FFFFFF 0% 0% no-repeat padding-box;
    border: 1px solid #E1E1E1;
    border-radius: 28px;
    opacity: 1;
}
i.fa.fa-eye {
    position: absolute;
    margin-top: -18px;
    font-size: 17px;
}
        </style>

<script type="text/javascript">
 function show(a) {
  var x=document.getElementById(a);
  var c=x.nextElementSibling
  if (x.getAttribute('type') == "password") {
  c.removeAttribute("class");
  c.setAttribute("class","fas fa-eye");
  x.removeAttribute("type");
    x.setAttribute("type","text");
  } else {
  x.removeAttribute("type");
    x.setAttribute('type','password');
 c.removeAttribute("class");
  c.setAttribute("class","fas fa-eye-slash");
  }
}
</script>
        <div class="form-group">
           
            <button type="submit" id="submit" class="btn btn-success btn-block login-btn">Sign Up</button>
        </div>
     
    {!! Form::close() !!}
     <script type="text/javascript">
   $(document).ready(function() {
 // $(".password1").keyup(validate);
  $(".password2").keyup(validate);
});


function validate() {
  var password1 = $(".password1").val();
  //alert(password1);
  var password2 = $(".password2").val();
//alert(password2);
    
 
    if(password1 == password2) {
       $("#validate-status").text("");    
       document.getElementById("submit").disabled = false;    
    }
    else {
        $("#validate-status").text("Entered Password is not matching!! Try Again"); 
        document.getElementById("submit").disabled = true;
    }
    
}
</script>

<script type="text/javascript">
          function checkmain(email)
            {
              $.ajax({
              url : '{{ url("/checkemail") }}',
              headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
              type: 'POST',
              data: { email: email ,
            },

            }).done(function(response) {
            if(response == "Email Already In Use.")
            {
              
                $('#cemail').siblings("span").text('This email has already been taken');
            //alert("Email Already In Use.");
            }else{
              $('#cemail').siblings("span").text('')
            }
            });
            }
        </script>
        <style type="text/css">
          input#cemail {
            border-bottom-left-radius: 0;
            border-top-left-radius: 0;
            background: #FFFFFF 0% 0% no-repeat padding-box;
            border: 1px solid #E1E1E1;
            border-radius: 28px;
            opacity: 1;
        }
        </style>
    <div class="col-sm-12">
        <div class="hint-text small">Already have an Account?   <a href="#" id="login" data-toggle="modal" data-dismiss="modal"  data-target="#login" class="text-success">Sign In</a></div>
    </div>
    
    
</div>

      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>         
<!-- <script type="text/javascript">
      

    function validatePassword(){
   
       var password = document.getElementById("password")
      , confirm_password = document.getElementById("confirm_password");
      if(password.value != confirm_password.value) {
        confirm_password.setCustomValidity("Passwords Don't Match");
      } else {
        confirm_password.setCustomValidity('');
      }
      password.onchange = validatePassword;
    confirm_password.onkeyup = validatePassword;
    }

    
</script> -->
        
     
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>

<style type="text/css">
  .field-icon {
     float: right;
    right: 0;
    margin-right: 18px;
    margin-top: 12px;
    position: absolute;
    z-index: 99999;
    cursor: pointer;
}
.alert-success {
    text-align: center;
    background-color: #dff0d8;
    border-color: #d6e9c6;
    color: #3c763d;
    width: 32%;
    float: right;
    position: absolute;
    margin-top: -168px;
    right: 0;
}
</style>

<!--------------------------------Register page end ------------------------>
<!-------------------------------- Forgot Password page start ------------------------>
<div class="modal fade" id="reset_password" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" id="forgot_pass_close"  data-dismiss="modal" aria-hidden="true">&times;</button>
        <!--  onclick="javascript:window.location.reload()" -->
       <!--  <h4 class="modal-title" id="myModalLabel">Modal title</h4> -->
      </div>
      <div class="modal-body">
    <div class="login-form forgetPasswordEmail">
     {!! Form::open(['route' => 'forgetPasswordEmail' , 'enctype' => 'multipart/form-data']) !!}
        <h2 class="text-center">Reset your Password</h2>        
        <div class="or-text"><p>Enter your email Address to reset your password</p></div>
        <div class="form-group">
            <div class="input-group">
                <input type="email" pattern ='[a-zA-Z0-9.-_]{1,}@[a-zA-Z.-]{2,}[.]{1}[a-zA-Z]{2,}' class="form-control" name="email" required="required" placeholder="Email Address" id="email" required="required">
            </div>
        </div>
       
        <div class="form-group">
           
            <button type="submit" class="btn btn-success btn-block login-btn">Reset Password</button>
        </div>
         <div class="col-sm-12">
        <div class="hint-text small">Already have an Account?   <a href="#" id="login" data-toggle="modal" data-dismiss="modal"  data-target="#login" class="text-success">Sign In</a></div>
       </div>
       
    {!! Form::close() !!}
    
</div>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>      
<!-------------------------------- Forgot Password page end ------------------------>

<header class="header">
   <div class="header-top">
      <div class="container">
         <div class="header-left">
          <p class="welcome-msg">Welcome to P.O. Box.... Get your choice at your place on time

</p>
         </div>
         <!-- End .header-left -->
         <div class="header-right">
            
            <div class="header-dropdown dropdown-expanded">
               <a href="#">Links</a>
               <div class="header-menu">
                  <ul>
                     
                      @if(Auth::user())
                      <li>
                        <a style="text-decoration: none!important;color: #1d70ba;">
                      @if(Auth::user())
                      Hi {{Auth::user()->name}}
                      @endif
                    </a>
                   </li>
                   <li><a href="{{route('myAccountPage')}}">MY ACCOUNT </a></li>
                      <li><a href="{{route('wishlist')}}">MY WISHLIST </a></li>
                     <li><a href="{{route('logout')}}">Sign Out</a></li>
                     @elseif(!(Auth::user()))
                     <li>
                        <a href="#" class=""  data-toggle="modal" data-target="#login">Sign In</a> 
                     </li>
                     <li><a href="#" class=" " data-toggle="modal" data-target="#register">Sign Up</a></li>
                     @endif
                  </ul>
                 
               
               </div>
               <!-- End .header-menu -->
            </div>
            <!-- End .header-dropown -->
         </div>
         <!-- End .header-right -->
      </div>
      <!-- End .container -->
   </div>
   <!-- End .header-top -->
   <div class="header-middle">
      <div class="container">
        <div class="header-left">
            <button class="mobile-menu-toggler" type="button">
            <i class="icon-menu"></i>
            </button>
         </div>
         <div class="header-center">
            <a href="{{route('home_1')}}" class="logo">
            <img src="{{ asset('images/logo.png') }}" alt="PO Box Logo">
            </a>
         </div>
         <!-- End .header-left -->
        
         <!-- End .headeer-center -->
         <div class="header-right">
  
        @if(Auth::user())
          <script type="text/javascript">
            function getUserCart()
            { 
              var asset_url = '{{ asset("/assets") }}';
              $.ajax({
                 url : '{{ url("/product-details/hoverCart") }}',
                {{--url : '{{ url("/kurties") }}', --}}
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                type: 'get',
                data: { user_id: '{{Auth::user()->id}}' }
              }).done(function(response) {
                var items = response.items;
                items = [{'name':'name1','quentity':"2",'price':123,'image':'assets/images/products/cart/product-1.jpg','id':1}, {'name':'name2','quentity':"2",'price':111,'image':'assets/images/products/cart/product-1.jpg','id':2}];
                // html = '<p>Cart is empty</p>';
                total_price = 0;
                html = '';
                if(response.product_details.length > 0)
                {
                  $(".cart-count").show();
                  $(".cart-count").text(response.product_details.length);
                } else {
                  $(".cart-count").hide();
                }
                $.each(response.product_details, function(key, item){
                    total_price += parseFloat(item.price * item.qty);
                    console.log(item.product_id);
                    var url = '{{url('product-detail')}}/'+item.product_id;
                    html += `
                          <div class="product" data-price='`+parseFloat(item.price * item.qty)+`'>
                            <div class="product-details">
                              <h4 class="product-title">
                                 <a href="`+url+`">`+item.name+`</a>
                              </h4>

                              <span class="cart-product-info">
                              <span class="cart-product-qty">`+item.qty+`</span>
                              x <span style='font-family:Arial;'>&#8377;</span>`+item.price+`
                              </span>
                           </div>
                           <figure class="product-image-container">
                              <a href="`+url+`" class="product-image">
                               <img src="`+asset_url+`/upload_images/product/`+item.image+`" alt="product">
                              </a>
                              <a href="javascript:void(0)" class="btn-remove" title="Remove Product"><i class="icon-cancel deleteCartProduct" data-id='`+item.cart_id+`'></i></a>
                           </figure>
                        </div>
                    `;
                });
                console.log(total_price);
                
                if(total_price > 0){
                  $(".cartEmpty").hide();
                  $(".cartTotal").show();
                  $(".actionItems").show();
                  $(".cartProductsPopup").show();
                  $('.cart-dropdown .cartProductsPopup').html(html);
                  $('.cart-total-price').html("<span style='font-family:Arial;'>&#8377;</span>"+total_price+"");
                } else {
                  $(".cartTotal").hide();
                  $(".actionItems").hide();
                  $(".cartProductsPopup").hide();
                  $(".cartEmpty").show();
                }
              });
            }

            getUserCart();

              $(document.body).on('click', '.deleteCartProduct', function(){  
                gol = $(this);
                $.ajax({
                   url : '{{ url("/product-details/removeCartData") }}', 
                  headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                  type: 'post',
                  data: { 
                    'cart_id': $(this).data('id'), 
                    'user_id': '{{Auth::user()->id}}' 
                  }
                }).done(function(response) { 


                  /*$(this).parent().parent().parent().remove(); 
                  if( $('.dropdown-cart-products').find('.product').length ==0)
                    $('.cart-dropdown .dropdown-cart-products').html('cart is empty');*/


                    gol.parent().parent().parent().remove(); 
                  if( $('.dropdown-cart-products').find('.product').length ==0)
                    $('.cart-dropdown .dropdown-cart-products').html('cart is empty');

                    /*setTimeout(function(){
                      var total_p=0;
                      $.each($('.dropdown-cart-products .product'), function(key, item){ 
                          total_p += $(this).data('price');

                          console.log(total_p,  $(this).data('price'), 'dfdf');
                      });
                      $('.cart-total-price').html(total_p);
                    },200);*/
                    getUserCart();
                });

              });

          </script>
        @else
            <script type="text/javascript">
            function getGuestUserCart()
            {
              var asset_url = '{{ asset("/assets") }}';
              $.ajax({
                 url : '{{ url("/product-details/hoverCart") }}',
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                type: 'get',
              }).done(function(response) {
                var items = response.items;
                items = [{'name':'name1','quentity':"2",'price':123,'image':'assets/images/products/cart/product-1.jpg','id':1}, {'name':'name2','quentity':"2",'price':111,'image':'assets/images/products/cart/product-1.jpg','id':2}];
                // html = '<p>Cart is empty</p>';
                total_price = 0;
                html = '';
                
                if(typeof response.product_details !== 'undefined' && response.product_details !== 'undefined' && response.product_details !== undefined  && response.product_details.length > 0)
                {
                  $(".cart-count").show();
                  $(".cart-count").text(response.product_details.length);
                } else {
                  $(".cart-count").hide();
                }
                $.each(response.product_details, function(key, item){
                    total_price += parseFloat(item.price * item.qty);
                    html += `
                          <div class="product" data-price='`+parseFloat(item.price * item.qty)+`'>
                            <div class="product-details">
                              <h4 class="product-title">
                                 <a href="">`+item.name+`</a>
                              </h4>

                              <span class="cart-product-info">
                              <span class="cart-product-qty">`+item.qty+`</span>
                              x <span style='font-family:Arial;'>&#8377;</span>`+item.price+`
                              </span>
                           </div>
                           <figure class="product-image-container">
                              <a href="" class="product-image">
                              <img src="`+asset_url+`/upload_images/product/`+item.image+`" alt="product">
                              </a>
                              <a href="javascript:void(0)" class="btn-remove" title="Remove Product"><i class="icon-cancel deleteCartProduct" data-id='`+item.cart_id+`'></i></a>
                           </figure>
                        </div>
                    `;
                });

                
                if(total_price > 0){
                  console.log(total_price);
                  $(".cartEmpty").hide();
                  $(".cartTotal").show();
                  $(".actionItems").show();
                  $(".cartProductsPopup").show();
                  $('.cart-dropdown .cartProductsPopup').html(html);
                  $('.cart-total-price').html("<span style='font-family:Arial;'>&#8377;</span>"+total_price+"");
                } else {
                  $(".cartTotal").hide();
                  $(".actionItems").hide();
                  $(".cartProductsPopup").hide();
                  $(".cartEmpty").show();
                }
              });
            }

            getGuestUserCart();

            $(document.body).on('click', '.deleteCartProduct', function(){  
                gol = $(this);
                $.ajax({
                   url : '{{ url("/product-details/removeCartData") }}', 
                  headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                  type: 'post',
                  data: { 
                    'cart_id': $(this).data('id'), 
                  }
                }).done(function(response) { 


                    gol.parent().parent().parent().remove(); 
                  if( $('.dropdown-cart-products').find('.product').length ==0)
                    $('.cart-dropdown .dropdown-cart-products').html('cart is empty');


                  console.log($('.dropdown-cart-products').find('.product').length);
                    /*setTimeout(function(){
                      var total_p=0;
                      $.each($('.dropdown-cart-products .product'), function(key, item){ 
                        console.log(key);
                          total_p += $(this).data('price');
                      });
                      console.log(total_p);
                      $('.cart-total-price').html(total_p);
                    },500);*/
                    getGuestUserCart();
                });

              });
          </script>
        @endif
            
            <!-- <div class="header-contact">
               <span>Call us now</span>
               <a href="tel:#"><strong>+91 9879899004</strong></a>
            </div> -->
            <!-- End .header-contact -->
            <div class="dropdown cart-dropdown">
               <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static" data-dismiss="modal" aria-hidden="true">
                 <!--  <i class="fa fa-shopping-cart" aria-hidden="true"></i> -->
               <span class="cart-count">0</span>
               </a>
                 <?php //if(isset(Auth::user()->id)) { ?>
               <div class="dropdown-menu" style="overflow-y: unset!important;max-height: auto !important;overflow-x: unset!important;" >
                  
                  <div class="dropdownmenu-wrapper">
                      
                     <div class="dropdown-cart-products cartProductsPopup" style="overflow-y: scroll!important;max-height: 306px!important;overflow-x: hidden !important;">
                        {{-- <div class="product">
                           <div class="product-details">

                              <h4 class="product-title">
                                 <a href="">Woman Ring 000</a>
                              </h4>

                              <span class="cart-product-info">
                              <span class="cart-product-qty">1</span>
                              x $99.00
                              </span>
                           </div>
                           
                           <figure class="product-image-container">
                              <a href="" class="product-image">
                              <img src="assets/images/products/cart/product-1.jpg" alt="product">
                              </a>
                              <a href="#" class="btn-remove" title="Remove Product"><i class="icon-cancel deleteCartProduct"></i></a>
                           </figure>
                        </div> --}}
                        
                        
                        <!-- End .product -->
                     </div>
                     <!-- End .cart-product -->
                     <div class="dropdown-cart-total cartTotal">
                        <span>Total</span>
                        <span class="cart-total-price">?134.00</span>
                     </div> 
                     <div class="dropdown-cart-total cartEmpty" style="display:none;">
                        <div class="col-md-12">
                          <img src="{{asset('/assets/images/blank-cart.png')}}">
                        </div>
                        <div class="col-md-12">
                          <span>No products are available in the cart</span>
                        </div>
                        <div class="col-md-12">
                          <a href="{{route('home_1')}}" class="btn btn-block btn-sm btn-primary">CONTINUE SHOPPING</a>
                        </div>
                     </div>
                     <!-- End .dropdown-cart-total -->
                     <div class="dropdown-cart-action actionItems">
                        <a href="{{route('cartPage')}}" class="btn">View Cart</a>
                        @if(Auth::id() > 0)
                        <a href="{{route('checkoutDetail')}}" class="btn">Checkout</a>
                        @else
            <a href="{{route('checkoutDetail')}}" class="btn">Checkout</a>
                        <!---<a href="javascript:void(0)" data-toggle="modal" data-dismiss="modal"  data-target="#login" class="btn">Checkout</a>-->
                        @endif
                     </div>
                     <!-- End .dropdown-cart-total -->
                      
                  </div>
                   
                  <!-- End .dropdownmenu-wrapper -->
               </div>
                <?php //} ?>
               <!-- End .dropdown-menu -->
            </div>
            <!-- End .dropdown -->
         </div>
         <!-- End .header-right -->
      </div>
      <!-- End .container -->
   </div>
   <!-- End .header-middle -->
   <div class="header-bottom sticky-header">
         <nav class="main-nav">
          <div class="container">
            <ul class="menu sf-arrows">
               <li {{ Request::is('home') ? ' class=active' : null }}><a href="{{route('home_1')}}">Home</a></li>
               <li {{ Request::is('new-arrival') ? ' class=active' : null }}><a href="{{route('newArrival')}}">New Arrival</a></li>
               <li {{ Request::is('trending') ? ' class=active' : null }}><a href="{{route('trending')}}">Trending</a></li>
               <li {{ Request::is('kurties') ? ' class=active' : null }}><a href="{{route('kurties')}}">Kurties</a></li>
               <li {{ Request::is('kurta-sets') ? ' class=active' : null }}><a href="{{route('kurta.sets')}}">Kurta Sets</a></li>
               <li {{ Request::is('dresses') ? ' class=active' : null }}><a href="{{route('dresses')}}">Dresses</a></li>
               <li class="float-right"><a href="{{route('contactUs')}}">Contact Us</a></li>
                   
            </ul>
             </div>
         </nav>
        
      </div>
      <!-- End .header-bottom -->
   </div>
   <!-- End .header-bottom -->
</header>
<!-- End .header -->

<script type="text/javascript">
 function isNumberKey(e){var h=e.which?e.which:e.keyCode;return!(46!=h&&h>31&&(h<48||h>57))}function ValidateAlpha(e){var h=e.which?e.which:e.keyCode;return!(h<65||h>90)||!(h<97||h>123)||32==h}
</script> 
<style type="text/css">
  .moblie_menu
  {
    display: none;
  }
@media only screen and (max-width: 768px) {
  /* For mobile phones: */
  [class*="header-top"] {
    display: none
  }
}
.moblie_menu
  {
    display: inline;
  }
.header-center {
    margin-right: 30px;
    margin-left: auto;
}
</style>