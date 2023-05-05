@extends('layouts.plantilla')
@section('titulo', 'Prestamos')

@section('principal')
    <h1> Detalles del prestamo
    <a class="btn btn-warning" href="{{route('editar.prestamo', ['id'=>$prestamo->id])}}">Editar</a>
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
                <th scope="row">Fecha de solicitud</th>
                <td>{{ $prestamo->fecha_solicitud }} </td>
            </tr>
            <tr>
                <th scope="row">Fecha de prestamor</th>
                <td>  {{ $prestamo->fecha_prestamo}}</td>
            </tr>
            <tr>
                <th scope="row">Fecha de devolucion</th>
                <td>{{ $prestamo->fecha_devolucion }}</td>
            </tr>
            <tr>
                <th scope="row">Nombre del libro</th>
                <td>{{ $prestamo->libro_id}}</td>
            </tr>
            <tr>
                <th scope="row">Nombre de usuario</th>
                <td>{{ $prestamo->usuario_id }}</td>
            </tr>

        </tbody>
    </table>

    <a class="btn btn-primary" href="{{route('prestamoindex')}}">Volver</a>

@endsection
