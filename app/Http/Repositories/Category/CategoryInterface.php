<?php

namespace App\Http\Repositories\Category;

interface CategoryInterface
{
    public function getCategories();
    public function store($request);
    public function getCategoryById($id);
    public function getVoidCategory();
    public function update($request, $id);
    public function destroy($id);
}
