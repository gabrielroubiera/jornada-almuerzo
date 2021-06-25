<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recetas extends Model
{
    protected $hidden = ['status_id', 'updated_at'];

    public function getStatusRelation(){
        return $this->hasOne('\App\Status', 'status_id', 'id');
    }

}
