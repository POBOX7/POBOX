@extends('admin.layouts.admin', ['pageTitle' => 'Add Coupon'])
@section('title', 'Add Coupon')
@section('content')

<div id="exTab2" class="container"> 
    <ul class="nav nav-tabs">
      <li class="active">
        <a  href="#1" data-toggle="tab">View Coupon</a>
      </li>
      <li >
        <a href="#2" data-toggle="tab">Coupon users</a> 
      </li>
     

    </ul>
     <div class="tab-content ">
        <div class="tab-pane active" id="1">
           <div class="row">
                 <div class="col-md-12 d-flex align-items-stretch grid-margin">
                    <div class="row flex-grow">
                      
                      <div class="col-12 stretch-card">
                        <div class="card">
                          <div class="card-body">
                           <h4 class="card-title">View Coupon</h4>
                       
                                <div class="form-group row">
                                  <label for="from_km" class="col-sm-3 col-form-label">Name</label>
                                  <div class="col-sm-3">
                                      {{$coupon['name']}}
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label for="from_km" class="col-sm-3 col-form-label">Code</label>
                                  <div class="col-sm-3">
                                      {{$coupon['code']}}
                                  </div>
                                </div>
                               
                                 <div class="form-group row item per-open">
                                  <label for="from_km" class="col-sm-3 col-form-label">Total Discount (%)</label>
                                  <div class="col-sm-3">
                                     {{$coupon['total']}}
                                  </div>
                                </div>
                                 <?php 
                                $date = date_create($coupon->valid_form);
                                $valid_form_newDate = date_format($date,"d-m-Y");
                              ?>
                                <div class="form-group row">
                                  <label for="from_km" class="col-sm-3 col-form-label">Valid From</label>
                                  <div class="col-sm-3">
                                   {{$valid_form_newDate}}
                                  </div>
                                  </div>
                                
                                 <?php 
                                $date = date_create($coupon->valid_to);
                                $valid_to_newDate = date_format($date,"d-m-Y");
                              ?>
                                <div class="form-group row">
                                  <label for="from_km" class="col-sm-3 col-form-label">Valid From</label>
                                  <div class="col-sm-3">
                                      {{$valid_to_newDate}}
                                  </div>
                                </div>
                               
                                <div class="form-group row">
                                  <label for="from_km" class="col-sm-3 col-form-label">Usage</label>
                                  <div class="col-sm-4">
                                      {{$coupon['usage']}}  / {{$coupon['total_used']}} (Total available / Total used)
                                  </div>
                                </div>
                                
                            
                          <script>
                              $('.numberbox').keyup(function(){
                              if ($(this).val() > 100){
                                alert("No numbers above 100%");
                                $(this).val('100');
                              }
                            });
                          </script>
                          
                           
                        
                     </div>
                        </div>
                      </div>
                    </div>
                  </div>
           </div>
         </div>
         <div class="tab-pane" id="2">
           <div class="row">
                      <div class="card" style="width: 100%;">
            <div class="card-body">
              <div class="row">
                
                <div class="col-md-6">
                  <h4 class="card-title">View Order</h4>
                </div>
                <div class="col-md-6" style="text-align: right">
                 <!--  <a href=""   class="btn btn-success">Add New</a> -->
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <div class="table-responsive">
                    <table id="order-listing" class="table">
                      <thead>
                        <tr>
                            <th>Sr. No #</th>
                            
                            <th>Order Number</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        @if(count($orderCouponData))
                          @foreach($orderCouponData as $key => $orderCouponDatas)
                            <tr>
                                <td>{{$key + 1}}</td>
                                <td>{{$orderCouponDatas->ordernumber}}</td>
                                <td>{{date('d-m-Y', strtotime($orderCouponDatas->created_at)) }}</td>
                                <td> <a href="{{route('view.order',$orderCouponDatas->id)}}"><i class="ti-eye" style="font-size: 2rem;color: #007bff;"></i></a></td>
                            </tr>
                          @endforeach
                        @else 
                          <tr><td colspan="5"><center>No Data Found</center></td></tr>
                        @endif
                      </tbody>
                    </table>                    
                  </div>
                </div>
              </div>
            </div>
          </div>
           </div>
         </div>
    </div>
</div>
<hr></hr>


<style type="text/css">
 
div#exTab2 a {
    text-decoration: none;
    color: #000;
    font-size: 18px;
    font-weight: 400;
}
#exTab1 .tab-content {
  color : white;
  background-color: #428bca;
  padding : 5px 15px;
}

#exTab2 h3 {
  color : white;
  background-color: #428bca;
  padding : 5px 15px;
}

/* remove border radius for the tab */

#exTab1 .nav-pills > li > a {
  border-radius: 0;
}

/* change border radius for the tab , apply corners on top*/

#exTab3 .nav-pills > li > a {
  border-radius: 4px 4px 0 0 ;
}

#exTab3 .tab-content {
  color : white;
  background-color: #428bca;
  padding : 5px 15px;
}
.tab-content{
  padding: 0!important;
}






</style>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="{{ asset('admin/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}" />
<style type="text/css">
  .nav-tabs {
    border-bottom: 1px solid #ddd;
}
.nav {
    padding-left: 0;
    margin-bottom: 0;
    list-style: none;
}
.nav-tabs>li {
    float: left;
    margin-bottom: -1px;
}
.nav-tabs>li.active>a, .nav-tabs>li.active>a:focus, .nav-tabs>li.active>a:hover {
    color: #555;
    cursor: default;
    background-color: #fff;
    border: 1px solid #ddd;
    border-bottom-color: transparent;
}
.nav-tabs>li>a {
    margin-right: 2px;
    line-height: 1.42857143;
    border: 1px solid transparent;
    border-radius: 4px 4px 0 0;
}
.nav>li>a {
    position: relative;
    display: block;
    padding: 10px 15px;
}
</style>

         

@endsection
@section('js')

<script type="text/javascript">
  $('.type').on('change',function(){

    var option_val = $(this).val();

    if(option_val == 1){
      $('.price-open').show();
      $('.per-open').hide();
    }
    if(option_val == 2){
      $('.per-open').show();
      $('.price-open').hide();
    }

  });
</script>
<script type="text/javascript">
    function isNumberKey(evt){  <!--Function to accept only numeric values-->
    //var e = evt || window.event;
  var charCode = (evt.which) ? evt.which : evt.keyCode
    if (charCode != 46 && charCode > 31 
  && (charCode < 48 || charCode > 57))
        return false;
        return true;
  }
       
    function ValidateAlpha(evt)
    {
        var keyCode = (evt.which) ? evt.which : evt.keyCode
        if ((keyCode < 65 || keyCode > 90) && (keyCode < 97 || keyCode > 123) && keyCode != 32)
         
        return false;
            return true;
    }



          </script> 
@endsection