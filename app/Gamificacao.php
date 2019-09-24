<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gamificacao extends Model
{
    protected $fillable = [
        'banner', 'desc_fases_pontos', 'desc_desafios_estrategias',
        'desc_medalhas', 'desc_ranking_premiacao', 'disciplina_id'
    ];


    public function disciplina()
    {
        return $this->belongsTo(Disciplina::class);
    }

}
