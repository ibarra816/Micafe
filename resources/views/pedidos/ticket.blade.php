
@extends('layouts.app')

@section('title', 'Pedido Completado')

@section('content')
<div style="text-align: center;">
    <h1>metodo de pago </h1>
    <h2>Seleccione su método de pago</h2>
        <div style="position: flex; justify-content: center;">
            <div style="display: inline-block;">
                <form action="{{ route('pagos.cafeteria') }}" method="GET">
                    @csrf
                    <button class="btn btn-primary">Pagar en Cafetería</button>
                </form>
            </div>
            <div style="position: inline-block; margin-left: 10px;">
                <form action="{{ route('pagos.transferencia') }}" method="GET">
                    <button class="btn btn-primary">Pagar por Transferencia</button>
                </form>
            </div>
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
