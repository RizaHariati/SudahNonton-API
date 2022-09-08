<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description"
    content="I love watching movies and Tv shows.So using Laravel 8, I created this database website, to remind me of movies that I have watched. This page is the list where I add or remove new movies or tvshows" />
  <meta name="keywords" content="riza, hariati, rizahariati, azricoding, sudah, nonton, sudahnonton" />
  <meta property="og:image" content="{{ asset('assets/SEO/dashboard.png') }}" />
  <meta name="google-site-verification" content="2_YDNz_Qptv6IMFMC-xiafG5TWb3VtrNjaui1ZmVlgM" />
  <meta name="author" content="rizahariati">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href={{ 'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css' }}>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <link rel="stylesheet" href={{ asset('styles/bootstrapstyle.css') }}>
  <link rel="stylesheet" href={{ asset('/styles/styles.css') }}>
  <link rel="stylesheet" href={{ asset('styles/trix.css') }}>
  <title>SudahNonton</title>
</head>

<body>
  @include('dashboard.layout.navbar')

  @yield('container')

  <script src={{ asset('js/trix.js') }}></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
    integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
    integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>


</body>

</html>
