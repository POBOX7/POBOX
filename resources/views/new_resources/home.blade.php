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
            
            <!-- <div class="column-slider owl-carousel"> -->
              
               <div class="product-default cat-listing inner-quickview inner-icon" style="height: 555px;">
                 <!--  <div class="over-lay-cat" style=""></div> -->
                  <figure>
                     <a href="{{$cat['link']}}">
                     <img class="hide" style="height:-webkit-fill-available;" src="{{ asset('assets/upload_images/category') }}/{{$cat['image']}}">
                     </a>
                    <!--  <button type="button" class="btn-quickview" data-toggle="modal" data-target="#category-{{$cat['id']}}" title="Quick View">Quick View</button>  -->
                     <a href="{{$cat['link']}}"> 
                     <div class="middle">
                      <div class="text">View More</div>
                    </div>
                    </a>
                    <h2 style="text-align: center;"><span style="position: relative; top: 5px;"> {{$cat->name}}</span></h2>
                  </figure>

               </div>


           <!--  </div> -->
            
            <!-- End .column-slider  -->
            <!-- End .column-product-container -->
         </div>
         <!-- End .col-md-4 -->
         <div id="category-{{$cat['id']}}" class="modal fade" role="dialog">
            <div class="modal-dialog" >
               <!-- Modal content-->
               <div class="modal-content" >
                  <div class="modal-body"  style="overflow: hidden;">
                     <button type="button" class="close" data-dismiss="modal">&times;</button> 
                     <div class="product-single-container product-single-default product-quick-view container">
                        <div class="row">
                           <div class="col-lg-6 col-md-6 product-single-gallery">
                              <div class="product-slider-container product-item">
                                 <div class="product-single-carousel owl-carousel owl-theme">
                                    <div class="product-item">
                                       <img class="product-single-image" src="{{ asset('assets/upload_images/category') }}/{{$cat['image']}}" data-zoom-image="{{$cat['image']}}"/>
                                    </div>
                                 </div>
                                 <!-- End .product-single-carousel -->
                              </div>
                              <div class="prod-thumbnail row owl-dots" id='carousel-custom-dots'>
                                 <div class="col-3 owl-dot">
                                    <img src="{{ asset('assets/upload_images/category') }}/{{$cat['image']}}"/>
                                 </div>
                              </div>
                           </div>
                           <!-- End .col-lg-7 -->
                           <div class="col-lg-6 col-md-6">
                              <div class="product-single-details">
                                 <h1 class="product-title">Silver PO Box Headset</h1>
                                 <!-- <div class="ratings-container">
                                    <div class="product-ratings">
                                       <span class="ratings" style="width:60%"></span> 
                                    </div> 
                                    <a href="#" class="rating-link">( 6 Reviews )</a>
                                    </div> -->
                                 <!-- End .product-container -->
                                 <div class="price-box">
                                    <span class="old-price">$81.00</span>
                                    <span class="product-price">$101.00</span>
                                 </div>
                                 <!-- End .price-box -->
                                 <div class="product-desc">
                                    <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non.</p>
                                 </div>
                                 <!-- End .product-desc -->
                                 <div class="product-filters-container">
                                    <div class="product-single-filter">
                                       <label>Colors:</label>
                                       <ul class="config-swatch-list">
                                          <li class="active">
                                             <a href="#" style="background-color: #6085a5;"></a>
                                          </li>
                                          <li>
                                             <a href="#" style="background-color: #ab6e6e;"></a>
                                          </li>
                                          <li>
                                             <a href="#" style="background-color: #b19970;"></a>
                                          </li>
                                          <li>
                                             <a href="#" style="background-color: #11426b;"></a>
                                          </li>
                                       </ul>
                                    </div>
                                    <!-- End .product-single-filter -->
                                 </div>
                                 <!-- End .product-filters-container -->
                                 <div class="product-action">
                                    <div class="product-single-qty">
                                       <input class="horizontal-quantity form-control" type="text">
                                    </div>
                                    <!-- End .product-single-qty -->
                                    <a href="" class="paction add-cart" title="Add to Cart">
                                    <span>Add to Cart</span>
                                    </a>
                                    <a href="#" class="paction add-wishlist" title="Add to Wishlist">
                                    <span>Add to Wishlist</span>
                                    </a>
                                    <a href="#" class="paction add-compare" title="Add to Compare">
                                    <span>Add to Compare</span>
                                    </a>
                                 </div>
                                 <!-- End .product-action -->
                                 <div class="product-single-share">
                                    <label>Share:</label>
                                    <!-- www.addthis.com share plugin-->
                                    <div class="addthis_inline_share_toolbox"></div>
                                 </div>
                                 <!-- End .product single-share -->
                              </div>
                              <!-- End .product-single-details -->
                           </div>
                           <!-- End .col-lg-5 -->
                        </div>
                        <!-- End .row -->
                     </div>
                     <!-- End .product-single-container -->
                  </div>
               </div>
            </div>
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
                     <!-- <div class="ratings-container">
                        <div class="product-ratings">
                           <span class="ratings" style="width:100%"></span> 
                           <span class="tooltiptext tooltip-top"></span>
                        </div> 
                        </div> -->
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
                        <!-- <a href="#" class="btn-icon-wish"><i class="icon-heart"></i></a>
                        <button class="btn-icon btn-add-cart" data-toggle="modal" data-target="#addCartModal"><i class="icon-bag"></i>ADD TO CART</button>
                        <a type="button" data-toggle="modal" data-target="#myModal_new_arrival_detail_{{$trendingDatas->id}}" class="btn-quickviewss" title="Quick View"><i class="fas fa-external-link-alt"></i></a>  -->
                        <!-- <a  data-toggle="modal" data-target="#myModal_new_arrival_detail_{{$trendingDatas->id}}" class="btn-quickviewss" title="Quick View"><i class="fas fa-external-link-alt"></i></a> --> 
                        <div class="modal fade" id="myModal_new_arrival_detail_{{$trendingDatas->id}}" role="dialog">
                           <div class="modal-dialog">
                              <!-- Modal content-->
                              <div class="modal-content">
                                 <div class="modal-body"  >
                                    <button type="button" class="close" data-dismiss="modal">&times;</button> 
                                    <div class="product-single-container product-single-default product-quick-view container">
                                       <div class="row">
                                          <div class="col-lg-6 col-md-6 product-single-gallery">
                                             <div class="product-slider-container product-item">
                                                <div class="product-single-carousel owl-carousel owl-theme">
                                                   <div class="product-item">
                                                      <img class="product-single-image" src="{{ asset('assets/upload_images/product') }}/{{$trendingDatas['image']}}" data-zoom-image="{{$trendingDatas['image']}}"/>
                                                   </div>
                                                </div>
                                                <!-- End .product-single-carousel -->
                                             </div>
                                             <div class="prod-thumbnail row owl-dots" id='carousel-custom-dots'>
                                                <div class="col-3 owl-dot">
                                                   <img src="{{ asset('assets/upload_images/product') }}/{{$trendingDatas['image']}}"/>
                                                </div>
                                             </div>
                                          </div>
                                          <!-- End .col-lg-7 -->
                                          <div class="col-lg-6 col-md-6">
                                             <div class="product-single-details">
                                                <h1 class="product-title"> {{$trendingDatas->name}}</h1>
                                                <!-- <div class="ratings-container">
                                                   <div class="product-ratings">
                                                      <span class="ratings" style="width:60%"></span> 
                                                   </div> 
                                                   <a href="#" class="rating-link">( 6 Reviews )</a>
                                                   </div> -->
                                                <!-- End .product-container -->
                                                </span> 
                                                <div class="price-box">
                                                    <span class="product-price">₹ {{$trendingDatas->mrp}}</span>
                                                    @if($trendingDatas->discount !== 0)
                                                   <span class="old-price">₹ {{$trendingDatas->price}}</span>
                                                   @endif
                                                   
                                                </div>
                                                <!-- End .price-box -->
                                                <div class="product-desc">
                                                   <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non.</p>
                                                </div>
                                                <!-- End .product-desc -->
                                                <div class="product-filters-container">
                                                   <div class="product-single-filter">
                                                      <label>Colors:</label>
                                                      <ul class="config-swatch-list">
                                                         <li class="active">
                                                            <a href="#" style="background-color: #6085a5;"></a>
                                                         </li>
                                                         <li>
                                                            <a href="#" style="background-color: #ab6e6e;"></a>
                                                         </li>
                                                         <li>
                                                            <a href="#" style="background-color: #b19970;"></a>
                                                         </li>
                                                         <li>
                                                            <a href="#" style="background-color: #11426b;"></a>
                                                         </li>
                                                      </ul>
                                                   </div>
                                                   <!-- End .product-single-filter -->
                                                </div>
                                                <!-- End .product-filters-container -->
                                                <div class="product-action">
                                                   <div class="product-single-qty">
                                                      <input class="horizontal-quantity form-control" type="text">
                                                   </div>
                                                   <!-- End .product-single-qty -->
                                                   <a href="" class="paction add-cart" title="Add to Cart">
                                                   <span>Add to Cart</span>
                                                   </a>
                                                   <a href="#" class="paction add-wishlist" title="Add to Wishlist">
                                                   <span>Add to Wishlist</span>
                                                   </a> 
                                                </div>
                                                 
                                                <!-- End .product single-share -->
                                             </div>
                                             <!-- End .product-single-details -->
                                          </div>
                                          <!-- End .col-lg-5 -->
                                       </div>
                                       <!-- End .row -->
                                    </div>
                                    <!-- End .product-single-container -->
                                 </div>
                              </div>
                           </div>
                        </div>
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
               <div class="banner banner-image" style="height: 432px;">
                  <a href="{{$static_banner['url']}}">
                  <img  style="height: auto!important;" src="{{ asset('assets/upload_images/banner') }}/{{$static_banner['image']}}" alt="banner">
                  </a>
               </div>
               <!-- End .banner -->
            </div>
            @else 
            <div class="col-md-12">
               <div class="banner banner-image" style="height: 432px;">
                  <a href="" onClick="javascript:return false;" style="cursor: context-menu;">
                  <img   style="height: -webkit-fill-available!important;" style="cursor: context-menu;" src="{{ asset('assets/upload_images/banner') }}/{{$static_banner['image']}}" alt="banner">
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
                     <img style="height:-webkit-fill-available!important;width: auto!important; " src="{{ asset('assets/upload_images/product') }}/{{$top_product['image']}}">
                     </a>
                  </figure>
                  <div class="product-details">
                     <!-- <div class="ratings-container">
                        <div class="product-ratings">
                           <span class="ratings" style="width:100%"></span> 
                           <span class="tooltiptext tooltip-top"></span>
                        </div> 
                        </div> -->
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
                        <!-- <a href="#" class="btn-icon-wish"><i class="icon-heart"></i></a>
                        <button class="btn-icon btn-add-cart" data-toggle="modal" data-target="#addCartModal"><i class="icon-bag"></i>ADD TO CART</button> 
                        <a type="button" data-toggle="modal" data-target="#new-{{$top_product->id}}" class="btn-quickviewss" title="Quick View"><i class="fas fa-external-link-alt"></i></a> -->
                        <div class="modal fade" id="new-{{$top_product->id}}" role="dialog">
                           <div class="modal-dialog">
                             
                              <div class="modal-content">
                                 <div class="modal-body" >
                                    <button type="button" class="close" data-dismiss="modal">&times;</button> 
                                    <div class="product-single-container product-single-default product-quick-view container">
                                       <div class="row">
                                          <div class="col-lg-6 col-md-6 product-single-gallery">
                                             <div class="product-slider-container product-item">
                                                <div class="product-single-carousel owl-carousel owl-theme">
                                                   <div class="product-item">
                                                      <img class="product-single-image" src="{{ asset('assets/upload_images/product') }}/{{$top_product['image']}}" data-zoom-image="{{$top_product['image']}}"/>
                                                   </div>
                                                </div>
                                                <!-- End .product-single-carousel -->
                                             </div>
                                             <div class="prod-thumbnail row owl-dots" id='carousel-custom-dots'>
                                                <div class="col-3 owl-dot">
                                                   <img src="{{ asset('assets/upload_images/product') }}/{{$top_product['image']}}"/>
                                                </div>
                                             </div>
                                          </div>
                                          <!-- End .col-lg-7 -->
                                          <div class="col-lg-6 col-md-6">
                                             <div class="product-single-details">
                                                <h1 class="product-title">{{$top_product->name}}</h1>
                                                <!-- <div class="ratings-container">
                                                   <div class="product-ratings">
                                                      <span class="ratings" style="width:60%"></span> 
                                                   </div> 
                                                   <a href="#" class="rating-link">( 6 Reviews )</a>
                                                   </div> -->
                                                <!-- End .product-container -->
                                                <div class="price-box">
                                                   <span class="old-price">₹ {{$top_product->mrp}}</span>
                                                  @if($top_product->discount !== 0)
                                                   <span class="product-price">₹ {{$top_product->price}}</span>
                                                   @endif
                                                </div>
                                                <!-- End .price-box -->
                                                <div class="product-desc">
                                                   <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non.</p>
                                                </div>
                                                <!-- End .product-desc -->
                                                <div class="product-filters-container">
                                                   <div class="product-single-filter">
                                                      <label>Colors:</label>
                                                      <ul class="config-swatch-list">
                                                         <li class="active">
                                                            <a href="#" style="background-color: #6085a5;"></a>
                                                         </li>
                                                         <li>
                                                            <a href="#" style="background-color: #ab6e6e;"></a>
                                                         </li>
                                                         <li>
                                                            <a href="#" style="background-color: #b19970;"></a>
                                                         </li>
                                                         <li>
                                                            <a href="#" style="background-color: #11426b;"></a>
                                                         </li>
                                                      </ul>
                                                   </div>
                                                   <!-- End .product-single-filter -->
                                                </div>
                                                <!-- End .product-filters-container -->
                                                <div class="product-action">
                                                   <div class="product-single-qty">
                                                      <input class="horizontal-quantity form-control" type="text">
                                                   </div>
                                                   <!-- End .product-single-qty -->
                                                   <a href="" class="paction add-cart" title="Add to Cart">
                                                   <span>Add to Cart</span>
                                                   </a>
                                                   <a href="#" class="paction add-wishlist" title="Add to Wishlist">
                                                   <span>Add to Wishlist</span>
                                                   </a>
                                                    
                                                </div>
                                                <!-- End .product-action --> 
                                                <!-- End .product single-share -->
                                             </div>
                                             <!-- End .product-single-details -->
                                          </div>
                                          <!-- End .col-lg-5 -->
                                       </div>
                                       <!-- End .row -->
                                    </div>
                                    <!-- End .product-single-container -->
                                 </div>
                              </div>
                           </div>
                        </div> 
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
<div class="container">
         <h2 class="text-5xl text-blue-600 text-center home-title">
       Testimonials
      </h2>

    <div class="row">

        <div class="col-md-12">
            <div id="testimonial-slider" class="owl-carousel testimonial-slider">
               @foreach ( $testinomials as $testinomials_key => $testinomials_value)
                <div class="testimonial">
                    <div class="pic">
                        <img style="height: 110px" height="110" src="{{ asset('assets/upload_images/testimonial') }}/{{$testinomials_value['image']}}">
                    </div>
                    <p class="description comment more" id="{{$testinomials_value['id']}}">
                       {{ str_limit($testinomials_value->description) }}
                    </p>  
                    
                    <div class="testimonial-profile">
                        <h3 class="title"> {{$testinomials_value->name}}</h3>
                  
                    </div>
                    <!-- The Modal --> 
                </div>

               @endforeach
                
 
            </div>
        </div>
    </div> 
    
