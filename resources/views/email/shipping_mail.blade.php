<style>
.table th img, .jsgrid .jsgrid-table th img, .table td img, .jsgrid .jsgrid-table td img {
    width: 100px!important;
    height: 100px!important;
     border-radius: unset!important; 
}
    table{
        font-size: 10px;
    }
    hr{
        height:2px;border:none;color:#333;background-color:#333;
    }
    .bold{
        font-weight: bold;
    }
    hr.hr1{
    }
    table.maintable{
        width: 100%;
    }
    .dark{
        background-color: #333;
        padding: 5px;
        color: #fff;
    }
    td.bottom-line{
        border-bottom: 3px solid #000;        
    }
    td.bottom-line-3{
        border-bottom: 2px solid #000;
    }


    table.item-table {
        /*background-color: #eee;*/
        width: 100%;
    }
    .item-table th {
        font-size: 10px;
    }
    .item-table td {
        font-size: 10px;
    }
    table.item-table tr td {
        /*background-color: #fff;*/
    }
    .full-border{
        border: 2px solid #000;
        margin: 0;
        padding: 0;
    }
    span.high-text{
        font-size: 12px;
    }

    .box-td{
        /*        text-align: center;
                background-color: #e3e3e3;
                border-top: 2px solid #000;
                border-bottom: 3px solid #000;*/
    }    
    .box-td h3{
        margin: 0;
    }

    .border-top{
        border-top: 2px solid #000;
    }
    .border-top-sm{
        border-top: 1px solid #000;
    }
    .border-bottom{
        border-bottom: 2px solid #000;
    }
    .border-right{
        border-right: 1px solid #000;
    }

    .margin-none{
        margin: 0;   
    }


    h3.invoice-title  {
        text-align: center;
    }
   table.order-table{
    border-collapse: collapse;
    text-align: center!important;
}
    
    table {
    border-collapse: collapse!important;
}
</style>

<table class="maintable" style="border: 0px !important;width: 100%;">
    <tr style="text-align: center!important;">
        <td style="width: 100%;" style="text-align: center;">
            <img style="text-align: center;" src="http://admin.poboxfashion.com/assets/upload_images/favicon.png" style="width: 200px;">
        </td>
    </tr>

        <td style="width: 55%;">
            @foreach($oderData as $keyOderData => $OderDatas)
    <p style="font-size: 20px;">PO Box:Order {{$OderDatas['ordernumber']}}</p>

    <p>Dear {{$oderData[$keyOderData]['address_data']['name']}}</p>
    <p>Below are your Shipping details.</p>
    <p>{{$shipping_content}}</p>
    <p>Thank you,<br>Team PO Box.</p>
          
            <table style="width: 100%;" >                
                <tr style="">
                    <td colspan="2" style="text-align: center;background-color: #E0E0E0;">
                        <!--<span class="high-text bg-gray" style="font-weight: bold;">RETAIL INVOICE</span>-->
                        <br />
                        <span style="font-size: 16px;font-weight: bold;">RETAIL INVOICE</span>
                        <br />
                    </td>
                </tr>
                <tr><td colspan="2"><hr  /></td></tr>
                <tr>
                    <td class="part1">
                      <strong>ORDER NUMBER</strong> : {{$OderDatas['ordernumber']}} <br />
                    </td>
                    <td class="part2"> 
                        <strong>INVOICE DATE</strong> : {{ $OderDatas['created_at']->format('d/m/Y')}} <br />
                    </td>
                </tr>
                <tr><td colspan="2"><hr  /></td></tr>
                <tr>
                    <td class="part1" style="background-color: #E0E0E0;">
                        <br />
                        <span class="high-text bold ">SHIPPING INFORMATION</span>
                    </td>
                    <td class="part2" style="background-color: #E0E0E0;">
                        <br />
                        <span class="high-text bold ">PAYMENT INFORMATION
