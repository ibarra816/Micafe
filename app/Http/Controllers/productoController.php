<?php
namespace App\Http\Controllers;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Laravel\Ui\ControllersCommand;

class ProductoController extends ControllersCommand{
    public function index()
    {
        $productos = Producto::all();

        $rutaImagenBase = 'assets/img';

        foreach ($productos as $producto) {
            // Concatenar la ruta base con el nombre de la imagen del producto
            $producto->imagen = $rutaImagenBase . '/' . $producto->imagen;
        }
        
        
        
        return view('productos.index', ['productos' => $productos]);
    }
    
    public function create()
    {
        return view('productos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'precio' => 'required|numeric',
            'descripcion' => 'required',
        ]);

        //dd($request);

        Producto::create($request->all());

   

       
        return redirect()->route('productos.index')->with('success', 'Producto creado exitosamente');
    }

    public function show(Producto $producto)
    {
        return view('productos.show', compact('producto'));
    }

    public function edit(Producto $producto)
    {
        return view('productos.edit', compact('producto'));
    }

    public function update(Request $request, Producto $producto)
    {
        $request->validate([
            'nombre' => 'required',
            'precio' => 'required|numeric',
            'descripcion' => 'required',
        ]);

        $producto->update($request->all());
        return redirect()->route('productos.index')->with('success', 'Producto actualizado exitosamente');
    }

    public function destroy(Producto $producto)
    {
        $producto->delete();
        return redirect()->route('productos.index')->with('success', 'Producto eliminado exitosamente');
    }

    

    public function ima(Request $request)
{
    // Validar el formulario y otros datos del producto

    if ($request->hasFile('imagen')) {
        $imagen = $request->file('imagen');
        $ruta = $imagen->ima('images');
        // Guardar la ruta en la columna "imagen"
        $producto->imagen = $ruta;
    }

    // Guardar el producto en la base de datos
    $producto->save();

    // Redirigir o realizar otras acciones necesarias
}

}

