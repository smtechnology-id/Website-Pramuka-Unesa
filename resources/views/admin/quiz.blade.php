@extends('layouts.app')

@section('active_quiz', 'active-page')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h3>Data Quiz</h3>
                <div class="row">
                    <div class="col-12">
                        <a href="{{ route('admin.quiz.create') }}" class="btn btn-primary mb-3">Create Quiz</a>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Title</th>
                                        <th>Description </th>
                                        <th>Status</th>
                                        <th>Created At</th>
                                        <th>Total Question</th>
                                        <th>Participant</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($quizzes as $quiz)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $quiz->title }}</td>
                                            <td>{!! Str::words($quiz->description, 10) !!}</td>
                                            <td>@if ($quiz->status == 'publish')
                                                <span class="badge bg-success">Publish</span>
                                            @else
                                                <span class="badge bg-danger">Draft</span>
                                            @endif</td>
                                            <td>{{ $quiz->created_at }}</td>
                                            <td>
                                                {{ $questionCount->where('quiz_id', $quiz->id)->count() }} Question
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.quiz.participant', $quiz->slug) }}" class="btn btn-sm btn-info"> Participant</a>
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.quiz-add-question', $quiz->slug) }}" class="btn btn-sm btn-primary"><i class="material-icons">
                                                    visibility
                                                </i></a>
                                                <a href="{{ route('admin.quiz.edit', $quiz->slug) }}" class="btn btn-sm btn-warning"><i class="material-icons">
                                                    edit
                                                </i></a>
                                                <a href="{{ route('admin.quiz.destroy', $quiz->id) }}" class="btn btn-sm btn-danger"><i class="material-icons">
                                                    delete
                                                </i></a>
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