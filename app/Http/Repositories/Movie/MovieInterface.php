<?php

namespace App\Http\Repositories\Movie;

interface MovieInterface
{
    public function getMovies();
    public function store($request);
    public function getMovieById($id);
    public function getVoidMovie();
    public function update($request, $id);
    public function destroy($id);
    public function getAuthors();
    public function getCategories();
}
