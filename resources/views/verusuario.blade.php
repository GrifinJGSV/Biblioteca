@extends('layouts.plantilla')
@section('titulo', 'Usuario')

@section('principal')
    <h1> Detalles de usuario
    <a class="btn btn-warning" href="{{route('editarusuario', ['id'=>$usuario->id])}}">Editar</a>
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
                <th scope="row">Nombre</th>
                <td>{{ $usuario->nombre }} </td>
            </tr>
            <tr>
                <th scope="row">Correo</th>
                <td>  {{ $usuario->correo }}</td>
            </tr>
            <tr>
                <th scope="row">Telefono</th>
                <td>{{ $usuario->telefono }}</td>
            </tr>
            <tr>
                <th scope="row">Direccion</th>
                <td>{{ $usuario->direccion}}</td>
            </tr>


        </tbody>
    </table>

    <a class="btn btn-primary" href="{{route('usuarioindex')}}">Volver</a>

@endsection
