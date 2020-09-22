   @foreach ($productDetailData as $keyProductDetailData => $valueProductDetailData)
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="product-single-container product-single-default">
                                <div class="row">
                                    <div class="col-lg-4 col-md-4  col-xs-12 product-single-gallery">
                                        <div class="product-slider-container product-item">
                                            <div class="product-single-carousel owl-carousel owl-theme">
                                                @foreach ($valueProductDetailData['product_image'] as $keyProductImage => $valueProductImage)
                                                   <div class="product-item">
                                                      <img style="width: 400px;height: 400px;" class="product-single-image 1" src="{{ asset('assets/upload_images/product') }}/{{$valueProductImage['product_image']}}" data-zoom-image="{{$valueProductImage['product_image']}}"/>
                                                   </div>
                                                   @endforeach
                                            </div>
                                            <!-- End .product-single-carousel -->
                                         <!--    <span class="prod-full-screen">
                                                <i class="icon-plus"></i>
                                            </span> -->
                                        </div>
                                        <div class="prod-thumbnail row owl-dots" id='carousel-custom-dots' style="width: 413px;">
                                           
                                            @foreach($valueProductDetailData['product_image'] as $keyProductImage => $valueProductImage)
                                            <div class="col-3 owl-dot">
                                                <img width="88" height="88" src="{{ asset('assets/upload_images/product') }}/{{$valueProductImage['product_image']}}"/>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div><!-- End .col-lg-7 -->

                                    <div class="col-lg-8 col-md-8">
                                        <div class="product-single-details">
                                            <h1 class="product-title">{{$valueProductDetailData['name']}}</h1>

                                            <div class="ratings-container" style="margin-bottom: 7px;">
                                                   <div class="product-ratings">
                                                      @foreach ($valueProductDetailData['review'] as $keyReviewData => $valueReviewData)
                                                      <span class="ratings width-{{$valueReviewData['rating']}}percent"></span> 
                                                     <!--  <span class="tooltiptext tooltip-top"></span> -->
                                                      <a href="#" class="rating-link">({{$valueReviewData['rating']}} Reviews )</a>
                                                      @endforeach
                                                   </div> 
                                              </div>
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
                                                <div class="product-sku" style="margin-bottom: 5px;">
                                                  <label style="color: black;font-weight: 600;">Sku :</label>
                                                    <span style="color: gray;font-size: 16px;">{{$valueProductDetailData['sku']}}</span>
                                                </div>
                                             <div class="price-box" style="margin-bottom: 7px;">
                                                   <span class="old-price mrp">₹{{$valueProductDetailData['mrp']}}</span>
                                                   <span class="product-prices price" id="new_price_{{$valueProductDetailData['id']}}">
                                                   <span class="product-prices price" id="price-{{$valueProductDetailData['id']}}">₹{{$valueProductDetailData['price']}}</span>
                                                   </span>
                                                </div>
                                            <div class="product-desc">
                                                <p style="line-break: anywhere;">{{$valueProductDetailData['short_description']}}</p>
                                            </div><!-- End .product-desc -->
                                             
                                        <div class="product-single-filter">
                                                      <label>Colors:</label>
                                                      <ul class="config-swatch-list popup-color">
                                                           @foreach($valueProductDetailData->color as $product_colors)
                                                         <li class="popup-color" ids="{{$product_colors->id}}" productid="{{$valueProductDetailData['id']}}"><!-- id="{{$product_colors->id}}" -->
                                                            <a href="#color" style="background-color: {{$product_colors->hex_code}};"></a>
                                                         </li> 
                                                         @endforeach
                                                      </ul>
                                                   </div>
                                                   <!-- End .product-single-filter -->
                                                
                                                
                                          <div class="product-single-filter">
                                             <label>size:</label>
                                             <ul class="config-size-list popup-size">
                                                @php $size_data = App\Product::getSizeFromProductId($valueProductDetailData['id']); @endphp
                                                @foreach ($size_data as $keySizeData => $valueSizeData) 
                                                <li class="popup-size" size_id="{{$valueSizeData->id}}" productid="{{$valueProductDetailData['id']}}"><a href="#sizedetail" class="size">{{$valueSizeData->name}}</a></li>
                                                @endforeach
                                             </ul>
                                          </div>
                                          <!-- End .product-single-filter -->

                                            <div class="product-action">
                                                   <div id="myDiv" style="width: 100%;">
                                                      <div class="quantity-container">
                                                         <!-- <span>1</span>  -->
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
                                                           value="quantity-{{$valueProductDetailData['id']}}"   style="float: left;width: 100%;height: 100%;border: 1px solid;color: #8798a2;font-size: 11px;display: block;width: 45px;height: 43px;border: 1px solid #e1e1e1;border-radius: 3px;color: #ccc;font-size: 25px;line-height: 43px;text-align: center;cursor: pointer;margin-right: 10px;">+</div>  

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
                    @endforeach
<script type="text/javascript">
  alert("hii");
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
  alert(popup_color_id);
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
