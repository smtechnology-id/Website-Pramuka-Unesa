@extends('layouts.app')

@section('active_quiz', 'active-page')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h3>Participant Quiz {{ $quiz->title }}</h3>
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Score</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($participants as $participant)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $participant->user->name }}</td>
                                            <td>{{ $participant->user->email }}</td>
                                            <td>{{ $participant->score }} / {{ $questions }}</td>
                                            <td>
                                                <a href="{{ route('admin.quiz-participant-show', [$quiz->slug, $participant->id]) }}" class="btn btn-sm btn-info">Show</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection