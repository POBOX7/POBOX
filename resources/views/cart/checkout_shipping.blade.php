@extends('new_resources.layouts.new_app') 
@section('content')
<style type="text/css">
.modal form .form-group {
    max-width: 100%;
    padding: 0px 15px 0px 15px;
}
input.form-control {
    border-bottom-left-radius: 0;
    border-top-left-radius: 0;
    background: #FFFFFF 0% 0% no-repeat padding-box;
    border: 1px solid #E1E1E1;
    border-radius: 28px;
    opacity: 1;
}
.form-group-custom-control {
    padding: 0px 10px 0px 10px;
}
label.custom-control-label {
    margin-left: 10px;
}
.checkout-progress-bar li.active::before, .checkout-progress-bar li.active>span::before,.shipping-address-box.active::after{
        background-color: #1d70ba!important;
}
.shipping-address-box.active{
    border-color: #1d70ba!important;
}
.shipping-address-box {
    width: 250px;
    border: 1px solid #ccc!important;
    margin: 5px 5px 0 0px!important;
}
.table-mini-cart .product-col{
    padding: 5px;
}

/*@media only screen and (max-width : 992px) {
    .shipping-address-box {
        width: auto;
    }
 }*/   
 html.wf-opensans-n3-active.wf-opensans-n4-active.wf-opensans-n6-active.wf-opensans-n7-active.wf-opensans-n8-active.wf-poppins-n3-active.wf-poppins-n4-active.wf-poppins-n5-active.wf-poppins-n6-active.wf-poppins-n7-active.wf-segoescript-n3-inactive.wf-segoescript-n4-inactive.wf-segoescript-n5-inactive.wf-segoescript-n6-inactive.wf-segoescript-n7-inactive.wf-active {
    overflow-y: overlay!important;
}
</style>
<div class="page-wrapper">
 <main class="main">
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home_1')}}"><!-- <i class="icon-home"></i> -->Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                    </ol>
                </div><!-- End .container -->
            </nav>

            <div class="container">
                <div class="container-box">
                    <ul class="checkout-progress-bar mt-2">
                        <li class="active">
                            <span>Shipping</span>
                        </li>
                        <li>
                            <span>Review &amp; Payments</span>
                        </li>
                    </ul>
                    <div class="row">
                        <div class="col-lg-8">
                            <ul class="checkout-steps">
                                <li>
                                    <h2 class="step-title">Shipping Address</h2>

                                    <div class="shipping-step-addresses">
                                        <div class="col-sm-4 col-xs-12 shipping-address-box active">
                                            <address>
                                                Desmond Mason <br>
                                                123 Street Name, City Name <br>
                                                Los Angeles, California 03100 <br>
                                                United States <br>
                                                (123) 456-7890 <br>
                                            </address>

                                            <div class="address-box-action clearfix">
                                                <a href="#" class="btn btn-sm btn-link">
                                                    Edit
                                                </a>

                                                <a href="#" class="btn btn-sm btn-outline-secondary float-right">
                                                    Ship Here
                                                </a>
                                            </div><!-- End .address-box-action -->
                                        </div><!-- End .shipping-address-box -->
                                        <div class="col-sm-4 col-xs-12 shipping-address-box">
                                            <address>
                                                Susan Mason <br>
                                                123 Street Name, City Name <br>
                                                Los Angeles, California 03100 <br>
                                                United States <br>
                                                (123) 789-6150 <br>
                                            </address>

                                            <div class="address-box-action clearfix">
                                                <a href="#" class="btn btn-sm btn-link">
                                                    Edit
                                                </a>

                                                <a href="#" class="btn btn-sm btn-outline-secondary float-right">
                                                    Ship Here
                                                </a>
                                            </div><!-- End .address-box-action -->
                                        </div><!-- End .shipping-address-box -->
                                        <div class="col-sm-4 col-xs-12 shipping-address-box">
                                            <address>
                                                Susan Mason <br>
                                                123 Street Name, City Name <br>
                                                Los Angeles, California 03100 <br>
                                                United States <br>
                                                (123) 789-6150 <br>
                                            </address>

                                            <div class="address-box-action clearfix">
                                                <a href="#" class="btn btn-sm btn-link">
                                                    Edit
                                                </a>

                                                <a href="#" class="btn btn-sm btn-outline-secondary float-right">
                                                    Ship Here
                                                </a>
                                            </div><!-- End .address-box-action -->
                                        </div><!-- End .shipping-address-box -->
                                        <div class="col-sm-4  col-xs-12 shipping-address-box">
                                            <address>
                                                Susan Mason <br>
                                                123 Street Name, City Name <br>
                                                Los Angeles, California 03100 <br>
                                                United States <br>
                                                (123) 789-6150 <br>
                                            </address>

                                            <div class="address-box-action clearfix">
                                                <a href="#" class="btn btn-sm btn-link">
                                                    Edit
                                                </a>

                                                <a href="#" class="btn btn-sm btn-outline-secondary float-right">
                                                    Ship Here
                                                </a>
                                            </div><!-- End .address-box-action -->
                                        </div><!-- End .shipping-address-box -->
                                    </div><!-- End .shipping-step-addresses -->
                                    <a href="#" class="btn btn-sm btn-outline-secondary btn-new-address" data-toggle="modal" data-target="#addressModal">+ New Address</a>
                                </li>


                               <!--  <li>
                                    <div class="checkout-step-shipping">
                                        <h2 class="step-title">Shipping Methods</h2>

                                        <table class="table table-step-shipping">
                                            <tbody>
                                                <tr>
                                                    <td><input type="radio" name="shipping-method" value="flat"></td>
                                                    <td><strong>$20.00</strong></td>
                                                    <td>Fixed</td>
                                                    <td>Flat Rate</td>
                                                </tr>

                                                <tr>
                                                    <td><input type="radio" name="shipping-method" value="best"></td>
                                                    <td><strong>$15.00</strong></td>
                                                    <td>Table Rate</td>
                                                    <td>Best Way</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </li> -->
                            </ul>
                        </div><!-- End .col-lg-8 -->

                        <div class="col-lg-4">
                            <div class="order-summary">
                                <h3>Summary</h3>

                                <h4>
                                    <a data-toggle="collapse" href="#order-cart-section" class="collapsed" role="button" aria-expanded="false" aria-controls="order-cart-section">2 products in Cart</a>
                                </h4>

                                <div class="collapse" id="order-cart-section">
                                    <table class="table table-mini-cart">
                                        <tbody>
                                            <tr>
                                                <td class="product-col">
                                                    <figure class="product-image-container">
                                                        <a href="" class="product-image">
                                                            <img src="assets/images/products/product-4.jpg" alt="product">
                                                        </a>
                                                    </figure>
                                                    <div>
                                                        <h2 class="product-title">
                                                            <a href="">Comfort Shoes</a>
                                                        </h2>

                                                        <span class="product-qty">Qty: 4</span>
                                                    </div>
                                                </td>
                                                <td class="price-col">₹17.90</td>
                                            </tr>

                                            <tr>
                                                <td class="product-col">
                                                    <figure class="product-image-container">
                                                        <a href="" class="product-image">
                                                            <img src="assets/images/products/product-4.jpg" alt="product">
                                                        </a>
                                                    </figure>
                                                    <div>
                                                        <h2 class="product-title">
                                                            <a href="">Running Boots</a>
                                                        </h2>

                                                        <span class="product-qty">Qty: 4</span>
                                                    </div>
                                                </td>
                                                <td class="price-col">₹7.90</td>
                                            </tr>
                                        </tbody>    
                                    </table>
                                </div><!-- End #order-cart-section -->
                            </div><!-- End .order-summary -->
                            <div class="row">
                            <div class="col-lg-12">
                                <div class="checkout-steps-action">
                                    <a href="" class="btn btn-primary float-right">Process for Payment</a>
                                </div><!-- End .checkout-steps-action -->
                            </div><!-- End .col-lg-8 -->
                        </div><!-- End .row -->

                   <!--  <div class="mb-4"></div> --><!-- margin -->
                        </div><!-- End .col-lg-4 -->
                    </div><!-- End .row -->
                      
                    
                </div><!-- End .container-box -->
            </div><!-- End .container -->
        </main><!-- End .main -->
        <!-- Modal -->
