@extends('layouts.main')

@section('title', 'Next Floor Faber')

@section('content')
        <div>
            <h1>Produto</h1>
            @if($id != null)
                <h1>ID: {{ $id }}, nome: {{ $nome }}</h1>
            @endif

        </div>
@endsection
