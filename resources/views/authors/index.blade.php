@extends('layout')

@section('title', 'Authors')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="display-4">Autores</h1>
            </div>
            <div class="col-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nombres</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($authors as $author)
                            <tr>
                                <td>{{ $author->present()->getNameLink() }}</td>
                                <td>
                                    <div class="btn-group btn-group-sm">
                                        <a class="btn btn-primary" href="{{ route('author.edit', $author) }}">Editar</a>
                                        <a class="btn btn-danger" href="#" onclick="document.getElementById('{{ 'delete-author-' . $author->id }}').submit()">Eliminar</a>
                                    </div>
                                    <form class="d-none" id="{{ "delete-author-$author->id" }}" action="{{ route("author.destroy", $author) }}" method="post">
                                        @csrf @method("DELETE")
                                    </form>
                                </td>
                            </tr>
                        @empty
                            No hay informacion para mostrar
                        @endforelse
                    </tbody>
                </table>
                {{ $authors->appends(request()->query())->links('pagination::default') }}
            </div>
            <div class="col-12">
                <a href="{{ route('author.create') }}" class="btn btn-primary btn-lg btn-block">Nuevo Autor</a>
            </div>
        </div>
    </div>
@endsection