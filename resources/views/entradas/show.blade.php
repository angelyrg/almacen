@extends('layouts.sbadmin')

@section('content')

<div class="container-fluid">

    <div class="card shadow">
        <div class="card-header d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Información de la entrada</h6>
            <a href="{{route('entradas.index')}}" class="btn btn-sm btn-icon-split btn-secondary">
                <span class="icon"><i class="fa fa-times"></i></span>
                <span class="text">Cerrar</span>
            </a>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="table-responsive">
                    <table class="table table-sm table-bordered">
                        <tr>
                            <td><b>Encargado:</b></td>
                            <td>{{$entrada->nombre." ".$entrada->apellido}}</td>
                            <td><b>Fecha: </b></td>
                            <td>{{ date("d/m/Y", strtotime($entrada->created_at)) }}</td>
                        </tr>
                        <tr>
                            <td><b>DNI: </b></td>
                            <td>{{$entrada->dni}}</td>
                            <td><b>Hora: </b></td>
                            <td>{{ date("g:i:s a", strtotime($entrada->created_at)) }}</td>
                        </tr>
                    </table>
                    
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow">
        <div class="card-header">
            <h6 class="m-0 font-weight-bold text-primary">Articulos ingresados</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="table-responsive">
                    <table class="table table-sm table-hover table-striped">
                        <thead>
                            <tr class="th">                                
                                <th>#</th>
                                <th>Articulo</th>
                                <th>Cantidad</th>
                                <th colspan="2">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $contador=1; ?>
                            @foreach ($entrada->entrada_detalles as $item)
                            <tr>
                                <td>{{$contador++}}</td>
                                <td>{{$item->articulo->nombre}}</td>
                                <td>{{$item->cantidad}}</td>
                                <td class="text-center">
                                    <a class="btn btn-sm btn-warning"><i class="fa fa-pen"></i></a>
                                </td>
                                <td class="text-center">
                                    <a class="btn btn-sm btn-danger"><i class="fa fa-minus"></i></a>
                                </td>
    
                            </tr>             
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="3"></td>
                                
                                <td colspan="2" class="text-center">
                                    <a class="btn btn-sm btn-primary"><i class="fa fa-plus"></i></a>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                    
                </div>
                        
            </div>
        </div>

    </div>
       
        
   
    
</div>





@endsection