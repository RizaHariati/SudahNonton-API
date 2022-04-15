@extends('sudahnonton.layout.main')

@section('container')
  @if ($allfavorites)
    @include('sudahnonton.components.allfavorites', [
        'favorites' => $favorites,
        'genres' => $genres,
    ])
  @else
    @include('sudahnonton.genre', ['results' => $favorites, 'genres' => $genres])
  @endif

  <script src="{{ asset('js/mainContainer.js') }}"></script>
@endsection
