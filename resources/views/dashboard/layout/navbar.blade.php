<nav class="navbar-container">
  <div class="navbar">

    <div class='navbar-left'>
      <a href="/" class="navbar-img-container">
        <img src={{ asset('assets/images/TitleLogo.png') }} class="img" alt="title">
      </a>
      <div class="nav-links">
        @include('dashboard.layout.navlinks')
      </div>
      <div class="dropdown-links">
        <button class="dropdown-btn">Browse <i class="bi bi-caret-down-fill"></i></button>
        <div class="dropdown-list ">
          @include('dashboard.layout.navlinks')
        </div>
      </div>
    </div>

    <div class="navbar-right">

      <div class="logo-container">
        <div class="logo-img">
          <img src={{ asset('assets/images/logo.png') }} class="img" alt="title">
        </div>
        <div class="logo-list">
          @auth
            <li class="nav-item">
              <a class="nav-link " aria-current="page" href="/auth/logout"> <i class="bi bi-box-arrow-in-right"></i>&emsp;
                Logout</a>
            </li>
          @else
            <li class="nav-item">
              <a class="nav-link " aria-current="page" href="/auth/login"> <i class="bi bi-box-arrow-in-right"></i>&emsp;
                Login</a>
            </li>
          @endauth
          <li class="nav-item">
            <a class="nav-link" href="/"><i class="bi bi-house-heart-fill"></i> &emsp;Home</a>
          </li>
        </div>
      </div>

    </div>

    <script src={{ asset('js/navbar.js') }}></script>
  </div>

</nav>
