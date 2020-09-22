<script src="assets/js/nouislider.min.js"></script>
<!-- Main JS File -->
<script src="assets/js/main.js"></script>


<div class="row row-sm">
    @foreach ($newArrivalProductDatas as $keyNewArrivalProductData => $valueNewArrivalProductData)
    

	<div class="col-6 col-md-4">
        <div class="product-default">
            <figure style="height: 400px;">
                @if($valueNewArrivalProductData->discount !== 0)
                <div class="labels" style="line-height: 2;color: #fff;font-weight: 600;text-transform: uppercase;position: absolute;z-index: 2;width: 54px;top: .8em;font-size: 10px;left: 0.8em;">
                    <div class="onsale" style="background: blue;padding: 0px 0px 0px 6px;width: 34px;">  {{$valueNewArrivalProductData->discount}}% </div>
                </div>
                @endif
                <a href="{{route('productDetail',$valueNewArrivalProductData['id'])}}">
                    <img src="{{ asset('assets/upload_images/product') }}/{{$valueNewArrivalProductData['image']}}" style="height: -webkit-fill-available;width: auto!important;">
                </a>
                <!--<a  data-toggle="modal" id="product_{{$valueNewArrivalProductData['id']}}" data-target="#addCartModal2" class="btn-quickviewss aaaaa view-details" title="Quick View">Quick View</a>-->
               <!--  <button class="btn-icon btn-add-cart view-details" id="product_{{$valueNewArrivalProductData['id']}}" data-toggle="modal" data-target="#addCartModal2"><i class="icon-bag"></i>ADD TO CART</button> -->
            </figure>
            <div class="product-details">
                <h2 class="product-title">
                    <a href="{{route('productDetail',$valueNewArrivalProductData['id'])}}">{{str_limit($valueNewArrivalProductData->name, 30)}}</a>
                </h2>
                <div class="price-box">
                    @if($valueNewArrivalProductData['discount'] != 0 )
                    <span class="product-price ">₹{{$valueNewArrivalProductData['mrp']}}</span>
                    <span class="product-prices price">₹{{$valueNewArrivalProductData['price']}}</span>
                    @else
                    <span class="product-prices price">₹{{$valueNewArrivalProductData['mrp']}}</span>
                    @endif
                </div>
                <!-- End .price-box -->
                <div class="product-action">
                    @if($user_id == NULL)
																
                        
                      <a href="#" id="login" data-toggle="modal" data-dismiss="modal"  data-target="#login"   class="btn-icon-wish"><i class="icon-heart"></i></a>
                    @else
						 @if (Auth::check())
							@php($wishlist = App\Wishlist::where('user_id',auth()->user()->id)->where('product_id',$valueNewArrivalProductData['id'])->first())
                         
				       		<a href="javascript:void(0)" class="btn-icon-wish wishlist added" data-mid="{{$valueNewArrivalProductData->id}}"><i class="{{$wishlist != null ?'icon-heart-1':'icon-heart'}} wishCustom-{{$valueNewArrivalProductData->id}}"></i></a>							   
							@else
							 <a href="javascript:void(0)" class="btn-icon-wish wishlist added" data-mid="{{$valueNewArrivalProductData->id}}"><i class="icon-heart  wishCustom-{{$valueNewArrivalProductData->id}}"></i></a>
						@endif		
                     
                    @endif
                     <button class="btn-icon btn-add-cart view-details" data-toggle="modal" data-mid="{{$valueNewArrivalProductData->id}}" id="product_{{$valueNewArrivalProductData['id']}}" data-target="#addCartModal2"><i class="icon-bag"></i>ADD To Cart</button>
                     <input type="hidden" name="user_id" name="user_id" id="user_id" value="{{$user_id}}">

                    <!-- <a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View"><i class="fas fa-external-link-alt"></i></a> -->
                    <!--   <a  data-toggle="modal" data-target="#product-{{$valueNewArrivalProductData['id']}}" class="btn-quickviewss" title="Quick View"><i class="fas fa-external-link-alt"></i></a> -->
                    <!-- Modal -->
                    
                </div>
            </div>
            <!-- End .product-details -->
        </div>
    </div>
    @endforeach

</div>
 <div class="modal fade" id="addCartModal2" tabindex="-1" role="dialog" aria-labelledby="addCartModal2" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-body add-cart-box text-center" id="tt">
            
            
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade login_popup" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close"  data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <!-- onclick="javascript:window.location.reload()" -->
      <div class="modal-body">
    <div class="login-form">
     {!! Form::open(['route' => 'userLogin' , 'enctype' => 'multipart/form-data']) !!}
        <h2 class="text-center">Sign In</h2>        
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

<style>

  .toast{

    top: 18%;
    right: 1%;
    z-index: 999999;
    margin-top: 0px;
    width: 346px;
    position: fixed;
   }
   .hidden{
    display: none;
   }
}
</style>
<div class="alert alert-success postition-fixed toast hidden wishlist-success"></div>

    <a id="scroll-top" href="#top" title="Top" role="button"><i class="icon-angle-up"></i></a> 
    <!-- Plugins JS File -->
    <script src="assets/js/plugins.min.js"></script>
    <script src="assets/js/nouislider.min.js"></script> 
    <!-- Main JS File -->
    <script src="assets/js/main.min.js"></script>



    <script type="text/javascript">
        $(document).on('click','.view-details',function(){
            var str = this.id;
            var product_data = str.split("_");
            var sliderDefaultOptions = {
                            loop: true,
                            margin: 0,
                            responsiveClass: true,
                            nav: false,
                            navText: ['<i class="icon-left-open-big">', '<i class="icon-right-open-big">'],
                            dots: true,
                            autoplay: true,
                            autoplayTimeout: 20000,
                            items: 1,
                          };

            $.ajax({
                'url' : "{{route('productDetailnew','')}}/"+product_data[1],
                'type': 'GET',
                'dataType' : 'JSON',
                'success' : function(data){
                    $("#tt").html(data.html);
                    $('.product-single-default .product-single-carousel').owlCarousel($.extend(true, {}, sliderDefaultOptions, {
                        nav: true,
                        navText: ['<i class="icon-angle-left">', '<i class="icon-angle-right">'],
                        dotsContainer: '#carousel-custom-dots',
                        autoplay: false,
                        onInitialized: function () {
                          var $source = this.$element;

                          if ($.fn.elevateZoom) {
                            $source.find('img').each(function () {
                              var $this = $(this),
                                zoomConfig = {
                                  responsive: true,
                                  zoomWindowFadeIn: 350,
                                  zoomWindowFadeOut: 200,
                                  borderSize: 0,
                                  zoomContainer: $this.parent(),
                                  zoomType: 'inner',
                                  cursor: 'grab'
                                };
                              $this.elevateZoom(zoomConfig);
                            });
                          }
                        },
                      }));

                      $('.product-single-extended .product-single-carousel').owlCarousel($.extend(true, {}, sliderDefaultOptions, {
                        dots: false,
                        autoplay: false,
                        responsive: {
                          0: {
                            items: 1
                          },
                          480: {
                            items: 2
                          },
                          1200: {
                            items: 3
                          }
                        }
                      }));

                      $('#carousel-custom-dots .owl-dot').click(function () {
                        $('.product-single-carousel').trigger('to.owl.carousel', [$(this).index(), 300]);
                      });
                      $("#from_wishlist").val(0);
                }
            });
        });

        $(document).on('click','.colordetail',function(){
            var str = this.id;
            var product_data = str.split("_");
            var sliderDefaultOptions = {
                            loop: true,
                            margin: 0,
                            responsiveClass: true,
                            nav: false,
                            navText: ['<i class="icon-left-open-big">', '<i class="icon-right-open-big">'],
                            dots: true,
                            autoplay: true,
                            autoplayTimeout: 20000,
                            items: 1,
                          };

            $.ajax({
                'url' : "{{route('productDetailnew','')}}/"+product_data[1],
                'type': 'GET',
                'dataType' : 'JSON',
                'success' : function(data){
                    $("#tt").html(data.html);
                    $('.product-single-default .product-single-carousel').owlCarousel($.extend(true, {}, sliderDefaultOptions, {
                        nav: true,
                        navText: ['<i class="icon-angle-left">', '<i class="icon-angle-right">'],
                        dotsContainer: '#carousel-custom-dots',
                        autoplay: false,
                        onInitialized: function () {
                          var $source = this.$element;

                          if ($.fn.elevateZoom) {
                            $source.find('img').each(function () {
                              var $this = $(this),
                                zoomConfig = {
                                  responsive: true,
                                  zoomWindowFadeIn: 350,
                                  zoomWindowFadeOut: 200,
                                  borderSize: 0,
                                  zoomContainer: $this.parent(),
                                  zoomType: 'inner',
                                  cursor: 'grab'
                                };
                              $this.elevateZoom(zoomConfig);
                            });
                          }
                        },
                      }));

                      $('.product-single-extended .product-single-carousel').owlCarousel($.extend(true, {}, sliderDefaultOptions, {
                        dots: false,
                        autoplay: false,
                        responsive: {
                          0: {
                            items: 1
                          },
                          480: {
                            items: 2
                          },
                          1200: {
                            items: 3
                          }
                        }
                      }));

                      $('#carousel-custom-dots .owl-dot').click(function () {
                        $('.product-single-carousel').trigger('to.owl.carousel', [$(this).index(), 300]);
                      });
                }
            });
        });

        $(document).on('click','.sizedetail',function(){
            var str = this.id;
            var product_data = str.split("_");
            var sliderDefaultOptions = {
                            loop: true,
                            margin: 0,
                            responsiveClass: true,
                            nav: false,
                            navText: ['<i class="icon-left-open-big">', '<i class="icon-right-open-big">'],
                            dots: true,
                            autoplay: true,
                            autoplayTimeout: 20000,
                            items: 1,
                          };

            $.ajax({
                'url' : "{{route('productDetailnew','')}}/"+product_data[1],
                'type': 'GET',
                'dataType' : 'JSON',
                'success' : function(data){
                    $("#tt").html(data.html);
                    $('.product-single-default .product-single-carousel').owlCarousel($.extend(true, {}, sliderDefaultOptions, {
                        nav: true,
                        navText: ['<i class="icon-angle-left">', '<i class="icon-angle-right">'],
                        dotsContainer: '#carousel-custom-dots',
                        autoplay: false,
                        onInitialized: function () {
                          var $source = this.$element;

                          if ($.fn.elevateZoom) {
                            $source.find('img').each(function () {
                              var $this = $(this),
                                zoomConfig = {
                                  responsive: true,
                                  zoomWindowFadeIn: 350,
                                  zoomWindowFadeOut: 200,
                                  borderSize: 0,
                                  zoomContainer: $this.parent(),
                                  zoomType: 'inner',
                                  cursor: 'grab'
                                };
                              $this.elevateZoom(zoomConfig);
                            });
                          }
                        },
                      }));

                      $('.product-single-extended .product-single-carousel').owlCarousel($.extend(true, {}, sliderDefaultOptions, {
                        dots: false,
                        autoplay: false,
                        responsive: {
                          0: {
                            items: 1
                          },
                          480: {
                            items: 2
                          },
                          1200: {
                            items: 3
                          }
                        }
                      }));

                      $('#carousel-custom-dots .owl-dot').click(function () {
                        $('.product-single-carousel').trigger('to.owl.carousel', [$(this).index(), 300]);
                      });
                }
            });
        });
    
    </script>


<script type="text/javascript">

    var productcount = <?php echo json_encode(count($newArrivalProductDatas)) ?>;

    $.ajax({
        type: "get",
        url: "{{ url('/count_div') }}",
        cache: !1,
        data: {
            productcount:productcount,
            _token: "{{ csrf_token() }}",
        },
        success: function(data) {
            $('#count_div').html(data);
        }
    });

    if( jQuery.isEmptyObject(popup_size) == true){
    }else{
        $('input#plus').removeAttr("disabled");
        $('a#cart').removeAttr("style");
    }


    $('.minus').click(function(){
        quantityField = $(this).next();
        product_qty = $(this).attr("qty");
        if(parseInt(quantityField.val(), 10)  == 1){
            $(this).attr("disabled","disabled");
            return false;
        }
        product_qty = $(this).attr("price");
        var new_price = product_qty*(parseInt(quantityField.val(), 10)  - 1);
        //$('#newprice-'+product_id).text(new_price);

        if(parseInt(quantityField.val(), 10) - 1 != product_qty){
            $(this).next().next().removeAttr("disabled");
        }
        if (quantityField.val() != 0) {
            quantityField.val(parseInt(quantityField.val(), 10) - 1);
        }

    });
    $('.plus').click(function(){
        quantityField = $(this).prev();
        product_qty = $(this).attr("qty");
        product_id = $(this).attr("productid");
        alert();
        if(quantityField.val() == product_qty){
            $(this).attr("disabled","disabled");
            return false;
        }

        if(parseInt(quantityField.val(), 10) - 1 != product_qty){
            $(this).prev().prev().removeAttr("disabled");
        }
        product_qty = $(this).attr("price");
        var new_price = product_qty*(parseInt(quantityField.val(), 10) + 1);
        //$('#newprice-'+product_id).text(new_price);


        quantityField.val(parseInt(quantityField.val(), 10) + 1);
        var user_qty = parseInt(quantityField.val(), 10 - 1);
        if(user_qty == product_qty ){
            $(this).attr("disabled","disabled");
            return false;
        }
        if(!product_qty){
            if(value == 1 ){
                return false;
            }
        }

    });


    // popup_color =[];
    // popup_size = [];
    // product_id = [];
    // $('li.popup-size a').on('click', function (e) {
    //     product_id = [];
    //     e.preventDefault();
    //     var popup_size_id = $(this).parent().attr('id');
    //     var popup_size_product_id = $(this).parent().attr('productid');
    //     $('li.popup-size a').removeClass('active');
    //     $(this).addClass('active');
    //     $('#plus').removeAttr("disabled");

        // if ( $.inArray(size_id, size) > -1 ) {
        //      size = $.grep(size, function(value) {
        //          return value != size_id;
        //     });
        // }else{
        //    size.push(size_id);
        // }
    //     popup_size.push(popup_size_id);
    //     if (popup_size.length > 1) {
    //         popup_size.splice(0, 1);
    //     }
    //     product_id.push(popup_size_product_id);
    //     if (product_id.length > 1) {
    //         product_id.splice(0, 1);
    //     }
    //     $.ajax({
    //         type: "get",
    //         url: "{{ url('/common-popup-filter') }}",
    //         cache: !1,
    //         data: {
    //             popup_size: popup_size,
    //             popup_color:popup_color,
    //             product_id:product_id,
    //             _token: "{{ csrf_token() }}",
    //         },
    //         success: function(data) {
    //             $('#popup-filter_div-'+popup_size_product_id).html(data);
    //         }
    //     });
    // });
    // $('li.popup-color a').on('click', function (e) {
    //     e.preventDefault();
    //     var popup_color_id = $(this).parent().attr('id');
    //     var popup_color_product_id = $(this).parent().attr('productid');
