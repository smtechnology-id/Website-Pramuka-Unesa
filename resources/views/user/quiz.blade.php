@extends('layouts.app')

@section('active_quiz', 'active-page')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h3>Quiz</h3>
            <div class="row">
                @foreach ($quizzes as $item)
                <div class="col-md-12 mb-4">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->title }} <span class="badge bg-primary">{{ $participants->where('quiz_id', $item->id)->count() }} Peserta</span></h5>
                            <small class="text-muted">Dibuat pada {{ $item->created_at->format('d F Y') }}</small>
                            <p class="card-text">{!! $item->description !!}</p>
                            <a href="{{ route('user.quiz.welcome', $item->slug) }}" class="btn btn-primary">Mulai Quiz</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
