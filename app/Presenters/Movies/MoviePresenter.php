<?php

namespace App\Presenters\Movies;

use App\Presenters\Presenter;
use Illuminate\Support\HtmlString;

class MoviePresenter extends Presenter {


    public function getNameLink()
    {
        return new HtmlString("<a href=" . route('movie.show', $this->model) . ">" . $this->model->name ."</a>");;
    }

    public function getReleaseDate()
    {
        return $this->model->release_date;
    }

    public function getProducer()
    {
        return $this->model->producer;
    }

    public function getAuthor()
    {
        return $this->model->author->name ?? '';
    }

    public function getCategory()
    {
        return $this->model->category->name ?? '';
    }

    public function getAuthorSelected($id)
    {
        return $this->model->author_id == $id ? 'selected' : '';
    }

    public function getCategorySelected($id)
    {
        return $this->model->category_id == $id ? 'selected' : '';
    }
}