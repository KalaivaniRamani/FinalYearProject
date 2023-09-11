<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>UMP - HRMS</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="all,follow">
    <!-- Google fonts - Poppins -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,700">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Choices CSS-->
    <link rel="stylesheet" href="/dashboard/vendor/choices.js/public/assets/styles/choices.min.css">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="/dashboard/css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="/dashboard/css/custom.css">
    <!-- OwlCarousel stylesheet - for student houselist-->
    <link rel="stylesheet" href="/dashboard/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/dashboard/css/owl.theme.default.min.css">
     <!-- Fontawesome cdn-->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="/assets/img/logo/logoUMP.png">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
    @include('layouts.css')

  </head>
  <body>
    <div class="page">
      <!-- Main Navbar-->
      <header class="header">   
        <nav class="navbar navbar-expand-lg py-3 z-index-10" style="background-color: #0f7169;">
          <div class="search-panel">
            <div class="search-inner d-flex align-items-center justify-content-center">
              <div class="close-btn d-flex align-items-center position-absolute top-0 end-0 me-4 mt-2 cursor-pointer"><span>Close </span>
                    <svg class="svg-icon svg-icon-md svg-icon-heavy text-gray-700 mt-1">
                      <use xlink:href="#close-1"> </use>
                    </svg>
              </div>
            </div>
          </div>
          <div class="container-fluid d-flex align-items-center justify-content-between py-1">
            <div class="navbar-header d-flex align-items-center"><a class="navbar-brand text-uppercase text-reset" href="/">
                <div class="brand-text brand-big"><strong style="color: white;">UMP-</strong><strong style="color: white;">House Rental Management System</strong></div>
                <div class="brand-text brand-sm"><strong style="color: white;">UMP-</strong><strong style="color: white;">HRMS</strong></div></a>
              <button class="sidebar-toggle">
                    <svg class="svg-icon svg-icon-sm svg-icon-heavy transform-none">
                      <use xlink:href="#arrow-left-1"> </use>
                    </svg>
              </button>
            </div>

            <ul class="list-inline mb-0">           
              <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" style="color:white" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }}
                    <svg class="svg-icon svg-icon-xs svg-icon-heavy">
                    <use xlink:href="#security-1"> </use>
                  </svg>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>

                    <a class="dropdown-item" href="{{ route('logout') }}"
                      onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <a class="dropdown-item" href="studentprofile">
                        {{ __('Profile') }}
                    </a>  
                </div>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
      <nav id="sidebar">
        <!-- Sidebar Header-->
        <div class="sidebar-header d-flex align-items-center p-4"><img class="avatar shadow-0 img-fluid rounded-circle" src="{{ Auth::user()->picture }}" alt="User Image">
          <div class="ms-3 title">
            <h1 class="h5 mb-1">{{ Auth::user()->name }}</h1>
            <!-- <p class="text-sm text-gray-700 mb-0 lh-1">Web Designer</p> -->
          </div>
          </div><span class="text-uppercase text-gray-600 text-xs mx-3 px-2 heading mb-2">Student</span>
          <ul class="list-unstyled">
          <li class="sidebar-item {{Request::is('student') ? 'active':''}} "><a class="sidebar-link" href="/student"> 
            <svg class="svg-icon svg-icon-sm svg-icon-heavy">
              <use xlink:href="#real-estate-1"> </use>
            </svg><span>Dashboard </span></a></li>
          <!-- <li class="sidebar-item {{Request::is('studentdata') ? 'active':''}} "><a class="sidebar-link" href="/studentdata"> 
            <svg class="svg-icon svg-icon-sm svg-icon-heavy">
              <use xlink:href="#portfolio-grid-1"> </use>
            </svg><span>My Info</span></a></li> -->
          <li class="sidebar-item  {{Request::is('list') ? 'active':''}} "><a class="sidebar-link" href="/list"> 
            <svg class="svg-icon svg-icon-sm svg-icon-heavy">
              <use xlink:href="#sales-up-1"> </use>
            </svg><span>Rental Houses</span></a></li>
          <li class="sidebar-item {{Request::is('bookingdata') ? 'active':''}} "><a class="sidebar-link" href="/bookingdata"> 
            <svg class="svg-icon svg-icon-sm svg-icon-heavy">
              <use xlink:href="#survey-1"> </use>
            </svg><span>Booked Rental House</span></a></li>
            <!-- <li class="sidebar-item {{Request::is('messagehome') ? 'active':''}} "><a class="sidebar-link" href="/messagehome"> 
              <svg class="svg-icon svg-icon-sm svg-icon-heavy">
                <use xlink:href="#survey-1"> </use>
              </svg><span>Chat / Report</span></a></li> -->

              <li class="sidebar-item {{Request::is('chatify') ? 'active':''}} "><a class="sidebar-link" href="/chatify"> 
              <svg class="svg-icon svg-icon-sm svg-icon-heavy">
                <use xlink:href="#survey-1"> </use>
              </svg><span>Chat</span></a></li>
      </nav>
      <div class="page-content" style="background-color: rgb(215, 209, 209);">
            <!-- Page Header-->
            <!-- <div class="bg-2 py-4">
              <div class="container-fluid">
                <h2 style="font-style: italic;  font-weight:20%; color:black;">Welcome to UMP-HRMS</h2>
              </div>
            </div> -->
        <section>
          <div class="container-fluid" >
            <div class="row gy-4">
                @if(session('success'))
                  <div class="alert">
                  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                    {{session('success')}}
                  </div>
                @endif
      
                @yield('content')  
            </div>  
            </div>
          
            <!-- Page Footer-->
          <footer class="position-absolute bottom-0 text-white text-center py-3 w-100 text-xs" id="footer" style="background-color: #0f7169 ;">
            <div class="container-fluid text-center">
              <!-- Please do not remove the backlink to us unless you support us at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
              <p class="mb-0 text-dash-white" style="font-size:12px;" >Copyright &copy; 2022. Official Portal - Universiti Malaysia Pahang - House Rental Management System</p>
            </div>
          </footer>
        </section>
      </div>
    </div>
  </div>
    <!-- JavaScript files-->
    @include('layouts.js')
    
     <!-- FontAwesome CSS - loading as last, so it doesn't block rendering-->
     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  </body>
</html>