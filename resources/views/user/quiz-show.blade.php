@extends('layouts.app')

@section('active_quiz', 'active-page')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-body text-center">
            <h3 class="mb-4">Quiz {{ $quiz->title }}</h3>
            <small style="float: left; font-size: 20px;" class="text-muted">Waktu Pengerjaan Anda : <span class="text-danger">{{ $usageTime }} Menit</span></small>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('user.quiz.submit') }}" method="post">
                    @csrf
                    <input type="hidden" name="quiz_id" value="{{ $quiz->id }}">
                    <input type="hidden" name="quiz_participant_id" value="{{ $participant->id }}">
                    @foreach ($questions as $item)
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">{!! $item->question !!}</h5>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="{{ $item->id }}" id="answer{{ $item->id }}_a" value="answer_a" required {{ $participantAnswer->where('question_id', $item->id)->where('answer', 'answer_a')->first() ? 'checked' : '' }}>
                                <label class="form-check-label" for="answer{{ $item->id }}_a">A. {{ $item->answer_a }}</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="{{ $item->id }}" id="answer{{ $item->id }}_b" value="answer_b" required {{ $participantAnswer->where('question_id', $item->id)->where('answer', 'answer_b')->first() ? 'checked' : '' }}>
                                <label class="form-check-label" for="answer{{ $item->id }}_b">B. {{ $item->answer_b }}</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="{{ $item->id }}" id="answer{{ $item->id }}_c" value="answer_c" required {{ $participantAnswer->where('question_id', $item->id)->where('answer', 'answer_c')->first() ? 'checked' : '' }}>
                                <label class="form-check-label" for="answer{{ $item->id }}_c">C. {{ $item->answer_c }}</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="{{ $item->id }}" id="answer{{ $item->id }}_d" value="D" required {{ $participantAnswer->where('question_id', $item->id)->where('answer', 'answer_d')->first() ? 'checked' : '' }}>
                                <label class="form-check-label" for="answer{{ $item->id }}_d">D. {{ $item->answer_d }}</label>
                            </div>
                            @if ($item->answer_e)
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="{{ $item->id }}" id="answer{{ $item->id }}_e" value="answer_e" required>
                                <label class="form-check-label" for="answer{{ $item->id }}_e">E. {{ $item->answer_e }}</label>
                            </div>
                            @endif
                        </div>
                    </div>
                    @endforeach
                    <button type="submit" class="btn btn-primary btn-block">Submit Answers</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
