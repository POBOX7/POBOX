@extends('admin.layouts.admin')
@section('content')
<!-- Main content -->
<div class="row">
            <div class="col-md-6 col-lg-3 grid-margin stretch-card">
              <a href="{{route('admin.order')}}" style="width: 100%;float: left;">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex align-items-center justify-content-md-center">
                    <i class="mdi mdi-basket icon-lg text-success"></i>
                    <div class="ml-3">
                      <p class="mb-0">Daily Sales</p>
                      <h6>{{$dailySalesCount}}</h6>
                    </div>
                  </div>
                </div>
              </div>
            </a>
            </div>
            <div class="col-md-6 col-lg-3 grid-margin stretch-card">
               <a href="{{ route('customer') }}" style="width: 100%;float: left;">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex align-items-center justify-content-md-center">
                    <i class="mdi mdi-rocket icon-lg text-warning"></i>
                    <div class="ml-3">
                      <p class="mb-0">Customers</p>
                      <h6>{{$customersCount}}</h6>
                    </div>
                  </div>
                </div>
              </div>
            </a>
            </div>
            <div class="col-md-6 col-lg-3 grid-margin stretch-card">
               <a href="{{route('supplier')}}" style="width: 100%;float: left;">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex align-items-center justify-content-md-center">
                    <i class="mdi mdi-diamond icon-lg text-info"></i>
                    <div class="ml-3">
                      <p class="mb-0">Suppliers</p>
                      <h6>{{$suppliersCount}}</h6>
                    </div>
                  </div>
                </div>
              </div>
            </a>
            </div>
            <div class="col-md-6 col-lg-3 grid-margin stretch-card">
               <a href="{{ route('product') }}" style="width: 100%;float: left;">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex align-items-center justify-content-md-center">
                    <i class="mdi mdi-chart-line-stacked icon-lg text-danger"></i>
                    <div class="ml-3">
                      <p class="mb-0">Products</p>
                      <h6>{{$productCount}}</h6>
                    </div>
                  </div>
                </div>
              </div>
            </a>
            </div>

          
          
          <div class="col-md-6 col-lg-3 grid-margin stretch-card">
            <a href="{{route('admin.order')}}" style="width: 100%;float: left;">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex align-items-center justify-content-md-center">
                    <i class="mdi mdi-chart-line-stacked icon-lg text-danger"></i>
                    <div class="ml-3">
                      <p class="mb-0">Orders</p>
                      <h6>{{$totalOrderCount}}</h6>
                    </div>
                  </div>
                </div>
              </div>
              </a>
            </div>
          
            <div class="col-md-6 col-lg-3 grid-margin stretch-card">
              <a href="{{route('admin.order')}}" style="width: 100%;float: left;">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex align-items-center justify-content-md-center">
                    <i class="mdi mdi-chart-line-stacked icon-lg text-danger"></i>
                    <div class="ml-3">
                      <p class="mb-0">Total Sale Amount</p>
                      <h6>₹{{round($totalSaleAmount)}}</h6>
                    </div>
                  </div>
                </div>
              </div>
            </a>
            </div>
          </div>
          
          <div class="row">
              <div class="col-md-6 col-sm-6 col-xs-12">
                  <div class="x_panel">
                    <div class="x_title">
                      <h2>Orders Graph</h2>
                      <label>Year</label>
                      <select id="order_year" name="order_year">
                        <option value="2020" selected>2020</option>
                        <option value="2021">2021</option>
                        <option value="2022">2022</option>
                        <option value="2023">2023</option>
                        <option value="2024">2024</option>
                        <option value="2025">2025</option>
                      </select>
                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content2">
                      <div id="ajax_order_graph">
                      <div id="orderGraphData" style="width:100%; height:300px;"></div>
                      </div>
                    </div>
                  </div>
                </div>
           

              <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="x_panel">
                      <div class="x_title">
                        <h2>Purchase Graph</h2>
                        <label>Year</label>
                      <select id="purchase_year" name="purchase_year">
                        <option value="2020" selected>2020</option>
                        <option value="2021">2021</option>
                        <option value="2022">2022</option>
                        <option value="2023">2023</option>
                        <option value="2024">2024</option>
                        <option value="2025">2025</option>
                      </select>
                        <div class="clearfix"></div>
                      </div>
                      <div class="x_content2">
                         <div id="ajax_purchase_graph">
                        <div id="purchaseGraphData" style="width:100%; height:300px;"></div>
                        </div>
                      </div>
                    </div>
              </div>
               <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="x_panel">
                      <div class="x_title">
                        <h2>Revenue Graph</h2>
                        <label>Year</label>
                      <select id="revenue_year" name="revenue_year">
                        <option value="2020" selected>2020</option>
                        <option value="2021">2021</option>
                        <option value="2022">2022</option>
                        <option value="2023">2023</option>
                        <option value="2024">2024</option>
                        <option value="2025">2025</option>
                      </select>
                        <div class="clearfix"></div>
                      </div>
                      <div class="x_content2">
                         <div id="ajax_revenue_graph">
                        <div id="revenueGraphData" style="width:100%; height:300px;"></div>
                      </div>
                      </div>
                    </div>
              </div>


               <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="x_panel">
                      <div class="x_title">
                        <h2>Category wise sale</h2>
                        
                        <div class="clearfix"></div>
                      </div>
                      <div class="x_content2">
                        
                        <div id="Category-wise-sale-chart" style="width:100%; height:300px;">
                      </div>
                       <div id="legend123" class="donut-legend"></div>
                      </div>
                    </div>
              </div>


              

        </div>
          <script type="text/javascript">

            $("#order_year").on("change", function() {
                var order_year_value = $("#order_year :selected").attr('value');
                  $.ajax({
                      type: "post",
                      url : '{{url('/admin/order-year')}}',
                      cache:false,
                      data:{
                        'order_year_value' : order_year_value,
                        "_token": "{{ csrf_token() }}",
                      },
                      success:function(data){
                        $('#ajax_order_graph').html(data);
                      }
                  });
            });


            //purchase
            $("#purchase_year").on("change", function() {
                var order_year_value = $("#purchase_year :selected").attr('value');
                  $.ajax({
                      type: "post",
                      url : '{{url('/admin/purchase-year')}}',
                      cache:false,
                      data:{
                        'order_year_value' : order_year_value,
                        "_token": "{{ csrf_token() }}",
                      },
                      success:function(data){
                        $('#ajax_purchase_graph').html(data);
                      }
                  });
            });

            //revenueGraphData
            $("#revenue_year").on("change", function() {
                var order_year_value = $("#revenue_year :selected").attr('value');
                  $.ajax({
                      type: "post",
                      url : '{{url('/admin/revenue-year')}}',
                      cache:false,
                      data:{
                        'order_year_value' : order_year_value,
                        "_token": "{{ csrf_token() }}",
                      },
                      success:function(data){
                        $('#ajax_revenue_graph').html(data);
                      }
                  });
            });

          </script>

          <script type="text/javascript">
            //order graph data
             (function($) {
              'use strict';
              
              $(function() {
                if ($('#orderGraphData').length){ 
                new Morris.Line({
                element: 'orderGraphData',
                data: [
                   @foreach($orderGraphData as $key => $value)
                    {month: "{{$value['month']}}", Orders: "{{$value['apporder']}}"},
                   @endforeach
                ],
                xkey: 'month',
                parseTime: false,
                ykeys: ['Orders'],
                hideHover: 'auto',
                labels: ['Orders'],
                lineColors: ['#26B99A']
              });

              } 
              });
            })(jQuery);


            //purchase graph data
            (function($) {
              'use strict';
              $(function() {
                if ($('#purchaseGraphData').length){ 
                new Morris.Line({
                element: 'purchaseGraphData',
                data: [
                   @foreach($purchaseGraphData as $key => $value)
                    {month: "{{$value['month']}}", Purchase: "{{$value['apporder']}}"},
                   @endforeach
                ],
                xkey: 'month',
                parseTime: false,
                ykeys: ['Purchase'],
                hideHover: 'auto',
                labels: ['Purchase'],
                lineColors: ['#fb9678']
              });

              } 
              });
            })(jQuery);

            //Revenue Graph
            (function($) {
              'use strict';
              $(function() {
                if ($('#revenueGraphData').length){ 
                new Morris.Line({
                element: 'revenueGraphData',
                data: [
                   @foreach($revenueGraphData as $key => $value)
                    {month: "{{$value['month']}}", Revenue: "{{$value['apporder']}}"},
                   @endforeach
                ],
                xkey: 'month',
                parseTime: false,
                ykeys: ['Revenue'],
                hideHover: 'auto',
                labels: ['Revenue'],
                lineColors: ['#2c64b8']
              });

              } 
              });
            })(jQuery);
  
