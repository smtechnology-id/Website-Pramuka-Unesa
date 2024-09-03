@extends('layouts.app')

@section('active_registration', 'active-page')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h3>Data Pendaftaran Event</h3>
                <div class="row">
                    @foreach ($event as $event)
                        <div class="col-md-4">
                            <div class="card">
                                <img src="{{ asset('storage/event/' . $event->photo) }}" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title text-uppercase">{{ $event->title }}</h5>
                                    <p class="card-text">{{ Str::limit(strip_tags($event->content), 100) }}</p>
                                    <a href="{{ route('admin.registration.detail', $event->id) }}" class="btn btn-primary">Lihat
                                        Pendaftar</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
