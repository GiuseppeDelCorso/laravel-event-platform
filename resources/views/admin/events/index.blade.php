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
                        <div>
                            {{ $event->tag ? $event->tag->type : 'senza tipo' }}
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
                            </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
<style>

.StyleImg{

    width: 300px;
    height: 200px;
    object-fit: cover;
    margin: 20px 20px 20px 80px    
}   

</style>