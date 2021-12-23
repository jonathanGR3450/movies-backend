<?php

namespace App\Presenters\Authors;

use App\Presenters\Presenter;
use Illuminate\Support\HtmlString;

class AuthorPresenter extends Presenter {


    public function getNameLink()
    {
        return new HtmlString("<a href=" . route('author.show', $this->model) . ">" . $this->model->name ."</a>");;
    }

}