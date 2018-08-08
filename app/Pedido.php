<?php

namespace projetoGCA;

use Illuminate\Database\Eloquent\Model;
use \projetoGCA\ItemPedido;
use \projetoGCA\Consumidor;
use \projetoGCA\Evento;

class Pedido extends Model
{
    public function itens(){
        return $this->hasMany(ItemPedido::class, "id", "pedido_id");
    }

    public function consumidor(){
        return $this->belongsTo(Consumidor::class, "consumidor_id");
    }

    public function evento(){
        return $this->belongsTo(Evento::class, "evento_id");
    }
}
