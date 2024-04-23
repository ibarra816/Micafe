<!-- resources/views/productos/edit.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container text-center">
        <div class="row align-items-start">
            <div class="col-5">
                <h1>Editar Producto</h1>
            </div>
        </div>
    <div class="col">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <form action="{{ route('productos.update', $producto->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="col-0 col-sm-10">
                <div class="form-group">
                    <div class="col-1">
                        <br>
                        <label for="name">Nombre:</label>
                    </div>
                </div>
                <input type="text" name="name" class="form-control" value="{{ $producto->name }}">
            </div>
            
            <div class="col-1 col-sm-10">
                <div class="form-group">
                    <div class="col-1">
                        <br>
                        <label for="detail">Detalle:</label>
                    </div>
                </div>   
                <textarea name="detail" class="form-control">{{ $producto->detail }}</textarea>
            </div>

            <div class="col-8 col-sm-10">
                <div class="form-group">
                    <div class="col-1">
                        <br>
                        <label for="price">Precio:</label>
                    </div>
                </div>
                <input type="number" name="price" class="form-control" value="{{ $producto->price }}">
            </div>
            <br>
            <div class="col-1 col-sm-10">
                <div class="form-group">
                    <div class="col-1">
                        <br>
                        <label for="imagen">Imagen</label>
                    </div>
                </div>
                <input type="file" name="imagen" id="imagen" class="form-control-file">
            </div>
            <div>
                
            <br>
            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a href="{{ route('productos.index') }}" class="btn btn-primary">Volver</a>

        </form>
    </div>
@endsection
