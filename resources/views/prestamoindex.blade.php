@extends('layouts.plantilla')
@section('titulo', 'Listado de los prestamos')
@section('principal')

    @if(session('mensaje'))
        <div class="alert alert-success">
          {{ session('mensaje') }}
        </div>
    @endif

    <h1>Prestamos <a class="btn btn-primary" href="{{route('prestamocreate')}}">Nuevo</a></h1>

    <table class="table">
        <thead class="table table-dark table-strid">
        <tr>
            <th scope="col">id</th>
            <th scope="col">Fecha de prestamo</th>
            <th scope="col">Fecha de devolucion</th>
            <th scope="col">Id del libro</th>
            <th scope="col">Id del usuario</th>
            <td scope="col">Ver</td>
            <th scope="col">Editar</th>
            <th scope="col">Eliminar</th>

        </tr>
        </thead>
        <tbody>

        @forelse($prestamos as $prestamo)
            <tr>
                <th scope="row">{{ $prestamo->id }}</th>
                <td>{{ $prestamo->fecha_prestamo }} </td>
                <td>{{ $prestamo->fecha_devolucion }}</td>
                <td>{{ $prestamo->libro->titulo }}</td>
                <td>{{ $prestamo->usuario->nombre }}</td>
                <td><a class="btn btn-info" href="{{ route('verprestamo', ['id'=> $prestamo->id])}}">Ver</a></td>
                <td><a class="btn btn-warning" href="{{ route('editar.prestamo', ['id'=> $prestamo->id])}}">Editar</a></td>
                <td>
                    <form method="post" action="{{route('prestamo.borrar', ['id'=>$prestamo->id])}}">
                        @csrf
                        @method('delete')
                        <input type="submit" value="Eliminar" class="btn btn-danger">
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4">No hay prestamos</td>
            </tr>
        @endforelse

        </tbody>
    </table>

   {{-- {{$prestamos->links()}} --}}

@endsection
