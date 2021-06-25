<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class statusPedidos extends Model
{
    public function getStatusRelation(){
        return $this->hasOne('\App\Status', 'status_id', 'id');
    }
}
