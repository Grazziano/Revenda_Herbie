<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Parceiros;
use Illuminate\Support\Facades\Auth;
use App\Marca;
use Illuminate\Support\Facades\DB;

class ParceirosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Auth::check()) {
            return redirect("/home");       
        }

                
        // $dados = Parceiros::all();
        $dados = Parceiros::paginate(5);

        return view('admin.parceiros_list', ['parceiros' => $dados]);
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
        $par = Parceiros::find($id);

        if ($par->delete()) {
            return redirect()->route('parceiros.index')
                    ->with('status', 'Parceiro ' . $par->nome . ' excluído!');
        } 
    }



    public function json($id=null){
        //indica o tipo de retorno do método
        header("Content-type: application/json; carset=utf-8");
    
        //verifica se id foi (ou não) passado
        if($id==null){
            $retorno = array("status" => "url incorreta",
                            "nome" => null,
                            "marca" => null,
                            "cidade" => null,
                            "fone" => null);
        }else{
            //busca o registro
            $reg = Parceiros::find($id);
    
            //se encontrado
            if(isset($reg)){
                $retorno = array("status" => "encontrado",
                            "nome" => $reg->nome,
                            "marca" => $reg->marca,
                            "cidade" => $reg->cidade,
                            "fone" => $reg->fone);
            }else{
                $retorno = array("status" => "inexistente",
                            "nome" => null,
                            "marca" => null,
                            "cidade" => null,
                            "fone" => null);
            }
        }
        // converte array para formato json
        echo json_encode($retorno, JSON_PRETTY_PRINT);
        }
    
        public function xml($id = null){
            //indica o tipo de retorno
            header("Content-type: application/xml");
            
            //adiciona parceiros ao XML
            $xml = new \SimpleXMLElement('<?xml version="1.0" encoding="utf-8"?><parceiros></parceiros>');
    
            //verifica se $id não foi passado
            if ($id == null){
                //seria um filho do parceiros que estamos buscando na linha de cima
                $item = $xml->addChild('parceiro');
                //atributos deste registro
                $item -> addChild("status","url incorreta");
                $item -> addChild("nome",null);
                $item -> addChild("marca",null);
                $item -> addChild("cidade",null);
                $item -> addChild("fone",null);
            }else {
                //busca o veículo cujo id foi passado como parâmetro
                $reg = Parceiros::where("id","<=", $id)->get();
                
                //se existe
                if (isset($id)) {
                    foreach ($reg as $c){
                        $item = $xml->addChild('parceiro');
                        $item -> addChild("status","Encontrado");
                        $item -> addChild("nome","$c->nome");
                        $item -> addChild("marca","$c->marca");
                        $item -> addChild("cidade","$c->cidade");
                        $item -> addChild("fone","$c->fone");
                    }
                }else {
                    $item = $xml->addChild('parceiro');
                    $item -> addChild("status","Inexistente");
                    $item -> addChild("nome",null);
                    $item -> addChild("marca",null);
                    $item -> addChild("cidade",null);
                    $item -> addChild("fone",null);
                }
            }
            //retorna os dados no format XML
            echo $xml->asXML();
        }

    public function lista($cidade = null){
        //indica o tipo de retorno
        header("Content-type: application/xml");
        
        //adiciona parceiros ao XML
        $xml = new \SimpleXMLElement('<?xml version="1.0" encoding="utf-8"?><parceiros></parceiros>');

        //verifica se $id não foi passado
        if ($cidade == null){
            //seria um filho do parceiros que estamos buscando na linha de cima
            $item = $xml->addChild('parceiro');
            //atributos deste registro
            $item -> addChild("status","url incorreta");
            $item -> addChild("nome",null);
            $item -> addChild("marca",null);
            $item -> addChild("cidade",null);
            $item -> addChild("fone",null);
        }else {
            //busca os parceiros cuja cidade seja igual o consultado
            $parceiros = Parceiros::where("cidade","=",$cidade)->get();
            
            //se existe imprime
            if(count($parceiros) > 0){
                foreach($parceiros as $p){
                $item = $xml->addChild('parceiro');
                $item -> addChild("status","encontrado");
                $item -> addChild("nome","$p->nome");
                $item -> addChild("marca","$p->marca");
                $item -> addChild("cidade","$p->cidade");
                $item -> addChild("fone","$p->fone");
                }
            }else {
                $item = $xml->addChild('parceiro');
                $item -> addChild("status","inexistente");
                $item -> addChild("nome",null);
                $item -> addChild("marca",null);
                $item -> addChild("cidade",null);
                $item -> addChild("fone",null);
            }
        }
        //retorna os dados no format XML
        echo $xml->asXML();
    }

    public function relParceiros(){
        $parceiros = Parceiros::all();

        //stream exibe o relatório, está lá na rota do PDF
        return \PDF::loadView('admin.relatorio_parceiros',['parceiros'=>$parceiros])->stream();
    }

    public function consulta(){

        return view('admin.pconsulta');
    }

    public function relPar(Request $request) {
        $cidade = $request->cidade;

        $filtro = array();

        if (!empty($cidade)) {
            array_push($filtro, array('cidade','like', '%'.$cidade.'%'));
        }

        $parceiros = Parceiros::where($filtro)
            ->orderBy('cidade')
            ->paginate(5);

            return \PDF::loadView('admin.relatorio_parceiros',['parceiros'=>$parceiros])->stream();
    }

}