//    $('li.popup-color a').removeClass('active');


// if($(this).parent().hasClass( "active" )){
//   $(this).parent().removeClass('active');
// }else{
// $(this).parent().addClass('active');

// }
    //     $('li.popup-color a').parent().removeClass('active');
    //     $(this).parent().addClass('active');

    //     popup_color.push(popup_color_id);
    //     if (popup_color.length > 1) {
    //         popup_color.splice(0, 1);
    //     }
    //     product_id.push(popup_color_product_id);
    //     if (product_id.length > 1) {
    //         product_id.splice(0, 1);
    //     }

    //     $.ajax({
    //         type: "get",
    //         url: "{{ url('/common-popup-filter') }}",
    //         cache: !1,
    //         data: {
    //             popup_size: popup_size,
    //             popup_color:popup_color,
    //             product_id:product_id,
    //             _token: "{{ csrf_token() }}",
    //         },
    //         success: function(data) {
    //             $('#popup-filter_div-'+popup_color_product_id).html(data);
    //         }
    //     });
    // });
    // var sliderDefaultOptions = {
    //     loop: true,
    //     margin: 0,
    //     responsiveClass: true,
    //     nav: false,
    //     navText: ['<i class="icon-left-open-big">', '<i class="icon-right-open-big">'],
    //     dots: true,
    //     autoplay: true,
    //     autoplayTimeout: 15000,
    //     items: 1,
    // };
    // $('.product-single-default .product-single-carousel').owlCarousel($.extend(true, {}, sliderDefaultOptions, {
    //     nav: true,
    //     navText: ['<i class="icon-angle-left">', '<i class="icon-angle-right">'],
    //     dotsContainer: '#carousel-custom-dots',
    //     autoplay: false,
    //     onInitialized: function () {
    //         var $source = this.$element;
    //
    //         if ($.fn.elevateZoom) {
    //             $source.find('img').each(function () {
    //                 var $this = $(this),
    //                     zoomConfig = {
    //                         responsive: true,
    //                         zoomWindowFadeIn: 350,
    //                         zoomWindowFadeOut: 200,
    //                         borderSize: 0,
    //                         zoomContainer: $this.parent(),
    //                         zoomType: 'inner',
    //                         cursor: 'grab'
    //                     };
    //                 $this.elevateZoom(zoomConfig);
    //             });
    //         }
    //     },
    // }));

