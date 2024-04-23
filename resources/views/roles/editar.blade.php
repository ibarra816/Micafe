@php
    use Collective\Html\FormFacade as Form;
@endphp

@extends('layouts.app')

@section('content')

    <div class="container text-center">
        <div class="row align-items-start">
            <div class="col-5">
                <h1>editar rol</h1>
                @if($errors->any())
                <div class="alert alert-dark alert-dismissible fade show" role="alert">
                    <strong>¡Revise los campos!</strong> 
                    @foreach($errors->all() as $error)
                        <span class="badge badge-danger">{{ $error }}</span>
                    @endforeach
                    <button type="button" class="close" data-dismiss="alert" aria-label="close">
                        <span arial-hidden="true">&times;</span>
                    </button>
                </div>
                @endif

                {!! Form::model($role('method' => 'patch','route' => ['roles.update',$role->id ])) !!}

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div>
                        <label for="">Nombre del role</label>
                        {!! Form::text('name', null,array('class' => 'form-contol')) !!}
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12"> 
                        <div class="form-group">
                            <label for="">Permisos para este rol:</label>
                            <br/>
                            @foreach($permission as $value)
                            <label>{{ Form::checkbox('permission[]', $value->id, false, array('class' =>'name')) }}
                                {{$value->name}}</label>
                            <br/>
                            @endforeach
                        </div>
                    </div>
                </div>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <a href="{{ route('roles.index') }}" class="btn btn-primary">Volver</a>
                    
                </div>
                {!! Form::close() !!}
            </div>
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
