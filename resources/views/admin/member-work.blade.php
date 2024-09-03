@extends('layouts.app')

@section('active_member_work', 'active-page')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h3>Karya Anggota</h3>
                <div class="table-responsive">
                    <table class="table table-borderless">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Photo</th>
                                <th>Title</th>
                                <th>Nama Anggota</th>
                                <th>Created At</th>
                                <th>Status</th>
                                <th>Preview</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($memberWork as $member)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td><img src="{{ asset('storage/member-work/' . $member->photo) }}" alt="" width="150"></td>
                                    <td>{{ $member->title }}</td>
                                    <td>{{ $member->user->name }}</td>
                                    <td>{{ $member->created_at->format('d F Y') }}</td>
                                    <td>@if ($member->status == 'active')
                                        <span class="badge bg-success">Active</span>
                                    @else
                                        <span class="badge bg-secondary" style="color: rgb(41, 38, 38)">Draft</span>
                                    @endif</td>
                                    <td>
                                        <a href="{{ route('member-work.show', $member->slug) }}" target="_blank" class="btn btn-outline-secondary">Preview</a>
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.member-work.approve', $member->id) }}" class="btn btn-primary">Approve</a>
                                        <a href="{{ route('admin.member-work.rejected', $member->id) }}" class="btn btn-warning">Rejected</a>
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