</script>
<!-- <style type="text/css">
  button.btn.btn-outline.btn-up-icon.bootstrap-touchspin-up {
    border-radius: 0px!important;
}
</style>
<style type="text/css">
.toolbox select.form-control:not([size]):not([multiple]) {
    height: 25px!important;
}
   .inner-quickview:hover .btn-quickviewss {
   visibility: visible;
   opacity: 0.9;
   }
   .inner-quickview figure .btn-quickviewss {
   position: absolute;
   bottom: 0;
   left: 0;
   width: 100%;
   font-size: 1.3rem;
   font-weight: 400;
   letter-spacing: 0.025em;
   font-family: "Oswald", sans-serif;
   text-transform: uppercase;
   visibility: visible;
   opacity: 0;
   height: unset;
   padding: 1.4rem;
   background-color: #1d70ba;
   color: white!important;
   transform: none;
   margin: 0;
   border: none;
   transition: all .3s ease-out;
   transform: none!important;
   transition: none!important;
   }
   .product-default .btn-quickviewss {
   font-size: 1.4rem;
   transform: translateX(-200%);
   }
   .product-default .btn-icon-wish, .product-default .btn-quickviewss {
       display: flex;
    border: 1px solid #ddd;
    font-size: 1.6rem;
    margin: 0 2px;
    width: 36px;
    height: 36px;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: all .25s ease;
    transform: translateX(200%);
    transform: none!important;
    transition: none!important;
   }

   .checked{
      left: 9px;
top: 7px;
width: 7px;
height: 12px;
border: solid white;
    border-top-width: medium;
    border-right-width: medium;
    border-bottom-width: medium;
    border-left-width: medium;
border-width: 0 3px 3px 0;
-webkit-transform: rotate(45deg);
-ms-transform: rotate(45deg);
transform: rotate(40deg);
background: transparent;
   }

.product-default:hover a.btn-quickviewss {
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    font-size: 1.3rem;
    font-weight: 400;
    letter-spacing: 0.025em;
    font-family: "Oswald", sans-serif;
    text-transform: uppercase;
    visibility: visible;
    opacity: 1;
    height: unset;
    padding: 1.4rem;
    background-color: #1d70ba;
    color: white!important;
    transform: none;
    margin: 0;
    border: none;
    transition: all .3s ease-out;
}

</style> -->
