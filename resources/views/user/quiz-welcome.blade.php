@extends('layouts.app')

@section('active_quiz', 'active-page')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-body text-center">
            @if ($status == '0')
            <img src="{{ asset('assets/images/quiz.png') }}" alt="Quiz" style="width: 500px; height: 300px; object-fit: cover;">
            <h3>Selamat Datang di Quiz {{ $quiz->title }}</h3>
            <small class="text-muted">Dibuat pada {{ $quiz->created_at->format('d F Y') }}</small>
            <p>{!! $quiz->description !!}</p>
            <a href="{{ route('user.quiz.show', $quiz->slug) }}" class="btn btn-primary">Mulai Quiz</a>
            @else
            <img src="{{ asset('assets/images/quiz.png') }}" alt="Quiz" style="width: 500px; height: 300px; object-fit: cover;">
            <h3>Anda Sudah Mengerjakan Quiz {{ $quiz->title }}</h3>
            <small class="text-muted">Dibuat pada {{ $quiz->created_at->format('d F Y') }}</small>
            <p>Score Anda : {{ $participant->score }}</p>
            <a href="{{ route('user.quiz.show', $quiz->slug) }}" class="btn btn-primary">Lihat Hasil</a>
            @endif
        </div>
    </div>
</div>
@endsection

