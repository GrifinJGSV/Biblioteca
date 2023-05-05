@extends('layouts.plantilla')
@section('titulo', 'Libro')

@section('principal')
    <h1> Detalles del libro
    <a class="btn btn-warning" href="{{route('editar.libro', ['id'=>$libro->id])}}">Editar</a>
    </h1>

    <table class="table">
        <thead class="thead-light">
        <tr>
            <th scope="col">Campos</th>
            <th scope="col">Valores</th>
        </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">Titulo</th>
                <td>{{ $libro->titulo }} </td>
            </tr>
            <tr>
                <th scope="row">Autor</th>
                <td>  {{ $libro->autor }}</td>
            </tr>
            <tr>
                <th scope="row">Editorial</th>
                <td>{{ $libro->editorial }}</td>
            </tr>
            <tr>
                <th scope="row">Año</th>
                <td>{{ $libro->anio}}</td>
            </tr>
            <tr>
                <th scope="row">Cantidad disponible</th>
                <td>{{ $libro->cantidad_disponible }}</td>
            </tr>

        </tbody>
    </table>

    <a class="btn btn-primary" href="{{route('libroindex')}}">Volver</a>

@endsection
