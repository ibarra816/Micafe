@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Perfil de Usuario</div>
                    <div class="card-body">
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <h5 class="card-title">Información de Usuario</h5>
                        <form action="{{ url('/perfil/actualizar') }}" method="POST">
                            @csrf <!-- Agregar el token CSRF para protección -->
                            <!-- Campo para actualizar el nombre -->
                            <div class="form-group">
                                <label for="name">Nombre:</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ Auth::user()->name }}">
                            </div>
                            <!-- Campo para actualizar el correo electrónico (deshabilitado) -->
                            <div class="form-group">
                                <label for="email">Correo electrónico:</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ Auth::user()->email }}" readonly>
                            </div>
                            <!-- Campo para la nueva contraseña -->
                            <div class="form-group">
                                <label for="new_password">Nueva contraseña:</label>
                                <input type="password" class="form-control" id="new_password" name="new_password">
                            </div>
                            <!-- Campo para confirmar la nueva contraseña -->
                            <div class="form-group">
                                <label for="confirm_new_password">Confirmar nueva contraseña:</label>
                                <input type="password" class="form-control" id="confirm_new_password" name="confirm_new_password">
                            </div>
                            <!-- Botón para enviar el formulario -->
                            <button type="submit" class="btn btn-primary">Actualizar Información</button> 
                        </form>
                        <a href="{{ route('perfil.info') }}" class="btn btn-primary">regresar perfil </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
