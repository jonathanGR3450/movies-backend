@extends('layout')

@section('title', 'Authors')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="display-4">Categorias</h1>
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
                        @forelse ($categories as $category)
                            <tr>
                                <td>{{ $category->present()->getNameLink() }}</td>
                                <td>
                                    <div class="btn-group btn-group-sm">
                                        <a class="btn btn-primary" href="{{ route('category.edit', $category) }}">Editar</a>
                                        <a class="btn btn-danger" href="#" onclick="document.getElementById('{{ 'delete-category-' . $category->id }}').submit()">Eliminar</a>
                                    </div>
                                    <form class="d-none" id="{{ "delete-category-$category->id" }}" action="{{ route("category.destroy", $category) }}" method="post">
                                        @csrf @method("DELETE")
                                    </form>
                                </td>
                            </tr>
                        @empty
                            No hay informacion para mostrar
                        @endforelse
                    </tbody>
                </table>
                {{ $categories->appends(request()->query())->links('pagination::default') }}
            </div>
            <div class="col-12">
                <a href="{{ route('category.create') }}" class="btn btn-primary btn-lg btn-block">Nuevo Autor</a>
            </div>
        </div>
    </div>
@endsection