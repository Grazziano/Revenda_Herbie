<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Carro;

class xmlcontroller extends Controller
{
    public function xmlCarro($id = null) {
        // indica o tipo de retorno
        header("Content-type: application/xml");
        // inicializa a biblioteca SimpleXML
        $x = new \SimpleXMLElement(
                '<?xml version="1.0" encoding="utf-8"?>'
                . '<carros></carros>');
        // se id não foi informado
        if ($id == null) {
            $dados = $x->addChild("carro");
            $dados->addChild("status", "url incorreta");
            $dados->addChild("modelo", null);
            $dados->addChild("ano", null);
            $dados->addChild("preco", null);
        } else {
            // busca o veiculo cujo id foi infomado como parametro
                $reg = Carro::find($id);
            if (isset($reg)) {
                $dados = $x->addChild("carro");
                $dados->addChild("status", "encontrado");
                $dados->addChild("modelo", $reg->modelo);
                $dados->addChild("ano", $reg->ano);
                $dados->addChild("preco", $reg->preco);
            } else {
                $dados = $x->addChild("carro");
                $dados->addChild("status", "inexistente");
                $dados->addChild("modelo", null);
                $dados->addChild("ano", null);
                $dados->addChild("preco", null);
            }
        }
        // retorna os dados no formato xml
        echo $x->asXML();
    }
}
