@extends('layouts.main')

@section('title', 'NextFloor | Produtos')

@section('content')
        <div>
            <h1>Pagina de produtos</h1>
            @if($busca != '')
                <h2>O Usuário está buscando por {{ $busca }}</h2>
            @endif
        </div>
@endsection
