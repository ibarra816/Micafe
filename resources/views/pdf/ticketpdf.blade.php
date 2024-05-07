<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket de Compra</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        
        .ticket {
    max-width: 600px; /* Ancho máximo */
    margin: 20px auto;
    border: 1px solid #ccc;
    padding: 20px; /* Incrementa el padding */
    border-radius: 10px;
}

        .ticket-header {
            text-align: center;
            margin-bottom: 10px;
        }
        .ticket-body {
            margin-bottom: 20px;
        }
        .ticket-details {
            margin-bottom: 10px;
        }
        .ticket-footer {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        .ticket-total {
            text-align: left;
        }
        
        
    </style>
</head>
<body>
    <div class="ticket">
        <div class="ticket-header">
            <h1>Ticket de Compra</h1>
            <p>Mi Cafe </p> <!-- Agrega el nombre de tu café aquí -->
        </div>
        <table>
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Descripción</th>
                    <th>Cantidad</th>
                    <th class="text-center">Precio</th>
                   
                </tr>
            </thead>
            <tbody>
                @foreach($carrito as $id => $item)
                <tr>
                    <td>{{ $item['producto']->nombre }}</td>
                    <td>{{ $item['producto']->descripcion }}</td>
                    <td>{{ $item['cantidad'] }}</td>
                    <td>${{ $item['producto']->precio }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="ticket-total">
        <p style="text-align: left;">Total: ${{ $total }}</p>
        </div>
    </div>
    <div class="ticket-footer">
            <p>Gracias por su compra </p>
        </div>
    </div>
</body>
</html>


