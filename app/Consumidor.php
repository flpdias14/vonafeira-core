<?php

namespace projetoGCA;

use Illuminate\Database\Eloquent\Model;

class Consumidor extends Model
{
    public function usuario(){

        $this->hasOne('projetoGCA\User');
    }

    public function grupoConsumo(){
        $this->hasOne('projetoGCA\GrupoConsumo');
    }
}
