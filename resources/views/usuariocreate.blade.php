@extends('layouts.plantilla')

@section('Bliblioteca', 'Formulario de usuario')

@section('principal')

    <h1>Usuario</h1>
    <a class="btn btn-primary" href="{{route('usuarioindex')}}">Volver</a>
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="post" action= " {{ isset($usuario) ?
    route("usuario.update", ["usuario"=> $usuario->id]): route("usuario.guardar") }}" >
        @csrf
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" name="nombre" id="nombre"
                   placeholder="Nombre">
        </div>

        <div class="form-group">
            <label for="correo">Correo</label>
            <input type="email" class="form-control" name="correo" id="correo"
                   placeholder="Correo">
        </div>

        <div class="form-group">
            <label for="telefono">Telefono</label>
            <input type="number" class="form-control" name="telefono" id="telefono"
                   placeholder=" Telefono">
        </div>

        <div class="form-group">
            <label for="direccion">Direccion</label>
            <input type="text" class="form-control" name="direccion" id="direccion"
                   placeholder="Direccion">
        </div>


        <button type="submit" class="btn btn-primary">Guardar</button>
        <input type="reset" class="btn btn-danger">

    </form>


@endsection
