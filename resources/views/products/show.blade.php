@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <!-- Card principal para envolver os detalhes -->
    <div class="card shadow-sm border-0" style="border-radius: 15px; background-color: rgba(255, 255, 255, 0.95);">
        <div class="card-body p-4">
            <!-- Título com ícone e botão voltar -->
            <div class="d-flex align-items-center justify-content-between mb-4">
                <div class="d-flex align-items-center">
                    <i class="bi bi-eye-fill text-info me-2" style="font-size: 1.5rem;"></i>
                    <h2 class="mb-0" style="color: #1e3a8a; font-weight: 600;">Product Information</h2>
                </div>
                <a href="{{ route('products.index') }}" class="btn btn-outline-secondary d-flex align-items-center gap-1" style="border-radius: 10px; font-weight: 500;">
                    <i class="bi bi-arrow-left"></i>
                    Back
                </a>
            </div>

            <!-- Alert de sucesso com ícone (ex: após alguma ação) -->
            @if(session('success'))
                <div class="alert alert-success d-flex align-items-center" role="alert" style="border-radius: 10px; border: none; box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);">
                    <i class="bi bi-check-circle-fill me-2"></i>
                    {{ session('success') }}
                </div>
            @endif

            <!-- Imagem principal, centralizada -->
            @if($product->image)
                <div class="text-center mb-4">
                    <img src="{{ asset('storage/' . $product->image) }}" alt="Product image" class="img-fluid rounded" style="max-width: 300px; max-height: 200px; object-fit: cover; border-radius: 15px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                </div>
            @else
                <div class="text-center mb-4 py-4 bg-light rounded" style="border-radius: 10px;">
                    <i class="bi bi-image" style="font-size: 4rem; color: #adb5bd; opacity: 0.5;"></i>
                    <p class="text-muted mb-0">No image available</p>
                </div>
            @endif

            <!-- Detalhes em grid com ícones -->
            <div class="row g-4">
                <!-- Code -->
                <div class="col-md-6">
                    <div class="d-flex align-items-center p-3 bg-light rounded" style="border-radius: 10px; border-left: 4px solid #1e3a8a;">
                        <i class="bi bi-barcode text-primary me-3" style="font-size: 1.2rem; width: 30px;"></i>
                        <div>
                            <label class="fw-semibold text-muted mb-1" style="font-size: 0.9rem;">Code</label>
                            <p class="mb-0 fw-bold" style="color: #1e3a8a;">{{ $product->code }}</p>
                        </div>
                    </div>
                </div>

                <!-- Name -->
                <div class="col-md-6">
                    <div class="d-flex align-items-center p-3 bg-light rounded" style="border-radius: 10px; border-left: 4px solid #1e3a8a;">
                        <i class="bi bi-tag text-primary me-3" style="font-size: 1.2rem; width: 30px;"></i>
                        <div>
                            <label class="fw-semibold text-muted mb-1" style="font-size: 0.9rem;">Name</label>
                            <p class="mb-0 fw-bold" style="color: #1e3a8a;">{{ $product->name }}</p>
                        </div>
                    </div>
                </div>

                <!-- Quantity -->
                <div class="col-md-6">
                    <div class="d-flex align-items-center p-3 bg-light rounded" style="border-radius: 10px; border-left: 4px solid #1e3a8a;">
                        <i class="bi bi-box text-primary me-3" style="font-size: 1.2rem; width: 30px;"></i>
                        <div>
                            <label class="fw-semibold text-muted mb-1" style="font-size: 0.9rem;">Quantity</label>
                            <p class="mb-0 fw-bold" style="color: #1e3a8a;">{{ $product->quantity }} unid.</p>
                        </div>
                    </div>
                </div>

                <!-- Price -->
                <div class="col-md-6">
                    <div class="d-flex align-items-center p-3 bg-light rounded" style="border-radius: 10px; border-left: 4px solid #1e3a8a;">
                        <i class="bi bi-currency-dollar text-primary me-3" style="font-size: 1.2rem; width: 30px;"></i>
                        <div>
                            <label class="fw-semibold text-muted mb-1" style="font-size: 0.9rem;">Price</label>
                            <p class="mb-0 fw-bold" style="color: #1e3a8a; font-size: 1.1rem;">{{ number_format($product->price, 2, ',', '.') }}</p>
                        </div>
                    </div>
                </div>

                <!-- Description -->
                <div class="col-12">
                    <div class="p-3 bg-light rounded" style="border-radius: 10px; border-left: 4px solid #1e3a8a;">
                        <div class="d-flex align-items-start">
                            <i class="bi bi-card-text text-primary mt-1 me-3" style="font-size: 1.2rem; width: 30px; flex-shrink: 0;"></i>
                            <div class="flex-grow-1">
                                <label class="fw-semibold text-muted mb-2" style="font-size: 0.9rem;">Description</label>
                                <p class="mb-0" style="color: #1e3a8a; line-height: 1.6;">{{ $product->description ?: 'No description provided.' }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Botões de ação adicionais (ex: editar/deletar, se permitido) -->
            <div class="d-flex justify-content-center gap-2 mt-4">
                @can('edit')
                    <a href="{{ route('products.edit', $product) }}" class="btn btn-primary d-flex align-items-center gap-1" style="border-radius: 10px; font-weight: 500;">
                        <i class="bi bi-pencil"></i>
                        Edit
                    </a>
                @endcan
                @can('delete')
                    <form action="{{ route('products.destroy', $product) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Are you sure you want to delete this product?');">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger d-flex align-items-center gap-1" type="submit" style="border-radius: 10px; font-weight: 500;">
                            <i class="bi bi-trash"></i>
                            Delete
                        </button>
                    </form>
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection

<!-- Estilo básico pra hovers e consistência (adicione no <style> do head ou no app.css) -->
<style>
    .card {
        transition: box-shadow 0.3s ease; /* Sombra no hover do card */
    }
    
    .card:hover {
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
    }
    
    .btn:hover {
        transform: translateY(-1px); /* Lift sutil nos botões no hover */
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.15);
        transition: all 0.2s ease;
    }
    
    /* Detalhes: Hover sutil nos itens */
    .bg-light:hover {
        background-color: rgba(0, 123, 255, 0.05);
        transition: background-color 0.2s ease;
        border-left-color: #0d6efd;
    }
    
    /* Responsivo: Em mobile, itens full width e imagem menor */
    @media (max-width: 768px) {
        .row.g-4 > div {
            margin-bottom: 1rem;
        }
        
        .d-flex.justify-content-center {
            flex-direction: column;
            gap: 1rem;
        }
        
        .btn {
            width: 100%;
            justify-content: center;
        }
        
        img.img-fluid {
            max-width: 250px;
            max-height: 150px;
        }
        
        .d-flex.align-items-center.p-3, .d-flex.align-items-start {
            flex-direction: column;
            text-align: center;
            gap: 0.5rem;
        }
        
        .d-flex.align-items-center.p-3 i, .d-flex.align-items-start i {
            width: auto;
            margin-right: 0;
        }
        
        .d-flex.align-items-start .flex-grow-1 {
            text-align: left;
        }
    }
</style>