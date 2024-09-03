@extends('layouts.app')

@section('active_member_work', 'active-page')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h3>Karya Anggota</h3>
                <a href="{{ route('user.member-work.create') }}" class="btn btn-primary">Create</a>
                <div class="table-responsive">
                    <table class="table table-borderless">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Photo</th>
                                <th>Title</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($memberWorks as $member)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td><img src="{{ asset('storage/member-work/' . $member->photo) }}" alt="" width="150"></td>
                                    <td>{{ $member->title }}</td>
                                    <td>{{ $member->created_at->format('d F Y') }}</td>
                                    <td>@if ($member->status == 'active')
                                        <span class="badge bg-success">Active</span>
                                    @else
                                        <span class="badge bg-secondary" style="color: rgb(41, 38, 38)">Draft</span>
                                    @endif</td>
                                    <td>
                                        <a href="{{ route('user.member-work.edit', $member->id) }}" class="btn btn-primary">Edit</a>
                                        <a href="{{ route('user.member-work.destroy', $member->id) }}" class="btn btn-danger">Delete</a>
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