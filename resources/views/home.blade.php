@extends('layouts.app')

@section('content')

@if (session('status'))
   <div class="alert alert-success" id="myElem">
      <strong>{{ session('status') }}</strong>
   </div>
@endif
<script type="text/javascript">
  $("#myElem").show();
setTimeout(function() { $("#myElem").hide(); }, 12000);


//$(document).ready(function(){
        $('.hero-slider.home').slick({
            arrows: true,
            infinite: true,
            speed: 400,
            autoplay: true,
            autoplaySpeed:5000,
            fade: true,
            slidesToShow: 1,
            slidesToScroll: 1
        });
      //});
</script>
<style type="text/css">
  .slick-dots li button:before{
    font-size: 37px;
    color: white!important;
  }
  .slick-prev {
    left: 50px!important;
    }
    .slick-next {
    right: 50px!important;
}
  .slick-dots li.slick-active button:before{
    color: blue!important;
  }
  .slick-dots {
    position: absolute;
    bottom: 32px;
    display: block;
    width: 100%;
    padding: 0;
    margin: 0;
    list-style: block;
    text-align: right;
    right: 80px;
}
img.w-16.h-16.rounded-full.object-cover.overflow-hidden.mx-auto.border-4.border-white{
  border: 10px solid;
  box-sizing: unset;
}
.slick-prev:before ,.slick-next:before {
    background: transparent;
    border-radius: 50%;
    color: white;
   /* border: 1px solid;*/
}
.slick-prev:before, .slick-next:before {
   
    font-family: 'slick';
    font-size: 17px;
    opacity: 0.5;
    color: #ffff!important;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    padding: 13px;
    font-weight: 900;
    background: gray;
    
}
.hero-slider button {
    opacity: 0;
}
.hero-slider:hover button {
    opacity: .8;
}

/*.hero-slider button{
   position: absolute;
  bottom: 0;
  left: 0;
  right: 0;*/
 /* background-color: #008CBA;*/
  /*overflow: hidden;
  width: 0;
  height: 100%;*/
  /*transition: .5s ease;*/
/*}*/

