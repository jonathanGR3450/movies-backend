<?php

namespace App\Http\Repositories\Category;

use App\Models\Category;

class CategoryRepository implements CategoryInterface
{
    public function getCategories()
    {
        return Category::orderBy('created_at', request('sorted', 'ASC'))
        ->paginate(10);
    }

    public function store($request)
    {
        $author = Category::create($request->validated());
        return $author;
    }

    public function getCategoryById($id)
    {
        return Category::findOrFail($id);
    }

    public function getVoidCategory()
    {
        return new Category();
    }

    public function update($request, $id)
    {
        return Category::findOrFail($id)->update($request->validated());
    }

    public function destroy($id)
    {
        return Category::findOrFail($id)->delete();
    }
}