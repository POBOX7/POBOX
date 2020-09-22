@extends('new_resources.layouts.new_app') 
@section('content')

@if (session('status'))
   <div class="alert alert-success" id="myElem">
      <strong>{{ session('status') }}</strong>
   </div>
@endif
<script type="text/javascript">
  $("#myElem").show();
setTimeout(function() { $("#myElem").hide(); }, 12000);
</script>
 <!-- <div class="hero-section hero-background style-02" style="background: url('../assets/images/hero_bg.jpg');">
      <h1 class="page-title">Contact Us</h1>
  </div>   
 -->
 <div class="main" style="margin-top: 30px;">
       <div class="container">
               <!--  <div id="map"></div> --><!-- End #map -->
                
                <div class="container-box" style="padding-top: 0;">
                    <div class="row">
                        <div class="col-md-8">
                            <h2 class="light-title">Write <strong>Us</strong></h2>

                            {!! Form::open(['route' => 'contactUsStore' , 'enctype' => 'multipart/form-data']) !!}
                                <div class="form-group required-field">
                                    <label for="contact-name">Name</label>
                                    <input type="text" class="form-control" id="contact-name" name="name" required  onKeyPress = "return ValidateAlpha(event);">
                                </div><!-- End .form-group -->

                                <div class="form-group required-field">
                                    <label for="contact-email">Email</label>
                                    <input type="email" pattern="[a-zA-Z0-9.-_]{1,}@[a-zA-Z.-]{2,}[.]{1}[a-zA-Z]{2,}" class="form-control" id="contact-email" name="email" required>
                                </div><!-- End .form-group -->

                                <div class="form-group">
                                    <label for="contact-phone">Phone Number</label>
                                    <input type="tel" class="form-control" id="contact-phone" name="phone_number" maxlength="10" onKeyPress = "return isNumberKey(event);" required>
                                </div><!-- End .form-group -->

                                <div class="form-group required-field">
                                    <label for="contact-message">What’s on your mind?</label>
                                    <textarea cols="30" rows="1" id="contact-message" class="form-control" name="contact_message" required></textarea>
                                </div><!-- End .form-group -->

                                <div class="form-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div><!-- End .form-footer -->
                            </form>
                        </div><!-- End .col-md-8 -->

                        <div class="col-md-4">
                            <h2 class="light-title">Contact <strong>Details</strong></h2>

                            <div class="contact-info">
                               <!--  <div>
                                    <i class="icon-phone"></i>
                                    <p><a href="tel:">0201 203 2032</a></p>
                                    
                                </div> -->
                                <div>
                                    <i class="icon-mobile"></i>
                                    <p><a href="tel:">{{$ContactUsDetail['phone_number']}}</a></p>
                                   
                                </div>
                                <div>
                                    <i class="icon-mail-alt"></i>
                                    <p><a href="mailto:#">{{$ContactUsDetail['email']}}</a></p>
                                </div>
                                 <div>
                                    <i class="fa fa-address-card-o"></i>
                                    <p><a href="tel:">{{$ContactUsDetail['address']}}</a></p>
                                   
                                </div>
                                <div class="footer-right">
                        <div class="social-icons">
                            <a href="{{$ContactUsDetail['facebook_link']}}" class="social-icon" target="_blank"><i class="fab fa-facebook-f"></i></a>
                            <a href="{{$ContactUsDetail['twitter_link']}}" class="social-icon" target="_blank"><i class="fab fa-twitter"></i></a>
                            <a href="{{$ContactUsDetail['linkedin_link']}}" class="social-icon" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                        </div><!-- End .social-icons -->
                    </div>
                               
                            </div><!-- End .contact-info -->
                        </div><!-- End .col-md-4 -->
                    </div><!-- End .row -->
                </div><!-- End .container-box -->
            </div><!-- End .container -->

</div>    
<style type="text/css">
    .contact-info p {
    margin-bottom: 0;
    margin-left: 5.5rem;
    line-height: 3.4!important;
}
</style>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBwuev6Dj8Xvo7fePYs2YJ8KA84xxBCIUo&libraries=places"></script>
<script src="assets/js/map.js"></script>

<script type="text/javascript">
 function isNumberKey(e){var h=e.which?e.which:e.keyCode;return!(46!=h&&h>31&&(h<48||h>57))}function ValidateAlpha(e){var h=e.which?e.which:e.keyCode;return!(h<65||h>90)||!(h<97||h>123)||32==h}
</script> 
@endsection
