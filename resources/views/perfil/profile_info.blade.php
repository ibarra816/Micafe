@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Perfil de Usuario</div>

                    <div class="card-body">
                        <!-- Contenido del perfil -->
                        <div class="row">
                            <div class="col-md-4">
                                <!-- Foto de perfil -->
                                @if(Auth::user()->profile_photo)
                                    <img src="{{ asset('storage/profiles/' . Auth::user()->profile_photo) }}" alt="Foto de perfil" class="img-fluid">
                                @else
                                    <p>No hay foto de perfil disponible</p>
                                @endif
                            </div>
                            <div class="col-md-8">
                                <!-- Información del usuario -->
                                <p><strong>Nombre:</strong> {{ Auth::user()->name }}</p>
                                <p><strong>Correo electrónico:</strong> {{ Auth::user()->email }}</p>
                                <!-- Puedes agregar más campos de información del usuario según sea necesario -->

                                <!-- Botón para ir al perfil -->
                                <a href="{{ route('profile') }}" class="btn btn-primary">editar perfil</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
