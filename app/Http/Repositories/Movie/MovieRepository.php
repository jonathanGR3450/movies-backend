<?php

namespace App\Http\Repositories\Movie;

use App\Models\Author;
use App\Models\Category;
use App\Models\Movie;

class MovieRepository implements MovieInterface
{
    public function getMovies()
    {
        return Movie::with(['author', 'category'])
        ->orderBy('created_at', request('sorted', 'ASC'))
        ->paginate(10);
    }

    public function store($request)
    {
        $author = Movie::create($request->validated());
        return $author;
    }

    public function getMovieById($id)
    {
        return Movie::findOrFail($id);
    }

    public function getVoidMovie()
    {
        return new Movie();
    }

    public function update($request, $id)
    {
        return Movie::findOrFail($id)->update($request->validated());
    }

    public function destroy($id)
    {
        return Movie::findOrFail($id)->delete();
    }

    public function getAuthors()
    {
        return Author::all();
    }
    public function getCategories()
    {
        return Category::all();
    }
}