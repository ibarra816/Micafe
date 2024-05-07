    
@extends('layouts.app')



@section('title', 'Pedido Completado')

@section('content')
<div style="text-align: center;">
    <h2>Pago en Cafetería</h2>
    <p style="font-size: 24px;">¡Ahora puedes dirigirte a la cafetería! Estamos a su orden</p>
    <p style="font-size: 24px;">¡Ahora puedes dirigirte con tu Ticket!</p>

    <div style="display: inline-block;">
        <form action="{{ route('pdf.ticketpdf') }}" method="GET">
            @csrf
            <button type="submit" class="btn btn-primary">Generar Ticket</button>
        </form>
    </div>
    <div style="display: inline-block; margin-left: 10px;">
        <form action="{{ route('user.home') }}" method="GET">
            <button type="submit" class="btn btn-primary">Volver al inicio del menú</button>
        </form>
    </div>
</div>
@endsection
