@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <!-- Card principal para envolver o conteúdo, como na welcome -->
    <div class="card shadow-sm border-0" style="border-radius: 15px; background-color: rgba(255, 255, 255, 0.95);">
        <div class="card-body p-4">
            <!-- Título com ícone -->
            <div class="d-flex align-items-center mb-4">
                <i class="bi bi-car-front-fill text-primary me-2" style="font-size: 1.5rem;"></i>
                <h2 class="mb-0" style="color: #1e3a8a; font-weight: 600;">Lista de Carros</h2>
            </div>

            <!-- Alert de sucesso com ícone -->
            @if(session('success'))
                <div class="alert alert-success d-flex align-items-center" role="alert" style="border-radius: 10px; border: none; box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);">
                    <i class="bi bi-check-circle-fill me-2"></i>
                    {{ session('success') }}
                </div>
            @endif

            <!-- Botão adicionar com ícone -->
            @can('create')
                <a href="{{ route('cars.create') }}" class="btn btn-success mb-3 d-flex align-items-center gap-1" style="border-radius: 10px; font-weight: 500;">
                    <i class="bi bi-plus-circle"></i>
                    Adicionar Carro
                </a>
            @endcan

            <!-- Tabela estilizada -->
            <div class="table-responsive" style="border-radius: 10px; overflow: hidden; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);">
                <table class="table table-hover table-striped mb-0" style="background-color: white; margin-bottom: 0;">
                    <thead class="table-dark" style="background-color: #001f3f; color: white;"> <!-- Cor azul marinho do nav pra consistência -->
                        <tr>
                            <th>#</th>
                            <th>Marca</th>
                            <th>Modelo</th>
                            <th>Ano</th>
                            <th>Cor</th>
                            <th>Preço</th>
                            <th>Quantidade</th>
                            <th>Imagem</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($cars as $car)
                            <tr>
                                <td>{{ $car->id }}</td>
                                <td>{{ $car->brand }}</td>
                                <td>{{ $car->model }}</td>
                                <td>{{ $car->year }}</td>
                                <td><span class="badge bg-secondary" style="font-size: 0.85rem;">{{ $car->color }}</span></td> <!-- Badge pra cor, mais visual -->
                                <td><strong>R$ {{ number_format($car->price, 2, ',', '.') }}</strong></td>
                                <td>{{ $car->quantity }}</td>
                                <td>
                                    @if($car->image)
                                        <img src="{{ asset('storage/' . $car->image) }}" alt="Imagem do carro" class="img-thumbnail" style="width: 80px; height: 60px; object-fit: cover; border-radius: 8px;">
                                    @else
                                        <span class="text-muted">-</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('cars.show', $car) }}" class="btn btn-info btn-sm me-1" style="border-radius: 6px;" title="Ver">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    @can('edit')
                                        <a href="{{ route('cars.edit', $car) }}" class="btn btn-primary btn-sm me-1" style="border-radius: 6px;" title="Editar">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                    @endcan
                                    @can('delete')
                                        <form action="{{ route('cars.destroy', $car) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Tem certeza que deseja excluir este carro?');">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm" type="submit" style="border-radius: 6px;" title="Excluir">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    @endcan
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="text-center py-4 text-muted">
                                    <i class="bi bi-car-front" style="font-size: 3rem; opacity: 0.5;"></i>
                                    <p class="mb-0 mt-2">Nenhum carro cadastrado.</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Paginação estilizada -->
            @if($cars->hasPages())
                <div class="d-flex justify-content-center mt-4">
                    {{ $cars->links('pagination::bootstrap-5') }} <!-- Usa o paginador do Bootstrap 5 pra ficar bonito -->
                </div>
            @endif
        </div>
    </div>
</div>
@endsection

<!-- Estilo básico pra hovers e consistência (adicione no <style> do head ou no app.css) -->
<style>
    .table-hover tbody tr:hover {
        background-color: rgba(0, 123, 255, 0.05); /* Hover azul claro sutil na tabela */
        transition: background-color 0.2s ease;
    }
    
    .btn:hover {
        transform: translateY(-1px); /* Lift sutil nos botões no hover */
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.15);
    }
    
    .card {
        transition: box-shadow 0.3s ease; /* Sombra no hover do card */
    }
    
    .card:hover {
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
    }
    
    /* Responsivo: Em mobile, ações em stack */
    @media (max-width: 768px) {
        .btn-sm {
            margin-bottom: 5px;
            display: block;
            width: 100%;
        }
    }
</style>
