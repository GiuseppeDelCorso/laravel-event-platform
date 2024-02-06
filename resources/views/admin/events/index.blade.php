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
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">{{ $event->name}}</div>
                        <div class="card-body">{{ $event->date }}</div>
                        <div>
                            <p>{{$event->available_tickets}}</p>
                        </div>
                        <div class="card-body">
                                @if (count($event->tags) > 0)
                                    <ul>
                                        @foreach ($event->tags as $tag)
                                            <li>{{ $tag->type }}</li>
                                        @endforeach
                                    </ul>
                                @else
                                    <span>Non ci sono tag collegati</span>
                                @endif
                                <div class="d-flex justify-content-center">
                                    <button type="submit" class="btn btn-outline-primary">
                                         <a href="{{ route('admin.event.create') }}">Aggiungi Un Fumetto</a>
                                    </button>
                                    <button type="submit" class="btn btn-outline-success">
                                         <a href="{{ route('admin.event.show',  $event->id) }}">Mostra Evento</a>
                                    </button>
                                    <form action="{{ route('admin.event.destroy', $event->id)}}" method="POST" >
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" value="Cancella" class="btn btn-danger">
                                    </form>
                                    <a href="{{ route('admin.event.edit', $event->id) }}" class="btn btn-primary">Modifica il Fumetto</a>
                                </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
<style>
.btnHeaderAdd{
    color: black;
    background-color: white;

}

</style>