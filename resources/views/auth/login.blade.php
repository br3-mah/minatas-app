<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Admiro admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Admiro admin template, best javascript admin, dashboard template, bootstrap admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <title>SignIn | Minatas</title>
    <!-- Favicon icon-->
    <link rel="icon" href="public/minatas/img/fav.png" type="image/x-icon">
    <link rel="shortcut icon" href="public/minatas/img/fav.png" type="image/x-icon">
    <!-- Google font-->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin="">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:opsz,wght@6..12,200;6..12,300;6..12,400;6..12,500;6..12,600;6..12,700;6..12,800;6..12,900;6..12,1000&amp;display=swap" rel="stylesheet">
    <!-- Flag icon css -->
    <link rel="stylesheet" href="public/minatas/assets/css/vendors/flag-icon.css">
    <!-- iconly-icon-->
    <link rel="stylesheet" href="public/minatas/assets/css/iconly-icon.css">
    <link rel="stylesheet" href="public/minatas/assets/css/bulk-style.css">
    <!-- iconly-icon-->
    <link rel="stylesheet" href="public/minatas/assets/css/themify.css">
    <!--fontawesome-->
    <link rel="stylesheet" href="public/minatas/assets/css/fontawesome-min.css">
    <!-- Whether Icon css-->
    <link rel="stylesheet" type="text/css" href="public/minatas/assets/css/vendors/weather-icons/weather-icons.min.css">
    <!-- App css -->
    <link rel="stylesheet" href="public/minatas/assets/css/style.css">
    <link id="color" rel="stylesheet" href="public/minatas/assets/css/color-1.css" media="screen">

    <style>
    .show-hide .show::before {
          content: "👁"; /* Example icon */
      }

      .show-hide .show.hide::before {
          content: "🙈"; /* Change icon when password is visible */
      }

    </style>
  </head>
  <body>
    <!-- tap on top starts-->
    <div class="tap-top"><i class="iconly-Arrow-Up icli"></i></div>
    <!-- tap on tap ends-->
    <!-- loader-->
    <div class="loader-wrapper">
      <div class="loader"><span></span><span></span><span></span><span></span><span></span></div>
    </div>
    <!-- login page start-->
    <div class="container-fluid p-0">
      <div class="row m-0">
        <div class="col-12 p-0">    
          <div class="login-card login-dark">
            <div>
              <div>
                <a class="logo" href="{{ route('dashboard') }}">
                    <img class="img-fluid for-light m-auto" src="public/minatas/img/logo-white.svg">
                    <img class="img-fluid for-dark" src="public/minatas/img/logo-dark.svg">
                </a>
              </div>
              <div class="login-main"> 
                <x-jet-validation-errors class="alert text-center alert-danger text-danger text-xs" />
                <form class="theme-form" method="POST" action="{{ route('login') }}">
                    @csrf
                    <h2 class="text-center">Sign in to account</h2>
                    <p class="text-center">Enter your email &amp; password to login</p>
                    <div class="form-group">
                        <label class="col-form-label">Email Address</label>
                        <input class="form-control" type="email"  name="email" required placeholder="">
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Password</label>
                        <div class="form-input position-relative">
                            <input class="form-control" type="password" id="password" name="password" required placeholder="">
                            <div class="show-hide">
                                <span class="show" onclick="togglePassword()"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-0 checkbox-checked">
                        <div class="form-check checkbox-solid-info">
                        <input class="form-check-input" name="remember_me" id="solid6" type="checkbox">
                        <label class="form-check-label" for="solid6">Remember password</label>
                        </div>
                        {{-- <a class="link" href="forget-password.html">Forgot password?</a> --}}
                        <div class="text-end mt-3">
                        <button class="btn btn-primary btn-block w-100" type="submit">
                            Sign in
                        </button>
                        </div>
                  </div>
                  <p class="mt-4 mb-0 text-center">Don't have account?<a class="ms-2" href="{{ route('register') }}">Create Account</a></p>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <script>
          function togglePassword() {
              var passwordField = document.getElementById("password");
              var showHideIcon = document.querySelector(".show-hide .show");

              if (passwordField.type === "password") {
                  passwordField.type = "text";
                  showHideIcon.classList.add("hide");  // Optionally change icon style
              } else {
                  passwordField.type = "password";
                  showHideIcon.classList.remove("hide");
              }
          }
      </script>

      <!-- jquery-->
      <script src="public/minatas/assets/js/vendors/jquery/jquery.min.js"></script>
      <!-- bootstrap js-->
      <script src="public/minatas/assets/js/vendors/bootstrap/dist/js/bootstrap.bundle.min.js" defer=""></script>
      <script src="public/minatas/assets/js/vendors/bootstrap/dist/js/popper.min.js" defer=""></script>
      <!--fontawesome-->
      <script src="public/minatas/assets/js/vendors/font-awesome/fontawesome-min.js"></script>
      <!-- password_show-->
      <script src="public/minatas/assets/js/password.js"></script>
      <!-- custom script -->
      <script src="public/minatas/assets/js/script.js"></script>
    </div>
  </body>
</html>