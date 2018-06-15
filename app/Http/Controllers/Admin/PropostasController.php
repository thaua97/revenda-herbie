<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Proposta;

class PropostasController extends Controller
{

    public function index()
    {
        if (!Auth::check()) {

            return redirect("/home");
    
        }

        $dados = Proposta::paginate(6);

        return view('admin.proposta_lista', ['propostas' => $dados]);

    }
    public function store(Request $request)
    {
        //
    }
    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        //
    }
    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
    public function destaque($id){
        $pro = Proposta::find($id);
        
        if ($pro->destaque == "*") {
            $destaque = "";
        } else {
            $destaque = "*";
        }

        $dest = DB::update('update propostas set destaque = ? where id = ?', [$destaque, $id]);

        if ($dest) {
            return redirect()->route('propostas.index')->with('status', ('Propostas de '. $destaque == "*" ? $car->nome . ' Destacada' 
                :'Prposta de '. $pro->nome . ' Fora do destaque'));
        }
    }
}
