<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class PedidoController extends Controller
{
    public function ticket()
    {
        // Lógica para obtener detalles del pedido si es necesario
        // Ejemplo: obtener el último pedido para demostración

       

        // Pasar los detalles a la vista
        return view('pedidos.ticket');
    }

        


}
