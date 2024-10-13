@extends('layouts.landing')

@section('content')
<div class="container-fluid" style="padding: 0; margin:0;">
    <div class="banner" style="padding: 0; margin:0;">
        <div class="jumbotron jumbotron-fluid"
            style="background-image: url('{{ asset('images/1.jpg') }}'); background-size: cover; background-position: center; height: 300px; width: 100%; position: relative;">
            <div
                style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: linear-gradient(to top, rgba(255, 165, 0, 0.7), rgba(255, 255, 255, 0.7));">
            </div>
            <div class="container-fluid" style="position: relative; z-index: 1;">
                <h1 class="display-4" style="color: #175789;">Ranking</h1>
                <p class="lead " style="color: #175789;" font-weight: bold;>
                    Ranking Keaktifan Mahasiswa Pramuka Unesa
                </p>
            </div>
        </div>
    </div>
    {{-- Organisasi --}}
    <div class="container organisasi">
        <div class="row">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
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
                                <td>{{ $registrationEvent->where('user_id', $user->id)->count() }} <span
                                        class="text-muted">* 10</span></td>
                                <td>{{ $memberWork->where('user_id', $user->id)->count() }} <span class="text-muted">*
                                        10</span></td>
                                <td>{{ $quizParticipant->where('user_id', $user->id)->count() }} <span
                                        class="text-muted">* 10</span></td>
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
@endsection