@extends('layouts.main')

@section('title', 'NextFloor | Criar Evento')

@section('content')
    <div id="search-container" class="col-md-12">
        <label for="search">Buscar um Evento</label>
        <form action="/" method="GET">
            <input type="text" id="search" name="search" value="{{ $search }}" class="form-control" placeholder="Pesquisar...">
        </form>
    </div>
    <div id="events-container" class="col-md-12">
        @if($search)
            <h2>Buscando por: {{ $search }}</h2>
            @if(count($events)==0)
                <spam class="subtitle">Nenhum evento encontrado, </spam><a href="/">ver todos.</a>
            @endif
        @else
            <h2>Próximos Eventos</h2>
            <p class="subtitle">Veja os eventos dos próximos dias.</p>
        @endif

        <div id="cards-container" class="row">
            @foreach($events as $event)
            <div class="card col-md-3">
                <img src="/img/events/{{$event->image}}" alt="Imagem do Evento">
                <div class="card-body">
                    <p class="card-date">{{ date('d/m/Y H:i:s' ,strtotime($event->date_event)) }}</p>
                    <h5 class="card-title">{{ $event->title }}</h5>
                    <p class="card-participants">12 Participantes</p>
                    <a href="/event/{{ $event->id }}" class="btn btn-primary">Saber mais</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection
