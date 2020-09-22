@extends('new_resources.layouts.new_app') 
@section('content')
<!--Hero Section-->
<div class="hero-section hero-background style-02" style="background-image: url('{{ asset('assets/upload_images/banner') }}/{{$bannerSlider['image']}}">
    <h1 class="page-title">Fashion Blogger</h1>
</div>
<div class="main" style="padding-left: 70px;padding-right: 70px;">
  <nav aria-label="breadcrumb" class="breadcrumb-nav">
    <ol class="breadcrumb" style="background: transparent;padding-left: 0;">
        <li class="breadcrumb-item"><a href="{{route('home_1')}}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Fashion Blogger</li>
    </ol>
  </nav>
  <!--articles block-->
  <ul class="posts-list main-post-list row">
    @foreach ($blogsData as $keyBlogsData => $valueBlogsData)
     <li class="post-elem col-lg-4 col-md-4 col-sm-6 col-xs-12">
      <div class="post-item effect-04 style-bottom-info">
        <div class="thumbnail">
          <a href="{{route('blogDetail','')}}/{{$valueBlogsData->slug}}" class="link-to-post">
            <img src="{{asset('assets/upload_images/blog')}}/{{$valueBlogsData->blog_image}}" style="height: -webkit-fill-available;width:-webkit-fill-available;" alt="">
          </a>
        </div>
        <div class="post-content">
          <h4 class="post-name" style="height: 70px;">
            <a href="{{route('blogDetail','')}}/{{$valueBlogsData->slug}}" class="linktopost" style="text-align: left;">{{ str_limit($valueBlogsData->blog_title, 70) }}</a>
          </h4>
          <p class="post-archive">
            <b class="post-cat">{{$valueBlogsData->post_category}}</b>
            <span class="post-date"> / {{ date('d M, Y', strtotime($valueBlogsData->blog_date)) }}</span>
            <span class="author">Posted By: {{$valueBlogsData->author}}</span>
          </p>
          <p class="excerpt" style="text-align: left;"><?php //echo str_limit($valueBlogsData->blog_description, 140) ?></p>
          <div class="group-buttons">
                <a href="{{route('blogDetail','')}}/{{$valueBlogsData->slug}}" class="btn readmore">read more</a>
            </div>
        </div>
      </div>
    </li>
    @endforeach
  </ul>
  {{$blogsData->links()}}
</div>
<style type="text/css">
  .post-content p {
    text-align: left;
  }
  p.post-archive {
    height: 55px;
}
  @media (max-width: 1020px) {
    h4.post-name {
    height: auto !important;
   }
  }
</style>
@endsection
