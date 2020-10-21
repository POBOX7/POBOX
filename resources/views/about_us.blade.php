@extends('new_resources.layouts.new_app') 
@section('content')


@if(isset($aboutData->heading_image))
 <div class="hero-section hero-background style-02" style="background: url('{{asset('assets/upload_images/about')}}/{{$aboutData['heading_image']}}');">
    <h1 class="page-title">About Us</h1>
</div>  
@endif 

 <div class="main" style="padding-left: 70px;padding-right: 70px;">
  <nav aria-label="breadcrumb" class="breadcrumb-nav">
          <ol class="breadcrumb" style="background: transparent;padding-left: 0;">
              <li class="breadcrumb-item"><a href="{{route('home_1')}}">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">About Us</a></li>
          </ol>
  </nav>
     @if(!is_null($aboutData))
       <div class="row" style="margin-bottom: 30px;">
        <!-- <div class="col-lg-6">
           <img src="{{asset('assets/upload_images/about')}}/{{$aboutData['image']}}" alt="about image" >
        </div>
        <div class="col-lg-6">
            <div class="heading text-center mb-4">
                <h2 class="title mb-3"><?php echo $aboutData->title  ?></h2>
                <p style="text-align: left;"><?php echo $aboutData->content  ?></p>
            </div>
        </div> -->
        <div class="col-lg-12">
            <div class="heading text-center mb-12">
                <h2 class="title mb-12"><?php echo $aboutData->title  ?></h2>
                <p style="text-align: left;"><?php echo $aboutData->content  ?></p>
            </div>
        </div>
        @else
        <h3>Not found</h3>
        @endif

    </div>
    <style type="text/css">
      p {
    text-align: justify;
}
    </style>
     <!--  <div class="row" style="margin-top: 60px;margin-bottom: 60px;">
      <div class="col-md-10 offset-md-1 col-lg-6 offset-lg-3">
          <div class="row">
              <div class="col-sm-4 count-container text-center">
                  <div class="count-wrapper">
                      <span class="count" data-from="0" data-to="50" data-speed="2000" data-refresh-interval="50">50</span>+
                  </div> --><!-- End .count-wrapper -->
                 <!--  <h4 class="count-title">Fashion Brands</h4>
              </div> --><!-- End .col-sm-4 -->
              <!-- <div class="col-sm-4 count-container text-center">
                  <div class="count-wrapper">
                      <span class="count" data-from="0" data-to="150" data-speed="2000" data-refresh-interval="50">150</span>K+
                  </div> --><!-- End .count-wrapper -->
                  <!-- <h4 class="count-title">Fashion Products</h4>
              </div> --><!-- End .col-sm-4 -->
              <!-- <div class="col-sm-4 count-container text-center">
                  <div class="count-wrapper">
                      <span class="count" data-from="0" data-to="250" data-speed="2000" data-refresh-interval="50">250</span>K+
                  </div> --><!-- End .count-wrapper -->
                  <!-- <h4 class="count-title">Regular Buyers</h4>
              </div> --><!-- End .col-sm-4 -->
          <!-- </div> --><!-- End .row -->
      <!-- </div> --><!-- End .col-lg-6 -->
  <!-- </div> --><!-- End .row -->
    



</div>    
@endsection
