<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Selección de Pago</title>
  <link rel="stylesheet" href="{{ asset('styles.css') }}">
  <style>
   
  </style>
</head>
<body>
  <div class="container">
    <h2>Seleccione su método de pago</h2>
    <div class="buttons2">
      <button id="cajaButton" onclick="window.location='{{ route('pagos.cafeteria') }}'">Pagar en Cafetería</button>
      <button id="transferenciaButton" onclick="window.location='{{ route('pagos.transferencia') }}'">Pagar por Transferencia</button>
    </div>
  </div>

  
  <!-- Footer -->
  <footer>
    <p>&copy; MiCafe 2023</p>
  </footer>
  <script>
    function pagarEnCafeteria() {
      alert("Has seleccionado pagar en cafetería. La lógica de procesamiento del pago se implementaría aquí.");
    }

    function pagarPorTransferencia() {
      alert("Has seleccionado pagar por transferencia. La lógica de procesamiento del pago se implementaría aquí.");
    }
  </script>
</body>
</html>
