@extends('layouts.sbadmin')

@section('content')
<div class="">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    ¡Bienvenido a gestión de almacén!

                    <div class="row">

                        

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                <a href="{{route('usuarios.index')}}">Usuarios</a>
                                            </div>
                                            {{-- <div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div> --}}
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-users fa-2x text-success"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                <a href="{{route('sucursales.index')}}">Sucursales</a>
                                            </div>
                                            {{-- <div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div> --}}
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-map fa-2x text-primary"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                <a href="{{route('articulos.index')}}">Artículos</a>
                                            </div>
                                            {{-- <div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div> --}}
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-folder fa-2x text-warning"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                <a href="/entradas">Entradas</a>
                                            </div>
                                            {{-- <div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div> --}}
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-chart-area fa-2x text-primary"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                <a href="/entrada">Salidas</a>
                                            </div>
                                            {{-- <div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div> --}}
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-chart-area fa-2x text-success"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
