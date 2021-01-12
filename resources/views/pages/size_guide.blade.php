@extends('new_resources.layouts.new_app') 
@section('content') 
@if(!is_null($bannerSlider)) 
<div class="hero-section hero-background style-02" style="background-image: url('{{ asset('assets/upload_images/banner') }}/{{$bannerSlider['image']}}">
    <h1 class="page-title">Size Guide</h1>
</div>
@endif
<div class="main" style="padding-left: 70px;padding-right: 70px;margin-top: 40px;">
	   <table class="ks-table desktop-view-size-info" border="1" style="width: 100%;">
                           <tbody style="border: 1px solid;">
                              <tr class="ks-table-row">
                                 <th class="ks-table-cell ks-table-header-cell">Sr. No</th>
                                 <th class="ks-table-cell ks-table-header-cell">SIZE</th>
                                 <th class="ks-table-cell ks-table-header-cell">CHEST (IN.)</th>
                                 <th class="ks-table-cell ks-table-header-cell">WAIST (IN.)</th>
                                 <th class="ks-table-cell ks-table-header-cell">HIPS (IN.)</th>
                                 <th class="ks-table-cell ks-table-header-cell">LENGTH (IN.)</th>
                                 <th class="ks-table-cell ks-table-header-cell">SHOULDER (IN.)</th>
                              </tr>
                          @if(count($sizeInformations))
                          @foreach($sizeInformations as $key => $sizeInformation)
                            <tr>
                                <td>{{$key + 1}}</td>
                                <td>{{$sizeInformation->size_name}}  </td>
                                <td>{{$sizeInformation->chest}}  </td>
                                <td>{{$sizeInformation->waist}}  </td>
                                <td>{{$sizeInformation->hips}}  </td>
                                <td>{{$sizeInformation->length}}  </td>
                                <td>{{$sizeInformation->shoulder}}  </td>
                               
                            </tr>
                          @endforeach
                        @else 
                          <tr><td colspan="5"><center>No Data Found</center></td></tr>
                        @endif
                           </tbody>
                        </table>


                         @if(count($sizeInformations))
                        @foreach($sizeInformations as $key => $value)
                        <table class="ks-table mobile-view-size-info" border="1" style="width: 100%;">

                           <tbody style="border: 1px solid;">

                              <tr class="ks-table-row">
                                 <th class="ks-table-cell ks-table-header-cell">Sr. No</th>
                                 <td class="ks-table-cell ks-table-header-cell">
                                    {{$key + 1}}
                                 </td>
                              </tr>
                              <tr class="ks-table-row">
                                 <th class="ks-table-cell ks-table-header-cell">SIZE</th>
                                 <td class="ks-table-cell ks-table-header-cell">
                                    {{$value['size_name']}}
                                 </td>
                              </tr>
                              <tr class="ks-table-row">
                                 <th class="ks-table-cell ks-table-header-cell">CHEST (IN.)</th>
                                 <td class="ks-table-cell">{{$value['chest']}}
                                 </td>
                              </tr>
                              <tr class="ks-table-row">
                                 <th class="ks-table-cell ks-table-header-cell">WAIST (IN.)</th>
                                 <td class="ks-table-cell">{{$value['waist']}}
                                 </td>
                              </tr>
                              <tr class="ks-table-row">
                                 <th class="ks-table-cell ks-table-header-cell">HIPS (IN.)</th>
                                 <td class="ks-table-cell">
                                    {{$value['hips']}}
                                 </td>
                              </tr>
                              <tr class="ks-table-row">
                                 <th class="ks-table-cell ks-table-header-cell">LENGTH (IN.)</th>
                                 <td class="ks-table-cell">{{$value['length']}}
                                 </td>
                              </tr>
                              <tr class="ks-table-row">
                                 <th class="ks-table-cell ks-table-header-cell">SHOULDER (IN.)</th>
                                 <td class="ks-table-cell">{{$value['shoulder']}}
                                 </td>
                              </tr>
                            
                           </tbody>
                        </table>
                        @endforeach 
                         @else 
                          <tr><td colspan="5"><center>No Data Found</center></td></tr>
                        @endif
                       



                        
	</div>
</div>
<style type="text/css">
   @media only screen and (max-width: 767px) {
   table.ks-table.mobile-view-size-info {
   width: 100% !important;
   float: left;
   margin-bottom: 10px;
   }
   table.ks-table.mobile-view-size-info table.ks-table tr.ks-table-row, table.ks-table td {
   /*border: 1px solid;*/
   text-align: center;
   width: 368px !important;
   }
   table.ks-table.mobile-view-size-info {
   width: 100% !important;
   /* float: left; */
   margin-bottom: 10px;
   }
   table.ks-table.mobile-view-size-info {
   display: block!important;
   padding: 20px;
   }
   table.ks-table.desktop-view-size-info {
   display: none!important;
   }
   table.ks-table.mobile-view-size-info{
   display: block!important;
   }
   div#myModal_size .modal-dialog {
   max-width: 800px !important;
   }
   div#myModal_size .modal-content {
   width: 530px;
   min-width: 400px !important;
   padding: 30px;
   }
   }
   div#myModal_size .modal-dialog {
   max-width: 500px !important;
   }
   table.ks-table.mobile-view-size-info{
   display: none;
   }
   table.ks-table.desktop-view-size-info {
   display: block;
   }
   table.ks-table.desktop-view-size-info {
    border: 0;
}
</style>
@endsection
<style type="text/css">
  body {
    font-family: Lato,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji!important;
    font: 300 16px/22px -apple-system,BlinkMacSystemFont,"Lato","Open Sans","HelveticaNeue-Light","Helvetica Neue Light","Helvetica Neue",Helvetica,Arial,"Lucida Grande",sans-serif!important;
}
</style>
