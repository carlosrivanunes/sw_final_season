@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <!-- Card principal para exibição -->
    <div class="card border-0 shadow-sm" style="border-radius: 10px;">
        <div class="card-body p-4">
            <!-- Título -->
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h2 class="mb-0" style="color: #1e3a8a; font-weight: 600;">
                    Product Information
                </h2>
                <a href="{{ route('products.index') }}" class="btn btn-secondary" style="border-radius: 6px; font-weight: 500;">
                    Back
                </a>
            </div>

            <!-- Exibição dos dados -->
            <div class="row mb-3">
                <label class="col-md-4 col-form-label text-md-end"><strong>Code:</strong></label>
                <div class="col-md-6" style="line-height: 38px; font-weight: 500;">
                    {{ $product->code }}
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-md-4 col-form-label text-md-end"><strong>Name:</strong></label>
                <div class="col-md-6" style="line-height: 38px; font-weight: 500;">
                    {{ $product->name }}
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-md-4 col-form-label text-md-end"><strong>Quantity:</strong></label>
                <div class="col-md-6" style="line-height: 38px; font-weight: 500;">
                    {{ $product->quantity }}
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-md-4 col-form-label text-md-end"><strong>Price:</strong></label>
                <div class="col-md-6" style="line-height: 38px; font-weight: 500;">
                    $ {{ number_format($product->price, 2, '.', ',') }}
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-md-4 col-form-label text-md-end"><strong>Description:</strong></label>
                <div class="col-md-6" style="line-height: 38px; font-weight: 500;">
                    {{ $product->description }}
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-md-4 col-form-label text-md-end"><strong>Image:</strong></label>
                <div class="col-md-6" style="line-height: 38px;">
                    @if($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" alt="Product image" width="200" class="img-thumbnail" style="border-radius: 6px;">
                    @else
                        <span class="text-muted">-</span>
                    @endif
                </div>
            </div>
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
    
    .col-form-label {
        font-weight: 500;
        color: #1e3a8a;
    }
</style>
@endsection