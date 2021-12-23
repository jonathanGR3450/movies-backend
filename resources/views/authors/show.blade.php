@extends('layout')

@section('title', 'show author')

@section('content')
    <div class="container">
        <div class="bg-white p-5 shadow rounded">
            <div class="row">
                <div class="col-12">
                    <h1>
                        {{ $author->name }}
                    </h1>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="d-flex justify-content-between align-items-center">
                        <table class="table">
                            <tr>
                                <th>Nombre</th>
                                <td>{{ $author->name }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="col-12">
                    <a href="{{ route('author.index') }}" class="btn btn-info btn-lg btn-block">Regresar</a>
                    <a href="{{ route('author.edit', $author) }}" class="btn btn-primary btn-lg btn-block">Editar</a>
                    <a href="#" class="btn btn-danger btn-lg btn-block" onclick="document.getElementById('author-delete').submit()">Eliminar</a>

                    <form method="POST" action="{{ route('author.destroy', $author) }}" class="d-none" id="author-delete">
                        @csrf @method('DELETE')
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection