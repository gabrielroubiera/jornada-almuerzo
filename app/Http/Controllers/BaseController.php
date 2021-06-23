<?php

namespace App\Http\Controllers;

use App\Bodega;
use App\Events\MessageEvent;
use App\IngredientesRecetas;
use App\Pedidos;
use App\Recetas;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BaseController extends Controller
{
    public $id_pedido;
    public function all($table){
        return $table::where('status_id', '!=', '2')->get();
    }

    // getting random recipe
    public function getRecetaId(){
        $recetas = $this->all(Recetas::class);
        $numero_recetas = count($recetas);
        $id_receta = rand(1, $numero_recetas);
        return $id_receta;
    }

    // Saving an order with status preparing to start to prepare
    public function savingOrderWithStatusPreparing(){
        $pedidos = [
            'status_pedido_id' => 1,
            'receta_id' => 0,
            'status_id' => 1,
            'created_at' => Carbon::now()
        ];

        $insertPedido = DB::table('pedidos')->insertGetId($pedidos);
        $this->id_pedido = $insertPedido;
    }

    // Validate if there are all the ingredients at bodega
    public function validateIfThereAreAllTheIngredients($id_receta){
        $ingredientes_receta = IngredientesRecetas::where('status_id', 1)->where('receta_id', $id_receta)->get();
        $ingredientes = [];

        for($i = 0; $i < count($ingredientes_receta); $i++){
            array_push($ingredientes, $ingredientes_receta[$i]);
        }
        return $this->validateIngredientsAtBodega($ingredientes);
    }

    // Validate if there are the ingredients at de bodega
    public function validateIngredientsAtBodega($ingredientes){

        $ingredientesPendientes = [];

        for($i = 0; $i < count($ingredientes); $i++) {
            $ingredienteEnBodega = Bodega::where('status_id', 1)
            ->where('ingrediente', $ingredientes[$i]->ingrediente)->get();

            if($ingredienteEnBodega[0]->cantidad < $ingredientes[$i]->cantidad){
                array_push($ingredientesPendientes, $ingredienteEnBodega[0]);
            };
        }

        if(count($ingredientesPendientes) > 0){
            return  false;
        } else {
            return  true;
        }
    }

    // Getting all the ingredients from ingredientes_receta table
    public function repiceIngredients($id_receta){
        $ingredientes_receta = IngredientesRecetas::where('status_id', 1)
        ->where('receta_id', $id_receta)->get();

        $ingredientes = [];

        for($i = 0; $i < count($ingredientes_receta); $i++){
            array_push($ingredientes, $ingredientes_receta[$i]);
        }

        return $ingredientes;
    }

    // updating ingredients that i use to prepare the order and updating pedidos table
    // to switch the order status to 'preparado'
    public function preparePlate($id_pedido, $id_receta, $ingredientes){
        for($i = 0; $i < count($ingredientes); $i++) {
            $ingredienteEnBodega = Bodega::where('status_id', 1)
            ->where('ingrediente', $ingredientes[$i]->ingrediente)->get();

            $cantidadEnLaBodega = $ingredienteEnBodega[0]->cantidad;
            $cantidadRequerida = $ingredientes[$i]->cantidad;
            $cantidadFinal = $cantidadEnLaBodega - $cantidadRequerida;

            $ingredientesEnLaBodega = Bodega::find($ingredienteEnBodega[0]->id);
            $ingredientesEnLaBodega->cantidad = $cantidadFinal;
            $ingredientesEnLaBodega->save();
        }

        $pedido = Pedidos::find($id_pedido);
        $pedido->receta_id = $id_receta;
        $pedido->status_pedido_id = 3;
        $pedido->save();

        event(new MessageEvent('Order preparada con existo.'));
    }


}
