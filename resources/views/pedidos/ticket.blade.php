@extends('layouts.app')

@section('title', 'Pedido Completado')

@section('content')
    <h1>Pedido Completado</h1>
    <p>¡Gracias por tu compra!</p>

    {{-- Puedes agregar más contenido según tus necesidades --}}
    
    <form action="{{ route('user.home') }}" method="GET">
        <button type="submit" class="btn btn-primary">Volver al inicio menu </button>
    </form>

@endsection