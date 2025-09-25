@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Lista de Roupas</h2>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
     @can('create')
        <a href="{{ route('clothes.create') }}" class="btn btn-success mb-3">Adicionar Roupa</a>
    @endcan
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Marca</th>
                <th>Tipo</th>
                <th>Tamanho</th>
                <th>Cor</th>
                <th>Preço</th>
                <th>Quantidade</th>
                <th>Imagem</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse($clothes as $cloth)
                <tr>
                    <td>{{ $cloth->id }}</td>
                    <td>{{ $cloth->brand }}</td>
                    <td>{{ $cloth->type }}</td>
                    <td>{{ $cloth->size }}</td>
                    <td>{{ $cloth->color }}</td>
                    <td>R$ {{ number_format($cloth->price, 2, ',', '.') }}</td>
                    <td>{{ $cloth->quantity }}</td>
                    <td>
                        @if($cloth->image)
                            <img src="{{ asset('storage/' . $cloth->image) }}" width="60">
                        @else
                            -
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('clothes.show', $cloth) }}" class="btn btn-info btn-sm">Ver</a>
                        @can('edit')
                            <a href="{{ route('clothes.edit', $cloth) }}" class="btn btn-primary btn-sm">Editar</a>
                        @endcan
                        @can('delete')
                            <form action="{{ route('clothes.destroy', $cloth) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza?')">Excluir</button>
                            </form>
                        @endcan
                    </td>
                </tr>
            @empty
                <tr><td colspan="9">Nenhuma roupa cadastrada.</td></tr>
            @endforelse
        </tbody>
    </table>
    {{ $clothes->links() }}
</div>
@endsection