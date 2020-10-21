@extends('new_resources.layouts.new_app') 
@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('admin/vendors/sweetalert2/sweetalert2.min.css') }}">
<style type="text/css">
.btn-remove::before{
    display: none;
}
.cart_size ul li {
    font-size: 18px!important;
    }
th.qty-col{
padding-right: 66px!important;
}
    th, td {
    
    border-left: 0!important;
    border-right: 0!important;
    border-bottom: 0;
}
table {
    border: none!important;
}
button.btn.btn-sm.btn-primary ,a.btn.btn-block.btn-sm.btn-primary{
    background: #1d70ba!important;
}
.cart-summary h4 a.collapsed::after {
    content: none;
}
.product-col .product-image-container{
    border: 0px!important;
}

.cart-discount {
    margin-top: 25px;
}
.product-col .product-image-container {
    max-width: 81px!important;
}
h2.product-title a {
    line-height: 3;
}
small {
    margin-top: 5px;
    border: 1px solid;
    background: #1d70ba;
    padding: 5px 15px;
    color: #fff;
    font-weight: 700;
    font-size: 12px;
}
.cart_size,.cart_color{
    float: left;
}
.cart_color ul li {
    /*padding: 9px 0px 9px 0px;
    color: transparent;*/
}
.cart_size ul li {
    /*background: #1d70ba;
    padding: 9px 0px 9px 0px;
    margin-top: 0;
    color: #fff;*/
}
.cart_color {
    margin-left: 5px;
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
</style>
<main class="main">
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home_1')}}"><!-- <i class="icon-home"></i> -->Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Shopping Cart</li>
                    </ol>
                </div><!-- End .container -->
            </nav>

                                
            <div class="container">
                <div class="container-box">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="cart-table-container">
                                <table class="table table-cart">
                                    <thead>
                                        <tr>
                                            <th class="product-col">Product</th>
                                            <th class="price-col">Price</th>
                                            <th class="qty-col">Qty</th>
                                            <th>Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <form action="{{route('updatecart')}}" method="post"> 
                                    @csrf
                                    @if(Auth::id() > 0)
                                     <input type="hidden" name="userid" id="userid" value="{{auth()->user()->id}}">
                                 @endif
                                 
                                        @php
                                               $Subtotal  = 0;
                                                $discount=0;
                                                $GST=0;
                                           @endphp
                                        @if(count($productDetail)>0)
                                            
                                            @foreach($productDetail as $keye => $value)
                                            
                                     <input type="hidden" name="product_id[]"  value="{{$value->product_id}}">
                                            @php
                                                   $product_size =  App\ProductSize::select('size_id')->where('product_size.product_id',$value->product_id)->pluck('size_id')->toArray();
                                                   $product_size_data =  App\ProductSize::where('product_size.product_id',$value->product_id)->get();
                                                   $sizeData = App\Sizes::where('status',1)->where('is_deleted',0)->get();
                                         
                                            @endphp
                                        
                                        <tr class="product-row">
                                            <td class="product-col">
                                                <figure class="product-image-container">
                                                    <a href="{{route('productDetail',$value->product_id)}}" class="product-image" target="_blank" > 
                                                        <img src="{{ asset('assets/upload_images/product') }}/{{$value->image}}" alt="product">
                                                    </a>
                                                </figure>
                                                <h2 class="product-title">
                                                    <a href="{{route('productDetail',$value->product_id)}}" target="_blank">{{$value->name}}</a>
                                                    <br>
                                                     <div class="cart_size">
                                                           <ul>
                                                            <li>{{$value->size_name}}</li>
                                                            <li><input type="hidden" name="size[]" value="{{$value->size_id}}"></li>
                                                        </ul>
                                                    </div>
                                                    <div class="cart_color">
                                                        <ul>
                                                            <li style="background: {{$value->hex_code}}"></li>
                                                        </ul>
                                                    </div>
                                                    <span style="margin-top: 5px;"><label style="font-weight: 600;color: #7a7d82;font-size: 12px;">HSN:</label><span style="color: #7a7d82;font-size: 14px;font-weight: 400;">{{$value->hsn_no}}</span></span>

                                                </h2>
                                            </td>
                                            
                                            
                                             
                                            <td>
                                                @if($value->discount != 0 )
                                                <strike>₹{{$value->mrp}}</strike>&nbsp;
                                                <span class="product-price">₹{{$value->price}}</span>
                                                @else
                                                <span class="product-price">₹{{$value->price}}</span>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="quantity-container">
                                                    @if(isset(Auth::user()->id))
                                                        <input type="hidden" name="user_id" id="user_id" value="{{Auth::user()->id}}">
                                                    @else
                                                        <input type="hidden" name="user_id" id="user_id" value="0">
                                                    @endif
                                                    <div class="qtybtn minus" id="minus_{{$value->product_id}}_{{$value->size_id}}">-</div>
                                                    <input type="number" name="qty[]" id="quantity_{{$value->product_id}}_{{$value->size_id}}" name="quantity" value="{{$value->qty}}" data-value="{{$value->qty}}" / style="float:left;height: 43px;border: 1px solid #e1e1e1;width: 56px;text-align: center;">
                                                    <div class="qtybtn plus" id="plus_{{$value->product_id}}_{{$value->size_id}}" style="font-size: 25px;">+</div>
                                        <input type="hidden" id="product_id" value="{{$value->product_id}}">
                                                    <input type="hidden" id="product_ids_{{$value->product_id}}_{{$value->size_id}}" value="{{$value->product_id}}">
                                                    <input type="hidden" id="size_{{$value->product_id}}_{{$value->size_id}}" value="{{$value->size_id}}">
                                                    <input type="hidden" id="maxsize_{{$value->product_id}}_{{$value->size_id}}" value="{{$value->max_qty}}">
                                                    <input type="hidden" name="price[]" id="price_{{$value->product_id}}_{{$value->size_id}}" value="{{$value->price}}">
                                                    <input type="hidden" name="mrp[]" id="mrp_{{$value->product_id}}_{{$value->size_id}}" value="{{$value->mrp}}">
                                                    <input type="hidden" name="discount[]" id="discount_{{$value->product_id}}_{{$value->size_id}}" value="{{$value->mrp - $value->price}}">
                                                    <input type="hidden" name="gst[]" id="gst{{$value->product_id}}_{{$value->size_id}}" value="{{$value->gst}}">
                                                </div>
                                            </td>
                                            <td id="product_total_price_{{$value->product_id}}_{{$value->size_id}}">₹{{$value->qty * $value->price}}</td>
                                             <td> 
                                                <a onclick="showSwal({{$value->cart_id}})" title="Remove product" style="cursor: pointer;" class="btn-remove"><span><!-- class="sr-only" -->Remove</span></a>
                                            </td>
                                        </tr>
                                        <tr class="product-action-row">
                                            <td colspan="4" class="clearfix">
                                                <div class="float-left">
                                                  
                                                    <!-- <a href="#" class="btn-move">Add to Wishlist</a> -->
                                                </div><!-- End .float-left -->
                                                
                                            </td>
                                        </tr>
                                       <!--  $Subtotal += ($value->qty * $value->price); -->
                                       <!-- $GST= $GST + $value->gst; -->

                                            @php
                                               if(isset($value->cart_total_mrp_price)){
                                               $Subtotal += ($value->cart_total_mrp_price);
                                               }
                                               if(!isset($value->cart_total_mrp_price)){
                                                    $Subtotal += ($value->qty * $value->mrp);
                                                }
                                                
                                                $discount += $value->qty * ($value->mrp - $value->price) ;
                                                $GST= ($Subtotal - $discount) * $value->gstper / 100;
                                            @endphp
                                            @endforeach
                                        @else
                                            <tr class="">
                                                <td colspan="4" class="clearfix">
                                                    <div class="">
                                                       <center class="empty-wishlist">
         <img src='{{asset("/assets/images/empty-product.png")}}' width="100px" style="margin:Auto;" style="max-width: 150px;margin: 0 auto 20px;transform: rotate(-15deg);">
            <span style="margin-top:20px;">NO PRODUCTS ARE AVAILABLE IN THE CART</span>
             </center>
                                                    </div><!-- End .float-left -->

                                                </td>
                                            </tr>
                                        @endif
                                        <tr class="product-action-row">
                                            <td colspan="4" class="clearfix">
                                                <div class="float-left">
                                                    <!-- <a href="#" class="btn-move">Add to Wishlist</a> -->
                                                </div><!-- End .float-left -->
                                                
                                                <!-- <div class="float-right"> -->
                                                   <!--  <a href="#" title="Edit product" class="btn-edit"><span class="sr-only">Edit</span><i class="icon-pencil"></i></a> -->
                                                    <!-- <a href="#" title="Remove product" class="btn-remove"><span class="sr-only">Remove</span></a> -->
                                                <!-- </div> --><!-- End .float-right -->
                                            </td>
                                        </tr>
                                    </tbody>

                                    <tfoot>
                                        <tr>
                                            <td colspan="4" class="clearfix">
                                                <div class="float-left">
                                                    <a href="{{route('home_1')}}" class="btn btn-outline-secondary">Continue Shopping</a>
                                                </div><!-- End .float-left -->
                                                @if(count($productDetail)>0)
                                                <div class="float-right">
                                                    <a onclick="removeCart()" class="btn btn-outline-secondary btn-clear-cart">Clear Shopping Cart</a>
                                                    {{-- <a href="#" class="btn btn-outline-secondary btn-update-cart">Update Shopping Cart</a> --}}
                                                </div><!-- End .float-right -->
                                                @endif
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div><!-- End .cart-table-container -->

                        </div><!-- End .col-lg-8 -->

                        <div class="col-lg-4">
                            <div class="cart-summary">
                                <h3>Summary</h3>

                                <table class="table table-totals">
                                    <tbody>
                                        <tr>
                                            <td>Bag Total</td>
                                            <td id="sub_total">₹{{$Subtotal}}</td>
                                        </tr>
                                         <tr>
                                            <td>You Saved</td>
                                            <td id="discount">₹{{$discount}}</td>
                                        </tr>
                                        
                                       {{--  <tr>
                                            <td>Applicable GST(5%)</td>
                                            <td id="gst">₹{{round($GST)}}</td>
                                        </tr> --}}
                                       
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td>Order Total</td>
                                            <td>₹<span id="grand_total">{{round(($Subtotal - $discount))}}</span></td>
                                        </tr>
                                    </tfoot>
                                </table>

                                <div class="checkout-methods">
                                    @if(Auth::id() > 0)
                                               
                                       <button type="submit" class="btn btn-block btn-sm btn-primary">Go to Checkout</a>
                                    @else
                                        <button type="submit" class="btn btn-block btn-sm btn-primary">Go to Checkout</a>
                                     <!---<a href="javascript:void(0)" data-toggle="modal" data-dismiss="modal"  data-target="#login" class="btn btn-block btn-sm btn-primary">Go to Checkout</a>-->
                                    @endif
                                   <!--  <a href="#" class="btn btn-link btn-block">Check Out with Multiple Addresses</a> -->
                                </div>
                                </form> 
                                <!-- End .checkout-methods -->
                               
                                </div><!-- End .cart-summary -->
                        </div><!-- End .col-lg-4 -->
                    </div><!-- End .row -->
                </div><!-- End .container-box -->
            </div><!-- End .container -->
        </main><!-- End .main -->

        <script src="{{ asset('admin/vendors/sweetalert2/sweetalert2.min.js') }}"></script>
        <script type="text/javascript">
            if(!!window.performance && window.performance.navigation.type == 2)
            {
                window.location.reload();
            }
            $('.minus').click(function(){
                var actualUserId = 0;//Guest User Cart User ID
                var user_id = document.getElementById("user_id").value;
                if(user_id > 0){
                    actualUserId = user_id;
                }

                var id =  this.id;
                
                var productData = id.split("_"); 

                
               
                var current_qty =  $('#quantity_'+productData[1]+'_'+productData[2]).val(); 

                var price =  $('#price_'+productData[1]+'_'+productData[2]).val();
                var mrp_price =  $('#mrp_'+productData[1]+'_'+productData[2]).val();
                var size =  $('#size_'+productData[1]+'_'+productData[2]).val();
                var product_ids =  $('#product_ids_'+productData[1]+'_'+productData[2]).val();
                if(current_qty == 1 ){
                  return false; 
                }
                current_qty--; 
                var total_price = price * current_qty;
                var total_mrp_price = mrp_price * current_qty;
                //alert(total_mrp_price);

                $('#product_total_price_'+productData[1]+'_'+productData[2]).html('₹'+total_price);
                $('#quantity_'+productData[1]+'_'+productData[2]).val(current_qty);
                allProductTotal();

                //Quantity Update
                var current_qty = current_qty;
                var product_id = id.slice(6, 8);
                 //var userid = 100;
                if(actualUserId > 0){
                    $.ajax({
                      type: "post",
                      url : '{{url('/cartpage-quantity-update')}}',
                      cache:false,
                      data:{
                        'current_qty' : current_qty,
                        'product_id' : product_ids,
                        'total_price' : total_price,
                        'total_mrp_price' : total_mrp_price,
                        'size' : size,
                        "_token": "{{ csrf_token() }}",
                      },
                      success:function(data){

                      }
                  });

                }else{

                    //guest user quantity update

                    $.ajax({
                      type: "post",
                      url : '{{url('/updateCartForGuestUser')}}',
                      cache:false,
                      data:{
                        'current_qty' : current_qty,
                        'product_id' : product_ids,
                        'price' : total_price,
                        'mrp' : total_mrp_price,
                        'size' : size,
                        "_token": "{{ csrf_token() }}",
                      },
                      success:function(data){

                      }
                  });
                }


            });
            $('.plus').click(function(){
                var actualUserId = 0;//Guest User Cart User ID
                var user_id = document.getElementById("user_id").value;
                if(user_id > 0){
                    actualUserId = user_id;
                }
                var id =  this.id;
                var productData = id.split("_"); 
                var current_qty =  $('#quantity_'+productData[1]+'_'+productData[2]).val(); 
                var available_qty =  $('#maxsize_'+productData[1]+'_'+productData[2]).val(); 

                var price =  $('#price_'+productData[1]+'_'+productData[2]).val();
                 var mrp_price =  $('#mrp_'+productData[1]+'_'+productData[2]).val();
                 var size =  $('#size_'+productData[1]+'_'+productData[2]).val();
                 var product_ids =  $('#product_ids_'+productData[1]+'_'+productData[2]).val();
                 //alert(product_ids);
                if(current_qty == available_qty ){
                  return false; 
                } 
                
                if(!available_qty){
                   if(value == 10 ){
                      return false; 
                    }
                 }

                current_qty++; 
                var total_price = price * current_qty;
                var total_mrp_price = mrp_price * current_qty;

                $('#product_total_price_'+productData[1]+'_'+productData[2]).html('₹'+total_price);
                $('#quantity_'+productData[1]+'_'+productData[2]).val(current_qty); 
                allProductTotal();

                  //Quantity Update
                 var current_qty = current_qty;
                 var product_id = id.slice(5, 7);
                 
                 //var userid = 100;
                 if(actualUserId > 0){
                    $.ajax({
                      type: "post",
                      url : '{{url('/cartpage-quantity-update')}}',
                      cache:false,
                      data:{
                        'current_qty' : current_qty,
                        'product_id' : product_ids,
                        'total_price' : total_price,
                        'total_mrp_price' : total_mrp_price,
                        'size' : size,
                        "_token": "{{ csrf_token() }}",
                      },
                      success:function(data){

                      }
                  });
                }else{


                    //guest user quantity update

                    $.ajax({
                      type: "post",
                      url : '{{url('/updateCartForGuestUser')}}',
                      cache:false,
                      data:{
                        'current_qty' : current_qty,
                        'product_id' : product_ids,
                        'price' : total_price,
                        'mrp' : total_mrp_price,
                        'size' : size,
                        "_token": "{{ csrf_token() }}",
                      },
                      success:function(data){

                      }
                  });
                         
                }

                    

            });

            function allProductTotal(){

                var dq = document.getElementsByName('qty[]');
                var price = document.getElementsByName('mrp[]');
              //  var mrp_price = document.getElementsByName('mrp[]');
                var discount = document.getElementsByName('discount[]');
                var gst = document.getElementsByName('gst[]');
                total=0;
                discount_total=0;
                gst_total=0;
                for (var i = 0; i <dq.length; i++) {
                  
                   // var new_price =  dq[i].id.split('_');
                    // var qty = dq[i].value;
                    // var price = $('#dPrice_'+new_price[1]).val();
                     total += parseFloat(dq[i].value * price[i].value); 
                     //mrp_price += parseFloat(dq[i].value * price[i].value); 
                     discount_total += parseFloat(dq[i].value * discount[i].value); 
                     gst_total += parseFloat(dq[i].value * gst[i].value); 
                }
                var gst_total_new = Math.round(parseFloat(total - discount_total) * 5 / 100) ;
               
             
                $('#sub_total').text("₹"+parseFloat(total));
                $('#discount').text("₹"+parseFloat(discount_total));
                $('#gst').text("₹"+parseFloat(gst_total_new));
                $('#grand_total').html((parseFloat(total - discount_total)));
            }
        
            (function($) {
              showSwal = function(id){
                  swal({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, I am sure! '
                  }).then(function (isConfirm) {
                    if (isConfirm) {
                        window.location.replace("{{url('')}}/remove-product-from-cart/"+id);
                    }else{
                      //console.log('out');
                    }
                })
              }
            })(jQuery);

            (function($) {
              removeCart = function(){
                  swal({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, I am sure! '
                  }).then(function (isConfirm) {
                    if (isConfirm) {
                        window.location.replace("{{route('removecart')}}");
                    }else{
                      //console.log('out');
                    }
                })
              }
            })(jQuery);
          </script>
@endsection