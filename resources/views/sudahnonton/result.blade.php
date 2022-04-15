@extends('sudahnonton.layout.main')

@section('container')
<div class="result-container">
  <div class="result-slides-container ">
    @if (session('results'))
    <div class="result-slides">
      @if (Session::get('results')->count() < 1) <h4 style="width: 100%; text-align:center">Your Search
        doesn't have any match
        </h4>
        <a href="/" class="btn btn-outline-light d-block">return</a>
        @else
        @foreach (Session::get('results') as $result)
        @include('sudahnonton.components.imagespage')
        @endforeach
        @endif

    </div>

    @else

    <div class="result-slides">
      <h4 style="width: 100%; text-align:center">Please input search
      </h4>
      <a href="/" class="btn btn-outline-light d-block">return</a>
    </div>
    @endif

  </div>
</div>
@endsection