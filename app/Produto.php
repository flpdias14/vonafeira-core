<?php

namespace projetoGCA;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    public function unidadeVenda(){

        $this->hasOne('projetoGCA\UnidadeVenda');
    }

    public function grupoConsumo(){
        $this->hasOne('projetoGCA\GrupoConsumo');
    }
}
