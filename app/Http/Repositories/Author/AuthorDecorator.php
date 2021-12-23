<?php

namespace App\Http\Repositories\Author;

class AuthorDecorator implements AuthorInterface
{

    private $authorRepository;

    public function __construct(AuthorRepository $authorRepository) {
        $this->authorRepository = $authorRepository;
    }

    public function getAuthors()
    {
        return $this->authorRepository->getAuthors();
    }

    public function store($request)
    {
        $author = $this->authorRepository->store($request);
        return $author;
    }

    public function getAuthorById($id)
    {
        return $this->authorRepository->getAuthorById($id);
    }

    public function getVoidAuthor()
    {
        return $this->authorRepository->getVoidAuthor();
    }

    public function update($request, $id)
    {
        return $this->authorRepository->update($request, $id);
    }

    public function destroy($id)
    {
        return $this->authorRepository->destroy($id);
    }
}
