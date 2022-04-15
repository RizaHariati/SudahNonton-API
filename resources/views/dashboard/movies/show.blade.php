@extends('dashboard.layout.main')

@section('container')
<div class="dashboard-container">
  <div class="dashboard ">


    <div class="dashboard-title">
      <a href="/dashboard/movies/{{ $result->id }}/edit" class="btn btn-primary ">Edit {{$result->title}}</a>
    </div>
    <div class="dashboard-content-container">
      <div class="dashboard-image-container">
        <img class="small-img" src="https://www.themoviedb.org/t/p/w500{{$result->image}}" alt="{{ $result->title }}">
      </div>
      <div class="dashboard-info-container">
        <h4>{{$result->title }}</h4>
        <p>{{ $result->genres }}</p>
        <p>Release date: {{ $result->release_date }}</p>
        <p class="tagline">{{ $result->tagline }}</p>
        <p>{{ $result->overview }}</p>
        @if ($result->is_favorite)
        <p><i class="bi bi-hand-thumbs-up-fill"></i> I like it!</p>
        @endif
      </div>
    </div>

  </div>
</div>
@endsection