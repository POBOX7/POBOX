@extends('new_resources.layouts.new_app') 
@section('content')
<style type="text/css">
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
.product-desc-content ul, .product-desc-content ol {
    padding-left: 0!important;
}
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
</style>
 <main class="main container product-detail">
           <nav aria-label="breadcrumb" class="breadcrumb-nav">
		      <div class="" >
		         <ol class="breadcrumb mt-0" style="padding-left: 0;padding-right: 0px;background: transparent;">
		            <li class="breadcrumb-item"><a href="{{route('home_1')}}">Home</a></li>
		            <li class="breadcrumb-item"><a href="{{route('newArrival')}}"> New Arrival</a></li>
                <li class="breadcrumb-item" aria-current="page" style="padding-top: 0px;"><a href=""> 
                  @foreach ($productDetailData as $keyProductDetailData => $valueProductDetailData)
                {{$valueProductDetailData['name']}}
                @endforeach 
                </a></li>
               
		         </ol>
		      </div>
		     
		   </nav>
            <div class="product-details-page">
                <div class="container-box">
                  
                    @foreach ($productDetailData as $keyProductDetailData => $valueProductDetailData)
                    <div id="product_detail_filter_div">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="product-single-container product-single-default">
                                <div class="row">
                                    <div class="col-lg-7 col-md-7  col-xs-12 product-single-gallery">
                                       <div class="col-2 float-left" style="padding-left: 0;padding-right: 0;">
                                        <div class="prod-thumbnail row owl-dots" id='carousel-custom-dots'>
                                           @if($valueProductDetailData['product_image']->isEmpty())
                                                <div class="col owl-dot">
                                                      <img style="width: 90px;"  src="{{ asset('assets/upload_images/product')}}/{{$valueProductDetailData['image']}}"/>
                                                   </div>
                                              @endif
                                            @foreach($valueProductDetailData['product_image'] as $keyProductImage => $valueProductImage)
                                            <div class="col owl-dot">
                                                <img  style="width: 90px;" src="{{ asset('assets/upload_images/product') }}/{{$valueProductImage['product_image']}}"/>
                                            </div>
                                            @endforeach
                                        </div>
                                      </div>
                                      <div class="col-10 float-left" style="
    padding-right: 0!important;
