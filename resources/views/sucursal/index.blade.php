@extends('layouts.sbadmin')

@section('content')

<div class="container-fluid">

    @include('layouts.flashcard')
    
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col mt-1">
                    <h5>Sucursales</h5>            
                </div>
                <div class="text-right">
                    <a href="/sucursal/create" class="btn btn-primary btn-sm btn-icon-split" >
                        <span class="icon text-white-100">
                            <i class="fas fa-plus"></i>
                        </span>                    
                        <span class="text">Nuevo</span>
                    </a>
                </div>
            </div>
        </div>        
        <div class="card-body">
            <div class="row">                
                <div class="table-responsive"  >
                    <table id="usuarios" class="table table-hover table-striped">
                        <thead class="thead-dark">
                            <tr class="th">
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Dirección</th>
                                <th>Distrito</th>
                                <th>Provincia</th>
                                <th>Departamento</th>
                                <th colspan="2">Opciones</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            @foreach ($sucursals as $sucursal)
                            <tr>
                                <td>{{$sucursal->id}}</td>
                                <td>{{$sucursal->nombre}}</td>
                                <td>{{$sucursal->direccion}}</td>
                                <td>{{$sucursal->distrito}}</td>
                                <td>{{$sucursal->provincia}}</td>
                                <td>{{$sucursal->departamento}}</td>
                                <td><a href="/sucursal/{{$sucursal->id}}/edit" class="btn btn-sm btn-warning">Editar</a></td>
                                <td>
                                    <a href="" data-target="#modal-delete-{{$sucursal->id}}" data-toggle="modal"><button class="btn btn-sm btn-danger">Eliminar</button></a>
                                </td>
                                @include('sucursal.modal')
                            </tr>                
                            @endforeach 
                        </tbody>                            
                    </table>
                </div>                
            </div>
        </div>
        <div class="card-footer">
            <div class="row">
                <div class="container">
                    <div class="d-flex justify-content-end">
                        {{ $sucursals->links() }}
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>








@endsection
