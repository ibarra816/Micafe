@extends('layouts.app')

@section('title', 'Pedido Completado')

@section('content')

        <h2>Confirmación de Transferencia</h2>
        <div>
            <p>Nombre de la Transferencia: Cafetería del Tec Lerdo</p>
            <p>Número de Transferencia de Local: [Número de Transferencia]</p>
        </div>
        <div>
            <p>Dirígete a la cafetería con tu ticket y tu comprobante de transferencia.</p>
        </div>
        <div style="display: inline-block;">
        <form action="{{ route('pdf.ticketpdf') }}" method="GET">
            @csrf
            <button type="submit" class="btn btn-primary">Generar Ticket</button>
        </form>
    </div>
    <div style="display: inline-block; margin-right: 10px;">
        <form action="{{ route('user.home') }}" method="GET">
            <button type="submit" class="btn btn-primary">Volver al inicio del menú</button>
        </form>
    </div>

@endsection