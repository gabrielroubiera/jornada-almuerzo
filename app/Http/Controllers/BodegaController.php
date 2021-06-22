<?php

namespace App\Http\Controllers;

use App\Bodega;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController as Controller;

class BodegaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Bodega[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Http\Response
     */
    public function __invoke()
    {
        return $this->all(Bodega::class);
    }
}
