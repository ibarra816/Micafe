    
@extends('layouts.app')

@section('title', 'Pedido Completado')

@section('content')
<h2>Pago en Cafetería</h2>
    <p>¡Ahora puedes dirigirte a la cafetería! Estamos
    
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