<form class="search-container" action="/search" autocapitalize=true>

  @csrf
  <input type="text" class="search-input" placeholder="search.." value="{{ request('search') }}" name="search">

  <button type="submit" class="search-btn"><i class="bi bi-search"></i></button>

</form>