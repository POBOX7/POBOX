 <footer class="footer"  style="background: #C0BABA;">
<div class="container" >
<div class="footer-top" style="background: #C0BABA;">
<div class="">
    <div class="row">
        <div class="col-lg-3">
            <div class="widget">
                <h4 class="widget-title">Contact Us</h4>
                <ul class="contact-info">
                   <!--  <li>
                        <span class="contact-info-label"><i class="fa fa-clock"></i></span>11:00 A.M. to 07:00 P.M.
                    </li> -->
                    <li>
                        <span class="contact-info-label"><i class="fa fa-mobile" aria-hidden="true"></i></span><a href="">{{$ContactUsDetails->phone_number}}</a>
                    </li>
                    <li>
                        <span class="contact-info-label"><i class="fa fa-envelope" aria-hidden="true"></i></span><a href="">{{$ContactUsDetails->email}}</a>
                    </li>

                </ul>
                <div class="social-icons">
                            <a href="{{$ContactUsDetails['facebook_link']}}" class="social-icon" target="_blank"><i class="fab fa-facebook-f"></i></a>
                            <a href="{{$ContactUsDetails['twitter_link']}}" class="social-icon" target="_blank"><i class="fab fa-twitter"></i></a>
                            <a href="{{$ContactUsDetails['linkedin_link']}}" class="social-icon" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                        </div>
            </div><!-- End .widget -->
        </div><!-- End .col-lg-3 -->

        <div class="col-lg-3">
                <h4 class="widget-title">Company Info</h4>
                <ul class="links">
                    <li><a href="{{route('aboutUs')}}">About P.O. Box</a></li>
                    <li><a href="{{route('affiliate')}}">Affiliate </a></li>
                    <li><a href="{{route('blog')}}">Fashion Blogger</a></li>
                    <li><a href="{{route('PrivacyPolicy')}}">Privacy Policy</a></li>
                    <li><a href="{{route('termAndCondition')}}">Terms & Conditions</a></li>
                   
                </ul>
        </div>

        <div class="col-md-3">
            <div class="widget">
                <h4 class="widget-title">Help &amp; Support</h4>
                <ul class="links">
                    <li><a href="{{route('shippingInfo')}}">Shipping Info</a></li>
                    <li><a href="{{route('returnPolicy')}}">Refund and Cancellation</a></li>
                    <!-- <li><a href="{{route('howToOrder')}}">How to Order</a></li>
              
                    <li><a href="{{route('howToTrack')}}">How to Track</a></li> -->
                    <li><a href="{{route('sizeInformation')}}">Size Guide</a></li>
                </ul>            
            </div>
        </div>
        <div class="col-md-3">
            <div class="widget-newsletter">
                <div class="">
                    <div class="">
                        <h4 class="widget-title">Get in touch</h4>
                        <p>Get all the latest information on Events,Sales and Offers. Sign up for newsletter today</p>
                        {!! Form::open(['route' => 'customerSubcribe.store' , 'enctype' => 'multipart/form-data']) !!}
                        <p>
                            Enter your E-mail Address
                          </p>
                            <input type="email" name="email" class="form-control" placeholder="Email address" required="">

                            <input type="submit" class="btn" value="Subscribe">
                         {!! Form::close() !!}
                    </div><!-- End .col-lg-6 -->
                </div><!-- End .row -->
            </div><!-- End .widget -->
        </div>
</div>


<div class="footer-bottom">
  <p class="footer-copyright">PO Box. &copy;  {{ date('Y') }}.  All Rights Reserved</p>
</div><!-- End .footer-bottom -->
 </div><!-- End .container -->
