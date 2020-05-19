<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RankingEquipe extends Model
{
    protected $fillable = [
        'ponto_total',
        'user_id',
        'disciplina_id',
        'equipe_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function disciplina(){
        return $this->belongsTo(Disciplina::class);
    }

    public function equipe(){
        return $this->belongsTo(Equipe::class);
    }

}
