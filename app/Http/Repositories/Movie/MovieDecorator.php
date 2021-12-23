<?php

namespace App\Http\Repositories\Movie;

class MovieDecorator implements MovieInterface
{

    private $movieRepository;

    public function __construct(MovieRepository $movieRepository)
    {
        $this->movieRepository = $movieRepository;
    }

    public function getMovies()
    {
        return $this->movieRepository->getMovies();
    }

    public function store($request)
    {
        $movie = $this->movieRepository->store($request);
        return $movie;
    }

    public function getMovieById($id)
    {
        return $this->movieRepository->getMovieById($id);
    }

    public function getVoidMovie()
    {
        return $this->movieRepository->getVoidMovie();
    }

    public function update($request, $id)
    {
        return $this->movieRepository->update($request, $id);
    }

    public function destroy($id)
    {
        return $this->movieRepository->destroy($id);
    }

    public function getAuthors()
    {
        return $this->movieRepository->getAuthors();
    }
    public function getCategories()
    {
        return $this->movieRepository->getCategories();
    }
}
