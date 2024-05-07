<!-- resources/views/productos/create.blade.php -->
@extends('layouts.app') 
<link rel="stylesheet" href="style.css">

@section('content')
<div class="container text-center">
        <div class="row align-items-start">
            <div class="col-5">
                <h1>Crear Producto</h1>
            </div>
        </div>
        <form action="{{ route('productos.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

        <div class="col-1 col-sm-10">
                <div class="form-group">
                    <div class="col-1">
                        <br>
                         <label for="nombre">Nombre:</label>
                    </div>
                </div>
            <input type="text" name="nombre" class="form-control">
        </div>

        <div class="col-1 col-sm-10">
                <div class="form-group">
                    <div class="col-1">
                        <br>
                        <label for="descripcion">Descripción:</label>
                    </div>
                </div>
                <textarea name="descripcion" class="form-control"></textarea>
        </div>

        <div class="col-1 col-sm-10">
                <div class="form-group">
                    <div class="col-1">
                        <br>
                            <label for="precio">Precio:</label>
                    </div>
                </div>
            <input type="number" name="precio" class="form-control">
        </div>
        <div class="col-1 col-sm-10">
        <div class="form-group">
            <input type="file" name="imagen" id="imagen" class="form-control-file">
        </div>
        </div>
        <br>
        
        @if(isset($producto->imagen))
            <img src="{{ asset($producto->imagen) }}" alt="Imagen del producto">
        @endif

            <br>

        <button type="submit" class="btn btn-primary">Guardar</button>

        <a href="{{ route('productos.index') }}" class="btn btn-primary">Volver</a>
    </form>
@endsection
@push('scripts')
    <script>
        @if(session('productoCreado'))
            window.location = '{{ route("productos.index") }}' + '#producto-{{ session("productoCreado")->id }}';
        @endif
    </script>
@endpush    