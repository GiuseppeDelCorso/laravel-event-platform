@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <h2>Aggiuni un Evento</h2>
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
        <form action="{{ route('admin.event.store')  }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
                @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="date" class="form-label">Date</label>
                <input type="date" class="form-control @error('date') is-invalid @enderror" id="date" name="date" value="{{ old('date') }}">
                @error('date')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                    <label for="available_tickets" class="form-label">Available Tickets</label>
                    <select class="form-select"  name="available_tickets" id="available_tickets">
                        <option value="1000" @selected(old('type', $event->available_tickets) == '1000')>1000</option>
                        <option value="700" @selected(old('type', $event->available_tickets) == '700')>700</option>
                        <option value="500" @selected(old('type', $event->available_tickets) == '500')>500</option>
                        <option value="200" @selected(old('type', $event->available_tickets) == '200')>200</option>
                    </select>
                </div>
             <div class="mb-3">
                <label for="tags" class="form-label"><b>Select a Tag</b></label>
                <select multiple name="tags[]" id="tags" class="form-select">
                    @foreach ($tags as $tag)
                    <option value="{{ $tag->id }}">{{ $tag->type }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Inserisci</button>
        </form>
    </div>
</div>
@endsection