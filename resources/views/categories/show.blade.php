@extends('layout')

@section('title', 'show category')

@section('content')
    <div class="container">
        <div class="bg-white p-5 shadow rounded">
            <div class="row">
                <div class="col-12">
                    <h1>
                        {{ $category->name }}
                    </h1>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="d-flex justify-content-between align-items-center">
                        <table class="table">
                            <tr>
                                <th>Nombre</th>
                                <td>{{ $category->name }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="col-12">
                    <a href="{{ route('category.index') }}" class="btn btn-info btn-lg btn-block">Regresar</a>
                    <a href="{{ route('category.edit', $category) }}" class="btn btn-primary btn-lg btn-block">Editar</a>
                    <a href="#" class="btn btn-danger btn-lg btn-block" onclick="document.getElementById('category-delete').submit()">Eliminar</a>

                    <form method="POST" action="{{ route('category.destroy', $category) }}" class="d-none" id="category-delete">
                        @csrf @method('DELETE')
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection