<div id="purchaseGraphData" style="width:100%; height:300px;"></div>
<script type="text/javascript">
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
</script>