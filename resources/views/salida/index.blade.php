@extends('layouts.base')

@section('content')

<div class="row">
    <div class="col">
        <a href="../">Home</a>
    </div>
</div>

<div class="row">
    <div class="col">
        <h5>SALIDAS</h5>
    </div>
</div>

<div class="row">
    <div class="col">
        <a href="salida/create" class="btn btn-primary">Nuevo</a>
    </div>
</div>


<div class="row">
    <div class="col">
        <table class="table table-hover table-striped">
            <tr class="th">
                <th>ID</th>
                <th>Bien</th>
                <th>Motivo</th>
                <th>Cantidad</th>
                <th colspan="2">Encargado</th>
                <th colspan="2">Opciones</th>
            </tr>
            
            @foreach ($salidas as $salida)
            <tr>
                <td>{{$salida->id}}</td>
                <td>{{$salida->bien_id}}</td>
                <td>{{$salida->motivo}}</td>
                <td>{{$salida->cantidad}}</td>
                <td>{{$salida->nombre_encargado}}</td>
                <td>{{$salida->apellido_encargado}}</td>
                <td><a href="salida/{{$salida->id}}/edit" class="btn btn-sm btn-warning">Editar</a></td>
                {{-- <td><a href="" onclick="$('#confirmDelete').modal('show');" class="btn btn-sm btn-danger">Eliminar</a></td> --}}
                <td><a href="salida/{{$salida->id}}/confirmDelete" class="btn btn-sm btn-danger">Eliminar</a></td>
            </tr>                
            @endforeach

            @if ($salidas->all() == null)
            <tr class="text-center">
                <th colspan="8"><p>No hay registros</p></th>
            </tr>
            @endif
            
        </table>
    </div>
</div>


@endsection