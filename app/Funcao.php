<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Funcao extends Model
{

    public function users()
{
    return $this->belongsToMany(User::class,'users_funcaos', 'funcao_id','user_id')
                ->withTimestamps();
}
}
