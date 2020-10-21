@extends('new_resources.layouts.new_app') 
@section('content')
<style type="text/css">
.cart_size, .cart_color {
    float: left;
}
.cart_size ul li {
    font-size: 12px;
    margin: 2px 3px 2px 0;
    color: #7a7d82;
}
.cart_color {
   margin-left: 5px;
    margin-top: 5px;
    margin-right: 5px;
}
.cart_color ul li {
    font-size: 0px;
    padding: 8px;
}
.tab {
    border: 0px !important;
    background: #fff!important;
    margin-top: 0px;
}
.my_account_bg {
    /*background: #f7f7f7;*/
    float: left;
    width: 100%;
    padding-bottom: 30px;
    padding-top: 30px;
}
div#order {
   /* padding-top: 30px;*/
    padding-bottom: 30px;
    background: #ffffff;
}
.order-total-div {
    border-bottom: 1px solid #ada0a0;
}


.order-total-div {
    padding: 10px;
}
.order-total-div span {
    float: right;
    color: #6e7075;
}
.delivery-to {
    padding: 10px;
}
.delivery-to label {
    font-weight: 800;
    font-size: 16px;
}
.delivery-to p {
    line-height: .5;
}
.tab {
     margin-top: 0px!important; 
}
</style>

<!-- class="alert alert-success" role="alert" -->
 <div  style="width: 100%;height: 66px;background: #f5f5f0;padding-top: 10px;padding-bottom: 10px;">
  <div class="container">
    <div class="col-sm-12 col-xs-12 col-md-12 col-lg-9 float-left" style="padding-left: 0;line-height: 3;">
<p class="msg-order-summary" style="float: left;padding-left: 21px;">Thank you {{Auth::check()?$ordersummry->getUser->name:"Guest"}}, for placing an order with us. Your order {{$ordersummry->ordernumber}} is confirmed <!-- <br> We expect to deliver your order by 20 July. --></p>
</div>
<div class="col-sm-12 col-xs-12 col-md-12 col-lg-3 float-left" style="padding-left: 0;padding-right: 30px;">

<a href="{{route('home_1')}}" class="btn btn-block btn-sm btn-primary float-right">CONTINUE SHOPPING</a>
</div>
</div>
</div>
 <!-- <div class="hero-section hero-background style-02" style="margin-top: 2px;background: url('../assets/images/hero_bg.jpg');">
      <h1 class="page-title">Order Summary</h1>
</div>    -->

  

