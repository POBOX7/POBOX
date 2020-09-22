@extends('layouts.app')
@section('content')
<!-- Main CSS File -->
<link rel="stylesheet" href="assets/css/style.css">
<script src="assets/js/plugins.js"></script>
<!-- Main JS File -->
<script src="assets/js/nouislider.min.js"></script>
<!-- Main JS File -->
<script src="assets/js/main.js"></script>
<style type="text/css">


  /* for image*/
/*.product-default.inner-quickview.inner-icon {
    width: 269px;
}
a.clearall::after{
  display: none!important;
}*/


.quickview {
    background-color: #fff;
    padding:0px!important;
}


  @media only screen and (max-width: 767px) {
    footer {
    margin-bottom: 0px!important;
    padding-bottom: 0px!important;
   }
}
p {
    font-size: 16px;
}
span.text-gray-400.ml-2 {
    font-size: 16px;
}

 .px-4 {
    padding-left: .3rem!important;
}
 .px-4 {
    padding-right: 0.3rem!important;
}
.footerget{
   margin-top: 2.5rem!important;
}
.footersignup{
   margin-top: 0.5rem!important; 
}
p.text-gray-400.mt-2.footersignup {
    font-size: 16px!important;
}
@media only screen and (max-width: 1440px) and (min-width: 768px){ 
    
.footerheight{
   height: 377px!important;
}
}
.mt-4 {
    margin-top: 3.1rem!important;
}
.mt-3 {
    margin-top: 3.2rem !important;
}
.lg\:py-16{
   padding-top:7rem!important;
   padding-bottom:4rem
}
 @media only screen and (max-width: 768px) {
    .px-4 {
    padding-left: 2.4rem!important;
   }
   .py-6 {
       padding-top: 1.9rem!important;
   }
   .logo img { 
    height: 53px !important;
   } 
   .px-4 {
    padding-right: 2.2rem!important;
   }
   .ml-8 {
    margin-left: 2.8rem!important;
   }
   svg.w-6.h-6 { 
       margin-top: 1px;
   } 

}

 @media only screen and (max-width: 768px) {
    .leading-6 {
    line-height: 1.9rem!important;
   }
   p.text-blue-600.text-base.leading-6 {
     margin-top: 0px!important;   
   } 
    .py-2 {
    padding-top: 0.5rem!important;
   }
  .py-2 {
    padding-bottom: 0.7rem!important;
   }
   .px-4 {
    padding-right: 2.4rem!important;
   }

}




