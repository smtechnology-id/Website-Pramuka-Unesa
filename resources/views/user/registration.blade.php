@extends('layouts.app')

@section('active_registration', 'active-page')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h3>Riwayat Pendaftaran Event</h3>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Event</th>
                            <th>Tanggal Pendaftaran</th>
                            <th>Motivasi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($registrations as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->event->title }}</td>
                                <td>{{ $item->created_at->format('d F Y H:i') }}</td>
                                <td>{{ $item->motivation }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
        </div>
    </div>
@endsection