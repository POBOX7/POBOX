@extends('layouts.app')
@section('content')

	<div class="hero-section hero-background style-02" style="background: url('../public/assets/images/hero_bg.jpg');">
	    <h1 class="page-title">Size Guide</h1>
	</div>
	<div class="static-pages"> 
	<div class="main" style="padding-left: 70px;padding-right: 70px;">
   <nav aria-label="breadcrumb" class="breadcrumb-nav">
      <ol class="breadcrumb" style="background: transparent;padding-left: 0;">
          <li class="breadcrumb-item"><a href="{{route('home_1')}}">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Size Guide</li>
      </ol>
  </nav>
	   <table class="ks-table desktop-view-size-info" border="1" style="width: 100%;">
                           <tbody style="border: 1px solid;">
                              <tr class="ks-table-row">
                                 <th class="ks-table-cell ks-table-header-cell">SIZE</th>
                                 <th class="ks-table-cell ks-table-header-cell">CHEST (IN.)</th>
                                 <th class="ks-table-cell ks-table-header-cell">WAIST (IN.)</th>
                                 <th class="ks-table-cell ks-table-header-cell">HIPS (IN.)</th>
                                 <th class="ks-table-cell ks-table-header-cell">LENGTH (IN.)</th>
                                 <th class="ks-table-cell ks-table-header-cell">SHOULDER (IN.)</th>
                              </tr>
                              @foreach ($sizeInformation as $keySizeInformationData => $valueSizeInformationData)
                              <tr class="ks-table-row">
                                 @foreach ($valueSizeInformationData['size_name'] as $key => $value)
                                 <td class="ks-table-cell ks-table-header-cell">
                                 	
                                    {{$value['name']}}
                                 </td>
                                 <td class="ks-table-cell">{{$valueSizeInformationData['chest']}}
                                 </td>
                                 <td class="ks-table-cell">{{$valueSizeInformationData['waist']}}
                                 </td>
                                 <td class="ks-table-cell">
                                    {{$valueSizeInformationData['hips']}}
                                 </td>
                                 <td class="ks-table-cell">{{$valueSizeInformationData['length']}}
                                 </td>
                                 <td class="ks-table-cell">{{$valueSizeInformationData['shoulder']}}
                                 </td>
                              </tr>
                              @endforeach 
                              @endforeach
                           </tbody>
                        </table>



                         @foreach ($sizeInformation as $keySizeInformationData => $valueSizeInformationData)
                         @foreach ($valueSizeInformationData['size_name'] as $key => $value)
                        <table class="ks-table mobile-view-size-info" border="1" style="width: 100%;">

                           <tbody style="border: 1px solid;">

                              <tr class="ks-table-row">
                                 <th class="ks-table-cell ks-table-header-cell">SIZE</th>
                                 <td class="ks-table-cell ks-table-header-cell">
                                    {{$value['name']}}
                                 </td>
                              </tr>
                              <tr class="ks-table-row">
                                 <th class="ks-table-cell ks-table-header-cell">CHEST (IN.)</th>
                                 <td class="ks-table-cell">{{$valueSizeInformationData['chest']}}
                                 </td>
                              </tr>
                              <tr class="ks-table-row">
                                 <th class="ks-table-cell ks-table-header-cell">WAIST (IN.)</th>
                                 <td class="ks-table-cell">{{$valueSizeInformationData['waist']}}
                                 </td>
                              </tr>
                              <tr class="ks-table-row">
                                 <th class="ks-table-cell ks-table-header-cell">HIPS (IN.)</th>
                                 <td class="ks-table-cell">
                                    {{$valueSizeInformationData['hips']}}
                                 </td>
                              </tr>
                              <tr class="ks-table-row">
                                 <th class="ks-table-cell ks-table-header-cell">LENGTH (IN.)</th>
                                 <td class="ks-table-cell">{{$valueSizeInformationData['length']}}
                                 </td>
                              </tr>
                              <tr class="ks-table-row">
                                 <th class="ks-table-cell ks-table-header-cell">SHOULDER (IN.)</th>
                                 <td class="ks-table-cell">{{$valueSizeInformationData['shoulder']}}
                                 </td>
                              </tr>
                            
                           </tbody>
                        </table>
                        @endforeach 
                        @endforeach
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