">
                                        <div class="product-slider-container product-item">
                                            <div class="product-single-carousel owl-carousel owl-theme">
                                              @if($valueProductDetailData['product_image']->isEmpty())
                                                 <div class="product-item">
                                                      <img class="product-single-image 1" src="{{ asset('assets/upload_images/product')}}/{{$valueProductDetailData['image']}}"  data-zoom-image="{{ asset('assets/upload_images/product')}}/{{$valueProductDetailData['image']}}">
                                                   </div>
                                              @endif

                                               
                                                @foreach ($valueProductDetailData['product_image'] as $keyProductImage => $valueProductImage)

                                                   <div class="product-item">
                                                      <img  class="product-single-image 1" src="{{ asset('assets/upload_images/product') }}/{{$valueProductImage['product_image']}}" data-zoom-image="{{ asset('assets/upload_images/product') }}/{{$valueProductImage['product_image']}}"/>
                                                   </div>
                                                   @endforeach
                                                   
                                              
                                            </div>
                                            <!-- End .product-single-carousel -->
                                         
                                        </div>
                                      </div>
                                      
                                    </div><!-- End .col-lg-7 -->

                                    <div class="col-lg-5 col-md-5">
                                        <div class="product-single-details">
                                            <h1 class="product-title">{{$valueProductDetailData['name']}}</h1>

                                           <!--  <div class="ratings-container" style="margin-bottom: 7px;">
                                                   <div class="product-ratings">
                                                      @foreach ($valueProductDetailData['review'] as $keyReviewData => $valueReviewData)
                                                      <span class="ratings width-{{$valueReviewData['rating']}}percent"></span> 
                                                    
                                                      <a href="#" class="rating-link">({{$valueReviewData['rating']}} Reviews )</a>
                                                      @endforeach
                                                   </div> 
                                              </div> -->
                                              <style type="text/css">
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
                                              </style>
                                                <!-- End .product-container -->
                                                <!-- <div class="product-sku" style="margin-bottom: 0px;">
                                                  <label style="color: black;font-weight: 600;">Sku :</label>
                                                    <span style="color: gray;font-size: 16px;">{{$valueProductDetailData['sku']}}</span>
                                                </div> -->
                                             <div class="price-box" style="margin-bottom: 0px;">
                                                 @if($valueProductDetailData['discount'] != 0 )
                                                   <span class="old-price mrp" style="font-size: 30px!important">₹{{$valueProductDetailData['mrp']}}</span>
                                                   <span class="product-prices price" id="new_price_{{$valueProductDetailData['id']}}">
                                                   <span class="product-prices price" id="price-{{$valueProductDetailData['id']}}" style="font-size: 30px!important">₹{{$valueProductDetailData['price']}}</span>
                                                   </span>
                                                   @else 
                                                    <span class="product-prices price" style="font-size: 30px!important">₹{{$valueProductDetailData['mrp']}}</span> 
                                                    @endif
                                                </div>
                                            <div class="product-desc">
                                                <p style="line-break: anywhere;font-size: 16px;">{{$valueProductDetailData['short_description']}}</p>
                                            </div><!-- End .product-desc -->
                                             
      

                                                   
                                                   <div class="product-single-filter">
                                                      <label>Colors:</label>
                                                      <ul class="config-swatch-list popup-color">
                                                           @foreach($valueProductDetailData->color as $product_colors)
                                                         <li class="popup-color
                                                          <?php if ($selectedColor[0] == $product_colors->id): ?>
                                                           active
                                                         <?php endif ?>
                                                         " ids="{{$product_colors->id}}" productid="{{$valueProductDetailData['id']}}"><!-- id="{{$product_colors->id}}" -->
                                                            <a href="#color" style="background-color: {{$product_colors->hex_code}};"></a>
                                                         </li> 
                                                         @endforeach
                                                      </ul>
                                                   </div>
                                                   <!-- End .product-single-filter -->
                                                
                                                
                                          <div class="product-single-filter">
                                             <label>Size:</label>
                                             <ul class="config-size-list popup-size">
                                                @php $size_data = App\Product::getSizeFromProductId($valueProductDetailData['id']); @endphp
                                                @foreach ($size_data as $keySizeData => $valueSizeData) 
                                                <li class="popup-size
                                                   " size_id="{{$valueSizeData->id}}" productid="{{$valueProductDetailData['id']}}"><a href="#sizedetail" class="size
                                                    <?php if ($selectedSize[0] == $valueSizeData->id): ?>
                                                     active
                                                   <?php endif ?>
                                                   ">{{$valueSizeData->name}}</a></li>
                                                @endforeach
                                             </ul>
                                          </div>
                                          <!-- End .product-single-filter -->
                                          <div>
                                           <label style="color: black;float: left;padding-right: 5px;">Brand: </label>  <p style="font-size: 17px;
    padding-top: 3px;">{{$brandName->name}}</p>
                                         </div>
                                         <div>
                                           <label style="color: black;float: left;padding-right: 5px;">Categories:</label>  <p style="font-size: 17px;
    padding-top: 3px;">{{$CategoryName->name}}</p>
                                         </div>




                                            <div class="product-action">
                                                   <div id="myDiv" style="width: 100%;">
                                                      <div class="quantity-container">
                                                        
                                                         <div class="{{$valueProductDetailData['id']}}" id="{{$valueProductDetailData['id']}}" onclick="decreaseValue(this.id)" 
                                                         data-product-id="{{$valueProductDetailData['id']}}"
                                                         data-product-price="{{$valueProductDetailData['price']}}"
                                                         value="quantity-{{$valueProductDetailData['id']}}" style="float: left;width: 100%;height: 100%;border: 1px solid;color: #8798a2;font-size: 11px;line-height: 34px;display: block;width: 45px;height: 43px;border: 1px solid #e1e1e1;border-radius: 3px;color: #ccc;font-size: 46px;text-align: center;cursor: pointer;">-</div>
                                                         <input type="number"   id="quantity-{{$valueProductDetailData['id']}}" name="quantity" value="1" / style="float:left;height: 43px;border: 1px solid #e1e1e1;width: 56px;text-align: center;">
                                                         <div class="{{$valueProductDetailData['id']}}" 
                                                            id="{{$valueProductDetailData['id']}}"  onclick="increaseValue(this.id)" 
                                                         data-product-id="{{$valueProductDetailData['id']}}"
                                                         data-product-qty="{{$valueProductDetailData['product_qty']}}"
                                                         data-product-price="{{$valueProductDetailData['price']}}"
                                                           value="quantity-{{$valueProductDetailData['id']}}"   style="float: left;width: 100%;height: 100%;border: 1px solid;color: #8798a2;font-size: 11px;display: block;width: 45px;height: 43px;border: 1px solid #e1e1e1;border-radius: 3px;color: #ccc;font-size: 25px;line-height:38px;text-align: center;cursor: pointer;margin-right: 10px;">+</div>  

                                                      <p class="{{$valueProductDetailData['id']}}" style="display: none;">{{$valueProductDetailData['product_qty']}}</p>
                                                      </div>
                                                      <div id="product-price-{{$valueProductDetailData['id']}}">
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
                                                              // document.getElementById('new_price_'+product_id).innerHTML=price;
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
                                                         
                                                             //  document.getElementById('new_price_'+product_id).innerHTML=price;
                                                             //alert(new_price);
                                                         }
                                                      </script>
                                                      <a href="" class="paction add-cart" title="Add to Cart">
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

