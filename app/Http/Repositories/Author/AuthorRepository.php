<?php

namespace App\Http\Repositories\Author;

use App\Models\Author;

class AuthorRepository implements AuthorInterface
{
    public function getAuthors()
    {
        return Author::orderBy('created_at', request('sorted', 'ASC'))
        ->paginate(10);
    }

    public function store($request)
    {
        $author = Author::create($request->validated());
        return $author;
    }

    public function getAuthorById($id)
    {
        return Author::findOrFail($id);
    }

    public function getVoidAuthor()
    {
        return new Author();
    }

    public function update($request, $id)
    {
        return Author::findOrFail($id)->update($request->validated());
    }

    public function destroy($id)
    {
        return Author::findOrFail($id)->delete();
    }
}