</script>
 <script type="text/javascript">
                  if ($("#Category-wise-sale-chart").length) {
                    $(function() {
                      var categories_pi_chart_datas = @json($categories_pi_chart_datas);
                    
                      var browsersChart = Morris.Donut({
                        element: 'Category-wise-sale-chart',
                        data: categories_pi_chart_datas,
                        resize: true,
                        colors: ['#03a9f3', '#00c292', '#dddddd','red','green','blue','purple','orange'],
                        /*formatter: function(value, data) {
                          return Math.floor(value / total * 100) + '%';
                        }*/
                      });

                      browsersChart.options.data.forEach(function(label, i) {
                        var legendItem = $('<span></span>').text(label['label']).prepend('<span>&nbsp;</span>');
                        legendItem.find('span')
                          .css('backgroundColor', browsersChart.options.colors[i]);
                        $('#legend123').append(legendItem)
                      });
                    });
                  }
                </script>
<style type="text/css">
.content-wrapper a {
    color: #000;
}
  .morris-hover.morris-default-style {
    padding: 6px;
    color: #666;
    background: rgba(243,242,243,.8);
    border: 2px solid rgba(195,194,196,.8);
    font-family: sans-serif;
    font-size: 12px;
    text-align: center;
}
.morris-hover {
    position: absolute;
    z-index: 1000;
}
</style>



@endsection
