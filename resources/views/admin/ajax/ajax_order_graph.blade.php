<div id="orderGraphData" style="width:100%; height:300px;"></div>
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
 </script>