<?php

namespace projetoGCA;

use Illuminate\Database\Eloquent\Model;

class GrupoConsumo extends Model
{
    public function coordenador(){
        return $this->hasOne('projetoGCA\User');
    }
}