<div class="my_account_bg">
<div class="container"> 

    <div id="order" class="col-sm-12 col-xs-12 col-md-12 col-lg-12 tabcontent float-right"style="padding: 0;">
        
        <!--------Order code start----------->
        <div class="col-sm-12 col-xs-12 col-md-12 col-lg-8">
        <a href="{{route('orderinvoice',$ordersummry->id)}}" class="btn btn-outline-success float-right">Download Invoice</a>
           <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12" style="height: 100%;float: left;padding: 20px 0px 20px 0px;padding-top: 0;">
            <div style="border-bottom: 1px solid #eee;padding-bottom: 8px;margin-bottom: 10px;font-size: 17px;margin-top: -8px!important;">Order Summary</div>
				 @php($discount=0)
      			 @php($GST=0)
				 @php($Subtotal  = 0)
			
           
             <div class="order-details">
              <table class="table table-order-details">
                <thead>
                  <tr>
                    <th class="product-col">Product</th>
                    <th class="qty-col">Qty</th>
                    <th class="price-col">Price</th>
                    <th class="price-col">Coupon Discount</th>
                    <th class="price-col">Tax</th>
                    <th class="price-col">Sub Total</th>
                  </tr>
                </thead>
                <tbody>
      			    @foreach($productDetail as $product)
      			   
                  <tr class="product-row">
                    <td class="product-col">
                      <figure class="product-image-container">
                          <img src="{{ asset('assets/upload_images/product') }}/{{$product->getProduct->image}}" alt="product">
                      </figure>
                      <h2 class="product-title">
                        <span>{{$product->getProduct->name}}</span>
                        <div class="cart_size">
                          <ul>
                            <li><span>{{$product->size_name}}</span></li>
                          </ul>
                        </div>
                        <div class="cart_color">
                          <ul>
                            <li style="background: {{$product->hex_code}}"></li>
                          </ul>
                        </div>
                        <span style="margin-top: 5px;"><label style="font-weight: 600;color: #7a7d82;font-size: 12px;">HSN:</label><span style="color: #7a7d82;font-size: 14px;font-weight: 400;">{{$product->hsn_no}}</span></span>
                      </h2>
                    </td>
                    <td>
                      <div class="quantity-container">
                        <span>{{$product->qty}}</span>
                      </div>
                    </td>
                    <td>
                      <div class="price-box">
                        ₹{{$product->price}}
                      </div>
                    </td>
                    <td>
                      <div class="price-box">
                        @if($product->discount_price > 0)
                          ₹{{$product->discount_price}}
                        @else
                          -
                        @endif
                      </div>
                    </td>
                    <td>
                        <span>₹{{$product->gst_amount}}</span>
                        <br>
                        @if($ordersummry->getAddress->state == 'Gujarat')
                          <span>
                                <label style="font-weight: 600;color: #7a7d82;font-size: 12px;">CGST : </label> ₹{{$product->gst_amount/2}} <br>
                                <label style="font-weight: 600;color: #7a7d82;font-size: 12px;">SGST :</label>₹{{$product->gst_amount/2}} <br>
                            </span>
                        @else
                            <span>
                                <label style="font-weight: 600;color: #7a7d82;font-size: 12px;">IGST : </label> ₹{{$product->gst_amount}} <br>
                            </span>
                        @endif
                        
                    
                    </td>
                    <td>
                      <span>₹{{($product->price * $product->qty) + $product->gst_amount}}</span>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          
           </div>
        </div>
        <!--------Order code end----------->
        <div class="col-sm-12 col-xs-12 col-md-12 col-lg-4 float-left">
            <div class="order-total-div">
               <div><label style="color: #151515!important;font-weight: 600!important;">Order Summary</label> <br></div>
               <label>Bag Total</label><span>₹{{$ordersummry->bag_total}}</span><br>
               {{-- <label>You Saved</label> <span> --}}
               {{-- @php ($original_total= $Subtotal - $discount)
              ₹{{$ordersummry->saveAmount}}</span><br> --}}
                <label>Promo Code Discount</label>
                <span>₹<?php if ($ordersummry->coupon_amount == "") {
                  echo 0 ;
                } ?>{{$ordersummry->coupon_amount}}</span><br>
               <label>Applicable GST</label> 
               <span>₹{{$ordersummry->gstAmount}}</span><br>
               <!-- <label>Delivery</label> <span>₹ 149</span><br> -->
               <label style="color: #151515!important;font-weight: 600!important;">Order Total</label> <span style="color: #151515;font-weight: 600!important;">₹<!-- {{($Subtotal - $discount) + $GST}} -->
               {{$ordersummry->totalamount}}</span>
               
            </div>
            <div class="delivery-to">
              <p style="color: #000;"><!-- {{Auth::check()?$ordersummry->getUser->name:"Guest"}} -->
                {{$ordersummry->getAddress->name.","}}
              </p>
              <p>{{$ordersummry->getAddress->address_line_one.","}}</p>
              <p>{{$ordersummry->getAddress->address_line_two.","}}</p>
              <p><!-- {{$ordersummry->getAddress->address_line_three.","}} --></p>
              <p>{{$ordersummry->getAddress->city}},{{$ordersummry->getAddress->state}}</p>
              <p>{{$ordersummry->getAddress->country}} - {{$ordersummry->getAddress->pincode}}</p>
              <p>Mobile - {{$ordersummry->getAddress->phone_number}}</p>
              
            </div>
        </div>

    </div>
    
</div>
</div>

@endsection
