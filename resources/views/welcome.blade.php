@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <p class="text-center mb-5 text-muted">Acesse o gerenciamento de produtos e roupas abaixo.</p>
        </div>
    </div>
    
    <div class="row justify-content-center g-4">
        <!-- Card para Produtos -->
        <div class="col-md-5">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body text-center p-4">
                    <h5 class="card-title mb-3">Gerenciar Produtos</h5>
                    <p class="card-text text-muted mb-4">Adicione, edite e visualize seus produtos.</p>
                    <a href="{{ route('products.index') }}" class="btn btn-primary w-100">Ir para Produtos</a>
                </div>
            </div>
        </div>
        
        <!-- Card para Roupas -->
        <div class="col-md-5">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body text-center p-4">
                    <h5 class="card-title mb-3">Gerenciar Roupas</h5>
                    <p class="card-text text-muted mb-4">Adicione, edite e visualize suas roupas.</p>
                    <a href="{{ route('clothes.index') }}" class="btn btn-success w-100">Ir para Roupas</a>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .card {
        border-radius: 10px;
        transition: box-shadow 0.2s ease;
    }
    
    .card:hover {
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }
    
    .btn {
        border-radius: 6px;
        font-weight: 500;
    }
</style>
@endsection