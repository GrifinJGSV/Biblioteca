@extends('layouts.plantilla')

@section('Bliblioteca', 'Formulario de libro')

@section('principal')

    <h1>Editar libro</h1>

    <a class="btn btn-primary" href="{{route('libroindex')}}">Volver</a>

    <form method="post" action="{{route('libro.update', ['id'=>$libro->id])}}">
        @method('put')
        @csrf
        <div class="form-group">
            <label for="titulo">Titulo</label>
            <input type="text" class="form-control" name="titulo" id="titulo"
                   placeholder="Titulo del libro" value="{{$libro->libro}}">
        </div>

        <div class="form-group">
            <label for="autor">Autor</label>
            <input type="text" class="form-control" name="autor" id="autor"
                   placeholder="Autor del libro" value="{{$libro->autor}}">
        </div>

        <div class="form-group">
            <label for="editorial">Editorial</label>
            <input type="text" class="form-control" name="editorial" id="editorial"
                   placeholder="Editorial del libro" value="{{$libro->editorial}}">
        </div>

        <div class="form-group">
            <label for="anio">Año</label>
            <input type="number" class="form-control" name="anio" id="anio"
                   placeholder="0000" value="{{$libro->anio}}">
        </div>

        <div class="form-group">
            <label for="cantidad_disponible">Cantidad disponible</label>
            <input type="number" class="form-control" name="cantidad_disponible" id="cantidad_disponible"
                   placeholder="###" value="{{$libro->cantidad_disponible}}">
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>
        <input type="reset" class="btn btn-danger">

    </form>


@endsection
