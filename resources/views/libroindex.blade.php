@extends('layouts.plantilla')
@section('titulo', 'Listado de libros')
@section('principal')

    @if(session('mensaje'))
        <div class="alert alert-success">
          {{ session('mensaje') }}
        </div>
    @endif

    <h1>Libros <a class="btn btn-primary" href="{{route('librocreate')}}">Nuevo</a></h1>
    <div class="container">
        <div class="row">
          <div class="col-xl-12">
            <form action="{{ route('libroindex')}}" method="get">
              <div class="form-row">
                <div class="col-sm-4">
                  <input type="text" class="form-control" name="buscar" value="{{$texto}}">
                </div>
                <div class="col-auto">
                  <br>
                  <input type="submit" class="btn btn-primary" value="Buscar">
                  <a class="btn btn-warning" href="{{ route('libroindex') }}">Volver</a>
                </div>
              </div>
            </form>
          </div>
          <div class="col-xl-12">
          </div>
        </div>
      </div>
    <table class="table">
        <thead class="table table-dark table-strid">
        <tr>
            <th scope="col">id</th>
            <th scope="col">Titulo</th>
            <th scope="col">Autor</th>
            <th scope="col">Editorial</th>
            <td scope="col">Ver</td>
            <th scope="col">Editar</th>
            <th scope="col">Eliminar</th>

        </tr>
        </thead>
        <tbody>

        @forelse($libros as $libro)
            <tr>
                <th scope="row">{{ $libro->id }}</th>
                <td>{{ $libro->titulo }} </td>
                <td>{{ $libro->autor }}</td>
                <td>{{ $libro->editorial }}</td>
                <td><a class="btn btn-info" href="{{ route('libro.show', ['id'=> $libro->id])}}">Ver</a></td>
                <td><a class="btn btn-warning" href="{{ route('editar.libro', ['id'=> $libro->id])}}">Editar</a></td>
                <td>
                    <form method="post" action="{{route('libro.borrar', ['id'=>$libro->id])}}">
                        @csrf
                        @method('delete')
                        <input type="submit" value="Eliminar" onclick="return confirm('seguro de eliminar')"
                        class="btn btn-danger">
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4">No hay libros</td>
            </tr>
        @endforelse

        </tbody>
    </table>

    {{ $libros->links() }}

@endsection
