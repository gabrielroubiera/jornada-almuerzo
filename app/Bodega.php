<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bodega extends Model
{
    protected $table = "bodega";
    protected $fillable = ['ingrediente', 'cantidad', 'status_id'];
    protected $hidden = ['status_id', 'created_at', 'updated_at'];

    public function getStatusRelation(){
        return $this->hasOne('\App\Status', 'status_id', 'id');
    }
}
