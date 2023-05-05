@extends('layouts.plantilla')
@section('titulo', 'Listado de usuarios')
@section('principal')

    @if(session('mensaje'))
        <div class="alert alert-success">
          {{ session('mensaje') }}
        </div>
    @endif

    <h1>Usuarios <a class="btn btn-primary" href="{{route('usuariocreate')}}">Nuevo</a></h1>

    <table class="table">
        <thead class="table table-dark table-strid">
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Nombre</th>
            <th scope="col">Correo</th>
            <th scope="col">Telefono</th>
            <td scope="col">Ver</td>
            <th scope="col">Editar</th>
            <th scope="col">Eliminar</th>

        </tr>
        </thead>
        <tbody>

        @forelse($usuarios as $usuario)
            <tr>
                <th scope="row">{{ $usuario->id }}</th>
                <td>{{ $usuario->nombre }} </td>
                <td>{{ $usuario->correo }}</td>
                <td>{{ $usuario->telefono }}</td>
                <td><a class="btn btn-info" href="{{ route('verusuario', ['id'=> $usuario->id])}}">Ver</a></td>
                <td><a class="btn btn-warning" href="{{ route('editarusuario', ['id'=> $usuario->id])}}">Editar</a></td>
                <td>
                    <form method="post" action="{{route('usuario.borrar', ['id'=>$usuario->id])}}">
                        @csrf
                        @method('delete')
                        <input type="submit" value="Eliminar" onclick="return confirm('seguro de eliminar')"
                        class="btn btn-danger">
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5">No hay usuarios</td>
            </tr>
        @endforelse

        </tbody>
    </table>

    {{ $usuarios->links() }}

@endsection
