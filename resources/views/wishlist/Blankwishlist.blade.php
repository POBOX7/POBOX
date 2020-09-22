@extends('new_resources.layouts.new_app') 
@section('content')
<style type="text/css">
    .product-default.disabled:hover figure a::after,.product-default.disabled .product-details,.product-action button {
   /* opacity: 0!important;*/
    /*cursor: no-drop;*/
}
.product-default.disabled figure{
    opacity: 0.5!important;
}
</style>
<div class="wishlist-page" style="margin-top: 30px;">
    <div class="container">
	
        <center class="empty-wishlist">
		 <img src="/assets/images/empty-product.png" width="100px" style="margin:Auto;" style="max-width: 150px;margin: 0 auto 20px;transform: rotate(-15deg);">
            <span style="margin-top:20px;">NO PRODUCTS ARE AVAILABLE IN THE WISHLIST</span>
            <div class="dropdown-cart-action" >
                <a href="{{route('home_1')}}" class="btn">Continue Shopping</a>
            </div>
        </center>
    </div>

</div>    

@endsection
