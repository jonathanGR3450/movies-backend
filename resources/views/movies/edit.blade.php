@extends('layout')

@section('title', 'movie')

{{-- para agregar contenido dinamicamnete al layout --}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 mx-auto">
                <form action="{{ route('movie.update', $movie) }}" method="POST" class="bg-white rounded mx-0 my-0  py-3 px-4 shadow">
                    @method('PATCH')
                    @include('movies.partials._form', [
                        'btnText' => 'Editar',
                        'movie' => $movie
                        ])
                </form>
            </div>
        </div>
    </div>
@endsection