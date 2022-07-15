@extends('layouts.sbadmin')

@section('content')


<div class="col-md-6 offset-md-3">

    <div class="card shadow mb-0">
    
        <div class="card-header  ">
            <h6 class="m-0 font-weight-bold text-primary">Cambiar contraseña</h6>
        </div>

        <div class="col">
            @include('layouts.flashcard')
        </div>
    
        <form action="{{route('password_update')}}" method="post" class="form-horizontal">
            @csrf
            @method('put')
    
            <div class="card-body">
    
                <div class="form-group row">
                    <div class="col-4">
                        <label for="">Contraseña actual</label>
                    </div>
                    <div class="col-8">
                        <input type="password" name="password_old" value="{{ old('password_old') }}" class="form-control {{$errors->has('password_old') ? 'is-invalid' : ''}}" >
                        @if ($errors->has('password_old'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password_old') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
    
                <div class="form-group row">
                    <div class="col-4">
                        <label for="">Contraseña nueva</label>
                    </div>
                    <div class="col-8">
                        <input type="password" name="password_new" value="{{ old('password_new') }}" class="form-control {{$errors->has('password_new') ? 'is-invalid' : ''}}" >
                        @if ($errors->has('password_new'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password_new') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
    
                <div class="form-group row">
                    <div class="col-4">
                        <label for="">Confirmar contraseña</label>
                    </div>
                    <div class="col-8">
                        <input type="password" name="password_new_confirmation" value="{{ old('password_new_confirmation') }}" class="form-control {{$errors->has('password_new_confirmation') ? 'is-invalid' : ''}}" >
                        @if ($errors->has('password_new_confirmation'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password_new_confirmation') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                
                
            </div>
            <div class="card-footer">
                <a href=" {{route('home')}} " class="btn btn-secondary"><i class="fa fa-times"></i> Salir</a>
                <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Cambiar contraseña</button>
            </div>
    
        </form>
    
    </div>
</div>


@endsection