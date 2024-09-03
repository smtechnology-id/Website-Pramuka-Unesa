@extends('layouts.app')

@section('active_event', 'active-page')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h3>Event</h3>

                <div class="row">
                    @foreach ($events as $item)
                    <div class="col-12">
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <img src="{{ asset('storage/event/' . $item->photo) }}" alt="" class="img-fluid" style="width: 300px; height: 300px; object-fit: cover;">
                                    </div>
                                    <div class="col-md-8">
                                        <h5>{{ $item->title }}</h5>
                                        <p>{!! Str::limit($item->content, 200) !!}</p>
    
                                        <a href="{{ route('user.event.show', $item->slug) }}" class="btn btn-primary" style="background-color: #175789; color: white;">Selengkapnya</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
        </div>
    </div>
@endsection