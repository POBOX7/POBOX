@extends('new_resources.layouts.new_app') 
@section('content')
<style type="text/css">
    .product-default.disabled:hover figure a::after,.product-default.disabled .product-details,.product-action button {
   /* opacity: 0!important;*/
    /*cursor: no-drop;*/
}
.product-default.disabled figure{
    opacity: 0.5!important;
}
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
</style>
<!-- <div class="hero-section hero-background style-02" style="margin-top: 0;background: url('../assets/images/hero_bg.jpg');">
      <h1 class="page-title">Wishlist</h1>
</div> -->
<div class="wishlist-page" style="margin-top: 30px;margin-bottom: 30px;">
  
    <div class="container">
     
        @foreach ($productDetail as $keyproductDetail => $valueproductDetail)

        @php($product_size = App\ProductSize::select('size_id')->where('product_size.product_id',$valueproductDetail['id'])->pluck('size_id')->first())
        @php($sizeData = App\Sizes::where('id',$product_size)->where('is_deleted',0)->first())
	
        <div class="col-lg-3 col-md-3 col-xs-12 float-left" >
            <div class="product-default">
                <div class="labels" style="line-height: 2;color: #fff;font-weight: 600;text-transform: uppercase;position: absolute;z-index: 2;width: 54px;top: .8em;font-size: 10px;left: 20px;">
                    <div class="onsale" style="background: blue;padding: 0px 0px 0px 6px;width: 34px;"> {{$valueproductDetail['discount']}}% 
                    </div>
                </div>
                <a href="javascript:void(0)" title="Remove Product">
                    <div class="icon-cancel wishlistDelete wishDel-{{$valueproductDetail['id']}}" data-id="{{$valueproductDetail['id']}}" style="float: right;position: absolute;right: 14px;z-index: 1;">
                        <i class="" style="">        
                        </i>
                    </div>
                </a>
                <figure style="height: 400px;">

                    <a href="{{route('productDetail',$valueproductDetail['id'])}}">
                        <img src={{ asset('assets/upload_images/product/thumb') }}/{{$valueproductDetail['product_image']}} style="height: -webkit-fill-available;width: auto!important;">
                    </a>
                </figure>
                <div class="product-details">
                    <h2 class="product-title">
                        <a href="{{route('productDetail',$valueproductDetail['id'])}}">{{$valueproductDetail['name']}}</a>
                    </h2>
                  <div class="price-box">
                    
                    @if($valueproductDetail['discount'] !== 0)
                    <span class="old-price" >₹ {{$valueproductDetail['mrp']}}</span>
                    @endif
                    <span class="product-prices price" style="font-size: 18px;">₹ {{$valueproductDetail['price']}}</span>
                 </div>
                    <!-- End .price-box -->
                    <div class="product-action">
                        <!---<button class="btn-icon btn-add-cart view-details" data-toggle="modal" data-mid="{{$valueproductDetail['id']}}" id="product_{{$valueproductDetail['id']}}" data-target="#addCartModal2"><i class="icon-bag"></i>MOVE TO CART</button>--->
						<button class="btn-icon btn-add-cart addcart" data-page="{{route('wishlist')}}" data-toggle="modal" data-size="{{$sizeData->id}}" data-qty="1" data-mid="{{$valueproductDetail['id']}}" data-price="{{$valueproductDetail['price']}}" data-mrp="{{$valueproductDetail['mrp']}}" id="product_{{$valueproductDetail['id']}}"><i class="icon-bag"></i>MOVE TO CART</button>
                             @if (Auth::check())
								   <input type="hidden" name="user_id" name="user_id" id="user_id" value="{{auth()->user()->id}}">
							 @endif								 
					 <!--<button class="btn-icon btn-add-cart" data-toggle="modal" data-target="#addCartModal"><i class="icon-bag"></i>MOVE TO CART</button>-->
                    </div>
                </div>
                <!-- End .product-details -->
            </div>
        </div>

        @endforeach
    
        
        <div class="modal fade" id="addCartModal2" tabindex="-1" role="dialog" aria-labelledby="addCartModal2" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-body add-cart-box text-center" id="tt">


                </div>
              </div>
            </div>
          </div>
        </div>

</div>    
<div class="alert alert-success postition-fixed toast hidden wishlist-success"><p>Added to Wishlist</p></div>
<script type="text/javascript">
    $(document.body).on('click', '.wishlistDelete', function(){  
         gol = $(this);
         $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'POST',
                url: '{{ url("/product-details/removeWatchlistData") }}',
                data : {
                    'product_id': $(this).data('id'), 
                },
                success: function(response) {
                    //$("p").text(data);
                    //$("#addCartModal2").modal('hide');
                    gol.parent().parent().parent().remove();
                    setTimeout(function(){  
                        if(response == '0'){
                        var htmlToReplae = `<center class="empty-wishlist">
            <h2>NO PRODUCTS ARE AVAILABLE IN THE WISHLIST</h2>
            <div class="dropdown-cart-action">
                <a href="{{route('home_1')}}" class="btn">Continue Shopping</a>
            </div>
        </center>`;
                        $(".wishlist-page").html(htmlToReplae);
                    } 
                    }, 4100);
                    
                    
                }
            });

  });
</script>
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
                      $("#from_wishlist").val(1);
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
            console.log(product_data,"product_data");
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
    
    
    popup_color =[];
   popup_size = [];
   product_id = [];

   $('li.popup-size a').on('click', function (e) {
   e.preventDefault(); 
   var popup_size_id = $(this).parent().attr('id'); 
   var popup_size_product_id = $(this).parent().attr('productid');  
    $('li.popup-size a').removeClass('active');
   $(this).addClass('active');
    if ( $.inArray(size_id, size) > -1 ) { 
         size = $.grep(size, function(value) {
             return value != size_id;
        }); 
    }else{  
       size.push(size_id); 
    }  
    popup_size.push(popup_size_id);
         if (popup_size.length > 1) {
             popup_size.splice(0, 1);
         } 
         product_id.push(popup_size_product_id);
         if (product_id.length > 1) {
             product_id.splice(0, 1);
         }  
       $.ajax({
          type: "get",
          url: "{{ url('/common-popup-filter1') }}",
          cache: !1,
          data: { 
               popup_size: popup_size, 
              popup_color:popup_color, 
              product_id:product_id,
              page_url:page_url,
              _token: "{{ csrf_token() }}",
          },
          success: function(data) {
              $('#popup-filter_div').html(data);
          }
      }); 
   }); 
   $('li.popup-color a').on('click', function (e) {
   e.preventDefault(); 
   var popup_color_id = $(this).parent().attr('id');  
   var popup_color_product_id = $(this).parent().attr('productid');  
    $('li.popup-color a').parent().removeClass('active');
   $(this).parent().addClass('active');
    // if ( $.inArray(size_id, size) > -1 ) { 
    //      size = $.grep(size, function(value) {
    //          return value != size_id;
    //     }); 
    // }else{  
    //    size.push(size_id); 
    // }  
    popup_color.push(popup_color_id);
         if (popup_color.length > 1) {
             popup_color.splice(0, 1);
         } 
         product_id.push(popup_color_product_id);
         if (product_id.length > 1) {
             product_id.splice(0, 1);
         }  
       $.ajax({
          type: "get",
          url: "{{ url('/common-popup-filter1') }}",
          cache: !1,
          data: { 
               popup_size: popup_size, 
              popup_color:popup_color, 
              product_id:product_id,
              page_url:page_url,
              _token: "{{ csrf_token() }}",
          },
          success: function(data) {
              $('#popup-filter_div').html(data);
          }
      }); 
   }); 
    </script>

@endsection