</main><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.theme.min.css">
 
<style type="text/css">
 
 
.morecontent span {
   display: none;
}
 



     .inner-quickview:hover figure img:last-child{
  opacity: 0.2 !important;
 }   

     .product-default:hover figure h2{
  display: none;
 }   
.figure_height
{
   height:448px;
}
@media only screen and (max-width: 768px) {
  /* For mobile phones: */
  [class*="figure_height"] {
    height: 210px;
  }
  .alert 
      {
        width: 100%;
        padding-top: 60px;
      }
      .alert-success
      {
        width: 100% !important;
        padding-top: 60px !important;
      }
      .testimonial{
    text-align: center;
    padding: 85px 50px 45px 70px;
    margin: 70px 15px 35px;
    background: #f9f9f9;
    box-shadow: 8px 4px 0 0 #77a9dd;
    position: relative;
    height: 306px!important;
}
}

.testimonial .pic{
    width: 120px;
    height: 120px;
    border: 5px solid #77a9dd;
    margin: 0 auto;
    position: absolute;
    top: -60px;
    left: 0;
    right: 0;
}
.testimonial .pic img{
    width: 100%;
    height: auto;
}
.testimonial .description{
    font-size: 15px;
    color: #757575;
    line-height: 27px;
    margin-bottom: 20px;
    position: relative;
}
.testimonial .description:before{
    content: "\f10d";
    font-family: "FontAwesome";
    font-size: 32px;
    color: #77a9dd;
    position: absolute;
    top: -15px;
    left: -35px;
}
.testimonial .testimonial-profile{
    position: relative;
    margin: 20px 0 10px 0;
}
.testimonial .testimonial-profile:after{
    content: "";
    width: 50px;
    height: 2px;
    background: #77a9dd;
    margin: 0 auto;
    position: absolute;
    bottom: -10px;
    left: 0;
    right: 0;
}
.testimonial .title{
    display: inline-block;
    font-size: 18px;
    color: #4a5184;
    letter-spacing: 1px;
    text-transform: uppercase;
    margin: 0;
}
.testimonial .post{
    display: inline-block;
    font-size: 15px;
    color: #757575;
    text-transform: capitalize;
}
.owl-theme .owl-controls{
    margin-top: 10px;
}
.owl-theme .owl-controls .owl-page span{
    background: #5e5f5f;
    opacity: 1;
    transition: all 0.4s ease 0s;
}
.owl-theme .owl-controls .owl-page.active span,
.owl-theme .owl-controls.clickable .owl-page:hover span{
    background: #77a9dd;
}
.owl-theme .owl-controls .owl-page.active span{
    width: 22px;
    height: 12px;
}
.testimonial{
    text-align: center;
    padding: 85px 50px 45px 70px;
    margin: 70px 15px 35px;
    background: #f9f9f9;
    box-shadow: 8px 4px 0 0 #77a9dd;
    position: relative;
    height: 231px;
}
</style>

 
 <script type="text/javascript">


   $(document).ready(function() {
   var showChar = 100;
   var ellipsestext = "...";
   var moretext = "more";
   var lesstext = "less";
   $('.more').each(function() {
      var content = $(this).html();
      var id = $(this).attr('id');  
      if(content.length > showChar) {

         var c = content.substr(0, showChar);
         var h = content.substr(showChar-1, content.length - showChar);

         var html = c + '<span class="moreellipses">' + ellipsestext+ '&nbsp;</span><span class="morecontent"><span>' + h + '</span>&nbsp;&nbsp;<a href="" class="morelink"  data-toggle="modal" data-target="#myModal-'+id+'">' + moretext + '</a></span>';

         $(this).html(html);
      }

   });

   $(".morelink").click(function(){ 
      if($(this).hasClass("less")) {
         $(this).removeClass("less");
         $(this).html(moretext);
      } else {
         $(this).addClass("less");
         $(this).html(lesstext);
      }
      $(this).parent().prev().toggle();
      $(this).prev().toggle();
      return false;
   });
});



