<!doctype html>
<html lang="en">

<head>

 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="shortcut icon" href="{{ asset('favicon.png') }}" />
  <link rel="icon" type="image/png" sizes="32x32" href="{{url('/favicon-32x32.png')}}">
  <link rel="icon" type="image/png" sizes="16x16" href="{{url('/favicon-16x16.png')}}">

  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap">

  <link rel="stylesheet" href="{{ asset('css/slick.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/slick-theme.css') }}" />

  <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}" />
  <link rel="stylesheet" href="assets/css/blog/style.css">
  <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
 <!--  <link rel="stylesheet" href="css/style.css" /> -->





  <title>PO Box</title>

</head>

<body class="bg-white text-black font-sans overflow-x-hidden antialiased">
<!-- Navbar Header -->  
@include('layouts.header')
<!-- /.navbar Header -->
<!-- body -->  
   @yield('content')
<!-- /.body -->
<!-- footer -->  
@include('layouts.footer')
<!-- /.footer -->
</body>

</html>


  <script src="{{url('js/jquery-3.4.1.min.js')}}"></script>

  <script src="{{url('js/slick.min.js')}}"></script>
  <script>
    $(document).ready(function () {
      $('.hero-slider').slick({
        arrows: true,
        autoplay: true,
        autoplaySpeed: 2000,
        dots: true,
        infinite: true,
        speed: 500,
        slidesToShow: 1,
        slidesToScroll: 1,
      });

      $('.testimonial-slider').slick({
        arrows: false,
        autoplay: true,
        autoplaySpeed: 2000,
        dots: false,
        infinite: true,
        speed: 500,
        slidesToShow: 3,
        slidesToScroll: 1,
        responsive: [{
            breakpoint: 1920,
            settings: {
              slidesToShow: 4,
              slidesToScroll: 1,
            }
          }, {
            breakpoint: 1440,
            settings: {
              slidesToShow: 3,
              slidesToScroll: 1,
            }
          },
          {
            breakpoint: 769,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 1
            }
          },
          {
            breakpoint: 480,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1
            }
          }
        ]
      });
    });

    $(".open").on("click", function () {
      $(".overlay, .modal").addClass("active");
    });

    $(".close, .overlay").on("click", function () {
      $(".overlay, .modal").removeClass("active");
    });

    $(document).keyup(function (e) {
      if (e.keyCode === 27) {
        $(".overlay, .modal").removeClass("active");
      }
    });

  </script>
