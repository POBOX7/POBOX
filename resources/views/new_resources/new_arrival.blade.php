@extends('new_resources.layouts.new_app')
@section('content')

<body>
    <div class="page-wrapper">
        

        <main class="main">
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <div class="container">
                    <ol class="breadcrumb mt-0">
                        <li class="breadcrumb-item"><a href=""><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item"><a href="#">New Arrival</a></li>
                        {{-- <li class="breadcrumb-item active" aria-current="page">Headsets</li> --}}
                    </ol>
                </div><!-- End .container -->
            </nav>

            <div class="container">
                <div class="container-box">
                    <div class="row">
                        <div class="col-lg-9">
                            <div class="banner banner-cat" style="background-image: url('{{ asset('assets/upload_images/banner') }}/{{$bannerSlider['image']}}');">
                            </div><!-- End .banner -->
                            <nav class="toolbox">
                                <div class="toolbox-left">
                                    <div class="toolbox-item toolbox-sort">
                                        <div class="select-custom">
                                            <select name="orderby" class="form-control">
                                                <option value="menu_order" selected="selected">Default sorting</option>
                                                <option value="popularity">Sort by popularity</option>
                                                <option value="rating">Sort by average rating</option>
                                                <option value="date">Sort by newness</option>
                                                <option value="price">Sort by price: low to high</option>
                                                <option value="price-desc">Sort by price: high to low</option>
                                            </select>
                                        </div><!-- End .select-custom -->

                                        <a href="#" class="sorter-btn" title="Set Ascending Direction"><span class="sr-only">Set Ascending Direction</span></a>
                                    </div><!-- End .toolbox-item -->
                                </div><!-- End .toolbox-left -->

                                <div class="toolbox-item toolbox-show">
                                <label>Showing 1–9 of 60 results</label>
                            </div><!-- End .toolbox-item -->

                                
                            </nav>
                            
                            <div class="row row-sm">
                                @foreach ($newArrivalProductData as $keyNewArrivalProductData => $valueNewArrivalProductData)
								
                                    <div class="col-6 col-md-4">
                                    <div class="product-default">
                                        <figure>
                                            <a href="">
                                                <img  src="{{ asset('assets/upload_images/product') }}/{{$valueNewArrivalProductData['image']}}">
                                            </a>
                                        </figure>
                                        <div class="product-details">
                                            
                                            <h2 class="product-title">
                                                <a href="{{route('productDetail','')}}/{{$valueNewArrivalProductData->id}}">{{str_limit($valueNewArrivalProductData->name, 30)}}</a>
                                            </h2>
                                            <div class="price-box">
                                                {{-- <span class="product-price">$9.00</span> --}}
                                                <span class="product-price">₹{{$valueNewArrivalProductData['mrp']}}</span>
                                                <span class="product-prices price">₹{{$valueNewArrivalProductData['price']}}</span>
                                            </div><!-- End .price-box -->
                                            <div class="product-action">
                                                <a href="#" class="btn-icon-wish"><i class="icon-heart"></i></a>
                                                <button class="btn-icon btn-add-cart view-details" id="product_{{$valueNewArrivalProductData['id']}}" data-toggle="modal" data-target="#addCartModal2"><i class="icon-bag"></i>ADD TO CART</button>
                                                <a href="" class="btn-quickview" title="Quick View"><i class="fas fa-external-link-alt"></i></a> 
                                            </div>
                                        </div><!-- End .product-details -->
                                    </div>
                                </div>
                                @endforeach
                            </div>

                            

                            <nav class="toolbox toolbox-pagination">
                                <div class="toolbox-item toolbox-show">
                                <label>Showing 1–9 of 60 results</label>
                            </div><!-- End .toolbox-item -->

                                <ul class="pagination">
                                    <li class="page-item disabled">
                                        <a class="page-link page-link-btn" href="#"><i class="icon-angle-left"></i></a>
                                    </li>
                                    <li class="page-item active">
                                        <a class="page-link" href="#">1 <span class="sr-only">(current)</span></a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item"><a class="page-link" href="#">4</a></li>
                                    <li class="page-item"><span>...</span></li>
                                    <li class="page-item"><a class="page-link" href="#">15</a></li>
                                    <li class="page-item">
                                        <a class="page-link page-link-btn" href="#"><i class="icon-angle-right"></i></a>
                                    </li>
                                </ul>
                            </nav>
                        </div><!-- End .col-lg-9 -->
                        <div class="row">
                                <div id="nn"></div>
                            </div>
                        <aside class="sidebar-shop col-lg-3 order-lg-first">
                            <div class="sidebar-wrapper">
                                <div class="widget">
                                    <h3 class="widget-title">
                                        <a data-toggle="collapse" href="#widget-body-1" role="button" aria-expanded="true" aria-controls="widget-body-1">Categories</a>
                                    </h3>

                                    <div class="collapse show" id="widget-body-1">
                                        <div class="widget-body">
                                            <ul class="cat-list">
                                                @foreach ($categoryData as $keyCategoryData => $valueCategoryData)
                                                  <li class="categories" id="{{$valueCategoryData['id']}}"><a class="categories" href="#categories">{{$valueCategoryData['name']}}</a></li>
                                                @endforeach
                                            </ul>
                                        </div><!-- End .widget-body -->
                                    </div><!-- End .collapse -->
                                </div><!-- End .widget -->

                                <div class="widget">
                                    <h3 class="widget-title">
                                        <a data-toggle="collapse" href="#widget-body-2" role="button" aria-expanded="true" aria-controls="widget-body-2">Price</a>
                                    </h3>

                                    <div class="collapse show" id="widget-body-2">
                                        <div class="widget-body">
                                            <form action="#">
                                                <div class="price-slider-wrapper">
                                                    <div id="price-slider"></div><!-- End #price-slider -->
                                                </div><!-- End .price-slider-wrapper -->

                                                <div class="filter-price-action">
                                                    <button type="submit" class="btn btn-primary">Filter</button>

                                                    <div class="filter-price-text">
                                                        <span id="filter-price-range"></span>
                                                    </div><!-- End .filter-price-text -->
                                                </div><!-- End .filter-price-action -->
                                            </form>
                                        </div><!-- End .widget-body -->
                                    </div><!-- End .collapse -->
                                </div><!-- End .widget -->

                                <div class="widget">
                                    <h3 class="widget-title">
                                        <a data-toggle="collapse" href="#widget-body-3" role="button" aria-expanded="true" aria-controls="widget-body-3">Size</a>
                                    </h3>

                                    <div class="collapse show" id="widget-body-3">
                                        <div class="widget-body">
                                            <ul class="config-size-list">
                                                @foreach ($sizeData as $keySizeData => $valueSizeData) 
                                                  <li class="size" id="{{$valueSizeData->id}}"><a href="#sizedetail" class="size">{{$valueSizeData->name}}</a></li>
                                                  @endforeach
                                            </ul>
                                        </div><!-- End .widget-body -->
                                    </div><!-- End .collapse -->
                                </div><!-- End .widget -->

                                <div class="widget">
                                    <h3 class="widget-title">
                                        <a data-toggle="collapse" href="#widget-body-4" role="button" aria-expanded="true" aria-controls="widget-body-4">Brands</a>
                                    </h3>

                                    <div class="collapse show" id="widget-body-4">
                                        <div class="widget-body">
                                            <ul class="cat-list">
                                                @foreach ($brandsData as $keyBrandsData => $valueBrandsData) 
                                                  <li class="brand" id="{{$valueBrandsData['id']}}"><a class="brand" href="#brand">{{$valueBrandsData['name']}}
                                                     <span style="cursor: pointer;">{{$valueBrandsData['product_count']}}</span></a>
                                                  </li>
                                                  @endforeach
                                            </ul>
                                        </div><!-- End .widget-body -->
                                    </div><!-- End .collapse -->
                                </div><!-- End .widget -->

                                <div class="widget">
                                    <h3 class="widget-title">
                                        <a data-toggle="collapse" href="#widget-body-6" role="button" aria-expanded="true" aria-controls="widget-body-6">Color</a>
                                    </h3>

                                    <div class="collapse show" id="widget-body-6">
                                        <div class="widget-body">
                                            <ul class="config-swatch-list">
                                                {{-- <li>
                                                    <a href="#" style="background-color: #4090d5;"></a>
                                                </li>
                                                <li class="active">
                                                    <a href="#" style="background-color: #f5494a;"></a>
                                                </li>
                                                <li>
                                                    <a href="#" style="background-color: #fca309;"></a>
                                                </li>
                                                <li>
                                                    <a href="#" style="background-color: #11426b;"></a>
                                                </li>
                                                <li>
                                                    <a href="#" style="background-color: #f0f0f0;"></a>
                                                </li>
                                                <li>
                                                    <a href="#" style="background-color: #3fd5c9;"></a>
                                                </li>
                                                <li>
                                                    <a href="#" style="background-color: #979c1c;"></a>
                                                </li>
                                                <li>
                                                    <a href="#" style="background-color: #7d5a3c;"></a>
                                                </li> --}}

                                                @foreach ($colorsData as $key_ColorsData => $value_ColorsData)
                                                  <li class="color" id="{{$value_ColorsData->id}}"><a href="#color" class="color" style="background-color: {{$value_ColorsData->hex_code}};cursor: pointer;"  ></a>
                                                  </li>
                                                  @endforeach
                                            </ul>
                                        </div><!-- End .widget-body -->
                                    </div><!-- End .collapse -->
                                </div><!-- End .widget -->

                                <div class="widget widget-featured">
                                    <h3 class="widget-title">Featured Products</h3>
                                    
                                    <div class="widget-body">
                                        <div class="owl-carousel widget-featured-products">
                                            <div class="featured-col">
                                                @foreach ($featuredProduct as $keyFeaturedProduct => $valueFeaturedProduct)
                                                    <div class="product-default left-details product-widget">
                                                        <figure>
                                                            <a href="">
                                                                <img src="{{ asset('assets/upload_images/product') }}/{{$valueFeaturedProduct['image']}}">
                                                            </a>
                                                        </figure>
                                                        <div class="product-details">
                                                            <h2 class="product-title">
                                                                <a href="">{{$valueFeaturedProduct['name']}}</a>
                                                            </h2>
                                                            <div class="ratings-container">
                                                                <div class="product-ratings">
                                                                    <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                                                                    <span class="tooltiptext tooltip-top"></span>
                                                                </div><!-- End .product-ratings -->
                                                            </div><!-- End .product-container -->
                                                            <div class="price-box">
                                                                @if($valueFeaturedProduct['discount'] != 0 )
                                                                   <span class="product-price">₹{{$valueFeaturedProduct['mrp']}}</span>
                                                                   <span class="product-prices" style="color: red">₹{{$valueFeaturedProduct['price']}}</span>
                                                                  @else
                                                                  <span class="product-price">₹{{$valueFeaturedProduct['price']}}</span> 
                                                                  @endif 
                                                            </div><!-- End .price-box -->
                                                        </div><!-- End .product-details -->
                                                    </div>
                                                @endforeach
                                                {{-- <div class="product-default left-details product-widget">
                                                    <figure>
                                                        <a href="">
                                                            <img src="assets/images/products/small/product-2.jpg">
                                                        </a>
                                                    </figure>
                                                    <div class="product-details">
                                                        <h2 class="product-title">
                                                            <a href="">Product Short Name</a>
                                                        </h2>
                                                        <div class="ratings-container">
                                                            <div class="product-ratings">
                                                                <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                                                                <span class="tooltiptext tooltip-top"></span>
                                                            </div><!-- End .product-ratings -->
                                                        </div><!-- End .product-container -->
                                                        <div class="price-box">
                                                            <span class="product-price">$49.00</span>
                                                        </div><!-- End .price-box -->
                                                    </div><!-- End .product-details -->
                                                </div>
                                                <div class="product-default left-details product-widget">
                                                    <figure>
                                                        <a href="">
                                                            <img src="assets/images/products/small/product-3.jpg">
                                                        </a>
                                                    </figure>
                                                    <div class="product-details">
                                                        <h2 class="product-title">
                                                            <a href="">Product Short Name</a>
                                                        </h2>
                                                        <div class="ratings-container">
                                                            <div class="product-ratings">
                                                                <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                                                                <span class="tooltiptext tooltip-top"></span>
                                                            </div><!-- End .product-ratings -->
                                                        </div><!-- End .product-container -->
                                                        <div class="price-box">
                                                            <span class="product-price">$49.00</span>
                                                        </div><!-- End .price-box -->
                                                    </div><!-- End .product-details -->
                                                </div> --}}
                                            </div><!-- End .featured-col -->

                                            <div class="featured-col">
                                                <div class="product-default left-details product-widget">
                                                    <figure>
                                                        <a href="">
                                                            <img src="assets/images/products/small/product-4.jpg">
                                                        </a>
                                                    </figure>
                                                    <div class="product-details">
                                                        <h2 class="product-title">
                                                            <a href="">Product Short Name</a>
                                                        </h2>
                                                        <div class="ratings-container">
                                                            <div class="product-ratings">
                                                                <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                                                                <span class="tooltiptext tooltip-top"></span>
                                                            </div><!-- End .product-ratings -->
                                                        </div><!-- End .product-container -->
                                                        <div class="price-box">
                                                            <span class="product-price">$49.00</span>
                                                        </div><!-- End .price-box -->
                                                    </div><!-- End .product-details -->
                                                </div>
                                                <div class="product-default left-details product-widget">
                                                    <figure>
                                                        <a href="">
                                                            <img src="assets/images/products/small/product-5.jpg">
                                                        </a>
                                                    </figure>
                                                    <div class="product-details">
                                                        <h2 class="product-title">
                                                            <a href="">Product Short Name</a>
                                                        </h2>
                                                        <div class="ratings-container">
                                                            <div class="product-ratings">
                                                                <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                                                                <span class="tooltiptext tooltip-top"></span>
                                                            </div><!-- End .product-ratings -->
                                                        </div><!-- End .product-container -->
                                                        <div class="price-box">
                                                            <span class="product-price">$49.00</span>
                                                        </div><!-- End .price-box -->
                                                    </div><!-- End .product-details -->
                                                </div>
                                                <div class="product-default left-details product-widget">
                                                    <figure>
                                                        <a href="">
                                                            <img src="assets/images/products/small/product-6.jpg">
                                                        </a>
                                                    </figure>
                                                    <div class="product-details">
                                                        <h2 class="product-title">
                                                            <a href="">Product Short Name</a>
                                                        </h2>
                                                        <div class="ratings-container">
                                                            <div class="product-ratings">
                                                                <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                                                                <span class="tooltiptext tooltip-top"></span>
                                                            </div><!-- End .product-ratings -->
                                                        </div><!-- End .product-container -->
                                                        <div class="price-box">
                                                            <span class="product-price">$49.00</span>
                                                        </div><!-- End .price-box -->
                                                    </div><!-- End .product-details -->
                                                </div>
                                            </div><!-- End .featured-col -->
                                        </div><!-- End .widget-featured-slider -->
                                    </div><!-- End .widget-body -->
                                </div><!-- End .widget -->

                                
                            </div><!-- End .sidebar-wrapper -->
                        </aside><!-- End .col-lg-3 -->
                    </div><!-- End .row -->
                </div><!-- End .container-box -->
            </div><!-- End .container -->
        </main><!-- End .main -->

        
    </div><!-- End .page-wrapper -->

    <div class="mobile-menu-overlay"></div><!-- End .mobil-menu-overlay -->

    <div class="mobile-menu-container">
        <div class="mobile-menu-wrapper">
            <span class="mobile-menu-close"><i class="icon-cancel"></i></span>
            <nav class="mobile-nav">
                <ul class="mobile-menu">
                    <li><a href="index.html">Home</a></li>
                    <li>
                        <a href="category.html">Categories</a>
                        <ul>
                            <li><a href="category-banner-full-width.html">Full Width Banner</a></li>
                            <li><a href="category-banner-boxed-slider.html">Boxed Slider Banner</a></li>
                            <li><a href="category-banner-boxed-image.html">Boxed Image Banner</a></li>
                            <li><a href="category-sidebar-left.html">Left Sidebar</a></li>
                            <li><a href="category-sidebar-right.html">Right Sidebar</a></li>
                            <li><a href="category-flex-grid.html">Product Flex Grid</a></li>
                            <li><a href="category-horizontal-filter1.html">Horizontal Filter 1</a></li>
                            <li><a href="category-horizontal-filter2.html">Horizontal Filter 2</a></li>
                            <li><a href="#">Product List Item Types</a></li>
                            <li><a href="category-infinite-scroll.html">Ajax Infinite Scroll<span class="tip tip-new">New</span></a></li>
                            <li><a href="category-3col.html">3 Columns Products</a></li>
                            <li><a href="category-4col.html">4 Columns Products</a></li>
                            <li><a href="category-5col.html">5 Columns Products</a></li>
                            <li><a href="category-6col.html">6 Columns Products</a></li>
                            <li><a href="category-7col.html">7 Columns Products</a></li>
                            <li><a href="category-8col.html">8 Columns Products</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="product.html">Products</a>
                        <ul>
                            <li>
                                <a href="#">Variations</a>
                                <ul>
                                    <li><a href="product.html">Horizontal Thumbnails</a></li>
                                    <li><a href="product-full-width.html">Vertical Thumbnails<span class="tip tip-hot">Hot!</span></a></li>
                                    <li><a href="product.html">Inner Zoom</a></li>
                                    <li><a href="product-addcart-sticky.html">Addtocart Sticky</a></li>
                                    <li><a href="product-sidebar-left.html">Accordion Tabs</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Variations</a>
                                <ul>
                                    <li><a href="product-sticky-tab.html">Sticky Tabs</a></li>
                                    <li><a href="product-simple.html">Simple Product</a></li>
                                    <li><a href="product-sidebar-left.html">With Left Sidebar</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Product Layout Types</a>
                                <ul>
                                    <li><a href="product.html">Default Layout</a></li>
                                    <li><a href="product-extended-layout.html">Extended Layout</a></li>
                                    <li><a href="product-full-width.html">Full Width Layout</a></li>
                                    <li><a href="product-grid-layout.html">Grid Images Layout</a></li>
                                    <li><a href="product-sticky-both.html">Sticky Both Side Info<span class="tip tip-hot">Hot!</span></a></li>
                                    <li><a href="product-sticky-info.html">Sticky Right Side Info</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">Pages<span class="tip tip-hot">Hot!</span></a>
                        <ul>
                            <li><a href="cart.html">Shopping Cart</a></li>
                            <li>
                                <a href="#">Checkout</a>
                                <ul>
                                    <li><a href="checkout-shipping.html">Checkout Shipping</a></li>
                                    <li><a href="checkout-shipping-2.html">Checkout Shipping 2</a></li>
                                    <li><a href="checkout-review.html">Checkout Review</a></li>
                                </ul>
                            </li>
                            <li><a href="about.html">About</a></li>
                            <li><a href="#" class="login-link">Login</a></li>
                            <li><a href="forgot-password.html">Forgot Password</a></li>
                        </ul>
                    </li>
                    <li><a href="blog.html">Blog</a>
                        <ul>
                            <li><a href="single.html">Blog Post</a></li>
                        </ul>
                    </li>
                    <li><a href="contact.html">Contact Us</a></li>
                    <li><a href="#">Special Offer!<span class="tip tip-hot">Hot!</span></a></li>
                    <li><a href="https://1.envato.market/DdLk5" target="_blank">Buy Porto!</a></li>
                </ul>
            </nav><!-- End .mobile-nav -->

            <div class="social-icons">
                <a href="#" class="social-icon" target="_blank"><i class="icon-facebook"></i></a>
                <a href="#" class="social-icon" target="_blank"><i class="icon-twitter"></i></a>
                <a href="#" class="social-icon" target="_blank"><i class="icon-instagram"></i></a>
            </div><!-- End .social-icons -->
        </div><!-- End .mobile-menu-wrapper -->
    </div><!-- End .mobile-menu-container -->
    <!-- Add Cart Modal -->
    <div class="modal fade" id="addCartModal2" tabindex="-1" role="dialog" aria-labelledby="addCartModal2" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-body add-cart-box text-center" id="tt">
            
            
          </div>
        </div>
      </div>
    </div>

    <a id="scroll-top" href="#top" title="Top" role="button"><i class="icon-angle-up"></i></a>

    <!-- Plugins JS File -->
    <script src="assets/js/plugins.min.js"></script>
    <script src="assets/js/nouislider.min.js"></script>

    <!-- Main JS File -->
    <script src="assets/js/main.min.js"></script>

    <script type="text/javascript">
        $(document).on('click','.view-details',function(){
            var str = this.id;
            var product_data = str.split("_");
            var sliderDefaultOptions = {
                            loop: true,
                            margin: 0,
                            responsiveClass: true,
                            nav: false,
                            navText: ['<i class="icon-left-open-big">', '<i class="icon-right-open-big">'],
                            dots: true,
                            autoplay: true,
                            autoplayTimeout: 20000,
                            items: 1,
                          };

            $.ajax({
                'url' : "{{route('productDetailnew','')}}/"+product_data[1],
                'type': 'GET',
                'dataType' : 'JSON',
                'success' : function(data){
                    $("#tt").html(data.html);
                    $('.product-single-default .product-single-carousel').owlCarousel($.extend(true, {}, sliderDefaultOptions, {
                        nav: true,
                        navText: ['<i class="icon-angle-left">', '<i class="icon-angle-right">'],
                        dotsContainer: '#carousel-custom-dots',
                        autoplay: false,
                        onInitialized: function () {
                          var $source = this.$element;

                          if ($.fn.elevateZoom) {
                            $source.find('img').each(function () {
                              var $this = $(this),
                                zoomConfig = {
                                  responsive: true,
                                  zoomWindowFadeIn: 350,
                                  zoomWindowFadeOut: 200,
                                  borderSize: 0,
                                  zoomContainer: $this.parent(),
                                  zoomType: 'inner',
                                  cursor: 'grab'
                                };
                              $this.elevateZoom(zoomConfig);
                            });
                          }
                        },
                      }));

                      $('.product-single-extended .product-single-carousel').owlCarousel($.extend(true, {}, sliderDefaultOptions, {
                        dots: false,
                        autoplay: false,
                        responsive: {
                          0: {
                            items: 1
                          },
                          480: {
                            items: 2
                          },
                          1200: {
                            items: 3
                          }
                        }
                      }));

                      $('#carousel-custom-dots .owl-dot').click(function () {
                        $('.product-single-carousel').trigger('to.owl.carousel', [$(this).index(), 300]);
                      });
                }
            });
        });

        $(document).on('click','.colordetail',function(){
            var str = this.id;
            var product_data = str.split("_");
            var sliderDefaultOptions = {
                            loop: true,
                            margin: 0,
                            responsiveClass: true,
                            nav: false,
                            navText: ['<i class="icon-left-open-big">', '<i class="icon-right-open-big">'],
                            dots: true,
                            autoplay: true,
                            autoplayTimeout: 20000,
                            items: 1,
                          };

            $.ajax({
                'url' : "{{route('productDetailnew','')}}/"+product_data[1],
                'type': 'GET',
                'dataType' : 'JSON',
                'success' : function(data){
                    $("#tt").html(data.html);
                    $('.product-single-default .product-single-carousel').owlCarousel($.extend(true, {}, sliderDefaultOptions, {
                        nav: true,
                        navText: ['<i class="icon-angle-left">', '<i class="icon-angle-right">'],
                        dotsContainer: '#carousel-custom-dots',
                        autoplay: false,
                        onInitialized: function () {
                          var $source = this.$element;

                          if ($.fn.elevateZoom) {
                            $source.find('img').each(function () {
                              var $this = $(this),
                                zoomConfig = {
                                  responsive: true,
                                  zoomWindowFadeIn: 350,
                                  zoomWindowFadeOut: 200,
                                  borderSize: 0,
                                  zoomContainer: $this.parent(),
                                  zoomType: 'inner',
                                  cursor: 'grab'
                                };
                              $this.elevateZoom(zoomConfig);
                            });
                          }
                        },
                      }));

                      $('.product-single-extended .product-single-carousel').owlCarousel($.extend(true, {}, sliderDefaultOptions, {
                        dots: false,
                        autoplay: false,
                        responsive: {
                          0: {
                            items: 1
                          },
                          480: {
                            items: 2
                          },
                          1200: {
                            items: 3
                          }
                        }
                      }));

                      $('#carousel-custom-dots .owl-dot').click(function () {
                        $('.product-single-carousel').trigger('to.owl.carousel', [$(this).index(), 300]);
                      });
                }
            });
        });
    
    </script>
</body>
@endsection