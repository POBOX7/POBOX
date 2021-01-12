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
.order-details table tr td {
    vertical-align: top;
    padding-top: 31px;
}
.delivery-to p {
    line-height: 1;
}
</style>


  

<div class="my_account_bg">
<div class="container"> 

    <div id="order" class="col-sm-12 col-xs-12 col-md-12 col-lg-12 tabcontent float-right"style="padding: 0;">
        
        <!--------Order code start----------->
        <div class="col-sm-12 col-xs-12 col-md-12 col-lg-8">
           <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12" style="height: 100%;float: left;padding: 20px 0px 20px 0px;padding-top: 0;">
            <div style="border-bottom: 1px solid #eee;padding-bottom: 8px;margin-bottom: 10px;font-size: 17px;margin-top: -8px!important;">Summary</div>
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
                    <th class="">Tax</th>
                    <th>Subtotal</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    $total_tax = 0;
                    $bag_amount = 0;
                  ?>
                  @if(count($productDetail)>0)
                    @foreach($productDetail as $keye => $value)
      			       
                      <?php
                        if($coupon_discount_per > 0){
                          $discount_price = $value->price * $coupon_discount_per / 100;
                          $product_price = $value->price - $discount_price;
                        }else{
                          $product_price = $value->price;
                        }
                      ?>
      			       
                  <tr class="product-row">
                    <td class="product-col">
                      <figure class="product-image-container">
                          <img src="{{ asset('assets/upload_images/product') }}/{{$value->image}}" alt="product">
                      </figure>
                      <h2 class="product-title">
                        <span>{{$value->name}}</span>
                        <div class="cart_size">
                          <ul>
                            <li><span>{{$value->size_name}}</span></li>
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
                          <div class="quantity-container">
                            <span>{{$value->qty}}</span>
                          </div>
                        </td>
                        <td>
    					
                          <div class="price-box">
                                  
                            <span > ₹{{$product_price}}</span>
                          </div>
                        </td>
                          <?php
                            if($product_price > 1000){
                              $gst = ($product_price * 12 / 100) * $value->qty;
                            }else{
                              $gst = ($product_price * 5 / 100) * $value->qty;
                            }
                            $total_tax = $total_tax + $gst;
                            $bag_amount = $bag_amount + ($product_price * $value->qty);
                         ?>
                          
                        <td><span>₹{{$gst}}</span><br>
                          @if($addresses->state == 'Gujarat')
                            <span>
                                <label style="font-weight: 600;color: #7a7d82;font-size: 12px;">CGST : </label> ₹{{$gst/2}} <br>
                                <label style="font-weight: 600;color: #7a7d82;font-size: 12px;">SGST :</label>₹{{$gst/2}} <br>
                            </span>
                          @else
                            <span>
                                <label style="font-weight: 600;color: #7a7d82;font-size: 12px;">IGST : </label> ₹{{$gst}} <br>
                            </span>
                          @endif
                          
                        </td>
                        <td>₹{{($product_price * $value->qty) + $gst}}</td>
                     
                  </tr>
                @endforeach
                @endif
                </tbody>
              </table>
            </div>
          
           </div>
        </div>
        <!--------Order code end----------->
        <div class="col-sm-12 col-xs-12 col-md-12 col-lg-4 float-left">
            <div class="order-total-div">
               <div><label style="color: #151515!important;font-weight: 600!important;"> Summary</label> <br></div>
               <label>Bag Total</label><span>₹{{$bag_amount}}</span><br>
              <input type="hidden" name="bag_total" id="bag_total" value="{{$bag_amount}}">
               {{--  <label>Promo Code Discount</label>
                <span>₹0</span><br> --}}
               <label>Total Tax</label>
               <span>
                ₹{{$total_tax}}
                </span><br>
              <input type="hidden" name="gst_amount_total" id="gst_amount_total" value="{{$total_tax}}">
               <label style="color: #151515!important;font-weight: 600!important;">Order Total</label> <span style="color: #151515;font-weight: 600!important;">₹ {{$bag_amount + $total_tax}}</span>
               <input type="hidden" id="order_total" value="{{round($bag_amount + $total_tax, 2)}}">
               
            </div>
            @if($coupon_discount_per > 0)
              <span style="color: red">Note : Product amout after coupon code applied</span>
            @endif

            <div class="delivery-to">
              <label style="color: #151515!important;font-weight: 600!important;">Deliver to</label>
              <p style="color: #000;">
                {{$addresses->name}} {{$addresses->last_name}} 
              </p>
              <p class="a">{{$addresses->address_line_one}} </p>
              <p class="b">{{$addresses->address_line_two}}</p>
              
              <p>{{$addresses->city}},{{$addresses->state}}</p>
              <p>{{$addresses->country}} - {{$addresses->pincode}}</p>
              <p>Mobile - {{$addresses->phone_number}}</p>
              
            </div>

            <input type="hidden" id="paymentid" name="paymentid">
            <input type="hidden" id="paymentid" name="paymentid">
            <input type="hidden" id="paymentid" name="paymentid">


            <div class="row">
              @if($paymentMode['status'] == 1)
              <div class="col-lg-12">
                  <div class="checkout-steps-action" style="margin-top: 10px;">
                    <input type="button" class="btn btn-primary float-right" id="paybtn" value="Place order">                        
                  </div><!-- End .checkout-steps-action -->
              </div><!-- End .col-lg-8 -->
              @endif
               @if($paymentMode['status'] == 0)
               <div class="col-lg-12">
                   <div class="checkout-steps-action"  data-toggle="modal" data-target="#exampleModal" style="margin-top: 10px;">
                    <input type="button" class="btn btn-primary float-right"  value="Place order">                        
                  </div>

              <!-- Modal -->
              <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h3 class="modal-title" id="exampleModalLabel">Payment Mode</h3>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <h4 style="padding: 20px;"> Sorry due to some technical issue currently we are not accepting any orders</h4>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                     
                    </div>
                  </div>
                </div>
              </div>
               @endif
          </div>
        </div>
        </div>

    </div>
    
</div>
</div>

@endsection
