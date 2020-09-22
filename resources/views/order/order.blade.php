@extends('new_resources.layouts.new_app') 
@section('content')
<style type="text/css">

.tab {
    border: 0px !important;
    margin-top: 0px!important;
}
.my_account_bg {
    background: #f7f7f7;
    float: left;
    width: 100%;
    padding-bottom: 30px;
    padding-top: 30px;
}
div#order {
    padding-top: 30px;
    padding-bottom: 30px;
    background: #ffffff;
}
footer.footer {
    margin-top: 0!important;
}
.order-details:hover ,.order-details-confirm:hover{
    background-color: hsla(0,0%,75.3%,.1)!important;
    cursor: pointer;
}
.order-details-confirm:hover{
    background-color: hsla(0,0%,75.3%,.1)!important;
    cursor: pointer;
}
</style>
 <!-- <div class="hero-section hero-background style-02" style="background: url('../assets/images/hero_bg.jpg');">
      <h1 class="page-title">My Order</h1>
</div>  -->  
 
<div class="my_account_bg">
<div class="container"> 
  <div class="row">
 @include('new_resources.layouts.leftside_my_account')  
    <div id="order" class="col-sm-12 col-xs-12 col-md-12 col-lg-9 tabcontent">
        <h1 style="text-align: center;color: #323232;font-weight: 400;font-size: 34px;">My Orders</h3>
        <p style="text-align: center;">Track your open orders & view the summary of your past orders</p>
        <!--------Order code start----------->
		
		@if($userorders)
	   <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12 orders-overview">
     
       
         
          <table class="table table-borderless table-hover">
            <thead>
              <tr>
                <th>Sr.No</th>
                <th>Date</th>
                <th>Order ID</th>
                <th>Total Product</th>
                <th>Total Price</th>
                <th>Total Qty</th>
                <th>Status</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
			
			@php($count=1)
			@foreach($userorders as $key => $userorder)
			
				@php($products = App\OrderDetail::where('order_id',$userorder->id)->where('status',0)->get())
                      			   
			   <tr>
                  <td>{{$count}}</td>
                  <td>{{Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$userorder->created_at)->toFormattedDateString()}}</td>
                  <td><a href="{{route('orderDetail',$userorder->id)}}">{{$userorder->ordernumber}}</a></td>
                  <td>{{count($products)}}</td>
                  <td>₹{{$userorder->totalamount}}</td>
                  <td>
				   @php($qty=0) 
				   @foreach($products as $products)
				   @php($qty =  $qty + $products->qty) 
				   @endforeach
				    {{$qty}}
				  </td>
			       	  @php($count++)
			         @if($userorder->status == 0)
				          <td id="product_total_price_33_1">PENDING</td>
			              @elseif($userorder->status == 1) 
			              <td id="product_total_price_33_1">CONFIRM</td>
			      		        @elseif($userorder->status == 2) 
			             <td id="product_total_price_33_1">DISPATCH</td>
						    @elseif($userorder->status == 3) 
			             <td id="product_total_price_33_1">DELIVERED</td>
			      
						@endif
				<td><a href="{{route('orderDetail',$userorder->id)}}"><i class="fa fa-eye"></i></td>						
                </tr>
			          @endforeach
              </tbody>
            </table>
          
        
			
      </div>
		@endif	
        
		@if($userorders)
		{{$userorders->links()}}
	    @endif
        <!--------Order code end----------->
    </div>
  </div>
</div>

</div>

@endsection
