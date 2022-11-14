<?php

use Illuminate\Support\Facades\Route;

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



Route::view('/', 'home');
Route::view('login', 'login');

// Route::view('productos', 'productos');
// Route::view('nuevoProducto', 'nuevoProducto');
// Route::view('editarProducto', 'editarProducto');
// Route::view('proveedores', 'proveedores');
// Route::view('nuevoProveedor', 'nuevoProveedor');
// Route::view('editarProveedor', 'editarProveedor');
// Route::view('bodegas', 'bodegas');
// Route::view('nuevaBodega', 'nuevaBodega');
// Route::view('editarBodega', 'editarBodega');
// Route::view('ordenCompra', 'ordenCompra');
// Route::view('ordenCompra/create', 'nuevaOrdenCompra');
// Route::view('ordenCompra/new', 'nuevaOrdenCompra');

Auth::routes();

Route::group(['middleware' => ['auth']], function(){
    Route::resource('usuarios', App\Http\Controllers\UsuarioController::class);
    Route::resource('roles', App\Http\Controllers\RolController::class);
    
});

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('/productos', App\Http\Controllers\ProductosController::class);
Route::get('/product_search', [App\Http\Controllers\ProductosController::class, 'product_search']);
Route::get('/product_search_detail', [App\Http\Controllers\ProductosController::class, 'product_search_detail']);
Route::resource('/proveedores', App\Http\Controllers\ProveedoresController::class);
Route::resource('/bodegas', App\Http\Controllers\BodegasController::class);
Route::resource('/ordenCompra', App\Http\Controllers\OrdenCompraController::class);
Route::resource('/documentos', App\Http\Controllers\DocumentosController::class);
// Route::get('/ordenCompra/nuevo', [App\Http\Controllers\OrdenCompraController::class, 'create'])->name('ordenCompra.create');
// Route::get('/ordenCompra/nuevo', [App\Http\Controllers\OrdenCompraController::class, 'getProveedores'])->name('ordenCompra.getProveedores');


