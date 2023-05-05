@extends('layouts.plantilla')

@section('Bliblioteca', 'Formulario de prestamo')

@section('principal')

    <h1>Prestamo</h1>
    <a class="btn btn-primary" href="{{route('prestamoindex')}}">Volver</a>
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="post" action= " {{ isset($prestamo) ?
    route("prestamo.update", ["prestamo"=> $prestamo->id]): route("prestamo.guardar") }}" >
        @csrf
        <div class="form-group">
            <label for="fecha_solicitud">Fecha de solicitud</label>
            <input type="date" class="form-control" name="fecha_solicitud" id="fecha_solicitud"
                   placeholder="Fecha de solicitud">
        </div>

        <div class="form-group">
            <label for="fecha_prestamo">Fecha de prestamo</label>
            <input type="date" class="form-control" name="fecha_prestamo" id="fecha_prestamo"
                   placeholder="Fecha de prestamo">
        </div>
        <div class="form-group">
            <label for="fecha_devolucion">Fecha de devolucion</label>
            <input type="date" class="form-control" name="fecha_devolucion" id="fecha_devolucion"
                   placeholder="Fecha de devolucion">
        </div>

        <div class="form-group">
            <select class="form-select" aria-label="Default select example"  name="libro_id[]">
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

            <br>

        <button type="submit" class="btn btn-primary">Guardar</button>
        <input type="reset" class="btn btn-danger">

    </form>


@endsection
