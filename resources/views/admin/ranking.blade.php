@extends('layouts.app')

@section('active_ranking', 'active-page')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h3>Ranking</h3>
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Jumlah Event Yang diikuti</th>
                                        <th>Jumlah Karya Yang Diupload</th>
                                        <th>Jumlah Quiz Yang Diikuti</th>
                                        <th>Total Score Quiz</th>
                                        <th>Score</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($usersNew as $user)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $registrationEvent->where('user_id', $user->id)->count() }} <span class="text-muted">* 10</span></td>
                                            <td>{{ $memberWork->where('user_id', $user->id)->count() }} <span class="text-muted">* 10</span></td>
                                            <td>{{ $quizParticipant->where('user_id', $user->id)->count() }} <span class="text-muted">* 10</span></td>
                                            <td>{{ $quizParticipant->where('user_id', $user->id)->sum('score') }}</td>
                                            <td>{{ $scoreUser[$user->id] }}</td>
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