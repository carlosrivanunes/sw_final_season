@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <!-- Card principal para a lista -->
    <div class="card border-0 shadow-sm" style="border-radius: 10px;">
        <div class="card-body p-4">
            <!-- Título -->
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h2 class="mb-0" style="color: #1e3a8a; font-weight: 600;">
                    Lista de Produtos
                </h2>
                @can('create')
                    <a href="{{ route('products.create') }}" class="btn btn-success d-flex align-items-center gap-1" style="border-radius: 6px; font-weight: 500;">
                        Adicionar Produto
                    </a>
                @endcan
            </div>

            <!-- Alert de sucesso -->
            @if(session('success'))
                <div class="alert alert-success d-flex align-items-center" role="alert" style="border-radius: 6px; border: none;">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Tabela responsiva -->
            <div class="table-responsive">
                <table class="table table-hover table-bordered align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Código</th>
                            <th>Nome</th>
                            <th>Quantidade</th>
                            <th>Preço</th>
                            <th>Imagem</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($products as $product)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $product->code }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->quantity }}</td>
                                <td>R$ {{ number_format($product->price, 2, ',', '.') }}</td>
                                <td>
                                    @if($product->image)
                                        <img src="{{ asset('storage/' . $product->image) }}" alt="Imagem do produto" class="img-thumbnail" style="width: 50px; height: 50px; object-fit: cover; border-radius: 4px;">
                                    @else
                                        <span class="text-muted">-</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="d-flex gap-1 flex-wrap">
                                        <a href="{{ route('products.show', $product) }}" class="btn btn-info btn-sm" title="Ver">
                                            Ver
                                        </a>
                                        @can('edit')
                                            <a href="{{ route('products.edit', $product) }}" class="btn btn-primary btn-sm" title="Editar">
                                                Editar
                                            </a>
                                        @endcan
                                        @can('delete')
                                            <form action="{{ route('products.destroy', $product) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Tem certeza que deseja excluir este produto?');">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-sm" type="submit" title="Excluir">
                                                    Excluir
                                                </button>
                                            </form>
                                        @endcan
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center text-muted py-4">Nenhum produto encontrado.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Paginação -->
            @if($products->hasPages())
                <div class="d-flex justify-content-center mt-4">
                    {{ $products->links() }}
                </div>
            @endif
        </div>
    </div>
</div>

<style>
    .table th {
        border-top: none;
        font-weight: 600;
        color: #1e3a8a;
    }
    
    .table td {
        vertical-align: middle;
    }
    
    .d-flex.gap-1 .btn {
        border-radius: 4px;
        white-space: nowrap;
    }
    
    .card {
        transition: box-shadow 0.2s ease;
    }
    
    .card:hover {
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }
    
    /* Responsivo: Em mobile, ações em stack com largura total */
    @media (max-width: 768px) {
        .d-flex.gap-1 {
            flex-direction: column;
            gap: 0.5rem;
        }
        
        .d-flex.gap-1 .btn {
            width: 100%;
        }
        
        .table-responsive {
            font-size: 0.9rem;
        }
    }
</style>
@endsection