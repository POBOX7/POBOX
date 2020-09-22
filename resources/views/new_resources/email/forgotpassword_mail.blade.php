<!DOCTYPE html>
<html lang="en">
<head>
  <title>Pobox</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<body  style="background-color:#ddd;padding:10px;" > 
<div class="row>">

 <div class="col-sm-12 col-md-6 col-xs-6">

         </div>
         <div class="col-sm-12 col-md-6 col-xs-6">
            <h2>Forgot Password</h2>
            <p>We have sent you this email in response to your request to reset your password on Pobox.</p>
            <p>Please click here to reset your password  
              <a href="{{route('forgot.password',$check_user->id)}}">
                    <button type="button" style="background-color:#fa9b03; color:#fff;   border: 1px solid #fa9b03 !important; padding: 10px !important;cursor: pointer!important;">Forgot Password</button>
                </a>
            </p>
            <p>We recommend that you keep your password secure and not share it with anyone.</p>   
           </div>
     
        </div>
 
</body>
</html>
