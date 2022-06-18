@extends('layouts.base')

@section('content')

<div class="row">
    <div class="col">
        <a href="../" class="btn btn-secondary">Volver</a>
    </div>
</div>


<div class="row">
    <div class="col col-md-6 offset-md-3">
        <form action="../{{$salida->id}}" method="POST" class="form">
            @csrf
            @method('put')
            
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>            
            @endif
            
            <div class="form-group">
                <label for="bien_id">Bien:</label>
                <input type="number" name="bien_id" id="bien_id" value="@if(!old('bien_id')){{$salida->bien_id}}@else{{old('bien_id')}}@endif" placeholder="id" class="form-control">
            </div>

            <div class="form-group">
                <label for="motivo">Motivo:</label>
                <input type="text" name="motivo" id="motivo" value="@if(!old('motivo')){{$salida->motivo}}@else{{old('motivo')}}@endif" placeholder="Motivo" class="form-control">
            </div>

            <div class="form-group">
                <label for="cantidad">Cantidad:</label>
                <input type="number" name="cantidad" id="cantidad" value="@if(!old('cantidad')){{$salida->cantidad}}@else{{old('cantidad')}}@endif" placeholder="Cantidad" class="form-control">
            </div>

            <div class="form-group">
                <label for="nombre_encargado">Nombres:</label>
                <input type="text" name="nombre_encargado" id="nombre_encargado" value="@if(!old('nombre_encargado')){{$salida->nombre_encargado}}@else{{old('nombre_encargado')}}@endif" placeholder="Nombre del encargado" class="form-control">
            </div>

            <div class="form-group">
                <label for="apellido_encargado">Apellidos:</label>
                <input type="text" name="apellido_encargado" id="apellido_encargado" value="@if(!old('apellido_encargado')){{$salida->apellido_encargado}}@else{{old('apellido_encargado')}}@endif" placeholder="Apellido del encargado" class="form-control">
            </div>

            <div class="form-group text-center">
                <a href="../salida" class="btn btn-secondary">Cancelar</a>
                <input type="submit" class="btn btn-success" value="Guardar">
            </div>


            
        </form>
    </div>
</div>
    
@endsection