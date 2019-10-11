<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medalha extends Model
{
   protected $fillable = [
        'nome', 'imagem', 'descricao',
   ];

   public function fase()
   {
       return $this->belongsTo(Fase::class);
   }

}
