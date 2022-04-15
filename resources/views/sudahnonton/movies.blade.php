@extends('sudahnonton.layout.main')

@section('container')

@if ($allmovies)
@include('sudahnonton.components.allmovies',['movies'=>$movies, 'genres'=>$genres])
@else
@include('sudahnonton.genre',['results'=>$movies, 'genres'=>$genres])
@endif


<script src="{{ asset('js/mainContainer.js') }}"></script>
@endsection