function myFunction(x) {
  if (x.matches) { // If media query matches
      $("#testimonial-slider").owlCarousel({
        items:1,
        itemsDesktop:[1000,2],
        itemsDesktopSmall:[979,2],
        itemsTablet:[768,1],
        itemsMobile:[650,1],
        pagination:true,
        navigation:false,
       autoplay: true,
      autoplaySpeed: 1500,
      loop:true,
    });
  } else {
       $("#testimonial-slider").owlCarousel({
        items:3,
        itemsDesktop:[1000,2],
        itemsDesktopSmall:[979,2],
        itemsTablet:[768,1],
        itemsMobile:[650,1],
        pagination:true,
        navigation:false,
       autoplay: true,
      autoplaySpeed: 1500,
      loop:true,
    });
  }
}


$(document).ready(function(){
   var x = window.matchMedia("(max-width: 700px)")
myFunction(x) // Call listener function at run time
x.addListener(myFunction) // Attach listener function on state changes 



});




// $(document).ready(function(){
//     var maxLength = 10;
//     $(".show-read-more").each(function(){
//         var myStr = $(this).text();
//         if($.trim(myStr).length > maxLength){
//             var newStr = myStr.substring(0, maxLength);
//             var removedStr = myStr.substring(maxLength, $.trim(myStr).length);
//             $(this).empty().html(newStr);
//             $(this).append(' <a href="javascript:void(0);" id="myModal" class="read-more">read more...</a>');
//              $(this).append('<span class="more-text">' + removedStr + '</span>'); 
//         }
//     });
//     $(".read-more").click(function(){
//         $(this).siblings(".more-text").contents().unwrap();
//         $(this).remove();
//     });
// });
 </script>


@endsection