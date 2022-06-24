@extends('layouts.sbadmin')

@section('css')
    <link rel="stylesheet" href="{{asset('vendor/jquery-ui/jquery-ui.min.css')}}">    
@endsection

@section('content')

<div class="container-fluid">

    @include('layouts.flashcard')


    <div class="card shadow">
        <div class="card-header d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Información de la salida</h6>
            <a href="{{route('salidas.index')}}" class="btn btn-sm btn-icon-split btn-secondary">
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
                            <td>{{$salida->nombre." ".$salida->apellido}}</td>
                            <td><b>Fecha: </b></td>
                            <td>{{ date("d/m/Y", strtotime($salida->created_at)) }}</td>
                        </tr>
                        <tr>
                            <td><b>DNI: </b></td>
                            <td>{{$salida->dni}}</td>
                            <td><b>Hora: </b></td>
                            <td>{{ date("g:i:s a", strtotime($salida->created_at)) }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow">
        <div class="card-header">
            <h6 class="font-weight-bold text-primary">Articulos ingresados</h6>
        </div>
        <div class="card-body">
            <form action="{{route('salidadetalle.store')}}" method="post" class="form form-inline mb-2 col-md-6">
                @csrf
                <input type="hidden" name="salida" value="{{$salida->id}}">
                <div class="form-group ">
                    <select name="articulo" id="" class="form-control col-md-12 form-control-sm {{ $errors->has('articulo') ? ' is-invalid' : '' }}" >
                        <option value="">-- Selecciona Artículo---</option>
                        @foreach ($articulos as $articulo)
                            <option value="{{$articulo->id}}">{{$articulo->codigo." ".$articulo->nombre}}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('articulo'))
                        <span class="invalid-feedback" role="alert" >
                            <strong>{{$errors->first('articulo')}}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group  ">
                    <input type="number" class="form-control form-control-sm  {{ $errors->has('cantidad_add') ? ' is-invalid' : '' }}" id="cantidad_add" name="cantidad_add" placeholder="Cantidad que retira" autocomplete="off">
                    @if ($errors->has('cantidad_add'))
                        <span class="invalid-feedback" role="alert" >
                            <strong>{{$errors->first('cantidad_add')}}</strong>
                        </span>
                    @endif
                </div>

                <button class="btn btn-sm btn-icon-split btn-primary " type="submit" >
                    <span class="icon"><i class="fa fa-plus"></i></span>
                    <span class="text"> Registrar salida</span>
                </button>
            </form>

            <div class="row">
                <div class="table-responsive">
                    <table class="table table-sm table-hover table-striped table-bordered">
                        <thead>
                            <tr class="th">                                
                                <th>#</th>
                                <th>Código</th>
                                <th>Articulo</th>
                                <th>Cantidad</th>
                                <th colspan="2">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($salida->salida_detalles) == 0)
                            <tr>
                                <td colspan="5">
                                    <p>No hay registros</p>                                
                                </td>
                            </tr>
                            @endif
                            <?php $contador=1; ?>
                            @foreach ($salida->salida_detalles->reverse() as $item)
                            <tr>
                                <td>{{$contador++}}</td>
                                <td>{{$item->articulo->codigo}}</td>
                                <td>{{$item->articulo->nombre}}</td>
                                <td>{{$item->cantidad}}</td>
                                <td >
                                    <a data-target="#modal-edit-{{$item->id}}" data-toggle="modal"><button class="btn btn-sm btn-warning"><i class="fas fa-pen"></i></button></a>
                                </td>
                                <td>
                                    <form class="form-inline" action="{{route('salidadetalle.destroy', $item->id)}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-times"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @include('salidas.modal_edit_articulo')
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

