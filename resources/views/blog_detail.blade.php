@extends('new_resources.layouts.new_app') 
@section('content')
<!--Hero Section-->
<!-- <div class="hero-section hero-background style-02" style="background: url('../assets/images/hero_bg.jpg');">
    <h1 class="page-title">Fashion Blogger Detail</h1>
</div>
 <div class="main" style="padding-left: 70px;padding-right: 70px;">
  <nav aria-label="breadcrumb" class="breadcrumb-nav">
          <ol class="breadcrumb" style="background: transparent;padding-left: 0;">
              <li class="breadcrumb-item"><a href="{{route('home_1')}}">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Fashion Blogger Detail</li>
          </ol>
  </nav> -->
 <div class="container">
                <div class="container-box">
                    <div class="row">
                        <div class="col-lg-12">
                          @foreach ($blogDetailData as $key => $value)
                            <article class="entry single">
                                <div class="entry-media">
                                    <div  style="height: 390px!important;" >
                                        <img style="height: -webkit-fill-available!important;"    src="{{asset('assets/upload_images/blog')}}/{{$value->blog_image}}" alt="Post">
                                        
                                    </div><!-- End .entry-slider -->
                                </div><!-- End .entry-media -->

                                <div class="entry-body" style="border-bottom: 0;">
                                    <div class="entry-date">
                                        <span class="day">{{ date('d', strtotime($value->blog_date)) }}</span>
                                        <span class="month">{{ date('M', strtotime($value->blog_date)) }}</span>
                                    </div><!-- End .entry-date -->

                                    <h2 class="entry-title">
                                        {{ $value->blog_title }}
                                    </h2>

                                    <div class="entry-meta">
                                        <span><i class="icon-calendar"></i>{{ date('M d, Y', strtotime($value->blog_date)) }}</span>
                                        <span><i class="icon-user"></i>By <a>{{$value->author}}</a></span>
                                        <span><i class="icon-folder-open"></i>
                                            <a>{{$value->post_category}}</a>
                                            
                                        </span>
                                    </div><!-- End .entry-meta -->

                                    <div class="entry-content">
                                        <p>
                                          <?php echo $value->blog_description ?>
                                        </p> 
                                    </div><!-- End .entry-content -->

                                   

                                    <!-- <div class="entry-author">
                                        <h3><i class="icon-user"></i>Comment</h3>

                                        @foreach($blogLeaveReplyData as $key => $value )
                                        <div class="author-content">
                                            <h4><a style="color: #1d70ba;">{{$value->name}}</a></h4>
                                            <p>{{$value->comment}}</p>
                                        </div>
                                        @endforeach
                                    </div> -->

                        <!--             <div class="comment-respond">
                                        <h3>Leave a Reply</h3>
                                        <p>Your email address will not be published. Required fields are marked *</p>
                                <form class="forms-sample"  action="{{ route('blogLeaveReply') }}" method="POST" enctype="multipart/form-data" id="form1" runat="server" onsubmit="return get_action();">
                                       {{ csrf_field() }}
                                            <div class="form-group required-field">
                                                <label>Comment</label>
                                                <textarea cols="30" name="comment" rows="1" class="form-control" required></textarea>
                                            </div>

                                            <div class="form-group required-field">
                                                <label>Name</label>
                                                <input type="text" name="name" class="form-control" required>
                                            </div>

                                            <div class="form-group required-field">
                                                <label>Email</label>
                                                <input type="email" name="email" class="form-control" required>
                                            </div>
                                       
             
      
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <script type="text/javascript">
        function get_action() {
            var v = grecaptcha.getResponse();
            console.log("Resp" + v);
            if (v == '') {
                document.getElementById('captcha').innerHTML = "You can't leave Captcha Code empty";
                return false;
            }
            else {
                document.getElementById('captcha').innerHTML = "Captcha completed";
                return true;
            }
        }
    </script>

    
    <div>
    <div class="g-recaptcha" data-sitekey="6LdDm88ZAAAAAHm5sn99zTeRh2w0JT2NXZKWcXMZ"></div>
    </div>

    <div id="captcha"></div>
   
    
                                   @if (Auth::check() == 1)
                                  <input type="hidden" name="user_id" value="{{ Auth::user()['id'] }} ">
                                  @endif
                                  <input type="hidden" name="blog_id" value="{{$id }} ">
                                            <div class="form-footer">
                                                @if (Auth::check() == 1)
                                                <button type="submit" class="btn btn-primary">Post Comment</button>
                                                @else
                                              
                                                  <script type="text/javascript">
                                                  $(document).ready(function(){
                                                  $("p").click(function(){
                                                    alert("Please login to comment ");
                                                  });
                                                });
                                                </script>
                                                    

                                                       <p style="border-color: #2385dd;background-color: #2385dd;color: #fff;box-shadow: none;padding: 10px;width: 120px;" id="login" data-toggle="modal" data-dismiss="modal"  data-target="#login"> Post Comment</p> 
                                                   
    
                                                @endif

                                            </div>
                                        </form>
                                    </div> -->
                                </div>
                            </article><!-- End .entry -->
                            @endforeach
                        </div><!-- End .col-lg-9 -->

                        <div class="row">

                    <!--articles block--><h1 style="text-align: left!important;margin-left: 10px; width: 100%;">Recent Posts Blog</h3>
                    <ul class="posts-list main-post-list">
                        @foreach ($recentPostsBlog as $keyBlogsData => $valueBlogsData)
                         <li class="post-elem col-lg-4 col-md-4 col-sm-6 col-xs-12">
                            <div class="post-item effect-04 style-bottom-info">
                                <div class="thumbnail">
                                    <a href="{{route('blogDetail','')}}/{{$valueBlogsData->slug}}" class="link-to-post"><img src="{{asset('assets/upload_images/blog')}}/{{$valueBlogsData->blog_image}}" style="height: -webkit-fill-available;width: -webkit-fill-available;" alt=""></a>
                                </div>
                                <div class="post-content">
                                    <h4 class="post-name" style="height: 70px;"><a href="{{route('blogDetail','')}}/{{$valueBlogsData->slug}}" class="linktopost" style="text-align: left;">{{ str_limit($valueBlogsData->blog_title, 70) }}</a></h4>
                                    <p class="post-archive"><b class="post-cat">{{$valueBlogsData->post_category}}</b><span class="post-date"> / {{ date('d M, Y', strtotime($valueBlogsData->blog_date)) }}</span><span class="author">Posted By: {{$valueBlogsData->author}}</span></p>


                                    <p class="excerpt" style="text-align: left;"><?php //echo str_limit($valueBlogsData->blog_description, 140) ?></p>
                                    
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                    
                    
  </div>
                    </div><!-- End .row -->
                </div><!-- End .container-box -->
            </div><!-- End .container -->
            <style type="text/css">
    .entry-author .author-content p:last-child {
        margin-bottom: 0;
        padding: 0px 10px;
    }
    p {
    text-align: left;
}

  .post-content p {
    text-align: left;
  }

</style>
@endsection