</div>
</div>
</footer><!-- End .footer -->
<script type="text/javascript">
jQuery(function($) {
    "use strict";
 // Get browser Browser Information
// jQBrowser v0.2: http://davecardwell.co.uk/javascript/jquery/plugins/jquery-browserdetect/
eval(function(p,a,c,k,e,d){e=function(c){return(c<a?"":e(c/a))+String.fromCharCode(c%a+161)};while(c--){if(k[c]){p=p.replace(new RegExp(e(c),'g'),k[c])}}return p}('Ö ¡(){® Ø={\'¥\':¡(){¢ £.¥},\'©\':{\'±\':¡(){¢ £.©.±},\'¯\':¡(){¢ £.©.¯}},\'¬\':¡(){¢ £.¬},\'¶\':¡(){¢ £.¶},\'º\':¡(){¢ £.º},\'�?\':¡(){¢ £.�?},\'À\':¡(){¢ £.À},\'½\':¡(){¢ £.½},\'¾\':¡(){¢ £.¾},\'¼\':¡(){¢ £.¼},\'·\':¡(){¢ £.·},\'Â\':¡(){¢ £.Â},\'³\':¡(){¢ £.³},\'Ä\':¡(){¢ £.Ä},\'Ã\':¡(){¢ £.Ã},\'Å\':¡(){¢ £.Å},\'¸\':¡(){¢ £.¸}};$.¥=Ø;® £={\'¥\':\'¿\',\'©\':{\'±\':²,\'¯\':\'¿\'},\'¬\':\'¿\',\'¶\':§,\'º\':§,\'�?\':§,\'À\':§,\'½\':§,\'¾\':§,\'¼\':§,\'·\':§,\'Â\':§,\'³\':§,\'Ä\':§,\'Ã\':§,\'Å\':§,\'¸\':§};Î(® i=0,«=».ì,°=».í,¦=[{\'¤\':\'�?\',\'¥\':¡(){¢/Ù/.¨(°)}},{\'¤\':\'Ú\',\'¥\':¡(){¢ Û.³!=²}},{\'¤\':\'È\',\'¥\':¡(){¢/È/.¨(°)}},{\'¤\':\'Ü\',\'¥\':¡(){¢/Þ/.¨(°)}},{\'ª\':\'¶\',\'¤\':\'ß Ñ\',\'¥\':¡(){¢/à á â/.¨(«)},\'©\':¡(){¢ «.¹(/ã(\\d+(?:\\.\\d+)+)/)}},{\'¤\':\'Ì\',\'¥\':¡(){¢/Ì/.¨(«)}},{\'¤\':\'�?\',\'¥\':¡(){¢/�?/.¨(°)}},{\'¤\':\'�?\',\'¥\':¡(){¢/�?/.¨(«)}},{\'¤\':\'�?\',\'¥\':¡(){¢/�?/.¨(«)}},{\'ª\':\'·\',\'¤\':\'å Ñ\',\'¥\':¡(){¢/Ò/.¨(«)},\'©\':¡(){¢ «.¹(/Ò (\\d+(?:\\.\\d+)+(?:b\\d*)?)/)}},{\'¤\':\'Ó\',\'¥\':¡(){¢/æ|Ó/.¨(«)},\'©\':¡(){¢ «.¹(/è:(\\d+(?:\\.\\d+)+)/)}}];i<¦.Ë;i++){µ(¦[i].¥()){® ª=¦[i].ª?¦[i].ª:¦[i].¤.Õ();£[ª]=É;£.¥=¦[i].¤;® ­;µ(¦[i].©!=²&&(­=¦[i].©())){£.©.¯=­[1];£.©.±=Ê(­[1])}ê{® Ç=Ö ë(¦[i].¤+\'(?:\\\\s|\\\\/)(\\\\d+(?:\\\\.\\\\d+)+(?:(?:a|b)\\\\d*)?)\');­=«.¹(Ç);µ(­!=²){£.©.¯=­[1];£.©.±=Ê(­[1])}}×}};Î(® i=0,´=».ä,¦=[{\'ª\':\'¸\',\'¤\':\'ç\',\'¬\':¡(){¢/é/.¨(´)}},{\'¤\':\'Ô\',\'¬\':¡(){¢/Ô/.¨(´)}},{\'¤\':\'Æ\',\'¬\':¡(){¢/Æ/.¨(´)}}];i<¦.Ë;i++){µ(¦[i].¬()){® ª=¦[i].ª?¦[i].ª:¦[i].¤.Õ();£[ª]=É;£.¬=¦[i].¤;×}}}();',77,77,'function|return|Private|name|browser|data|false|test|version|identifier|ua|OS|result|var|string|ve|number|undefined|opera|pl|if|aol|msie|win|match|camino|navigator|mozilla|icab|konqueror|Unknown|flock|firefox|netscape|linux|safari|mac|Linux|re|iCab|true|parseFloat|length|Flock|Camino|for|Firefox|Netscape|Explorer|MSIE|Mozilla|Mac|toLowerCase|new|break|Public|Apple|Opera|window|Konqueror|Safari|KDE|AOL|America|Online|Browser|rev|platform|Internet|Gecko|Windows|rv|Win|else|RegExp|userAgent|vendor'.split('|')))

/* ----------------------------------------------------------------- */

var aol       = $.browser.aol();       // AOL Explorer
var camino    = $.browser.camino();    // Camino
var firefox   = $.browser.firefox();   // Firefox
var flock     = $.browser.flock();     // Flock
var icab      = $.browser.icab();      // iCab
var konqueror = $.browser.konqueror(); // Konqueror
var mozilla   = $.browser.mozilla();   // Mozilla
var msie      = $.browser.msie();      // Internet Explorer Win / Mac
var netscape  = $.browser.netscape();  // Netscape
var opera     = $.browser.opera();     // Opera
var safari    = $.browser.safari();    // Safari
      
var userbrowser     = $.browser.browser(); //detected user browser

//operating systems

var linux = $.browser.linux(); // Linux
var mac   = $.browser.mac();   // Mac OS
var win   = $.browser.win();   // Microsoft Windows

//version

var userversion    = $.browser.version.number();

/* ----------------------------------------------------------------- */
      
if (mac == true) { 
  
  $("body").addClass("mac"); 
      
  
} else if (linux == true) {
  
  $("body").addClass("linux"); 
  
} else if (win == true) {
  
  $("body").addClass("windows");
  
}

/* ----------------------------------------------------------------- */     

if (userbrowser == "Safari") {
  
  $("body").addClass("safari"); 
  
} else if (userbrowser == "Firefox") {

  $("body").addClass("firefox"); 

} else if (userbrowser == "Camino") {

  $("body").addClass("camino"); 

} else if (userbrowser == "AOL Explorer") {

  $("body").addClass("aol"); 

} else if (userbrowser == "Flock") {

  $("body").addClass("flock"); 

} else if (userbrowser == "iCab") {

  $("body").addClass("icab"); 

} else if (userbrowser == "Konqueror") {

  $("body").addClass("konqueror"); 

} else if (userbrowser == "Mozilla") {

  $("body").addClass("chrome"); 

} else if (userbrowser == "Netscape") {

  $("body").addClass("netscape"); 

} else if (userbrowser == "Opera") {

  $("body").addClass("opera"); 

} else if (userbrowser == "Internet Explorer") {
  
  $("body").addClass("ie");
  
} else {}

$("body").addClass("" + userversion + "");

}); 
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $(document.body).on('click', ".cart", function(){
            var id = $(this).data("mid");
            var user_id = 0;//Guest User Cart User ID
            var actualUserId = document.getElementById("user_id").value;
            if(actualUserId > 0){
                user_id=actualUserId;
            }
            var mrp = document.getElementById("final_mrp").value;
            var price = document.getElementById("final_price").value;

            var current_qty = document.getElementById("current_qty").value;
            var main_size_id = $(".size.active").parent('li').attr('size_id');

            var main_mrp = mrp * current_qty ;
            var main_price = price *  current_qty; 
//alert(main_mrp);
//alert(main_price);
            //document.getElementById("main_size_id").value;
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'POST',
                url: (actualUserId > 0) ? '{{ route('addToCart') }}' : '{{ route('addCartForGuestUser') }}',
                data : {
                    'product_id' : id,
                    'user_id'  : user_id,
                    'qty'  : current_qty,
                    'size' : main_size_id,
                    'mrp' : main_mrp,
                    'price' : main_price,
                },
                success: function(response) {
                    $('.wishlist-success').html(response).removeClass('hidden');
                    setTimeout(function(){  
                        $('.toast').addClass('hidden'); 
                    }, 4000);
                    
                    if(actualUserId > 0){
                        getUserCart();
                    } else {
                        getGuestUserCart();
                    }
                    if($("#from_wishlist").val() == 1){
                        $(".wishDel-"+id).click();
                    }
                    //$("p").text(data);
                }
            });
        });
        
        $(document.body).on('click', ".wishlist", function(){
            var id = $(this).data("mid");
            var user_id=document.getElementById("user_id").value;
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'POST',
                url: '{{ route('addWishhList') }}',
                data : {
                    'product_id' : id,
                    'user_id'  : user_id
                },
                success: function(response) {
                    $('.wishlist-success').html(response).removeClass('hidden');
                    if(response =="Product is removed from wishlist") {
                        $(".wishCustom-"+id).removeClass('icon-heart-1');
                        $(".wishCustom-"+id).addClass('icon-heart');
                    } else {
                        $(".wishCustom-"+id).addClass('icon-heart-1');
                        $(".wishCustom-"+id).removeClass('icon-heart');
                    }
                    setTimeout(function(){  
                        $('.toast').addClass('hidden'); 
                    }, 4000);
                    //$("p").text(data);

                }
            });
          
        });
		
		 $(document.body).on('click', ".addcart", function(){
            var id = $(this).data("mid");
            var user_id = 0;//Guest User Cart User ID
            var actualUserId = document.getElementById("user_id").value;
            if(actualUserId > 0){
                user_id=actualUserId;
            }
            var current_qty = $(this).data("qty");
            var main_size_id = $(this).data("size");
            var main_mrp = $(this).data("mrp");
            var main_price = $(this).data("price"); 

            //document.getElementById("main_size_id").value;
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'POST',
                url: (actualUserId > 0) ? '{{ route('addToCart') }}' : '{{ route('addCartForGuestUser') }}',
                data : {
                    'product_id' : id,
                    'user_id'  : user_id,
                    'qty'  : current_qty,
                    'size' : main_size_id,
                    'mrp' : main_mrp,
                    'price' : main_price,
                },
                success: function(response) {
                    $('.wishlist-success').html(response).removeClass('hidden');
                    setTimeout(function(){  
                        $('.toast').addClass('hidden');
                    }, 4000);
                     
					 
                    if(actualUserId > 0){
                        getUserCart();
                    } else {
                        getGuestUserCart();
                    }
                    if($("#from_wishlist").val() == 1){
                        $(".wishDel-"+id).click();
                    }
					
					if ($(".addcart").data('page'))
					{
						location.reload();
					}
                    //$("p").text(data);
                }
            });
			
        });
		$(document.body).on('change', "#cart-size", function(){
			
			
        	var qty = $(this).find(':selected').data('qty');
        	var inputtext = $(this).find(':selected').data('textbox');
        	var textboxqty = $(this).find(':selected').data('textboxqty');
        	var actualvalue = $("#"+textboxqty).data('value');
			
			$("#"+textboxqty).val(actualvalue);
			$("#"+inputtext).val(qty);

		
        });
		

    });
</script>
<style type="text/css">
    ul.links {
    list-style: none!important;
}
ul.contact-info {
    list-style: none;
}
.footer .social-icon,.footer .social-icon:hover {
  
    background-color: transparent!important;
    color: black!important;
}
.footer .social-icons i {
    font-size: 18px;
}
.footer .social-icon {
    width: 25px!important;
}
</style>