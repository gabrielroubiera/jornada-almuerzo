<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IngredientesRecetas extends Model
{
    protected $hidden = ['status_id', 'created_at', 'updated_at'];

    public function getStatusRelation(){
        return $this->hasOne('\App\Status', 'status_id', 'id');
    }
}
