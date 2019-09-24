<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matricula extends Model
{
    protected $fillable = [
        'disciplina_id',
        'user_id',
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
