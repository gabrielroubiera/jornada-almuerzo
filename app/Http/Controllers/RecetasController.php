<?php

namespace App\Http\Controllers;

use App\Recetas;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController as Controller;

class RecetasController extends Controller
{
    public function __invoke()
    {
        $recetasAll = $this->all(Recetas::class);
        $recetas = [];
        for($i = 0; $i < count($recetasAll); $i++){
            $ingredientes = $this->repiceIngredients($recetasAll[$i]->id);
            $array = [
                'receta' => $recetasAll[$i]->nombre,
                'ingredientes' => $ingredientes
            ];
            array_push($recetas, $array);
        }
        return response()->json($recetas);
    }
}
