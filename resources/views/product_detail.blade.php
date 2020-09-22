@extends('new_resources.layouts.new_app') 
@section('content')


<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
<script src='https://icodefy.com/Tools/iZoom/js/Vendor/jquery/jquery-ui.min.js'></script>
<script src='https://icodefy.com/Tools/iZoom/js/Vendor/ui-carousel/ui-carousel.js'></script>
<script src='https://codepen.io/ranz/pen/rEaJNW.js'></script>
<script src='https://codepen.io/ranz/pen/KjwyjG.js'></script>  
<script src="{{ asset('assets/js/product_detail_script.js') }}"></script>

<style type="text/css">
li.popup-size.disabled a.size {
    background: #e1e1e1 url(../assets/images/icons/cross.png) no-repeat center top!important;
    background-size: 100% 100%;
}
.featured-section {
    padding-top: 0!important;
    }
    .product-single-tabs {
    margin-bottom: 2.5rem!important;
}
.product-single-filter .config-size-list li a {
    min-width: 5rem!important;
    height: 37px;
    line-height: 2.4;
}
    .config-swatch-list li a {
    width: 3.2rem!important;
    height: 3.2rem!important;
  }
.product-detail label {
    font-weight: 700 !important;
    font-size: 19px!important;
}
@media only screen and (max-width : 992px) {
  .sticky-wrapper {
    display: none!important;
}
  }
@media only screen and (max-width : 500px) {
    .prod-thumbnail img {
         width: 58px !important; 
    }
}
.
.product-single-details p {
     font-size: 13px !important; 
}
.product-single-filter+.product-single-filter {
    margin-top: 0;
    /* margin-bottom: 0; */
    padding-bottom: 10px;
}
.product-single-filter {
    padding-bottom: 25px!important;
}
.product-single-details .product-action {
    padding-top: 10px;
    }
