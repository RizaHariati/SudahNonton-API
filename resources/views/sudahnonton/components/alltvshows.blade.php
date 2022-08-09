<div class="main-container">
  <section class="main-img-container">

    <img class="small-img " src="https://www.themoviedb.org/t/p/original{{ $tvshows->first()->image }}">
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
          <h3>Tv Shows</h3>
        </div>
        <div class="col-12 col-sm-4">
          <form action="/tvshows" id="myform">
            @csrf
            <select class="form-select" aria-label="Default select example" name="tvGenre" onchange="submitForm()"
              value={{ old('tvGenre') }} style=" background-color: var(--backgroundopacity);color:var(--light)"
              aria-placeholder="genres">
              <div class="options-container">
                <option disabled selected>GENRE</option>
                @foreach ($genres as $genre)
                  @if ($tvshows->firstWhere('genres', $genre->name))
                    <option value={{ $genre->id }}>{{ $genre->name }}</option>
                  @endif
                @endforeach
              </div>
            </select>
            <script type="text/javascript">
              function submitForm() {
                document.getElementById('myform').submit();
              }
            </script>
          </form>
        </div>
      </div>
      </select>
    </div>
  </div>
  <div class="banner-container">
    <div class="banner">
      <h6>Tv Shows</h6>
      <h2>{{ $tvshows->first()->name }}</h2>
      <p class="banner-excerpt">{{ Str::limit($tvshows->first()->overview, 300) }}</p>
      <p>{{ $tvshows->first()->genres }}</p>
      <div class="group-btn">

        <a href="/tvshows/{{ $tvshows->first()->id }}?tv_id={{ $tvshows->first()->tv_id }}" class="btn btn-primary">more
          info <i class="bi bi-info-circle-fill"></i></a>
      </div>
    </div>
  </div>
</div>

<div class="sub-container">

  @foreach ($genres as $genre)
    @if ($tvshows->firstWhere('genres', $genre->name))
      <div class="slides-row">
        <h5 class="slides-title">{{ $genre->name }}</h4>

          <div class="slides">

            @foreach ($tvshows->where('genres', $genre->name)->slice(0, 10)->slice(0, 10)->shuffle() as $tvshow)
              @include('sudahnonton.components.smallimage', ['result' => $tvshow])
              @if ($loop->iteration == 10)
                <a href="/tvshows?tvGenre={{ $genre->id }}" class="btn btn-dark nowrap"
                  style="margin-right:45px; margin-left:20px">see&nbsp;all..</a>
              @elseif ($loop->iteration == $tvshows->where('genres', $genre->name)->count())
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
