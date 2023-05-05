@extends('layouts.plantilla')

@section('Bliblioteca', 'Formulario de usuario')

@section('principal')

    <h1>Editar usuario</h1>

    <a class="btn btn-primary" href="{{route('usuarioindex')}}">Volver</a>

    <form method="post" action="{{route('usuario.update', ['id'=>$usuario->id])}}">
        @method('put')
        @csrf
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" name="nombre" id="nombre"
                   placeholder="Nombre de usuario" value="{{$usuario->usuario}}">
        </div>

        <div class="form-group">
            <label for="correo">Correo</label>
            <input type="email" class="form-control" name="correo" id="correo"
                   placeholder="Correo" value="{{$usuario->correo}}">
        </div>

        <div class="form-group">
            <label for="telefono">Telefono</label>
            <input type="number" class="form-control" name="telefono" id="telefono"
                   placeholder="Editar Telefono" value="{{$usuario->telefono}}">
        </div>

        <div class="form-group">
            <label for="direccion">Direccion</label>
            <input type="text" class="form-control" name="direccion" id="direccion"
                   placeholder="Editar direccion" value="{{$usuario->Direccion}}">
        </div>


        <button type="submit" class="btn btn-primary">Guardar</button>
        <input type="reset" class="btn btn-danger">

    </form>


@endsection
