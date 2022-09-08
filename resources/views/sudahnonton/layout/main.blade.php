<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description"
    content="I love watching movies and Tv shows.So using Laravel 8, I created this database website, to remind me of movies that I have watched. The design is based on Netflix's Website." />
  <meta name="keywords" content="riza, hariati, rizahariati, azricoding, sudah, nonton, sudahnonton" />
  <meta property="og:image" content="{{ asset('assets/SEO/main.png') }}" />
  <meta name="google-site-verification" content="ToQHHEWK48t95I0a2-VCdlbdgY7joocmPhmLPMS2KUw" />
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href={{ 'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css' }}>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href={{ asset('styles/bootstrapstyle.css') }}>
  <link rel="stylesheet" href={{ asset('/styles/styles.css') }}>

  <title>SudahNonton</title>


</head>

<body>
  @include('sudahnonton.layout.navbar')
  @if (session()->has('error'))
    <div class="alert alert-danger alert-dismissible fade show alert-session" role="alert">
      {{ session('error') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif
  @yield('container')


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script type="module" src={{ asset('js/bootstrap.js') }}></script>

</body>

</html>
