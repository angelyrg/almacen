@extends('layouts.base')

@section('content')

<div class="row">
    <div class="col">
        <a href="../" class="btn btn-secondary">Volver</a>
    </div>
</div>


<div class="row">
    <div class="col">
        <h5 class="text-center">¿Estás seguro que deseas eliminar la salida {{$salida->id}}?</h5>
    </div>
</div>


<div class="row">
    <div class="col col-md-6 offset-md-3">
        <form action="../{{$salida->id}}" method="POST" class="form">
            @csrf
            @method('delete')

            <div class="form-group text-center">
                <a href="../" class="btn btn-secondary">Cancelar</a>
                <input type="submit" class="btn btn-danger" value="Sí, Eliminar">
            </div>

            
        </form>
    </div>
</div>
    
@endsection