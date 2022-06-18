@extends('layouts.sbadmin')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Editar datos del articulo') }}</div>

                <div class="card-body">
                    <form method="POST" action="/articulos/{{$articulo->id}}" enctype="multipart/form-data">
                        @csrf
                        @method('put')

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
                                <input id="codigo" type="text" class="form-control{{ $errors->has('codigo') ? ' is-invalid' : '' }}" name="codigo" value="@if(!old('codigo')){{$articulo->codigo}}@else{{old('codigo')}}@endif" required autofocus>

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
                                <input id="nombre" type="text" class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}" name="nombre" value="@if(!old('nombre')){{$articulo->nombre}}@else{{old('nombre')}}@endif" required>

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
                                <textarea id="descripcion" class="form-control{{ $errors->has('descripcion') ? ' is-invalid' : '' }}" name="descripcion" cols="30" rows="2" >@if(!old('descripcion')){{$articulo->descripcion}}@else{{old('descripcion')}}@endif</textarea>

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
                                    <option value="">--Unidad de medida--</option>
                                    @foreach ($unidad_medidas as $medida)
                                        @if($medida->id == $articulo->medida_id)
                                            <option value="{{$medida->id}}" selected>{{$medida->nombre}}</option>
                                        @else
                                            <option value="{{$medida->id}}">{{$medida->nombre}}</option>
                                        @endif
                                        
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
                            <label for="stock" class="col-md-4 col-form-label text-md-right">{{ __('stock') }}</label>
                            <div class="col-md-6">
                                <input id="stock" type="number" step="0.01" class="form-control{{ $errors->has('stock') ? ' is-invalid' : '' }}" name="stock" value="@if(!old('stock')){{$articulo->stock}}@else{{old('stock')}}@endif" required>

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
                                    <option value="">--Estado del artículo--</option>
                                    @foreach ($estado_articulos as $estado)
                                        @if($estado->id == $articulo->estado_id)
                                            <option value="{{$estado->id}}" selected>{{$estado->nombre}}</option>
                                        @else
                                            <option value="{{$estado->id}}">{{$estado->nombre}}</option>
                                        @endif
                                        
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
                                    {{ __('Guardar') }}
                                </button>
                                <a href="/articulos" class="btn btn-secondary">Cancelar</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
