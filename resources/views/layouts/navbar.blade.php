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

            <a class="dropdown-item" href="profile">
                {{ __('Profile') }}
            </a>  
        </div>
      </li>
    </ul>
  </div>
</nav>