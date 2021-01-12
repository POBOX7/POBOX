@extends('new_resources.layouts.new_app') 
@section('content')
<style type="text/css">

.tab {
    border: 0px !important;
    background: #fff!important;
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

 @include('new_resources.layouts.leftside_my_account')  
    <div id="order" class="col-sm-12 col-xs-12 col-md-12 col-lg-9 tabcontent float-right">
        <h1 style="text-align: center;color: #323232;font-weight: 400;font-size: 34px;">My Orders</h3>
        <p style="text-align: center;">Track your open orders & view the summary of your past orders</p>
        <!--------Order code start----------->
        <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12 confirmed float-left ">
          <label>Order ID : </label><span style="padding-left: 5px;">FL0156556448</span>
          <div class="order-details">
            <table class="table table-order-details">
              <thead>
                  <tr>
                      <th class="product-col">Product</th>
                      <th class="price-col">Price</th>
                      <th class="qty-col">Qty</th>
                      <th>Status</th>
                  </tr>
              </thead>
              <tbody>
                <tr class="product-row">
                  <td class="product-col">
                    <figure class="product-image-container">
                      <a href="https://poboxfashion.com/product-detail/33" class="product-image" target="_blank"> 
                        <img src="https://poboxfashion.com/assets/upload_images/product/15937727405.jpg" alt="product">
                      </a>
                    </figure>
                    <h2 class="product-title">
                      <a href="https://poboxfashion.com/product-detail/33" target="_blank">Women Kurta Set</a>
                      <div class="cart_size">
                        <ul>
                          <li><span>S</span></li>
                        </ul>
                      </div>
                      <div class="cart_color">
                        <ul>
                          <li style="background: #f5f5f5"></li>
                        </ul>
                      </div>
                    </h2>
                  </td>
                  <td>₹800</td>
                  <td>
                    <div class="quantity-container">
                      <span>1</span>
                    </div>
                  </td>
                  <td id="product_total_price_33_1">Confirmed</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <!--------Order code end----------->
        <!--------Order code start----------->
        <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12 cancelled float-left">
           <label>Order ID : </label><span style="padding-left: 5px;">FL0156322243</span>
           <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12 order-details" style="border: 1px solid #f0f0f0;height: 100%;float: left;padding: 20px 0px 20px 0px;">
               <div class="col-sm-12 col-xs-12 col-md-12 col-lg-2 float-left" style="padding-right: 0;">
                   <img width="100" src="https://poboxfashion.com/assets/upload_images/product/15937727405.jpg">
               </div>
                <div class="col-sm-12 col-xs-12 col-md-12 col-lg-10 float-left" style="padding-left: 0;">
                     <span class="order-status" style="font-weight: 600;color: #d53939;font-size: 16px;">Cancelled</span>
                     <br>
                     <span class="order-detail1">Cancelled 20 July</span>
                     <span  style="float: right;line-height: 5;"><i class="fa fa-angle-right" aria-hidden="true" style="font-size: 23px;color: #1d70ba;"><span style="font-size: 21px!important;padding-left: 15px;"></span></i> </span>
               </div>
           </div>
        </div>
        <!--------Order code end----------->

    </div>
    
</div>
</div>

@endsection
