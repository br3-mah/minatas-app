<!DOCTYPE html >
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="description" content="Admiro admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities."/>
    <meta name="keywords" content="admin template, Admiro admin template, best javascript admin, dashboard template, bootstrap admin template, responsive admin template, web app"/>
    <meta name="author" content="pixelstrap"/>
    <title>Minatas | Welcome</title>
    <!-- Favicon icon-->
    <link rel="icon" href="public/minatas/img/fav.png" type="image/x-icon"/>
    <link rel="shortcut icon" href="public/minatas/img/fav.png" type="image/x-icon"/>
    <!-- Google font-->
    <link rel="preconnect" href="https://fonts.googleapis.com/"/>
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin=""/>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:opsz,wght@6..12,200;6..12,300;6..12,400;6..12,500;6..12,600;6..12,700;6..12,800;6..12,900;6..12,1000&amp;display=swap" rel="stylesheet"/>
    <!-- Flag icon css -->
    <link rel="stylesheet" href="public/minatas/assets/css/vendors/flag-icon.css"/>
    <!-- iconly-icon-->
    <link rel="stylesheet" href="public/minatas/assets/css/iconly-icon.css"/>
    <link rel="stylesheet" href="public/minatas/assets/css/bulk-style.css"/>
    <!-- iconly-icon-->
    <link rel="stylesheet" href="public/minatas/assets/css/themify.css"/>
    <!--fontawesome-->
    <link rel="stylesheet" href="public/minatas/assets/css/fontawesome-min.css"/>
    <!-- Whether Icon css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <link rel="stylesheet" type="text/css" href="public/minatas/assets/css/vendors/weather-icons/weather-icons.min.css"/>
    <link rel="stylesheet" type="text/css" href="public/minatas/assets/css/vendors/scrollbar.css"/>
    <link rel="stylesheet" type="text/css" href="public/minatas/assets/css/vendors/swiper-bundle.min.css"/>
    <link rel="stylesheet" type="text/css" href="public/minatas/assets/css/vendors/slick.css"/>
    <link rel="stylesheet" type="text/css" href="public/minatas/assets/css/vendors/slick-theme.css"/>
    <!-- App css -->
    <link rel="stylesheet" href="public/minatas/assets/css/style.css"/>
    <link id="color" rel="stylesheet" href="public/minatas/assets/css/color-1.css" media="screen"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <link rel="stylesheet" type="text/css" href="public/minatas/assets/css/vendors/photoswipe.css">
    @livewireStyles
  </head>
  <body>
    <!-- page-wrapper Start-->
    <!-- tap on top starts-->
    <div class="tap-top"><i class="iconly-Arrow-Up icli"></i></div>
    <!-- tap on tap ends-->
    <!-- loader-->
    <div class="loader-wrapper">
      <div class="loader"><span></span><span></span><span></span><span></span><span></span></div>
    </div>
    <div class="page-wrapper compact-wrapper" id="pageWrapper"> 
      <header class="page-header row">
        <div class="col-auto logo-wrapper d-flex align-items-center">
          <a href="{{ route('dashboard') }}">
            <img class="light-logo img-fluid" src="public/minatas/img/logo-white.svg">
            <img class="dark-logo img-fluid" src="public/minatas/img/logo-dark.svg">
          </a>
          <a class="close-btn toggle-sidebar" href="javascript:void(0)">
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5"/>
</svg>
          </a></div>
        <div class="page-main-header col">
          <div class="header-left">
            <form class="form-inline search-full col" action="#" method="get">
              <div class="form-group w-100">
                <div class="Typeahead Typeahead--twitterUsers">
                  <div class="u-posRelative">
                    <input class="demo-input Typeahead-input form-control-plaintext w-100" type="text" placeholder="Search Admiro .." name="q" title="" autofocus="autofocus"/>
                    <div class="spinner-border Typeahead-spinner" role="status"><span class="sr-only">Loading...</span></div><i class="close-search" data-feather="x"></i>
                  </div>
                  <div class="Typeahead-menu"></div>
                </div>
              </div>
            </form>
            <div class="form-group-header d-lg-block d-none">
              <div class="Typeahead Typeahead--twitterUsers">
                <div class="u-posRelative d-flex align-items-center"> 
                  <input class="py-0 demo-input Typeahead-input form-control-plaintext w-100" type="text" placeholder="Type to Search..." name="q" title=""/><i class="fas fa-search"></i>
                </div>
              </div>
            </div>
          </div>
          <div class="nav-right">
            <ul class="header-right"> 
    
              <li class="search d-lg-none d-flex">
                  <a href="javascript:void(0)">
                    <i class="fas fa-search"></i>
                  </a>
                </li>
              
              
              <li class="custom-dropdown">
                  <a href="javascript:void(0)">
                      <i class="fas fa-bell"></i>
                  </a>
                  <span class="badge rounded-pill badge-primary">{{ auth()->user()->unreadNotifications->count() }}</span>
                
                  <div class="py-0 overflow-hidden custom-menu notification-dropdown">
                    <h3 class="title bg-primary-light dropdown-title">Notification <a href="{{ route('notifications') }}" class="font-primary">View all</a></h3>
                    <ul class="activity-timeline">
                      @forelse (auth()->user()->unreadNotifications as $note)
                      
                      <li class="d-flex align-items-start">
                        <div class="activity-line"></div>
                        <div class="activity-dot-primary"></div>
                        <div class="flex-grow-1">
                          <h6 class="f-w-600 font-primary">{{ $note->created_at->toFormattedDateString() }}<span class="circle-dot-primary float-end">
                              <svg class="circle-color">
                                <use href="https://admin.pixelstrap.net/admiro/assets/svg/iconly-sprite.svg#circle"></use>
                              </svg></span></h6>
                          <h5>{{ $note->data['name'] }}</h5>
                          <p class="mb-0">{{ $note->data['msg'] }}</p>
                        </div>
                      </li>
                      @empty
                      @endforelse
                    </ul>
                  </div>
              </li>
              
              
              <li class="profile-nav custom-dropdown">
                <div class="user-wrap">
                  <div class="user-img">
                        @if (!empty(auth()->user()->photos->toArray()))
                          @if (auth()->user()->photos[0]->source == 'admin')
                          <img src="{{ url('public/storage/' . auth()->user()->photos[0]->path) }}" alt="{{ auth()->user()->fname[0] }}" />
                          @else
                          <img src="{{ 'https://app.capexfinancialservices.org/' . auth()->user()->photos[0]->path }}" alt="{{ auth()->user()->fname[0] }}"/>
                          @endif
                      @else
                          <img src="public/minatas/assets/images/profile.png" alt="{{ auth()->user()->fname[0] }}" />
                      @endif
                  </div>
                  <div class="user-content">
                    <h6>{{ auth()->user()->fname.' '.auth()->user()->lname[0] }}</h6>
                    <p class="mb-0">Borrower<i class="fa-solid fa-chevron-down"></i></p>
                  </div>
                </div>
                <div class="overflow-hidden custom-menu">
                  <ul class="profile-body">
                    <li class="d-flex"> 
                      <svg class="svg-color">
                        <use href="https://admin.pixelstrap.net/admiro/assets/svg/iconly-sprite.svg#Profile"></use>
                      </svg><a class="ms-2" href="{{ route('my-profile', ['view' => 'profile']) }}">Account</a>
                    </li>
                    <li class="d-flex"> 
                      <svg class="svg-color">
                        <use href="https://admin.pixelstrap.net/admiro/assets/svg/iconly-sprite.svg#Message"></use>
                      </svg><a class="ms-2" href="{{ route('kyc-update', ['view' => 'kyc'])  }}">KYC</a>
                    </li>
                    {{-- <li class="d-flex"> 
                      <svg class="svg-color">
                        <use href="https://admin.pixelstrap.net/admiro/assets/svg/iconly-sprite.svg#Document"></use>
                      </svg><a class="ms-2" href="to-do.html">Task</a>
                    </li> --}}
                    <li class="d-flex">
                      <svg class="svg-color">
                          <use href="https://admin.pixelstrap.net/admiro/assets/svg/iconly-sprite.svg#Login"></use>
                      </svg>
                      <form method="POST" action="{{ route('logout') }}" class="ms-2" id="logout-form" style="display: inline;">
                          @csrf
                          <button type="submit" style="background: none; border: none; color: inherit; cursor: pointer;">Log Out</button>
                      </form>
                  </li>
                  
                  </ul>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </header>
      <!-- Page Body Start-->
      <div class="page-body-wrapper"> 
        <!-- Page sidebar start-->
        <aside class="page-sidebar"> 
          <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
          <div class="main-sidebar" id="main-sidebar">
            <ul class="sidebar-menu" id="simple-bar">
              <li class="pin-title sidebar-main-title">  
                <div> 
                  <h5 class="sidebar-title f-w-700">Pinned</h5>
                </div>
              </li>
              <li class="sidebar-main-title">
                <div>
                  <h5 class="pt-3 f-w-700 sidebar-title">Application</h5>
                </div>
              </li>
              
              <li class="sidebar-list"> <i class="fa-solid fa-thumbtack"></i><a class="sidebar-link" href="{{ route('dashboard') }}">
                  <svg class="stroke-icon">
                    <use href="https://admin.pixelstrap.net/admiro/assets/svg/iconly-sprite.svg#Paper"></use>
                  </svg>
                  <h6 class="f-w-600">My Home </h6></a>
                  <br>
              
                  <li class="sidebar-list"> <i class="fa-solid fa-thumbtack"></i><a class="sidebar-link" href="{{ route('view-loan-requests') }}">
                      <svg class="stroke-icon">
                        <use href="https://admin.pixelstrap.net/admiro/assets/svg/iconly-sprite.svg#Paper"></use>
                      </svg>
                      <h6 class="f-w-600">My Loan Requests </h6></a></li>
                  
              <li class="sidebar-list"> <i class="fa-solid fa-thumbtack"></i><a class="sidebar-link" href="{{ route('history') }}">
                  <svg class="stroke-icon">
                    <use href="https://admin.pixelstrap.net/admiro/assets/svg/iconly-sprite.svg#Wallet"></use>
                  </svg>
                  <h6 class="f-w-600">My Loan History</h6></a></li>
              
              <li class="sidebar-list"> <i class="fa-solid fa-thumbtack"></i><a class="sidebar-link" href="{{ route('transaction.item', ['view'=>'payments']) }}">
                  <svg class="stroke-icon">
                    <use href="https://admin.pixelstrap.net/admiro/assets/svg/iconly-sprite.svg#Message"></use>
                  </svg>
                  <h6 class="f-w-600">My Repayments</h6></a></li>
                  
              {{-- <li class="sidebar-list"> <i class="fa-solid fa-thumbtack"></i><a class="sidebar-link" href="letter-box.html">
                  <svg class="stroke-icon">
                    <use href="https://admin.pixelstrap.net/admiro/assets/svg/iconly-sprite.svg#Message"></use>
                  </svg>
                  <h6 class="f-w-600">My Profile</h6></a></li>
                  
              <li class="sidebar-list"> <i class="fa-solid fa-thumbtack"></i><a class="sidebar-link" href="letter-box.html">
                  <svg class="stroke-icon">
                    <use href="https://admin.pixelstrap.net/admiro/assets/svg/iconly-sprite.svg#Message"></use>
                  </svg>
                  <h6 class="f-w-600">KYC Info</h6></a></li>
                  
              <li class="sidebar-list"> <i class="fa-solid fa-thumbtack"></i><a class="sidebar-link" href="letter-box.html">
                  <svg class="stroke-icon">
                    <use href="https://admin.pixelstrap.net/admiro/assets/svg/iconly-sprite.svg#Message"></use>
                  </svg>
                  <h6 class="f-w-600">Support</h6></a></li> --}}
              
            </ul>
          </div>
          <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </aside>
        <!-- Page sidebar end-->
        {{ $slot }}


        <footer class="footer"> 
          <div class="container-fluid">
            <div class="row"> 
              <div class="col-md-6 footer-copyright">
                <p class="mb-0">Copyright 2024 © Minatas Resources.</p>
              </div>
              <div class="col-md-6">
              </div>
            </div>
          </div>
        </footer>
      </div>
    </div>
    @stack('modals')

    @livewireScripts
    <!-- jquery-->
    <script src="public/minatas/assets/js/vendors/jquery/jquery.min.js"></script>
    <!-- bootstrap js-->
    <script src="public/minatas/assets/js/vendors/bootstrap/dist/js/bootstrap.bundle.min.js" defer=""></script>
    <script src="public/minatas/assets/js/vendors/bootstrap/dist/js/popper.min.js" defer=""></script>
    <!--fontawesome-->
    <script src="public/minatas/assets/js/vendors/font-awesome/fontawesome-min.js"></script>
    <!-- sidebar -->
    <script src="public/minatas/assets/js/sidebar.js"></script>
    <!-- config-->
    <script src="public/minatas/assets/js/config.js"></script>
    <!-- apex-->
    <script src="public/minatas/assets/js/chart/apex-chart/apex-chart.js"></script>
    <script src="public/minatas/assets/js/chart/apex-chart/stock-prices.js"></script>
    <!-- scrollbar-->
    <script src="public/minatas/assets/js/scrollbar/simplebar.js"></script>
    <script src="public/minatas/assets/js/scrollbar/custom.js"></script>
    <!-- slick-->
    <script src="public/minatas/assets/js/slick/slick.min.js"></script>
    <script src="public/minatas/assets/js/slick/slick.js"></script>
    <!-- touchspin -->
    <script src="public/minatas/assets/js/touchspin_2/custom_touchspin.js"></script>
    <!-- data_table-->
    <script src="public/minatas/assets/js/js-datatables/datatables/jquery.dataTables.min.js"></script>
    <!-- page_datatable-->
    <script src="public/minatas/assets/js/js-datatables/datatables/datatable.custom.js"></script>
    <!-- page_datatable1-->
    <script src="public/minatas/assets/js/js-datatables/datatables/datatable.custom1.js"></script>
    <!-- page_datatable-->
    <script src="public/minatas/assets/js/datatable/datatables/datatable.custom.js"></script>
    <!-- swiper-->
    <script src="public/minatas/assets/js/vendors/swiper/swiper-bundle.min.js"></script>
    <!-- theme_customizer-->
    {{-- <script src="public/minatas/assets/js/theme-customizer/customizer.js"></script> --}}
    <!-- dashboard_2-->
    <script src="public/minatas/assets/js/dashboard/dashboard_2.js"></script>
    <!-- custom script -->
    <script src="public/minatas/assets/js/script.js"></script>
  </body>
</html>