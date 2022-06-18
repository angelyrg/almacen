@extends('layouts.sbadmin')

@section('content')

<div class="container-fluid">

    @if ($message = Session::get('msg'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>	
            <strong>{{ $message }}</strong>
        </div>
    @endif

    @include('articulos.flashcard')

    <div class="row">
        <div class="col">
            <h5>Artículos</h5>
        </div>
        <div class="text-right">
            <a href="{{route('articulos.create')}}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Nuevo</a>
        </div>
    </div>

    <div class="row">
        <div class="col">
            {{-- <div class="row mt-2">
                <div class="input-group mb-3 input-group-sm col-4">
                    <input type="text" name="daterange" id="daterange" value="08/04/2021 - 08/05/2021" class="form-control" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-success">Generar reporte</button>
                    </div>
                </div>
    
                <div class="input-group mb-3 input-group-sm col-md-4 offset-md-4 text-right">
                    <input type="text" name="daterange" id="daterange"  class="form-control" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-success"> Buscar</button>
                    </div>
                </div>
            </div> --}}

            <div class="table-responsive">
                <table class="table table-hover table-striped">
                    <thead class="thead-dark">
                        <tr class="th text-center">
                            <th>ID</th>
                            <th>Código</th>
                            {{-- <th>Imagen</th> --}}
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Stock</th>
                            <th>Unid. medida</th>
                            <th>Estado</th>
                            <th>Agregado por</th>
                            <th colspan="2">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($articulos as $articulo)
                            <tr>
                                <td>{{$articulo->id}}</td>
                                <td>{{$articulo->codigo}}</td>
                                <td>{{$articulo->nombre}}</td>
                                <td>
                                    {{
                                        rtrim(mb_strimwidth($articulo->descripcion, 0, 40, '', 'UTF-8'))."..."
                                    }}
                                </td>
                                
                                <td>{{ $articulo->stock }}</td>
                                <td>{{ $articulo->unidad_medida->nombre }}</td>
                                <td>{{ $articulo->estado_articulo->nombre }}</td>
                                <td>{{ $articulo->usuario_registrado->nombre }}</td>
                                <td><a href="{{route('articulos.edit', $articulo->id )}}" class="btn btn-sm btn-warning">Editar</a></td>
                                <td>
                                    <a data-target="#modal-delete-{{$articulo->id}}" data-toggle="modal"><button class="btn btn-sm btn-danger">Eliminar</button></a>
                                </td>
                                @include('articulos.modal')
                            </tr>
                        @endforeach
                    </tbody>
                    
                </table>
                <div class="container">
                    <div class="d-flex justify-content-end">
                        {{ $articulos->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




@endsection