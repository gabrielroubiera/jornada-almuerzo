<?php

namespace App\Http\Controllers;

use App\Bodega;
use App\IngredientesRecetas;
use App\Pedidos;
use App\Recetas;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController as Controller;
use Illuminate\Support\Facades\DB;
use \GuzzleHttp\Client as Guzzle;


class PedidosController extends Controller
{
    public function __invoke(){
        $id_receta = $this->getRecetaId();
        $id_pedido = $this->savingOrderWithStatusPreparing();
        $ingredientesReceta = $this->repiceIngredients($id_receta);
        $validarIngredientes = $this->validateIfThereAreAllTheIngredients($id_receta);
        if($validarIngredientes){
            // Proceder con la preparacion del plato
            $mensaje = $this->preparePlate($id_pedido, $id_receta, $ingredientesReceta);
            logger($mensaje);
        } else {
            // Proceder con la compra
            logger("no hay");
        }
        $msg = [
            'message' => 'El plato se esta preparando.'
        ];

        return response()->json($msg);
    }

    public function pedidosEnCola(){
        $pedidosEnCola = Pedidos::where('status_pedido_id', 1)->where('status_id', 1)->get();

        $data = [
            'pedidosEnCola' => count($pedidosEnCola)
        ];

        return response()->json($data);
    }

    public function historialPedidos(){
        $pedidos = Pedidos::where('status_pedido_id', 3)->where('status_id', 1)->get();
        $historialReceta = [];
        for($i = 0; $i < count($pedidos); $i++) {
            $receta_id = $pedidos[$i]->receta_id;
            $receta = Recetas::where('id', $receta_id)->where('status_id', 1)->get();
            array_push($historialReceta, $receta[0]);
        }
        return response()->json($historialReceta);
    }
}
