@extends('layouts.sbadmin')

@section('content')

<div class="card shadow mb-4 col-md-6 offset-md-3">

    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Cambiar contraseña</h6>
    </div>

    <form action="" method="post" class="form-horizontal">

        <div class="card-body">

            <div class="form-group row">
                <div class="col-4">
                    <label for="">Contraseña actual</label>
                </div>
                <div class="col-8">
                    <input type="password" name="password_old" class="form-control">
                </div>
            </div>

            <div class="form-group row">
                <div class="col-4">
                    <label for="">Contraseña nueva</label>
                </div>
                <div class="col-8">
                    <input type="password" name="password_old" class="form-control">
                </div>
            </div>

            <div class="form-group row">
                <div class="col-4">
                    <label for="">CRepetir contraseña</label>
                </div>
                <div class="col-8">
                    <input type="password" name="password_old" class="form-control">
                </div>
            </div>
            
            
        </div>
        <div class="card-footer">
            <a href="" class="btn btn-secondary"><i class="fa fa-icon-remove"></i> Cancelar</a>
            <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Cambiar contraseña</button>
        </div>

    </form>

</div>

@endsection