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

</style>

<div class="my_account_bg">
<div class="container"> 

 
    <div id="order" class="col-sm-12 col-xs-12 col-md-12 col-lg-12 tabcontent float-right">
        
        <p style="text-align: left;"> <i class="fa fa-angle-left" aria-hidden="true" style="font-size: 23px;color: #1d70ba;"><span style="font-size: 21px!important;padding-left: 15px;">Back to orders</span></i>  </p>
        <!--------Order code start----------->
        <div class="col-sm-12 col-xs-12 col-md-12 col-lg-8">
          <div style="background-color: #fff;float: left;width: 100%;padding-bottom: 20px;
    padding-top: 20px;">
           <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12" style="height: 100%;float: left;padding: 0px 0px 0px 0px;">
            <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
               <label><img style="float: left;" width="32" src="/assets/images/icons/confirmed.png"><!-- <i class="fa fa-lock" aria-hidden="true" style="font-size: 26px;"> --><span style="padding-left: 10px;font-size: 21px;">Confirmed</span></i></label>
            </div>
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
                    <td id="product_total_price_33_1">₹800</td>
                  </tr>
                </tbody>
              </table>
            </div>
           </div>
         </div>
        </div>
        <!--------Order code end----------->
        <div class="col-sm-12 col-xs-12 col-md-12 col-lg-4 float-left">
            <div style="background: #1d70ba;padding: 15px;color: #fff;">
               <p>Order# FLO156322243 ( 1 Item)</p>
               <p>Order placed on 2nd July 2020</p>
            </div>
            <div class="order-total-div">
               <div style="border-bottom: 1px solid #dee2e6;"><label>Order Total</label> <span>₹485.00</span><br></div>
               <label>Total</label> <span>₹799.00</span><br>
               <label>Discount</label> <span>- ₹479.00</span><br>
               <label>Applicable Tax</label> <span>₹16</span><br>
            </div>
            <div class="delivery-to">
              <label>Delivery to</label>
              <p>Rakesh</p>
              <p>krushnanagar society,</p>
              <p>Patan,Gujarat</p>
              <p>India-380007</p>
              <p>Mobile - 9599999999</p>
              
            </div>
        </div>

    </div>
    
</div>
</div>

@endsection
