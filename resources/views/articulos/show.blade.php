@extends('layouts.sbadmin')

@section('content')

<div class="container-fluid">
    @include('layouts.flashcard')

    <div class="card shadow mb-3">
        <div class="card-header d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Articulo</h6>
            <a href="{{route('articulos.index')}}" class="btn btn-sm btn-icon-split btn-danger">
                <span class="icon"><i class="fa fa-arrow-left"></i></span>
                <span class="text">Artículos</span>
            </a>
        </div>


        <div class="card-body">
            <div class="row">
                <div class="table-responsive">
                    <table class="table table-sm table-bordered">
                        <tr>
                            <td><b>Artículo:</b></td>
                            <td>{{$articulo->nombre}}</td>
                            <td><b>Código:</b></td>
                            <td>{{$articulo->codigo}}</td>
                        </tr>

                        <tr>
                            <td><b>Descripción: </b></td>
                            <td colspan="3">{{$articulo->descripcion}}</td>
                        </tr>
                        <tr>
                            <td><b>Stock: </b></td>
                            <td >{{$articulo->stock}}</td>
                            <td><b>Registrado por:</b></td>
                            <td>
                                <span class="badge badge-info">
                                    <i class="fa fa-user"></i>
                                    {{$articulo->usuario_registrado->nombre}}
                                </span>
                            </td>
                        </tr>
                        
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="box-header px-3 py-2 with-border d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Historial de entradas</h6>
                    <a class="btn btn-primary btn-sm" data-toggle="collapse" href="#collapseEntradas" role="button" aria-expanded="false" >
                        <i class="fa fa-minus"></i>
                    </a>
                </div>

                <div class="card-body collapse show" id="collapseEntradas">
                    <div class="row">
                        <div class="table-responsive">
                            <table class="table table-sm table-hover table-striped table-bordered">
                                <thead>
                                    <tr class="th thead-dark">                                
                                        <th>ID</th>
                                        <th>Fecha</th>
                                        <th>Cantidad</th>
                                        <th>Encargado</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($articulo->entrada_detalles) == 0)
                                    <tr>
                                        <td colspan="4">
                                            <p>No hay registros</p>                                
                                        </td>
                                    </tr>
                                    @endif
                                    @foreach ($articulo->entrada_detalles as $item)
                                    <tr>
                                        <td>{{$item->id}}</td>
        
                                        <td>{{date('d/m/Y', strtotime($item->created_at))." ".date('g:i:s a', strtotime($item->created_at))}}</td>
            
                                        <td>+ {{$item->cantidad}}</td>
                                        <td>
                                            <a href="{{route('entradas.show', $item->entrada->id)}}" > {{$item->entrada->nombre}}</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-md-6">
            <div class="card shadow ">
                <div class="box-header px-3 py-2 with-border d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Historial de salidas</h6>
                    <a class="btn btn-primary btn-sm" data-toggle="collapse" href="#collapseSalidas" role="button" aria-expanded="false" >
                        <i class="fa fa-minus"></i>
                    </a>
                </div>

                <div class="card-body collapse show" id="collapseSalidas">
                    <div class="row">
                        <div class="table-responsive">
                            <table class="table table-sm table-hover table-striped table-bordered">
                                <thead>
                                    <tr class="th thead-dark">                                
                                        <th>ID</th>
                                        <th>Fecha</th>
                                        <th>Cantidad</th>
                                        <th>Encargado</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($articulo->salida_detalles) == 0)
                                    <tr>
                                        <td colspan="4">
                                            <p>No hay registros</p>                                
                                        </td>
                                    </tr>
                                    @endif
                                    @foreach ($articulo->salida_detalles as $item)
                                    <tr>
                                        <td>{{$item->id}}</td>
        
                                        <td>{{date('d/m/Y', strtotime($item->created_at))." ".date('g:i:s a', strtotime($item->created_at))}}</td>
            
                                        <td>- {{$item->cantidad}}</td>
                                        <td>
                                            <a href="{{route('salidas.show', $item->salida->id)}}" > {{$item->salida->nombre}}</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')
<script>
    $('.box-header').click(function() {
        $(this).find('i').toggleClass('fas fa-plus fas fa-minus');
    });
</script>
    
@endsection