.product-single-details .product-desc {
    padding-bottom: 5px!important;
}
.product-single-details {
    font-family: unset!important;
    font-family: Lato,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji !important;
}
.product-single-filter label {
    /*font: unset!important;*/
    letter-spacing: .005em;
    font-family: Lato,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji !important;
}
/*.product-desc-content ul, .product-desc-content ol {
    padding-left: 0!important;
}*/
.product-single-tabs .tab-pane {
    padding-top: 0!important;
}
.prod-thumbnail img {
    height: 120px !important;
    width: 90px ;
}
.prod-thumbnail>div{
  padding: 0!important;
}
.owl-dot img {
    /*width: 90px!important;*/
    margin-bottom: 10px!important;
}
.product-single-gallery .product-item {
    position: relative;
    margin-bottom: .4rem;
    /*width: 80.64%!important;
    float: right!important;*/
}
.prod-thumbnail {
    display: contents!important;
   /* float: left!important;
    width: 14.5%!important;*/
}
.owl-carousel .owl-item img {
    min-width: -webkit-fill-available!important;
    height: auto!important;
}




 /* .menu>li>a {
    padding-left: 0!important;
  }*/
  .product-details-page .container-box {
    padding: 0!important;
    padding-top: 10px!important;
}
.product-default.inner-quickview.inner-icon:hover {
background: transparent!important;
}
.owl-dot img {
    display: block;
    /*height: 120px;*/
}
li.breadcrumb-item.active {
margin-top: -2px!important;
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
    span.ratings.width-1percent {
   width: 8%;
   }
   span.ratings.width-2percent {
   width: 17%;
   }
   span.ratings.width-3percent {
   width: 25%;
   }
    span.ratings.width-4percent {
   width: 33%;
   }
   span.ratings.width-5percent {
   width: 50%;
   }

   button.accordion {
    padding-left: 0!important;
}
.accordion {
  /*background-color: #eee;*/
  color: #444;
  cursor: pointer;
  padding: 18px;
  width: 100%;
  border: none;
  text-align: left;
  outline: none;
  font-size: 15px;
  transition: 0.4s;
}

.active, .accordion:hover {
  /*background-color: #ccc;*/
}

.accordion:after {
  content: '\002B';
  color: #777;
  font-weight: bold;
  float: right;
  margin-left: 5px;
}

button.accordion.active:after {
  content: "\2212"!important;
}

.panel {
  padding: 0 18px;
  background-color: white;
  max-height: 0;
  overflow: hidden;
  transition: max-height 0.2s ease-out;
}
button.accordion {
    background: transparent;
    border-top: 1px solid #eee;
    /*border-bottom: 1px solid #eee;*/
}
button:focus {
    /* outline: 1px dotted; */
    outline: 0!important;
}
button.accordion.active {
    border-bottom: 0;
}
.panel {
    /* border-top: 0; */
    border-bottom: 1px solid #eee;
    }

.disabled{
    pointer-events:none;
    opacity:0.7;
}
.qtybtn{
  float: left;
  width: 100%;
  height: 100%;
  border: 1px solid;
  color: #8798a2;
  line-height: 34px;
  display: block;
  width: 45px;
  height: 43px;
  border: 1px solid #e1e1e1;
  border-radius: 3px;
  color: #ccc;
  font-size: 46px;
  text-align: center;
  cursor: pointer;
}
</style>
 <main class="main container product-detail">
           <nav aria-label="breadcrumb" class="breadcrumb-nav">
		      <div class="" >
		         <ol class="breadcrumb mt-0" style="padding-left: 0;padding-right: 0px;background: transparent;">
		            <li class="breadcrumb-item"><a href="{{route('home_1')}}">Home</a></li>
		            <li class="breadcrumb-item"><a href="{{route('newArrival')}}"> New Arrival</a></li>
                <li class="breadcrumb-item" aria-current="page" style="padding-top: 0px;"><a href=""> 
                
				{{$productDetail->name}}
                </a></li>
               
		         </ol>
		      </div>
		     
		   </nav>
            <div class="product-details-page">
                <div class="container-box">
                  <div id="product_detail_filter_div">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="product-single-container product-single-default">
                                <div class="row">
                                    <div class="col-lg-7 col-md-7  col-xs-12">
                                           <!--Product detail gallery section start--->
                                               <!-- partial:index.partial.html -->
                                                <div class="pdp-image-gallery-block">
                                                    <!-- Gallery -->
                                                    <div class="gallery_pdp_container" style="width: 15%;">
                                                      <div id="gallery_pdp">
                                                         @foreach($productDetail->product_image as $keyProductImage => $valueProductImage)
                                                             <a href="#" data-image="{{ asset('assets/upload_images/product') }}/{{$valueProductImage['product_image']}}" data-zoom-image="{{ asset('assets/upload_images/product') }}/{{$valueProductImage['product_image']}}">
                                                          <img id="" src="{{ asset('assets/upload_images/product') }}/{{$valueProductImage['product_image']}}" width="100px" height="100px" />
                                                        </a>
                                                         @endforeach
                                                       
                                                      </div>
                                                      <!-- Up and down button for vertical carousel -->
                                                      <a href="#" id="ui-carousel-next" style="display: inline;"></a>
                                                      <a href="#" id="ui-carousel-prev" style="display: inline;"></a>
                                                    </div>
                                                    <!-- Gallery -->

                                                    <!-- gallery Viewer -->
                                                    <div class="gallery-viewer" style="width: 80%;">
                                                  
                                                    @foreach($productDetail->product_image as $keyProductImage => $valueProductImage)
                                                    @if ($loop->first)
                                                       <div class="product-item">

                                                         <img id="zoom_10" src="{{ asset('assets/upload_images/product') }}/{{$valueProductImage['product_image']}}" data-zoom-image="{{ asset('assets/upload_images/product') }}/{{$valueProductImage['product_image']}}"   data-zoom-image="" href="" />
                                                       </div>
                                                       @endif
                                                    @endforeach
                                                     
                                                     
                                                    </div>
                                                  </div>
                                                <!-- partial -->
  
                                            <!--Product detail gallery section end--->
                                    </div><!-- End .col-lg-7 -->

                                    <div class="col-lg-5 col-md-5">
                                        <div class="product-single-details">
                                            <h1 class="product-title">{{$productDetail->name}}</h1>
                                              <div class="price-box" style="margin-bottom: 0px;">
                                                 @if($productDetail->discount != 0 )
                                                   <span class="old-price mrp" style="font-size: 30px!important">₹{{$productDetail->mrp}}</span>
                                                   <span class="product-prices price" id="new_price_{{$productDetail->product_id}}">
                                                   <span class="product-prices price" id="price-{{$productDetail->product_id}}" style="font-size: 30px!important">₹{{$productDetail->price}}</span>
                                                   </span>
                                                   @else 
                                                    <span class="product-prices price" style="font-size: 30px!important">₹{{$productDetail->mrp}}</span> 
                                                    @endif
                                                </div>
                                            <div class="product-desc">
                                                <p style="line-break: anywhere;font-size: 16px;">{{$productDetail->short_description}}</p>
                                            </div><!-- End .product-desc -->
                                                   <div class="product-single-filter colors-fiter">
                                                      <label>Colors:</label>
                                                      <ul class="config-swatch-list popup-color">
                                                        <li class="popup-color active">
                                                            <a href="#" style="background-color: {{$productDetail->hex_code}};"></a>
                                                        </li> 
                                                        @foreach($productDetail->product_color as $product_colors)
                                                         <li class="popup-color">
                                                            <a href="{{route('productDetail','')}}/{{$product_colors->product_id}}" style="background-color: {{$product_colors->hex_code}};"></a>
                                                         </li> 
                                                         @endforeach
                                                      </ul>
                                                   </div>
                                                   <!-- End .product-single-filter -->
                                                
                                                
                                          <div class="product-single-filter">
                                            <!--  <label>Size:</label> -->
                                             <ul class="config-size-list popup-size">

                                              @php
                                               $active  = 1;
                                               $default_size_qty = 0;
                                              @endphp
											 
                                                @foreach ($sizeData as $keySizeData => $valueSizeData)
                                                @if(in_array($valueSizeData->id, $product_size))
                                                  <li class="popup-size
                                                 
                                          @if($product_size_data[$valueSizeData->id] == 0)
                                                  disabled
                                              @endif
                                                   " size_id="{{$valueSizeData->id}}" product_size_qty = "{{$product_size_data[$valueSizeData->id]}}">
                                                    <a href="#sizedetail" class="size {{$active == "0" ? "active" : ""}}" style="background-color: white;">
                                                      {{$valueSizeData->name}}
                                                    </a>
                                                  </li>
                                                  @if($active == "0")
                                                    @php
                                                      $active  = 1;
                                                      $default_size_qty = $product_size_data[$valueSizeData->id];
                                                    @endphp
                                                  @endif
                                                  
                                                @else
                                                  <li class="popup-size 
                                                  disabled" size_id="{{$valueSizeData->id}}">
                                                  <a class="size " style="background-color: gray;" >
                                                    {{$valueSizeData->name}}
                                                  </a>
                                                </li>
                                                @endif
                                                
                                                @endforeach
                                             </ul>
                                          </div>
       @php($productqty = App\ProductSize::select('size_id')->where('qty','!=',0)->where('product_size.product_id',$id)->get())
                                          <!-- End .product-single-filter -->
                                            <div class="brand-cat">
                                              <span class="branding">Brand: {{$productDetail->brand_name}}</span>
                                              <span class="categories">Categories: {{$productDetail->category_name}}</span>
                                            </div>
                                            <div class="product-action">
                                                   <div id="myDiv" style="width: 100%;">
                                                      <div class="quantity-container">
                                                        <div class="qtybtn" onclick="decreaseValue(this.id)" >
                                                          -
                                                        </div>
                                                        <input type="hidden"   id="final_mrp" name="final_mrp" value="{{$productDetail->mrp}}">
                                                        <input type="hidden"   id="final_price" name="final_price" value="{{$productDetail->price}}">
                                                        <input type="number"   id="current_qty" name="current_qty" value="1" / style="float:left;height: 43px;border: 1px solid #e1e1e1;width: 56px;text-align: center;">
                                                        <div class="qtybtn"  onclick="increaseValue(this.id)" style="font-size: 30px;">
                                                          +
                                                        </div>  
                                                        <input type="hidden" id="main_size_id" value="{{$default_size_qty}}">
                                                        
                                                      </div>
                                                      <div id="product-price-{{$productDetail->product_id}}"></div>
                                                      
                                                      @if($user_id == NULL)
                                                        <a href="#" id="login" data-toggle="modal" data-dismiss="modal"  data-target="#login"   class="paction add-wishlist wishlist"><span>Add to Wishlist</span></a>
                                                      @else
                                                        <a href="javascript:void(0)" class="paction wishlist added" data-mid="{{$productDetail->product_id}}" title="Add to Wishlist">
                                                            <i class="icon-heart  wishCustom-{{$productDetail->product_id}} {{ $wishlist != null? $wishlist->product_id == $productDetail->product_id ?'icon-heart-1':'':''}}"></i>
                                                        </a>
                                                      @endif

                                                       @if (count($productqty)==0)
                                                      <button class="paction add-cart cart"  title="Out of stock" style="margin-left: 10px;" disabled="disabled">Out of stock</button>
                                                        <!-- <span>Out of stock</span> -->
                                                        </a>
                                                      @else
                                                        <a href="javascript:void(0)" class="paction add-cart cart" data-mid="{{$productDetail->product_id}}" data-price="{{$productDetail->price}}"  data-mrp="{{$productDetail->mrp}}" title="Add to Cart" style="margin-left: 10px;">
                                                        <span>Add to Cart</span>
                                                        </a>
                                                        @endif
                                                      <input type="hidden" name="user_id" value="{{$user_id}}" id="user_id">
                                                      <input type="hidden" name="wishlist_active" value="{{1}}" id="wishlist_active">


                                                   </div>
                                                   <!-- End .product-action -->
                                                   

<button class="accordion">Size Guide</button>
<div class="panel">
  <p>
    
     <table class="ks-table desktop-view-size-info"  style="width: 100%;">
                              <tbody style="border: 1px solid;">
                                 <tr class="ks-table-row">
                                    <th class="ks-table-cell ks-table-header-cell">SIZE</th>
                                    <th class="ks-table-cell ks-table-header-cell">CHEST (IN.)</th>
                                    <th class="ks-table-cell ks-table-header-cell">WAIST (IN.)</th>
                                    <th class="ks-table-cell ks-table-header-cell">HIPS (IN.)</th>
                                    <th class="ks-table-cell ks-table-header-cell">LENGTH (IN.)</th>
                                    <th class="ks-table-cell ks-table-header-cell">SHOULDER (IN.)</th>
                                 </tr>
                                 @foreach ($sizeInformation as $keySizeInformationData => $valueSizeInformationData)
                                
                                 <tr class="ks-table-row">
                                    <td class="ks-table-cell ks-table-header-cell">
                                       {{$valueSizeInformationData['size_name']}}
                                    </td>
                                    <td class="ks-table-cell">{{$valueSizeInformationData['chest']}}
                                    </td>
                                    <td class="ks-table-cell">{{$valueSizeInformationData['waist']}}
                                    </td>
                                    <td class="ks-table-cell">
                                       {{$valueSizeInformationData['hips']}}
                                    </td>
                                    <td class="ks-table-cell">{{$valueSizeInformationData['length']}}
                                    </td>
                                    <td class="ks-table-cell">{{$valueSizeInformationData['shoulder']}}
                                    </td>
                                 </tr>
                                 @endforeach 
                                 
                              </tbody>
                           </table>
                           @foreach ($sizeInformation as $keySizeInformationData => $valueSizeInformationData)
                          
                           <table class="ks-table mobile-view-size-info" border="1" style="width: 100%;">
                              <tbody style="border: 1px solid;">
                                 <tr class="ks-table-row">
                                    <th class="ks-table-cell ks-table-header-cell">SIZE</th>
                                    <td class="ks-table-cell ks-table-header-cell">
                                       {{$valueSizeInformationData['size_name']}}
                                    </td>
                                 </tr>
                                 <tr class="ks-table-row">
                                    <th class="ks-table-cell ks-table-header-cell">CHEST (IN.)</th>
                                    <td class="ks-table-cell">{{$valueSizeInformationData['chest']}}
                                    </td>
                                 </tr>
                                 <tr class="ks-table-row">
                                    <th class="ks-table-cell ks-table-header-cell">WAIST (IN.)</th>
                                    <td class="ks-table-cell">{{$valueSizeInformationData['waist']}}
                                    </td>
                                 </tr>
                                 <tr class="ks-table-row">
                                    <th class="ks-table-cell ks-table-header-cell">HIPS (IN.)</th>
                                    <td class="ks-table-cell">
                                       {{$valueSizeInformationData['hips']}}
                                    </td>
                                 </tr>
                                 <tr class="ks-table-row">
                                    <th class="ks-table-cell ks-table-header-cell">LENGTH (IN.)</th>
                                    <td class="ks-table-cell">{{$valueSizeInformationData['length']}}
                                    </td>
                                 </tr>
                                 <tr class="ks-table-row">
                                    <th class="ks-table-cell ks-table-header-cell">SHOULDER (IN.)</th>
                                    <td class="ks-table-cell">{{$valueSizeInformationData['shoulder']}}
                                    </td>
                                 </tr>
                              </tbody>
                           </table>
                          @endforeach
                         
  </p>
</div>

<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight) {
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    } 
  });
}
</script>


                                              

                                           
                                        </div><!-- End .product-single-details -->
                                    </div><!-- End .col-lg-5 -->
                                </div><!-- End .row -->

                            </div><!-- End .product-single-container -->

                            <div class="product-single-tabs">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="product-tab-desc" data-toggle="tab" href="#product-desc-content" role="tab" aria-controls="product-desc-content" aria-selected="true">Description</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="product-desc-content" role="tabpanel" aria-labelledby="product-tab-desc">
                                        <div class="product-desc-content">
                                            <!-- <p style="width: 100;float: left;"> --><?php echo $productDetail->description ?><!-- </p> -->
                                           
                                        </div><!-- End .product-desc-content -->
                                    </div><!-- End .tab-pane -->

                                    

                                    <div class="tab-pane fade" id="product-reviews-content" role="tabpanel" aria-labelledby="product-tab-reviews">
                                        <div class="product-reviews-content">
                                            <div class="collateral-box">
                                                <ul>
                                                    <li>Be the first to review this product</li>
                                                </ul>
                                            </div><!-- End .collateral-box -->

                                            <div class="add-product-review">
                                                <h3 class="text-uppercase heading-text-color font-weight-semibold">WRITE YOUR OWN REVIEW</h3>
                                                <p>How do you rate this product? *</p>

                                                <form action="#">
                                                    <table class="ratings-table">
                                                        <thead>
                                                            <tr>
                                                                <th>&nbsp;</th>
                                                                <th>1 star</th>
                                                                <th>2 stars</th>
                                                                <th>3 stars</th>
                                                                <th>4 stars</th>
                                                                <th>5 stars</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>Quality</td>
                                                                <td>
                                                                    <input type="radio" name="ratings[1]" id="Quality_1" value="1" class="radio">
                                                                </td>
                                                                <td>
                                                                    <input type="radio" name="ratings[1]" id="Quality_2" value="2" class="radio">
                                                                </td>
                                                                <td>
                                                                    <input type="radio" name="ratings[1]" id="Quality_3" value="3" class="radio">
                                                                </td>
                                                                <td>
                                                                    <input type="radio" name="ratings[1]" id="Quality_4" value="4" class="radio">
                                                                </td>
                                                                <td>
                                                                    <input type="radio" name="ratings[1]" id="Quality_5" value="5" class="radio">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Value</td>
                                                                <td>
                                                                    <input type="radio" name="value[1]" id="Value_1" value="1" class="radio">
                                                                </td>
                                                                <td>
                                                                    <input type="radio" name="value[1]" id="Value_2" value="2" class="radio">
                                                                </td>
                                                                <td>
                                                                    <input type="radio" name="value[1]" id="Value_3" value="3" class="radio">
                                                                </td>
                                                                <td>
                                                                    <input type="radio" name="value[1]" id="Value_4" value="4" class="radio">
                                                                </td>
                                                                <td>
                                                                    <input type="radio" name="value[1]" id="Value_5" value="5" class="radio">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Price</td>
                                                                <td>
                                                                    <input type="radio" name="price[1]" id="Price_1" value="1" class="radio">
                                                                </td>
                                                                <td>
                                                                    <input type="radio" name="price[1]" id="Price_2" value="2" class="radio">
                                                                </td>
                                                                <td>
                                                                    <input type="radio" name="price[1]" id="Price_3" value="3" class="radio">
                                                                </td>
                                                                <td>
                                                                    <input type="radio" name="price[1]" id="Price_4" value="4" class="radio">
                                                                </td>
                                                                <td>
                                                                    <input type="radio" name="price[1]" id="Price_5" value="5" class="radio">
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>

                                                    <div class="form-group">
                                                        <label>Nickname <span class="required">*</span></label>
                                                        <input type="text" class="form-control form-control-sm" required>
                                                    </div><!-- End .form-group -->
                                                    <div class="form-group">
                                                        <label>Summary of Your Review <span class="required">*</span></label>
                                                        <input type="text" class="form-control form-control-sm" required>
                                                    </div><!-- End .form-group -->
                                                    <div class="form-group mb-2">
                                                        <label>Review <span class="required">*</span></label>
                                                        <textarea cols="5" rows="6" class="form-control form-control-sm"></textarea>
                                                    </div><!-- End .form-group -->

                                                    <input type="submit" class="btn btn-primary" value="Submit Review">
                                                </form>
                                            </div><!-- End .add-product-review -->
                                        </div><!-- End .product-reviews-content -->
                                    </div><!-- End .tab-pane -->
                                </div><!-- End .tab-content -->
                            </div><!-- End .product-single-tabs -->
                        </div><!-- End .col-lg-9 -->

                       <!--  <div class="sidebar-overlay"></div>
                        <div class="sidebar-toggle"><i class="icon-sliders"></i></div>
                         -->
                    </div><!-- End .row -->
                  </div>
                   @if(count($reletedProduct))
                      <!-- Start Related product -->
                    <div class="featured-section bg-white">
                        <h2 class="carousel-title">Related Products</h2>
                       
                        <div class="featured-products owl-carousel owl-theme owl-dots-top">

                           @foreach ($reletedProduct as $keyReletedProduct => $valueReletedProduct)

                            <div class="product-default inner-quickview inner-icon">
                                <figure style="height: 400px;">
                                    <a href="{{route('productDetail',$valueReletedProduct['id'])}}">
                                        <img style="height: -webkit-fill-available!important;width: auto!important;"  src="{{ asset('assets/upload_images/product') }}/{{$valueReletedProduct['image']}}">
                                    </a>
                                   <!--  <a  data-toggle="modal" data-target="#myModal_product_detail" class="btn-quickviewss" title="Quick View">Quick View</a>  -->
                                </figure>
                                <div class="product-details">
  
                                    <h2 class="product-title" style="margin-bottom: 7px!important;">
                                        <a href="{{route('productDetail',$valueReletedProduct['id'])}}">{{$valueReletedProduct['name']}}</a>
                                    </h2>
                                  
                                    <div class="price-box" style="margin-bottom: 7px!important;">
                                         <span class="old-price mrp">₹{{$valueReletedProduct['mrp']}}</span>
                                         <span class="product-prices price" style="font-weight: 400!important;">₹{{$valueReletedProduct['price']}}</span>
                                         </span>
                                      </div>
                                     <div class="product-action">
            @if($user_id == NULL)          
              <a href="#" id="login" data-toggle="modal" data-dismiss="modal"  data-target="#login"   class="btn-icon-wish"><i class="icon-heart"></i></a>
            @else
             @if (Auth::check())
                @php($wishlist = App\Wishlist::where('user_id',auth()->user()->id)->where('product_id',$valueReletedProduct['id'])->first())
             
                <a href="javascript:void(0)" class="btn-icon-wish wishlist added" data-mid="{{$valueReletedProduct->id}}"><i class="{{$wishlist != null ?'icon-heart-1':'icon-heart'}} wishCustom-{{$valueReletedProduct->id}}"></i></a>                             
                @else
                 <a href="javascript:void(0)" class="btn-icon-wish wishlist added" data-mid="{{$valueReletedProduct->id}}"><i class="icon-heart  wishCustom-{{$valueReletedProduct->id}}"></i></a>
            @endif      
         
        @endif
                  
                                    @if(count($productqty) != 0)
    @php($product_size = App\ProductSize::select('size_id')->where('product_size.product_id',$valueReletedProduct->id)->pluck('size_id')->first())
     @php($productqty = App\ProductSize::select('size_id')->where('qty','!=',0)->where('product_size.product_id',$valueReletedProduct->id)->get())
     @php($sizeData = App\Sizes::where('id',$product_size)->where('is_deleted',0)->first())
       <button style="text-transform: uppercase!important;font-weight: 300" class="btn-icon btn-add-cart view-details addcart" data-toggle="modal" data-size="{{$sizeData->id}}" data-qty="1" data-mid="{{$valueReletedProduct->id}}" data-mrp="{{$valueReletedProduct['mrp']}}" data-price="{{$valueReletedProduct['price']}}" id="product_{{$valueReletedProduct['id']}}"><i class="icon-bag"></i>ADD To Cart</button>
                                    @else
                                       <a  class="paction add-cart"  title="Out of stock" style="margin-left: 10px;font-weight: 300">
                                          <span>Out of stock</span>
                                          </a>
                                    @endif 
                                      </div>
                                </div><!-- End .product-details -->
                            </div>
                             @endforeach
                        </div>
                       
                    </div>
                    @endif
                    <!-- End Related product section -->

                    


                    
