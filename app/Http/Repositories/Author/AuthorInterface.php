<?php

namespace App\Http\Repositories\Author;

interface AuthorInterface
{
    public function getAuthors();
    public function store($request);
    public function getAuthorById($id);
    public function getVoidAuthor();
    public function update($request, $id);
    public function destroy($id);
}
