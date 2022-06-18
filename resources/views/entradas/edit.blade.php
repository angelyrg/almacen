@extends('layouts.sbadmin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Editar datos de la entrada') }}</div>

                <div class="card-body">
                    <form method="POST" action="/entradas/{{$entrada->id}}">
                        @csrf
                        @method('put')

                        <div class="form-group row">
                            <label for="nombre_encargado" class="col-md-4 col-form-label text-md-right">{{ __('Nombre del encargado') }}</label>
                            <div class="col-md-6">
                                <input id="nombre_encargado" type="text" class="form-control{{ $errors->has('nombre_encargado') ? ' is-invalid' : '' }}" name="nombre_encargado" value="@if(!old('nombre_encargado')){{$entrada->nombre_encargado}}@else{{old('nombre_encargado')}}@endif" maxlength="100" required autofocus>

                                @if ($errors->has('nombre_encargado'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nombre_encargado') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="apellido_encargado" class="col-md-4 col-form-label text-md-right">{{ __('Apellido del encargado') }}</label>
                            <div class="col-md-6">
                                <input id="apellido_encargado" type="text" class="form-control{{ $errors->has('apellido_encargado') ? ' is-invalid' : '' }}" name="apellido_encargado" value="@if(!old('apellido_encargado')){{$entrada->apellido_encargado}}@else{{old('apellido_encargado')}}@endif" maxlength="100" required>

                                @if ($errors->has('apellido_encargado'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('apellido_encargado') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Guardar') }}
                                </button>
                                <a href="/entradas" class="btn btn-secondary">Cancelar</a>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
