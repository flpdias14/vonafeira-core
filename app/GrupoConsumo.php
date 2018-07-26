<?php

namespace projetoGCA;

use Illuminate\Database\Eloquent\Model;

class GrupoConsumo extends Model
{
    public function cordenador(){
        return $this->hasOne('projetoGCA\User');
    }
}
