<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Carro;
use App\Marca;

class CarroController extends Controller
{

  public function __construct()
      {
          $this->middleware('auth');
      }
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

        //$dados = Carro::all();
        $dados = Carro::paginate(6);

        $dados->lastItem();

        $soma = Carro::sum('preco');

        return view('admin.carros_list', ['carros' => $dados, 'soma' => $soma]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // informações auxiliares que serão utilizadas no form de cadastro
        $marcas = Marca::orderBy('nome')->get();
        $combust = Carro::combust();

        return view('admin.carros_form',
                    ['marcas'=>$marcas, 'comb'=>$combust, 'acao' => 1]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'modelo' => 'min:2|max:40',
            'ano' => 'numeric|min:1970|max:2020'
        ]);

        // obtém todos os campos do formulário
        $dados = $request->all();

        // Se o campo foto foi preenchido e enviado (Válido)
        if ($request->hasFile('foto') && $request->file('foto')->isValid()) {
          // Salva o arquivo e retorna um id único
          $path = $request->file('foto')->store('fotos');

          $dados['foto'] = $path;  

        }

        $inc = Carro::create($dados);

        if ($inc) {
            return redirect()->route('carros.index')
                   ->with('status', $request->modelo . ' inserido com sucesso!');
        }
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
        // posiciona no registro a ser alterado e obtém seus dados
        $reg = Carro::find($id);

        $marcas = Marca::orderBy('nome')->get();

        $combustiveis = Carro::combust();

        return view('admin.carros_form', ['reg' => $reg, 'marcas' => $marcas,
                                          'acao' => 2,
                                          'comb' => $combustiveis]);
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
        // obtém os dados do form
        $dados = $request->all();

        // posiciona no registo a ser alterado
        $reg = Carro::find($id);

        if ($request->hasFile('foto') && $request->file('foto')->isValid()) {
            // Salva o arquivo e retorna um id único
            if (Storage::exists($reg->foto)) {
                Storage::delete($reg->foto);
            }

            $path = $request->file('foto')->store('fotos');
  
            $dados['foto'] = $path;  
  
          }


        // realiza a alteração
        $alt = $reg->update($dados);

        if ($alt) {
            return redirect()->route('carros.index')
                            ->with('status', $request->modelo . ' Alterado!');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $car = Carro::find($id);
        
        if (Storage::exists($car->foto)){
            Storage::delete($car->foto);
        }

        if ($car->delete()) {
            return redirect()->route('carros.index')
                            ->with('status', $car->modelo . ' Excluído!');
        }
    }

    public function graf() {
        $sql = "select m.nome as marca, 
                count(c.id) as num from carros c inner join marcas m 
                on c.marca_id = m.id group by m.nome";

        $dados = DB::select($sql);

        return view('admin.carros_graf', ['dados' => $dados]);
    }
    public function destaque($id){
        $car = Carro::find($id);
        
        if ($car->destaque == "*") {
            $destaque = "";
        } else {
            $destaque = "*";
        }

        $dest = DB::update('update carros set destaque = ? where id = ?', [$destaque, $id]);

        if ($dest) {
            return redirect()->route('carros.index')->with('status', ($destaque == "*" ? $car->modelo . ' Destacado' 
                :$car->modelo . ' Fora do destaque'));
        }
    }

}
