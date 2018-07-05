<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Carro;

class wsController extends Controller
{
    public function listaxml($preco = null) {
        header("Content-type: application/xml");
        $xml = new \SimpleXMLElement('<?xml version="1.0" encoding="utf-8"?><carros></carros>');

        if ($preco == null) {
            $item = $xml->addChild('carro');
            $item->addChild("status", "url incorreta");
            $item->addChild("modelo", null);
            $item->addChild("ano", null);
            $item->addChild("preco", null);
        } else {
            $carros = Carro::where("preco", "<=", $preco)->get();

            if (count($carros) > 0) {
                foreach ($carros as $c) {
                    $item = $xml->addChild('carro');
                    $item->addChild("status", "encorreta");
                    $item->addChild("modelo", $c->modelo);
                    $item->addChild("ano", $c->ano);
                    $item->addChild("preco", $c->preco);
                }
       
            } else {
                $item = $xml->addChild('carro');
                $item->addChild("status", "inexistente");
                $item->addChild("modelo", null);
                $item->addChild("ano", null);
                $item->addChild("preco", null);
            }
            

        }

        echo $xml->asXML();

    }

    public function wsxml($id = null) {
        header("Content-type: application/xml");

        $xml = new \SimpleXMLElement('<?xml version="1.0" encoding="utf-8"?><carros></carros>');

        if ($id == null) {
            $item = $xml->addChild('carro');
            $item->addChild("status", "url incorreta");
            $item->addChild("modelo", null);
            $item->addChild("ano", null);
            $item->addChild("preco", null);
        } else {
            $reg = Carro::find($id);

            if (isset($reg)) {
                $item = $xml->addChild('carro');
            $item->addChild("status", "encorreta");
            $item->addChild("modelo", $reg->modelo);
            $item->addChild("ano", $reg->ano);
            $item->addChild("preco", $reg->preco);
       
            } else {
                $item = $xml->addChild('carro');
                $item->addChild("status", "inexistente");
                $item->addChild("modelo", null);
                $item->addChild("ano", null);
                $item->addChild("preco", null);
            }
            

        }

        echo $xml->asXML();

    }

}
