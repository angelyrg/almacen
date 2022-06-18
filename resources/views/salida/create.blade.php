@extends('layouts.base')

@section('content')

<div class="row">
    <div class="col">
        <a href="../salida" class="btn btn-secondary">Volver</a>
    </div>
</div>

<div class="row">
    <div class="col">
        <h5 class="text-center">Registrar una nueva salida</h5>
    </div>
</div>


<div class="row">
    <div class="col col-md-6 offset-md-3">
        <form action="../salida" method="POST" class="form">
            @csrf
            
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li><i>{{$error}}</i></li>
                        @endforeach
                    </ul>
                </div>            
            @endif
            
            <div class="form-group">
                <label for="bien_id">Bien:</label>
                <input type="number" name="bien_id" id="bien_id" value="{{ old('bien_id') }}" placeholder="id" class="form-control">
            </div>

            <div class="form-group">
                <label for="motivo">Motivo:</label>
                <input type="text" name="motivo" id="motivo" value="{{ old('motivo') }}" placeholder="Motivo" class="form-control">
            </div>

            <div class="form-group">
                <label for="cantidad">Cantidad:</label>
                <input type="number" name="cantidad" id="cantidad" value="{{ old('cantidad') }}" placeholder="Cantidad" class="form-control">
            </div>

            <div class="form-group">
                <label for="nombre_encargado">Nombres:</label>
                <input type="text" name="nombre_encargado" id="nombre_encargado" value="{{ old('nombre_encargado') }}" placeholder="Nombre del encargado" class="form-control">
            </div>

            <div class="form-group">
                <label for="apellido_encargado">Apellidos:</label>
                <input type="text" name="apellido_encargado" id="apellido_encargado" value="{{ old('apellido_encargado') }}" placeholder="Apellido del encargado" class="form-control">
            </div>

            <div class="form-group text-center">
                <a href="../salida" class="btn btn-secondary">Cancelar</a>
                <input type="submit" class="btn btn-success" value="Guardar">
            </div>

        </form>
    </div>
</div>
    
@endsection