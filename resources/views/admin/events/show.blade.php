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
        <div class="d-flex justify-content-center">
            <a href="{{ route('admin.event.edit', $event->id) }}" class="btn btn-primary">Modifica il Fumetto</a>
        </div>
    </div>
@endsection