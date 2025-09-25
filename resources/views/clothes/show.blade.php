

@extends('layouts.app')

@section('content')

<div class="row justify-content-center mt-3">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Informações da Roupa
                </div>
                <div class="float-end">
                    <a href="{{ route('clothes.index') }}" class="btn btn-primary btn-sm">&larr; Voltar</a>
                </div>
            </div>
            <div class="card-body">

                <div class="row mb-2">
                    <label class="col-md-4 col-form-label text-md-end text-start"><strong>Marca:</strong></label>
                    <div class="col-md-6" style="line-height: 35px;">
                        {{ $cloth->brand }}
                    </div>
                </div>

                <div class="row mb-2">
                    <label class="col-md-4 col-form-label text-md-end text-start"><strong>Tipo:</strong></label>
                    <div class="col-md-6" style="line-height: 35px;">
                        {{ $cloth->type }}
                    </div>
                </div>

                <div class="row mb-2">
                    <label class="col-md-4 col-form-label text-md-end text-start"><strong>Tamanho:</strong></label>
                    <div class="col-md-6" style="line-height: 35px;">
                        {{ $cloth->size }}
                    </div>
                </div>

                <div class="row mb-2">
                    <label class="col-md-4 col-form-label text-md-end text-start"><strong>Cor:</strong></label>
                    <div class="col-md-6" style="line-height: 35px;">
                        {{ $cloth->color }}
                    </div>
                </div>

                <div class="row mb-2">
                    <label class="col-md-4 col-form-label text-md-end text-start"><strong>Preço:</strong></label>
                    <div class="col-md-6" style="line-height: 35px;">
                        R$ {{ number_format($cloth->price, 2, ',', '.') }}
                    </div>
                </div>

                <div class="row mb-2">
                    <label class="col-md-4 col-form-label text-md-end text-start"><strong>Quantidade:</strong></label>
                    <div class="col-md-6" style="line-height: 35px;">
                        {{ $cloth->quantity }}
                    </div>
                </div>

                <div class="row mb-2">
                    <label class="col-md-4 col-form-label text-md-end text-start"><strong>Imagem:</strong></label>
                    <div class="col-md-6" style="line-height: 35px;">
                        @if($cloth->image)
                            <img src="{{ asset('storage/' . $cloth->image) }}" alt="Imagem da roupa" width="200">
                        @else
                            <span>-</span>
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection