@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <!-- Card principal para envolver o formulário -->
    <div class="card shadow-sm border-0" style="border-radius: 15px; background-color: rgba(255, 255, 255, 0.95);">
        <div class="card-body p-4">
            <!-- Título com ícone -->
            <div class="d-flex align-items-center justify-content-between mb-4">
                <div class="d-flex align-items-center">
                    <i class="bi bi-plus-circle-fill text-success me-2" style="font-size: 1.5rem;"></i>
                    <h2 class="mb-0" style="color: #1e3a8a; font-weight: 600;">Add New Product</h2>
                </div>
                <a href="{{ route('products.index') }}" class="btn btn-outline-secondary d-flex align-items-center gap-1" style="border-radius: 10px; font-weight: 500;">
                    <i class="bi bi-arrow-left"></i>
                    Back
                </a>
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
            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <!-- Code -->
                    <div class="col-md-6 mb-4">
                        <label for="code" class="form-label fw-semibold" style="color: #1e3a8a;">Code</label>
                        <div class="input-group" style="border-radius: 10px; overflow: hidden;">
                            <span class="input-group-text bg-light border-0" style="border-radius: 10px 0 0 10px;">
                                <i class="bi bi-barcode text-muted"></i>
                            </span>
                            <input type="text" class="form-control @error('code') is-invalid @enderror" id="code" name="code" value="{{ old('code') }}" placeholder="Ex: PROD001" style="border-left: none; border-radius: 0 10px 10px 0;">
                        </div>
                        @error('code')
                            <div class="invalid-feedback d-block">
                                <i class="bi bi-exclamation-circle-fill me-1"></i>{{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Name -->
                    <div class="col-md-6 mb-4">
                        <label for="name" class="form-label fw-semibold" style="color: #1e3a8a;">Name</label>
                        <div class="input-group" style="border-radius: 10px; overflow: hidden;">
                            <span class="input-group-text bg-light border-0" style="border-radius: 10px 0 0 10px;">
                                <i class="bi bi-tag text-muted"></i>
                            </span>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" placeholder="Ex: Smartphone XYZ" style="border-left: none; border-radius: 0 10px 10px 0;">
                        </div>
                        @error('name')
                            <div class="invalid-feedback d-block">
                                <i class="bi bi-exclamation-circle-fill me-1"></i>{{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Quantity -->
                    <div class="col-md-6 mb-4">
                        <label for="quantity" class="form-label fw-semibold" style="color: #1e3a8a;">Quantity</label>
                        <div class="input-group" style="border-radius: 10px; overflow: hidden;">
                            <span class="input-group-text bg-light border-0" style="border-radius: 10px 0 0 10px;">
                                <i class="bi bi-box text-muted"></i>
                            </span>
                            <input type="number" class="form-control @error('quantity') is-invalid @enderror" id="quantity" name="quantity" value="{{ old('quantity') }}" placeholder="Ex: 50" min="0" style="border-left: none; border-radius: 0 10px 10px 0;">
                        </div>
                        @error('quantity')
                            <div class="invalid-feedback d-block">
                                <i class="bi bi-exclamation-circle-fill me-1"></i>{{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Price -->
                    <div class="col-md-6 mb-4">
                        <label for="price" class="form-label fw-semibold" style="color: #1e3a8a;">Price</label>
                        <div class="input-group" style="border-radius: 10px; overflow: hidden;">
                            <span class="input-group-text bg-light border-0" style="border-radius: 10px 0 0 10px;">
                                <i class="bi bi-currency-dollar text-muted"></i>
                            </span>
                            <input type="number" step="0.01" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ old('price') }}" placeholder="Ex: 299.99" min="0" style="border-left: none; border-radius: 0 10px 10px 0;">
                        </div>
                        @error('price')
                            <div class="invalid-feedback d-block">
                                <i class="bi bi-exclamation-circle-fill me-1"></i>{{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Description -->
                    <div class="col-12 mb-4">
                        <label for="description" class="form-label fw-semibold" style="color: #1e3a8a;">Description</label>
                        <div class="input-group" style="border-radius: 10px; overflow: hidden;">
                            <span class="input-group-text bg-light border-0" style="border-radius: 10px 0 0 10px; height: auto; vertical-align: top;">
                                <i class="bi bi-card-text text-muted"></i>
                            </span>
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="4" placeholder="Enter product description..." style="border-left: none; border-radius: 0 10px 10px 0; resize: vertical;">{{ old('description') }}</textarea>
                        </div>
                        @error('description')
                            <div class="invalid-feedback d-block">
                                <i class="bi bi-exclamation-circle-fill me-1"></i>{{ $message }}
                            </div>
                        @enderror
                        <small class="text-muted">Provide a detailed description of the product.</small>
                    </div>

                    <!-- Image -->
                    <div class="col-12 mb-4">
                        <label for="image" class="form-label fw-semibold" style="color: #1e3a8a;">Image</label>
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
                        <small class="text-muted">Choose an image for the product (JPG, PNG, etc.).</small>
                    </div>
                </div>

                <!-- Botões de ação -->
                <div class="d-flex justify-content-between mt-4">
                    <a href="{{ route('products.index') }}" class="btn btn-secondary d-flex align-items-center gap-1" style="border-radius: 10px; font-weight: 500;">
                        <i class="bi bi-arrow-left"></i>
                        Back
                    </a>
                    <button type="submit" class="btn btn-success d-flex align-items-center gap-1" style="border-radius: 10px; font-weight: 500;">
                        <i class="bi bi-check-circle"></i>
                        Add Product
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

<!-- Estilo básico pra hovers e consistência (adicione no <style> do head ou no app.css) -->
<style>
    .form-control:focus, .input-group-text:focus, textarea:focus {
        border-color: #1e3a8a !important;
        box-shadow: 0 0 0 0.2rem rgba(30, 58, 138, 0.25); /* Foco azul sutil */
    }
    
    .form-control:hover, .input-group:hover, textarea:hover {
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
    
    /* Ajuste para textarea no input-group */
    .input-group-text[style*="height: auto"] {
        padding-top: 0.75rem;
        padding-bottom: 0.75rem;
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
    }
</style>