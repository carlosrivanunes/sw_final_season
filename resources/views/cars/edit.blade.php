@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <!-- Card principal para envolver o formulário -->
    <div class="card shadow-sm border-0" style="border-radius: 15px; background-color: rgba(255, 255, 255, 0.95);">
        <div class="card-body p-4">
            <!-- Título com ícone -->
            <div class="d-flex align-items-center mb-4">
                <i class="bi bi-pencil-square-fill text-primary me-2" style="font-size: 1.5rem;"></i>
                <h2 class="mb-0" style="color: #1e3a8a; font-weight: 600;">Editar Carro</h2>
            </div>

            <!-- Alert de erros gerais, se houver (ex: validação falhou) -->
            @if ($errors->any())
                <div class="alert alert-danger d-flex align-items-center" role="alert" style="border-radius: 10px; border: none; box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);">
                    <i class="bi bi-exclamation-triangle-fill me-2"></i>
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Formulário estilizado -->
            <form action="{{ route('cars.update', $car->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row">
                    <!-- Marca -->
                    <div class="col-md-6 mb-4">
                        <label for="brand" class="form-label fw-semibold" style="color: #1e3a8a;">Marca</label>
                        <div class="input-group" style="border-radius: 10px; overflow: hidden;">
                            <span class="input-group-text bg-light border-0" style="border-radius: 10px 0 0 10px;">
                                <i class="bi bi-tag text-muted"></i>
                            </span>
                            <input type="text" class="form-control @error('brand') is-invalid @enderror" id="brand" name="brand" value="{{ old('brand', $car->brand) }}" placeholder="Ex: Toyota" style="border-left: none; border-radius: 0 10px 10px 0;">
                        </div>
                        @error('brand')
                            <div class="invalid-feedback d-block">
                                <i class="bi bi-exclamation-circle-fill me-1"></i>{{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Modelo -->
                    <div class="col-md-6 mb-4">
                        <label for="model" class="form-label fw-semibold" style="color: #1e3a8a;">Modelo</label>
                        <div class="input-group" style="border-radius: 10px; overflow: hidden;">
                            <span class="input-group-text bg-light border-0" style="border-radius: 10px 0 0 10px;">
                                <i class="bi bi-car-front text-muted"></i>
                            </span>
                            <input type="text" class="form-control @error('model') is-invalid @enderror" id="model" name="model" value="{{ old('model', $car->model) }}" placeholder="Ex: Corolla" style="border-left: none; border-radius: 0 10px 10px 0;">
                        </div>
                        @error('model')
                            <div class="invalid-feedback d-block">
                                <i class="bi bi-exclamation-circle-fill me-1"></i>{{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Ano -->
                    <div class="col-md-6 mb-4">
                        <label for="year" class="form-label fw-semibold" style="color: #1e3a8a;">Ano</label>
                        <div class="input-group" style="border-radius: 10px; overflow: hidden;">
                            <span class="input-group-text bg-light border-0" style="border-radius: 10px 0 0 10px;">
                                <i class="bi bi-calendar text-muted"></i>
                            </span>
                            <input type="number" class="form-control @error('year') is-invalid @enderror" id="year" name="year" value="{{ old('year', $car->year) }}" placeholder="Ex: 2023" min="1900" max="2100" style="border-left: none; border-radius: 0 10px 10px 0;">
                        </div>
                        @error('year')
                            <div class="invalid-feedback d-block">
                                <i class="bi bi-exclamation-circle-fill me-1"></i>{{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Cor -->
                    <div class="col-md-6 mb-4">
                        <label for="color" class="form-label fw-semibold" style="color: #1e3a8a;">Cor</label>
                        <div class="input-group" style="border-radius: 10px; overflow: hidden;">
                            <span class="input-group-text bg-light border-0" style="border-radius: 10px 0 0 10px;">
                                <i class="bi bi-palette text-muted"></i>
                            </span>
                            <input type="text" class="form-control @error('color') is-invalid @enderror" id="color" name="color" value="{{ old('color', $car->color) }}" placeholder="Ex: Azul" style="border-left: none; border-radius: 0 10px 10px 0;">
                        </div>
                        @error('color')
                            <div class="invalid-feedback d-block">
                                <i class="bi bi-exclamation-circle-fill me-1"></i>{{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Preço -->
                    <div class="col-md-6 mb-4">
                        <label for="price" class="form-label fw-semibold" style="color: #1e3a8a;">Preço (R$)</label>
                        <div class="input-group" style="border-radius: 10px; overflow: hidden;">
                            <span class="input-group-text bg-light border-0" style="border-radius: 10px 0 0 10px;">
                                <i class="bi bi-currency-dollar text-muted"></i>
                            </span>
                            <input type="number" step="0.01" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ old('price', $car->price) }}" placeholder="Ex: 50000.00" min="0" style="border-left: none; border-radius: 0 10px 10px 0;">
                        </div>
                        @error('price')
                            <div class="invalid-feedback d-block">
                                <i class="bi bi-exclamation-circle-fill me-1"></i>{{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Quantidade -->
                    <div class="col-md-6 mb-4">
                        <label for="quantity" class="form-label fw-semibold" style="color: #1e3a8a;">Quantidade</label>
                        <div class="input-group" style="border-radius: 10px; overflow: hidden;">
                            <span class="input-group-text bg-light border-0" style="border-radius: 10px 0 0 10px;">
                                <i class="bi bi-box text-muted"></i>
                            </span>
                            <input type="number" class="form-control @error('quantity') is-invalid @enderror" id="quantity" name="quantity" value="{{ old('quantity', $car->quantity) }}" placeholder="Ex: 10" min="0" style="border-left: none; border-radius: 0 10px 10px 0;">
                        </div>
                        @error('quantity')
                            <div class="invalid-feedback d-block">
                                <i class="bi bi-exclamation-circle-fill me-1"></i>{{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Imagem -->
                    <div class="col-12 mb-4">
                        <label for="image" class="form-label fw-semibold" style="color: #1e3a8a;">Imagem</label>
                        @if($car->image)
                            <div class="mb-3">
                                <small class="text-muted">Imagem atual:</small>
                                <img src="{{ asset('storage/' . $car->image) }}" alt="Imagem atual do carro" class="img-thumbnail" style="width: 120px; height: 90px; object-fit: cover; border-radius: 10px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
                            </div>
                        @endif
                        <div class="input-group" style="border-radius: 10px; overflow: hidden;">
                            <span class="input-group-text bg-light border-0" style="border-radius: 10px 0 0 10px;">
                                <i class="bi bi-image text-muted"></i>
                            </span>
                            <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" accept="image/*" style="border-left: none; border-radius: 0 10px 10px 0;">
                        </div>
                        @error('image')
                            <div class="invalid-feedback d-block">
                                <i class="bi bi-exclamation-circle-fill me-1"></i>{{ $message }}
                            </div>
                        @enderror
                        <small class="text-muted">Deixe em branco para manter a imagem atual. Escolha uma nova se quiser alterar (JPG, PNG, etc.).</small>
                    </div>
                </div>

                <!-- Botões de ação -->
                <div class="d-flex justify-content-between mt-4">
                    <a href="{{ route('cars.index') }}" class="btn btn-secondary d-flex align-items-center gap-1" style="border-radius: 10px; font-weight: 500;">
                        <i class="bi bi-arrow-left"></i>
                        Voltar
                    </a>
                    <button type="submit" class="btn btn-primary d-flex align-items-center gap-1" style="border-radius: 10px; font-weight: 500;">
                        <i class="bi bi-check-circle"></i>
                        Salvar Alterações
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

<!-- Estilo básico pra hovers e consistência (adicione no <style> do head ou no app.css) -->
<style>
    .form-control:focus, .input-group-text:focus {
        border-color: #1e3a8a !important;
        box-shadow: 0 0 0 0.2rem rgba(30, 58, 138, 0.25); /* Foco azul sutil */
    }
    
    .form-control:hover, .input-group:hover {
        border-color: #1e3a8a;
        transition: border-color 0.2s ease;
    }
    
    .btn:hover {
        transform: translateY(-1px); /* Lift sutil nos botões no hover */
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.15);
        transition: all 0.2s ease;
    }
    
    .card {
        transition: box-shadow 0.3s ease; /* Sombra no hover do card */
    }
    
    .card:hover {
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
    }
    
    .invalid-feedback {
        color: #dc3545;
        font-size: 0.875em;
        background-color: rgba(220, 53, 69, 0.1);
        padding: 4px 8px;
        border-radius: 6px;
        border-left: 3px solid #dc3545;
        margin-top: 4px;
    }
    
    /* Responsivo: Em mobile, campos em full width */
    @media (max-width: 768px) {
        .row > div {
            margin-bottom: 1rem;
        }
        
        .d-flex.justify-content-between {
            flex-direction: column;
            gap: 1rem;
        }
        
        .btn {
            width: 100%;
            justify-content: center;
        }
        
        .img-thumbnail {
            width: 100px;
            height: 75px;
        }
    }
</style>