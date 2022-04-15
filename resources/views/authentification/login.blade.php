@extends('authentification.layout.main')

@section('container')
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

  <form action="/auth/login" method="post">
    @csrf
    <img class="mb-4" src="{{ asset('assets/images/logo.png') }}" alt="" width="72" height="72">
    <h1 class="h3 mb-3 fw-normal">Please login</h1>

    <div class="form-floating">
      <input autofocus type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror"
        value="{{ old('email') }}" placeholder="name@example.com">
      <label for="email">Email address</label>
      @error('email')
        <small class="text-danger">{{ $message }}</small>
      @enderror
    </div>

    <div class="form-floating">
      <input type="password" id="password" value="{{ old('password') }}" name="password"
        class="form-control  @error('password') is-invalid @enderror " placeholder="Password">
      <label for="password">Password</label>
      @error('password')
        <small class="text-danger">{{ $message }}</small>
      @enderror
    </div>
    <p class="mt-2 mb-2 text-muted">don't have any account? <a href="/auth/register" class="text-info">please
        register</a>
    </p>
    <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
    <p class="mt-2 mb-2 text-muted">&copy; 2022</p>
  </form>
@endsection
