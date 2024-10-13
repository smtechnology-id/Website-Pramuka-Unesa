@extends('layouts.app')

@section('active_lesson', 'active-page')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h3 class="mb-3">Materi</h3>

                <a href="{{ route('admin.lesson.create') }}" class="btn btn-primary mb-3">Create</a>
                <div class="table-responsive">
                    <table class="table table-borderless">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>File</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($lesson as $new)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $new->title }}</td>
                                    <td>{!! Str::limit($new->description, 100) !!}</td>
                                    <td><a href="{{ asset('storage/lesson/' . $new->file) }}" target="_blank" class="btn btn-outline-primary">Download Image</a></td>
                                    <td>{{ $new->created_at->format('d F Y') }}</td>
                                    <td>
                                        <a href="{{ route('admin.lesson.edit', $new->id) }}" class="btn btn-primary">Edit</a>
                                        <a href="{{ route('admin.lesson.destroy', $new->id) }}" class="btn btn-danger">Delete</a>
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