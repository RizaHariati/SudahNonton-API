<li class="nav-item">
  <a class="nav-link text-light" aria-current="page" href="/dashboard/home">Dashboard
    Home</a>
</li>

@auth
  <li class="nav-item">
    <a class="nav-link text-light" href="/dashboard/movies">Movie List</a>
  </li>
@else
  <li class="nav-item">
    <a class="nav-link text-light" href="/dashboard/movies?login=false">Movie List</a>
  </li>
@endauth

@auth
  <li class="nav-item">
    <a class="nav-link text-light " href="/dashboard/tvshows">Tv
      Show List</a>
  </li>
@else
  <li class="nav-item">
    <a class="nav-link text-light " href="/dashboard/tvshows?login=false">Tv
      Show List</a>
  </li>
@endauth
