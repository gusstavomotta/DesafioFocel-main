@extends('layouts.app')

@section('title', 'Cadastrar Novo Problema')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h3>Cadastrar Novo Problema</h3>
            </div>
            <div class="card-body">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Por favor, corrija os erros abaixo:</strong>
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('problema.submit') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="titulo" class="form-label">Título do Problema:</label>
                        <input type="text" id="titulo" name="titulo" class="form-control" value="{{ old('titulo') }}" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="descricao" class="form-label">Descrição do Problema:</label>
                        <textarea id="descricao" name="descricao" class="form-control" rows="5" required>{{ old('descricao') }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="analise_causa" class="form-label">Análise da Causa:</label>
                        <textarea id="analise_causa" name="analise_causa" class="form-control" rows="5" required>{{ old('analise_causa') }}</textarea>
                    </div>

                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a href="{{ route('home') }}" class="btn btn-secondary me-md-2">Cancelar</a>
                        <button type="submit" class="btn btn-primary">Salvar Problema</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection