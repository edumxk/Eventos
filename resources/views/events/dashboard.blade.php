@extends('layouts.main')

@section('title', 'NextFloor | Criar Evento')

@section('content')

    <div class="col-md-10 offset-md-1 dashboard-title-container">
        <h1>Meus Eventos</h1>
    </div>
    @if(count($events)>0)
        <div class="col-md-10 offset-md-1 dashboard-events-container">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome do Evento</th>
                        <th scope="col">Pessoas</th>
                        <th scope="col">Excluir</th>
                    </tr>
                </thead>
        @foreach($events as $event)
                <tbody>
                    <tr>
                        <td>{{ $event->id }}</td>
                        <td>{{ $event->title }}</td>
                        <td>{{ '0' }}</td>
                        <td>
                            <a href="#" class="btn btn-info edit-btn"><ion-icon name="create-outline"></ion-icon> Editar</a>
                            <form action="/event/{{ $event->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger delete-btn"><ion-icon name="trash-outline"></ion-icon> Deletar</button>
                            </form>
                        </td>
                    </tr>
                </tbody>
        @endforeach
            </table>
        </div>
    @else
    <p>Você não possui eventos, <a href="/events/create">criar evento.</a></p>
    @endif

@endsection
