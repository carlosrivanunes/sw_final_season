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
                    <h2 class="mb-0" style="color: #1e3a8a; font-weight: 600;">Informações do Carro</h2>
                </div>
                <a href="{{ route('cars.index') }}" class="btn btn-outline-secondary d-flex align-items-center gap-1" style="border-radius: 10px; font-weight: 500;">
                    <i class="bi bi-arrow-left"></i>
                    Voltar
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
            @if($car->image)
                <div class="text-center mb-4">
                    <img src="{{ asset('storage/' . $car->image) }}" alt="Imagem do carro" class="img-fluid rounded" style="max-width: 300px; max-height: 200px; object-fit: cover; border-radius: 15px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                </div>
            @else
                <div class="text-center mb-4 py-4 bg-light rounded" style="border-radius: 10px;">
                    <i class="bi bi-image" style="font-size: 4rem; color: #adb5bd; opacity: 0.5;"></i>
                    <p class="text-muted mb-0">Nenhuma imagem disponível</p>
                </div>
            @endif

            <!-- Detalhes em grid com ícones -->
            <div class="row g-4">
                <!-- Marca -->
                <div class="col-md-6">
                    <div class="d-flex align-items-center p-3 bg-light rounded" style="border-radius: 10px; border-left: 4px solid #1e3a8a;">
                        <i class="bi bi-tag text-primary me-3" style="font-size: 1.2rem; width: 30px;"></i>
                        <div>
                            <label class="fw-semibold text-muted mb-1" style="font-size: 0.9rem;">Marca</label>
                            <p class="mb-0 fw-bold" style="color: #1e3a8a;">{{ $car->brand }}</p>
                        </div>
                    </div>
                </div>

                <!-- Modelo -->
                <div class="col-md-6">
                    <div class="d-flex align-items-center p-3 bg-light rounded" style="border-radius: 10px; border-left: 4px solid #1e3a8a;">
                        <i class="bi bi-car-front text-primary me-3" style="font-size: 1.2rem; width: 30px;"></i>
                        <div>
                            <label class="fw-semibold text-muted mb-1" style="font-size: 0.9rem;">Modelo</label>
                            <p class="mb-0 fw-bold" style="color: #1e3a8a;">{{ $car->model }}</p>
                        </div>
                    </div>
                </div>

                <!-- Ano -->
                <div class="col-md-6">
                    <div class="d-flex align-items-center p-3 bg-light rounded" style="border-radius: 10px; border-left: 4px solid #1e3a8a;">
                        <i class="bi bi-calendar text-primary me-3" style="font-size: 1.2rem; width: 30px;"></i>
                        <div>
                            <label class="fw-semibold text-muted mb-1" style="font-size: 0.9rem;">Ano</label>
                            <p class="mb-0 fw-bold" style="color: #1e3a8a;">{{ $car->year }}</p>
                        </div>
                    </div>
                </div>

                <!-- Cor -->
                <div class="col-md-6">
                    <div class="d-flex align-items-center p-3 bg-light rounded" style="border-radius: 10px; border-left: 4px solid #1e3a8a;">
                        <i class="bi bi-palette text-primary me-3" style="font-size: 1.2rem; width: 30px;"></i>
                        <div>
                            <label class="fw-semibold text-muted mb-1" style="font-size: 0.9rem;">Cor</label>
                            <p class="mb-0 fw-bold" style="color: #1e3a8a;">
                                <span class="badge bg-secondary">{{ $car->color }}</span>
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Preço -->
                <div class="col-md-6">
                    <div class="d-flex align-items-center p-3 bg-light rounded" style="border-radius: 10px; border-left: 4px solid #1e3a8a;">
                        <i class="bi bi-currency-dollar text-primary me-3" style="font-size: 1.2rem; width: 30px;"></i>
                        <div>
                            <label class="fw-semibold text-muted mb-1" style="font-size: 0.9rem;">Preço</label>
                            <p class="mb-0 fw-bold" style="color: #1e3a8a; font-size: 1.1rem;">R$ {{ number_format($car->price, 2, ',', '.') }}</p>
                        </div>
                    </div>
                </div>

                <!-- Quantidade -->
                <div class="col-md-6">
                    <div class="d-flex align-items-center p-3 bg-light rounded" style="border-radius: 10px; border-left: 4px solid #1e3a8a;">
                        <i class="bi bi-box text-primary me-3" style="font-size: 1.2rem; width: 30px;"></i>
                        <div>
                            <label class="fw-semibold text-muted mb-1" style="font-size: 0.9rem;">Quantidade</label>
                            <p class="mb-0 fw-bold" style="color: #1e3a8a;">{{ $car->quantity }} unid.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Botões de ação adicionais (ex: editar/deletar, se permitido) -->
            <div class="d-flex justify-content-center gap-2 mt-4">
                @can('edit')
                    <a href="{{ route('cars.edit', $car) }}" class="btn btn-primary d-flex align-items-center gap-1" style="border-radius: 10px; font-weight: 500;">
                        <i class="bi bi-pencil"></i>
                        Editar
                    </a>
                @endcan
                @can('delete')
                    <form action="{{ route('cars.destroy', $car) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Tem certeza que deseja excluir este carro?');">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger d-flex align-items-center gap-1" type="submit" style="border-radius: 10px; font-weight: 500;">
                            <i class="bi bi-trash"></i>
                            Excluir
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
    
    .badge {
        font-size: 0.85rem;
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
        
        .d-flex.align-items-center.p-3 {
            flex-direction: column;
            text-align: center;
            gap: 0.5rem;
        }
        
        .d-flex.align-items-center.p-3 i {
            width: auto;
            margin-right: 0;
        }
    }
</style>