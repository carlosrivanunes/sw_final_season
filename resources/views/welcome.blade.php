<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel - Bem-vindo!</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Bootstrap Icons (leve, só pra ícones opcionais) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Vite ou Mix para assets -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <script src="{{ mix('js/app.js') }}" defer></script>
    @endif

    <!-- Estilo médio: bonito, mas simples -->
    <style>
        body {
            background-color: #e3f2fd; /* Azul claro suave pro fundo */
            font-family: 'Instrument Sans', sans-serif;
        }
        .welcome-card {
            border-radius: 20px; /* Bordas mais arredondadas */
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1); /* Sombra média */
            border: none;
            max-width: 500px; /* Limita a largura pra ficar mais focado */
            margin: 0 auto;
        }
        .welcome-card h1 {
            color: #1e3a8a; /* Azul escuro pro título */
            font-weight: 600;
            font-size: 2.5rem;
        }
        .welcome-card p {
            color: #4b5563; /* Cinza médio pro texto */
            font-size: 1.1rem;
        }
        .btn-custom {
            border-radius: 12px; /* Botões arredondados */
            padding: 14px 28px; /* Mais espaço */
            font-weight: 500;
            font-size: 1.1rem;
            margin: 10px;
            transition: box-shadow 0.2s ease; /* Hover sutil */
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }
        .btn-success-custom {
            background-color: #10b981; /* Verde mais vivo */
            border-color: #10b981;
        }
        .btn-primary-custom {
            background-color: #3b82f6; /* Azul mais vibrante */
            border-color: #3b82f6;
        }
        .btn-custom:hover {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15); /* Sombra no hover */
            color: white;
            text-decoration: none;
        }
        .card-body {
            padding: 2.5rem; /* Espaçamento confortável */
        }
    </style>
</head>
<body class="antialiased">
    @extends('layouts.app')

    @section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card welcome-card text-center">
                    <div class="card-body">
                        <h1 class="mb-4">
                            <i class="bi bi-heart-fill text-danger"></i> Bem-vindo!
                        </h1>
                        <p class="mb-4">Escolha uma categoria para navegar e descubra mais.</p>
                        <a href="{{ route('products.index') }}" class="btn btn-success-custom btn-custom">
                            <i class="bi bi-box"></i> Produtos
                        </a>
                        <a href="{{ route('cars.index') }}" class="btn btn-primary-custom btn-custom">
                            <i class="bi bi-car-front"></i> Carros
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
</body>
</html>
