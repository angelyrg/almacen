@extends('layouts.sbadmin')

@section('content')

<div class="card shadow mb-4 col-md-6 offset-md-3">

    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Mi perfil</h6>
    </div>

    <form  method="post" class="form-horizontal">

        <div class="card-body">

            <div class="form-group row ">
                <div class="col-md-4 offset-md-4">
                    <img class="img-profile rounded-circle "  src="{{asset('sbadmin/img/undraw_profile.svg')}}">
                </div>
            </div>
            {{-- <div class="row form-group col-md-6 offset-md-6">
                <a href="" class="btn btn-sm btn-secondary "><i class="fa fa-camera"></i> Cambiar foto</a>
            </div> --}}

            <div class="form-group row">
                <div class="col-6 text-right">
                    <label> <b>Nombres:</b> </label>
                </div>
                <div class="col-6">
                    <p>{{$misdatos->nombre}}</p>
                </div>

                <div class="col-6 text-right">
                    <label> <b>Apellidos:</b> </label>
                </div>
                <div class="col-6">
                    <p>{{$misdatos->apellido}}</p>
                </div>

                <div class="col-6 text-right">
                    <label> <b>DNI:</b> </label>
                </div>
                <div class="col-6">
                    <p>{{$misdatos->dni}}</p>
                </div>

                <div class="col-6 text-right">
                    <label> <b>Correo electrónico:</b> </label>
                </div>
                <div class="col-6">
                    <p>{{$misdatos->email}}</p>
                </div>

                <div class="col-6 text-right">
                    <label> <b>Celular:</b> </label>
                </div>
                <div class="col-6">
                    <p>{{$misdatos->celular}}</p>
                </div>

                <div class="col-6 text-right">
                    <label> <b>Rol de usuario:</b> </label>
                </div>
                <div class="col-6">
                    @if ($misdatos->role == "admin")
                        <p>Administrador</p>
                    @else
                        <p>Almacenero</p>
                    @endif
                </div>

                <div class="col-6 text-right">
                    <label> <b>Sede:</b> </label>
                </div>
                <div class="col-6">
                    <p>{{$misdatos->sucursal->nombre}}</p>
                </div>
            </div>

        </div>
        <div class="card-footer text-right">
            <a href=" {{route('home')}} " class="btn btn-secondary"><i class="fa fa-times"></i> Salir</a>

            <a type="" class="btn btn-success"><i class="fa fa-pen"></i> Editar mis datos</a>
        </div>

    </form>

</div>

@endsection