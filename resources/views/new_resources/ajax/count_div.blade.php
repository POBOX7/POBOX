
 <li class="page-item" id="1"><a class="page-link" href="#">1</a></li>
 <li class="page-item" id="2"><a class="page-link" href="#">2</a></li>
 <!--<li class="page-item" id="3"><a class="page-link" href="#">3</a></li>
 <li class="page-item" id="4"><a class="page-link" href="#">4</a></li> 
  <li class="page-item"> <p style="font-size: 14px;margin-top: 12px;">total products: {{$countdata}}</p> 
 </li> -->
<!-- <li class="page-item" id="1"><a class="page-link" href="#">1</a></li>
@if($countdata > 9)
 <li class="page-item" id="2"><a class="page-link" href="#">2</a></li>
 @endif
@if($countdata > 18)
 <li class="page-item" id="3"><a class="page-link" href="#">3</a></li>
 @endif
@if($countdata > 27)
 <li class="page-item" id="4"><a class="page-link" href="#">4</a></li> 
 @endif
 @if($countdata > 36)
 <li class="page-item" id="4"><a class="page-link" href="#">4</a></li> 
 @endif -->

<script type="text/javascript">
	var sorting_filter = [];
var page = [];
 var page_url = null;
if(window.location.href.indexOf("new-arrival") > -1){
      var page_url = "new-arrival";
    } 

 $('li.page-item a').on('click', function (e) {
  e.preventDefault(); 
  var page_id = $(this).parent().attr('id'); 
//    $('li.popup-color a').removeClass('active');
  
    
// if($(this).parent().hasClass( "active" )){
//   $(this).parent().removeClass('active');
// }else{
// $(this).parent().addClass('active');
  
// }
 $('li.page-item a').parent().removeClass('active');
  $(this).parent().addClass('active'); 
   page.push(page_id);
        if (page.length > 1) {
            page.splice(0, 1);
        }  

      $.ajax({
         type: "get",
         url: "{{ url('/common-filter') }}",
         cache: !1,
         data: { 
              page: page,
               sorting_filter: sorting_filter,
               clearall: clearall,
            size: size,
             categories: categories,
             brand: brand, 
             color:color,
              min_price: min_price,
              max_price: max_price, 
              page_url:page_url,
             _token: "{{ csrf_token() }}",
         },
         success: function(data) {
             $('#filter_div').html(data);
         }
     }); 
});
</script>