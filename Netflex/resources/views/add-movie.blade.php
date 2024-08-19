@extends('movies')



@section('content')
    <form id="add-movie-form">
        @csrf
        <input type="text" name="movie_name" placeholder="Movie Name" required>
        <input type="text" name="movie_description" placeholder="Movie Description" required>
        <input type="text" name="movie_genre" placeholder="Movie Genre" required>
        <input type="submit" value="Add New Movie" class="btn btn-primary">
    </form>

    <script>
        
    </script>
@endsection
