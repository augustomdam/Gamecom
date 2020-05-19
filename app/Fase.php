<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Pontuacao;

class Fase extends Model
{
    protected $fillable = [
        'ordem', 'nivel','banner', 'nomefase', 'objetivo',
        'pontuacao', 'avaliacao', 'documento', 'prazo',
        'medalha_id', 'disciplina_id',
    ];


    public function disciplina()
    {
        return $this->belongsTo(Disciplina::class);
    }
    public function medalha()
    {
        return $this->belongsTo(Medalha::class);
    }

    public function pontuacaos()
    {
        return $this->hasMany(Pontuacao::class);
    }
}
