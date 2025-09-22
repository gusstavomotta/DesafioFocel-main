@extends('layouts.app')

@section('title', 'Página Inicial')

@section('content')

    {{-- TÍTULO ORIGINAL RESTAURADO --}}
    <div class="text-center mb-5">
        <h1 class="display-5">Bem-vindo ao Sistema de Solução de Problemas</h1>
    </div>

    {{-- Exibe a mensagem de sucesso global --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- Cabeçalho da lista de problemas --}}
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="h4 mb-0">Problemas Cadastrados</h2>
        <a href="{{ route('problema.form') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Cadastrar Novo Problema
        </a>
    </div>

    @forelse ($problemas as $problema)
    <div class="card mb-4" >
        <div class="card-header d-flex justify-content-between align-items-center ">
            
            {{-- TÍTULO E STATUS À ESQUERDA --}}
            <div>
                <h5 class="mb-0 d-inline-block">{{ $problema->titulo }}</h5>
                @if ($problema->acoes->isNotEmpty())
                    <span class="badge bg-success ms-2">Plano Cadastrado</span>
                @else
                    <span class="badge bg-warning text-dark ms-2">Plano Pendente</span>
                @endif
            </div>

            {{-- BOTÕES EDITAR E EXCLUIR MOVIDOS PARA CIMA, À DIREITA --}}
            <div>
                <a href="{{ route('problema.show', $problema) }}" class="btn btn-primary btn-sm">
                <i class="bi bi-eye"></i> Ver Detalhes
            </a>
 
            </div>
        </div>

        <div class="card-body text-start">
            <p><strong>Descrição:</strong> {{ $problema->descricao }}</p>
            <p><strong>Análise da Causa:</strong> {{ $problema->analise_causa }}</p>
            <small class="text-muted">Cadastrado por: {{ $problema->user->nome_completo }} em {{ $problema->created_at->format('d/m/Y H:i') }}</small>
        </div>

        <div class="card-footer text-end">
            {{-- BOTÃO DETALHES MANTIDO EMBAIXO --}}
               @can ('update', $problema)
                    <a href="{{ route('problema.editar', $problema) }}" class="btn btn-warning btn-sm" title="Editar">
                        <i class="bi bi-pencil"></i>
                    </a>
                @endcan
                @can ('delete', $problema)
                    <form action="{{ route('problema.excluir', $problema) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza?')" title="Excluir">
                            <i class="bi bi-trash"></i>
                        </button>
                    </form>
                @endcan
        </div>
    </div>
@empty
    <div class="alert alert-info">
        Ainda não há problemas cadastrados. Clique em "Cadastrar Novo Problema" para começar.
    </div>
@endforelse

    {{-- Botão de Logout --}}
    <div class="text-center mt-5">
        <form action="{{ route('logout.submit') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-secondary">
                <i class="bi bi-box-arrow-right"></i> Sair
            </button>
        </form>
    </div>

@endsection