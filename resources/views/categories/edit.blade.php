@extends('layout')

@section('title', 'contact')

{{-- para agregar contenido dinamicamnete al layout --}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 mx-auto">
                <form action="{{ route('category.update', $category) }}" method="POST" class="bg-white rounded mx-0 my-0  py-3 px-4 shadow">
                    @method('PATCH')
                    @include('categories.partials._form', [
                        'btnText' => 'Editar',
                        'category' => $category
                        ])
                </form>
            </div>
        </div>
    </div>
@endsection