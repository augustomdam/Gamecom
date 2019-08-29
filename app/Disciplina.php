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
}