.h1, .h2, .h3, .h4, .h5, .h6, h1, h2, h3, h4, h5, h6 {
    margin-bottom: .5rem!important;
    font-weight: 500!important;
    line-height: 1.2!important;
}
   /* .mfp-wrap.mfp-close-btn-in.mfp-auto-cursor.mfp-ajax-product.mfp-ready {
   display: none;
   }*/
   div#myModal_size .modal-content {
    width: 530px;
    min-width: 576px !important;
    padding: 30px;
}
   .product-default.inner-quickview.inner-icon .ratings-container {
    margin: 0!important;
 }
 .product-default.inner-quickview.inner-icon .price-box {
    margin-bottom: 0!important;
}

   .sidebar-shop .widget{
      border: 0!important
   }
  .sidebar-shop .widget-title {
    border-bottom: 1px solid #e6e6e6!important;
    line-height: 2;
}
   .home-slide.loaded {
    height: 300px !important;
}
   .product-default figure img:first-child {
    width: 100%!important;
    object-fit: fill!important;
    /*height: auto!important;*/
}
   p.text-blue-600.text-base.leading-6 {
   margin-top: 9px;
   padding: 0;
   }
   .logo img {
   display: block;
   max-width: 100%;
   height: 68px;
   }
   footer p {
   font-size: 16px;
   }        footer li {
   line-height: 0.5!important;
   height: 8px;
   font-size: 14px;
   }
   .header-nav-menu {
   margin-top: 60px!important;
   }
   footer form.mt-6 {
   margin-top: 0;
   margin-bottom: 0;
   }
   footer {
   padding-bottom: 60px;
   padding-top: 65px ;
   }
   svg.w-6.h-6 {
   height: 24px!important;
   width: 28px;
   }
   svg.w-5.h-5.text-white {
   height: 20px;
   width: 25px;
   }
   footer {
   margin-top: 30px;
   padding-top: 60px;
   }
   footer li {
   line-height: 1;
   }
   footer button {
   height: 37px;
   }
   body:not(.loaded) > *:not(.loading-overlay){
   visibility: unset;
   }
   .max-w-7xl {
   max-width: 124rem;
   }
   a.nav-link {
   font-size: 17px;
   }
   p.text-blue-600.text-base.leading-6 {
   font-size: 16px;
   }
   .leading-6 {
   line-height: 2.0rem;
   }
   body a {
   font-size: 16px !important;
   }
   .home-slider-container, .home-slide {
   height: 300px;
   }
   .breadcrumb-item + .breadcrumb-item::before {
   font-size: 20px;
   }
   .inner-quickview .product-details {
   align-items: center;
   }
   .modal-backdrop.fade.show {
   opacity: 0;
   }
   .ajax-overlay {
   opacity: 0;
   }
   .ajax-overlay {
   opacity: 0;
   display: none;
   }
   .mfp-ajax-product.mfp-bg, .login-popup.mfp-bg {
   opacity: 0;
   display: none;
   }
   .product-default.inner-quickview.inner-icon a.btn-quickview1 {
   background: red;
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
   opacity: 1!important;
   opacity: 0;
   height: unset;
   padding: 1.4rem;
   background-color: #1d70ba;
   z-index: 2;
   color: white;
   transform: none;
   margin: 0;
   border: none;
   transition: all .3s ease-out;
   }
   .btn-quickview1{
   position: absolute;
   bottom: 0;
   left: 0;
   width: 100%;
   font-size: 1.3rem;
   font-weight: 400;
   letter-spacing: 0.025em;
   font-family: "Oswald", sans-serif;
   text-transform: uppercase;
   visibility: hidden;
   opacity: 0;
   height: unset;
   padding: 1.4rem;
   background-color: #1d70ba;
   color: white;
   transform: none;
   margin: 0;
   border: none;
   transition: all .3s ease-out;
   }
   .product-price {
   color: #465157;
   font: 600 1.8rem/0.8 "Open Sans", sans-serif;
   display: inline-block;
   color: #a7a7a7;
   font-size: 15px;
   margin-right: .2143em;
   /* vertical-align: baseline; */
   text-decoration: line-through;
   }
   span.product-prices.price {
   font-family: 'Oswald';
   font-weight: 400;
   color: #282d3b;
   font-size: 18px;
   }
   .ratings-container .product-ratings > span.ratings.width-1percent::before,.ratings-container .product-ratings > span.ratings.width-2percent::before,.ratings-container .product-ratings > span.ratings.width-3percent::before,.ratings-container .product-ratings > span.ratings.width-4percent::before,.ratings-container .product-ratings > span.ratings.width-5percent::before {
   color: #ffbc53!important;
   }
   span.ratings.width-1percent {
   width: 20%;
   }
   span.ratings.width-2percent {
   width: 40%;
   }
   span.ratings.width-3percent {
   width: 60%;
   }
   span.ratings.width-4percent {
   width: 80%;
   }
   span.ratings.width-5percent {
   width: 100%;
   }
   .modal span.ratings.width-1percent {
   width: 8%;
   }
   .modal span.ratings.width-2percent {
   width: 17%;
   }
   .modal span.ratings.width-3percent {
   width: 25%;
   }
   .modal span.ratings.width-4percent {
   width: 33%;
   }
   .modal span.ratings.width-5percent {
   width: 50%;
   }
