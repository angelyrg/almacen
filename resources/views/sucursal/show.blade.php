@extends('layouts.sbadmin')

@section('content')

<div class="container-fluid">
    @include('layouts.flashcard')

    <div class="card shadow">
        <div class="card-header d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Sucursal</h6>
            <a href="{{route('sucursales.index')}}" class="btn btn-sm btn-icon-split btn-secondary">
                <span class="icon"><i class="fa fa-times"></i></span>
                <span class="text">Cerrar</span>
            </a>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="table-responsive">
                    <table class="table table-sm table-bordered">
                        <tr>
                            <td><b>Sucursal:</b></td>
                            <td>{{$sucursal->nombre}}</td>
                            <td><b>Dirección: </b></td>
                            <td>{{$sucursal->direccion." - ".$sucursal->distrito}}</td>
                        </tr>
                        
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow">
        <div class="card-header">
            <h6 class="font-weight-bold text-primary">Usuarios en esta sede</h6>
        </div>
        <div class="card-body">


            <div class="row">
                <div class="table-responsive">
                    <table class="table table-sm table-hover table-striped table-bordered">
                        <thead>
                            <tr class="th">                                
                                <th>ID</th>
                                <th>Nombres</th>
                                <th>Apellidos</th>
                                <th>DNI</th>
                                <th>Correo</th>
                                <th>Celular</th>
                                <th>Rol</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($sucursal->users) == 0)
                            <tr>
                                <td colspan="5">
                                    <p>No hay registros</p>                                
                                </td>
                            </tr>
                            @endif
                            @foreach ($sucursal->users as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->nombre}}</td>
                                <td>{{$item->apellido}}</td>
                                <td>{{$item->dni}}</td>
                                <td>{{$item->email}}</td>
                                <td>{{$item->celular}}</td>
                                @if ($item->role == 'admin')
                                    <td>
                                        <span class="badge badge-dark badge-counter">
                                            <i class="fa fa-cogs"></i> Administrador
                                        </span>
                                    </td>
                                    @else
                                        <td>
                                            <span class="badge badge-secondary badge-counter">
                                                <i class="fa fa-user"></i> Almacenero
                                            </span>
                                        </td>
                                                                                
                                    @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

