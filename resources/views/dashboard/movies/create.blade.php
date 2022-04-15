@extends('dashboard.layout.main')

@section('container')
  <div class="dashboard-container">
    <div class="dashboard">


      @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{ session('success') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @elseif (session()->has('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          {{ session('error') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif

      <form action="/searchMovie" class="dashboard-selected-movie ">
        <h3>Search New Movie to be Added</h3>
        <div class="input-group mt-3 mb-3">
          <input type="text" class="form-control" name="searchmovie" value="{{ request('searchmovie') }}"
            placeholder="Search movie.." id="searchmovie" />

          <button class="btn btn-outline-light " type="submit">Search</button>
          <a href="/dashboard/movies/" class="btn btn-outline-light ">Cancel</a>
        </div>
      </form>

      @if (session()->has('results'))
        <div class="dashboard-slides-container ">
          @if (session('results')->count() < 1)
            <h4>Your Search don't have any match</h4>
          @else
            @foreach (session('results') as $result)
              <form action="/searchMovie" method="post">
                @csrf
                <input type="hidden" class="form-control" name="movie_id" value={{ $result->id }} />
                <button type="submit" class="dashboard-img-container">
                  <img class="small-img" src="https://www.themoviedb.org/t/p/w185{{ $result->poster_path }}"
                    alt="{{ $result->title }}">
                </button>
              </form>
            @endforeach
          @endif
        </div>

      @endif

      @if (session()->has('selectedMovie'))
        <div class="dashboard-selected-movie">
          <h4>Add New Movie</h4>
          <form action="/dashboard/movies" enctype="multipart/form-data" method="post">
            @csrf
            @if (session('selectedMovie')->backdrop_path)
              <div class="movie-backdrop mb-3">
                <img class="small-img "
                  src="https://www.themoviedb.org/t/p/original{{ session('selectedMovie')->backdrop_path }}">
                <input type="hidden" class="form-control" name="image"
                  value={{ session('selectedMovie')->backdrop_path }} />

              </div>
            @elseif (session('selectedMovie')->poster_path)
              <div class="movie-backdrop mb-3">
                <img class="small-img"
                  src="https://www.themoviedb.org/t/p/original{{ session('selectedMovie')->poster_path }}">
                <input type="hidden" class="form-control" name="image"
                  value={{ session('selectedMovie')->poster_path }} />
              </div>
            @endif

            <div class="form-floating mb-3">
              <input readonly type="text" class="form-control" id="movie_id" name="movie_id"
                value="{{ session('selectedMovie')->id }}">
              <label for="movie_id" class="form-label">Movie id</label>
            </div>

            <div class="form-floating mb-3">
              <input readonly type="text" class="form-control" id="title" name="title"
                value="{{ session('selectedMovie')->title }}">
              <label for="title" class="form-label">Movie Title</label>
            </div>

            <div class="form-floating mb-3">
              <input readonly type="text" class="form-control" id="release_date" name="release_date"
                value="{{ session('selectedMovie')->release_date }}">
              <label for="release_date" class="form-label">Release Date</label>
            </div>

            <div class="form-floating mb-3">
              <textarea type="text" style="height: 100px" class="form-control" id="tagline" name="tagline"
                value="{{ session('selectedMovie')->tagline }}">{{ session('selectedMovie')->tagline }}</textarea>
              <label for="tagline" class="form-label">Tagline</label>
            </div>

            <div class="form-floating mb-3">
              <textarea readonly type="text" style="height: 140px" class="form-control" id="overview" name="overview"
                value="{{ session('selectedMovie')->overview }}">{{ session('selectedMovie')->overview }}</textarea>
              <label for="overview">Overview</label>
            </div>

            <div class="form-floating mb-3">
              <select class="form-select" id="genres" name="genres" value="{{ old('genres') }}">
                @foreach (session('genres') as $genre)
                  @if (old('genre') == $genre->name)
                    <option value="{{ $genre->name }}" selected>{{ $genre->name }}
                    </option>
                  @else
                    <option value="{{ $genre->name }}">
                      <p>{{ $genre->id }}&emsp;{{ $genre->name }}</p>
                    </option>
                  @endif
                @endforeach
              </select>
              <label for="genre">select genre</label>
            </div>

            <div class="form-floating mb-3">
              <select class="form-select" id="is_favorite" name="is_favorite" value="{{ old('is_favorite') }}">

                <option value="0" @if (old('is_favorite') == 0) selected @endif>No </option>
                <option value="1" @if (old('is_favorite') == 1) selected @endif>Yes </option>

              </select>
              <label for="genre">Is it your Favorite?</label>
            </div>

            <label for="body" class="form-label" style="color: var(--light)">Select Body</label>
            <div class=" dashboard-trix mb-3">

              <div class="form-floating mb-3">

                <input id="body" value="{{ old('my_comment') }}" type="hidden" name="my_comment">
                <trix-editor input="body"></trix-editor>

              </div>
            </div>

            <button class="btn btn-primary" type="submit">Submit</button>
          </form>
        </div>
      @endif
    </div>

  </div>
@endsection
