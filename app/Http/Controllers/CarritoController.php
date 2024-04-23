<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\carrito;
use App\Models\Producto;

class CarritoController extends Controller
{
    public function agregarAlCarrito(Request $request)
    {
        $productoId = $request->input('productId');
        $producto = Producto::find($productoId);

        if (!$producto) {
            return response()->json(['error' => 'El producto no existe.']);
        }

        // Obtener el carrito de la sesión o crear uno vacío
        $carrito = session()->get('carrito', []);

        // Verificar si el producto ya está en el carrito
        if (isset($carrito[$productoId])) {
            // Incrementar la cantidad si el producto ya está en el carrito
            $carrito[$productoId]['cantidad']++;
        } else {
            // Agregar el producto al carrito con una cantidad de 1
            $carrito[$productoId] = [
                'producto' => $producto,
                'cantidad' => 1,
            ];
        }

        // Actualizar el carrito en la sesión
        session()->put('carrito', $carrito);

        // Obtener el total de productos en el carrito
        $cartCount = count($carrito);

        return response()->json(['cartCount' => $cartCount]);
    }

    public function mostrarCarrito()
    {
        $total = 0;
    $carrito = session()->get('carrito', []);

    foreach($carrito as $id => $item){
        $total += $item['producto']->precio * $item['cantidad'];
    }

    return view('carrito.carrito', compact('carrito', 'total'));
    }

    public function eliminarDelCarrito($productoId)
    {
        $carrito = session()->get('carrito', []);

        if (isset($carrito[$productoId])) {
            unset($carrito[$productoId]);
            session()->put('carrito', $carrito);
            session()->flash('success', 'Producto eliminado correctamente');
        } else {
            session()->flash('error', 'El producto no existe en el carrito');
        }

        return redirect()->back();
    }
    
    public function remove($index)
    {
        $carrito = session()->get('carrito', []);
    
        if (isset($carrito[$index])) {
            unset($carrito[$index]);
            session()->put('carrito', $carrito);
            session()->flash('success', 'Producto eliminado correctamente');
        } else {
            session()->flash('error', 'El producto no existe en el carrito');
        }
    
        return redirect()->back();
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function show($carritoId)
    {
        // Lógica para obtener los datos del carrito
        $carrito = Carrito::find($carritoId);

        // Obtener el pedidoId del carrito (asumiendo que existe una relación)
        $pedidoId = $carrito->pedido->id;

        // Pasar el pedidoId a la vista "carrito"
        return view('carrito.carrito', ['pedidoId' => $pedidoId]);
    }

    }
