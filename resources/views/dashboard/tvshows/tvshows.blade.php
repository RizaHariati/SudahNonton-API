@extends('dashboard.layout.main')

@section('container')

  <div class="dashboard-container">
    <div class="dashboard ">

      <div class="dashboard-title">
        <h4>Tv Shows List</h4>
        @auth
          <a href="/dashboard/tvshows/create" class="btn btn-primary btn-sm"> Add Tv Show &emsp;<i
              class="bi bi-plus-circle-fill"></i>
          </a>
        @else
          <a href="/dashboard/tvshows/create?login=false" class="btn btn-primary btn-sm "> Add Tv Show &emsp;<i
              class="bi bi-plus-circle-fill"></i>
          </a>
        @endauth

      </div>

      <form action="/dashboard/tvshows">
        @csrf
        <div class="input-group mb-4 mt-4">
          <input type="text" class="form-control" placeholder="Search Tv Show..." aria-label="Search tv show"
            name="search" aria-describedby="button-addon2">
          <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Search</button>
        </div>
      </form>

      @if ($tvshows->count() < 1)
        <div style="width: 100%; text-align:center">
          <h3>Tv show is not found</h3>
          <a href="/dashboard/tvshows" class="btn btn-sm btn-outline-primary"> Back</a>
        </div>
      @else<div class="table-responsive rounded-2 " style="max-width: 900px; margin-inline:auto">
          <table class="table table-sm table-dark table-striped table-hover align-left "
            style="font-weight: 300;word-wrap: break-word;">
            <thead>
              <tr class="table-body-custom">
                <th class="col-md-1 d-none d-md-flex shadow-md h-full p-2 w-75 bg-dark" scope="col">No.</th>
                <th class="col-6 col-md-7 text-wrap " scope="col">Title</th>
                <th class="col-3 col-md-2" scope="col">
                  <form action="/dashboard/tvshows" id="myform">
                    @csrf
                    <select class="form-select " name="tvGenre" onchange="submitForm()"
                      aria-label="Default select example" value={{ old('tvGenre') }} aria-placeholder="genres"
                      style=" background-color: var(--backgroundopacity);color:var(--light)">
                      <div class="options-container">
                        <option disabled selected>GENRE</option>
                        @foreach ($genres as $genre)
                          @if ($tvshows->firstWhere('genres', $genre->name))
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
                <th class="btn-custom-container col-3 col-md-2" scope="col">
                  Actions</th>
              </tr>
            </thead>

            <tbody>

              @foreach ($tvshows as $tvshow)
                <tr class="table-body-custom">
                  <td class="col-md-1 d-none d-md-flex shadow-md h-full p-2 w-75 bg-dark" scope="row">
                    {{ $loop->iteration }}
                  </td>
                  <td class="col-6 col-md-7 text-wrap" style="line-height: 32px">{{ $tvshow->name }}</td>
                  <td class="col-3 col-md-2" style=" line-height: 32px">{{ $tvshow->genres }}</td>
                  <td class="btn-custom-container col-3 col-md-2">

                    <a href="/dashboard/tvshows/{{ $tvshow->id }}" class="btn-custom bg-success"><i
                        class="bi bi-eye-fill"></i></a>
                    <a href="/dashboard/tvshows/{{ $tvshow->id }}/edit" class="btn-custom bg-warning  "><i
                        class="bi bi-pencil-square"></i></a>

                    <form action="/dashboard/tvshows/{{ $tvshow->id }}" method="post" class="btn-custom bg-danger">
                      <button type="submit" class=" extra-button">

                        @csrf
                        @method('delete')
                        <i class="bi
                        bi-trash3-fill"></i>
                      </button>
                    </form>


                  </td>
                </tr>
              @endforeach

            </tbody>

          </table>
          @if ($alltvshows)
            <div class="d-flex justify-content-center align-items-baseline" style="background-color: transparent">
              {{ $tvshows->links() }}
            </div>
          @endif
        </div>
      @endif
    </div>

  </div>
@endsection
