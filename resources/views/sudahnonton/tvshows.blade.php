@extends('sudahnonton.layout.main')

@section('container')
  @if ($allresult)
    @include('sudahnonton.components.alltvshows', [
        'tvshows' => $tvshows,
        'genres' => $genres,
    ])
  @else
    @include('sudahnonton.genre', ['results' => $tvshows, 'genres' => $genres])
  @endif
  <script src="{{ asset('js/mainContainer.js') }}"></script>
@endsection
