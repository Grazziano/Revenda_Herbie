<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mecanico;

class mecController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function mecId($id = null){
         //indica o tipo de retorno do metodo
         header("Content-type: application/json; charset=utf-8");

         // verifica se o id foi (ou nao) passado
         if ($id == null) {
             $retorno = array(
                 "status" => "Url Incorreta",
                 "nome" => null,
                 "endereco" => null,
                 "especialidade" => null,
                 "telefone" => null);
         } else {
             // busca o registro
             $reg = Mecanico::find($id);
 
             // se encontrado
             if (isset($reg)) {
                $retorno = array(
                    "status" => "Encontrado",
                    "nome" => $reg->nome,
                    "endereco" => $reg->endereco,
                    "especialidade" => $reg->especialidade,
                    "telefone" => $reg->telefone);
             } else {
                 $retorno = array(
                     "status" => "Inexistente",
                     "nome" => null,
                     "endereco" => null,
                     "especialidade" => null,
                     "telefone" => null);
             }
 
 
         }
 
         // converte array para o formato json
         echo json_encode($retorno, JSON_PRETTY_PRINT);
        }
         public function listarMecanicos($palavra = null){

            // indica o tipo de retorno
        header("Content-type: application/xml");
        // inicializa a biblioteca SimpleXML
        $xml = new \SimpleXMLElement(
                '<?xml version="1.0" encoding="utf-8"?>'
                . '<mecanicos></mecanicos>');
        // se id não foi informado
        if ($palavra == null) {
            $dados = $xml->addChild("mecanico");
            $dados->addChild("status", "url incorreta");
            $dados->addChild("nome", null);
            $dados->addChild("endereco", null);
            $dados->addChild("especialidade", null);
            $dados->addChild("telefone", null);
        } else {
            // busca o veiculo cujo id foi infomado como parametro
                $mecanicos = Mecanico::where("nome","like", $palavra)->get();
            if (count($mecanicos)>0) {
                foreach($mecanicos as $c){
                    $dados = $xml->addChild("mecanico");
                    $dados->addChild("status", "encontrado");
                    $dados->addChild("nome", $c->nome);
                    $dados->addChild("endereco", $c->endereco);
                    $dados->addChild("especialidade", $c->especialidade);
                    $dados->addChild("telefone", $c->telefone);  
                }
                
            } else {
                $dados = $xml->addChild("mecanico");
                    $dados->addChild("status", "url inexistente");
                    $dados->addChild("nome", null);
                    $dados->addChild("endereco", null);
                    $dados->addChild("especialidade", null);
                    $dados->addChild("telefone", null); 
            }
        }
        // retorna os dados no formato xml
        echo $xml->asXML();
         }
    } 
