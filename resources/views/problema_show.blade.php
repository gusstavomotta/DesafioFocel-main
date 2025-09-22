@extends('layouts.app')

@section('title', 'Detalhes: ' . $problema->titulo)

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0">{{ $problema->titulo }}</h1>
        <a href="{{ route('home') }}" class="btn btn-secondary btn-sm">← Voltar para a lista</a>
    </div>

    <div class="card mb-4">
        <div class="card-header">
            Detalhes do Problema
        </div>
        <div class="card-body">
            <p class="text-muted"><small>Cadastrado por: <strong>{{ $problema->user->nome_completo }}</strong> em {{ $problema->created_at->format('d/m/Y \à\s H:i') }}</small></p>
            
            <h5 class="mt-3">Descrição</h5>
            <p class="card-text">{{ $problema->descricao }}</p>

            <h5 class="mt-3">Análise de Causa</h5>
            <p class="card-text">{{ $problema->analise_causa }}</p>
        </div>
    </div>
    
    <div class="card">
        <div class="card-header">
            <h2 class="h4 mb-0">Plano de Ação (5W1H)</h2>
        </div>
        <div class="card-body">
            @if ($problema->acoes->isEmpty())
                <h3 class="h5">Adicionar Nova Ação</h3>
                <form action="{{ route('acoes.submit', $problema) }}" method="POST" class="mt-3">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="o_que" class="form-label">O quê será feito?</label>
                            <input type="text" id="o_que" name="o_que" class="form-control" value="{{ old('o_que') }}" required>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="por_que" class="form-label">Por quê?</label>
                            <textarea id="por_que" name="por_que" class="form-control" required>{{ old('por_que') }}</textarea>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="onde" class="form-label">Onde?</label>
                            <input type="text" id="onde" name="onde" class="form-control" value="{{ old('onde') }}" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="quem" class="form-label">Quem (Responsável)?</label>
                            <input type="text" id="quem" name="quem" class="form-control" value="{{ old('quem') }}" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="quando" class="form-label">Quando (Prazo)?</label>
                            <input type="date" id="quando" name="quando" class="form-control" value="{{ old('quando') }}" required>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="como" class="form-label">Como?</label>
                            <textarea id="como" name="como" class="form-control" required>{{ old('como') }}</textarea>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Adicionar Plano de Ação</button>
                </form>

            @else
            <h3 class="h5 mb-3">Ações Propostas:</h3>

            @foreach ($problema->acoes as $acao)
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">{{ $acao->o_que }}</h5>
                        <hr>
                        <div class="row">
                            <div class="col-md-4">
                                <p class="mb-1"><strong>Quem (Responsável):</strong></p>
                                <p class="text-muted">{{ $acao->quem }}</p>
                            </div>
                            <div class="col-md-4">
                                <p class="mb-1"><strong>Onde:</strong></p>
                                <p class="text-muted">{{ $acao->onde }}</p>
                            </div>
                            <div class="col-md-4">
                                <p class="mb-1"><strong>Quando (Prazo):</strong></p>
                                <p class="text-muted">{{ \Carbon\Carbon::parse($acao->quando)->format('d/m/Y') }}</p>
                            </div>
                        </div>
                        <hr>
                        <p class="mb-1"><strong>Por Quê:</strong></p>
                        <p class="text-muted">{{ $acao->por_que }}</p>

                        <p class="mb-1 mt-3"><strong>Como:</strong></p>
                        <p class="text-muted">{{ $acao->como }}</p>
                    </div>
                </div>
            @endforeach

@endif
        </div>
    </div>
@endsection