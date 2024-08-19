@extends('movies')


@section('edit-movie')
    <form id="edit-movie-form">
        @csrf
        @method('PUT')
        <input type="text" name="movie_name" value="{{ $movie->movie_name }}" required>
        <input type="text" name="movie_description" value="{{ $movie->movie_description }}" required>
        <input type="text" name="movie_genre" value="{{ $movie->movie_genre }}" required>
        <input type="submit" value="Update" class="btn btn-primary">
    </form>

    <script>
        
    </script>
@endsection
