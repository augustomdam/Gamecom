<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pontuacao extends Model
{
    protected $fillable = [
        'ponto_obtido',
        'fase_id',
        'user_id',
        'disciplina_id',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function fase(){
        return $this->belongsTo(Fase::class);
    }

    public function disciplina(){
        return $this->belongsTo(Disciplina::class);
    }
}
