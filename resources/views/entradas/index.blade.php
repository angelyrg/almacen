@extends('layouts.sbadmin')

@section('content')

<div class="container-fluid">

    @include('layouts.flashcard')

    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col">
                    <h5>Entradas</h5>
                </div>
                <div class="text-right">
                    <a href="/entradas/create" class="btn btn-sm btn-primary"> <i class="fa fa-plus"></i> Nuevo</a>
                </div>
            </div>    
        </div>
        <div class="card-body">            
            <div class="row">
                <div class="table-responsive">
                    <table class="table table-hover table-striped">
                        <tr class="th">
                            <th>ID</th>
                            <th>Fecha</th>
                            <th>Hora</th>
                            <th>Encargado</th>
                            <th>DNI</th>
                            <td></td>
                            <th colspan="3">Opciones</th>
                        </tr>
                        @foreach ($entradas as $entrada)
                        <tr>
                            
                            <td>{{$entrada->id}}</td>
                            <td>{{date('d/m/Y', strtotime($entrada->created_at))}}</td>
                            <td>{{date('g:i:s a', strtotime($entrada->created_at))}}</td>
                            <td>{{$entrada->nombre." ".$entrada->apellido}}</td>
                            <td>{{$entrada->dni}}</td>
                            <td>
                                <span class="badge badge-success badge-counter">
                                    <i class="fa fa-clock"></i> {{$entrada->created_at->diffForHumans()}}
                                </span>
                            </td>
            
                            <td><a href="{{route('entradas.show', $entrada->id)}}" class="btn btn-sm btn-primary"><i class="fa fa-file"></i> Ver detalles</a></td>
                            <td><a href="{{route('entradas.edit', $entrada->id)}}" class="btn btn-sm btn-warning">Editar</a></td>
                            <td>
                                <a href="" data-target="#modal-delete-{{$entrada->id}}" data-toggle="modal"><button class="btn btn-sm btn-danger">Eliminar</button></a>
                            </td>
                            @include('entradas.modal')

                        </tr>
                            
                        @endforeach
                        
                    </table>

                    <div class="container">
                        <div class="d-flex justify-content-end">
                            {{ $entradas->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    

</div>





@endsection