</style>
<main class="main">
   <nav aria-label="breadcrumb" class="breadcrumb-nav">
      <div class="container">
         <ol class="breadcrumb mt-0" style="padding-left: 0;padding-right: 0px;">
            <!--     <li class="breadcrumb-item"><a href="index.html"><i class="icon-home"></i></a></li> -->
            <li class="breadcrumb-item"><a href="{{route('home_1')}}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page" style="font-size: 16px;"><a href="{{route('newArrival')}}"> New Arrival</a></li>
         </ol>
      </div>
      <!-- End .container -->
   </nav>
   <!-- Trigger the modal with a button -->
   <!--  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Large Modal</button> -->
   <div class="container">
   <div class="container-box" style="padding-left: 0;padding-right: 0;">
      <div class="row">
         <div class="col-lg-9">
            <div class="main container" style="padding: 0;">
               <div class="" style="margin: 0;margin-bottom: 20px;">
                  <div class="home-slider owl-carousel owl-theme owl-theme-light">
                     @foreach ($bannerSlider as $keyBannerSlider => $valueBannerSlider)
                     <div class="home-slide">
                        <a href="{{$valueBannerSlider['url']}}">
                        <div class="slide-bg owl-lazy" data-src="{{ asset('assets/upload_images/banner') }}/{{$valueBannerSlider['image']}}"></div>
                     </a>
                        <!-- End .slide-bg -->
                        <div class="container">
                           <!-- <div class="home-slide-content"> -->
                             <!--  <a href="{{$valueBannerSlider['link']}}" class="btn btn-secondary">Shop Now</a> -->
                        <!--    </div> -->
                           <!-- End .home-slide-content -->
                        </div>
                        <!-- End .container -->
                     </div>
                     <!-- End .home-slide -->
                     @endforeach
                  </div>
               </div>
            </div>
            <nav class="toolbox">
               <div class="toolbox-left">
                  <div class="toolbox-item toolbox-sort">
                     <div class="select-custom">
                        <span style="display: inline-block;width: 50px;">Sort by :</span>
                        <select name="data[sorting][filter]" id="sorting_filter" class="form-control" style="display: inline-block;width: 137px;min-height: 2px!important">
                           <option value="menu_order" selected="selected">Default sorting</option>
                           <option value="featured">Featured</option>
                           <option value="name_a_to_z">Name, A-Z</option>
                           <option value="name_z_to_a">Name, Z-A</option>
                           <option value="price_low_to_high">Price, low to high</option>
                           <option value="price_high_to_low">Price, high to low</option>
                        </select>
                     </div>
                     <!-- End .select-custom -->
                     <!-- <a href="#" class="sorter-btn" title="Set Ascending Direction"><span class="sr-only">Set Ascending Direction</span></a> -->
                  </div>
                  <!-- End .toolbox-item -->
               </div>
               <!-- End .toolbox-left -->
              <!--  <div class="toolbox-item toolbox-show">
                  <label>Showing 1–9 of 60 results</label>
               </div> -->
               <!-- End .toolbox-item -->
               <!--  <div class="layout-modes">
                  <a href="category.html" class="layout-btn btn-grid active" title="Grid">
                      <i class="icon-mode-grid"></i>
                  </a>
                  <a href="category-list.html" class="layout-btn btn-list" title="List">
                      <i class="icon-mode-list"></i>
                  </a>
                  </div> --><!-- End .layout-modes -->
            </nav>
            <script type="text/javascript">
               $('#myModal').on('hidden.bs.modal', function () {
                location.reload();
               })
            </script>
            <div id="filter_div">
               <div class="row row-sm">
                  @foreach ($newArrivalProductData as $keyNewArrivalProductData => $valueNewArrivalProductData)
                  <div class="col-md-4 col-sm-6 col-xs-12">
                     <div class="product-default inner-quickview inner-icon">
                        <figure>
                           @if($valueNewArrivalProductData->discount !== 0)
                          <div class="labels" style="line-height: 2;color: #fff;font-weight: 600;text-transform: uppercase;position: absolute;z-index: 2;width: 54px;top: .8em;font-size: 10px;left: 0.8em;">
                          <div class="onsale" style="background: blue;padding: 0px 0px 0px 6px;width: 34px;">  {{$valueNewArrivalProductData->discount}}% </div>
                       </div>

                         @endif
                           <a href="">
                           <img src="{{ asset('assets/upload_images/product') }}/{{$valueNewArrivalProductData['image']}}" width="269" height="306" style="width: 269px;height: 330px">
                           </a>
                           <!--  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Quick View</button> -->
                           <a  data-toggle="modal" data-target="#myModal_new_arrival_detail_{{$valueNewArrivalProductData['id']}}" class="btn-quickviewss" title="Quick View">Quick View</a> 
                           <!-- Porduct detail pop start  -->
                         
                         
                           <div class="modal fade" id="myModal_new_arrival_detail_{{$valueNewArrivalProductData['id']}}" role="dialog">
                              <div class="product-single-container product-single-default product-quick-view container quickview">
                                 
                              </div>
                              <!-- End .product-single-container -->
                              <div class="ajax_pop_up">
                              <div class="modal-dialog modal-lg">
                                 <div class="modal-content">
                                    <div class="modal-header">
                                       <button type="button"  class="close" data-dismiss="modal">&times;</button>
                                       <!-- <button type="button" onclick="javascript:window.location.reload()" class="close" data-dismiss="modal">&times;</button> -->
                                       <!--  <h4 class="modal-title">Product details</h4> -->
                                    </div>
                                    <div class="product-single-container product-single-default product-quick-view">
                                        <div class="product_pop_color_filter_div">
                                            <div class="row">
                                          <div class="col-lg-6 col-md-6 product-single-gallery">
                                             <div class="product-slider-container product-item">
                                                <div class="product-single-carousel owl-carousel owl-theme">
                                                   
                                                   @foreach ($valueNewArrivalProductData['product_image'] as $keyProductImage => $valueProductImage)
                                                   <div class="product-item">
                                                      <img style="width: 400px;height: 400px;" class="product-single-image 1" src="{{ asset('assets/upload_images/product') }}/{{$valueProductImage['product_image']}}" data-zoom-image="{{$valueProductImage['product_image']}}"/>
                                                   </div>
                                                   @endforeach
                                                   <!-- <div class="product-item">
                                                      <img class="product-single-image" src="assets/images/products/zoom/product-2.jpg" data-zoom-image="assets/images/products/zoom/product-2-big.jpg"/>
                                                      </div>
                                                      <div class="product-item">
                                                      <img class="product-single-image" src="assets/images/products/zoom/product-3.jpg" data-zoom-image="assets/images/products/zoom/product-3-big.jpg"/>
                                                      </div>
                                                      <div class="product-item">
                                                      <img class="product-single-image" src="assets/images/products/zoom/product-4.jpg" data-zoom-image="assets/images/products/zoom/product-4-big.jpg"/>
                                                      </div> -->
                                                </div>
                                                <!-- End .product-single-carousel -->
                                             </div>
                                             <div class="prod-thumbnail row owl-dots" id='carousel-custom-dots'>
                                                <!-- <div class="col-3 owl-dot">
                                                   <img src="assets/images/products/zoom/product-1.jpg"/>
                                                   </div>
                                                   <div class="col-3 owl-dot">
                                                   <img src="assets/images/products/zoom/product-2.jpg"/>
                                                   </div>
                                                   <div class="col-3 owl-dot">
                                                   <img src="assets/images/products/zoom/product-3.jpg"/>
                                                   </div>
                                                   <div class="col-3 owl-dot">
                                                   <img src="assets/images/products/zoom/product-4.jpg"/>
                                                   </div> -->
                                                @foreach($valueNewArrivalProductData['product_image'] as $keyProductImage => $valueProductImage)
                                                <div class="col-3 owl-dot">
                                                   <img style="width: 88px;height: 88px;" class="product-single-image" src="{{ asset('assets/upload_images/product') }}/{{$valueProductImage['product_image']}}"/>
                                                </div>
                                                @endforeach
                                             </div>
                                          </div>
                                          <!-- End .col-lg-7 -->
                                          <div class="col-lg-6 col-md-6">
                                             <div class="product-single-details">
                                                <h1 class="product-title">{{$valueNewArrivalProductData['name']}}</h1>
                                                <!-- <div class="ratings-container">
                                                   <div class="product-ratings">
                                                      @foreach ($valueNewArrivalProductData['review'] as $keyReviewData => $valueReviewData)
                                                      <span class="ratings width-{{$valueReviewData['rating']}}percent"></span> 
                                                      <span class="tooltiptext tooltip-top"></span>
                                                      <a href="#" class="rating-link">({{$valueReviewData['rating']}} Reviews )</a>
                                                      @endforeach
                                                   </div> 
                                                </div> -->
                                                <!-- End .product-container -->
                                                <!-- <div class="ratings-container">
                                                   <div class="product-ratings">
                                                       <span class="ratings" style="width:60%"></span>
                                                   </div>
                                                   
                                                   <a href="#" class="rating-link">( 6 Reviews )</a>
                                                   </div> --><!-- End .product-container -->
                                                <div class="price-box">
                                                   <span class="old-price mrp">₹{{$valueNewArrivalProductData['mrp']}}</span>
                                                   <span class="product-prices price" id="new_price_{{$valueNewArrivalProductData['id']}}">
                                                   <span class="product-prices price" id="price-{{$valueNewArrivalProductData['id']}}">₹{{$valueNewArrivalProductData['price']}}</span>
                                                   </span>
                                                </div>
                                                <!-- End .price-box -->
                                                <div class="product-desc">
                                                   <p>{{$valueNewArrivalProductData['short_description']}}</p>
                                                </div>
                                                <!-- End .product-desc -->

                                                <div class="product-filters-container">
                                                    <div class="product-single-filter">
                                                    <label>Size:</label>
                                                    <div class="new_arrival_pop_size_filter" id="new_arrival_pop_size_filter" style="height: 29px;">
                                                      @php $size_data = App\Product::getSizeFromProductId($valueNewArrivalProductData['id']); @endphp
                                                        @foreach ($size_data as $keySizeData => $valueSizeData)
                                                          <label class="container">
                                                            <p style="text-align: center;">{{$valueSizeData->name}}</p>
                                                            <input type="radio" name="type" value="{{$valueSizeData->id}}" style="opacity: 0;">
                                                            <span class="checkmark"></span>
                                                          </label>
                                                        @endforeach
                                                    </div>
                                                    </div>
                                                </div>
                                                       

                                                    <style type="text/css">
                                                     .new_arrival_pop_size_filter label.container {
                                                        width: 34px;
                                                        position: relative;
                                                        height: 2.6rem;
                                                        transition: all .3s;
                                                        border: 1px solid #e9e9e9;
                                                        background-color: #fff;
                                                        color: #7a7d82;
                                                        margin-left: 0px;
                                                        padding-left: 7px;
                                                        color: black;
                                                    }


                                                    /* Create a custom checkbox */
                                                    .new_arrival_pop_size_filter .checkmark {
                                                      position: absolute;
                                                      top: 0;
                                                      left: 0;
                                                      height: 25px;
                                                      width: 25px;
                                                     /* background-color: #eee;*/
                                                    }

                                                    /* On mouse-over, add a grey background color */
                                                    .new_arrival_pop_size_filter .container:hover input ~ .checkmark {
                                                     /* background-color: #ccc;*/
                                                    }

                                                    /* When the checkbox is checked, add a blue background */
                                                    .new_arrival_pop_size_filter .container input:checked ~ .checkmark {
                                                     /* background-color: #2196F3;*/
                                                    }

                                                    /* Create the checkmark/indicator (hidden when not checked) */
                                                    .new_arrival_pop_size_filter .checkmark:after {
                                                      content: "";
                                                      position: absolute;
                                                      display: none;
                                                    }

                                                    /* Show the checkmark when checked */
                                                    .new_arrival_pop_size_filter .container input:checked ~ .checkmark:after {
                                                      display: block;
                                                    }

                                                    /* Style the checkmark/indicator */
                                                    .new_arrival_pop_size_filter .container .checkmark:after {
                                                        /* left: 23px; */
                                                        /* top: 5px; */
                                                        width: 39px;
                                                        height: 24px;
                                                        background: #1d70ba;
                                                        /* border-width: 0 3px 3px 0; */
                                                        /* -webkit-transform: rotate(45deg); */
                                                        -ms-transform: rotate(45deg);
                                                        /* transform: rotate(45deg); */
                                                        opacity: 0.5;
                                                        /* color: white; */
                                                    }
                                                    .new_arrival_pop_size_filter label.container input[type="checkbox"] {
                                                        opacity: 0;
                                                    }
                                                    </style>





                                                <div class="product-filters-container">
                                                   <div class="product-single-filter" data-product-id="">
                                                      <label>Colors:</label>
                                                      <div class="product_pop_color_filter" id="product_pop_color_filter">
                                                          @php 
                                                          $colorsDataRaw =  App\Colors::getColorFromSKU($valueNewArrivalProductData['sku']) ;
                                                          @endphp   

                                                         @foreach ($colorsDataRaw as $keyColorsData => $valueColorsData)
                                                         <label class="container">
                                                         <input type="radio" name="type" onchange="colorPicker(this.value);" 

                                                           value="{{$valueColorsData->id}}" id="color_{{$valueColorsData->id}}"
                                                           data-product-color="{{$valueColorsData->id}}"
                                                           data-product-id="{{$valueNewArrivalProductData['id']}}"
                                                           data-product-sku="{{$valueNewArrivalProductData['sku']}}"

                                                           >
                                                         <span class="checkmark"
                                                         @if($valueColorsData['id'] == $valueNewArrivalProductData['color_id'])
                                                          class="checked" 
                                                          @endif
                                                          style="background-color: {{$valueColorsData->hex_code}};"></span>
                                                         </label>
                                                         @endforeach
                                                      </div>
                                                     <!-- <script type="text/javascript">
                                                        $('#color_radion_button').on('change', function () {
                                                               alert("hi");
                                                             
                                                            });
                                                     </script> -->
                                                      <style>
                                                         /* Hide the browser's default checkbox */
                                                         .product_pop_color_filter .container input {
                                                         position: absolute;
                                                         opacity: 0;
                                                         cursor: pointer;
                                                         height: 0;
                                                         width: 0;
                                                         }
                                                         /* Create a custom checkbox */
                                                         .product_pop_color_filter .checkmark {
                                                         border: 1px solid black !important;
                                                         position: absolute;
                                                         top: 0;
                                                         left: 0;
                                                         height: 25px;
                                                         width: 25px;
                                                         /*background-color: #eee;*/
                                                         }
                                                         /* On mouse-over, add a grey background color */
                                                         .product_pop_color_filter .container:hover input ~ .checkmark {
                                                         background-color: #ccc;
                                                         border: 1px solid black !important;
                                                         }
                                                         /* When the checkbox is checked, add a blue background */
                                                         .product_pop_color_filter .container input:checked ~ .checkmark {
                                                         /*background-color: #2196F3;*/
                                                         border: 1px solid red !important;
                                                         }
                                                         /* Create the checkmark/indicator (hidden when not checked) */
                                                         .product_pop_color_filter .checkmark:after {
                                                         content: "";
                                                         position: absolute;
                                                         display: none;
                                                         }
                                                         /* Show the checkmark when checked */
                                                         .product_pop_color_filter .container input:checked ~ .checkmark:after {
                                                         display: block;
                                                         }
                                                         .product_pop_color_filter label.container {
                                                         border: 0px!important;
                                                         }
                                                         /* Style the checkmark/indicator */
                                                         .product_pop_color_filter .container .checkmark:after {
                                                         left: 9px;
                                                         top: 7px;
                                                         width: 7px;
                                                         height: 12px;
                                                         border: solid white;
                                                         border-width: 0 3px 3px 0;
                                                         -webkit-transform: rotate(45deg);
                                                         -ms-transform: rotate(45deg);
                                                         transform: rotate(40deg);
                                                         background: transparent;
                                                         }
                                                         .product-single-details .container {
                                                         display: inline-block;
                                                         -ms-flex-align: center;
                                                         align-items: center;
                                                         }
                                                      </style>
                                                   </div>
                                                   <!-- End .product-single-filter -->
                                                </div>
                                                <!-- End .product-filters-container -->
                                                <div class="product-action">
                                                   <div id="myDiv" style="width: 100%;">
                                                      <div class="quantity-container">
                                                         <!-- <span>1</span>  -->
                                                         <div class="{{$valueNewArrivalProductData['id']}}" id="{{$valueNewArrivalProductData['id']}}" onclick="decreaseValue(this.id)" 
                                                         data-product-id="{{$valueNewArrivalProductData['id']}}"
                                                         data-product-price="{{$valueNewArrivalProductData['price']}}"
                                                         value="quantity-{{$valueNewArrivalProductData['id']}}" style="float: left;width: 100%;height: 100%;border: 1px solid;color: #8798a2;font-size: 11px;line-height: 34px;display: block;width: 45px;height: 43px;border: 1px solid #e1e1e1;border-radius: 3px;color: #ccc;font-size: 46px;text-align: center;cursor: pointer;">-</div>
                                                         <input type="number"   id="quantity-{{$valueNewArrivalProductData['id']}}" name="quantity" value="1" / style="float:left;height: 43px;border: 1px solid #e1e1e1;width: 56px;text-align: center;">
                                                         <div class="{{$valueNewArrivalProductData['id']}}" 
                                                            id="{{$valueNewArrivalProductData['id']}}"  onclick="increaseValue(this.id)" 
                                                         data-product-id="{{$valueNewArrivalProductData['id']}}"
                                                         data-product-qty="{{$valueNewArrivalProductData['product_qty']}}"
                                                         data-product-price="{{$valueNewArrivalProductData['price']}}"
                                                           value="quantity-{{$valueNewArrivalProductData['id']}}"   style="float: left;width: 100%;height: 100%;border: 1px solid;color: #8798a2;font-size: 11px;display: block;width: 45px;height: 43px;border: 1px solid #e1e1e1;border-radius: 3px;color: #ccc;font-size: 25px;line-height: 43px;text-align: center;cursor: pointer;margin-right: 10px;">+</div>  

                                                      <p class="{{$valueNewArrivalProductData['id']}}" style="display: none;">{{$valueNewArrivalProductData['product_qty']}}</p>
                                                      </div>
                                                      <div id="product-price-{{$valueNewArrivalProductData['id']}}">
                                                      </div>
                                                      <script type="text/javascript"> 
                                                          
                                                         function increaseValue(clicked_id) {  
                                                             var product_id = document.getElementById(clicked_id).getAttribute("data-product-id"); 
                                                            
                                                             var product_price =document.getElementById(clicked_id).getAttribute("data-product-price");
                                                             var prodid = document.getElementById(clicked_id).getAttribute("value");    
                                                            
                                                             var value = parseInt(document.getElementById(prodid).value, 10);
                                                               value = isNaN(value) ? 0 : value;

                                                                var available_qty =  $('p.'+clicked_id).text(); 
                                                               if(value == available_qty ){
                                                                return false; 
                                                               } 
                                                               if(!available_qty){
                                                                 if(value == 10 ){
                                                                    return false; 
                                                                  }
                                                               }

                                                               value++; 
                                                               document.getElementById(prodid).value = value; 
                                                               price = '₹'+`<span>${product_price * value}</span>`; 
                                                             // alert(price);
                                                               document.getElementById('new_price_'+product_id).innerHTML=price;
                                                         }

                                                         
                                                         function decreaseValue(clicked_id) {
                                                          var product_id = document.getElementById(clicked_id).getAttribute("data-product-id");
                                                             var product_price =document.getElementById(clicked_id).getAttribute("data-product-price");
                                                             var prodid = document.getElementById(clicked_id).getAttribute("value");   
                                                         var value = parseInt(document.getElementById(prodid).value, 10);
                                                         value = isNaN(value) ? 0 : value;
                                                         value < 1 ? value = 1 : '';
                                                         value--; 
                                                         document.getElementById(prodid).value = value; 
                                                         price = '₹'+`<span>${product_price * value}</span>`;
                                                         
                                                         //alert(price);
                                                         
                                                               document.getElementById('new_price_'+product_id).innerHTML=price;
                                                             //alert(new_price);
                                                         }
                                                      </script>
                                                      <a href="cart.html" class="paction add-cart" title="Add to Cart">
                                                      <span>Add to Cart</span>
                                                      </a>
                                                      <a href="#" style="padding-bottom: 6px;padding-top: 10px;" class="paction add-wishlist" title="Add to Wishlist">
                                                      <span>Add to Wishlist</span>
                                                      </a>
                                                   </div>
                                                   <!-- End .product-action -->
                                                   <!--<div class="product-single-share">
                                                      <label>Share:</label> -->
                                                   <!-- www.addthis.com share plugin-->
                                                   <!--  <div class="addthis_inline_share_toolbox"></div> -->
                                                   <!-- </div> --><!-- End .product single-share -->
                                                </div>
                                                <!-- End .product-single-details -->
                                             </div>
                                             <!-- End .col-lg-5 -->
                                          </div>
                                          <!-- End .row -->
                                            </div>
                                        </div>
                                       <!-- End .product-single-container -->
                                    </div>
                                 </div>
                              </div>
                                </div>
                              <!-- Porduct detail pop end  -->
                           </div>
                        </figure>
                        <div class="product-details" >
                           <p style="margin-bottom: 0!important">
                        <h2 class="product-title" style="margin-bottom: -9px !important;">
                        <a href="{{route('productDetail',$valueNewArrivalProductData['id'])}}" style="white-space: inherit;">{{$valueNewArrivalProductData['name']}}</a>
                        </h2>
                        </p>
                        <div class="ratings-container"> 
                        <!-- <div class="product-ratings">
                        @foreach ($valueNewArrivalProductData['review'] as $keyReviewData => $valueReviewData)
                        <span class="ratings width-{{$valueReviewData['rating']}}percent"></span> 
                        <span class="tooltiptext tooltip-top"></span>
                        @endforeach
                        </div> --><!-- End .product-ratings -->
                        </div><!-- End .product-container -->
                        
                        <div class="price-box">
                        <span class="product-price mrp">₹{{$valueNewArrivalProductData['mrp']}}</span>
                        <span class="product-prices price">₹{{$valueNewArrivalProductData['price']}}</span>
                        </div><!-- End .price-box -->
                        <div class="product-action">
                        <a href="#" class="btn-icon-wish"><i class="icon-heart"></i></a>
                        <button class="btn-icon btn-add-cart" data-toggle="modal" data-target="#addCartModal"><i class="icon-bag"></i>ADD TO CART</button>
                        <!-- <a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View"><i class="fas fa-external-link-alt"></i></a>  -->
                        </div>
                        </div><!-- End .product-details -->
                        </div>
                     </div>
                     @endforeach
                  </div>
               </div>
               <nav class="toolbox toolbox-pagination">
                  <!-- <div class="toolbox-item toolbox-show">
                     <label>Showing 1–9 of 60 results</label>
                  </div> -->
                  <!-- End .toolbox-item -->
                  <ul class="pagination">
                     <li class="page-item disabled">
                        <a class="page-link page-link-btn" href="#"><i class="icon-angle-left"></i></a>
                     </li>
                     <li class="page-item active">
                        <!-- <a class="page-link" href="#">1 <span class="sr-only">(current)</span></a> -->
                        {{ $newArrivalProductData->links() }}
                        
                     </li>
                     <!--  <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">4</a></li>
                        <li class="page-item"><span>...</span></li>
                        <li class="page-item"><a class="page-link" href="#">15</a></li>
                        <li class="page-item">
                            <a class="page-link page-link-btn" href="#"><i class="icon-angle-right"></i></a>
                        </li> -->
                  </ul>
               </nav>
            </div>
            <!-- End .col-lg-9 -->
            @include('layouts.left_sidebar')
         </div>
         <!-- End .row -->
      </div>
      <!-- End .container-box -->
   </div>
   <!-- End .container -->
