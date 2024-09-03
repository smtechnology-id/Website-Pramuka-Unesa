@extends('layouts.app')

@section('active_event', 'active-page')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h3 class="mb-3">Event</h3>

                <a href="{{ route('admin.event.create') }}" class="btn btn-primary mb-3">Create</a>
                <div class="table-responsive">
                    <table class="table table-borderless">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Photo</th>
                                <th>Title</th>
                                <th>Author</th>
                                <th>Created At</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($event as $new)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td><img src="{{ asset('storage/event/' . $new->photo) }}" alt="" width="150"></td>
                                    <td>{{ $new->title }}</td>
                                    <td>{{ $new->author }}</td>
                                    <td>{{ $new->created_at->format('d F Y') }}</td>
                                    <td>@if ($new->status == 'active')
                                        <span class="badge bg-success">Active</span>
                                    @else
                                        <span class="badge bg-secondary" style="color: rgb(41, 38, 38)">Draft</span>
                                    @endif</td>
                                    <td>
                                        <a href="{{ route('admin.event.edit', $new->id) }}" class="btn btn-primary">Edit</a>
                                        <a href="{{ route('admin.event.destroy', $new->id) }}" class="btn btn-danger">Delete</a>
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