  <li class="nav-item">
    <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" aria-current="page" href="/">Favorites</a>
  </li>
  <li class="nav-item ">
    <a class="nav-link {{ Request::is('/movies') ? 'active' : '' }} " href="/movies">Movies</a>
  </li>
  <li class="nav-item">
    <a class="nav-link {{ Request::is('/tvshows') ? 'active' : '' }}" href="/tvshows">Tv Shows</a>
  </li>
