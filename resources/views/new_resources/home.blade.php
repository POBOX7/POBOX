@extends('new_resources.layouts.new_app') 
@section('content') 
@if (session('status'))
<div class="alert alert-success" id="myElem" style="display: block;text-align: right!important;width: auto!important;">
   <strong>{{ session('status') }}</strong>
</div>
@endif
<script type="text/javascript">
  $("#myElem").show();
setTimeout(function() { $("#myElem").hide(); }, 7000);
</script>
<main class="main home-page">
   <div class="new-home-silder" style="padding-bottom: 0!important;margin-bottom: -40px;">
      <div class="home-slider-container" style="max-height: 85%!important;">
         <div class="home-slider owl-carousel owl-theme owl-theme-light">
            @foreach($banners_slider as $slider)
            @if($slider['url'] != null)
            <a href="{{$slider['url']}}">
               <div class="home-slide">
                  <div class="slide-bg owl-lazy" data-src="{{ asset('assets/upload_images/banner') }}/{{$slider['image']}}"></div>
                  <!-- End .slide-bg -->
                  <div class="container">
                     <!-- End .home-slide-content -->
                  </div>
                  <!-- End .container -->
               </div>
               <!-- End .home-slide -->
            </a>
            @else
            <a href="">
               <div class="home-slide">
                  <div class="slide-bg owl-lazy" onClick="javascript:return false;" data-src="{{ asset('assets/upload_images/banner') }}/{{$slider['image']}}" style="cursor: context-menu;"></div>
                  <!-- End .slide-bg -->
                  <div class="container">
                     <!-- End .home-slide-content -->
                  </div>
                  <!-- End .container -->
               </div>
               <!-- End .home-slide -->
            </a>
            @endif
            @endforeach
         </div>
         <!-- End .home-slider -->
      </div>
      <!-- End .home-slider-container -->
   </div>
   <!-- End .container -->
   <div class="container">
      <div class="row">
         @foreach($category as $cat)
         <div class="col-md-4">      
               <div class="product-default cat-listing inner-quickview inner-icon" style="height: 555px;">            
                  <figure>
                     <a href="{{$cat['link']}}">
                     <img class="hide" style="height:-webkit-fill-available;" src="{{ asset('assets/upload_images/category/thumb') }}/{{$cat['image']}}">
                     </a>
                  
                     <a href="{{$cat['link']}}"> 
                     <div class="middle">
                      <div class="text">View More</div>
                    </div>
                    </a>
                    <h2 style="text-align: center;"><span style="position: relative; top: 5px;"> {{$cat->name}}</span></h2>
                  </figure>

               </div>
            <!-- End .column-slider  -->
            <!-- End .column-product-container -->
         </div>
        
         @endforeach  
      </div>
      <!-- End .row -->
   </div>
   <!-- End .container -->
   <div class="mb-3"></div>
   <!-- margin -->
   <div class="container">
      <div class="container-box">
          <h2 class="text-5xl text-blue-600 text-center home-title">
        P.O. Box Trends
      </h2>
         <div class="row row-sm justify-content-center">
            @foreach($trendingData as $trendingDatas )
     @php($product_size = App\ProductSize::select('size_id')->where('qty','!=',0)->where('product_size.product_id',$trendingDatas->id)->pluck('size_id')->first())
     @php($productqty = App\ProductSize::select('size_id')->where('qty','!=',0)->where('product_size.product_id',$trendingDatas->id)->get())
            @php($sizeData = App\Sizes::where('id',$product_size)->where('is_deleted',0)->first())
            <div class="col-6 col-md-4 col-lg-3 col-xl-6col">
               <div class="product-default home-featured-product">
                   @if($trendingDatas->discount !== 0)
                   <div class="absolute top-5 right-0 bg-blue-600 px-3 py-1" style="width: 82px;padding: 0px !important;position: absolute;right: 0;">
                     <p class="text-sm uppercase text-white font-bold" style="color: #fff!important;background: #1d70ba;position: absolute;z-index: 1;width: 72px;margin-top: 14px;padding: 0 0px 0px 10px;">
                       {{$trendingDatas->discount}}% OFF
                     </p>
                   </div>
                   @endif


                  <figure class="figure_height"  >
                     <a href="{{route('productDetail','')}}/{{$trendingDatas->id}}">
                     <img  style="height:-webkit-fill-available!important;width: auto!important; " src="{{ asset('assets/upload_images/product') }}/{{$trendingDatas['image']}}">
                     </a>
                  </figure>
                  <div class="product-details">
                    
                     <!-- End .product-container -->
                     <h2 class="product-title">
                        <a href="{{route('productDetail','')}}/{{$trendingDatas->id}}"> {{$trendingDatas->name}}</a>
                     </h2>
                     <div class="price-box">
                        <span class="product-price"> ₹{{$trendingDatas->price}}</span>
                        @if($trendingDatas->discount != 0)
                        <strike class="product-price" style="font-size: 14px;">
                        ₹{{$trendingDatas->mrp}}
                        </strike>
                        @endif
                     </div>
                     <!-- End .price-box -->
                     <div class="product-action">
                      @if(count($productqty) != 0)
                      <a href="{{route('productDetail',$trendingDatas['id'])}}">
                        <!-- addcart -->
                       <button style="text-transform: uppercase;" class="btn-icon btn-add-cart view-details " data-toggle="modal" data-size="{{$sizeData->id}}" data-qty="1" data-mid="{{$trendingDatas->id}}" data-mrp="{{$trendingDatas['mrp']}}" data-price="{{$trendingDatas['price']}}" id="product_{{$trendingDatas['id']}}"><i class="icon-bag"></i>ADD To Cart</button>
                     </a>
                       @else
                       <a  class="paction add-cart cart"  title="Out of stock" style="margin-left: 10px;">
                                                        <span>Out of stock</span>
                                                        </a>
                       @endif            

                     <input type="hidden" name="user_id" name="user_id" id="user_id" value="{{$user}}">
                     </div>
                  </div>
                  <!-- End .product-details -->
               </div>
            </div>
            <!-- End .col-lg-3 -->
            @endforeach     
         </div>
         <!-- End .row -->
      </div>
      <!-- End .container-box -->
   </div>
   <!-- End .container -->
   <div class="mb-3"></div>
   <!-- margin -->
   <div class="mb-3"></div>
   <!-- margin -->
   <div class="mb-3"></div>
   <!-- margin -->
   <div class="banners-group">
      <div class="container">
         <div class="row">
            @foreach($static_banners as $static_banner)
            @if($static_banner['url'] != null)
            <div class="col-md-12">
               <div class="banner banner-image" style="height: 402px;">
                  <a href="{{$static_banner['url']}}">
                  <img  style="height: auto;" src="{{ asset('assets/upload_images/banner') }}/{{$static_banner['image']}}" alt="banner">
                  </a>
               </div>
               <!-- End .banner -->
            </div>
            @else 
            <div class="col-md-12">
               <div class="banner banner-image" style="height: 402px;">
                  <a href="" onClick="javascript:return false;" style="cursor: context-menu;">
                  <img   style="height: auto;" style="cursor: context-menu;" src="{{ asset('assets/upload_images/banner') }}/{{$static_banner['image']}}" alt="banner">
                  </a>
               </div>
               <!-- End .banner -->
            </div>
            @endif
            @endforeach  
         </div>
         <!-- End .row -->
      </div>
      <!-- End .container -->
   </div>
   <!-- End .banners-group -->
   <div class="mb-3"></div>
   <!-- margin -->
   <div class="container">
      <div class="container-box">
          <h2 class="text-5xl text-blue-600 text-center home-title">
        New Arrivals
      </h2>
         <div class="row row-sm justify-content-center">
            @foreach( $newArrival as $top_product )
             @php($product_size = App\ProductSize::select('size_id')->where('qty','!=',0)->where('product_size.product_id',$top_product->id)->pluck('size_id')->first())
     @php($productqty = App\ProductSize::select('size_id')->where('qty','!=',0)->where('product_size.product_id',$top_product->id)->get())
            @php($sizeData = App\Sizes::where('id',$product_size)->where('is_deleted',0)->first())
            <div class="col-6 col-md-4 col-lg-3 col-xl-6col">
               <div class="product-default home-featured-product">
                  @if($top_product->discount !== 0)
                   <div class="absolute top-5 right-0 bg-blue-600 px-3 py-1" style="width: 82px;padding: 0px !important;position: absolute;right: 0;">
                     <p class="text-sm uppercase text-white font-bold" style="color: #fff!important;background: #1d70ba;position: absolute;z-index: 1;width: 72px;margin-top: 14px;padding: 0 0px 0px 10px;">
                       {{$top_product->discount}}% OFF
                     </p>
                   </div>
                   @endif
                  <figure class="figure_height" >
                     <a href="{{route('productDetail','')}}/{{$top_product->id}}">
                     <img style="height:-webkit-fill-available!important;width: auto!important; " src="{{ asset('assets/upload_images/product/thumb') }}/{{$top_product['image']}}">
                     </a>
                  </figure>
                  <div class="product-details">
                   
                     <!-- End .product-container -->
                     <h2 class="product-title">
                        <a href="{{route('productDetail','')}}/{{$top_product->id}}">{{$top_product->name}}</a>
                     </h2>
                     <div class="price-box">
                        <span class="product-price">₹ {{$top_product->price}}</span>
                        @if($top_product->discount !== 0)
                        <strike class="product-price"  style="font-size: 14px;">
                        ₹ {{$top_product->mrp}}
                        </strike>
                        @endif
                     </div>
                     <!-- End .price-box -->
                     <div class="product-action">
                         @if(count($productqty) != 0)
                         <a href="{{route('productDetail',$top_product['id'])}}">
                          <!-- addcart -->
                       <button style="text-transform: uppercase;" class="btn-icon btn-add-cart view-details " data-toggle="modal" data-size="{{$sizeData->id}}" data-qty="1" data-mid="{{$top_product->id}}" data-mrp="{{$top_product['mrp']}}" data-price="{{$top_product['price']}}" id="product_{{$top_product['id']}}"><i class="icon-bag"></i>ADD To Cart</button>
                     </a>
                       @else
                       <a  class="paction add-cart cart"  title="Out of stock" style="margin-left: 10px;">
                                                        <span>Out of stock</span>
                                                        </a>
                       @endif            

                     <input type="hidden" name="user_id" name="user_id" id="user_id" value="{{$user}}">
                       
                     </div>
                  </div>
                  <!-- End .product-details -->
               </div>
            </div>
            <!-- End .col-lg-3 -->
            @endforeach     
         </div>
         <!-- End .row -->
      </div>
      <!-- End .container-box -->
   </div>
   <!-- End .container -->
   <div class="mb-3"></div>
   <div class="mb-3"></div>
   <div class="mb-3"></div>
<!-- <div class="container">
         <h2 class="text-5xl text-blue-600 text-center home-title">
       Testimonials
      </h2>

    <div class="row">

        <div class="col-md-12">
        @if(count($testinomials) <=3)
             @foreach ( $testinomials as $testinomials_key => $testinomials_value)
                <div class="testimonial  float-left" style="width: 360px;">
                    <div class="pic" style="height: 110px" height="110">
                        <img  src="{{ asset('assets/upload_images/testimonial/thumb') }}/{{$testinomials_value['image']}}">
                    </div>
                    <p class="description comment more" id="{{$testinomials_value['id']}}">
                       {{ str_limit($testinomials_value->description) }}
                    </p>  
                    <div class="testimonial-profile">
                        <h3 class="title"> {{$testinomials_value->name}}</h3>
                    </div>
                   
                </div>
               @endforeach
          @endif

          @if(count($testinomials) >=4)
            <div id="testimonial-slider" class="owl-carousel testimonial-slider">
               @foreach ( $testinomials as $testinomials_key => $testinomials_value)
                <div class="testimonial">
                    <div class="pic" style="height: 110px" height="110">
                        <img  src="{{ asset('assets/upload_images/testimonial/thumb') }}/{{$testinomials_value['image']}}">
                    </div>
                    <p class="description comment more" id="{{$testinomials_value['id']}}">
                       {{ str_limit($testinomials_value->description) }}
                    </p>  
                    <div class="testimonial-profile">
                        <h3 class="title"> {{$testinomials_value->name}}</h3>
                    </div>
                    
                </div>
               @endforeach
               @endif

             
               
              
              
            </div>
        </div>
    </div> 
    </div> --> 
