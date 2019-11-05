<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipe extends Model
{
    protected $fillable = [
        'nome', 'logo', 'disciplina_id'
    ];

    public function disciplina()
    {
        return $this->belongsTo(Disciplina::class);
    }

    public function matricula()
    {
        return $this->hasMany(Matricula::class);
    }

    public function ranking(){
        return $this->hasOne(Ranking::class);
    }
}
