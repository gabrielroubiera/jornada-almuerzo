<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('bodega', 'BodegaController');
Route::get('historial/ingredientes/bodega', 'HistorialCompraIngredientesController');
Route::get('pedir/plato', 'PedidosController');
Route::get('pedidos/cola', 'PedidosController@pedidosEnCola');
Route::get('pedidos/historial', 'PedidosController@historialPedidos');
Route::get('recetas', 'RecetasController');

