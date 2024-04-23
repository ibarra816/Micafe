@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Subir Foto de Perfil</div>

                    <div class="card-body">
                        <!-- Formulario para subir una foto de perfil -->
                        <form action="{{ url('/perfil/subir-foto') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="photo">Seleccionar foto:</label>
                                <input type="file" class="form-control-file" id="photo" name="photo">
                            </div>
                            <button type="submit" class="btn btn-primary">Subir Foto</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center mt-4">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Perfil de Usuario</div>

                    <div class="card-body">
                        <!-- Contenido del perfil -->
                        <!-- Aquí puedes mostrar otros detalles del perfil del usuario -->
                        @if(Auth::user()->profile_photo)
                            <img src="{{ asset('storage/profiles/' . Auth::user()->profile_photo) }}" alt="Foto de perfil">
                        @else
                            <p>No hay foto de perfil disponible</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
