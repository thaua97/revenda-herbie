<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Carro;
use App\Marca;
use App\Teste;

class PubCarroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Carro::orderBy('created_at', 'desc')->get();

        return view('carros.inicio', ['carros' => $data]);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $reg = Carro::find($id);

        $marcas = Marca::orderBy('nome')->get();

        $combustiveis = Carro::combust();

        return view('carros.proposta', ['reg' => $reg, 'marcas' => $marcas,
                                          'comb' => $combustiveis]);
    }
    public function store(Request $request)
    {
        // obtém todos os campos do formulário
        $dados = $request->all();

        $inc = Teste::create($dados);

        if ($inc) {
            return redirect()->route('site.index')
                   ->with('status', $request->modelo . ' Teste Driver cadastrado com sucesso!');
        }
    }

    public function search(Request $request)
    {

      $data = Carro::where('preco', 'like',
                  '%'.$request->pesq.'%')->get();

        return view('carros.inicio', ['carros' => $data, 'pesq' => $request->pesq]);

    }
}