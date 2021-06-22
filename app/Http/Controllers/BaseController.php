<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BaseController extends Controller
{
    public function all($table){
        return $table::where('status_id', '!=', '2')->get();
    }
}
