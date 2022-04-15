<div class="main-container">
  <section class="main-img-container">

    <img class="small-img " src="https://www.themoviedb.org/t/p/original{{ $results->first()->image }}">
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
      <div class="row" style="width: 100%">
        <div class="col-2">
          <h3>{{ $results->first()->genres }}</h3>
        </div>

      </div>
    </div>

  </div>

  <div class="banner-container">
    <div class="banner">
      <h6>{{ $results->first()->movie_id ? 'Movie' : 'Tv Show' }}</h6>
      <h2>{{ $results->first()->title }}</h2>

      <p class="banner-excerpt">{{ Str::limit($results->first()->overview, 300) }}</p>
      <p>{{ $results->first()->genres }}</p>

      @if ($results->first()->movie_id)
        <div class="btn-group">
          <a href="/movies/" class="btn btn-outline-primary"> <i class="bi bi-backspace"></i> back
          </a>
          <a href="/movies/{{ $results->first()->id }}?movie_id={{ $results->first()->movie_id }} "
            class="btn btn-primary"> <i class="bi bi-info-circle"></i> more info
          </a>
        </div>
      @else
        <div class="btn-group">
          <a href="/tvshows/" class="btn btn-outline-primary"> <i class="bi bi-backspace"></i> back
          </a>
          <a href="/tvshows/{{ $results->first()->id }}?tv_id={{ $results->first()->tv_id }} "
            class="btn btn-primary"> <i class="bi bi-info-circle"></i> more info
          </a>
        </div>
      @endif
    </div>
  </div>
</div>



<div class="result-container">
  <div class="result-slides-container ">

    <div class="result-slides">
      @if ($results->count() >= 2)
        @foreach ($results->skip(1) as $result)
          @include('sudahnonton.components.imagespage')
        @endforeach
      @endif
    </div>

  </div>
</div>
