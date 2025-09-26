@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <!-- Card principal para o formulário -->
    <div class="card border-0 shadow-sm" style="border-radius: 10px;">
        <div class="card-body p-4">
            <!-- Título -->
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h2 class="mb-0" style="color: #1e3a8a; font-weight: 600;">
                    Adicionar Roupa
                </h2>
                <a href="{{ route('clothes.index') }}" class="btn btn-secondary" style="border-radius: 6px; font-weight: 500;">
                    Voltar
                </a>
            </div>

            <!-- Formulário -->
            <form action="{{ route('clothes.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row mb-3">
                    <label for="brand" class="col-md-4 col-form-label text-md-end">Marca</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control @error('brand') is-invalid @enderror" id="brand" name="brand" value="{{ old('brand') }}" required>
                        @error('brand')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="type" class="col-md-4 col-form-label text-md-end">Tipo</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control @error('type') is-invalid @enderror" id="type" name="type" value="{{ old('type') }}" required>
                        @error('type')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="size" class="col-md-4 col-form-label text-md-end">Tamanho</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control @error('size') is-invalid @enderror" id="size" name="size" value="{{ old('size') }}" required>
                        @error('size')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="color" class="col-md-4 col-form-label text-md-end">Cor</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control @error('color') is-invalid @enderror" id="color" name="color" value="{{ old('color') }}" required>
                        @error('color')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="price" class="col-md-4 col-form-label text-md-end">Preço</label>
                    <div class="col-md-6">
                        <input type="number" step="0.01" min="0" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ old('price') }}" required>
                        @error('price')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="quantity" class="col-md-4 col-form-label text-md-end">Quantidade</label>
                    <div class="col-md-6">
                        <input type="number" min="0" class="form-control @error('quantity') is-invalid @enderror" id="quantity" name="quantity" value="{{ old('quantity') }}" required>
                        @error('quantity')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="image" class="col-md-4 col-form-label text-md-end">Imagem</label>
                    <div class="col-md-6">
                        <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" accept="image/*">
                        @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <small class="form-text text-muted">Escolha uma imagem para a roupa (JPG, PNG, etc.).</small>
                    </div>
                </div>

                <!-- Botões de ação -->
                <div class="d-flex justify-content-end gap-2 mt-4">
                    <a href="{{ route('clothes.index') }}" class="btn btn-secondary" style="border-radius: 6px;">
                        Cancelar
                    </a>
                    <button type="submit" class="btn btn-primary" style="border-radius: 6px; font-weight: 500;">
                        Adicionar Roupa
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
    .card {
        transition: box-shadow 0.2s ease;
    }
    
    .card:hover {
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }
    
    .form-control:focus {
        border-color: #1e3a8a;
        box-shadow: 0 0 0 0.2rem rgba(30, 58, 138, 0.25);
    }
    
    .col-form-label {
        font-weight: 500;
        color: #1e3a8a;
    }
</style>
@endsection