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
    public function __invoke(Request $request){

        // Agregar pedido a la base de datos y ponerlo en cola

        $pedidos = [
            'status_pedido_id' => 1,
            'receta_id' => 0,
            'status_id' => 1,
            'created_at' => Carbon::now()
        ];

        // Obtener id del dato insertado
        $insertPedido = DB::table('pedidos')->insertGetId($pedidos);

        // Validate if there are all the ingredients at bodega
        $recetas = $this->all(Recetas::class);
        $numero_recetas = count($recetas);
        $id_receta = rand(1, $numero_recetas);

        $ingredientes_receta = IngredientesRecetas::where('status_id', 1)->where('receta_id', $id_receta)->get();
        $ingredientes = [];

        for($i = 0; $i < count($ingredientes_receta); $i++){
            array_push($ingredientes, $ingredientes_receta[$i]);
        }

        function verificarIngredientes($ingredientes){
            $ingredientesPendientes = [];
            for($i = 0; $i < count($ingredientes); $i++) {
                $ingredienteEnBodega = Bodega::where('status_id', 1)->where('ingrediente', $ingredientes[$i]->ingrediente)->get();
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

        $confirmacion = verificarIngredientes($ingredientes);


//         Validate if there are not all the ingredients at bodega, buy at the market

        if($confirmacion){
            $pedido = Pedidos::find($insertPedido);
            $pedido->receta_id = $id_receta;
            $pedido->status_pedido_id = 3;
            $pedido->save();
        }

        return 'ok';
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
