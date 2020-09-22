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

<table class="maintable" style="border: 0px !important;">
    <tr style="text-align: center!important;">
        <td style="width: 100%;" style="text-align: center;">
            <img style="text-align: center;" src="http://pobox.rethinksoft.com/admin/images/favicon.png" style="width: 200px;">
        </td>
    </tr>
        <td style="width: 55%;">
          @foreach($oderData as $keyOderData => $OderDatas)
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
                        <table border= "1" class="item-table order-table" >
                            
                                                <tr style="border:1px solid #000;">
                                                <td>Sr. No #</td>
                                                <td>Image</td>
                                                <td>Name</td>
                                                <td>Size</td>
                                                <td>Color</td>
                                                <td>Qty</td>
                                                <td>SKU</td>
                                                <td>Price</td>
                                              </tr>
                                               
                                               @foreach($productDetail as $keyProduct_data => $product_data)
                                             <!--  http://pobox.rethinksoft.com/assets/upload_images/product/{{$product_data['image']}} -->
                                                        <tr>
                                                    <td>{{$keyProduct_data + 1 }}</td>
                                                    <td><img src="http://pobox.rethinksoft.com/assets/upload_images/product/{{$product_data->getProduct['image']}}"  style="width: 50px!important;height: 50px!important;"></td>
                                                    <td>{{$product_data->getProduct['name'] }}</td>
                                                    
                                                       <td>{{$product_data['size_name'] }}</td>
                                                   
                                                    <td><p style="margin-left: 15px;text-align: center!important; color:white;background:{{$product_data['hex_code'] }}!important;border: 1px solid #000;height: 15px;width: 15px;"></p></td>
                                                    <td>{{$product_data['qty'] }}</td>
                                                    <td>{{$product_data['sku'] }}</td>
                                                    <td>
                            
                            @php($Subtotal += ($product_data['qty'] * $product_data['price']))
                           

                                                    {{$product_data['price'] * $product_data['qty'] }}</td>
                                                  </tr>


                                                   @endforeach
                                          
                            
                            <tr>
                                <td style="text-align: right!important;" colspan="7">Subtotal</td>
                             
                                <td style="text-align: center;">

                                     {{$Subtotal}} 
                                </td>
                            </tr>

                                
                            <tr>
                                <td style="text-align: right!important;" colspan="7">Coupon Discount</td>
                                <td style="text-align: center;">
                                  {{$OderDatas->coupon_amount}} 
                                </td>
                            </tr>

                            
                           

                          <!-- <tr>
                                <td style="text-align: right!important;" colspan="7">Shipping charge</td>
                                <td style="text-align: center;">
                                    0
                                </td>
                            </tr>
 -->
                            <tr>
                                <td style="text-align: right!important;" colspan="7">Applicable GST(5%)</td>
                                <td style="text-align: center;">
                                 {{$OderDatas['gstAmount']}}
                                </td>
                            </tr>



                            <tr>
                                <td style="text-align: right!important;" colspan="7">Total</td>
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

