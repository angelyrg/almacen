@extends('layouts.sbadmin')

{{-- @section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css"> 
@endsection --}}

@section('content')

<div class="container-fluid">

    @include('layouts.flashcard')
    
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col mt-1">
                    <h5>Usuarios</h5>            
                </div>
                <div class="text-right">
                    <a href="/users/create" class="btn btn-primary btn-sm btn-icon-split" >
                        <span class="icon text-white-100">
                            <i class="fas fa-plus"></i>
                        </span>                    
                        <span class="text">Nuevo</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="table-responsive"  >
                    <table id="usuarios" class="table table-hover table-striped">
                        <thead class="thead-dark">
                            <tr class="th ">
                                <th>ID</th>
                                <th>Nombres</th>
                                <th>Apellidos</th>
                                <th>DNI</th>
                                <th>Correo</th>
                                <th>Celular</th>
                                <th>Sede</th>
                                <th>Rol</th>
                                <th colspan="2">Opciones</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->nombre}}</td>
                                    <td>{{$user->apellido}}</td>
                                    <td>{{$user->dni}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->celular}}</td>
                                    <!--td>{{--$user->sucursal_id--}}</td-->
                                    <td>{{$user->sucursal()->first()->nombre}}</td>
                                    <td>{{$user->role}}</td>
                                    <td><a href="/users/{{$user->id}}/edit" class="btn btn-sm btn-warning">Editar</a></td>
                                    <td>
                                        <a href="" data-target="#modal-delete-{{$user->id}}" data-toggle="modal"><button class="btn btn-sm btn-danger">Eliminar</button></a>
                                    </td>
                                    @include('users.modal')
                                </tr>
                            @endforeach
                        </tbody>                            
                    </table>
                    <div class="container">
                        <div class="d-flex justify-content-end">
                            {{ $users->links() }}
                            </div>
                    </div>
                </div>
                
            </div>
        </div>

    </div>
</div>



@endsection
{{-- 
@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#usuarios').DataTable();
        } );
    </script>
@endsection --}}