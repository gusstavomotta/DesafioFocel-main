<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Problema;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests; 

class ProblemaController extends Controller
{
    use AuthorizesRequests;
    
    public function formProblema(){
        return view('problema');
    }

    public function cadastrar(Request $request){
        $request->validate([
            'titulo' => ['required', 'string' , 'max:255'],
            'descricao' => ['required', 'string'],
            'analise_causa' => ['required', 'string'],

        ]);
        Problema::create([
            'titulo' => $request->titulo,
            'descricao' => $request->descricao,
            'analise_causa' => $request->analise_causa,
            'user_id' => Auth::id()
        ]);
        return redirect()->route('home')->with('sucess', 'Problema cadastrado com sucesso!');
    }

    public function editar(Problema $problema){

        $this->authorize('update', $problema);
        return view('problema_edit', ['problema' => $problema]);
    }
    
    public function atualizar(Request $request, Problema $problema){

        $this->authorize('update', $problema);

        $dadosValidados = $request->validate([
            'titulo' => 'required|string|max:255',
            'descricao' => 'required|string',
            'analise_causa' => 'required|string',
        ]);

        $problema->update($dadosValidados);

        return redirect()->route('home')->with('success', 'Problema atualizado com sucesso!');
    }
    
    public function excluir(Problema $problema){

        $this->authorize('delete', $problema);

        $problema->delete();
        return redirect()->route('home')->with('sucess', 'Problema excluído com sucesso!');
    }

        
    public function show(Problema $problema){
        $this->authorize('view', $problema);
        return view ('problema_show', ['problema' => $problema]);

    }
}