</main>
<!-- End .main -->
<script type="text/javascript">
   $(document).ready(function() {
       $("#sorting_filter").change(function(){
           var sorting_filter = $('#sorting_filter option:selected').val();
           $.ajax({
            type: "get",
            url: "{{ url('/price-filter') }}",
            cache: !1,
            data: { 
               sorting_filter: sorting_filter,
               _token: "{{ csrf_token() }}",
            },
          
          success: function(data){
             $('#filter_div').html(data);
          } 
       }); 
        return false;
             
       })
   });
</script>
 <script type="text/javascript">
   var product_pop_color_filter = [];
   var new_pop_size_filter = [];

   // $('#new_arrival_pop_size_filter').change(function() {
   //  {
   //    $('#new_arrival_pop_size_filter :checked').each(function() {
   //       //var new_pop_size_filter =   $(this).val();
   //        new_pop_size_filter.push($(this).val());
   //    });
      
    
   //      $.ajax({
   //           type: "get",
   //           url: "{{ url('/new-arrival-pop-filter') }}",
   //           cache: !1,
   //           data: { 
   //              new_pop_size_filter: new_pop_size_filter,
   //              product_pop_color_filter:product_pop_color_filter,
   //              _token: "{{ csrf_token() }}",
   //           },
   //           success: function(data){
   //              $('.product_pop_color_filter_div').html(data);
   //           } 
   //        });
   //  }
   //  return false;
   // });
   

   $('#product_pop_color_filter').change(function() {
    {
      $('#product_pop_color_filter :checked').each(function() {
         product_pop_color_filter.push($(this).val());
      });

     alert(product_pop_color_filter);
      //console.log(size_filter);
        $.ajax({
             type: "get",
             url: "{{ url('/new-arrival-pop-filter') }}",
             cache: !1,
             data: { 
                new_pop_size_filter: new_pop_size_filter,
                product_pop_color_filter: product_pop_color_filter,
                _token: "{{ csrf_token() }}",
             },
             success: function(data){
                $('.product_pop_color_filter_div').html(data);
             } 
          });
    }
    return false;
   });


       function colorPicker (value)
         {
            
            var sku = document.getElementById('color_'+value).getAttribute("data-product-sku");
            var product_color = document.getElementById('color_'+value).getAttribute("data-product-color");
            var product_id = document.getElementById('color_'+value).getAttribute("data-product-id");
            var pdata = {'color_id':product_color , 'sku':sku};
            $.ajax({
                 url : '{{url('/color-filter')}}',
                 type: 'POST',
                 data: pdata,
                 success: function(response) {
                  
                  
                  $('#myModal_new_arrival_detail_'+product_id).html(response);

                  },
                  error: function(err) {
                  //called when there is an error
                  //alert(err.message+"test");
                }
              });
            
         }
   
</script>
@endsection
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
   visibility: hidden;
   opacity: 0;
   height: unset;
   padding: 1.4rem;
   background-color: #1d70ba;
   color: white!important;
   transform: none;
   margin: 0;
   border: none;
   transition: all .3s ease-out;
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



</style>