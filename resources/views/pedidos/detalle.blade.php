@extends('layouts.app')

@section('content')
    <h1>Detalles del Pedido</h1>

    <p><strong>Fecha del Pedido:</strong> {{ $pedido->fecha_pedido }}</p>
    <h2>Detalles:</h2>
    <ul>
        @foreach ($pedido->detalles as $detalle)
            <li>
                <strong>Producto:</strong> {{ $detalle->producto->nombre }}<br>
                <strong>Cantidad:</strong> {{ $detalle->cantidad }}<br>
                <strong>Precio Unitario:</strong> {{ $detalle->precio_unitario }}
            </li>
        @endforeach
    </ul>
    <p><strong>Estado:</strong> {{ $pedido->estado }}</p>
    <form action="{{ route('pedidos.actualizar', $pedido->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="estado">Actualizar Estado:</label>
        <select name="estado" id="estado">
            <option value="pendiente" {{ $pedido->estado === 'pendiente' ? 'selected' : '' }}>Pendiente</option>
            <option value="confirmado" {{ $pedido->estado === 'confirmado' ? 'selected' : '' }}>Confirmado</option>
            <option value="enviado" {{ $pedido->estado === 'enviado' ? 'selected' : '' }}>Enviado</option>
            <!-- Otras opciones de estado -->
        </select>

        <button type="submit">Actualizar Estado</button>
    </form>

    <a href="{{ route('pedidos.usuario') }}">Volver a la lista de pedidos</a>
@endsection
