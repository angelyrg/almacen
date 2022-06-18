@extends('layouts.sbadmin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Editar datos del usuario') }}</div>

                <div class="card-body">
                    <form method="POST" action="/users/{{$user->id}}">
                        @csrf
                        @method('put')

                        <div class="form-group row">
                            <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>
                            <div class="col-md-6">
                                <input id="nombre" type="text" class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}" name="nombre" value="@if(!old('nombre')){{$user->nombre}}@else{{old('nombre')}}@endif" required autofocus>

                                @if ($errors->has('nombre'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nombre') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="apellido" class="col-md-4 col-form-label text-md-right">{{ __('Apellido') }}</label>
                            <div class="col-md-6">
                                <input id="apellido" type="text" class="form-control{{ $errors->has('apellido') ? ' is-invalid' : '' }}" name="apellido" value="@if(!old('apellido')){{$user->apellido}}@else{{old('apellido')}}@endif" required>

                                @if ($errors->has('apellido'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('apellido') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="dni" class="col-md-4 col-form-label text-md-right">{{ __('DNI') }}</label>
                            <div class="col-md-6">
                                <input id="dni" type="text" class="form-control{{ $errors->has('dni') ? ' is-invalid' : '' }}" name="dni" value="@if(!old('dni')){{$user->dni}}@else{{old('dni')}}@endif" pattern="[0-9]{8}" title="Debes ingresar un DNI válido" maxlength="8" required>

                                @if ($errors->has('dni'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('dni') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="celular" class="col-md-4 col-form-label text-md-right">{{ __('Celular') }}</label>
                            <div class="col-md-6">
                                <input id="celular" type="text" class="form-control{{ $errors->has('celular') ? ' is-invalid' : '' }}" name="celular" value="@if(!old('celular')){{$user->celular}}@else{{old('celular')}}@endif" pattern="+51 [0-9]{13}" title="Debes ingresar un número de válido" maxlength="13" required>

                                @if ($errors->has('celular'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('celular') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Correo') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="@if(!old('email')){{$user->email}}@else{{old('email')}}@endif" >

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        {{-- Rol --}}
                        <div class="form-group row">
                            <label for="role_id" class="col-md-4 col-form-label text-md-right">{{ __('Rol') }}</label>

                            <div class="col-md-6">
                                <select name="role_id" id="role_id" class="form-control{{ $errors->has('role_id') ? ' is-invalid' : '' }}" required>
                                    <option value="">--Selecione un rol--</option>
                                    
                                        @if ($user->role == "admin")
                                            <option value="1" selected>Administrador</option>
                                            <option value="2">Almacenero</option>
                                        @else
                                            <option value="1">Administrador</option>
                                            <option value="2" selected>Almacenero</option>
                                        @endif
                                    
                                </select>

                                @if ($errors->has('role_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('role_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        {{-- sucursal --}}
                        <div class="form-group row">
                            <label for="sucursal_id" class="col-md-4 col-form-label text-md-right">{{ __('Sucursal') }}</label>

                            <div class="col-md-6">
                                <select name="sucursal_id" id="sucursal_id" class="form-control{{ $errors->has('sucursal_id') ? ' is-invalid' : '' }}" required>
                                    <option value="">--Selecione una sucursal--</option>
                                    @foreach ($sucursals as $sucursal)
                                        @if ($user->sucursal_id == $sucursal->id)
                                            <option value="{{$sucursal->id}}" selected>{{$sucursal->nombre}}</option>
                                        @elseif (old('sucursal_id') == $sucursal->id)
                                            <option value="{{$sucursal->id}}" selected>{{$sucursal->nombre}}</option>
                                        @else
                                            <option value="{{$sucursal->id}}">{{$sucursal->nombre}}</option>
                                        @endif
                                    @endforeach
                                </select>
                                @if ($errors->has('sucursal_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('sucursal_id') }}</strong>
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
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