</span>
                    </td>
                </tr>
                <tr>
                    <td class="part1" style="text-transform: uppercase;width: 49%;">
                        <br>
                       <strong>Shipping Address : </strong><br/>
                        <b>Name:</b> {{$oderData[$keyOderData]['address_data']['name']}}  <br/>
                        <b>Address:</b>{{$oderData[$keyOderData]['address_data']['address_line_one']}}<br>
                                                    <b>Address Line 2 :</b> {{$oderData[$keyOderData]['address_data']['address_line_two']}}<br>
                                                    <b>Address Line 3 :</b> {{$oderData[$keyOderData]['address_data']['address_line_three']}}  <br/>
                            
                       <b>City:</b> {{$oderData[$keyOderData]['address_data']['city']}}  <br>
                       <b>Country:</b> {{$oderData[$keyOderData]['address_data']['country']}}  <br/> 
                       <b>State:</b> {{$oderData[$keyOderData]['address_data']['state']}}<br/>
                      
                       <b>Phone No:</b> {{$oderData[$keyOderData]['address_data']['phone_number']}} <br/> 

                        <b>Pincode:</b>
                         {{$oderData[$keyOderData]['address_data']['pincode']}}  <br/>
                    </td>
                    <td class="part2" style="text-transform: uppercase;width: 49%;">
                        <br />
                        <strong>Billing Address : </strong><br/>
                       <b>Name:</b> {{$oderData[$keyOderData]['address_data']['name']}}  <br/>
                         <b>ADDRESS:</b>{{$oderData[$keyOderData]['address_data']['address_line_one']}}<br>
                                                    <b>Address Line 2 :</b> {{$oderData[$keyOderData]['address_data']['address_line_two']}}<br>
                                                    <b>Address Line 3 :</b> {{$oderData[$keyOderData]['address_data']['address_line_three']}} <br/>
                       
                        <b>City:</b> {{$oderData[$keyOderData]['address_data']['city']}}  <br>
                        <b>Country:</b> {{$oderData[$keyOderData]['address_data']['country']}}  <br/> 
                       <b>State:</b> {{$oderData[$keyOderData]['address_data']['state']}}<br/>
                      
                       <b>Phone No:</b> {{$oderData[$keyOderData]['address_data']['phone_number']}}  <br/>
                       <b>Pincode:</b> {{$oderData[$keyOderData]['address_data']['pincode']}}  <br/> 
                       
                        
                    </td>
                </tr>
                <tr><td colspan="2"><hr  /></td></tr>
                <tr>
                    <!-- <td class="part1 ">
                      <br /><strong>Shipping Method : <br /></strong> <br />
                    </td> -->
                    <td class="part2">
                       <br /><strong>Payment Method : Razorpay</strong> <br />
                    </td>
                </tr>
                <tr><td colspan="2"><hr  /></td></tr>
                <tr>
                    <td colspan="2" class="">
                        <br />
                        @php($Subtotal  = 0)
                        <table border= "1" class="item-table order-table" style="width: 100%;" >
                            
                                                
                                                <tr style="border:1px solid #000;">
                                                <td>Sr. No #</td>
                                                <td>Image</td>
                                                <td>Name</td>
                                                <td>Size</td>
                                                <td>Color</td>
                                                <td>HSN No</td>
                                                <td>Qty</td>
                                                <td>Price</td>
                                                <td>Coupon Discount</td>
                                                <td>GST</td>
                                                <td>Price</td>
                                              </tr>
                                               
                                               @foreach($productDetail as $keyProduct_data => $product_data)
                                             <!--  https://poboxfashion.com/assets/upload_images/product/{{$product_data['image']}} -->
                                                        <tr>
                                                    <td>{{$keyProduct_data + 1 }}</td>
                                                    
                                                    <td><img src="{{ asset('assets/upload_images/product') }}/{{$product_data->getProduct->image}}"  style="width: 50px!important;height: 50px!important;"></td>
                                                    <td>{{$product_data->getProduct['name'] }}</td>
                                                    
                                                       <td>{{$product_data['size_name'] }}</td>
                                                   
                                                    <td><p style="margin-left: 15px;text-align: center!important; color:white;background:{{$product_data['hex_code'] }}!important;border: 1px solid #000;height: 15px;width: 15px;"></p></td>
                                                     <td>{{$product_data->hsn_no }}</td>
                                                    <td>{{$product_data->qty }}</td>
                                                    <td>
                                                        {{$product_data->price}}
                                                      
                                                    </td>
                                                    <td>
                                                      
                                                        @if($product_data->discount_price > 0)
                                                          {{$product_data->discount_price}}
                                                        @else
                                                          -
                                                        @endif
                                                      
                                                    </td>
                                                    <td>
                                                      <span>{{$product_data->gst_amount}}</span>
                                                      <br>
                                                      @if($OderDatas->getAddress->state == 'Gujarat')
                                                        <span>
                                                              <label style="font-weight: 600;color: #7a7d82;font-size: 12px;">CGST : </label> {{$product_data->gst_amount/2}} <br>
                                                              <label style="font-weight: 600;color: #7a7d82;font-size: 12px;">SGST :</label>{{$product_data->gst_amount/2}} <br>
                                                          </span>
                                                      @else
                                                          <span>
                                                              <label style="font-weight: 600;color: #7a7d82;font-size: 12px;">IGST : </label> {{$product_data->gst_amount}} <br>
                                                          </span>
                                                      @endif
                                                    </td>
                                                    <td>
                                                      <span>{{($product_data->price * $product_data->qty) + $product_data->gst_amount}}</span>
                                                    </td>
                                                  </tr>

                                                   @endforeach
                                          
                            
                            <tr>
                                <td style="text-align: right!important;" colspan="10">Total</td>
                                <td style="text-align: center;">
                                    {{$OderDatas['totalamount']}}
                                </td>
                            </tr>
                        </table>
                        <br />
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <!-- <br /><br /><strong>DECLARATION</strong><br />
                        We declare that this invoice shows actual price of the goods described inclusive of taxes and that all
                        particulars are true and correct.<br />
                        <br /> -->
                        <br />
                        <strong>CUSTOMER ACKNOWLEDGEMENT</strong><br />
                        I, {{$oderData[$keyOderData]['address_data']['name']}} , hereby confirm that the above product/s are purchased for my personal consumptions and not for resale
                        <br />
                    </td>
                </tr>
                <tr><td colspan="2"><hr  /></td></tr>
                <tr>
                   <td class="part1" style="text-transform: uppercase;width: 50%;">     
                        <b>Company Name :-</b> V B FABRIC EXPORTS PVT LTD<br>
                        <b>ADDRESS :-</b> B-117 , GROUND FLOOR SUMEL BUSINESS PARK-2, NEAR VANIJYA BHAVAN, KANKARIA ROAD,<br>
                        AHMEDABAD-380001,<br>
                          GUJARAT, INDIA<br>
                    </td>
                    <td class="part2" style="text-transform: uppercase;width: 50%;float: right;">
                              <b>GSTIN:-</b> 24AAECV5166F1ZC<br>
                              <b>GSTIN/UIN:-</b>24AAECV5166F1ZC<br>
                              <b>STATE NAME:-</b> GUJARAT, CODE 24<br>
                              <b>MOBILE NO:-</b>9879899004<br>
                    </td>    
                </tr>
                <tr>
                    <td colspan="2" class="" style="font-weight: bold;text-align: center;">                        
                        <br />THIS IS A COMPUTER GENERATED INVOICE AND DOES NOT REQUIRE SIGNATURE<br />
                    </td>
                </tr>
                <tr><td colspan="2"><hr  /></td></tr>
            </table>
              @endforeach
        </td>
    </tr>
</table>

