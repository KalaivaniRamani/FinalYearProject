<!DOCTYPE html>
<html>
  <head>

  @include('layouts.css')
  
  </head>
  <body>
  <div class="page">
      <!-- Main Navbar-->
      <header class="header">  

      @include('layouts.navbar')

      </header>
      <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
      <nav id="sidebar">
        <!-- Sidebar Header-->
        <div class="sidebar-header d-flex align-items-center p-4"><img class="avatar shadow-0 img-fluid rounded-circle" src="{{ Auth::user()->picture }}" alt="...">
          <div class="ms-3 title">
            <h1 class="h5 mb-1">{{ Auth::user()->name }}</h1>
            <!-- <p class="text-sm text-gray-700 mb-0 lh-1">Web Designer</p> -->
          </div>
        </div><span class="text-uppercase text-gray-600 text-xs mx-3 px-2 heading mb-2">House Owner</span>
        <ul class="list-unstyled">
          <li class="sidebar-item {{Request::is('ownerauth/dashboard') ? 'active':''}} "><a class="sidebar-link" href="{{url('ownerauth/dashboard')}}"> 
            <svg class="svg-icon svg-icon-sm svg-icon-heavy">
              <use xlink:href="#real-estate-1"> </use>
            </svg><span>Dashboard </span></a></li>
          <!-- <li class="sidebar-item {{Request::is('owners') ? 'active':''}} "><a class="sidebar-link" href="{{url('owners')}}"> 
            <svg class="svg-icon svg-icon-sm svg-icon-heavy">
              <use xlink:href="#portfolio-grid-1"> </use>
            </svg><span>My Info</span></a></li> -->
            <li class="sidebar-item {{Request::is('owner-approval') ? 'active':''}} "><a class="sidebar-link" href="{{url('owner-approval')}}"> 
            <svg class="svg-icon svg-icon-sm svg-icon-heavy">
              <use xlink:href="#portfolio-grid-1"> </use>
            </svg><span>Approval Status</span></a></li>
          <li class="sidebar-item {{Request::is('addhouse') ? 'active':''}} "><a class="sidebar-link" href="{{url('/addhouse')}}"> 
            <svg class="svg-icon svg-icon-sm svg-icon-heavy">
              <use xlink:href="#sales-up-1"> </use>
            </svg><span>House Details</span></a></li>
          <li class="sidebar-item {{Request::is('bookingreport') ? 'active':''}} "><a class="sidebar-link" href="/bookingreport"> 
            <svg class="svg-icon svg-icon-sm svg-icon-heavy">
              <use xlink:href="#survey-1"> </use>
            </svg><span>Booking Report</span></a></li>
            <!-- <li class="sidebar-item {{Request::is('messagehome') ? 'active':''}} "><a class="sidebar-link" href="/messagehome"> 
              <svg class="svg-icon svg-icon-sm svg-icon-heavy">
                <use xlink:href="#survey-1"> </use>
              </svg><span>Chat</span></a></li> -->
      </nav>
      <div class="page-content" style="background-color: rgb(215, 209, 209);">
            <!-- Page Header-->
            <!-- <div class="bg-2 py-4">
              <div class="container-fluid">
                <h2 class="h5 mb-0">Dashboard</h2>
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