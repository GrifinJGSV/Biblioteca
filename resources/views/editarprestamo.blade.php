@extends('layouts.plantilla')

@section('Bliblioteca', 'Formulario de prestamo')

@section('principal')

    <h1>Editar prestamo</h1>

    <a class="btn btn-primary" href="{{route('prestamoindex')}}">Volver</a>

    <form method="post" action="{{route('prestamo.update', ['id'=>$prestamo->id])}}">
        @method('put')
        @csrf
        <div class="form-group">
            <label for="fecha_solicitud">Fecha de solicitud</label>
            <input type="date" class="form-control" name="fecha_solicitud" id="fecha_solicitud"
                   placeholder="Fecha solicitud" value="{{$prestamo->fecha_solicitud}}">
        </div>

        <div class="form-group">
            <label for="fecha_prestamo">Fecha de prestamo</label>
            <input type="date" class="form-control" name="fecha_prestamo" id="fecha_prestamo"
                   placeholder="Autor del libro" value="{{$prestamo->fecha_prestamo}}">
        </div>

        <div class="form-group">
            <label for="fecha_devolucion">Editorial</label>
            <input type="date" class="form-control" name="fecha_devolucion" id="fecha_devolucion"
                   placeholder="Fecha_devolucion" value="{{$prestamo->fecha_devolucion}}">
        </div>

        <div class="form-group">
            <select class="form-select" aria-label="Default select example" multiple=""  name="libro_id">
                <option disabled selected>Selecione los libro:</option>
                @foreach ($libros as $libro)
                    <option value="{{ $libro->id }}">
                        {{ "{$libro->titulo}" }}
                    </option>
                @endforeach
            </select>

            <div class="form-group">
                <select class="form-select" aria-label="Default select example" name="usuario_id">
                    <option disabled selected>Selecione el id del usuario:</option>
                    @foreach ($usuarios as $usuario)
                        <option value="{{ $usuario->id }}">
                            {{ "{$usuario->nombre}" }}
                        </option>
                    @endforeach
                </select>
            </div>

        <button type="submit" class="btn btn-primary">Guardar</button>
        <input type="reset" class="btn btn-danger">

    </form>


@endsection
