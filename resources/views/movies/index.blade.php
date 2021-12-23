@extends('layout')

@section('title', 'Movies')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="display-4">Peliculas</h1>
            </div>
            <div class="col-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nombres</th>
                            <th>Fecha de publicacion</th>
                            <th>Productora</th>
                            <th>Autor</th>
                            <th>Categoria</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($movies as $movie)
                            <tr>
                                <td>{{ $movie->present()->getNameLink() }}</td>
                                <td>{{ $movie->present()->getReleaseDate() }}</td>
                                <td>{{ $movie->present()->getProducer() }}</td>
                                <td>{{ $movie->present()->getAuthor() }}</td>
                                <td>{{ $movie->present()->getCategory() }}</td>
                                <td>
                                    <div class="btn-group btn-group-sm">
                                        <a class="btn btn-primary" href="{{ route('movie.edit', $movie) }}">Editar</a>
                                        <a class="btn btn-danger" href="#" onclick="document.getElementById('{{ 'delete-movie-' . $movie->id }}').submit()">Eliminar</a>
                                    </div>
                                    <form class="d-none" id="{{ "delete-movie-$movie->id" }}" action="{{ route("movie.destroy", $movie) }}" method="post">
                                        @csrf @method("DELETE")
                                    </form>
                                </td>
                            </tr>
                        @empty
                            No hay informacion para mostrar
                        @endforelse
                    </tbody>
                </table>
                {{ $movies->appends(request()->query())->links('pagination::default') }}
            </div>
            <div class="col-12">
                <a href="{{ route('movie.create') }}" class="btn btn-primary btn-lg btn-block">Nueva Pelicula</a>
            </div>
        </div>
    </div>
@endsection