</div><!-- End .container-box -->
</div><!-- End .container -->

        </main><!-- End .main -->
        <style type="text/css">
        .product-default .btn-add-cart:hover ,a.paction.add-cart:hover{
    background-color: #1d70ba;
    border-color: #1d70ba;
    color: white;
}
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


.modal-backdrop {
    position: absolute;
  }
</style>
<script type="text/javascript">
  popup_color =[];
  popup_size = [];
  product_id = [];
  $('li.popup-size a').on('click', function (e) {
    e.preventDefault(); 
    var popup_size_id = $(this).parent().attr('size_id');  
    var product_size_qty = $(this).parent().attr('product_size_qty');  

      $('li.popup-size a').removeClass('active');
      $(this).addClass('active');
      $('#main_size_id').val(product_size_qty);
      $('#current_qty').val(1); 
  }); 



  function increaseValue(clicked_id) {  
      var available_qty =  $('#main_size_id').val(); 
      var current_qty =  $('#current_qty').val();
      var final_mrp =  $('#final_mrp').val();
      var final_price =  $('#final_price').val();   
      if(current_qty == available_qty ){
       
        return false; 
      } 
      if(available_qty == 0 ){
        return false; 
      } 
      
      if(!available_qty){
         if(value == 10 ){
            return false; 
          }
       }

       current_qty++; 
    
    
       $('#current_qty').html(current_qty); 
        $('#current_qty').val(current_qty);

     /* var final_mrp_total = final_mrp * current_qty;
      alert(final_mrp_total);
     var final_price_total = final_price * current_qty;
       $('#final_mrp').val(final_mrp_total);
       $('#final_price').val(final_price_total);*/
  }

  function decreaseValue(clicked_id) {  
      var available_qty =  $('#main_size_id').val(); 
      var current_qty =  $('#current_qty').val(); 
       var final_mrp =  $('#final_mrp').val();
      var final_price =  $('#final_price').val();
      if(current_qty == 1 ){
        return false; 
      } 
      
      current_qty--; 
      
    
    
       $('#current_qty').val(current_qty); 
      $('#current_qty').html(current_qty);
      
     /*  var final_mrp_total = final_mrp * current_qty;
       alert(final_mrp_total);
       var final_price_total = final_price * current_qty;

       $('#final_mrp').val(final_mrp_total);
       $('#final_price').val(final_price_total);*/
  }
</script>
<style type="text/css">
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

</style>
<style type="text/css">
table.ks-table.desktop-view-size-info tr.ks-table-row, td, th {
    border: 1px solid;
    text-align: center;
}

   @media only screen and (max-width: 767px) {
    tr th {
    font-size: 12px;
}
    .panel {
    padding: 0;
}
   table.ks-table.mobile-view-size-info {
   width: 100% !important;
   float: left;
   margin-bottom: 10px;
   }
   table.ks-table.mobile-view-size-info table.ks-table tr.ks-table-row, table.ks-table td {
   border: 1px solid;
   text-align: center;
   width: 368px !important;
   }
   table.ks-table.mobile-view-size-info {
   width: 100% !important;
   /* float: left; */
   margin-bottom: 10px;
   }
   table.ks-table.mobile-view-size-info {
   display: block!important;
   padding: 20px;
   }
   table.ks-table.desktop-view-size-info {
   display: block!important;
   }
   table.ks-table.mobile-view-size-info{
   display: none!important;
   }
   div#myModal_size .modal-dialog {
   max-width: 800px !important;
   }
   div#myModal_size .modal-content {
   width: 100%;
   /* min-width: 329px !important;*/
   padding: 30px;
   }
   }
   div#myModal_size .modal-dialog {
   max-width: 468px !important;
   }
   table.ks-table.mobile-view-size-info{
   display: none;
   }
   table.ks-table.desktop-view-size-info {
   display: block;
   }
   div#myModal_size .modal-content {
   padding: 10px;
   }
   div#myModal_size .modal-content {
   padding: 10px;
   }
   div#myModal_size .modal-header {
   border-bottom: 0!important;
   }
   table.ks-table.desktop-view-size-info {
   border: 0!important;
   }
   /*.modal-open {
   overflow: scroll!important;
   padding-right: 0!important;
   }*/
   body.loaded.modal-open {
   overflow: scroll!important;
   padding-right: 0!important;
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

   .product-single-details .product-single-qty, .product-single-details .paction {
    margin: -3px 1rem 1rem 0 !important;
}
</style>
<div class="alert alert-success postition-fixed toast hidden wishlist-success"><p>Added to Wishlist</p></div>
<script>
  // setTimeout(function(){ 
  //   if($('.toast').hasClass('hidden')){
  //     $('.toast').removeClass('hidden');
  //   } else {
  //     $('.toast').addClass('hidden');
  //   }
  // }, 5000);
</script>
@endsection

<!--  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css"> -->
<link rel='stylesheet' href='https://icodefy.com/Tools/iZoom/js/Vendor/fancybox/helpers/jquery.fancybox-thumbs.css'>
<link rel='stylesheet' href='https://icodefy.com/Tools/iZoom/css/zoom.css'><link rel="stylesheet" href="./product_detail_style.css">

<style type="text/css">
html,body,div,span,applet,object,iframe,h1,h2,h3,h4,h5,h6,p,blockquote,pre,a,abbr,acronym,address,big,cite,code,del,dfn,em,img,ins,kbd,q,s,samp,small,strike,strong,sub,sup,tt,var,b,u,i,center,dl,dt,dd,ol,ul,li,fieldset,form,label,legend,table,caption,tbody,tfoot,thead,tr,th,td,article,aside,canvas,details,embed,figure,figcaption,footer,header,hgroup,menu,nav,output,ruby,section,summary,time,mark,audio,video{margin:0;padding:0;border:0;font-size:100%;font:inherit;vertical-align:baseline}article,aside,details,figcaption,figure,footer,header,hgroup,menu,nav,section{display:block}body{line-height:1}blockquote,q{quotes:none}blockquote:before,blockquote:after,q:before,q:after{content:'';content:none}table{border-collapse:collapse;border-spacing:0}









.inner-icon figure {
    height: 400px!important;
    overflow: hidden;
}
.inner-icon figure img {
    height: -webkit-fill-available;
}
.product-details {
    width: 100%;
    float: left;
}
  .wrapper a img {
    border: 1px solid #000000;
    height: 120!important;
    margin-bottom: 10px!important;
}
div#gallery_pdp img {
    margin-bottom: 5px;
}
.gallery_pdp_container {
    margin-right: 20px;
}
/*div#gallery_pdp{
  height: 386px!important;
}*/
a.paction.add-cart.cart {
    position: relative;
    z-index: 0;
}
.gallery-viewer {
    margin: 0;
    width: 80%;
}

@media only screen and (max-width: 768px){
  .gallery-viewer {
    width: 67% !important;
    float: left;
    height: auto !important;
}
.gallery_pdp_container {
    width: 27%!important;
}
}
</style>
