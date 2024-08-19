<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $movies=Movie::all();
        return view('movies',compact('movies'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $movies=Movie::all(); //select * from movies
        return view('add-movie',compact('movies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $movie = new Movie();
        $movie->movie_name = $request->movie_name;
        $movie->movie_description = $request->movie_description;
        $movie->movie_genre = $request->movie_genre;
        $movie->save();
        return redirect()->route('movies.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Movie $movie)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Movie $movie)
    {
        $movies=Movie::all();
        $movie=$movie->find($movie->id);
        return view('edit-movie',compact('movie','movies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Movie $movie)
    {
        $movies=Movie::all();
        $movie->movie_name = $request->movie_name;
        $movie->movie_description = $request->movie_description;
        $movie->movie_genre = $request->movie_genre;
        $movie->save();
        return redirect()->route('movies.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Movie $movie)
    {
        $movie->delete();
        return redirect()->route('movies.index');
    }
}
