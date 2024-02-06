@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h2>{{ $event->name }}</h2>
        </div>
        <div class="row">
            <p>{{ $event->date }}</p>
        </div>
        <div class="row">
            <p>{{ $event->available_tickets }}</p>
        </div>
        <h4 class="py-3">Tags</h4>
        <div class="row">
            @if (count($event->tags) > 0)

                @foreach ($event->tags as $tag)
            </div>
                <p class="TypeStyle">Tipologia</p> 

                <p>{{ $tag->type }}</p>
            <div>
                @endforeach
                @else
                    <div class="py-3">Non ci sono tag collegati</div>
                @endif
        </div>
        <div class="d-flex justify-content-center">
            <a href="{{ route('admin.event.edit', $event->id) }}" class="btn btn-primary mx-2">Modifica il Fumetto</a>
            <button type="submit" class="btn btn-info mx-2">
                <a class="bgWhite" href="{{ route('admin.event.index') }}">Torna alla lista</a>
            </button>
        </div>
    </div>
@endsection

<style>
.bgWhite{
    color: white;
}
.TypeStyle{
    font-weight: bold;
}
</style>