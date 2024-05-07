<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagoController extends Controller
{
    public function pagarEnCafeteria()
    {
        // Aquí puedes colocar la lógica de procesamiento para pagar en la cafetería
        return view('pagos.cafeteria');
    }

    public function pagarPorTransferencia()
    {
        // Aquí puedes colocar la lógica de procesamiento para pagar por transferencia
        return view('pagos.transferencia');
    }
}
