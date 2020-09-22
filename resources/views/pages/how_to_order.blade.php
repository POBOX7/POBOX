@extends('new_resources.layouts.new_app') 
@section('content')  
@if($pagesData->heading_image !== null)
	<div class="hero-section hero-background style-02" style="background: url('{{asset('assets/upload_images/pages')}}/{{$pagesData->heading_image}}');">
	    <h1 class="page-title">@php echo $pagesData->title; @endphp</h1>
	</div>
@endif
@if($pagesData->heading_image == null)
<div class="hero-section hero-background style-02" style="background: url('../public/assets/images/hero_bg.jpg');">
      <h1 class="page-title">@php echo $pagesData->title; @endphp</h1>
  </div> 
@endif	
 <div class="main" style="padding-left: 70px;padding-right: 70px;">
	<nav aria-label="breadcrumb" class="breadcrumb-nav">
      <ol class="breadcrumb" style="background: transparent;padding-left: 0;">
          <li class="breadcrumb-item"><a href="{{route('home_1')}}">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">@php echo $pagesData->title; @endphp</li>
      </ol>
  </nav>
	<div class="static-pages"> 
	@php 
	echo $pagesData->content;
	@endphp
	</div>
</div>

@endsection
