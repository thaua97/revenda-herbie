<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Teste;
use App\Carro;

class TesteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dados = Teste::all();

        return view('admin.testes', ['testes' => $dados]);
    }
    
    public function graf() {
        $sql = "select modelo from testes count(modelo)";

        $dados = DB::select($sql);

        return view('admin.teste_graf', ['dados' => $dados]);
    }

        public function ws($id = null) {
            // indica o tipo de retorno do método
            header("Content-type: application/json; charset=utf-8");
        
            // verifica se $id não foi passado
            if ($id == null) {
                $retorno = array (
                    "situacao" => "url incorreta",
                    "nome" => null,
                    "email" => null,
                    "modelo" => null,
                    "data" => null,
                    "carro_id" => null
                );  
            } else {
            // busca o carro cujo id foi passado por parâmetro
            $reg = Teste::find($id);
            
            // verifica se encontrou o registro
            if (isset($reg)) {
                $retorno = array(
                    "situacao" => "encontrado",
                    "nome" => $reg->nome,
                    "email" => $reg->email,
                    "modelo" => $reg->modelo,
                    "data" => $reg->data,
                    "carro_id" => $reg->carro_id
                ); 
            } else {
                $retorno = array(
                    "situacao" => "inexistente",
                    "nome" => null,
                    "email" => null,
                    "modelo" => null,
                    "data" => null,
                    "carro_id" => null
                ); 
            }

            // converte array para o formato json
            echo json_encode($retorno, JSON_PRETTY_PRINT);
         }

        }

        public function lista($preco = null) {
            // indica o tipo de retorno do método
            header("Content-type: application/xml");
        
            // inicializa a biblioteca SimpleXML
            $xml = new \SimpleXMLElement('<?xml version="1.0" encoding="utf-8"?><carros></carros>');
        
            // se não foi passado $id
            if ($preco == null) {
                $item = $xml->addChild("teste");
                $item->addChild("status", "url incorreta");
                $item->addChild("nome", null);
                $item->addChild("email", null);
                $item->addChild("data", null);
                $item->addChild("carro_id", null);
                $item->addChild("modelo", null);
            } else {
                // realiza a pesquisa
                $reg = Teste::where("data", "==", $data)->get();
        
                // se houver registros
                if (count($reg) > 0) {
                    foreach($reg as $teste) {
                        $item = $xml->addChild("teste");
                        $item->addChild("status", "encontrado");
                        $item->addChild("nome", $teste->nome);
                        $item->addChild("email", $teste->email);
                        $item->addChild("modelo", $teste->modelo);                        
                        $item->addChild("carro_id", $teste->carro_id);                        
                    }
                } else {
                    $item = $xml->addChild("teste");
                    $item->addChild("status", "inexistente");
                    $item->addChild("nome", null);
                    $item->addChild("email", null);
                    $item->addChild("modelo", null);                
                    $item->addChild("carro_id", null);                
                }
            }           
            // retorna os dados no formato xml
            echo $xml->asXML();
        }

        public function relagendamentos(inicio $inicio, fim $fim) {
            $teste = Teste::where("data", "==", $inicio && $fim);

                return \PDF::loadView('admin.reltestes', 
                    ['teste' => $teste])->stream();
        }

}