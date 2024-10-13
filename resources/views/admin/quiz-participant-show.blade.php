@extends('layouts.app')

@section('active_quiz', 'active-page')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h5>Informasi Participant</h5>
            <table class="table table-bordered">
                <tr>
                    <th>Name</th>
                    <td>{{ $participant->user->name }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ $participant->user->email }}</td>
                </tr>
                <tr>
                    <th>Score</th>
                    <td><span class="badge bg-success" style="font-size: 20px;">{{ $participant->score }} / {{ $questions->count() }}</span></td>
                </tr>
                
            </table>
        </div>
    </div>
    <div class="card">
        <div class="card-body text-center">
            <h3 class="mb-4">Quiz {{ $quiz->title }}</h3>
            {{-- <small style="float: left; font-size: 20px;" class="text-muted">Waktu Pengerjaan Anda : <span
                    class="text-danger">{{ $usageTime }} Menit</span></small> --}}
        </div>
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('user.quiz.submit') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <input type="hidden" name="quiz_id" value="{{ $quiz->id }}">
                        <input type="hidden" name="quiz_participant_id" value="{{ $participant->id }}">
                    </div>
                    @foreach ($questions as $item)
                    <div class="card mb-3">
                        <div class="card-body">
                            <hr>
                            <h5 class="card-title">{!! $item->question !!} 
                                @if ($participant->end_time)
                                    @if ($participantAnswer->where('question_id', $item->id)->first())
                                        @if ($participantAnswer->where('question_id', $item->id)->where('is_correct', 1)->first())
                                            <span class="badge bg-success" style="font-size: 20px;">
                                                @if ($item->correct_answer == 'answer_a')
                                                    A
                                                @elseif ($item->correct_answer == 'answer_b')
                                                    B
                                                @elseif ($item->correct_answer == 'answer_c')
                                                    C
                                                @elseif ($item->correct_answer == 'answer_d')
                                                    D
                                                @elseif ($item->correct_answer == 'answer_e')
                                                    E
                                                @endif
                                            </span>
                                        @else
                                            <span class="badge bg-danger" style="font-size: 20px;">
                                                @if ($item->correct_answer == 'answer_a')
                                                    A
                                                @elseif ($item->correct_answer == 'answer_b')
                                                    B
                                                @elseif ($item->correct_answer == 'answer_c')
                                                    C
                                                @elseif ($item->correct_answer == 'answer_d')
                                                    D
                                                @elseif ($item->correct_answer == 'answer_e')
                                                    E
                                                @endif
                                            </span>
                                        @endif
                                    @endif
                                @endif
                            </h5>
                            @if ($item->image)
                            <img src="{{ asset('storage/questions/' . $item->image) }}" alt="{{ $item->question }}" class="img-fluid" style="width: 50%; height: auto; margin: 0 auto; object-fit: cover;" >
                            @endif
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="{{ $item->id }}"
                                    id="answer{{ $item->id }}_a" value="answer_a" required {{
                                    $participantAnswer->where('question_id', $item->id)->where('answer',
                                'answer_a')->first() ? 'checked' : '' }} {{ $participant->end_time ? 'disabled' : '' }}>
                                <label class="form-check-label" for="answer{{ $item->id }}_a">A. {{ $item->answer_a
                                    }}</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="{{ $item->id }}"
                                    id="answer{{ $item->id }}_b" value="answer_b" required {{
                                    $participantAnswer->where('question_id', $item->id)->where('answer',
                                'answer_b')->first() ? 'checked' : '' }} {{ $participant->end_time ? 'disabled' : '' }}>
                                <label class="form-check-label" for="answer{{ $item->id }}_b">B. {{ $item->answer_b
                                    }}</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="{{ $item->id }}"
                                    id="answer{{ $item->id }}_c" value="answer_c" required {{
                                    $participantAnswer->where('question_id', $item->id)->where('answer',
                                'answer_c')->first() ? 'checked' : '' }} {{ $participant->end_time ? 'disabled' : '' }}>
                                <label class="form-check-label" for="answer{{ $item->id }}_c">C. {{ $item->answer_c
                                    }}</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="{{ $item->id }}"
                                    id="answer{{ $item->id }}_d" value="D" required {{
                                    $participantAnswer->where('question_id', $item->id)->where('answer',
                                'answer_d')->first() ? 'checked' : '' }} {{ $participant->end_time ? 'disabled' : '' }}>
                                <label class="form-check-label" for="answer{{ $item->id }}_d">D. {{ $item->answer_d
                                    }}</label>
                            </div>
                            @if ($item->answer_e)
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="{{ $item->id }}"
                                    id="answer{{ $item->id }}_e" value="answer_e" required {{
                                    $participantAnswer->where('question_id', $item->id)->where('answer',
                                'answer_e')->first() ? 'checked' : '' }} {{ $participant->end_time ? 'disabled' : '' }}>
                                <label class="form-check-label" for="answer{{ $item->id }}_e">E. {{ $item->answer_e
                                    }}</label>
                            </div>
                            <hr>
                            @endif
                        </div>
                    </div>
                    @endforeach
                    @if ($participant->end_time == null)
                    <button type="submit" class="btn btn-primary btn-block">Submit Answers</button>
                    @endif
                </form>
            </div>
        </div>
    </div>
</div>
@endsection