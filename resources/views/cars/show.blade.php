@extends('layouts.app')

@section('content')

<div class="row justify-content-center mt-3">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Informações do Carro
                </div>
                <div class="float-end">
                    <a href="{{ route('cars.index') }}" class="btn btn-primary btn-sm">&larr; Voltar</a>
                </div>
            </div>
            <div class="card-body">

                <div class="row mb-2">
                    <label class="col-md-4 col-form-label text-md-end text-start"><strong>Marca:</strong></label>
                    <div class="col-md-6" style="line-height: 35px;">
                        {{ $car->brand }}
                    </div>
                </div>

                <div class="row mb-2">
                    <label class="col-md-4 col-form-label text-md-end text-start"><strong>Modelo:</strong></label>
                    <div class="col-md-6" style="line-height: 35px;">
                        {{ $car->model }}
                    </div>
                </div>

                <div class="row mb-2">
                    <label class="col-md-4 col-form-label text-md-end text-start"><strong>Ano:</strong></label>
                    <div class="col-md-6" style="line-height: 35px;">
                        {{ $car->year }}
                    </div>
                </div>

                <div class="row mb-2">
                    <label class="col-md-4 col-form-label text-md-end text-start"><strong>Cor:</strong></label>
                    <div class="col-md-6" style="line-height: 35px;">
                        {{ $car->color }}
                    </div>
                </div>

                <div class="row mb-2">
                    <label class="col-md-4 col-form-label text-md-end text-start"><strong>Preço:</strong></label>
                    <div class="col-md-6" style="line-height: 35px;">
                        R$ {{ number_format($car->price, 2, ',', '.') }}
                    </div>
                </div>

                <div class="row mb-2">
                    <label class="col-md-4 col-form-label text-md-end text-start"><strong>Quantidade:</strong></label>
                    <div class="col-md-6" style="line-height: 35px;">
                        {{ $car->quantity }}
                    </div>
                </div>

                <div class="row mb-2">
                    <label class="col-md-4 col-form-label text-md-end text-start"><strong>Imagem:</strong></label>
                    <div class="col-md-6" style="line-height: 35px;">
                        @if($car->image)
                            <img src="{{ asset('storage/' . $car->image) }}" alt="Imagem do carro" width="120">
                        @else
                            <span>-</span>
                        @endif
                    </div>
                </div>

            </div>
        </div>        </div>
    </div>
</div>

@endsection