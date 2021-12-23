<?php

namespace App\Presenters\Categories;

use App\Presenters\Presenter;
use Illuminate\Support\HtmlString;

class CategoryPresenter extends Presenter {


    public function getNameLink()
    {
        return new HtmlString("<a href=" . route('category.show', $this->model) . ">" . $this->model->name ."</a>");;
    }

}