<style>
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
</style>

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
                                   <!--  <li class="nav-item">
                                        <a class="nav-link" id="product-tab-tags" data-toggle="tab" href="#product-tags-content" role="tab" aria-controls="product-tags-content" aria-selected="false">Tags</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="product-tab-reviews" data-toggle="tab" href="#product-reviews-content" role="tab" aria-controls="product-reviews-content" aria-selected="false">Reviews</a>
                                    </li> -->
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="product-desc-content" role="tabpanel" aria-labelledby="product-tab-desc">
                                        <div class="product-desc-content">
                                            <p><?php echo $valueProductDetailData['description'] ?></p>
                                           
                                        </div><!-- End .product-desc-content -->
                                    </div><!-- End .tab-pane -->

                                    <div class="tab-pane fade" id="product-tags-content" role="tabpanel" aria-labelledby="product-tab-tags">
                                        <div class="product-tags-content">
                                            <form action="#">
                                                <h4>Add Your Tags:</h4>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-sm" required>
                                                    <input type="submit" class="btn btn-primary" value="Add Tags">
                                                </div><!-- End .form-group -->
                                            </form>
                                            <p class="note">Use spaces to separate tags. Use single quotes (') for phrases.</p>
                                        </div><!-- End .product-tags-content -->
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
                    @endforeach

                    <!-- Start .featured-section -->
                    <div class="featured-section bg-white">
                        <h2 class="carousel-title">Related Products</h2>
                       
                        <div class="featured-products owl-carousel owl-theme owl-dots-top">
                           @foreach ($featuredProduct as $keyFeaturedProduct => $valueFeaturedProduct)
                            <div class="product-default inner-quickview inner-icon">
                                <figure>
                                    <a href="">
                                        <img width="220"  src="{{ asset('assets/upload_images/product') }}/{{$valueFeaturedProduct['image']}}">
                                    </a>
                                   <!--  <a  data-toggle="modal" data-target="#myModal_product_detail" class="btn-quickviewss" title="Quick View">Quick View</a>  -->
                                </figure>
                                <div class="product-details">
                                    <!-- <div class="ratings-container" style="margin-bottom: 5px!important;">
                                                   <div class="product-ratings" style="margin-bottom: 5px!important;">
                                                      @foreach ($valueProductDetailData['review'] as $keyReviewData => $valueReviewData)
                                                      <span class="ratings width-{{$valueReviewData['rating']}}percent"></span> 
                                                    
                                                      <a href="#" class="rating-link">({{$valueReviewData['rating']}} Reviews )</a>
                                                      @endforeach
                                                   </div> 
                                              </div> -->
                                              <style type="text/css">
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
                                              </style>
                                    <h2 class="product-title" style="margin-bottom: 7px!important;">
                                        <a href="">{{$valueFeaturedProduct['name']}}</a>
                                    </h2>
                                  
                                    <div class="price-box" style="margin-bottom: 7px!important;">
                                         <span class="old-price mrp">₹{{$valueProductDetailData['mrp']}}</span>
                                         <span class="product-prices price">₹{{$valueProductDetailData['price']}}</span>
                                         </span>
                                      </div>
                                    <div class="product-action">
                                        <a href="#" class="btn-icon-wish"><i class="icon-heart"></i></a>
                                        <button class="btn-icon btn-add-cart" data-toggle="modal" data-target="#addCartModal"><i class="icon-bag"></i>ADD TO CART</button>
                                       
                                    </div>
                                </div><!-- End .product-details -->
                            </div>
                             @endforeach
                        </div><!-- End .featured-proucts -->
                       
                    </div>
                    <!-- End .featured-section -->


                     <!--  pop design start -->
                                   
                        <div class="modal fade" id="myModal" role="dialog">
                           <div class="product-single-container product-single-default product-quick-view container quickview">
                                 
                              </div>
                          <div class="modal-dialog">
                          
                            <!-- Modal content-->
                            <div class="modal-content">
                              <div class="modal-header">
                                 <button type="button"  class="close" data-dismiss="modal">&times;</button>
                              </div>
                              <div class="modal-body">
                                     <div class="row">
                  <div class="col-lg-6 col-md-6 product-single-gallery">
                      <div class="product-slider-container product-item">
                          <div class="product-single-carousel owl-carousel owl-theme">
                              <div class="product-item">
                                  <img class="product-single-image" src="assets/images/products/zoom/product-1.jpg" data-zoom-image="{{asset('assets/images/products/product-1.jpg')}}"/>
                              </div>
                              <div class="product-item">
                                  <img class="product-single-image" src="{{asset('assets/images/products/product-1.jpg')}}" data-zoom-image="{{asset('assets/images/products/product-1.jpg')}}"/>
                              </div>
                              <div class="product-item">
                                  <img class="product-single-image" src="{{asset('assets/images/products/product-1.jpg')}}" data-zoom-image="{{asset('assets/images/products/product-1.jpg')}}"/>
                              </div>
                              <div class="product-item">
                                  <img class="product-single-image" src="{{asset('assets/images/products/product-1.jpg')}}" data-zoom-image="{{asset('assets/images/products/product-1.jpg')}}"/>
                              </div>
                          </div>
                          <!-- End .product-single-carousel -->
                      </div>
                      <div class="prod-thumbnail row owl-dots" id='carousel-custom-dots'>
                          <div class="col-3 owl-dot">
                              <img src="{{asset('assets/images/products/product-1.jpg')}}"/>
                          </div>
                          <div class="col-3 owl-dot">
                              <img src="{{asset('assets/images/products/product-1.jpg')}}"/>
                          </div>
                          <div class="col-3 owl-dot">
                              <img src="{{asset('assets/images/products/product-1.jpg')}}"/>
                          </div>
                          <div class="col-3 owl-dot">
                              <img src="{{asset('assets/images/products/product-1.jpg')}}"/>
                          </div>
                      </div>
                  </div><!-- End .col-lg-7 -->

                  <div class="col-lg-6 col-md-6">
                      <div class="product-single-details">
                          <h1 class="product-title">{{$valueProductDetailData['name']}}</h1>

                          <!-- <div class="ratings-container">
                              <div class="product-ratings">
                                  <span class="ratings" style="width:60%"></span>
                              </div>

                              <a href="#" class="rating-link">( 6 Reviews )</a>
                          </div> --><!-- End .product-container -->

                          <div class="price-box">
                              <span class="old-price">$81.00</span>
                              <span class="product-price">$101.00</span>
                          </div><!-- End .price-box -->

                          <div class="product-desc" style="padding-bottom: 0;line-break: anywhere;font-size: 16px">
                              <p>{{$valueProductDetailData['short_description']}}</p>
                          </div><!-- End .product-desc -->

                           <div class="product-filters-container">
                                <div class="product-single-filter">
                                <label>Size:</label>
                                <div class="new_arrival_pop_size_filter" id="new_arrival_pop_size_filter" style="height: 29px;">
                                  @php $size_data = App\Product::getSizeFromProductId($valueProductDetailData['id']); @endphp
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

                          <div class="product-action">
                              <div class="product-single-qty">
                                  <input class="horizontal-quantity form-control" type="text">
                              </div><!-- End .product-single-qty -->

                              <a href="" class="paction add-cart" title="Add to Cart">
                                  <span>Add to Cart</span>
                              </a>
                              <a href="#" class="paction add-wishlist" title="Add to Wishlist">
                                  <span>Add to Wishlist</span>
                              </a>
                              <a href="#" class="paction add-compare" title="Add to Compare">
                                  <span>Add to Compare</span>
                              </a>
                          </div><!-- End .product-action -->

                          <div class="product-single-share">
                              <label>Share:</label>
                              <!-- www.addthis.com share plugin-->
                              <div class="addthis_inline_share_toolbox"></div>
                          </div><!-- End .product single-share -->
                      </div><!-- End .product-single-details -->
                  </div><!-- End .col-lg-5 -->
              </div><!-- End .row -->
              </div>
             
            </div>
            
          </div>
        </div>
         <!-- Pop code end -->
</div><!-- End .container-box -->
</div><!-- End .container -->

        </main><!-- End .main -->
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
  var popup_size_product_id = $(this).parent().attr('productid');  
   $('li.popup-size a').removeClass('active');
  $(this).addClass('active');
   if ( $.inArray(popup_size_id, popup_size) > -1 ) { 
        popup_size = $.grep(popup_size, function(value) {
            return value != popup_size_id;
       }); 
   }else{  
      popup_size.push(popup_size_id); 
   }   
   // popup_size.push(size);
   //      if (popup_size.length > 1) {
   //          popup_size.splice(0, 1);
   //      } 
        product_id.push(popup_size_product_id);
        if (product_id.length > 1) {
            product_id.splice(0, 1);
        }  
      $.ajax({
         type: "get",
         url: "{{ url('/product-detail-filter') }}",
         cache: !1,
         data: { 
              popup_size: popup_size, 
             popup_color:popup_color, 
             product_id:product_id,
             _token: "{{ csrf_token() }}",
         },
         success: function(data) {
             $('#product_detail_filter_div').html(data);
         }
     }); 
}); 
  $('li.popup-color a').on('click', function (e) {
  e.preventDefault(); 
  var popup_color_id = $(this).parent().attr('ids'); 
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
         url: "{{ url('/product-detail-filter') }}",
         cache: !1,
         data: { 
              popup_size: popup_size, 
             popup_color:popup_color, 
             product_id:product_id,
             _token: "{{ csrf_token() }}",
         },
         success: function(data) {
             $('#product_detail_filter_div').html(data);
         }
     }); 
}); 
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
   display: none!important;
   }
   table.ks-table.mobile-view-size-info{
   display: block!important;
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
</style>
@endsection
