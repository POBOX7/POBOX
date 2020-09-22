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
  <link rel="stylesheet" href="{{ asset('admin/vendors/flag-icon-css/css/flag-icon.min.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/vendors/css/vendor.bundle.base.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/vendors/font-awesome/css/font-awesome.min.css') }}" />
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{ asset('admin/css/style.css') }}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{ asset('admin/images/favicon.png') }}" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper">
      <div class="row">
        <div class="content-wrapper full-page-wrapper d-flex align-items-center auth " style="background-color:#e4e4e4">
          <div class="row w-100">
            <div class="col-lg-4 mx-auto">
              <div class="text-left p-5" style="background-color:#ffffff;box-shadow:0px 2px 5px #6b686b;">
                <div class="text-center">
                	<img src="{{ asset('admin/images/favicon.png') }}" alt="logo"/>
                	<h2 class="text-black">Forgot Password </h2>
                </div>
                {{-- <h4 class="font-weight-light">Hello! let's get started</h4> --}}
                <form class="pt-5" action="{{ route('check.forgotpassword') }}" method="POST">
                  {{ csrf_field() }}
                  @error('email')
                    <div class="form-group">
                      <p style="color: red">{{ $message }}</p>
                    </div>
                  @enderror

                  @if ($message = Session::get('success'))
                    <div class="form-group">
                      <p style="color: green">{{ $message }}</p>
                    </div>
                  @endif

                  @if ($message = Session::get('error'))
                    <div class="form-group">
                      <p style="color: red">{{ $message }}</p>
                    </div>
                  @endif
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Enter email " autofocus required>
                    <i class="mdi mdi-account" style="top: 35px;"></i>
                  </div>
                  
                  <div class="mt-5">
                    
                    <button type="submit" class="btn btn-block btn-lg font-weight-medium" style="background-color: #1b5da9;border-color:#1b5da9;color: white">Reset Password</button>
                  </div>
                  <div class="mt-3 text-center">
                    <a href="{{route('login')}}" class="auth-link text-black"> < Login</a>
                  </div>                 
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- row ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="{{ asset('admin/vendors/js/vendor.bundle.base.js') }}"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="{{ asset('admin/js/off-canvas.js') }}"></script>
  <script src="{{ asset('admin/js/hoverable-collapse.js') }}"></script>
  <script src="{{ asset('admin/js/misc.js') }}"></script>
  <script src="{{ asset('admin/js/settings.js') }}"></script>
  <script src="{{ asset('admin/js/todolist.js') }}"></script>
  <!-- endinject -->
  <script type="text/javascript">
    function myFunction() {
      var x = document.getElementById("password");
      var element = document.getElementById("password-icon");
      element.classList.add("fa-eye-slash");
      element.classList.remove("fa-eye");
      if (x.type === "password") {
        

        element.classList.add("fa-eye");
        element.classList.remove("fa-eye-slash");
        x.type = "text";
      } else {
        element.classList.add("fa-eye-slash");
        element.classList.remove("fa-eye");
        x.type = "password";
      }
    }

  </script>
</body>

</html>