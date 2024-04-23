<!-- resources/views/productos/show.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container text-center">
        <div class="row align-items-start">
            <div class="col-5">
                <h1>Detalles del Producto</h1>
            </div>
            <div class="container">
            <div class="row">
            <div class="col-md-3 offset-md-0">
            <table class="table mt-3">
                <p><strong>ID:</strong> {{ $producto->id }}</p>
                <p><strong>Nombre:</strong> {{ $producto->nombre }}</p>
                <p><strong>Detalle:</strong> {{ $producto->detail }}</p>
                <p><strong>Precio:</strong> {{ $producto->precio }}</p>

                <a href="{{ route('productos.index') }}" class="btn btn-primary">Volver</a>
                </table>
             </div>
    </div>
    
@endsection
