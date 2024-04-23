<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\AdminPedidoController;

// Controladores roles y permisos
use App\Http\Controllers\RolController;
use App\Http\Controllers\UsuarioController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Auth::routes([
    'verify' =>true
]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('user.home')->middleware('verified');

Route::group(['middleware' => ['auth']], function () {
    Route::resource('roles', RolController::class);
    Route::resource('usuarios', UsuarioController::class);
});

Route::resource('productos', ProductoController::class);

Route::get('/carrito', [CarritoController::class, 'mostrarCarrito'])->name('carrito');

Route::post('/carrito/agregar', [CarritoController::class, 'agregarAlCarrito'])->name('agregarAlCarrito');

Route::get('/carrito/eliminar/{productoId}', [CarritoController::class, 'eliminarDelCarrito'])->name('eliminarDelCarrito');

Route::post('/carrito/remove/{index}', [CarritoController::class, 'remove'])->name('carrito.remove');

Route::get('pedidos/pedidoconfirmado', [PedidoController::class, 'pedidoConfirmado'])->name('pedidos.pedidoconfirmado');

Route::get('/pedidos/ticket', [PedidoController::class, 'ticket'])->name('pedidos.ticket');




Route::middleware(['auth'])->group(function () {
    Route::get('/mis-pedidos', [PedidoController::class, 'pedidosUsuario'])->name('pedidos.usuario');
    Route::get('/pedido/{pedido}', [PedidoController::class, 'detallePedido'])->name('pedidos.detalle');
    Route::put('/pedido/{pedido}/actualizar', [PedidoController::class, 'actualizarEstado'])->name('pedidos.actualizar');

});


Route::group(['middleware' => ['auth', 'admin']], function () {
    Route::get('/admin/pedidos', [AdminPedidoController::class, 'index'])->name('admin.pedidos.index');
    Route::put('/admin/pedidos/{pedido}', [AdminPedidoController::class, 'actualizarEstado'])->name('admin.pedidos.actualizar');
});


Route::get('/perfil', [UsuarioController::class, 'showProfile'])->middleware('auth')->name('perfil');
Route::post('/perfil/actualizar', [UsuarioController::class, 'updateProfile'])->middleware('auth');
Route::post('/perfil/subir-foto', [UsuarioController::class, 'uploadPhoto'])->middleware('auth');
Route::get('/perfil/info', [UsuarioController::class, 'showProfileInfo'])->middleware('auth')->name('perfil.info');
