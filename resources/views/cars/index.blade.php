@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Lista de Roupas</h2>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @role('admin')
        <a href="{{ route('cars.create') }}" class="btn btn-success mb-3">Adicionar Roupa</a>
    @endrole
    <table class="table table-bordered">
        <thead>
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
                    <td>{{ $car->color }}</td>
                    <td>R$ {{ number_format($car->price, 2, ',', '.') }}</td>
                    <td>{{ $car->quantity }}</td>
                    <td>
                        @if($car->image)
                            <img src="{{ asset('storage/' . $car->image) }}" alt="Imagem do carro" width="120">
                        @else
                            <span>-</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('cars.show', $car) }}" class="btn btn-info btn-sm">Ver</a>
                        @role('admin')
                            <a href="{{ route('cars.edit', $car) }}" class="btn btn-primary btn-sm">Editar</a>
                            <form action="{{ route('cars.destroy', $car) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza?')">Excluir</button>
                            </form>
                        @endrole
                    </td>
                </tr>
            @empty
                <tr><td colspan="9">Nenhuma roupa cadastrada.</td></tr>
            @endforelse
        </tbody>
    </table>
    {{ $cars->links() }}
</div>
@endsection