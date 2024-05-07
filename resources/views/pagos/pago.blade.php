@extends('layouts.app')

@section('title', 'Pedido Completado')

@section('content')
<div style="text-align: center;">
    <h1>Metodo de Pago </h1>
    <h2>Seleccione su método de pago</h2>
    <div style="display: flex; justify-content: center;">
        <div style="display: inline-block;">
            <form action="{{ route('pagos.cafeteria') }}" method="GET">
                @csrf
                <button class="btn btn-primary">Pagar en Cafetería</button>
            </form>
        </div>
        <div style="display: inline-block;">
            <form action="{{ route('pagos.transferencia') }}" method="GET">
                <button class="btn btn-primary">Pagar por Transferencia</button>
            </form>
        </div>
    </div>
</div>

<!-- Footer -->

<script>
    function pagarEnCafeteria() {
        window.location.href = "{{ route('pagos.cafeteria') }}";
    }

    function pagarPorTransferencia() {
        window.location.href = "{{ route('pagos.transferencia') }}";
    }
</script>
@endsection
