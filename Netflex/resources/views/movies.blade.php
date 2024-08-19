<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Netflix Carousel</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="js/index.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>

<body>

    <header>
        <img src="https://sm.pcmag.com/t/pcmag_me/review/n/netflix/netflix_gsdg.1920.jpg" alt="Netflix">
    </header>

    <div class="add-section">
        <a href="{{ route('movies.create') }}" class="btn btn-primary text-white">Add Movie</a>
        @yield('content')
        @yield('edit-movie')
    </div>
    <div class="container">
        <h1>Movies genre</h1>
        <hr>
        @foreach ($movies as $movie)
            <div class="gui-card1">
                <div class="gui-card__media">
                    <img class="gui-card__img" src="https://picsum.photos/200" alt="Movie Image" />
                </div>
                <div class="gui-card__details">
                    <div class="gui-card__title">
                        <h4>{{ $movie->movie_genre }}</h4>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="grid-container container">
        {{-- foreach --}}
        @foreach ($movies as $movie)
            <div class="gui-card">
                <div class="gui-card__media">
                    <img class="gui-card__img" src="https://picsum.photos/200/300?random={{ $movie->id }}"
                        alt="Movie Image" />
                </div>

                <div class="gui-card__actions">
                    <a href="{{ route('movies.edit', $movie->id) }}">
                        <img src="{{ asset('images/edit.svg') }}" alt="Edit" width="20px">
                    </a>
                    <form id="delete-movie-form-{{ $movie->id }}" action="{{ route('movies.destroy', $movie->id) }}"
                        method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="border: none; background: none;"
                            onclick="deleteMovie({{ $movie->id }})">
                            <img src="{{ asset('images/delete.svg') }}" alt="Delete" width="20px">
                        </button>
                    </form>
                </div>

                <div class="gui-card__details">
                    <div class="gui-card__title">
                        <p>{{ $movie->movie_name }}</p>
                        <p>{{ $movie->movie_description }}</p>
                    </div>
                </div>
            </div>
        @endforeach
        {{-- endforeach --}}
    </div>
    <script>
        $('#edit-movie-form').on('submit', function(e) {
            e.preventDefault();

            $.ajax({
                url: "{{ route('movies.update', $movie->id) }}",
                method: 'PUT',
                data: $(this).serialize(),
                success: function(response) {
                    alert('Movie updated successfully!');
                    location.reload(); // Reload the page to show the updated movie
                },
                error: function(response) {
                    alert('Error updating movie!');
                }
            });
        });

        function deleteMovie(movieId) {
            if (confirm('Are you sure you want to delete this movie?')) {
                $.ajax({
                    url: "{{ route('movies.destroy', '') }}/" + movieId,
                    method: 'DELETE',
                    data: {
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        alert('Movie deleted successfully!');
                        location.reload(); // Reload the page to remove the deleted movie
                    },
                    error: function(response) {
                        alert('Error deleting movie!');
                    }
                });
            }
        }
        $('#add-movie-form').on('submit', function(e) {
            e.preventDefault();

            $.ajax({
                url: "{{ route('movies.store') }}",
                method: 'POST',
                data: $(this).serialize(),
                success: function(response) {
                    alert('Movie added successfully!');
                    location.reload(); // Reload the page to show the new movie
                },
                error: function(response) {
                    alert('Error adding movie!');
                }
            });
        });
    </script>
</body>

</html>
