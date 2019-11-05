<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Funcao extends Model
{
    protected $fillable = [
        'nome'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class,'users_funcaos', 'funcao_id','user_id')
                ->withTimestamps();
    }

    public function permissaos()
    {
        return $this->belongsToMany(Permissao::class,'funcaos_permissaos', 'funcao_id','permissao_id')
                ->withTimestamps();
    }
}
