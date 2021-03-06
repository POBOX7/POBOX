<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Po Box | Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{ asset('admin/vendors/mdi/css/materialdesignicons.min.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/vendors/simple-line-icons/css/simple-line-icons.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/vendors/ti-icons/css/themify-icons.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/vendors/css/vendor.bundle.base.css') }}">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="{{ asset('admin/vendors/font-awesome/css/font-awesome.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('admin/vendors/jquery-bar-rating/fontawesome-stars.css') }}">

  <link rel="stylesheet" href="{{ asset('admin/vendors/select2/select2.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('admin/vendors/select2-bootstrap-theme/select2-bootstrap.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('admin/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css') }}" />
  <link rel="stylesheet" type="text/css" href="{{ asset('admin/vendors/sweetalert2/sweetalert2.min.css') }}">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{ asset('admin/css/style.css') }}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{ asset('favicon.png') }}" />

  <script src="{{ asset('admin/vendors/js/vendor.bundle.base.js') }}"></script>
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
	
	@if(Auth::user())
  @if(Auth::user()->role_id != 1)
	<script>window.location.href = "{{route('home_1')}}"</script>
	@endif
	@endif
    @include('admin.layouts.header')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <div class="row row-offcanvas row-offcanvas-right">
        <!-- partial:partials/_settings-panel.html -->
        {{-- <div class="theme-setting-wrapper">
          <div id="settings-trigger"><i class="mdi mdi-settings"></i></div>
          <div id="theme-settings" class="settings-panel">
            <i class="settings-close mdi mdi-close"></i>
            <p class="settings-heading">SIDEBAR SKINS</p>
            <div class="sidebar-bg-options selected" id="sidebar-light-theme"><div class="img-ss rounded-circle bg-light border mr-3"></div>Light</div>
            <div class="sidebar-bg-options" id="sidebar-dark-theme"><div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark</div>
            <p class="settings-heading mt-2">HEADER SKINS</p>
            <div class="color-tiles mx-0 px-4">
              <div class="tiles primary"></div>
              <div class="tiles success"></div>
              <div class="tiles warning"></div>
              <div class="tiles danger"></div>
              <div class="tiles pink"></div>
              <div class="tiles info"></div>
              <div class="tiles dark"></div>
              <div class="tiles default"></div>
            </div>
          </div>
        </div> --}}
        <div id="right-sidebar" class="settings-panel">
          <i class="settings-close mdi mdi-close"></i>
          <ul class="nav nav-tabs" id="setting-panel" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="todo-tab" data-toggle="tab" href="#todo-section" role="tab" aria-controls="todo-section" aria-expanded="true">TO DO LIST</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="chats-tab" data-toggle="tab" href="#chats-section" role="tab" aria-controls="chats-section">CHATS</a>
            </li>
          </ul>
          <div class="tab-content" id="setting-content">
            <div class="tab-pane fade show active scroll-wrapper" id="todo-section" role="tabpanel" aria-labelledby="todo-section">
              <div class="add-items d-flex px-3 mb-0">
                <form class="form w-100">
                  <div class="form-group d-flex">
                    <input type="text" class="form-control todo-list-input" placeholder="Add To-do">
                    <button type="submit" class="add btn btn-primary todo-list-add-btn" id="add-task">Add</button>
                  </div>
                </form>
              </div>
              <div class="list-wrapper px-3">
                <ul class="d-flex flex-column-reverse todo-list">
                  <li>
                    <div class="form-check">
                      <label class="form-check-label">
                        <input class="checkbox" type="checkbox">
                        Team review meeting at 3.00 PM
                      </label>
                    </div>
                    <i class="remove mdi mdi-close-circle-outline"></i>
                  </li>
                  <li>
                    <div class="form-check">
                      <label class="form-check-label">
                        <input class="checkbox" type="checkbox">
                        Prepare for presentation
                      </label>
                    </div>
                    <i class="remove mdi mdi-close-circle-outline"></i>
                  </li>
                  <li>
                    <div class="form-check">
                      <label class="form-check-label">
                        <input class="checkbox" type="checkbox">
                        Resolve all the low priority tickets due today
                      </label>
                    </div>
                    <i class="remove mdi mdi-close-circle-outline"></i>
                  </li>
                  <li class="completed">
                    <div class="form-check">
                      <label class="form-check-label">
                        <input class="checkbox" type="checkbox" checked>
                        Schedule meeting for next week
                      </label>
                    </div>
                    <i class="remove mdi mdi-close-circle-outline"></i>
                  </li>
                  <li class="completed">
                    <div class="form-check">
                      <label class="form-check-label">
                        <input class="checkbox" type="checkbox" checked>
                        Project review
                      </label>
                    </div>
                    <i class="remove mdi mdi-close-circle-outline"></i>
                  </li>
                </ul>
              </div>
              <div class="events py-4 border-bottom px-3">
                <div class="wrapper d-flex mb-2">
                  <i class="mdi mdi-circle-outline text-primary mr-2"></i>
                  <span>Feb 11 2018</span>
                </div>
                <p class="mb-0 font-weight-thin text-gray">Creating component page</p>
                <p class="text-gray mb-0">build a js based app</p>
              </div>
              <div class="events pt-4 px-3">
                <div class="wrapper d-flex mb-2">
                  <i class="mdi mdi-circle-outline text-primary mr-2"></i>
                  <span>Feb 7 2018</span>
                </div>
                <p class="mb-0 font-weight-thin text-gray">Meeting with Alisa</p>
                <p class="text-gray mb-0 ">Call Sarah Graves</p>
              </div>
            </div>
            <!-- To do section tab ends -->
            <div class="tab-pane fade" id="chats-section" role="tabpanel" aria-labelledby="chats-section">
              <div class="d-flex align-items-center justify-content-between border-bottom">
                <p class="settings-heading border-top-0 mb-3 pl-3 pt-0 border-bottom-0 pb-0">Friends</p>
                <small class="settings-heading border-top-0 mb-3 pt-0 border-bottom-0 pb-0 pr-3 font-weight-normal">See All</small>
              </div>
              <ul class="chat-list">
                <li class="list active">
                  <div class="profile"><img src="http://via.placeholder.com/100x100/f4f4f4/000000" alt="image"><span class="online"></span></div>
                  <div class="info">
                    <p>Thomas Douglas</p>
                    <p>Available</p>
                  </div>
                  <small class="text-muted my-auto">19 min</small>
                </li>
                <li class="list">
                  <div class="profile"><img src="http://via.placeholder.com/100x100/f4f4f4/000000" alt="image"><span class="offline"></span></div>
                  <div class="info">
                    <div class="wrapper d-flex">
                      <p>Catherine</p>
                    </div>
                    <p>Away</p>
                  </div>
                  <div class="badge badge-success badge-pill my-auto mx-2">4</div>
                  <small class="text-muted my-auto">23 min</small>
                </li>
                <li class="list">
                  <div class="profile"><img src="http://via.placeholder.com/100x100/f4f4f4/000000" alt="image"><span class="online"></span></div>
                  <div class="info">
                    <p>Daniel Russell</p>
                    <p>Available</p>
                  </div>
                  <small class="text-muted my-auto">14 min</small>
                </li>
                <li class="list">
                  <div class="profile"><img src="http://via.placeholder.com/100x100/f4f4f4/000000" alt="image"><span class="offline"></span></div>
                  <div class="info">
                    <p>James Richardson</p>
                    <p>Away</p>
                  </div>
                  <small class="text-muted my-auto">2 min</small>
                </li>
                <li class="list">
                  <div class="profile"><img src="http://via.placeholder.com/100x100/f4f4f4/000000" alt="image"><span class="online"></span></div>
                  <div class="info">
                    <p>Madeline Kennedy</p>
                    <p>Available</p>
                  </div>
                  <small class="text-muted my-auto">5 min</small>
                </li>
                <li class="list">
                  <div class="profile"><img src="http://via.placeholder.com/100x100/f4f4f4/000000" alt="image"><span class="online"></span></div>
                  <div class="info">
                    <p>Sarah Graves</p>
                    <p>Available</p>
                  </div>
                  <small class="text-muted my-auto">47 min</small>
                </li>
              </ul>
            </div>
            <!-- chat tab ends -->
          </div>
        </div>
        <!-- partial -->
        <!-- partial:partials/_sidebar.html -->
        @include('admin.layouts.sidebar')
        <!-- partial -->
        <div class="content-wrapper">
          @include('admin.layouts.flash-message')
          @yield('content')
          <!-- partial:partials/_footer.html -->
          @include('admin.layouts.footer')
          <!-- partial -->
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- row-offcanvas ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="{{ asset('admin/vendors/jquery-bar-rating/jquery.barrating.min.js') }}"></script>
  <script src="{{ asset('admin/vendors/chart.js/Chart.min.js') }}"></script>
  <script src="{{ asset('admin/vendors/raphael/raphael.min.js') }}"></script>
  <script src="{{ asset('admin/vendors/morris.js/morris.min.js') }}"></script>
  <script src="{{ asset('admin/vendors/jquery-sparkline/jquery.sparkline.min.js') }}"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="{{ asset('admin/js/off-canvas.js') }}"></script>
  <script src="{{ asset('admin/js/hoverable-collapse.js') }}"></script>
  {{-- <script src="{{ asset('admin/js/misc.js') }}"></script> --}}
  {{-- <script src="{{ asset('admin/js/settings.js') }}"></script>
  <script src="{{ asset('admin/js/todolist.js') }}"></script> --}}
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="{{ asset('admin/js/dashboard.js') }}"></script>
  <!-- End custom js for this page-->

  <script src="{{ asset('admin/vendors/datatables.net/jquery.dataTables.js') }}"></script>
  <script src="{{ asset('admin/vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
  <script src="{{ asset('admin/js/data-table.js') }}"></script>

  <script src="{{ asset('admin/vendors/sweetalert2/sweetalert2.min.js') }}"></script>

  <script src="{{ asset('admin/vendors/tinymce/tinymce.min.js') }}"></script>
  {{-- <script src="{{ asset('admin/js/editorDemo.js') }}"></script> --}}
  <script src="{{ asset('admin/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
  <script src="{{ asset('admin/js/formpickers.js') }}"></script>

<script type="text/javascript">
  var sidebar = $('.sidebar');
  var body = $('body');
  var contentWrapper = $('.content-wrapper');
  var scroller = $('.container-scroller');
  var footer = $('.footer');
  sidebar.on('show.bs.collapse','.collapse', function() {
      
      sidebar.find('.collapse.show').collapse('hide');
    });

  $('.sidebar [data-toggle="collapse"]').on("click", function(event) {
      if(!((body.hasClass('sidebar-icon-only')||body.hasClass('horizontal-menu'))&&window.matchMedia('(min-width: 992px)').matches)) {
        //Updating content wrapper height to sidebar height on expanding a menu in sidebar
        var clickedItem = $(this);
        console.log(clickedItem);
        if(clickedItem.attr('aria-expanded') === 'false') {
          var scrollTop = scroller.scrollTop() - 20;
        }
        else {
          var scrollTop = scroller.scrollTop() - 100;
        }
        setTimeout(function(){
            if(contentWrapper.outerHeight()+ footer.outerHeight()!== sidebar.outerHeight()) {
              applyStyles();
              scroller.animate({ scrollTop: scrollTop }, 350);
            }
        }, 400);
      }
      else {
        //Disable click on sidebar menu item when sidebar icon only mode or horizontal menu mode is in use
        //to avoid ambiguity of mixed hover and click on menu item
        return false;
      }
    })
    applyStyles();
    function applyStyles() {
      //Applying perfect scrollbar
      if(!body.hasClass("rtl")) {
        const settingsPanelScroll = new PerfectScrollbar('.settings-panel .tab-content .tab-pane.scroll-wrapper, ul.chats, .product-chart-wrapper');
        if(body.hasClass("sidebar-fixed")) {
          var fixedSidebarScroll = new PerfectScrollbar('#sidebar .nav');
        }
      }
    }

    $('.sidebar [data-toggle="collapse"]').on("click", function(event) {
      if(!((body.hasClass('sidebar-icon-only')||body.hasClass('horizontal-menu'))&&window.matchMedia('(min-width: 992px)').matches)) {
        //Updating content wrapper height to sidebar height on expanding a menu in sidebar
        var clickedItem = $(this);
        console.log(clickedItem);
        if(clickedItem.attr('aria-expanded') === 'false') {
          var scrollTop = scroller.scrollTop() - 20;
        }
        else {
          var scrollTop = scroller.scrollTop() - 100;
        }
        setTimeout(function(){
            if(contentWrapper.outerHeight()+ footer.outerHeight()!== sidebar.outerHeight()) {
              applyStyles();
              scroller.animate({ scrollTop: scrollTop }, 350);
            }
        }, 400);
      }
      else {
        //Disable click on sidebar menu item when sidebar icon only mode or horizontal menu mode is in use
        //to avoid ambiguity of mixed hover and click on menu item
        return false;
      }
    })

    $('[data-toggle="minimize"]').on("click", function () {
      if((body.hasClass('sidebar-toggle-display'))||(body.hasClass('sidebar-absolute'))) {
        body.toggleClass('sidebar-hidden');
        applyStyles();
      }
      else {
        body.toggleClass('sidebar-icon-only');
        applyStyles();
      }
    });
</script>
<script type="text/javascript">
   $('.image-file').bind('change', function() {
           
             var numb = $(this)[0].files[0].size/1024/1024;
          numb = numb.toFixed(5);
          if(numb > 5){
          //alert('to big, maximum is 5MB. You file size is: ' + numb +' MB');
             $("#result").html('<div class="alert alert-fill-danger" style="z-index: 99999;position: fixed;width:100%"><button type="button" class="close">×</button>Image too large. Image must be less than 5MB.Please upload new image.</div>');

               $(".result").html('<div style="color:red;">Image too large. Image must be less than 5MB.Please upload new image.</div>');
                 window.setTimeout(function() {
                    $(".alert").fadeTo(500, 0).slideUp(500, function(){
                        $(this).remove(); 
                    });
                 }, 5000);
                 $('.alert .close').on("click", function(e){
                    $(this).parent().fadeTo(500, 0).slideUp(500);
                 });
                 document.getElementById("submit").disabled = true;
          } else {
            $(".result").html('');
            document.getElementById("submit").disabled = false;
          //alert('it okey, your file has ' + numb + 'MB')
          }

        
        });
   //product-image-file  
   $('.image-file-default').bind('change', function() {
           
             var numb = $(this)[0].files[0].size/1024/1024;
          numb = numb.toFixed(5);
          if(numb > 5){
          //alert('to big, maximum is 5MB. You file size is: ' + numb +' MB');
             $("#result").html('<div class="alert alert-fill-danger" style="z-index: 99999;position: fixed;width:100%"><button type="button" class="close">×</button>Image too large. Image must be less than 5MB.Please upload new image.</div>');

               $(".product-image-file-default-img").html('<div style="color:red;">Image too large. Image must be less than 5MB.Please upload new image.</div>');
                 window.setTimeout(function() {
                    $(".alert").fadeTo(500, 0).slideUp(500, function(){
                        $(this).remove(); 
                    });
                 }, 5000);
                 $('.alert .close').on("click", function(e){
                    $(this).parent().fadeTo(500, 0).slideUp(500);
                 });
                 document.getElementById("submit").disabled = true;
          } else {
             $(".product-image-file-default-img").html('');
            document.getElementById("submit").disabled = false;
          //alert('it okey, your file has ' + numb + 'MB')
          }
        });
   $('.image-file-other').bind('change', function() {
           
             var numb = $(this)[0].files[0].size/1024/1024;
          numb = numb.toFixed(5);
          if(numb > 5){
          //alert('to big, maximum is 5MB. You file size is: ' + numb +' MB');
             $("#result").html('<div class="alert alert-fill-danger" style="z-index: 99999;position: fixed;width:100%"><button type="button" class="close">×</button>Image too large. Image must be less than 5MB.Please upload new image.</div>');

                $(".product-image-file-other-img").html('<div style="color:red;">Image too large. Image must be less than 5MB.Please upload new image.</div>');
                 window.setTimeout(function() {
                    $(".alert").fadeTo(500, 0).slideUp(500, function(){
                        $(this).remove(); 
                    });
                 }, 5000);
                 $('.alert .close').on("click", function(e){
                    $(this).parent().fadeTo(500, 0).slideUp(500);
                 });
                 document.getElementById("submit").disabled = true;
          } else {
            $(".product-image-file-other-img").html('');
            document.getElementById("submit").disabled = false;
          //alert('it okey, your file has ' + numb + 'MB')
          }
        });

</script>

</body>

</html>