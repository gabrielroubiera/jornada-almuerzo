<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recetas extends Model
{
    protected $hidden = ['status_id', 'created_at', 'updated_at'];

}
