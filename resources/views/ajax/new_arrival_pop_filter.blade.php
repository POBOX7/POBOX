 <link rel="stylesheet" href="assets/css/style.css">
<script src="assets/js/plugins.js"></script>
<!-- Main JS File -->
<script src="assets/js/nouislider.min.js"></script>
<!-- Main JS File -->
<script src="assets/js/main.min.js"></script>


 @foreach ($newArrivalProductData as $keyNewArrivalProductData => $valueNewArrivalProductData)
<div class="row">
<div class="col-lg-6 col-md-6 product-single-gallery">
 <div class="product-slider-container product-item">
    <div class="product-single-carousel owl-carousel owl-theme">
       
       @foreach ($valueNewArrivalProductData['product_image'] as $keyProductImage => $valueProductImage)
       <div class="product-item">
          <img style="width: 400px;height: 400px;" class="product-single-image" src="{{ asset('assets/upload_images/product') }}/{{$valueProductImage['product_image']}}" data-zoom-image="{{$valueProductImage['product_image']}}"/>
       </div>
       @endforeach
    </div>
    <!-- End .product-single-carousel -->
 </div>
 <div class="prod-thumbnail row owl-dots" id='carousel-custom-dots'>
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
    <div class="ratings-container">
       <div class="product-ratings">
          @foreach ($valueNewArrivalProductData['review'] as $keyReviewData => $valueReviewData)
          <span class="ratings width-{{$valueReviewData['rating']}}percent"></span><!-- End .ratings -->
          <span class="tooltiptext tooltip-top"></span>
          <a href="#" class="rating-link">({{$valueReviewData['rating']}} Reviews )</a>
          @endforeach
       </div>
       <!-- End .product-ratings -->
    </div>
    <!-- End .product-container -->
    <!-- <div class="ratings-container">
       <div class="product-ratings">
           <span class="ratings" style="width:60%"></span>
       </div>
       
       <a href="#" class="rating-link">( 6 Reviews )</a>
       </div> --><!-- End .product-container -->
    <div class="price-box">
       <span class="old-price mrp">${{$valueNewArrivalProductData['mrp']}}</span>
       <span class="product-prices price" id="new_price_{{$valueNewArrivalProductData['id']}}">
       <span class="product-prices price" id="price-{{$valueNewArrivalProductData['id']}}">${{$valueNewArrivalProductData['price']}}</span>
       </span>
    </div>
    <!-- End .price-box -->
    <div class="product-desc">
       <p>{{$valueNewArrivalProductData['short_description']}}</p>
    </div>
    <!-- End .product-desc -->
    <div class="product-filters-container">
       <div class="product-single-filter">
          <label>Colors:</label>
          <div class="product_pop_color_filter" id="product_pop_color_filter">
             @foreach ($colorsData as $keyColorsData => $valueColorsData)
             <label class="container">
             <input type="radio" name="type" value="{{$valueColorsData->id}}">
             <span class="checkmark" style="background-color: {{$valueColorsData->name}};"></span>
             </label>
             @endforeach
          </div>
          <script type="text/javascript">
             $('#product_pop_color_filter').change(function() {
              var product_pop_color_filter = [];
              {
                $('#product_pop_color_filter :checked').each(function() {
                  //if(values.indexOf($(this).val()) === -1){
                  product_pop_color_filter.push($(this).val());
                 // alert(product_pop_color_filter);
                  // }
                });
                
                //console.log(size_filter);
                  $.ajax({
                       type: "get",
                       url: "{{ url('/new-arrival-pop-filter') }}",
                       cache: !1,
                       data: { 
                          product_pop_color_filter: product_pop_color_filter,
                          _token: "{{ csrf_token() }}",
                       },
                       success: function(data){
                          $('#product_pop_color_filter_div').html(data);
                       } 
                    });
              }
              return false;
             });
             
          </script>
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
             <div class="{{$valueNewArrivalProductData['id']}}" id="{{$valueNewArrivalProductData['price']}}" onclick="decreaseValue(this.id)" value="quantity-{{$valueNewArrivalProductData['id']}}" style="float: left;width: 100%;height: 100%;border: 1px solid;color: #8798a2;font-size: 11px;line-height: 34px;display: block;width: 45px;height: 43px;border: 1px solid #e1e1e1;border-radius: 3px;color: #ccc;font-size: 46px;text-align: center;cursor: pointer;">-</div>
             <input type="number" id="quantity-{{$valueNewArrivalProductData['id']}}" name="quantity" value="1" / style="float:left;height: 43px;border: 1px solid #e1e1e1;width: 56px;text-align: center;">
             <div class="{{$valueNewArrivalProductData['id']}}" id="{{$valueNewArrivalProductData['price']}}"  onclick="increaseValue(this.id)"   value="quantity-{{$valueNewArrivalProductData['id']}}" style="float: left;width: 100%;height: 100%;border: 1px solid;color: #8798a2;font-size: 11px;display: block;width: 45px;height: 43px;border: 1px solid #e1e1e1;border-radius: 3px;color: #ccc;font-size: 25px;line-height: 43px;text-align: center;cursor: pointer;margin-right: 10px;">+</div>
          </div>
          <div id="product-price-{{$valueNewArrivalProductData['id']}}">
          </div>
          <script type="text/javascript"> 
             function increaseValue(clicked_id) {  
                 var product_id = document.getElementById(clicked_id).getAttribute("class");
                 var prodid = document.getElementById(clicked_id).getAttribute("value");    
                 var value = parseInt(document.getElementById(prodid).value, 10);
                   value = isNaN(value) ? 0 : value;
                   value++;
                   document.getElementById(prodid).value = value; 
                   price = '₹'+`<span>${clicked_id * value}</span>`; 
                 // alert(price);
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
      
    </div>
    <!-- End .product-single-details -->
 </div>
 <!-- End .col-lg-5 -->
</div>
<!-- End .row -->
</div>
@endforeach