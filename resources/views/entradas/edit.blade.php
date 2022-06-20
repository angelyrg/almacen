@extends('layouts.sbadmin')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Editar datos del entrada') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{route('entradas.update', $entrada->id)}}" enctype="multipart/form-data">
                        @csrf
                        @method('put')


                        <div class="form-group row">
                            <label for="nombre_encargado" class="col-md-4 col-form-label text-md-right">{{ __('Nombre del encargado') }}</label>
                            <div class="col-md-6">
                                <input id="nombre_encargado" type="text" class="form-control{{ $errors->has('nombre_encargado') ? ' is-invalid' : '' }}" name="nombre_encargado" value="@if(!old('nombre_encargado')){{$entrada->nombre}}@else{{old('nombre_encargado')}}@endif" required>

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
                                <input type="text" id="dni_encargado" class="form-control{{ $errors->has('dni_encargado') ? ' is-invalid' : '' }}" name="dni_encargado" value="@if(!old('dni_encargado')){{$entrada->dni}}@else{{old('dni_encargado')}}@endif" maxlength="8" required >

                                @if ($errors->has('dni_encargado'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('dni_encargado') }}</strong>
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
