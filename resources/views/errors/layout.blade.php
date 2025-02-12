<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Admiro admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Admiro admin template, best javascript admin, dashboard template, bootstrap admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <title>Minatas Resources | Error</title>
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
  </head>
  <body>
        <div class="authincation h-100">
            <div class="container h-100">
                <div class="row justify-content-center h-100 align-items-center">
                    <div class="col-md-5">
                        <div class="form-input-content text-center error-page">
                            @yield('message')
                            <div>
                                <a class="btn btn-primary" href="{{ route('dashboard') }}">Back to Home</a>
                            </div>	
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- jquery-->
    <script src="public/minatas/assets/js/vendors/jquery/jquery.min.js"></script>
    <!-- bootstrap js-->
    <script src="public/minatas/assets/js/vendors/bootstrap/dist/js/bootstrap.bundle.min.js" defer=""></script>
    <script src="public/minatas/assets/js/vendors/bootstrap/dist/js/popper.min.js" defer=""></script>
    <!--fontawesome-->
    <script src="public/minatas/assets/js/vendors/font-awesome/fontawesome-min.js"></script>
    <!-- custom script -->
    <script src="public/minatas/assets/js/script.js"></script>
  </body>
</html>
