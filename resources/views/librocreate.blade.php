@extends('layouts.plantilla')

@section('Bliblioteca', 'Formulario de libro')

@section('principal')

    <h1>Libro</h1>
    <a class="btn btn-primary" href="{{route('libroindex')}}">Volver</a>
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="post" action= " {{ isset($libro) ?
    route("libro.update", ["libro"=> $libro->id]): route("libro.guardar") }}" >
        @csrf
        <div class="form-group">
            <label for="titulo">Titulo</label>
            <input type="text" class="form-control" name="titulo" id="titulo"
                   placeholder="Titulo del libro">
        </div>

        <div class="form-group">
            <label for="autor">Autor</label>
            <input type="text" class="form-control" name="autor" id="autor"
                   placeholder="Autor del libro">
        </div>

        <div class="form-group">
            <label for="editorial">Editorial</label>
            <input type="text" class="form-control" name="editorial" id="editorial"
                   placeholder=" Editorial del libro">
        </div>

        <div class="form-group">
            <label for="anio">Año</label>
            <input type="number" class="form-control" name="anio" id="anio"
                   placeholder="0000">
        </div>

        <div class="form-group">
            <label for="cantidad_disponible">Cantidad disponible</label>
            <input type="number" class="form-control" name="cantidad_disponible" id="cantidad_disponible"
                   placeholder="###">
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>
        <input type="reset" class="btn btn-danger">

    </form>


@endsection
