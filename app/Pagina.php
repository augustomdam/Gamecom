<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pagina extends Model
{
    protected $fillable = [
        'titulo', 'banner', 'corpo', 'tipo', 'disciplina_id',
    ];

    public function disciplina()
    {
        return $this->belongsTo(Disciplina::class);
    }
}
