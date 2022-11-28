@extends('layouts.main')

@section('title',  $event->title )

@section('content')
    <div class="col-md-10 offset-md-1">
        <div class="row">
            <div id="image-container" class="col-md-6">
                <img src="/img/events/{{ $event->image }}" alt="" class="img-fluid">
            </div>
            <div id="info-container" class="col-md-6">
                <h1> {{ $event->title }}</h1>
                <p class="event-city"><ion-icon name="location-outline"></ion-icon>{{ $event->city }}</p>
                <p class="event-participants"><ion-icon name="people-outline"></ion-icon> 12 Participante(s)</p>
                <p class="event-owner"><ion-icon name="star-outline"></ion-icon>{{ $eventOwner->nameS }}</p>
                <a href="#" class="btn btn-primary" id="event-submit">Confirmar Presença</a>
                <ul id="items-list">
                    @foreach($event->items as $eventLi)
                        <li><ion-icon name="play-outline"></ion-icon><spam>{{ $eventLi }}</spam> </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-md-12" id="description">
                <h3>Descrição do Evento</h3>
                <p>{{ $event->description }}</p>
            </div>
        </div>
    </div>

@endsection
