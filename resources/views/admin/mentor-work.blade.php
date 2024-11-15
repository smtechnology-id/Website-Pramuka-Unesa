@extends('layouts.app')

@section('active_mentor_work', 'active-page')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h3>Karya Pembina</h3>
            
            <div class="table-responsive">
                <table class="table table-borderless">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Photo</th>
                            <th>Title</th>
                            <th>Nama Pembina</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($mentorWork as $mentor)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><img src="{{ asset('storage/mentor-work/' . $mentor->photo) }}" alt="" width="150"></td>
                            <td>{{ $mentor->title }}</td>
                            <td>{{ $mentor->user->name }}</td>
                            <td>{{ $mentor->created_at->format('d F Y') }}</td>
                            <td>@if ($mentor->status == 'active')
                                <span class="badge bg-success">Active</span>
                                @else
                                <span class="badge bg-secondary" style="color: rgb(41, 38, 38)">Draft</span>
                                @endif
                            </td>
                            <td>
                                <a target="_blank" href="{{ route('mentor-work.show', $mentor->slug) }}"
                                    class="btn btn-primary">Preview</a>
                                <a href="{{ route('admin.mentor-work.approve', $mentor->slug) }}"
                                    class="btn btn-success">Approve</a>
                                <a href="{{ route('admin.mentor-work.reject', $mentor->slug) }}"
                                    class="btn btn-danger">Reject</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection