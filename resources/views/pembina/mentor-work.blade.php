@extends('layouts.app')

@section('active_mentor_work', 'active-page')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h3>Karya Pembina</h3>
                <a href="{{ route('pembina.mentor-work.create') }}" class="btn btn-primary">Create</a>
                <div class="table-responsive">
                    <table class="table table-borderless" id="datatable1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Photo</th>
                                <th>Title</th>
                                <th>Nama Pembina</th>
                                <th>Created At</th>
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
                                    @endif</td>
                                    <td>
                                        <a href="{{ route('pembina.mentor-work.edit', $mentor->id) }}" class="btn btn-primary">Edit</a>
                                        <a href="{{ route('pembina.mentor-work.destroy', $mentor->id) }}" class="btn btn-danger">Delete</a>
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