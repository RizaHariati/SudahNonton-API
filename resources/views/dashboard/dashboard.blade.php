@extends('dashboard.layout.main')

@section('container')
  <div class="main-container" style="height:calc(100vh - 60px)">
    <section class="main-img-container">

      @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show alert-session" role="alert">
          {{ session('success') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @elseif (session()->has('error'))
        <div class="alert alert-danger alert-dismissible fade show alert-session" role="alert">
          {{ session('error') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif

      <img class="small-img " src="https://www.themoviedb.org/t/p/original/um7dCYud1VGIsjTmSTvhO0QNTFr.jpg">

      <div class="attribute">
        <a href="https://www.themoviedb.org/"> all movies and tv show informations belongs to
          <img class="attribute-img"
            src="{{ asset('assets/images/blue_long_1-8ba2ac31f354005783fab473602c34c3f4fd207150182061e425d366e4f34596.svg') }}"
            alt="tmdb logo" />
        </a>
      </div>
    </section>

    <div class="banner-container">
      <div class="banner" style="letter-spacing: 1px">
        <h2>Welcome to dashboard</h2>
        @guest
          <h5 class=" text-danger">Please login to edit movie and tv show database</h5>
        @endguest
        <h5 style="font-weight: 300;letter-spacing: 1px">Number of movies I have watched so far : {{ $movies->count() }}
        </h5>
        <h5 style="font-weight: 300;letter-spacing: 1px">Number of tv shows I have watched so far :
          {{ $tvshows->count() }} </h5>
      </div>
    </div>
  </div>
@endsection
