<!-- resources/views/pedidos/detalle.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Detalles del Pedido</h2>

        @if(isset($pedido))
            <p>ID del Pedido: {{ $pedido->id }}</p>
            <!-- Otros detalles del pedido -->
        @else
            <p>Pedido no encontrado.</p>
        @endif
    </div>
@endsection
