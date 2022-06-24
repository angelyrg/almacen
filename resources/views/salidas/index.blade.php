@extends('layouts.sbadmin')

@section('content')

<div class="container-fluid">

    @include('layouts.flashcard')

    <div class="card shadow">
        <div class="card-header">
            <div class="row  d-flex flex-row align-items-center justify-content-between">
                <div class="col">
                    <h5>Salidas</h5>
                </div>
                <div class="col">
                    <form class="d-flex" role="search" action="{{route('salidas.index')}}">
                        <input class="form-control" type="search" name="buscarpor" value="{{$buscarpor}}" placeholder="Buscar encargado o DNI" aria-label="Buscar" autocomplete="off">
    
                        <button class="btn btn-success" type="submit">
                            <div class="text">Buscar</div>
                        </button>
                    </form>
                </div>

                <div class="text-right">
                    <a href="{{route('salidas.create')}}" class="btn  btn-primary"> <i class="fa fa-plus"></i> Nueva salida</a>
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
                        @foreach ($salidas as $salida)
                        <tr>
                            
                            <td>{{$salida->id}}</td>
                            <td>{{date('d/m/Y', strtotime($salida->created_at))}}</td>
                            <td>{{date('g:i:s a', strtotime($salida->created_at))}}</td>
                            <td>{{$salida->nombre." ".$salida->apellido}}</td>
                            <td>{{$salida->dni}}</td>
                            <td>
                                <span class="badge badge-success badge-counter">
                                    <i class="fa fa-clock"></i> {{$salida->created_at->diffForHumans()}}
                                </span>
                            </td>
            
                            <td><a href="{{route('salidas.show', $salida->id)}}" class="btn btn-sm btn-primary"><i class="fa fa-file"></i> Ver detalles</a></td>
                            <td><a href="{{route('salidas.edit', $salida->id)}}" class="btn btn-sm btn-warning">Editar</a></td>
                            <td>
                                <a href="" data-target="#modal-delete-{{$salida->id}}" data-toggle="modal"><button class="btn btn-sm btn-danger">Eliminar</button></a>
                            </td>
                            @include('salidas.modal')

                        </tr>
                            
                        @endforeach
                        
                    </table>

                    <div class="container">
                        <div class="d-flex justify-content-end">
                            {{ $salidas->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    

</div>





@endsection