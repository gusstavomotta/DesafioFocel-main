<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Problema;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){

        $problemas = [];
        
        if (Auth::check()){
            $problemas = Problema::with(['user', 'acoes'])->latest()->get();
        }
        return view ('home' , ['problemas' => $problemas]);
    }
}
