<?php

namespace projetoGCA;

use Illuminate\Database\Eloquent\Model;

class GrupoConsumo extends Model
{
    public function coordenador(){
        return $this->hasOne('projetoGCA\User');
    }

    public function consumidor(){
        return $this->belongsTo('projetoGCA\Consumidor');
    }
}
