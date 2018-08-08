<?php

namespace projetoGCA;

use Illuminate\Database\Eloquent\Model;

class Consumidor extends Model
{
    protected $table = 'consumidors';
    public function usuario(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function grupoConsumo(){
        return $this->belongsTo(GrupoConsumo::class, "grupo_consumo_id");
    }
}
