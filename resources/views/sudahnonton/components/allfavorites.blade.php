<div class="main-container">
  <section class="main-img-container">

    <img class="small-img " src="https://www.themoviedb.org/t/p/original{{ $favorites->first()->image }}">

    <div class="attribute">
      <a href="https://www.themoviedb.org/"> all movies and tv show informations belongs to
        <img class="attribute-img"
          src="{{ asset('assets/images/blue_long_1-8ba2ac31f354005783fab473602c34c3f4fd207150182061e425d366e4f34596.svg') }}"
          alt="tmdb logo" />
      </a>
    </div>
  </section>
  <div class="sub-navbar-container">
    <div class="sub-navbar">
      <h2 style="font-size:30px">Favorites</h2>

    </div>
  </div>

  <div class="banner-container">
    <div class="banner">
      <h6>Favorites</h6>
      <h2>{{ $favorites->first()->movie_id ? $favorites->first()->title : $favorites->first()->name }}</h2>
      <p class="banner-excerpt">{{ Str::limit($favorites->first()->overview, 200) }}</p>
      <p>{{ $favorites->first()->genres }}</p>
      <div class="group-btn">

        <a href={{ $favorites->first()->movie_id
            ? '/movies/' . $favorites->first()->id . '?movie_id=' . $favorites->first()->movie_id
            : '/tvshows/' . $favorites->first()->id . '?tv_id=' . $favorites->first()->tv_id }}
          class="btn btn-primary">more info
          <i class="bi bi-info-circle-fill"></i></a>
      </div>
    </div>
  </div>
</div>


<div class="sub-container">

  @foreach ($genres as $genre)
    @if ($favorites->firstWhere('genres', $genre->name))
      <div class="slides-row">
        <h4 class="slides-title">{{ $genre->name }}</h4>
        <div class="slides">

          @foreach ($favorites->where('genres', $genre->name)->slice(0, 15)->shuffle() as $favorite)
            @include('sudahnonton.components.smallimage', [
                'result' => $favorite,
            ])

            @if ($loop->iteration == 15)
              <a href="/?faveGenre={{ $genre->id }}" class="btn btn-dark nowrap"
                style="margin-right:45px; margin-left:20px">see&nbsp;all..</a>
            @elseif ($loop->iteration == $favorites->where('genres', $genre->name)->count())
              <a class="btn btn-dark nowrap" style="margin-right:45px"></a>
            @endif
          @endforeach
        </div>
        <button class="slider-button switch-left"><i class="bi bi-chevron-compact-left"></i></button>
        <button class="slider-button switch-right"><i class="bi bi-chevron-compact-right"></i></button>
      </div>
    @endif
  @endforeach

</div>
