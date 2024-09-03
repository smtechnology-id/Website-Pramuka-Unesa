@extends('layouts.app')

@section('active_registration', 'active-page')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h3 class="mb-3">Data Pendaftar - {{ $event->title }}</h3>
                <div class="table-responsive">
                    <table class="table table-borderless">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>NIM</th>
                                <th>Tempat Tanggal Lahir</th>
                                <th>Motivasi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($registration as $reg)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $reg->user->name }}</td>
                                    <td>{{ $reg->user->nim }}</td>
                                    <td>{{ $reg->user->birth_place }}, {{ $reg->user->birth_date }}</td>
                                    <td>{{ $reg->motivation }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection