@extends('dashboard.layout.main')

@section('container')
  <div class="dashboard-container">
    <div class="dashboard ">

      <div class="dashboard-title">
        <h4>Edit Tv Shows</h4>
        <a href="/dashboard/tvshows/" class="btn btn-primary">Cancel</a>
      </div>
      <div class="dashboard-content-container">
        <div class="dashboard-image-container">
          <img class="small-img" src="https://www.themoviedb.org/t/p/w500{{ $edit->image }}"
            alt="{{ $edit->name }}">
        </div>
        <div class="dashboard-info-container">
          <form action="/dashboard/tvshows/{{ $edit->id }}" enctype="multipart/form-data" method="POST">
            @method('put')
            @csrf
            <h4>Editing {{ $edit->name }}</h4>
            <div class="form-floating mb-3">
              <select class="form-select" id="genres" name="genres" value="{{ old('genres') }}">
                @foreach ($genres as $genre)
                  @if (old('genre', $edit->genres) == $genre->name)
                    <option value="{{ $genre->name }}" selected>{{ $genre->name }}
                    </option>
                  @else
                    <option value="{{ $genre->name }}">
                      <p>{{ $genre->id }}&emsp;{{ $genre->name }}</p>
                    </option>
                  @endif
                @endforeach
              </select>
              <label for="genre">select genre</label>
            </div>

            <div class="form-floating mb-3">
              <textarea type="text" style="height: 100px" class="form-control" id="tagline" name="tagline"
                value="{{ old('tagline', $edit->tagline) }}">{{ $edit->tagline }}</textarea>
              <label for="tagline" class="form-label">Tagline</label>
            </div>

            <label for="body" class="form-label" style="color: var(--light)">Edit Comment</label>
            <div class="dashboard-trix mb-3">
              <div class="form-floating mb-3">

                <input id="body" value="{{ old('my_comment', $edit->my_comment) }}" type="hidden" name="my_comment">
                <trix-editor input="body"></trix-editor>

              </div>
            </div>
            <p>Number of seasons : {{ $edit->number_of_seasons }}</p>
            <p>{{ $edit->tagline }}</p>
            <p>{{ $edit->overview }}</p>
            @if ($edit->is_favorite)
              <p><i class="bi bi-hand-thumbs-up-fill"></i> I like it!</p>
            @endif

            <button class="btn btn-primary" type="submit">Submit</button>

          </form>
        </div>
      </div>
    </div>

  </div>
@endsection
