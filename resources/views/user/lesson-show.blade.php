@extends('layouts.app')

@section('active_lesson', 'active-page')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h3>{{ $lesson->title }}</h3>
                <p>{!! $lesson->description !!}</p>

                <hr>
                External Link : <a href="{{ $lesson->external_link }}" target="_blank">{{ $lesson->external_link }}</a>
                <hr>
                <a href="{{ asset('storage/lesson/' . $lesson->file) }}" target="_blank" class="btn btn-primary">Download Materi</a>
            </div>
        </div>
    </div>
@endsection