<?php

namespace App\Http\Repositories\Category;

class CategoryDecorator implements CategoryInterface
{

    private $authorRepository;

    public function __construct(CategoryRepository $authorRepository) {
        $this->authorRepository = $authorRepository;
    }

    public function getCategories()
    {
        return $this->authorRepository->getCategories();
    }

    public function store($request)
    {
        $author = $this->authorRepository->store($request);
        return $author;
    }

    public function getCategoryById($id)
    {
        return $this->authorRepository->getCategoryById($id);
    }

    public function getVoidCategory()
    {
        return $this->authorRepository->getVoidCategory();
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
