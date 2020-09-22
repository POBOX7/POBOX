@extends('new_resources.layouts.new_app') 
@section('content')
<style type="text/css">
.cart_size, .cart_color {
    float: left;
}
footer.footer {
    margin-top: 0;
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
    background-color: #f7f7f7;
    float: left;
    width: 100%;
    padding-bottom: 30px;
    padding-top: 30px;
}
div#order {
    padding-top: 30px;
    padding-bottom: 30px;
    background-color: #f7f7f7;
}



.order-total-div {
   padding: 15px;
    border: 1px solid #e8e8e8;
    background-color: #fafafa;
}
.order-total-div span {
    float: right;
    color: #6e7075;
}
.delivery-to {
    background-color: #fff;
    padding: 15px;
}
.delivery-to label {
    font-weight: 800;
    font-size: 16px;
}
.delivery-to p {
    line-height: .5;
}
.breadcrumb-item+.breadcrumb-item::before {

    margin-top: -5px!important;
}

</style>

<div class="my_account_bg">
<div class="container"> 



 
    <div id="order" class="col-sm-12 col-xs-12 col-md-12 col-lg-12 tabcontent float-right">
        <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb mt-0">
                <li class="breadcrumb-item"><a href="http://pobox.rethinksoft.com/home"><!-- <i class="icon-home"></i> -->Home</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="{{route('order')}}"> Order</a></li>
                <!-- <li class="breadcrumb-item active" aria-current="page"><a href="{{route('order')}}"> Order History</a></li> -->
            </ol>
        </div>
        <!-- End .container -->
    </nav>
		<!-- <a href="{{route('order')}}">
		 <p style="text-align: left;"> <i class="fa fa-angle-left" aria-hidden="true" style="font-size: 23px;color: #1d70ba;"><span style="font-size: 21px!important;padding-left: 15px;">Back to orders</span></i>  </p> -->
      
		</a>
        <!--------Order code start----------->
        <div class="col-sm-12 col-xs-12 col-md-12 col-lg-8">
          <div style="background-color: #fff;float: left;width: 100%;padding-bottom: 20px;
     padding-top: 20px;">
           <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12" style="height: 100%;float: left;padding: 0px 0px 0px 0px;">
            <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
               <label><img style="float: left;" width="32" src='{{asset("/assets/images/icons/confirmed.png")}}'><!-- <i class="fa fa-lock" aria-hidden="true" style="font-size: 26px;"> -->
			           <span style="padding-left: 10px;font-size: 21px;">
					    @if($order->status == 0)
				          Pending
			              @elseif($order->status == 1) 
			              CONFIRM
			      		        @elseif($order->status == 2) 
			             DISPATCH
						    @elseif($order->status == 3) 
			             DELIVERED
			      
						@endif
					   </span></i></label>
						<div class="float-right">
                             <a href="{{route('orderinvoice',$order->id)}}" class="btn btn-outline-success">Download Invoice</a>
                         </div>
			          
		 </div>
			 @php($discount=0)
			 @php($GST=0)
			 @php($Subtotal  = 0)
			@if($orderDetails)
        <div class="order-details">
          <table class="table table-order-details">
            <thead>
                <tr>
                    <th class="product-col">Product</th>
                    <th class="price-col">Price</th>
                    <th class="qty-col">Qty</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
    		    @foreach($orderDetails as $orderDetail)
    				
					
              <tr class="product-row">
                <td class="product-col">
                  <figure class="product-image-container">
                    <a href="#" class="product-image" target="_blank"> 
                      <img src="{{ asset('assets/upload_images/product/'.$orderDetail->getProduct->image)}}" alt="product">
                    </a>
                  </figure>
                  <h2 class="product-title">
                    <a href="#" target="_blank">{{$orderDetail->getProduct->name}}</a>
                    <div class="cart_size">
                      <ul>
                        <li><span>{{$orderDetail->size_name}}</span></li>
                      </ul>
                    </div>
                    <div class="cart_color">
                      <ul>
                        <li style="background:{{$orderDetail->hex_code}}"></li>
                      </ul>
                    </div>
                  </h2>
                </td>
                <td><strike>₹{{$orderDetail->getProduct->mrp}}</strike>&nbsp;<span class="product-price">₹{{$orderDetail->price}}</span></td>
                <td>
                  <div class="quantity-container">
                    <span>{{$orderDetail->qty}}</span>
                  </div>
                </td>
                <td id="product_total_price_33_1">{{$orderDetail->price * $orderDetail->qty}}</td>
              </tr>
			  @php($Subtotal += ($orderDetail->qty * $orderDetail->mrp))
		     
			  @php($discount = $discount + ($orderDetail->mrp - $orderDetail->price))
      			@endforeach
              </tbody>
              </table>
            </div>
      			@endif
           
           </div>
         </div>
        </div>
        <!--------Order code end----------->
        <div class="col-sm-12 col-xs-12 col-md-12 col-lg-4 float-left">
            <div style="background: #1d70ba;padding: 15px;color: #fff;">
               <p>Order# {{$order->ordernumber}} ( {{count($orderDetails)}} Item)</p>
               <p>Order placed on {{Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$order->created_at)->toFormattedDateString()}}</p>
            </div>
            <div class="order-total-div">
               
               <label>Total Bag</label> <span>₹{{$Subtotal}}.00</span><br>
               <label>You Saved</label> <span>
               @php ($original_total= $Subtotal - $discount)
               ₹{{$order['saveAmount']}}</span><br>
               <label>Promo Code Discount</label> <span> 
               @php($coupon_amount = $order->coupon_amount)
                @if($order->coupon_amount)
                 ₹{{$order->coupon_amount}}
                 @else
                 ₹0
               @endif
             </span><br>
               <label>Applicable GST</label> <span> 
                @php ($GST = $original_total * 5 / 100)
                                            ₹{{$order['gstAmount']}}
                                          </span><br>
               <div style="border-top: 1px solid #dee2e6;"><label>Order Total</label><span>₹{{$order['totalamount']}}.00</span><br></div>
            </div>
            <div class="delivery-to">
              <label>Delivery to</label>
               <p style="color: #000;">{{$order->getUser->name}}</p>
              <p>{{$order->getAddress->address_line_one.","}}</p>
              <p>{{$order->getAddress->address_line_two.","}}</p>
              <p>{{$order->getAddress->address_line_three.","}}</p>
              <p>{{$order->getAddress->city}},{{$order->getAddress->state}}</p>
              <p>India - {{$order->getAddress->pincode}}</p>
              <p>Mobile - {{$order->getAddress->phone_number}}</p>
            </div>
        </div>

    </div>
    
</div>
</div>

@endsection
