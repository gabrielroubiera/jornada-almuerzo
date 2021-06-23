<?php

namespace App\Http\Controllers;

use App\HistorialCompraIngredientes;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController as Controller;

class HistorialCompraIngredientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        return HistorialCompraIngredientes::orderBy('id', 'DESC')->where('status_id', 1)->get();
    }

}
