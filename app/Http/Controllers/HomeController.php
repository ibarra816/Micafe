<?php

namespace App\Http\Controllers;

use App\Models\producto;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $productos = Producto::all();

        $carrito = session()->get('carrito', []);

        //dd(compact('productos'));
        return view('menu.home', compact('productos'),["num"=>count($carrito)]);

    }
}
