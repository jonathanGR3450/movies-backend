<?php

namespace App\Http\Controllers;

use App\Http\Repositories\Movie\MovieInterface;
use App\Http\Requests\MovieFormRequest;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    private $movie;

    public function __construct(MovieInterface $movie) {
        $this->movie = $movie;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movies = $this->movie->getMovies();
        return view('movies.index', compact('movies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $movie = $this->movie->getVoidMovie();
        $authors = $this->movie->getAuthors();
        $categories = $this->movie->getCategories();
        return view('movies.create')->with(compact('movie', 'authors', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MovieFormRequest $request)
    {
        $movie = $this->movie->store($request);

        return back()->with("status", "Se creo un nuevo registro");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $movie = $this->movie->getMovieById($id);
        return view('movies.show', compact('movie'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $movie = $this->movie->getMovieById($id);
        $authors = $this->movie->getAuthors();
        $categories = $this->movie->getCategories();
        return view('movies.edit', compact('movie', 'authors', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MovieFormRequest $request, $id)
    {
        $movie = $this->movie->update($request, $id);
        return redirect()->route('movie.index')->with('status', 'El registro se actualizo correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->movie->destroy($id);
        return redirect()->route('movie.index')->with('status', 'Se elimino el registro con exito');
    }
}
