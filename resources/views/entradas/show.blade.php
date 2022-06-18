@extends('layouts.sbadmin')

@section('content')

<div class="row">
    <div class="col">
        <a href="/home">Home</a>
    </div>
</div>

<div class="row">
    <div class="col">
        <h5>Detalle de la entrada</h5>
    </div>
</div>


<div class="row">
    <div class="col">
        <table class="table table-hover table-striped">
            <tr class="th text-center">
                <th>ID</th>
                <th colspan="2">Encargado</th>
                <th>Fecha</th>
                <th colspan="3">Opciones</th>
            </tr>
            @foreach ($entradas as $entrada)
            <tr>
                <td>{{$entrada->id}}</td>
                <td>{{$entrada->nombre_encargado}}</td>
                <td>{{$entrada->apellido_encargado}}</td>
                <td>{{$entrada->created_at}}</td>

                <td><a href="/entradas/{{$entrada->id}}" class="btn btn-sm btn-primary">Ver</a></td>
                <td><a href="/entradas/{{$entrada->id}}/edit" class="btn btn-sm btn-warning">Editar</a></td>
                {{-- <td><a href="" onclick="$('#confirmDelete').modal('show');" class="btn btn-sm btn-danger">Eliminar</a></td> --}}
                <td><a href="/entradas/{{$entrada->id}}/confirmDelete" class="btn btn-sm btn-danger">Eliminar</a></td>
            </tr>
                
            @endforeach
            
        </table>
    </div>
</div>




@endsection