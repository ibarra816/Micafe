@php
    use Collective\Html\FormFacade as Form;
@endphp

@extends('layouts.app')

@section('content')

    <div class="container text-center">
        <div class="row align-items-start">
            <div class="col-5">
                <h1>Editar roles a usuarios</h1>
                {!! Form::model($user,['method'=>'PATCH','route'=>['usuarios.update', $user->id]]) !!}
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div>
                        <label for="role">Roles</label>
                        {!! Form::select('roles[]', $roles,[],array('class' => 'form-contol')) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <a href="{{ route('usuarios.index') }}" class="btn btn-primary">Volver</a>
                </div>
            </div>
        {!! Form::close() !!}
    
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
    </div>
    
@endsection