.hero-slider:hover button {
 /* width: 100%;

   position: absolute;
  /*bottom: 0;
  left: 0;
  right: 0;*/
}
</style>
  <!-- slider -->
  <div>
    <div class=""><!-- max-w-7xl mx-auto xl:px-8 -->
      <div class="hero-slider home">
        @foreach($banners_slider as $slider)
        <div class="relative">
          <div class="absolute top-1/5 left-1/3 transform -translate-x-1/2">
           <!--  <h1 class="text-2xl xl:text-7xl font-serif leading-tight" style="color:#3E99AC">{{$slider['text_one']}} <span style="text-align: center;"> {{$slider['text_two']}}</span><br>{{$slider['text_three']}}</h1>
            <button><a href="{{$slider['link']}}" class="btn btn-primary" style="background: #3E99AC;">Shop now</a></button> -->
          </div>
          <a href="{{$slider['url']}}">
          <img class="w-full object-cover" src="{{ asset('assets/upload_images/banner') }}/{{$slider['image']}}" alt="">
        </a>
        </div>
        @endforeach
      </div>
    </div>
  </div>

  <!-- sets -->
  <div class="bg-white py-4 sm:py-6 lg:py-8 lg:py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="grid grid-cols-1 md:grid-cols-3 row-gap-4 col-gap-8">
        @foreach($category as $cat)
        <div>
          <a href="#" title="" class="block">
            <div class="relative div-block cursor-pointer">
              <div class="bg-blue-600 opacity-80 w-full h-96 flex items-center justify-center absolute top-1/2 transform -translate-y-1/2 overlay hidden" style="height: 480px;opacity: 0.7!important;">
                <a href="#" title="" class="inline-block text-white font-bold">
                  View More
                </a>
              </div>
              <img class="w-full h-120 md:h-96 lg:h-112 xl:h-120 object-cover object-top" src="{{ asset('assets/upload_images/category') }}/{{$cat['image']}}" alt="">
              <div class="bg-blue-600 opacity-90 flex items-center justify-center py-3 absolute bottom-0 w-full block title">

                <p class="text-white">
                  {{$cat->name}}
                </p>
              </div>
            </div>
          </a>
        </div>
        @endforeach
      </div>
    </div>
  </div>

  <!-- trends -->
  <div class="bg-gray-200 py-12 lg:py-16" style="padding-bottom: 10px;">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <h2 class="text-5xl text-blue-600 text-center font-serif">
        P.O. Box Trends
      </h2>

      <div class="grid grid-cols-2 lg:grid-cols-4 row-gap-8 col-gap-4 md:col-gap-6 mt-8">
        @foreach($trending as $new )
        <div class="text-center relative">
           @if($new->discount !== 0)
          <div class="absolute top-5 right-0 bg-blue-600 px-3 py-1" style="height: 30px;height: 22px;width: 82px;padding: 0px !important;margin: 0px!important;"> 
            <p class="text-sm uppercase text-white font-bold">
              {{$new->discount}}% OFF 
            </p>
          </div>
           @endif
          <a href="#" title="" class="block">
            <img class="w-full h-64 sm:h-96 md:h-112 object-cover object-top" src="{{ asset('assets/upload_images/product') }}/{{$new['image']}}" alt="">


          </a>
          <a href="#" title="" class="block mt-4 title">
            <p>
              {{$new->name}}
            </p>
          </a>
          <div class="sm:flex items-center justify-center mt-2" style="margin-top: -14px !important;">
            <span class="original-price">
              ₹ {{$new->price}}
            </span>
             @if($new->discount !== 0)
            <strike class="text-gray-500 mx-6">
              ₹ {{$new->mrp}}
            </strike>
             @endif
            <!-- <span class="text-red-500 font-bold">
              {{$new->discount}}% Off
            </span> -->
          </div>
        </div>
        @endforeach
      
      </div>
    </div>
  </div>

 <!-- offer banner -->
  
  <div class="bg-white py-0">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <a href="{{$static_banners['url']}}">
      <img class="hidden md:block" style="width: 100%;height: 432px" src="{{ asset('assets/upload_images/banner') }}/{{$static_banners['image']}}" alt="">
      <img class="block md:hidden" style="width: 100%;height: 432px" src="{{ asset('assets/upload_images/banner') }}/{{$static_banners['image']}}" alt="">
      </a>
    </div>
  </div>

  <!-- new arrivals -->
  <div class="bg-white py-12 lg:py-16" style="padding-top: 10px;">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
     <!--  <h2 class="text-5xl text-blue-600 text-center font-serif">
        New Arrivals
      </h2> -->

      <div class="grid grid-cols-2 lg:grid-cols-4 row-gap-8 col-gap-4 md:col-gap-6 mt-8">
      
      @foreach( $newArrival as $top_product )
        <div class="text-center relative">
           @if($top_product->discount !== 0)
          <div class="absolute top-5 right-0 bg-blue-600 px-3 py-1" style="height: 22px;width: 82px;padding: 0px !important;margin: 0px!important;">
            <p class="text-sm uppercase text-white font-bold">
              {{$top_product->discount}}% OFF
            </p>
          </div>
          @endif
          <a href="#" title="" class="block">
            <img class="w-full h-64 sm:h-96 md:h-112 object-cover object-top" src="{{ asset('assets/upload_images/product') }}/{{$top_product['image']}}" alt="">
          </a>
          <a href="" title="" class="block mt-4 title">
            <p>
              {{$top_product->name}}
            </p>
          </a>
          <div class="sm:flex items-center justify-center mt-2" style="margin-top: -14px !important;">
            <span class="original-price">
              ₹ {{$top_product->price}}
            </span>
             @if($top_product->discount !== 0)
            <strike class="text-gray-500 mx-6">
              ₹ {{$top_product->mrp}}
            </strike>
             @endif
           <!--  <span class="text-red-500 font-bold">
              {{$top_product->discount}}% Off
            </span> -->
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
<style type="text/css">
 /* .text-center.px-4.slick-slide.slick-current.slick-active {
    margin-top: 40px;
}*/
</style>
<script type="text/javascript"></script>
  <!-- testimonials -->
  <div class="bg-white py-4 lg:py-16 testimonials">
    <div class="mx-auto">
      <h2 class="text-5xl text-blue-600 text-center font-serif">
        Testimonials
      </h2>

      <div class="testimonial-slider mt-6 sm:mt-8">

        @foreach ( $testinomials as $testinomials_key => $testinomials_value)
          @if($testinomials_key % 2)
          
            <div class="text-center mt-8 px-2">
          <div class="rounded-lg bg-gray-600 px-8 pt-12 pb-14 relative" style="border-radius: 25px!important;">
            <span class="absolute top-0 left-0 p-2">
              <svg class="w-8 h-8 text-white opacity-60" fill="currentColor" viewBox="0 0 24 24">
                <path d="M6.5 10c-.223 0-.437.034-.65.065.069-.232.14-.468.254-.68.114-.308.292-.575.469-.844.148-.291.409-.488.601-.737.201-.242.475-.403.692-.604.213-.21.492-.315.714-.463.232-.133.434-.28.65-.35l.539-.222.474-.197-.485-1.938-.597.144c-.191.048-.424.104-.689.171-.271.05-.56.187-.882.312-.318.142-.686.238-1.028.466-.344.218-.741.4-1.091.692-.339.301-.748.562-1.05.945-.33.358-.656.734-.909 1.162-.293.408-.492.856-.702 1.299-.19.443-.343.896-.468 1.336-.237.882-.343 1.72-.384 2.437-.034.718-.014 1.315.028 1.747.015.204.043.402.063.539l.025.168.026-.006A4.5 4.5 0 106.5 10zm11 0c-.223 0-.437.034-.65.065.069-.232.14-.468.254-.68.114-.308.292-.575.469-.844.148-.291.409-.488.601-.737.201-.242.475-.403.692-.604.213-.21.492-.315.714-.463.232-.133.434-.28.65-.35l.539-.222.474-.197-.485-1.938-.597.144c-.191.048-.424.104-.689.171-.271.05-.56.187-.882.312-.317.143-.686.238-1.028.467-.344.218-.741.4-1.091.692-.339.301-.748.562-1.05.944-.33.358-.656.734-.909 1.162-.293.408-.492.856-.702 1.299-.19.443-.343.896-.468 1.336-.237.882-.343 1.72-.384 2.437-.034.718-.014 1.315.028 1.747.015.204.043.402.063.539l.025.168.026-.006A4.5 4.5 0 1017.5 10z" />
              </svg>
            </span>
            <p class="text-white">
             {{ str_limit($testinomials_value->description, 50) }}
             <!-- {{$testinomials_value->description}} -->
            </p>
            <span class="absolute bottom-0 right-0 p-2">
              <svg class="w-8 h-8 text-white opacity-60" fill="currentColor" viewBox="0 0 24 24">
                <path d="M21.95 8.721l-.025-.168-.026.006A4.5 4.5 0 1017.5 14c.223 0 .437-.034.65-.065-.069.232-.14.468-.254.68-.114.308-.292.575-.469.844-.148.291-.409.488-.601.737-.201.242-.475.403-.692.604-.213.21-.492.315-.714.463-.232.133-.434.28-.65.35l-.539.222-.474.197.484 1.939.597-.144c.191-.048.424-.104.689-.171.271-.05.56-.187.882-.312.317-.143.686-.238 1.028-.467.344-.218.741-.4 1.091-.692.339-.301.748-.562 1.05-.944.33-.358.656-.734.909-1.162.293-.408.492-.856.702-1.299.19-.443.343-.896.468-1.336.237-.882.343-1.72.384-2.437.034-.718.014-1.315-.028-1.747a7.028 7.028 0 00-.063-.539zm-11 0l-.025-.168-.026.006A4.5 4.5 0 106.5 14c.223 0 .437-.034.65-.065-.069.232-.14.468-.254.68-.114.308-.292.575-.469.844-.148.291-.409.488-.601.737-.201.242-.475.403-.692.604-.213.21-.492.315-.714.463-.232.133-.434.28-.65.35l-.539.222c-.301.123-.473.195-.473.195l.484 1.939.597-.144c.191-.048.424-.104.689-.171.271-.05.56-.187.882-.312.317-.143.686-.238 1.028-.467.344-.218.741-.4 1.091-.692.339-.301.748-.562 1.05-.944.33-.358.656-.734.909-1.162.293-.408.492-.856.702-1.299.19-.443.343-.896.468-1.336.237-.882.343-1.72.384-2.437.034-.718.014-1.315-.028-1.747a7.571 7.571 0 00-.064-.537z" />
              </svg>
            </span>
          </div>
          <div class="relative z-10 -mt-8">
           
            <img class="w-16 h-16 rounded-full object-cover overflow-hidden mx-auto border-4 border-white" src="{{ asset('assets/upload_images/testimonial') }}/{{$testinomials_value['image']}}" alt="">
            <p class="text-blue-600 font-serif text-lg leading-7 mt-2">
              {{$testinomials_value->name}}
            </p>
          </div>
        </div>
          
          @else
          
             <div class="text-center px-2">
          <div class="rounded-lg bg-blue-600 px-8 pt-12 pb-14 relative" style="border-radius: 25px!important;">
            <span class="absolute top-0 left-0 p-2">
              <svg class="w-8 h-8 text-white opacity-60" fill="currentColor" viewBox="0 0 24 24">
                <path d="M6.5 10c-.223 0-.437.034-.65.065.069-.232.14-.468.254-.68.114-.308.292-.575.469-.844.148-.291.409-.488.601-.737.201-.242.475-.403.692-.604.213-.21.492-.315.714-.463.232-.133.434-.28.65-.35l.539-.222.474-.197-.485-1.938-.597.144c-.191.048-.424.104-.689.171-.271.05-.56.187-.882.312-.318.142-.686.238-1.028.466-.344.218-.741.4-1.091.692-.339.301-.748.562-1.05.945-.33.358-.656.734-.909 1.162-.293.408-.492.856-.702 1.299-.19.443-.343.896-.468 1.336-.237.882-.343 1.72-.384 2.437-.034.718-.014 1.315.028 1.747.015.204.043.402.063.539l.025.168.026-.006A4.5 4.5 0 106.5 10zm11 0c-.223 0-.437.034-.65.065.069-.232.14-.468.254-.68.114-.308.292-.575.469-.844.148-.291.409-.488.601-.737.201-.242.475-.403.692-.604.213-.21.492-.315.714-.463.232-.133.434-.28.65-.35l.539-.222.474-.197-.485-1.938-.597.144c-.191.048-.424.104-.689.171-.271.05-.56.187-.882.312-.317.143-.686.238-1.028.467-.344.218-.741.4-1.091.692-.339.301-.748.562-1.05.944-.33.358-.656.734-.909 1.162-.293.408-.492.856-.702 1.299-.19.443-.343.896-.468 1.336-.237.882-.343 1.72-.384 2.437-.034.718-.014 1.315.028 1.747.015.204.043.402.063.539l.025.168.026-.006A4.5 4.5 0 1017.5 10z" />
              </svg>
            </span>
            <p class="text-white">
             {{ str_limit($testinomials_value->description, 50) }}
            </p>
            <span class="absolute bottom-0 right-0 p-2">
              <svg class="w-8 h-8 text-white opacity-60" fill="currentColor" viewBox="0 0 24 24">
                <path d="M21.95 8.721l-.025-.168-.026.006A4.5 4.5 0 1017.5 14c.223 0 .437-.034.65-.065-.069.232-.14.468-.254.68-.114.308-.292.575-.469.844-.148.291-.409.488-.601.737-.201.242-.475.403-.692.604-.213.21-.492.315-.714.463-.232.133-.434.28-.65.35l-.539.222-.474.197.484 1.939.597-.144c.191-.048.424-.104.689-.171.271-.05.56-.187.882-.312.317-.143.686-.238 1.028-.467.344-.218.741-.4 1.091-.692.339-.301.748-.562 1.05-.944.33-.358.656-.734.909-1.162.293-.408.492-.856.702-1.299.19-.443.343-.896.468-1.336.237-.882.343-1.72.384-2.437.034-.718.014-1.315-.028-1.747a7.028 7.028 0 00-.063-.539zm-11 0l-.025-.168-.026.006A4.5 4.5 0 106.5 14c.223 0 .437-.034.65-.065-.069.232-.14.468-.254.68-.114.308-.292.575-.469.844-.148.291-.409.488-.601.737-.201.242-.475.403-.692.604-.213.21-.492.315-.714.463-.232.133-.434.28-.65.35l-.539.222c-.301.123-.473.195-.473.195l.484 1.939.597-.144c.191-.048.424-.104.689-.171.271-.05.56-.187.882-.312.317-.143.686-.238 1.028-.467.344-.218.741-.4 1.091-.692.339-.301.748-.562 1.05-.944.33-.358.656-.734.909-1.162.293-.408.492-.856.702-1.299.19-.443.343-.896.468-1.336.237-.882.343-1.72.384-2.437.034-.718.014-1.315-.028-1.747a7.571 7.571 0 00-.064-.537z" />
              </svg>
            </span>
          </div>
          <div class="relative z-10 -mt-8">
            <img class="w-16 h-16 rounded-full object-cover overflow-hidden mx-auto border-4 border-white" src="{{ asset('assets/upload_images/testimonial') }}/{{$testinomials_value['image']}}" alt="">
            <p class="text-blue-600 font-serif text-lg leading-7 mt-2">
              {{$testinomials_value->name}}
            </p>
          </div>
        </div>
          
          @endif



       
        @endforeach
      </div>
    </div>
  </div>

  @endsection
 
  <style type="text/css">
 .product-default:hover figure img:last-child{
  opacity: 0.2 !important;
 }   
  .home .-translate-x-1\/2{
  --transform-translate-x: 130%!important;
    --transform-translate-y: 97%;
  }
  
    .bg-blue-600.opacity-90.flex.items-center.justify-center.py-3.absolute.bottom-0.w-full.block.title {
    text-transform: uppercase;
}
.text-center.px-4.slick-slide {
    height: 240px;
}
@media only screen and (max-width: 767px) {
  .home .-translate-x-1\/2{
  --transform-translate-x: 24%!important;
    --transform-translate-y: 97%;
  }
    .slick-list.draggable{
      height: 190px;
    }
    body.bg-white.text-black.font-sans.overflow-x-hidden.antialiased {
    width: 100%;
   }
   .text-center.px-4.slick-slide {
    height: 340px!important;
   }
   .slick-list.draggable{
    height: 250px!important;
   }
   footer .col-sm-3 {
    padding: 0;
}
  }

  .testimonials .slick-initialized .slick-slide{
    height: 250px;
  }


/*.lg\:h-112 {
    height: 24rem!important;
    width: 100%;
}*/
  </style>