</div>
    <div class="modal fade" id="addressModal" tabindex="-1" role="dialog" aria-labelledby="addressModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="#">
                    <div class="modal-header">
                        <h3 class="modal-title" id="addressModalLabel">Shipping Address</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div><!-- End .modal-header -->

                    <div class="modal-body">
                            <div class="form-group required-field">
                                <label>First Name </label>
                                <input type="text" class="form-control form-control-sm" required>
                            </div><!-- End .form-group -->

                            <div class="form-group required-field">
                                <label>Last Name </label>
                                <input type="text" class="form-control form-control-sm" required>
                            </div><!-- End .form-group -->

                            <!-- <div class="form-group">
                                <label>Company </label>
                                <input type="text" class="form-control form-control-sm">
                            </div> -->

                            <div class="form-group required-field">
                                <label>Street Address </label>
                                <input type="text" class="form-control form-control-sm" required>
                                <input type="text" class="form-control form-control-sm" required>
                            </div><!-- End .form-group -->

                            <div class="form-group required-field">
                                <label>City  </label>
                                <input type="text" class="form-control form-control-sm" required>
                            </div><!-- End .form-group -->

                            <div class="form-group">
                                <label>State/Province</label>
                                <div class="select-custom">
                                    <select class="form-control form-control-sm">
                                        <option value="Andhra Pradesh">Andhra Pradesh</option>
                                        <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                                        <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                        <option value="Assam">Assam</option>
                                        <option value="Bihar">Bihar</option>
                                        <option value="Chandigarh">Chandigarh</option>
                                        <option value="Chhattisgarh">Chhattisgarh</option>
                                        <option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
                                        <option value="Daman and Diu">Daman and Diu</option>
                                        <option value="Delhi">Delhi</option>
                                        <option value="Lakshadweep">Lakshadweep</option>
                                        <option value="Puducherry">Puducherry</option>
                                        <option value="Goa">Goa</option>
                                        <option value="Gujarat">Gujarat</option>
                                        <option value="Haryana">Haryana</option>
                                        <option value="Himachal Pradesh">Himachal Pradesh</option>
                                        <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                                        <option value="Jharkhand">Jharkhand</option>
                                        <option value="Karnataka">Karnataka</option>
                                        <option value="Kerala">Kerala</option>
                                        <option value="Madhya Pradesh">Madhya Pradesh</option>
                                        <option value="Maharashtra">Maharashtra</option>
                                        <option value="Manipur">Manipur</option>
                                        <option value="Meghalaya">Meghalaya</option>
                                        <option value="Mizoram">Mizoram</option>
                                        <option value="Nagaland">Nagaland</option>
                                        <option value="Odisha">Odisha</option>
                                        <option value="Punjab">Punjab</option>
                                        <option value="Rajasthan">Rajasthan</option>
                                        <option value="Sikkim">Sikkim</option>
                                        <option value="Tamil Nadu">Tamil Nadu</option>
                                        <option value="Telangana">Telangana</option>
                                        <option value="Tripura">Tripura</option>
                                        <option value="Uttar Pradesh">Uttar Pradesh</option>
                                        <option value="Uttarakhand">Uttarakhand</option>
                                        <option value="West Bengal">West Bengal</option>
                                    </select>
                                </div><!-- End .select-custom -->
                            </div><!-- End .form-group -->

                            <div class="form-group required-field">
                                <label>Zip/Postal Code </label>
                                <input type="text" class="form-control form-control-sm" required>
                            </div><!-- End .form-group -->

                           <!--  <div class="form-group">
                                <label>Country</label>
                                <div class="select-custom">
                                    <select class="form-control form-control-sm">
                                        <option value="USA">United States</option>
                                        <option value="Turkey">Turkey</option>
                                        <option value="China">China</option>
                                        <option value="Germany">Germany</option>
                                    </select>
                                </div>
                            </div> -->

                            <div class="form-group required-field">
                                <label>Phone Number </label>
                                <div class="form-control-tooltip">
                                    <input type="tel" class="form-control form-control-sm" required>
                                    <span class="input-tooltip" data-toggle="tooltip" title="For delivery questions." data-placement="right"><i class="icon-question-circle"></i></span>
                                </div><!-- End .form-control-tooltip -->
                            </div><!-- End .form-group -->
                            
                            <div class="form-group-custom-control">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="address-save">
                                    <label class="custom-control-label" for="address-save">Save in Address book</label>
                                </div><!-- End .custom-checkbox -->
                            </div><!-- End .form-group -->
                    </div><!-- End .modal-body -->

                    <div class="modal-footer">
                        <button type="button" class="btn btn-link btn-sm" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary btn-sm">Save changes</button>
                    </div><!-- End .modal-footer -->
                </form>
            </div><!-- End .modal-content -->
        </div><!-- End .modal-dialog -->
    </div><!-- End .modal -->
@endsection
