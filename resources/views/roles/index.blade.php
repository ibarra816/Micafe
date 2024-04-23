@php
    use Illuminate\Support\Facades\Gate;
@endphp

@extends('layouts.app')

@section('content')

    <div class="container text-center">
        <div class="row align-items-start">
            <div class="col-5">
                <h1>Roles</h1>
            </div>
            @can('crear-rol')
            <div class="col">
                <a href="{{ route('roles.create') }}" class="btn btn-success">Nuevo</a>
                
                <!-- Botón para regresar a la vista principal -->
                <a href="{{ route('user.home') }}" class="btn btn-primary">Home</a>
            
            </div>
            @endcan
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-11 offset-md-0">
                <table class="table mt-3">
                    <thead>
                        <tr>
                            <th>Rol</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($roles as $role)
                            <tr>
                                <td>{{$role->name}}</td>
                                <td>
                                    @can('editar-rol')
                                    <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-warning">Editar</a>
                                    @endcan

                                    @can('borrar-rol')
                                    {!! Form::open(['method' => 'delete', 'route' => ['roles.destroy', $role->id], 'style' => 'display:inline']) !!}
                                    {!! form::submit('eliminar',['class' =>'btn btn-danger']) !!}
                                    {!! form::close() !!}
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="pagination">
                    {{ $roles->links() }}
                </div>

            </div>
        </div>
    </div>

    <!-- Delete Modal HTML -->
    <div id="deleteEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <!-- Modal para eliminar -->
        </div>
    </div>

@endsection
