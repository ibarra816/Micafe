@extends('layouts.app') 

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">   
          <div class="card ">
            <!--Header-->
            <div class="card-header card-header-primary">
              <h4 class="card-title">Crear Rol</h4>
              <p class="card-category">Ingresar datos del rol</p>
            </div>
            <!--End header-->
            <!--Body-->
            <div class="card-body">
              {!! Form::open(array('route' =>'roles.store','method'=>'post')) !!}
              <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group">
                    <label for="">Nombre del rol:</label>
                    {!! Form::text('name', null, array('class' => 'form-control')) !!}
                  </div>
                  <div class="row">
                  <label for="name" class="col-sm-2 col-form-label">Roles:</label>
                  <div class="col-sm-7">
                    <div class="form-group">
                      <select name="permission[]" class="form-control" multiple>
                        @foreach($permisos as $permiso)
                          <option value="{{ $permiso->id }}">{{ $permiso->name }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                </div>
            </div>

            <!--End body-->

            <!--Footer-->
            <div class="card-footer ml-auto mr-auto">
              <button type="submit" class="btn btn-primary">Guardar</button>
              <a href="{{ route('roles.index') }}" class="btn btn-primary">Volver</a>
            </div>
            {!! Form::close() !!}

            <!--End footer-->
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
