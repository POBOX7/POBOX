<style type="text/css">
/*li.popup-size.disabled a.size {
    background: #e1e1e1!important;
}*/
/*li.popup-size.disabled a.size:after {
    content: "✖";
     background: url(../assets/images/icons/cross.png) no-repeat center top;
    position: absolute;
    font-size: 41px;
    top: -34px;
    left: 0;
    color: black;
    
}*/
li.popup-size.disabled a.size {
  
       background:#e1e1e1 url(../assets/images/icons/cross.png) no-repeat center top!important;
    background-size: 100% 100%;

}
li.popup-size.disabled{
  opacity: 1;
}
  .qtybtn{
    float: left;
    width: 100%;
    height: 100%;
    border: 1px solid;
    color: #8798a2;
    font-size: 11px;
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
  .disabled{
    pointer-events:none;
    opacity:0.7;
}
</style>
<div class="modal-header" style="height: 48px;">
    <button type="button" class="close" data-dismiss="modal">×</button>
    <h4 class="modal-title"></h4>
  </div>
<div class="product-single-container product-single-default product-quick-view container">
  <div class="row">
      <div class="col-lg-6 col-md-6 product-single-gallery">
          <div class="product-slider-container product-item">
              <div class="product-single-carousel owl-carousel owl-theme" id="product_image_zoom">

                  @foreach ($productDetail->product_image as $keyProductImage => $valueProductImage)
                  <div class="product-item">
                      <img style="width: 400px;height: 400px;" class="product-single-image 1" src="{{ asset('assets/upload_images/product') }}/{{$valueProductImage['product_image']}}" data-zoom-image="{{ asset('assets/upload_images/product') }}/{{$valueProductImage['product_image']}}"/>
                  </div>
                  @endforeach
              </div>
              <!-- End .product-single-carousel -->
          </div>
          <div class="prod-thumbnail row owl-dots" id='carousel-custom-dots'>
              @foreach($productDetail->product_image as $keyProductImage => $valueProductImage)
              <div class="col-3 owl-dot">
                  <img style="width: 88px;height: 88px;" class="product-single-image" src="{{ asset('assets/upload_images/product') }}/{{$valueProductImage['product_image']}}"/>
              </div>
              @endforeach
          </div>
      </div>
      <!-- End .col-lg-7 -->
      <div class="col-lg-6 col-md-6">
          <div class="product-single-details">
              <h1 class="product-title" id="product_title">
                {{str_limit($productDetail->name, 30)}}
              </h1>
                
              <!-- End .product-container -->
              </span>
              <div class="price-box">
                  <span class="" style="font-size: 18px;" id="price">₹ {{str_limit($productDetail->mrp, 30)}}</span>
                  <span class="old-price" id="mrp">₹ {{str_limit($productDetail->price, 30)}}</span>
              </div>
              <!-- End .price-box -->
              <div class="product-desc">
                  <p id="short_description">{{$productDetail->short_description}}</p>
                  
              </div>

              <!-- End .product-desc -->
              <div class="product-filters-container">
                  <div class="product-single-filter">
                      <label>Colors:</label>
                      <ul class="config-swatch-list popup-color">
                          <li class="popup-color active" id="{{$productDetail->product_id}}">
                              <a href="#color" style="background-color: {{$productDetail->hex_code}};"></a>
                          </li>
                          @foreach($productDetail->product_color as $product_colors)
                          <li class="popup-color colordetail" id="product_{{$product_colors->product_id}}">
                              <a href="#color" style="background-color: {{$product_colors->hex_code}};"></a>
                          </li>
                          @endforeach
                      </ul>
                  </div>
                  <!-- End .product-single-filter -->
              </div>
              <div class="product-filters-container">
                  <div class="product-single-filter">
                      <!-- <label>size:</label> -->
                      <ul class="config-size-list popup-size">
                          @php
                            $active  = 0;
                            $default_size_qty = 0;
                          @endphp
                          @foreach ($sizeData as $keySizeData => $valueSizeData)
                            @if(in_array($valueSizeData->id, $product_size))
                              <li class="popup-size " size_id="{{$valueSizeData->id}}" id="{{$valueSizeData->product_id}}" product_size_qty = "{{$product_size_data[$valueSizeData->id]}}"><a href="#sizedetail" class="size {{$active == "0" ? "active" : ""}}">{{$valueSizeData->name}}</a></li>
                              @if($active == "0")
                                @php
                                  $active  = 1;
                                  $default_size_qty = $product_size_data[$valueSizeData->id];
                                @endphp
                              @endif
                            @else
                              <li class="popup-size disabled" id="{{$valueSizeData->product_id}}"><a class="size" style="background-color: gray;">{{$valueSizeData->name}}</a></li>
                              @endif
                          @endforeach
                      </ul>
                  </div>
                  <!-- End .product-single-filter -->
              </div>
              <!-- End .product-filters-container -->
              <div class="product-action">
                  
                <div class="quantity-container">
                            <input type="button" value="-" class="minus qtybtn" id="min">
                            <input name="qty" id="current_qty" disabled="disabled" type="text" min="1" value="1" class="qty" style="float:left;height: 43px;border: 1px solid #e1e1e1;width: 60px;text-align: center;">
                            <input type="hidden" id="main_size_id" value="{{$default_size_qty}}">
                            <input type="button"  value="+" class="plus qtybtn" id="plus">
                </div> 
                  <!-- End .product-single-qty -->

                   @if($user_id == NULL)
                      <a href="#" id="login" data-toggle="modal" data-dismiss="modal"  data-target="#login"   class="paction add-wishlist wishlist"><span>Add to Wishlist</span></a>
                       <!--<button class="paction add-cart" id="login" data-toggle="modal" data-dismiss="modal" data-target="#login"><span>Add to Cart</span></button>-->
                    @else
						 <a href="javascript:void(0)" class="paction wishlist added" data-mid="{{$productDetail->product_id}}" title="Add to Wishlist">
                          <i class="icon-heart wishCustom-{{$productDetail->product_id}}"></i>
                      </a>
                     
                    @endif
                    
                     <a href="javascript:void(0)" class="paction add-cart cart" data-mid="{{$productDetail->product_id}}" title="Add to Cart" style="margin-left: 10px;">
                      <span>Add to Cart</span>
                      </a>
                 
                  <input type="hidden" name="user_id" name="user_id" id="user_id" value="{{$user_id}}">
                  <input type="hidden" id="from_wishlist" value="0">
              </div>



              <!-- End .product single-share -->
          </div>
          <!-- End .product-single-details -->
      </div>
      <!-- End .col-lg-5 -->
  </div>
  <!-- End .row -->
</div>

<script type="text/javascript">
    if( jQuery.isEmptyObject(popup_size) == true){
    }else{
        $('input#plus').removeAttr("disabled");
        $('a#cart').removeAttr("style");
    }

    $('li.popup-size a').on('click', function (e) {
      e.preventDefault(); 
      var product_size_qty = $(this).parent().attr('product_size_qty');  
        $('li.popup-size a').removeClass('active');
        $(this).addClass('active');
        $('#main_size_id').val(product_size_qty);
        $('#current_qty').val(1); 
    }); 

    $('.minus').click(function(){
        var available_qty =  $('#main_size_id').val(); 
        var current_qty =  $('#current_qty').val(); 
        if(current_qty == 1 ){
          return false; 
        } 
      
      current_qty--; 
      $('#current_qty').val(current_qty); 
    });
    $('.plus').click(function(){
        var available_qty =  $('#main_size_id').val(); 
        var current_qty =  $('#current_qty').val(); 
        if(current_qty == available_qty ){
          return false; 
        } 
        
        if(!available_qty){
           if(value == 10 ){
              return false; 
            }
         }

         current_qty++; 
         $('#current_qty').val(current_qty); 

    });
 

</script>