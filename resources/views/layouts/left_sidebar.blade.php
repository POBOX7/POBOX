<aside class="sidebar-shop col-lg-3 order-lg-first" style="padding-left: 0;padding-right: 0">
   <div class="sidebar-wrapper">
      <div class="widget" style="padding-left: 0;">
         <h3 class="widget-title ">
            <div class="row">
               <div class="col-sm-7">
                  <p class="clearall">Filters</p>
               </div>
               <div class="col-sm-5">
                  <a href="#" class="clearall" id="clearall" style="float: right;">Clear All</a>
               </div>
            </div>
         </h3>
      </div>
      <!-- End .widget -->
      <div class="widget" style="padding-left: 0;">
         <h3 class="widget-title">
            <a data-toggle="collapse" href="#widget-body-1" role="button" aria-expanded="true" aria-controls="widget-body-1">categories</a>
         </h3>
         <div class="collapse show" id="widget-body-1">
            <div class="widget-body">
               <ul class="cat-list department">
                  @foreach ($categoryData as $keyCategoryData => $valueCategoryData)
                  <li ><a href="{{$valueCategoryData['id']}}" style="line-break: anywhere;" value="{{$valueCategoryData['id']}}" name="{{$valueCategoryData['id']}}" onclick="return myDepartment();">{{$valueCategoryData['name']}}</a></li>
                  @endforeach
               </ul>
            </div>
            <!-- End .widget-body -->
         </div>
         <!-- End .collapse -->
      </div>
      <!-- End .widget -->
      <div class="widget price-filter" style="padding-left: 0;">
         <h3 class="widget-title">
            <a data-toggle="collapse" href="#widget-body-2" role="button" aria-expanded="true" aria-controls="widget-body-2">Price</a>
         </h3>
         <div class="collapse show" id="widget-body-2">
            <div class="widget-body">
               <!-- <form action="#"> -->
               <div class="price-slider-wrapper">
                  <div id="price-slider" onchange="myFunction()"></div>
                  <!-- End #price-slider -->
               </div>
               <!-- End .price-slider-wrapper -->
               <div class="filter-price-action">
                  <button type="submit"  onclick="myFunction()" class="btn btn-primary">Apply</button>
                  <div class="filter-price-text">
                     <span id="filter-price-range"></span>
                  </div>
                  <!-- End .filter-price-text -->
               </div>
               <!-- End .filter-price-action -->
               <!-- </form> -->
            </div>
            <!-- End .widget-body -->
         </div>
         <!-- End .collapse -->
      </div>
      <!-- End .widget -->
      <div class="widget" style="padding-left: 0;">
         <h3 class="widget-title">
            <a data-toggle="collapse" href="#widget-body-6" role="button" aria-expanded="true" aria-controls="widget-body-6">Color</a>
         </h3>
         <div class="collapse show" id="widget-body-6">
            <div class="widget-body">
               <!-- <ul class="config-swatch-list">
                  <li>
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
                  </li>
                  </ul> -->
               <div class="color_filter" id="color_filter">
                  @foreach ($colorsData as $key_ColorsData => $value_ColorsData)
                  <label class="container">
                  <input type="checkbox" name="type" value="{{$value_ColorsData->id}}">
                  <span  class="checkmark" style="background-color: {{$value_ColorsData->hex_code}};cursor: pointer;"></span>
                  </label>
                  @endforeach
               </div>
               <style>
                  /* Hide the browser's default checkbox */
                  .color_filter .container input {
                  position: absolute;
                  opacity: 0;
                  cursor: pointer;
                  height: 0;
                  width: 0;
                  }
                  /* Create a custom checkbox */
                  .color_filter .checkmark {
                  border: 1px solid black !important;
                  position: absolute;
                  top: 0;
                  left: 0;
                  height: 25px;
                  width: 25px;
                  /*background-color: #eee;*/
                  }
                  /* On mouse-over, add a grey background color */
                  .color_filter .container:hover input ~ .checkmark {
                  background-color: #ccc;
                  border: 1px solid black !important;
                  }
                  /* When the checkbox is checked, add a blue background */
                  .color_filter .container input:checked ~ .checkmark {
                  /*background-color: #2196F3;*/
                  border: 1px solid red !important;
                  }
                  /* Create the checkmark/indicator (hidden when not checked) */
                  .color_filter .checkmark:after {
                  content: "";
                  position: absolute;
                  display: none;
                  }
                  /* Show the checkmark when checked */
                  .color_filter .container input:checked ~ .checkmark:after {
                  display: block;
                  }
                  .color_filter label.container {
                  border: 0px!important;
                  }
                  /* Style the checkmark/indicator */
                  .color_filter .container .checkmark:after {
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
               </style>
            </div>
            <!-- End .widget-body -->
         </div>
         <!-- End .collapse -->
      </div>
      <!-- End .widget -->
      <div class="widget" style="padding-left: 0;">
         <h3 class="widget-title">
            <a data-toggle="collapse" href="#widget-body-3" role="button" aria-expanded="true" aria-controls="widget-body-3">Size</a>
         </h3>
         <div class="collapse show" id="widget-body-3">
            <div class="widget-body">
               <!--  <ul class="config-size-list">
                  <li><a href="#">S</a></li>
                  <li class="active"><a href="#">M</a></li>
                  <li><a href="#">L</a></li>
                  <li><a href="#">XL</a></li>
                  <li><a href="#">2XL</a></li>
                  <li><a href="#">3XL</a></li>
                  </ul> -->
               <div class="size-filter" id="size_filter" style="padding-left: 0;">
                  @foreach ($sizeData as $keySizeData => $valueSizeData)
                  <label class="container">{{$valueSizeData->name}}
                  <input type="checkbox" name="type" value="{{$valueSizeData->id}}">
                  <span class="checkmark" style="cursor: pointer;"></span>
                  </label>
                  @endforeach
               </div>
               <style type="text/css">
                  label.container {
                  width: 25px;
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
                  .checkmark {
                  position: absolute;
                  top: 0;
                  left: 0;
                  height: 25px;
                  width: 25px;
                  /* background-color: #eee;*/
                  }
                  /* On mouse-over, add a grey background color */
                  .container:hover input ~ .checkmark {
                  /* background-color: #ccc;*/
                  }
                  /* When the checkbox is checked, add a blue background */
                  .container input:checked ~ .checkmark {
                  /* background-color: #2196F3;*/
                  }
                  /* Create the checkmark/indicator (hidden when not checked) */
                  .checkmark:after {
                  content: "";
                  position: absolute;
                  display: none;
                  }
                  /* Show the checkmark when checked */
                  .container input:checked ~ .checkmark:after {
                  display: block;
                  }
                  /* Style the checkmark/indicator */
                  .container .checkmark:after {
                  /* left: 23px; */
                  /* top: 5px; */
                  width: 32px;
                  height: 24px;
                  background: #1d70ba;
                  /* border-width: 0 3px 3px 0; */
                  /* -webkit-transform: rotate(45deg); */
                  -ms-transform: rotate(45deg);
                  /* transform: rotate(45deg); */
                  opacity: 0.5;
                  /* color: white; */
                  }
                  label.container input[type="checkbox"] {
                  opacity: 0;
                  }
               </style>
            </div>
            <!-- End .widget-body -->
            <div><a  data-toggle="modal" data-target="#myModal_size" style="cursor: pointer;font-size: 18px!important;color: #1a62ad;">Size Guide</a>  </div>
            <!-------------------Size guide pop code start----------------------->
            <!--  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button> -->
            <!-- Modal -->
            <style type="text/css">
               table.ks-table tr.ks-table-row ,table.ks-table td{
               border: 1px solid;
               text-align: center;
               }
               th.ks-table-cell.ks-table-header-cell {
               border: 1px solid;
               }
            </style>
            <div id="myModal_size" class="modal fade" role="dialog">
               <div class="modal-dialog">
                  <!-- Modal content-->
                  <div class="modal-content" style="width: 530px;">
                     <div class="modal-header">
                        <h4 class="modal-title" style="text-align: center;width: 100%;font-size: 24px;font-weight: 600;">Size Guide</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                     </div>
                     <div class="modal-body">
                        <table class="ks-table desktop-view-size-info" border="1" style="width: 100%;">
                           <tbody style="border: 1px solid;">
                              <tr class="ks-table-row">
                                 <th class="ks-table-cell ks-table-header-cell">SIZE</th>
                                 <th class="ks-table-cell ks-table-header-cell">CHEST (IN.)</th>
                                 <th class="ks-table-cell ks-table-header-cell">WAIST (IN.)</td>
                                 <th class="ks-table-cell ks-table-header-cell">HIPS (IN.)</th>
                                 <th class="ks-table-cell ks-table-header-cell">LENGTH (IN.)</th>
                                 <th class="ks-table-cell ks-table-header-cell">SHOULDER (IN.)</th>
                              </tr>
                              @foreach ($sizeInformation as $keySizeInformationData => $valueSizeInformationData)
                              <tr class="ks-table-row">
                                 <td class="ks-table-cell ks-table-header-cell">@foreach ($valueSizeInformationData['size_name'] as $key => $value)
                                    {{$value['name']}}
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
                              @endforeach
                           </tbody>
                        </table>
                        @foreach ($sizeInformation as $keySizeInformationData => $valueSizeInformationData)
                        <table class="ks-table mobile-view-size-info" border="1" style="width: 100%;">
                           <tbody style="border: 1px solid;">
                              <tr class="ks-table-row">
                                 <th class="ks-table-cell ks-table-header-cell">SIZE</th>
                                 <td class="ks-table-cell ks-table-header-cell">@foreach ($valueSizeInformationData['size_name'] as $key => $value)
                                    {{$value['name']}}
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
                              </th>
                           </tbody>
                        </table>
                        @endforeach 
                        @endforeach
                     </div>
                     <div class="modal-footer">
                        <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
                     </div>
                  </div>
               </div>
            </div>
            <!-------------------Size guide pop code end----------------------->
         </div>
         <!-- End .collapse -->
      </div>
      <!-- End .widget -->
      <div class="widget" style="padding-left: 0;">
         <h3 class="widget-title">
            <a data-toggle="collapse" href="#widget-body-4" role="button" aria-expanded="true" aria-controls="widget-body-4">Brand</a>
         </h3>
         <div class="collapse show" id="widget-body-4">
            <div class="widget-body">
               <ul class="cat-list brand">
                  @foreach ($brandsData as $keyBrandsData => $valueBrandsData)
                  <li style="line-break: anywhere;"><a href="{{$valueBrandsData['id']}}" value="{{$valueBrandsData['id']}}" name="{{$valueBrandsData['id']}}" onclick="return myDepartment();">{{$valueBrandsData['name']}}
                     <span style="cursor: pointer;">{{$valueBrandsData['product_count']}}</span></a>
                  </li>
                  @endforeach
               </ul>
            </div>
            <!-- End .widget-body -->
         </div>
         <!-- End .collapse -->
      </div>
      <!-- End .widget -->
      <div class="widget widget-featured" style="padding-left: 0;border-bottom: none!important;">
         <h3 class="widget-title">Featured</h3>
         <div class="widget-body">
            <div class="owl-carousel widget-featured-products">
               <div class="featured-col">
                  @foreach ($featuredProduct as $keyFeaturedProduct => $valueFeaturedProduct)
                  <div class="product-default left-details product-widget">
                     <figure>
                        <a href="">
                        <img style="width: 80px;height: 83px;" src=" {{ asset('assets/upload_images/product') }}/{{$valueFeaturedProduct['image']}}">
                        </a>
                     </figure>
                     <div class="product-details">
                        <h2 class="product-title">
                           <a href="" style="line-break: anywhere;">{{$valueFeaturedProduct['name']}}</a>
                        </h2>
                        <!-- <div class="ratings-container">
                           <div class="product-ratings">
                              @foreach ($valueFeaturedProduct['review'] as $keyReviewData => $valueReviewData)
                              <span class="ratings  width-{{$valueReviewData['rating']}}percent"></span>
                              <span class="tooltiptext tooltip-top"></span>
                              @endforeach
                           </div>
                        </div> -->
                        <!-- <div class="price-box">
                           <span class="product-price">$49.00</span>
                           </div> --><!-- End .price-box -->
                        <div class="price-box">
                           <span class="product-prices price" style="color: red">₹{{$valueFeaturedProduct['price']}}</span>
                           <br>
                           <span class="product-price mrp">₹{{$valueFeaturedProduct['mrp']}}</span>
                        </div>
                     </div>
                     <!-- End .product-details -->
                  </div>
                  @endforeach
               </div>
               <!-- End .featured-col -->
               <!-- End .featured-col -->
            </div>
            <!-- End .widget-featured-slider -->
         </div>
         <!-- End .widget-body -->
      </div>
      <!-- End .widget -->
      <!--  <div class="widget widget-block">
         <h3 class="widget-title">Custom HTML Block</h3>
         <h5>This is a custom sub-title.</h5>
         <p>Lorem ipsum dolor sit amet, consectetur elitad adipiscing Cras non placerat mi. </p>
         </div> --><!-- End .widget -->
   </div>
   <!-- End .sidebar-wrapper -->
</aside>
<!-- End .col-lg-3 -->
<script type = "text/javascript" >
    if (window.location.href.indexOf('/trending') > 0) {
        var page_url = "trending";
    }
var clearall = [];
$('a.clearall').click(function() {
    $('.container .checkmark:after ').css({
        'background-color': 'red',
        'color': 'green',
    });
    var id = $(this).attr('id');
    clearall.push(id);
    if (clearall.length > 1) {
        clearall.splice(0, 1);
    } 
    $.ajax({
        type: "get",
        url: "{{ url('/price-filter') }}",
        cache: !1,
        data: {
            clearall: clearall,
            _token: "{{ csrf_token() }}",
        },
        success: function(data) {
            $('#filter_div').html(data);
            $.ajax({
                type: "get",
                url: "{{ url('/colorbox') }}",
                cache: !1,
                data: {
                    _token: "{{ csrf_token() }}",
                },
                success: function(data) {
                    $('#color_filter').html(data);
                }
            });
            $.ajax({
                type: "get",
                url: "{{ url('/sizebox') }}",
                cache: !1,
                data: {
                    _token: "{{ csrf_token() }}",
                },
                success: function(data) {
                    $('#size_filter').html(data);
                }
            });
        }
    }); 
    return false;
}); 
/*clear all*/

function myFunction() {
    var s = document.getElementById('filter-price-range').innerHTML; 
    function getSecondPart(str) {
        return str.split('-')[1];
    } 
    function getfirstPart(str) {
        return str.split('-')[0];
    }
    var maxprice_cur = getSecondPart(s).replace("₹", "");
    var minprice_cur = getfirstPart(s);
    var minprice_str = minprice_cur.replace("₹", "");
    var maxprice_str = maxprice_cur.replace("₹", "");
    var minprice = parseInt(minprice_str.replace(/\,(\d\d)$/, ".₹1").replace(',', ''));
    var maxprice = parseInt(maxprice_str.replace(/\,(\d\d)$/, ".₹1").replace(',', ''));
    console.log(minprice);
    console.log(maxprice);
    var max_price = [];
    var min_price = []; 
    min_price.push(minprice);
    if (min_price.length > 1) {
        min_price.splice(0, 1);
    }
    max_price.push(maxprice);
    if (max_price.length > 1) {
        max_price.splice(0, 1);
    }
    $.ajax({
        type: "get",
        url: "{{ url('/price-filter') }}",
        cache: !1,
        data: {
            min_price: min_price,
            max_price: max_price,
            _token: "{{ csrf_token() }}",
        },
        success: function(data) {
            $('#filter_div').html(data);
        }
    }); 
}  
var department = [];
$("ul.department").click(function(event) {
    var target = $(event.target);
    if (target.is("a")) {
        department.push(target.attr('href'));
        if (department.length > 1) {
            department.splice(0, 1);
        }
        $.ajax({
            type: "get",
            url: "{{ url('/price-filter') }}",
            cache: !1,
            data: {
                department: department,
                _token: "{{ csrf_token() }}",
            },
            success: function(data) {
                $('#filter_div').html(data);
            }
        });
    }
    return false;
}); 
//Brand Filter
var brand = [];
$("ul.brand").click(function(event) {
    var target = $(event.target);
    if (target.is("a")) {
        department.push(target.attr('href'));
        if (department.length > 1) {
            department.splice(0, 1);
        }
        var brand = []; 
        $.ajax({
            type: "get",
            url: "{{ url('/price-filter') }}",
            cache: !1,
            data: {
                brand_filter: department,
                _token: "{{ csrf_token() }}",
            },
            success: function(data) {
                $('#filter_div').html(data);
            }
        });
    }
    return false;
});


// size filter
$('#size_filter').change(function() {
    var size_filter = []; {
        $('#size_filter :checked').each(function() { 
            size_filter.push($(this).val()); 
        }); 
        $.ajax({
            type: "get",
            url: "{{ url('/price-filter') }}",
            cache: !1,
            data: {
                size_filter: size_filter,
                _token: "{{ csrf_token() }}",
            },
            success: function(data) {
                $('#filter_div').html(data);
            }
        });
    }
    return false;
});

//color filter
$('#color_filter').change(function() {
    var color_filter = []; {
        $('#color_filter :checked').each(function() { 
            color_filter.push($(this).val()); 
        }); 
        $.ajax({
            type: "get",
            url: "{{ url('/price-filter') }}",
            cache: !1,
            data: {
                color_filter: color_filter,
                _token: "{{ csrf_token() }}",
            },
            success: function(data) {
                $('#filter_div').html(data);
            }
        });
    }
    return false;
});


function filterOrder(chosen) { 
    order.push(chosen);
    if (order.length > 1) {
        order.splice(0, 1); 
    } 
    $.ajax({
        type: "get",
        url: "{{ url('/price-filter') }}",
        cache: !1,
        data: {
            featured_filter: featured,
            name_a_to_z_filter: name_a_to_z,
            name_z_to_a_filter: name_z_to_a,
            price_low_to_high_filter: price_low_to_high,
            price_high_to_low_filter: price_high_to_low,
            price_slider_lower_filter: price_slider_lower,
            date_new_to_old_filter: date_new_to_old,
            date_old_to_new_filter: date_old_to_new,
            _token: "{{ csrf_token() }}",
        },
        success: function(data) {
            $('#filter_div').html(data);
        }
    });
    return false;
}
 </script>

<style type="text/css">
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
   width: 368px !important;
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
   width: 530px;
   min-width: 400px !important;
   padding: 30px;
   }
   }
   div#myModal_size .modal-dialog {
   max-width: 500px !important;
   }
   table.ks-table.mobile-view-size-info{
   display: none;
   }
   table.ks-table.desktop-view-size-info {
   display: block;
   }
</style>