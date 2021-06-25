<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HistorialCompraIngredientes extends Model
{
    public function getStatusRelation(){
        return $this->hasOne('\App\Status', 'status_id', 'id');
    }
}
