@extends('new_resources.layouts.new_app') 
@section('content')  
<script src="assets/js/nouislider.min.js"></script>
<!-- Main JS File -->

@if (session('status'))
<div class="alert alert-success" id="myElem">
   <strong>{{ session('status') }}</strong>
</div>
@endif 
<style type="text/css">
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
   .product-default a:hover {
   color: #ffffff!important;
   text-decoration: none;
   }
   button.close {
   float: right;
   margin-left: 96%;
   }
   button.btn.btn-outline.btn-up-icon.bootstrap-touchspin-up {
   border-radius: 0px!important;
   } 
</style>
<main class="main new-arrival">
    @if(!is_null($bannerSlider)) 
<div class="hero-section hero-background style-02" style="background-image: url('{{ asset('assets/upload_images/banner') }}/{{$bannerSlider['image']}}">
   <!--  <h1 class="page-title">Kurta sets</h1> -->
</div>
@endif
   <nav aria-label="breadcrumb" class="breadcrumb-nav">
      <div class="container">
         <ol class="breadcrumb mt-0">
            <li class="breadcrumb-item">
               <a href="{{route('home_1')}}">
                  <!-- <i class="icon-home"></i> -->Home
               </a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Kurta Sets</li>
         </ol>
      </div>
      <!-- End .container -->
   </nav>
   <div class="container">
      <div class="container-box">
         <div class="row">
            <div class="col-lg-9">
               <nav class="toolbox">
                  <div class="toolbox-left">
                     <div class="toolbox-item toolbox-sort">
                        <div class="select-custom" id="sorting_filter">
                           <select  name="data[sorting][filter]" id="sorting_filter" class="form-control sorting" >
                              <option value="menu_order" id="Default">Default sorting</option>
                              <option value="featured">Featured</option>
                              <option value="name_a_to_z">Name, A-Z</option>
                              <option value="name_z_to_a">Name, Z-A</option>
                              <option value="price_low_to_high">Price, low to high</option>
                              <option value="price_high_to_low">Price, high to low</option>
                           </select>
                        </div>
                        <!-- End .select-custom -->
                     </div>
                     <!-- End .toolbox-item -->
                  </div>
                  <!-- End .toolbox-left --> 
               </nav>
               <!-- id="filter_div" -->  
               <div id="filter_div" class="new-arrival-product-list">
                  <div class="row row-sm">
                     @foreach ($newArrivalProductDatas as $keyNewArrivalProductData => $valueNewArrivalProductData)
                     <div class="col-6 col-md-4">
                        <div class="product-default">
                           <figure style="height: 400px;">
                              @if($valueNewArrivalProductData->discount !== 0)
                              <div class="labels" style="line-height: 2;color: #fff;font-weight: 600;text-transform: uppercase;position: absolute;z-index: 2;width: 54px;top: .8em;font-size: 10px;left: 0.8em;">
                                 <div class="onsale" style="background: blue;padding: 0px 0px 0px 6px;width: 34px;">  {{$valueNewArrivalProductData->discount}}% </div>
                              </div>
                              @endif
                              <a href="{{route('productDetail',$valueNewArrivalProductData['id'])}}">
                              <img style="height: -webkit-fill-available; width: auto!important;" src="{{ asset('assets/upload_images/product') }}/{{$valueNewArrivalProductData['image']}}">
                              </a>
                              <a  data-toggle="modal" data-target="#product-{{$valueNewArrivalProductData['id']}}" class="btn-quickviewss" title="Quick View">Quick View</a> 
                           </figure>
                           <div class="product-details">
                              <h2 class="product-title">
                                 <a href="{{route('productDetail',$valueNewArrivalProductData['id'])}}"> {{str_limit($valueNewArrivalProductData->name, 30)}}</a>
                              </h2>
                              <div class="price-box">
                                 <span class="product-price">₹{{$valueNewArrivalProductData['mrp']}}</span>
                                 <span class="product-prices price">₹{{$valueNewArrivalProductData['price']}}</span>
                              </div>
                              <!-- End .price-box -->
                              <div class="product-action">
                                 <a href="#" class="btn-icon-wish"><i class="icon-heart"></i></a>
                                 <button class="btn-icon btn-add-cart" data-toggle="modal" data-target="#addCartModal"><i class="icon-bag"></i>ADD TO CART</button> 
                                 <!-- Modal -->
                                 <div id="product-{{$valueNewArrivalProductData['id']}}" class="modal fade" role="dialog">
                                    <div class="modal-dialog">
                                       <!-- Modal content-->
                                       <div class="modal-content">
                                          <div class="modal-body">
                                             <button type="button" class="close" data-dismiss="modal">&times;</button> 
                                             <div class="product-single-container product-single-default product-quick-view container">
                                                <div class="row">
                                                   <div class="col-lg-6 col-md-6 product-single-gallery">
                                                      <div class="product-slider-container product-item">
                                                         <div class="product-single-carousel owl-carousel owl-theme">
                                                            @foreach ($valueNewArrivalProductData['product_image'] as $keyProductImage => $valueProductImage)
                                                            <div class="product-item">
                                                               <img style="width: 400px;height: 400px;" class="product-single-image 1" src="{{ asset('assets/upload_images/product') }}/{{$valueProductImage['product_image']}}" data-zoom-image="{{$valueProductImage['product_image']}}"/>
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
                                                         <h1 class="product-title"> {{$valueNewArrivalProductData->name}}</h1> 
                                                         
                                                         <div class="price-box">
                                                            <span class="" style="font-size: 18px;">₹ {{$valueNewArrivalProductData->price}}</span>
                                                            @if($valueNewArrivalProductData->discount !== 0)
                                                            <span class="old-price" >₹ {{$valueNewArrivalProductData->mrp}}</span>
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
                                                                  <li class="popup-color" id="{{$product_colors->id}}">
                                                                     <a href="#color" style="background-color: {{$product_colors->hex_code}};"></a>
                                                                  </li>
                                                                  @endforeach
                                                               </ul>
                                                            </div>
                                                            <!-- End .product-single-filter -->
                                                         </div>
                                                         <div class="product-filters-container">
                                                            <div class="product-single-filter">
                                                               <label>size:</label>
                                                               <ul class="config-size-list popup-size">
                                                                  @php $size_data = App\Product::getSizeFromProductId($valueNewArrivalProductData['id']); @endphp
                                                                  @foreach ($size_data as $keySizeData => $valueSizeData) 
                                                                  <li class="popup-size" id="{{$valueSizeData->id}}" productid="{{$valueNewArrivalProductData['id']}}"><a href="#sizedetail" class="size">{{$valueSizeData->name}}</a></li>
                                                                  @endforeach
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
                     @endforeach
                  </div>
               </div> 
               <nav class="toolbox toolbox-pagination">
                      <div class="toolbox-item toolbox-show">

                      </div>

                      <!-- {{$newArrivalProductDatas->links()}} -->
                   </nav>
                    <nav class="toolbox toolbox-pagination">
                        <div class="toolbox-item toolbox-show">
                            <!-- <label>Showing 1–9 of 60 results</label> -->
                        </div>
                        <!-- End .toolbox-item -->

                        <ul class="pagination" id="count_div">
                            <!-- <li class="page-item" id="3"><a class="page-link" href="#">3</a></li>
                            <li class="page-item" id="4"><a class="page-link" href="#">4</a></li>  -->
                            <!-- <li class="page-item">
                               <a class="page-link page-link-btn" href="#"><i class="icon-angle-right"></i></a>
                            </li> -->
                        </ul>
                    </nav>
            </div>
            <!-- End .col-lg-9 -->
            @include('new_resources.layouts.leftside_bar')  
         </div>
         <!-- End .row -->
         <div class="row row-sm featured-mobile-view new-arrival-product-list">
            <div>
               <h3 class="title" style="text-align: center;font-size: 26px;">
                  FEATURED PRODUCTS
               </h3>
            </div>
            @foreach ($left_sidebar_featuredProduct  as $keyFeaturedProduct => $valueFeaturedProduct)
            <div class="col-6 col-md-4 col-xs-12 float-left new-arrival-product-list">
               <div class="product-default">
                  <figure style="height: 400px;">
                     <a href="">
                     <img src="{{ asset('assets/upload_images/product') }}/{{$valueFeaturedProduct['image']}}" style="height: -webkit-fill-available;width: auto!important;">
                     </a>
                  </figure>
                  <div class="product-details">
                     <h2 class="product-title">
                        <a href="">{{$valueFeaturedProduct['name']}}</a>
                     </h2>
                     <div class="ratings-container"> 
                     </div>
                     <!-- End .product-container -->
                     <div class="price-box">
                        <span class="product-price">₹{{$valueFeaturedProduct['mrp']}}</span>
                        <span class="product-prices" style="color: red">₹{{$valueFeaturedProduct['price']}}</span>
                     </div>
                     <!-- End .price-box -->
                  </div>
                  <!-- End .product-details -->
               </div>
            </div>
            @endforeach
         </div>
      </div>
      <!-- End .container-box -->
   </div>
   <!-- End .container -->
