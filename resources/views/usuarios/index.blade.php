
@extends('layouts.app')

@section('content')

    <div class="container text-center">
        <div class="row align-items-start">
            <div class="col-5">
            <h1>usuarios</h1>

        </div>
            <div class="col">
            </div>
            <div class="col">
        </div>
    </div>
    </div>
        <div class="container">
  <div class="row">
  <div class="col-md-11 offset-md-0">
    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Rol</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($usuarios as $usuario)
                <tr>
                    <td>{{$usuario->id}}</td>
                    <td>{{$usuario->name}}</td>
                    <td>{{$usuario->email}}</td>
                    <td>
                        @if (!empty($usuario->getRoleNames()))
                            @foreach($usuario->getRoleNames() as $rolName)
                                <h5><span>{{$rolName}}</span></h5>
                            @endforeach
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('usuarios.create') }}" class="btn btn-success">nuevo</a>
                        <a href="{{ route('usuarios.edit', $usuario->id) }}" class="btn btn-warning">Editar</a>
                        {!! Form::open(['method' =>'delete','route' => ['usuarios.destroy', $usuario->id],'style' =>'display:inline']) !!}
                        {!! form::submit('eliminar',['class' =>'btn btn-danger']) !!}
                        {!! form::close() !!}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="pagination">
        {{ $usuarios->links() }}
    </div>
    
    </div>
@endsection
<!-- Delete Modal HTML -->
<div id="deleteEmployeeModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form>
                <div class="modal-header">						
                    <h4 class="modal-title">Delete Employee</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">					
                    <p>Are you sure you want to delete these Records?</p>
                    <p class="text-warning"><small>This action cannot be undone.</small></p>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-danger" value="Delete">
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>