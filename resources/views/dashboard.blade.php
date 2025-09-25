@extends('layouts.app')

@section('content')
    @role('admin')
        <div class="alert alert-success">Você é admin!</div>
    @endrole

    <h1>Bem-vindo ao painel!</h1>
@endsection
