<div class="slide-container">

  <a href={{ $result->movie_id
      ? '/movies/' . $result->id . '?movie_id=' . $result->movie_id
      : '/tvshows/' . $result->id . '?tv_id=' . $result->tv_id }}
    class="slide-img">

    <img class="small-img " src="https://www.themoviedb.org/t/p/w300{{ $result->image }}">

  </a>

  <div class="slide-info">

    <h6 class="title"> {{ $result->movie_id ? $result->title : $result->name }}</h6>
    <div class="slide-title">
      <h6 class="category">Category : {{ $result->genres }}</h6>
      <h6 class="year">
        {{ $result->movie_id
            ? 'Year : ' . substr($result->release_date, 0, 4)
            : 'Seasons : ' . $result->number_of_seasons }}
      </h6>
    </div>
    <h6 class="tagline">{{ $result->tagline }}</h6>

  </div>
</div>
