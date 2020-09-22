<!-- <link rel="stylesheet" href="assets/css/style.css">
<script src="assets/js/nouislider.min.js"></script>
<script src="assets/js/plugins.min.js"></script> -->
<!-- Main JS File --><!-- 
<script src="assets/js/main.min.js"></script>
<script src="assets/js/nouislider.min.js"></script> -->
<!-- Main JS File -->
<!-- <script src="assets/js/main.min.js"></script>
<style type="text/css">
.inner-quickview .product-details {
align-items: center;
}
.product-price {
    color: #a7a7a7!important;
}
</style> -->
<!-- <link rel="stylesheet" href="assets/css/style.css"> -->
<script src="assets/js/plugins.js"></script>
<!-- Main JS File -->
<script src="assets/js/nouislider.min.js"></script>
<!-- Main JS File -->
<script src="assets/js/main.js"></script> 
<style type="text/css">
    .quickview {
    background-color: #fff;
    padding:0px!important;
}
</style>

 <div class="row row-sm">
    @if(count($newArrivalProductDatas))
    @foreach ($newArrivalProductDatas as $keyNewArrivalProductData => $valueNewArrivalProductData)
    <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="product-default inner-quickview inner-icon">
            <figure>
                @if($valueNewArrivalProductData->discount !== 0)
                  <div class="labels" style="line-height: 2;color: #fff;font-weight: 600;text-transform: uppercase;position: absolute;z-index: 2;width: 54px;top: .8em;font-size: 10px;left: 0.8em;">
                  <div class="onsale" style="background: blue;padding: 0px 0px 0px 6px;width: 34px;">  {{$valueNewArrivalProductData->discount}}% </div>
               </div>

                 @endif
                <a href="">
                    <img src="{{ asset('assets/upload_images/product') }}/{{$valueNewArrivalProductData['image']}}" width="269" height="306" style="width: 269px;height: 306px">
                </a>
                

               <!--  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Quick View</button> -->
           <a  data-toggle="modal" data-target="#myModal_new_arrival_detail_{{$valueNewArrivalProductData['id']}}" class="btn-quickviewss" title="Quick View">Quick View</a> 


            <!-- Porduct detail pop start  -->
              <div class="modal fade" id="myModal_new_arrival_detail_{{$valueNewArrivalProductData['id']}}" role="dialog">
                <div class="product-single-container product-single-default product-quick-view container quickview">
                
            </div><!-- End .product-single-container -->
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button"  class="close" data-dismiss="modal">&times;</button>
                     <!--  <h4 class="modal-title">Product details</h4> -->
                    </div>
                    <div class="product-single-container product-single-default product-quick-view">
                <div class="row">
                    <div class="col-lg-6 col-md-6 product-single-gallery 13">
                        <div class="product-slider-container product-item">
                                                <div class="product-single-carousel owl-carousel owl-theme">
                                                   
                                                    @foreach ($valueNewArrivalProductData['product_image'] as $keyProductImage => $valueProductImage)
                                                   <div class="product-item">
                                                      <img style="width: 400px;height: 400px;" class="product-single-image 1" src="{{ asset('assets/upload_images/product') }}/{{$valueProductImage['product_image']}}" data-zoom-image="{{$valueProductImage['product_image']}}"/>
                                                   </div>
                                                   @endforeach  
                                                   <!-- <div class="product-item">
                                                      <img class="product-single-image" src="http://3.7.41.47/pobox1/pobox/public/assets/upload_images/product/A10I5695%20copy.jpg" data-zoom-image="http://3.7.41.47/pobox1/pobox/public/assets/upload_images/product/A10I5695%20copy.jpg"/>
                                                      </div>
                                                      <div class="product-item">
                                                      <img class="product-single-image" src="http://3.7.41.47/pobox1/pobox/public/assets/upload_images/product/A10I5695%20copy.jpg" data-zoom-image="http://3.7.41.47/pobox1/pobox/public/assets/upload_images/product/A10I5695%20copy.jpg"/>
                                                      </div>
                                                      <div class="product-item">
                                                      <img class="product-single-image" src="http://3.7.41.47/pobox1/pobox/public/assets/upload_images/product/A10I5695%20copy.jpg" data-zoom-image="http://3.7.41.47/pobox1/pobox/public/assets/upload_images/product/A10I5695%20copy.jpg"/>
                                                      </div>  -->
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
                    </div><!-- End .col-lg-7 -->

                    <div class="col-lg-6 col-md-6">
                        <div class="product-single-details">
                            <h1 class="product-title">{{$valueNewArrivalProductData['name']}}</h1>
                              <div class="ratings-container"> 
                                <!-- <div class="product-ratings">
                                    @foreach ($valueNewArrivalProductData['review'] as $keyReviewData => $valueReviewData)
                                    <span class="ratings width-{{$valueReviewData['rating']}}percent"></span> 
                                    <span class="tooltiptext tooltip-top"></span>
                                     <a href="#" class="rating-link">({{$valueReviewData['rating']}} Reviews )</a>
                                    @endforeach
                                </div> --><!-- End .product-ratings -->


                            </div><!-- End .product-container -->
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
                        </div><!-- End .price-box -->

                            <div class="product-desc">
                                <p><?php echo $valueNewArrivalProductData['description']; ?></p>
                            </div><!-- End .product-desc -->

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
                                </div><!-- End .product-single-filter -->
                            </div><!-- End .product-filters-container -->

                            <div class="product-action">
                             <div id="myDiv" style="width: 100%;">
  <div class="quantity-container">
  <!-- <span>1</span>  -->
  <div class="{{$valueNewArrivalProductData['id']}}" id="{{$valueNewArrivalProductData['price']}}" onclick="decreaseValue(this.id)" value="quantity-{{$valueNewArrivalProductData['id']}}" style="float: left;width: 100%;height: 100%;border: 1px solid;color: #8798a2;font-size: 11px;line-height: 34px;display: block;width: 45px;height: 43px;border: 1px solid #e1e1e1;border-radius: 3px;color: #ccc;font-size: 46px;text-align: center;cursor: pointer;">-</div> 
  <input type="number" id="quantity-{{$valueNewArrivalProductData['id']}}" name="quantity" value="1" / style="float:left;height: 43px;border: 1px solid #e1e1e1;width: 56px;text-align: center;">
  <div class="{{$valueNewArrivalProductData['id']}}" id="{{$valueNewArrivalProductData['price']}}"  onclick="increaseValue(this.id)"   value="quantity-{{$valueNewArrivalProductData['id']}}" style="float: left;width: 100%;height: 100%;border: 1px solid;color: #8798a2;font-size: 11px;display: block;width: 45px;height: 43px;border: 1px solid #e1e1e1;border-radius: 3px;color: #ccc;font-size: 25px;line-height: 43px;text-align: center;cursor: pointer;margin-right: 10px;">+</div>
