@extends('layouts.sbadmin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Registrar nueva entrada') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{route('entradas.store')}}">
                        @csrf

                        <div class="form-group row">
                            <label for="nombre_encargado" class="col-md-4 col-form-label text-md-right">{{ __('Nombre del encargado') }}</label>
                            <div class="col-md-6">
                                <input id="nombre_encargado" type="text" class="form-control{{ $errors->has('nombre_encargado') ? ' is-invalid' : '' }}" name="nombre_encargado" value="{{ old('nombre_encargado') }}" maxlength="30" required autofocus>

                                @if ($errors->has('nombre_encargado'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nombre_encargado') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="dni_encargado" class="col-md-4 col-form-label text-md-right">{{ __('DNI del encargado') }}</label>
                            <div class="col-md-6">
                                <input id="dni_encargado" type="text" class="form-control{{ $errors->has('dni_encargado') ? ' is-invalid' : '' }}" name="dni_encargado" value="{{ old('dni_encargado') }}" maxlength="8" required>

                                @if ($errors->has('dni_encargado'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('dni_encargado') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <a href="{{route('entradas.index')}}" class="btn btn-secondary"><i class="fa fa-arrow-left"></i> Cancelar</a>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-save"></i>
                                    {{ __('Guardar') }}
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
