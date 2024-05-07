<style>
    .button-container {
        text-align: left;
    }
</style>
@extends('layouts.app')

@section('title', 'Pedido Completado')

@section('content')
    <h1>metodo de pago </h1>
    <h2>Seleccione su método de pago</h2>

    {{-- Puedes agregar más contenido según tus necesidades --}}
    
    <div class="container">
    <div class="buttons">
        <button id="cajaButton" onclick="window.location='{{ route('pagos.cafeteria') }}'" class="btn btn-primary">Pagar en Cafetería</button>
        <button id="transferenciaButton" onclick="window.location='{{ route('pagos.transferencia') }}'" class="btn btn-primary">Pagar por Transferencia</button>
    </div>
    
</div>
    <script>
    function pagarEnCafeteria() {
      // Aquí puedes colocar la lógica para procesar el pago en la cafetería utilizando PHP y Laravel
      alert("Has seleccionado pagar en cafetería. La lógica de procesamiento del pago se implementaría aquí.");
    }

    function pagarPorTransferencia() {
      // Aquí puedes colocar la lógica para procesar el pago por transferencia utilizando PHP y Laravel
      alert("Has seleccionado pagar por transferencia. La lógica de procesamiento del pago se implementaría aquí.");
    }
  </script>
   

@endsection