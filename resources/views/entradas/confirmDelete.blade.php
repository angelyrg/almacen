@extends('layouts.sbadmin')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Eliminar registro de entrada') }}</div>

                <div class="card-body">
                    <form method="POST" action="/entradas/{{$entrada->id}}">
                        @csrf
                        @method('delete')

                        <h5 class="text-center">¿Estás seguro que quieres eliminar la entrada {{$entrada->id}}?</h5>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Eliminar') }}
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