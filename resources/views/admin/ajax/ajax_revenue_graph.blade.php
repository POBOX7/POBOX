<div id="revenueGraphData" style="width:100%; height:300px;"></div>
<script type="text/javascript">
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