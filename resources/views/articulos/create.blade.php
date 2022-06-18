@extends('layouts.sbadmin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Registrar nuevo articulo') }}</div>

                <div class="card-body">
                    <form method="POST" action="/articulos">
                        @csrf

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li><i>{{$error}}</i></li>
                                    @endforeach
                                </ul>
                            </div>            
                        @endif

                        <div class="form-group row">
                            <label for="codigo" class="col-md-4 col-form-label text-md-right">{{ __('Código') }}</label>
                            <div class="col-md-6">
                                <input id="codigo" type="text" class="form-control{{ $errors->has('codigo') ? ' is-invalid' : '' }}" name="codigo" value="{{ old('codigo') }}" maxlength="10" required autofocus>

                                @if ($errors->has('codigo'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('codigo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>
                            <div class="col-md-6">
                                <input id="nombre" type="text" class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}" name="nombre" value="{{ old('nombre') }}" required>

                                @if ($errors->has('nombre'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nombre') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="descripcion" class="col-md-4 col-form-label text-md-right">{{ __('Descripción') }}</label>
                            <div class="col-md-6">
                                <textarea id="descripcion" class="form-control{{ $errors->has('descripcion') ? ' is-invalid' : '' }}" name="descripcion"  rows="3" >{{ old('descripcion') }}</textarea>

                                @if ($errors->has('descripcion'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('descripcion') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="medida_id" class="col-md-4 col-form-label text-md-right">{{ __('Unidad de medida') }}</label>
                            <div class="col-md-6">

                                <select name="medida_id" id="medida_id" class="form-control{{ $errors->has('medida_id') ? ' is-invalid' : '' }}">
                                    <option value="">--Seleccione unidad de medida-- </option>     
                                    @foreach ($unidad_medidas as $unid_medida)
                                        <option value="{{$unid_medida->id}}"> {{$unid_medida->nombre}} </option>
                                    @endforeach
                                </select>

                                @if ($errors->has('medida_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('medida_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="stock" class="col-md-4 col-form-label text-md-right">{{ __('Stock') }}</label>
                            <div class="col-md-6">
                                <input id="stock" type="number" step="1" class="form-control{{ $errors->has('stock') ? ' is-invalid' : '' }}" name="stock" value="{{ old('stock') }}" required>

                                @if ($errors->has('stock'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('stock') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="estado_id" class="col-md-4 col-form-label text-md-right">{{ __('Estado del artículo') }}</label>
                            <div class="col-md-6">
                                <select name="estado_id" id="estado_id" class="form-control{{ $errors->has('estado_id') ? ' is-invalid' : '' }}">
                                    <option value="" > --Estado del artículo-- </option>     
                                    @foreach ($estado_articulos as $estad_articulo)
                                        <option value="{{$estad_articulo->id}}"> {{$estad_articulo->nombre}} </option>
                                    @endforeach
                                </select>

                                @if ($errors->has('estado_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('estado_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-save"></i>
                                    {{ __('Guardar') }}
                                </button>
                                <a href="/articulos" class="btn btn-secondary"><i class=" fa fa-times"></i> Cancelar</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
