@extends('dashboard.layout.main')

@section('container')
  <div class="dashboard-container">
    <div class="dashboard ">


      <div class="dashboard-title">
        <h4>Movie List</h4>
        <a href="/dashboard/movies/create" class="btn btn-primary"> Add Movie &emsp;<i class="bi bi-plus-circle-fill"></i>
        </a>
      </div>

      <form action="/dashboard/movies">
        @csrf
        <div class="input-group mb-4 mt-4">
          <input type="text" class="form-control" placeholder="Search Movie..." aria-label="Search movie" name="search"
            aria-describedby="button-addon2">
          <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Search</button>
        </div>
      </form>


      @if ($movies->count() < 1)
        <div style="width: 100%; text-align:center">
          <h3>Movie is not found</h3>
          <a href="/dashboard/tvshows" class="btn btn-sm btn-outline-primary"> Back</a>
        </div>
      @else
        <div class="table-responsive rounded-2 ">
          <table class="table table-sm table-dark table-striped table-hover align-left "
            style="font-weight: 300;word-wrap: break-word;">
            <thead>
              <tr>
                <th class="col-lg-1" scope="col">No.</th>
                <th class="col-lg-7 col-md-5 col-4" scope="col" style="min-width: 250px">Title</th>
                <th class="col-2" scope="col" style="word-wrap: break-word;min-width: 120px;max-width: 150px;">
                  <form action="/dashboard/movies" id="myform" style="padding-right: 10px">
                    @csrf
                    <select class="form-select" name="movieGenre" onchange="submitForm()"
                      aria-label="Default select example" value={{ old('movieGenre') }} aria-placeholder="genres"
                      style=" background-color: var(--backgroundopacity);color:var(--light)">
                      <div class="options-container">
                        <option disabled selected>GENRE</option>
                        @foreach ($genres as $genre)
                          @if ($movies->firstWhere('genres', $genre->name))
                            <option value={{ $genre->id }}>{{ $genre->name }}</option>
                          @endif
                        @endforeach
                        <option value="all">ALL</option>
                      </div>
                    </select>
                    <script type="text/javascript">
                      function submitForm() {
                        document.getElementById('myform').submit();
                      }
                    </script>
                  </form>
                </th>
                <th class="col-lg-2 col-sm-3 col-4" scope="col"
                  style="word-wrap: break-word;min-width: 120px;max-width: 120px;">Actions</th>
              </tr>
            </thead>
            <tbody style="font-size: 12px">

              @foreach ($movies as $movie)
                <tr>
                  <th class="col-lg-1" style="line-height: 32px" scope="row">{{ $loop->iteration }}</th>
                  <td style="line-height: 32px">{{ $movie->title }}</td>
                  <td style="line-height: 32px; padding-left: 10px">{{ $movie->genres }}</td>
                  <td>
                    <a href="/dashboard/movies/{{ $movie->id }}" class="btn btn-sm btn-success"
                      style="font-size: 15px"><i class="bi bi-eye-fill"></i></a>
                    <a href="/dashboard/movies/{{ $movie->id }}/edit" class="btn btn-sm btn-warning"><i
                        class="bi bi-pencil-square"></i></a>
                    <form action="/dashboard/movies/{{ $movie->id }}" method="post" class="d-inline">
                      @csrf
                      @method('delete')
                      <button type="submit" class="btn btn-sm btn-danger"><i class="bi bi-trash3-fill"></i></button>
                    </form>
                  </td>
                </tr>
              @endforeach

            </tbody>

          </table>
          @if ($allmovies)
            <div class="d-flex justify-content-center align-items-baseline" style="background-color: transparent">
              {{ $movies->links() }}
            </div>
          @endif
        </div>
      @endif

    </div>

  </div>
@endsection
