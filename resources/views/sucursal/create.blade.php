@extends('layouts.sbadmin')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h5 class="text-center">Nueva sede</h5>
                        </div>
                    </div>
                </div>

                <form action="/sucursal" method="POST">
                    @csrf                                
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>            
                    @endif

                    <div class="card-body">
                        <div class="form-group row">
                            <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>
                            <div class="col-md-6">
                                <input id="nombre" type="text" class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}" name="nombre" value="{{ old('nombre') }}" required autofocus>

                                @if ($errors->has('nombre'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nombre') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Dirección') }}</label>
                            <div class="col-md-6">
                                <input id="direccion" type="text" class="form-control{{ $errors->has('direccion') ? ' is-invalid' : '' }}" name="direccion" value="{{ old('direccion') }}" required >

                                @if ($errors->has('direccion'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('direccion') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="distrito" class="col-md-4 col-form-label text-md-right">{{ __('Distrito') }}</label>
                            <div class="col-md-6">
                                <input id="distrito" type="text" class="form-control{{ $errors->has('distrito') ? ' is-invalid' : '' }}" name="distrito" value="{{ old('distrito') }}" required >

                                @if ($errors->has('distrito'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('distrito') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="provincia" class="col-md-4 col-form-label text-md-right">{{ __('Provincia') }}</label>
                            <div class="col-md-6">
                                <input id="provincia" type="text" class="form-control{{ $errors->has('provincia') ? ' is-invalid' : '' }}" name="provincia" value="{{ old('provincia') }}" required >

                                @if ($errors->has('provincia'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('provincia') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="departamento" class="col-md-4 col-form-label text-md-right">{{ __('Departamento') }}</label>
                            <div class="col-md-6">
                                <input id="departamento" type="text" class="form-control{{ $errors->has('departamento') ? ' is-invalid' : '' }}" name="departamento" value="{{ old('departamento') }}" required >

                                @if ($errors->has('departamento'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('departamento') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Guardar') }}
                                </button>
                                <a href="/users" class="btn btn-secondary">Cancelar</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>




    
@endsection