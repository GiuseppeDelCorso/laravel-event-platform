@extends('layouts.admin')
@section('content')

    <div class="contianer">
        <div class="row">
            
            <div class="col-6 ">
            </div>
        </div>
    </div>


    <div class="container-fluid mt-4">
        <div class="row justify-content-center">
            @foreach ($events as $event)
                <div class="col-md-4 mt-3">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                                <h4 class="mt-2">{{ $event->name}}</h4>
                            </button>
                                <form action="{{ route('admin.event.destroy', $event->id)}}" method="POST" >
                                 @csrf
                                @method('DELETE')
                                <input type="submit" value="Cancella" class="btn btn-danger mt-2 ">
                                </form>
                        </div>
                        <div class="card-body">
                            <div>
                                <p>Data  {{ $event->date }}</p>
                                <p>Tickets Disponibili  {{$event->available_tickets}}</p>   
                            </div>
                        </div>
                        <div class="card-body">
                                @if (count($event->tags) > 0)
                                    <ul>
                                        @foreach ($event->tags as $tag)
                                            <li>{{ $tag->type }}</li>
                                        @endforeach
                                    </ul>
                                @else
                                    <div class="py-3">Non ci sono tag collegati</div>
                                @endif
                                <div class="d-flex justify-content-center">
                                    <button type="submit" class="btn btn-primary mx-2">
                                         <a  class="bgWhite" href="{{ route('admin.event.create') }}">Aggiungi Un Evento</a>
                                    </button>
                                    <button type="submit" class="btn btn-info mx-2">
                                        <a class="bgWhite" href="{{ route('admin.event.show',  $event->id) }}">Mostra Evento</a>
                                    <button type="submit" class="btn btn-warning mx-2">
                                        <a class="bgWhite" href="{{ route('admin.event.edit', $event->id) }}">Modifica l'Evento</a>
                                    </button>
                                </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
<style>
.bgWhite{
    color: white;
}

</style>