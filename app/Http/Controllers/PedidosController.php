<?php

namespace App\Http\Controllers;

use App\Bodega;
use App\IngredientesRecetas;
use App\Pedidos;
use App\Recetas;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController as Controller;
use Illuminate\Support\Facades\DB;

class PedidosController extends Controller
{
    public function __invoke(Request $request){

        // Validate if there are all the ingredients at bodega

        $recetas = $this->all(Recetas::class);
        $numero_recetas = count($recetas);
        $id_receta = rand(1, $numero_recetas);

        $ingredientes_receta = IngredientesRecetas::where('status_id', 1)->where('receta_id', $id_receta)->get();

        $ingredientes = [];

        for($i = 0; $i < count($ingredientes_receta); $i++){
            array_push($ingredientes, $ingredientes_receta[$i]);
        }

        $confirmacion = true;

        for($i = 0; $i < count($ingredientes); $i++) {
            $ingredienteEnBodega = Bodega::where('status_id', 1)->where('ingrediente', $ingredientes[$i]->ingrediente)->get();
            if($ingredienteEnBodega[0]->cantidad < $ingredientes[$i]->cantidad){
                $confirmacion = false;
                break;
            };
        }

        // Validate if there are not all the ingredients at bodega, buy at the market

        if($confirmacion){
            logger('we have everything');
        } else {
            logger('buy at the market place');
        }

        return response()->json($ingredientes);
    }
}
