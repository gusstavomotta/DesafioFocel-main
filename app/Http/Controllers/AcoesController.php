<?php

namespace App\Http\Controllers;

use App\Models\Problema;
use Illuminate\Http\Request;

class AcoesController extends Controller
{
    public function cadastrar(Request $request, Problema $problema){

        $dadosValidados = $request->validate([
            'o_que'   => 'required|string|max:255',
            'por_que' => 'required|string',
            'onde'    => 'required|string|max:255',
            'quem'    => 'required|string|max:255',
            'quando'  => 'required|date',
            'como'    => 'required|string',
        ]);

        $problema->acoes()->create($dadosValidados);
        return back()->with('success_action', 'Ação adicionada com sucesso!');

    }
}
