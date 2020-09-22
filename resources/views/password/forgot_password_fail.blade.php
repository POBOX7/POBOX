<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<style>
body {font-family: Arial, Helvetica, sans-serif;}
form {border: 3px solid #f1f1f1;}

input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}

.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
}

img.avatar {
  width: 40%;
  border-radius: 50%;
}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
</style>
</head>
<body>
<div class="container">
<div class="content">
<h2>Forgot Password</h2>

{!! Form::open(['route' => 'change.password' , 'enctype' => 'multipart/form-data']) !!}
                {{ csrf_field() }}
                <span style="color:red">Password did not match</span>
     <div class="col-sm-12">           
	    <label for="NewPassword"><b>New Password</b></label>
	   <input id="new_password" pattern=".{8,}"   class="input100" type="password" name="new_password" placeholder="minimum 8 character" >
	  <span class="focus-input100">
   </div>

   <div class="">
	    
	    <input id="new_password" type="hidden" value="{{ collect(request()->segments())->last() }}" name="id">

		<div class="col-sm-12 wrap-input100 validate-input" data-validate = "Password is required">
			<label for="psw"><b>Conform Password</b></label>
			<input  pattern=".{8,}" placeholder="minimum 8 character"  class="input100" type="password" name="confrom_password" >
			<span class="focus-input100"></span>
	  </div>
        
   
  </div>

  <div class="col-sm-3 container-login100-form-btn m-t-17" style="text-align: center;">
						<button  class="login100-form-btn" >
							Update Password
						</button>
					</div>
 {!! Form::close() !!}
</div>
</body>
</html>


<!--===============================================================================================-->
	
	<script src="{{ asset('js/main_login.js') }}"></script>
	<script type="text/javascript">
jQuery.validator.setDefaults({
    debug: true,
    success: "valid"
});;
</script>

  <script>
  $(document).ready(function(){
    $("#myform").validate({
  rules: {
    field: {
      required: true,
      minlength: 6
    }
  }
});
  });
  </script>
<script >
	var check = function() {
  if (document.getElementById('new_password').value ==
    document.getElementById('confrom_password').value) {
    document.getElementById('message').style.color = 'green';
    document.getElementById('message').innerHTML = 'matching';
  } else {
    document.getElementById('message').style.color = 'red';
    document.getElementById('message').innerHTML = 'not matching';
  }
}
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<style type="text/css">
	input#new_password,input.input100 {
    width: 100%;
}
label.col-sm-3 {
    color: #ffff;
}
</style>




	
	<script src="{{ asset('js/main_login.js') }}"></script>
	<script type="text/javascript">
jQuery.validator.setDefaults({
    debug: true,
    success: "valid"
});;
</script>

  <script>
  $(document).ready(function(){
    $("#myform").validate({
  rules: {
    field: {
      required: true,
      minlength: 6
    }
  }
});
  });
  </script>
<script >
	var check = function() {
  if (document.getElementById('new_password').value ==
    document.getElementById('confrom_password').value) {
    document.getElementById('message').style.color = 'green';
    document.getElementById('message').innerHTML = 'matching';
  } else {
    document.getElementById('message').style.color = 'red';
    document.getElementById('message').innerHTML = 'not matching';
  }
}
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<style type="text/css">
	input#new_password,input.input100 {
    width: 100%;
}
label.col-sm-3 {
    color: #ffff;
}
</style>