</main>
<!-- End .main -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
       
<script type="text/javascript"> 
   var sorting_filter = [];
   var page = [];
   var page_url = null;
  if(window.location.href.indexOf("kurta-sets") > -1){ 
      var page_url = "kurta-sets"; 
    }

   /* $('li.page-item a').on('click', function (e) {
     e.preventDefault(); 
     var page_id = $(this).parent().attr('id'); 
   //    $('li.popup-color a').removeClass('active');
     
       
   // if($(this).parent().hasClass( "active" )){
   //   $(this).parent().removeClass('active');
   // }else{
   // $(this).parent().addClass('active');
     
   // }
    $('li.page-item a').parent().removeClass('active');
     $(this).parent().addClass('active'); 
      page.push(page_id);
           if (page.length > 1) {
               page.splice(0, 1);
           }  
   
         $.ajax({
            type: "get",
            url: "{{ url('/common-filter') }}",
            cache: !1,
            data: { 
                page_url:page_url,
                page: page,
                sorting_filter: sorting_filter,
                clearall: clearall,
                size: size,
                categories: categories,
                brand: brand, 
                color:color,
                min_price: min_price,
                max_price: max_price,
                page_url:page_url,
                _token: "{{ csrf_token() }}",
            },
            success: function(data) {
                $('#filter_div').html(data);
            }
        }); 
   });*/
   
   
   
   var sorting_filter = [];
      $("#sorting_filter").change(function(){
         var clearall = [];
              var filterName = $('#sorting_filter option:selected').val();
              sorting_filter.push(filterName);
       if (sorting_filter.length > 1) {
           sorting_filter.splice(0, 1);
       }    
              $.ajax({
               type: "get",
               url: "{{ url('/common-filter') }}",
               cache: !1,
               data: { 
                  sorting_filter: sorting_filter,
                  clearall: clearall,
               size: size,
                categories: categories,
                brand: brand, 
                color:color,
                 min_price: min_price,
                 max_price: max_price,
                 page_url:page_url,
                  _token: "{{ csrf_token() }}",
               },
             
             success: function(data){
                $('#filter_div').html(data);
             } 
          }); 
           return false;
                
          }) 
   popup_color =[];
   popup_size = [];
   product_id = [];

   $('li.popup-size a').on('click', function (e) {
   e.preventDefault(); 
   var popup_size_id = $(this).parent().attr('id'); 
   var popup_size_product_id = $(this).parent().attr('productid');  
    $('li.popup-size a').removeClass('active');
   $(this).addClass('active');
    if ( $.inArray(size_id, size) > -1 ) { 
         size = $.grep(size, function(value) {
             return value != size_id;
        }); 
    }else{  
       size.push(size_id); 
    }  
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
          url: "{{ url('/common-popup-filter1') }}",
          cache: !1,
          data: { 
               popup_size: popup_size, 
              popup_color:popup_color, 
              product_id:product_id,
              page_url:page_url,
              _token: "{{ csrf_token() }}",
          },
          success: function(data) {
              $('#popup-filter_div').html(data);
          }
      }); 
   }); 
   $('li.popup-color a').on('click', function (e) {
   e.preventDefault(); 
   var popup_color_id = $(this).parent().attr('id');  
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
          url: "{{ url('/common-popup-filter1') }}",
          cache: !1,
          data: { 
               popup_size: popup_size, 
              popup_color:popup_color, 
              product_id:product_id,
              page_url:page_url,
              _token: "{{ csrf_token() }}",
          },
          success: function(data) {
              $('#popup-filter_div').html(data);
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
@endsection
<script src="assets/js/main.js"></script>