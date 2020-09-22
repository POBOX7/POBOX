<!-- Login page code start -->
<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class=""  data-dismiss="modal" aria-hidden="true">&times;</button>
        
      </div>
      <div class="modal-body">
    <div class="login-form">
     {!! Form::open(['route' => 'userLogin' , 'enctype' => 'multipart/form-data']) !!}
        <h2 class="text-center">Sign In1</h2>        
        <div class="form-group">
            <div class="input-group">
                <input type="email" pattern="[a-zA-Z0-9.-_]{1,}@[a-zA-Z.-]{2,}[.]{1}[a-zA-Z]{2,}" class="form-control"  name="email" placeholder="Email Address" required="required">
            </div>
        </div>
        <div class="form-group">
            <div class="input-group">
                <input type="password" class="form-control" name="password" placeholder="Password" required="required">
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

<script type="text/javascript">
     $('#login').on('shown.bs.modal', function() {
        $(document).off('focusin.modal');
    });
</script>

<style type="text/css">


/*************************  Login page ***************/
@media only screen and (max-width: 767px){
     .login-form form {
          padding: 15px!important;
      }
      .alert 
      {
        width: 100%;
        padding-top: 60px;
      }
      .alert-success
      {
        width: 100%;
        padding-top: 60px;
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
body.modal-open {
    padding: 0px!important;
}
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

<div class="modal fade" id="register" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class=""   data-dismiss="modal" aria-hidden="true">&times;</button>
        <!-- onclick="myFunction()"  -->
       <!--  <h4 class="modal-title" id="myModalLabel">Modal title</h4> -->
      </div>
      <div class="modal-body">
    <div class="login-form">
     {!! Form::open(['route' => 'register.store' , 'enctype' => 'multipart/form-data']) !!}
        <h2 class="text-center">Sign Up</h2>        
        <div class="form-group">
            <div class="input-group">
                {!! Form::text('full_name', null, ['class' => 'col-md-12 col-xs-12 form-control','placeholder' => 'Full Name','maxlength' => '30','onKeyPress' => 'return ValidateAlpha(event);','required' => 'required','onKeyPress' => 'return ValidateAlpha(event);']) !!}
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
             <span></span>
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
                {!! Form::text('phone_number', null, ['class' => 'col-md-12 col-xs-12 form-control','placeholder' => 'Phone No','maxlength' => '10','required' => 'required','onKeyPress' => 'return isNumberKey(event)']) !!}
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
                <input id="password" type="password" pattern=".{8,}"   required title="8 characters minimum" class="form-control" required="required" placeholder="Password" name="password" >
                <span toggle="#password" class="fa fa-lg fa-eye-slash field-icon password"></span>
                 @if ($errors->has('password'))
                 <span class="help-block">
                 <strong>{{ $errors->first('password') }}</strong>
                 </span> 
                 @endif
            </div>
        </div>

        <div class="form-group">
            <div class="input-group">
                <input id="confirm_password" type="password" pattern=".{8,}"   required title="8 characters minimum" required="required" class="form-control" placeholder="Confirm Password" name="confirm_password">
                <span toggle="#confirm_password" class="fa fa-lg fa-eye-slash field-icon confirm_password"></span>
                 @if ($errors->has('confirm_password'))
                 <span class="help-block">
                 <strong>{{ $errors->first('confirm_password') }}</strong>
                 </span> 
                 @endif
            </div>
        </div>


        <div class="form-group">
           
            <button type="submit" class="btn btn-success btn-block login-btn">Sign Up</button>
        </div>
        
    {!! Form::close() !!}
     <script type="text/javascript">
          // function checkmain(email)
          //   {
          //     $.ajax({
          //     url : '{{ url("/checkemail") }}',
          //     headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
          //     type: 'POST',
          //     data: { email: email ,
          //   },

          //   }).done(function(response) {
          //   if(response == "Email Already In Use.")
          //   {
              
          //       $('#cemail').siblings("span").text('Sorry... Email Already Taken');
          //   //alert("Email Already In Use.");
          //   }
          //   });
          //   }
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
<script>
  $('#register').on('hidden.bs.modal', function () {
    $('#register form')[0].reset();
});
</script>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>         
<script type="text/javascript">
      

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

    
</script>
        
       <script type="text/javascript">
         
         function myFunction() {
            document.getElementById("register").reset();
        }
       </script>
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
<script type="text/javascript">
  $(".confirm_password").click(function() {

  $(this).toggleClass("fa-eye fa-eye-slash");
  var input = $($(this).attr("toggle"));
  if (input.attr("type") == "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }
});

 $(".password").click(function() {

  $(this).toggleClass("fa-eye fa-eye-slash");
  var input = $($(this).attr("toggle"));
  if (input.attr("type") == "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }
});
</script>
<!--------------------------------Register page end ------------------------>
<!-------------------------------- Forgot Password page start ------------------------>
<div class="modal fade" id="reset_password" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class=""  data-dismiss="modal" aria-hidden="true">&times;</button>
       <!--  <h4 class="modal-title" id="myModalLabel">Modal title</h4> -->
      </div>
      <div class="modal-body">
    <div class="login-form forgetPasswordEmail">
     {!! Form::open(['route' => 'forgetPasswordEmail' , 'enctype' => 'multipart/form-data']) !!}
        <h2 class="text-center">Reset your Password</h2>        
        <div class="or-text"><p>Enter your email Address to reset your password</p></div>
        <div class="form-group">
            <div class="input-group">
                <input type="email" pattern ='[a-zA-Z0-9.-_]{1,}@[a-zA-Z.-]{2,}[.]{1}[a-zA-Z]{2,}' class="form-control" name="email" required="required" placeholder="Email Address" required="required">
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
 <script type="text/javascript">
    $('#register').on('hidden.bs.modal', function () {
     location.reload();
    })
</script>
<script type="text/javascript">
    $('#login').on('hidden.bs.modal', function () {
     location.reload();
    })
</script>
<!-- <script type="text/javascript">
    $('#reset_password').on('hidden.bs.modal', function () {
     location.reload();
    })
</script> -->
<!-- mobile navigation -->
  <div class="modal mobile-view">
    <div class="px-4 py-6 flex items-center justify-between relative">
      <button class="close text-gray-500">
        <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24">
          <path d="M6 18L18 6M6 6l12 12"></path>
        </svg>
      </button>

      <a href="{{route('home_1')}}" title="" class="inline-block mx-auto absolute md:relative mx-auto logo">
        <img class="h-12 sm:h-16" src="{{ asset('images/logo.png') }}" alt="">
      </a>
    </div>

    <div class="px-4 py-4">
      <div class="flex flex-col items-center">
        <a href="{{route('home_1')}}" class="nav-link active">
          Home
        </a>
        <a href="{{route('newArrival')}}" class="nav-link mt-4">
          New Arrival
        </a>
        <a href="{{route('trending')}}" class="nav-link mt-4">
          Trending
        </a>
        <a href="#" class="nav-link mt-4">
          Kurties
        </a>
        <a href="#" class="nav-link mt-4">
          Kurta Sets
        </a>
        <a href="#" class="nav-link mt-4">
          Dresses
        </a>
        <a href="#" class="nav-link mt-4">
          Contact Us
        </a>
        <a href="#" class="block w-full px-4 py-2 mt-6 bg-white border border-blue-600 rounded-none flex items-center justify-center text-blue-600 font-bold">
           @if(Auth::user())
                
           @if(Auth::user())
           <style type="text/css">
             i.fa.fa-user {
                color: #939393;
            }
           </style>
             <span style="padding-right: 10px;" class="text"><i  style="padding-right: 5px;color: #939393!important;"  class="fa fa-user" aria-hidden="true"> </i><a>{{Auth::user()->name}}</span>
          @endif
            <a href="{{route('logout')}}">Logout</a>
          @elseif(!(Auth::user()))
          <a class="login-link" data-toggle="modal" data-target="#login">Sign In</a>/
          <a class="login-link" data-toggle="modal" data-target="#register">Sign Up</a>
          @endif
        </a>
      </div>
    </div>
  </div>

  <!-- utility bar -->
  <div class="bg-white py-2 shadow-md relative z-20 hidden md:block">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="md:flex items-center justify-center md:justify-between text-center md:text-left" style="
    padding: 10px 0 10px 0px;">
        <div>
          <p class="text-blue-600 text-base leading-6" style="margin-bottom: 0px;">
            Welcome to P.O. Box.... Get your choice at your place on time
          </p>
        </div>
        <div class="hidden md:block">
           @if(Auth::user())
                
           @if(Auth::user())
             <span style="padding-right: 10px;color: #939393;" class="text"><i  style="padding-right: 5px;" class="fa fa-user" aria-hidden="true"> </i>{{Auth::user()->name}}</span>
          @endif
            <a href="{{route('logout')}}">Logout</a>
          @elseif(!(Auth::user()))
          <a href="#" title="" class="inline-block text-blue-600">
            <a class="login-link" data-toggle="modal" data-target="#login">Sign In</a> <span style="color: #1a62ad!important;">/</span> 
          <a class="login-link" data-toggle="modal" data-target="#register">Sign Up</a>
          </a>
          @endif
        </div>
      </div>
    </div>
  </div>

  <!-- main navigation -->
  <header class="bg-white py-6">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex items-center justify-between md:justify-end md:pt-4">
        <!-- <button type="button" class="flex items-center justify-center md:hidden open">
          <svg class="w-7 h-7 text-gray-500" fill="currentColor" viewBox="0 0 24 24">
            <path d="M4 11h12v2H4zm0-5h16v2H4zm0 12h7.235v-2H4z" />
          </svg>
        </button> -->
        <style>
        a.login-link {
    cursor: pointer;
    color: #1a62ad!important;
}
        .login-form.forgetPasswordEmail form {
    padding: 0 59px;
}
.sidenav {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 15px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
  color: #f1f1f1;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
</style>
</head>
<body>

<div id="mySidenav" class="sidenav" style="z-index: 99999">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="{{route('home_1')}}" title="" class="nav-link {{ Request::is('home') ? 'active' : null }}">
          Home
        </a>

        <a href="{{route('newArrival')}}" title=""  class="nav-link {{ Request::is('new-arrival') ? 'active' : null }}">
          New Arrival
        </a>

        <a href="#" title="" class="nav-link">
          Trending
        </a>

        <a href="#" title="" class="nav-link">
          Kurties
        </a>

        <a href="#" title="" class="nav-link">
          Kurta Sets
        </a>

        <a href="#" title="" class="nav-link">
          Dresses
        </a>

        <a href="#" title="" class="nav-link">
          Contact Us
        </a>
        @if(Auth::user())
                
          
            <a href="{{route('logout')}}">Logout</a>
          @elseif(!(Auth::user()))
        <a class="nav-link" data-toggle="modal" data-target="#login" href="javascript:void(0)" class="closebtn" onclick="closeNav()" style="width: 109px;float: left;">Sign In</a><span style="position: absolute;color: #818181;line-height: 40px;height: 42px;left: 110px;">/</span>
        <a class="nav-link" data-toggle="modal" data-target="#register" href="javascript:void(0)" class="closebtn" onclick="closeNav()" style="width: 114px;float: left;">Sign Up</a>
        @endif
</div>
<span class="mobile-view" style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>

<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}
</script>

        <a href="{{route('home_1')}}" title="" class="inline-block mx-auto absolute lg:relative mx-auto logo">
          <img class="h-12 sm:h-16" src="{{ asset('images/logo.png') }}" alt="">
        </a>

        <div class="flex items-center justify-between lg:hidden">
          <a href="#" title="" class="inline-block text-gray-500 hover:text-black">
            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
              <path d="M7.5 6.5C7.5 8.981 9.519 11 12 11s4.5-2.019 4.5-4.5S14.481 2 12 2 7.5 4.019 7.5 6.5zM20 21h1v-1c0-3.859-3.141-7-7-7h-4c-3.86 0-7 3.141-7 7v1h17z" />
            </svg>
          </a>
          
          <a href="#" title="" class="text-gray-500 hover:text-black ml-8 hidden md:inline-block">
            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
              <path d="M20.205 4.791a5.938 5.938 0 00-4.209-1.754A5.906 5.906 0 0012 4.595a5.904 5.904 0 00-3.996-1.558 5.942 5.942 0 00-4.213 1.758c-2.353 2.363-2.352 6.059.002 8.412L12 21.414l8.207-8.207c2.354-2.353 2.355-6.049-.002-8.416z" />
            </svg>
          </a>

          <a href="#" title="" class="inline-block text-gray-500 hover:text-black ml-8">
            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
              <path d="M21.822 7.431A1 1 0 0021 7H7.333L6.179 4.23A1.994 1.994 0 004.333 3H2v2h2.333l4.744 11.385A1 1 0 0010 17h8c.417 0 .79-.259.937-.648l3-8a1 1 0 00-.115-.921z" />
              <circle cx="10.5" cy="19.5" r="1.5" />
              <circle cx="17.5" cy="19.5" r="1.5" />
            </svg>
          </a>
        </div>
      </div>

      <nav class="items-center justify-between hidden md:flex mt-10 header-nav-menu">
        <a href="{{route('home_1')}}" title="" class="nav-link {{ Request::is('home') ? 'active' : null }}">
          Home
        </a>

        <a href="{{route('newArrival')}}" title=""  class="nav-link {{ Request::is('new-arrival') ? 'active' : null }}">
          New Arrival
        </a>

        <a href="#" title="" class="nav-link">
          Trending
        </a>

        <a href="#" title="" class="nav-link">
          Kurties
        </a>

        <a href="#" title="" class="nav-link">
          Kurta Sets
        </a>

        <a href="#" title="" class="nav-link">
          Dresses
        </a>

        <a href="#" title="" class="nav-link">
          Contact Us
        </a>

        <div class="flex items-center justify-between md:hidden lg:block">
          <a href="#" title="" class="inline-block text-gray-500 hover:text-black">
            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
              <path d="M7.5 6.5C7.5 8.981 9.519 11 12 11s4.5-2.019 4.5-4.5S14.481 2 12 2 7.5 4.019 7.5 6.5zM20 21h1v-1c0-3.859-3.141-7-7-7h-4c-3.86 0-7 3.141-7 7v1h17z" />
            </svg>
          </a>

          <a href="#" title="" class="inline-block text-gray-500 hover:text-black ml-8">
            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
              <path d="M20.205 4.791a5.938 5.938 0 00-4.209-1.754A5.906 5.906 0 0012 4.595a5.904 5.904 0 00-3.996-1.558 5.942 5.942 0 00-4.213 1.758c-2.353 2.363-2.352 6.059.002 8.412L12 21.414l8.207-8.207c2.354-2.353 2.355-6.049-.002-8.416z" />
            </svg>
          </a>

          <a href="#" title="" class="inline-block text-gray-500 hover:text-black ml-8">
            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
              <path d="M21.822 7.431A1 1 0 0021 7H7.333L6.179 4.23A1.994 1.994 0 004.333 3H2v2h2.333l4.744 11.385A1 1 0 0010 17h8c.417 0 .79-.259.937-.648l3-8a1 1 0 00-.115-.921z" />
              <circle cx="10.5" cy="19.5" r="1.5" />
              <circle cx="17.5" cy="19.5" r="1.5" />
            </svg>
          </a>
        </div>
      </nav>
    </div>
  </header>
<script type="text/javascript">
 function isNumberKey(e){var h=e.which?e.which:e.keyCode;return!(46!=h&&h>31&&(h<48||h>57))}function ValidateAlpha(e){var h=e.which?e.which:e.keyCode;return!(h<65||h>90)||!(h<97||h>123)||32==h}
</script> 