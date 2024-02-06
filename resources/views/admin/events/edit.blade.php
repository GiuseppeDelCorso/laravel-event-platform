@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h2>Modifica Evento</h2>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
        <div class="row">
            <form action="{{ route('admin.event.update', $event->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label">nome</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" 
                    name="name"  value="{{ old('name') ?? $event->name }}">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror   
                </div>
               <div class="mb-3">
                    <label for="date" class="form-label">Data</label>
                    <input type="date"  class="form-control @error('date') is-invalid @enderror" id="date" 
                    name="date" value="{{ old('date') ?? $event->description }}">
                    @error('date')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror 
                </div>
                <div class="mb-3">
                    <label for="available_tickets" class="form-label">available_tickets</label>
                    <select class="form-select"  name="available_tickets" id="available_tickets">
                        <option value="1000" @selected(old('type', $event->available_tickets) == '1000')>1000</option>
                        <option value="700" @selected(old('type', $event->available_tickets) == '700')>700</option>
                        <option value="500" @selected(old('type', $event->available_tickets) == '500')>500</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Aggiorna</button>
            </form>
        </div>
    </div>
@endsection