</div>
<p class="{{$valueNewArrivalProductData['id']}}" style="display: none;">{{$valueNewArrivalProductData['product_qty']}}</p>

<div id="product-price-{{$valueNewArrivalProductData['id']}}">

</div>  
<script type="text/javascript"> 
    function increaseValue(clicked_id) {  
        var product_id = document.getElementById(clicked_id).getAttribute("class");
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
          price = '₹'+`<span>${clicked_id * value}</span>`; 
         // alert("price-"+clicked_id);
          document.getElementById('new_price_'+product_id).innerHTML=price;
    }

function decreaseValue(clicked_id) {
     var product_id = document.getElementById(clicked_id).getAttribute("class");
        var prodid = document.getElementById(clicked_id).getAttribute("value");
  var value = parseInt(document.getElementById(prodid).value, 10);
  value = isNaN(value) ? 0 : value;
  value < 1 ? value = 1 : '';
  value--; 
  document.getElementById(prodid).value = value; 
  price = '₹'+`<span>${clicked_id * value}</span>`;
   

  
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
                            </div><!-- End .product-action -->

                           <!--  <div class="product-single-share">
                                <label>Share:</label> -->
                                <!-- www.addthis.com share plugin-->
                               <!--  <div class="addthis_inline_share_toolbox"></div> -->
                            <!-- </div> --><!-- End .product single-share -->
                        </div><!-- End .product-single-details -->
                    </div><!-- End .col-lg-5 -->
                </div><!-- End .row -->
            </div><!-- End .product-single-container -->
                  </div>
                </div>
              </div>

            <!-- Porduct detail pop end  -->

            </figure>
            <div class="product-details">
                  <p style="margin-bottom: 0!important">
                    <h2 class="product-title" style="margin-bottom: -9px !important;">
                        <a href="" style="white-space: inherit;">{{$valueNewArrivalProductData['name']}}</a>
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
                   <!--  <a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View"><i class="fas fa-external-link-alt"></i></a>  -->
                </div>
            </div><!-- End .product-details -->
        </div>
    </div>


    @endforeach
    @else
    <h4 style="padding-left: 10px;">Data not found</h4>
    @endif
</div>