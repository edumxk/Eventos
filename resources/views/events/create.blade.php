@extends('layouts.main')

@section('title', 'Next Floor Faber')

@section('content')
    <div id="event-create-container" class="col-md-6 offset-md-3">
        <h1>Crie o seu evento</h1>
        <form action="/events" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="image">Imagem do seu Evento</label>
                <input type="file" name="image" id="image" class="form-control-file">
            </div>
            <div class="form-group">
                <label for="title">Titulo</label>
                <input type="text" id="title" name="title" class="form-control" placeholder="Titulo do Evento">
            </div>
            <div class="form-group">
                <label for="city">Cidade</label>
                <input type="text" id="city" name="city" class="form-control" placeholder="Cidade do Evento">
            </div>
            <div class="form-group"><label for="private">Evento privado?</label>
                <select name="private" id="private" class="form-control">
                    <option value="0">Não</option>
                    <option value="1">Sim</option>
                </select>
            </div>
            <div class="form-group">
                <label for="description">Descrição</label>
                <textarea id="description" name="description" class="form-control" placeholder="Descrição do Evento"></textarea>
            </div>
            <div class="form-group">
                <label for="date_event">Data</label>
                <input type="datetime-local" id="date_event" name="date_event" class="form-control" placeholder="Titulo do Evento">
            </div>
            <div class="form-group">
                <label for="items[]">Adicione itens de infraestrutura:</label>
                <div class="form-group"><input type="checkbox" name="items[]" value="Cadeiras">Cadeiras</div>
                <div class="form-group"><input type="checkbox" name="items[]" value="Palco">Palco</div>
                <div class="form-group"><input type="checkbox" name="items[]" value="Cerveja Gratis">Cerveja Gratis</div>
                <div class="form-group"><input type="checkbox" name="items[]" value="Open Food">Open Food</div>
                <div class="form-group"><input type="checkbox" name="items[]" value="Brindes">Brindes</div>
            </div>
            <input type="submit" class="btn btn-primary" value="Criar Evento">
        </form>
    </div>
@endsection
