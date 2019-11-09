<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medalha extends Model
{
   protected $fillable = [
        'nome', 'imagem', 'descricao', 'disciplina_id',
   ];

   public function fase()
   {
       return $this->belongsTo(Fase::class);
   }

   public function disciplina(){
       return $this->belongsTo(Disciplina::class);
   }

}