</main>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.theme.min.css">
<style type="text/css">
@media only screen and (max-width: 992px){
  .banner.banner-image img {
      height: inherit!important;
  }
}
.testimonial .pic img {
    width: 100%;
    height: -webkit-fill-available!important;
}
.morecontent span{display:none}.inner-quickview:hover figure img:last-child{opacity:.2!important}.product-default:hover figure h2{display:none}.figure_height{height:448px}@media only screen and (max-width:768px){[class*=figure_height]{height:210px}.alert{width:100%;padding-top:60px}.alert-success{width:100%!important;padding-top:60px!important}.testimonial{text-align:center;padding:85px 50px 45px 70px;margin:70px 15px 35px;background:#f9f9f9;box-shadow:8px 4px 0 0 #77a9dd;position:relative;height:306px!important}}.testimonial .pic{width:120px;height:120px;border:5px solid #77a9dd;margin:0 auto;position:absolute;top:-60px;left:0;right:0}.testimonial .pic img{width:100%;height:auto}.testimonial .description{font-size:15px;color:#757575;line-height:27px;margin-bottom:20px;position:relative}.testimonial .description:before{content:"\f10d";font-family:FontAwesome;font-size:32px;color:#77a9dd;position:absolute;top:-15px;left:-35px}.testimonial .testimonial-profile{position:relative;margin:20px 0 10px 0}.testimonial .testimonial-profile:after{content:"";width:50px;height:2px;background:#77a9dd;margin:0 auto;position:absolute;bottom:-10px;left:0;right:0}.testimonial .title{display:inline-block;font-size:18px;color:#4a5184;letter-spacing:1px;text-transform:uppercase;margin:0}.testimonial .post{display:inline-block;font-size:15px;color:#757575;text-transform:capitalize}.owl-theme .owl-controls{margin-top:10px}.owl-theme .owl-controls .owl-page span{background:#5e5f5f;opacity:1;transition:all .4s ease 0s}.owl-theme .owl-controls .owl-page.active span,.owl-theme .owl-controls.clickable .owl-page:hover span{background:#77a9dd}.owl-theme .owl-controls .owl-page.active span{width:22px;height:12px}.testimonial{text-align:center;padding:85px 50px 45px 70px;margin:70px 15px 35px;background:#f9f9f9;box-shadow:8px 4px 0 0 #77a9dd;position:relative;height:231px}
</style>

 <script type="text/javascript">
                function myFunction(t){t.matches?$("#testimonial-slider").owlCarousel({items:3,itemsDesktop:[1e3,2],itemsDesktopSmall:[979,2],itemsTablet:[768,1],itemsMobile:[650,1],pagination:!0,navigation:!1,autoplay:!0,autoplaySpeed:1500,loop:!0}):$("#testimonial-slider").owlCarousel({items:3,itemsDesktop:[1e3,2],itemsDesktopSmall:[979,2],itemsTablet:[768,1],itemsMobile:[650,1],pagination:!0,navigation:!1,autoplay:!0,autoplaySpeed:1500,loop:!0})}$(document).ready(function(){$(".more").each(function(){var t=$(this).html(),s=$(this).attr("id");if(t.length>100){var e=t.substr(0,100)+'<span class="moreellipses">...&nbsp;</span><span class="morecontent"><span>'+t.substr(99,t.length-100)+'</span>&nbsp;&nbsp;<a href="" class="morelink"  data-toggle="modal" data-target="#myModal-'+s+'">more</a></span>';$(this).html(e)}}),$(".morelink").click(function(){return $(this).hasClass("less")?($(this).removeClass("less"),$(this).html("more")):($(this).addClass("less"),$(this).html("less")),$(this).parent().prev().toggle(),$(this).prev().toggle(),!1})}),$(document).ready(function(){var t=window.matchMedia("(max-width: 700px)");myFunction(t),t.addListener(myFunction)});
                 </script>
@endsection