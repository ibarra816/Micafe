<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\AdminPedidoController;
use App\Http\Controllers\PagoController;

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

//ruta vista menu 
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('user.home')->middleware('verified');

//rutas de vista roles y permisos 
Route::group(['middleware' => ['auth']], function () {
    Route::resource('roles', RolController::class);
    Route::resource('usuarios', UsuarioController::class);
});

//ruta vista productos 
Route::resource('productos', ProductoController::class);

//ruta funcioanidades de vista del carritos de compras 
Route::middleware(['auth'])->group(function () {
Route::get('/carrito', [CarritoController::class, 'mostrarCarrito'])->name('carrito');
Route::post('/carrito/agregar', [CarritoController::class, 'agregarAlCarrito'])->name('agregarAlCarrito');
Route::post('/carrito/remove/{index}', [CarritoController::class, 'remove'])->name('carrito.remove');
Route::get('/pedidos/ticket', [PedidoController::class, 'ticket'])->name('pagos.pago');
});
// rutas ticke pdf 

Route::get('/ticket', [CarritoController::class, 'generarpdf'])->name('pdf.ticketpdf');



 //rutas para los pedidos del usuario 
Route::middleware(['auth'])->group(function () {
    Route::get('/mis-pedidos', [PedidoController::class, 'pedidosUsuario'])->name('pedidos.usuario');
    Route::get('/pedido/{pedido}', [PedidoController::class, 'detallePedido'])->name('pedidos.detalle');
    Route::put('/pedido/{pedido}/actualizar', [PedidoController::class, 'actualizarEstado'])->name('pedidos.actualizar');

});

//rutas para  ver los pedidos el adminstrador 
Route::group(['middleware' => ['auth', 'admin']], function () {
    Route::get('/admin/pedidos', [AdminPedidoController::class, 'index'])->name('admin.pedidos.index');
    Route::put('/admin/pedidos/{pedido}', [AdminPedidoController::class, 'actualizarEstado'])->name('admin.pedidos.actualizar');
});


// Rutas para el perfil de usuario
Route::get('/perfil/info', [UsuarioController::class, 'showProfileInfo'])->middleware('auth')->name('profile');
Route::post('/perfil/actualizar', [UsuarioController::class, 'updateProfile'])->middleware('auth');
Route::post('/perfil/subir-foto', [UsuarioController::class, 'uploadPhoto'])->middleware('auth');


Route::get('/pagar/caja', [PagoController::class, 'pagarEnCafeteria'])->name('pagos.cafeteria');
Route::get('/pagar/transferencia', [PagoController::class, 'pagarPorTransferencia'])->name('pagos.transferencia');


