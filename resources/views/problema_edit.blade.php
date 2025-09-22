@extends('layouts.app')

@section('title', 'Editar Problema')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h3>Editar Problema</h3>
            </div>
            <div class="card-body">

                <form action="{{ route('problema.atualizar', $problema) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="titulo" class="form-label">Título do Problema:</label>
                        <input type="text" id="titulo" name="titulo" class="form-control" value="{{ old('titulo', $problema->titulo) }}" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="descricao" class="form-label">Descrição do Problema:</label>
                        <textarea id="descricao" name="descricao" class="form-control" rows="5" required>{{ old('descricao', $problema->descricao) }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="analise_causa" class="form-label">Análise da Causa:</label>
                        <textarea id="analise_causa" name="analise_causa" class="form-control" rows="5" required>{{ old('analise_causa', $problema->analise_causa) }}</textarea>
                    </div>

                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a href="{{ route('problema.show', $problema) }}" class="btn btn-secondary me-md-2">Cancelar</a>
                        <button type="submit" class="btn btn-primary">Atualizar Problema</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection