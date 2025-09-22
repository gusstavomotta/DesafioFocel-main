<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function formLogin(){
        return view('login');
    }

    public function formCadastro(){
        return view('cadastro');
    }

    public function cadastrarUsuario(Request $request){
        $request->validate([
        'nome_completo' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'max:255', 'unique:users'],
        'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create ([
            'nome_completo' => $request->nome_completo,
            'email' => $request->email,
            'password' => Hash::make($request->password),

        ]);
        Auth::login($user);
        return redirect()->route('home');

    }
    
    public function login(Request $request){

        $dados = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($dados)){
            $request->session()->regenerate();
            return redirect()->route('home');
        }

        return back()->withErrors([
            'email' => 'Email incorreto.'
        ])->onlyInput('email');
    }
    
    public function logout (Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
