@extends('layouts.sbadmin')

@section('content')



<div class="row">
    <div class="col">
        <h5 class="text-center">Sucursal: {{$sucursal->nombre}}</h5>
    </div>
</div>


<div class="row">
    <div class="col col-md-6 offset-md-3">
        <form action="/sucursal/{{$sucursal->id}}" method="POST" class="form">
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
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" id="nombre" value="@if(!old('nombre')){{$sucursal->nombre}}@else{{old('nombre')}}@endif" placeholder="Nombre de la sucursal" class="form-control">
            </div>
            <div class="form-group">
                <label for="direccion">Dirección:</label>
                <input type="text" name="direccion" id="direccion" value="@if(!old('direccion')){{$sucursal->direccion}}@else{{old('direccion')}}@endif" placeholder="Dirección de la sucursal" class="form-control">
            </div>
            <div class="form-group">
                <label for="distrito">Distrito:</label>
                <input type="text" name="distrito" id="distrito" value="@if(!old('distrito')){{$sucursal->distrito}}@else{{old('distrito')}}@endif" placeholder="Distrito" class="form-control">
            </div>
            <div class="form-group">
                <label for="provincia">Provincia:</label>
                <input type="text" name="provincia" id="provincia" value="@if(!old('provincia')){{$sucursal->provincia}}@else{{old('provincia')}}@endif" placeholder="Provincia" class="form-control">
            </div>
            <div class="form-group">
                <label for="nombre">Departamento:</label>
                <input type="text" name="departamento" id="departamento" value="@if(!old('departamento')){{$sucursal->departamento}}@else {{old('departamento')}}@endif" placeholder="Departamento" class="form-control">
            </div>

            <div class="form-group text-center">
                <input type="submit" class="btn btn-success" value="Guardar">
                <a href="/sucursal" class="btn btn-secondary">Cancelar</a>
            </div>

            
        </form>
    </div>
</div>
    
@endsection