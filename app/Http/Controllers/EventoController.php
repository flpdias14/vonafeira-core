<?php

namespace projetoGCA\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use DateTime;
use DateInterval;
use Illuminate\Http\Request;

class EventoController extends Controller
{
    public function adicionar($idGrupoConsumo){
        $dataProximoEvento = new DateTime();
        $grupoConsumo = \projetoGCA\GrupoConsumo::find($idGrupoConsumo);
        $evento = new \projetoGCA\Evento();
        $dataAtual = new DateTime();
        $evento->coordenador_id = $grupoConsumo->coordenador_id;
        $evento->grupoconsumo_id = $grupoConsumo->id;
        $evento->data_inicio_pedidos = $dataAtual->format('Y-m-d');
        $evento->hora_evento = "08:00";
        $ultimoEvento = \projetoGCA\Evento::where('grupoconsumo_id', '=', $grupoConsumo->id)->orderBy('id', 'DESC')->first();
        // return var_dump(empty($ultimoEvento));
        if(!is_null($ultimoEvento)){
            $dataUltimoEvento = new DateTime($ultimoEvento->data_evento);
            if($dataAtual < $dataUltimoEvento){
                return "<h1>Existe um evento a ser realizado</h1>";
            }
            $dataProximoEvento = $dataUltimoEvento;
        }
        else{
            $dataProximoEvento = new DateTime($grupoConsumo->dia_semana);
        }
        if($grupoConsumo->periodo == 'Semanal'){
            // incrementa a data em uma semana
            if($dataAtual >= $dataProximoEvento){
                $dataProximoEvento->modify('+1 week');
            }
            $evento->data_evento = $dataProximoEvento->format('Y-m-d');
            // calcula a data limite dos pedidos de venda
            $intervalo = new DateInterval("P{$grupoConsumo->prazo_pedidos}D");
            $dataProximoEvento->sub($intervalo);
            // adiciona a data limite de pedidos e salva
            // return var_dump($dataProximoEvento);
            $evento->data_fim_pedidos = $dataProximoEvento->format('Y-m-d');
            $evento->save();
        }
        elseif($grupoConsumo->periodo == 'Mensal'){
            // incrementa a data em um mês
            $dataProximoEvento->modify('+1 month');
            $evento->data_evento->$dataProximoEvento;
            // calcula o intervalo limite de pedidos
            $dataPadrao = new DateTime($grupoConsumo->dia_semana);
            $dataPedidos = new DateTime($grupoConsumo->data_pedidos);
            $intervalo = $dataPadrao->diff($dataPedidos);
            $dataProximoEvento->sub($intervalo);
            // adiciona a data limite de pedidos e salva;
            $evento->data_fim_pedidos = $dataProximoEvento;
            $evento->save();
        }
        return redirect("/eventos".$grupoConsumo->id);

    }

    public function cadastrar(Request $request){
        $evento = new \projetoGCA\Evento();
        $evento->data_inicio_pedidos = $request->data_inicio_pedidos;
        $evento->data_fim_pedidos = $request->data_fim_pedidos;
        $evento->data_evento = $request->data_evento;
        $evento->hora_evento = $request->hora_evento;
        $user = \projetoGCA\User::where('email','=',$request->email)->first();
        $evento->coordenador_id = $request->grupoconsumo_id;
        $evento->save();
        return redirect("/eventos");
    }

    public function listar($idGrupoConsumo){
        if(Auth::check()){
            $eventos = \projetoGCA\Evento::where('grupoconsumo_id', '=', $idGrupoConsumo)->get();
            return view("evento.eventos", ['eventos' => $eventos]);  
        }
        return view("/home");
    }
}
