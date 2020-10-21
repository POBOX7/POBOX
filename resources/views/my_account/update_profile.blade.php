@extends('new_resources.layouts.new_app') 
@section('content')
@if (session('status'))
   <div class="alert alert-success" id="myElemp">
      <strong>{{ session('status') }}</strong>
   </div>
@endif
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
  $("#myElemp").show();
setTimeout(function() { $("#myElemp").hide(); }, 12000);
</script>

<div class="my_account_bg">
<div class="container">
     @include('new_resources.layouts.leftside_my_account')  


    <div id="update_profile" class="col-sm-12 col-xs-12 col-md-12 col-lg-9 tabcontent float-right">
            <h1 style="text-align: center;"> Personal Information</h1>
            <p class="content" style="text-align: center;">Hey there! Fill in your details for a personalized shopping experience.</p>
      
       <form method="POST" action="{{route('update.user.profile')}}">
        @csrf
          <div class="form-group">
            <div class="input-group">
                <!-- {!! Form::text('full_name', null, ['class' => 'col-md-12 col-xs-12 form-control','placeholder' => 'Full Name','maxlength' => '30','onKeyPress' => 'return ValidateAlpha(event);','required' => 'required','onKeyPress' => 'return ValidateAlpha(event);' ]) !!} -->
                <input type="text" name="full_name" class="col-md-12 col-xs-12 form-control" placeholder="Full Name" maxlength="30" onkeypress="return ValidateAlpha(event);" value="{{$user_informations->name}}" required >
                 @if ($errors->has('full_name'))
                 <span class="help-block">
                 <strong>{{ $errors->first('full_name') }}</strong>
                 </span> 
                 @endif
            </div>
        </div>
        <div class="form-group">
            <div class="input-group">
              <meta name="csrf-token" content="{{ csrf_token() }}" />
                <!-- {!! Form::email('email', null, ['class' => 'col-md-12 col-xs-12 form-control','placeholder' => 'Email Address','required' => 'required','onblur' => 'checkmain(this.value)','id' => 'cemail','pattern' => '[a-zA-Z0-9.-_]{1,}@[a-zA-Z.-]{2,}[.]{1}[a-zA-Z]{2,}']) !!} -->
                <input type="email" name="email" class="col-md-12 col-xs-12 form-control" placeholder="Email Address"   onblur="checkmain(this.value)" id="cemail" disabled="disabled" pattern="[a-zA-Z0-9.-_]{1,}@[a-zA-Z.-]{2,}[.]{1}[a-zA-Z]{2,}" value="{{$user_informations->email}}" >
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
                <!-- {!! Form::text('phone_number', null, ['class' => 'col-md-12 col-xs-12 form-control','placeholder' => 'Phone No','maxlength' => '10','required' => 'required','onKeyPress' => 'return isNumberKey(event)']) !!} -->
                <input type="text" name="phone_number" class="col-md-12 col-xs-12 form-control" placeholder="Phone No" maxlength="10" onkeypress="return isNumberKey(event);" value="{{$user_informations->phone_number}}" required >
                 @if ($errors->has('phone_number'))
                 <span class="help-block">
                 <strong>{{ $errors->first('phone_number') }}</strong>
                 </span> 
                 @endif
            </div>
        </div>
        <!-- <div class="form-group">
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
           
            <button type="submit" class="btn btn-success btn-block login-btn">Update</button>
        </div>
       </form>



    </div>

  </div>  
</div>
<script type="text/javascript">
 function isNumberKey(e){var h=e.which?e.which:e.keyCode;return!(46!=h&&h>31&&(h<48||h>57))}function ValidateAlpha(e){var h=e.which?e.which:e.keyCode;return!(h<65||h>90)||!(h<97||h>123)||32==h}
</script> 
<style>
div#update_profile {
    margin-top: 15px;
    margin-bottom: 15px;
}
.btn-success {
    color: #fff;
    background-color: #1d70ba!important;
    border-color: #1d70ba!important;
}
div#update_profile {
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
footer.footer {
    margin-top: 0;
}
input {
    border-bottom-left-radius: 0 !important;
    border-top-left-radius: 0!important;
    background: #FFFFFF 0% 0% no-repeat padding-box;
    border: 1px solid #E1E1E1 !important;
    border-radius: 28px !important;
    opacity: 1!important;
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
/*  width: 70%;*/
  border-left: none;
  height: auto;
}
.tab {
  
    padding: 20px 20px 0px 20px;
}
.tabcontent {
    padding: 20px 20px 0px 20px;
}
.my_account_bg{
  background: #f7f7f7;float: left;width: 100%;padding-bottom: 30px;
    padding-top: 30px;
}
</style>
 

<script>
 function Toggleschool() { 
            var temp = document.getElementById("password");  
            if (temp.type == "password") { 
                temp.type = "text";  
                document.getElementsByTagName("INPUT")[3].setAttribute("type", "text");
                 document.getElementById("eyeiconshow_school").style.display = "none";
                 document.getElementById("eyeiconhide_school").style.display = "block";
            }   
            else { 
              console.log(5);
                temp.type = "password"; 
                document.getElementById("eyeiconshow_school").style.display = "block";
                document.getElementById("eyeiconhide_school").style.display = "none";
            } 
        } 
</script>
@endsection
