@extends('layout')

@section('title', 'show movie')

@section('content')
    <div class="container">
        <div class="bg-white p-5 shadow rounded">
            <div class="row">
                <div class="col-12">
                    <h1>
                       Pelicula - {{ $movie->name }}
                    </h1>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="d-flex justify-content-between align-items-center">
                        <table class="table">
                            <tr>
                                <th>Nombre</th>
                                <td>{{ $movie->name }}</td>
                            </tr>
                            <tr>
                                <th>Fecha de publicacion</th>
                                <td>{{ $movie->present()->getReleaseDate() }}</td>
                            </tr>
                            <tr>
                                <th>Productora</th>
                                <td>{{ $movie->present()->getProducer() }}</td>
                            </tr>
                            <tr>
                                <th>Autor</th>
                                <td>{{ $movie->present()->getAuthor() }}</td>
                            </tr>
                            <tr>
                                <th>Categoria</th>
                                <td>{{ $movie->present()->getCategory() }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="col-12">
                    <a href="{{ route('movie.index') }}" class="btn btn-info btn-lg btn-block">Regresar</a>
                    <a href="{{ route('movie.edit', $movie) }}" class="btn btn-primary btn-lg btn-block">Editar</a>
                    <a href="#" class="btn btn-danger btn-lg btn-block" onclick="document.getElementById('movie-delete').submit()">Eliminar</a>

                    <form method="POST" action="{{ route('movie.destroy', $movie) }}" class="d-none" id="movie-delete">
                        @csrf @method('DELETE')
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection