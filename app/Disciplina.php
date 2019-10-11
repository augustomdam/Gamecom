<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Disciplina extends Model
{
    protected $fillable = [
        'nome', 'curso', 'semestre', 'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function pagina()
    {
        return $this->hasOne(Pagina::class);
    }
    public function gamificacacoes()
    {
        return $this->hasOne(Gamificacao::class);
    }
    public function equipes()
    {
        return $this->hasMany(Equipe::class);
    }
    public function fases()
    {
        return $this->hasMany(Fase::class);
    }

    public function matriculas()
    {
        return $this->hasMany(Matricula::class);
    }

}
