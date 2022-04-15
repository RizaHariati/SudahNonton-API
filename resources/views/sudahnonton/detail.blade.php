@extends('sudahnonton.layout.main')
@section('container')
  {{-- @dd($result) --}}
  <div class="result-container">
    <div class="detail-container">
      <div class="detail">

        <div class="detail-poster">
          <img class="small-img" src="https://www.themoviedb.org/t/p/w342{{ $result->poster_path }}"
            alt="{{ $is_movie ? $result->title : $result->name }}">
        </div>
        <div class="detail-backdrop">
          <img class="small-img" src="https://www.themoviedb.org/t/p/w300{{ $result->backdrop_path }}"
            alt="{{ $is_movie ? $result->title : $result->name }}">
        </div>
        <div class="detail-info">
          <h6>{{ $is_movie ? 'Movie' : 'Tv Show' }}</h6>
          <h3> {{ $is_movie ? $result->title : $result->name }}</h3>
          <h6 class="tagline">{{ $result->tagline }}</h6>
          <div class="genres">

            @foreach ($result->genres as $genre)
              <button disabled class="btn btn-outline-light btn-sm rounded-end">{{ $genre->name }}</button>
            @endforeach
          </div>
          <p>{{ $result->overview }}</p>


          @if ($result->production_countries)
            <p>Country : {{ $result->production_countries[0]->name }}</p>
          @endif

          @if ($is_movie)
            <p>release date : {{ $result->release_date }}</p>
          @endif

          @if ($my_comment)
            <div class="detail-comment">
              <p class="mb-0"><i class="bi bi-emoji-smile"></i> My comment: </p>
              <div class="comment">{!! $my_comment !!}</div>
            </div>
          @endif
          <div class="btn-group">
            <a href="/" class="btn btn-outline-primary btn-sm"> <i class="bi bi-backspace"></i> back
            </a>
            <a class="btn btn-primary btn-sm" href="{{ $result->homepage }}"><i class="bi bi-info-circle-fill"></i>
              more
              detail</a>
          </div>
        </div>


      </div>
    </div>
  </div>
@endsection
