
<!-- Main JS File -->
<script src="{{ asset('new_theme/assets/js/main.min.js') }}"></script>
<div id="popup-filter_div-">
    @foreach ($newArrivalProductData as $keyNewArrivalProductData => $valueNewArrivalProductData)
    <div class="row">
        <div class="col-lg-6 col-md-6 product-single-gallery">
            <div class="product-slider-container product-item">
                <div class="product-single-carousel owl-carousel owl-theme">
                    @foreach ($valueNewArrivalProductData['product_image'] as $keyProductImage => $valueProductImage)
                    <div class="product-item">
                        <img style="width: 400px;height: 400px;" class="product-single-image 1" src="{{ asset('assets/upload_images/product') }}/{{$valueProductImage['product_image']}}" data-zoom-image="{{ asset('assets/upload_images/product') }}/{{$valueProductImage['product_image']}}"/>
                    </div>
                    @endforeach
                </div>
                <!-- End .product-single-carousel -->
            </div>
            <div class="prod-thumbnail row owl-dots" id='carousel-custom-dots'><!--  <img style="width: 400px;height: 400px;" class="product-single-image 1" src="{{ asset('assets/upload_images/product') }}/{{$valueNewArrivalProductData['image']}}" data-zoom-image="{{ asset('assets/upload_images/product') }}/{{$valueNewArrivalProductData['image']}}"/> -->
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
                <h1 class="product-title"> {{$valueNewArrivalProductData->name}}</h1>
                <!-- <div class="ratings-container">
                   <div class="product-ratings">
                      <span class="ratings" style="width:60%"></span>
                   </div>
                   <a href="#" class="rating-link">( 6 Reviews )</a>
                   </div> -->
                <!-- End .product-container -->
                <div class="price-box">
                    <!-- <span class="" id="newprice-{{$valueNewArrivalProductData['id']}}" style="font-size: 18px;">₹ {{$valueNewArrivalProductData->price}}</span>
                    @if($valueNewArrivalProductData['discount'] !== 0)
                    <span class="old-price" >₹ {{$valueNewArrivalProductData->mrp}}</span>
                    @endif -->
                    @if($valueNewArrivalProductData['discount'] != 0 )
                    <span class="product-price ">₹{{$valueNewArrivalProductData['mrp']}}</span>
                    <span class="product-prices price">₹{{$valueNewArrivalProductData['price']}}</span>
                    @else
                    <span class="product-prices price">₹{{$valueNewArrivalProductData['mrp']}}</span>
                    @endif
                </div>
                <!-- End .price-box -->
                <div class="product-desc">
                    <p>{{$valueNewArrivalProductData->short_description}}</p>
                </div>
                <!-- End .product-desc -->
                <div class="product-filters-container">
                    <div class="product-single-filter">
                        <label>Colors:</label>
                        <ul class="config-swatch-list popup-color">
                            @foreach($valueNewArrivalProductData->color as $product_colors)
                            <!-- <li class="popup-color" id="{{$product_colors->id}}" productid="{{$valueNewArrivalProductData['id']}}">
                               <a href="#color"  style="background-color: {{$product_colors->hex_code}};"></a>
                            </li> -->
                            @if($valueNewArrivalProductData['color_id'] == $product_colors->id)
                            <li class="popup-color active" id="{{$product_colors->id}}" productid="{{$valueNewArrivalProductData['id']}}">
                                <a href="#color"  style="background-color: {{$product_colors->hex_code}};pointer-events: none;"></a>
                            </li>
                            @else
                            <li class="popup-color" id="{{$product_colors->id}}" productid="{{$valueNewArrivalProductData['id']}}">
                                <a href="#color"  style="background-color: {{$product_colors->hex_code}};"></a>
                            </li>
                            @endif
                            @endforeach
                        </ul>
                    </div>
                    <!-- End .product-single-filter -->
                </div>
                <div class="product-filters-container">
                    <div class="product-single-filter">
                        <label></label>
                        <div class="product_pop_color_filter" id="product_pop_color_filter">

                            <label class="container">
                                <input type="radio" name="type" value="">
                                <span class="checkmark" style="background-color:  "></span>
                            </label>

                        </div>
                    </div>
                    <!-- End .product-single-filter -->
                </div>
                <div class="product-filters-container">
                    <div class="product-single-filter">
                        <label>size:</label>
                        <ul class="config-size-list popup-size">
                            @php $size_data = App\Product::getSizeFromProductId($valueNewArrivalProductData['id']); @endphp
                            @foreach ($size_data as $keySizeData => $valueSizeData)
                            <li class="popup-size" id="{{$valueSizeData->id}}" productid="{{$valueNewArrivalProductData['id']}}"><a href="#sizedetail" class="size @if($popup_size[0] == $valueSizeData->id) active @endif">{{$valueSizeData->name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <!-- End .product-single-filter -->
                </div>
                <!-- End .product-filters-container -->
                <div class="product-action">
                    <div id="myDiv" style="width: 100%;">

                        <div id="product-price-{{$valueNewArrivalProductData['id']}}">
                        </div>
                        <script type="text/javascript">

                            function increaseValue(clicked_id) {
                                product_total_qty = $("#product_stockqunatity-"+clicked_id).attr("value");
                                product_count = $("#quantity-"+clicked_id).attr("value");
                                var product_price =document.getElementById(clicked_id).getAttribute("data-product-price");

                                var prodid = document.getElementById(clicked_id).getAttribute("value");
                                var value = parseInt(document.getElementById(prodid).value, 10);

                                value = isNaN(value) ? 0 : value;

                                var available_qty =  $('p.'+clicked_id).text();
                                // if(value == available_qty ){

                                //  return false;
                                // }
                                // if(!available_qty){

                                //   if(value == 10 ){
                                //      return false;
                                //    }
                                // } 
                                value++;
                                document.getElementById(prodid).value = value;
                                price = '₹'+`<span>${product_price * value}</span>`; 
                                //document.getElementById('new_price_'+product_id).innerHTML=price;
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
                                //document.getElementById('new_price_'+product_id).innerHTML=price;
                                //alert(new_price);
                            }
                        </script>
                        <div class="quantity-container">
                            <input type="button" value="-" price="{{$valueNewArrivalProductData['price']}}" qty="{{$valueNewArrivalProductData['product_qty']}}" class="minus" id="min" productid="{{$valueNewArrivalProductData['id']}}" style="float: left;width: 100%;height: 100%;border: 1px solid;color: #8798a2;font-size: 11px;line-height: 34px;display: block;width: 45px;height: 43px;border: 1px solid #e1e1e1;border-radius: 3px;color: #ccc;font-size: 46px;text-align: center;cursor: pointer;">
                            <input name="qty" id="quantity" type="text" min="1" value="1" class="qty" style="float:left;height: 43px;border: 1px solid #e1e1e1;width: 60px;text-align: center;">
                            <input type="button" disabled value="+" price="{{$valueNewArrivalProductData['price']}}" qty="{{$valueNewArrivalProductData['product_qty']}}" class="plus" id="plus"
                                   productid="{{$valueNewArrivalProductData['id']}}"  style="float: left;width: 100%;height: 100%;border: 1px solid;color: #8798a2;font-size: 11px;display: block;width: 45px;height: 43px;border: 1px solid #e1e1e1;border-radius: 3px;color: #ccc;font-size: 25px;line-height: 43px;text-align: center;cursor: pointer;margin-right: 10px;">
                        </div>
                        <a  style="pointer-events: none;" id="cart" disabled="disabled"  href="cart.html"  class="paction add-cart" title="Add to Cart">
                            <span >Add to Cart</span>
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
                <!-- End .product single-share -->
            </div>
            <!-- End .product-single-details -->
        </div>
        <!-- End .col-lg-5 -->
    </div>
    @endforeach
</div>
<script type="text/javascript">
    if( jQuery.isEmptyObject(popup_size) == true){
    }else{
        $('input#plus').removeAttr("disabled");
        $('a#cart').removeAttr("style");
    }


    $('.minus').click(function(){
        quantityField = $(this).next();
        product_qty = $(this).attr("qty");
        if(parseInt(quantityField.val(), 10)  == 1){
            $(this).attr("disabled","disabled");
            return false;
        }
        product_qty = $(this).attr("price");

        var new_price = product_qty*(parseInt(quantityField.val(), 10)  - 1);
        //$('#newprice-'+product_id).text(new_price);
        if(parseInt(quantityField.val(), 10) - 1 != product_qty){
            $(this).next().next().removeAttr("disabled");
        }
        if (quantityField.val() != 0) {
            quantityField.val(parseInt(quantityField.val(), 10) - 1);
        }
    });
    $('.plus').click(function(){
        quantityField = $(this).prev();
        product_qty = $(this).attr("qty");
        product_id = $(this).attr("productid");

        if(quantityField.val() == product_qty){
            $(this).attr("disabled","disabled");
            return false;
        }
        if(parseInt(quantityField.val(), 10) - 1 != product_qty){
            $(this).prev().prev().removeAttr("disabled");
        }
        product_price = $(this).attr("price");
        var new_price = product_price*(parseInt(quantityField.val(), 10) + 1);
        //$('#newprice-'+product_id).text(new_price);


        quantityField.val(parseInt(quantityField.val(), 10) + 1);
        var user_qty = parseInt(quantityField.val(), 10 - 1);
        if(user_qty == product_qty ){
            $(this).attr("disabled","disabled");
            return false;
        }
        if(!product_qty){
            if(value == 1 ){
                return false;
            }
        }

    });

    popup_color =[];
    popup_size = [];
    product_id = [];
    $('li.popup-size a').on('click', function (e) {
        e.preventDefault();
        product_id = [];
        var popup_size_id = $(this).parent().attr('id');
        var popup_size_product_id = $(this).parent().attr('productid');
        $('li.popup-size a').removeClass('active');
        $(this).addClass('active');
        $('input#plus').removeAttr("disabled");
        // if ( $.inArray(size_id, size) > -1 ) {
        //      size = $.grep(size, function(value) {
        //          return value != size_id;
        //     });
        // }else{
        //    size.push(size_id);
        // }
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
            url: "{{ url('/common-popup-filter') }}",
            cache: !1,
            data: {
                popup_size: popup_size,
                popup_color:popup_color,
                product_id:product_id,
                _token: "{{ csrf_token() }}",
            },
            success: function(data) {
                $('#popup-filter_div-').html(data);
            }
        });
    });
    $('li.popup-color a').on('click', function (e) {
        e.preventDefault();
        var popup_color_id = $(this).parent().attr('id');
        var popup_color_product_id = $(this).parent().attr('productid');
//    $('li.popup-color a').removeClass('active');


// if($(this).parent().hasClass( "active" )){
//   $(this).parent().removeClass('active');
// }else{
// $(this).parent().addClass('active');

// }
        $('li.popup-color a').parent().removeClass('active');
        $(this).parent().addClass('active');
        product_id = [];
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
            url: "{{ url('/common-popup-filter') }}",
            cache: !1,
            data: {
                popup_size: popup_size,
                popup_color:popup_color,
                product_id:product_id,
                _token: "{{ csrf_token() }}",
            },
            success: function(data) {
                $('#popup-filter_div-').html(data);
            }
        });
    });

</script>
