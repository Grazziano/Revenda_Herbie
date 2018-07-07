<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Carro;

class wscontroller extends Controller
{
    public function wsCarro($id=null) {

        //indica o tipo de retorno do metodo
        header("Content-type: application/json; charset=utf-8");

        // verifica se o id foi (ou nao) passado
        if ($id == null) {
            $retorno = array(
                "status" => "Url Incorreta",
                "modelo" => null,
                "ano" => null,
                "preco" => null);
        } else {
            // busca o registro
            $reg = Carro::find($id);

            // se encontrado
            if (isset($reg)) {
                $retorno = array(
                    "status" => "Encontrado",
                    "modelo" => $reg->modelo,
                    "ano" => $reg->ano,
                    "preco" => $reg->preco);
            } else {
                $retorno = array(
                    "status" => "Inexistente",
                    "modelo" => null,
                    "ano" => null,
                    "preco" => null);
            }


        }

        // converte array para o formato json
        echo json_encode($retorno, JSON_PRETTY_PRINT);
        
    }

    public function wsxml($id = null){
        // indica o tipo de retorno
        header("Content-type: application/xml");

         // inicializa a biblioteca SimpleXML
         $xml = new \SimpleXMLElement('<?xml version="1.0" encoding="utf-8"?> 
                                                        <carros></carros>');

    // se id não foi informado
    if ($id == null) {
        $item = $xml->addChild("carro");
        $item->addChild("status", "url incorreta");
        $item->addChild("modelo", null);
        $item->addChild("ano", null);
        $item->addChild("preco", null);
    } else {
        // busca o veiculo cujo id foi infomado como parametro
        $reg = Carro::find($id);
        if (isset($reg)) {
            $item = $xml->addChild("carro");
            $item->addChild("status", "encontrado");
            $item->addChild("modelo", $reg->modelo);
            $item->addChild("ano", $reg->ano);
            $item->addChild("preco", $reg->preco);
        } else {
            $item = $xml->addChild("carro");
            $item->addChild("status", "inexistente");
            $item->addChild("modelo", null);
            $item->addChild("ano", null);
            $item->addChild("preco", null);
        }
    }
        // retorna os item no formato xml
        echo $xml->asXML();
    }

    public function listaxml($preco = null){
        // indica o tipo de retorno
        header("Content-type: application/xml");

         // inicializa a biblioteca SimpleXML
         $xml = new \SimpleXMLElement('<?xml version="1.0" encoding="utf-8"?> 
                                                        <carros></carros>');

    // se id não foi informado
    if ($preco == null) {
        $item = $xml->addChild("carro");
        $item->addChild("status", "url incorreta");
        $item->addChild("modelo", null);
        $item->addChild("ano", null);
        $item->addChild("preco", null);
    } else {
        // busca os veiculos cujo preco foi infomado como parametro
        $carros = Carro::where("preco","<=", $preco)->get();

        if (count($preco) > 0) {
            foreach ($carros as $c){
                $item = $xml->addChild("carro");
                $item->addChild("status", "encontrado");
                $item->addChild("modelo", $c->modelo);
                $item->addChild("ano", $c->ano);
                $item->addChild("preco", $c->preco);
            }
        } else {
            $item = $xml->addChild("carro");
            $item->addChild("status", "inexistente");
            $item->addChild("modelo", null);
            $item->addChild("ano", null);
            $item->addChild("preco", null);
        }
    }
        // retorna os item no formato xml
        echo $xml->asXML();
    }

}
