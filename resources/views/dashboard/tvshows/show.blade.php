@extends('dashboard.layout.main')

@section('container')
<div class="dashboard-container">
    <div class="dashboard">


        <div class="dashboard-title">
            <a href="/dashboard/tvshows/{{ $result->id }}/edit" class="btn btn-primary">Edit {{ implode(' ',
                array_slice(explode(' ', $result->name), 0, 4)) }}</a>
        </div>
        <div class="dashboard-content-container">
            <div class="dashboard-image-container">
                <img class="small-img" src="https://www.themoviedb.org/t/p/w500{{$result->image}}"
                    alt="{{ $result->name }}">
            </div>
            <div class="dashboard-info-container">
                <h4>{{$result->name }}</h4>
                <p>{{ $result->genres }}</p>
                <p>Number of seasons : {{ $result->number_of_seasons}}</p>
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