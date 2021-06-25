<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedidos extends Model
{
    public function getStatusRelation(){
        return $this->hasOne('\App\Status', 'status_id', 'id');
    }
}
