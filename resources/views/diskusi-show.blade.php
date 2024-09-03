@extends('layouts.landing')


@section('content')

<div class="container">
    <div class="card">
        <div class="card-body">

            @php

            $photo = $diskusi->user->photo;
            $photo = $photo ? asset('storage/user/' . $photo) : asset('images/user.jpg'); // Simplified photo assignment

            @endphp

            <h1 class="text-center mb-4">Diskusi</h1> <!-- Added margin-bottom for title -->

            <div class="diskusi-detail">

                <div class="post mb-4">

                    <div class="post-header d-flex justify-content-between align-items-center"> 
                        <img src="{{ $photo }}" alt="User Avatar" class="rounded-circle border border-primary" width="60" height="60"><!-- Flexbox for alignment -->


                        <h2 class="font-weight-bold">{{ $diskusi->user->name }}</h2>

                        <span class="text-muted">{{ $diskusi->created_at->format('d F Y') }}</span>
                    </div>


                    <p class="mt-2" style="font-size: 1.5rem">{{ $diskusi->content }}</p>
                </div>

            </div>
            <div class="card">
                <div class="card-body">
                    <h3>Komentar</h3>
                </div>
                <div class="form-komentar">
                    <form action="{{ route('comment-discussion.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <textarea name="content" id="" cols="30" rows="3" class="form-control" placeholder="Tulis komentar..." aria-label="Tulis komentar..." required></textarea>
                            <input type="hidden" name="discussion_id" value="{{ $diskusi->id }}">
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Kirim</button>
                    </form>
                </div>

                <div class="list-komentar">
                    <p class="text-center">Komentar</p>
                    @foreach ($comments as $comment)
                        <div class="komentar mb-3 p-3 border rounded">
                            <p class="font-weight-bold">{{ $comment->user->name }}:</p> <!-- Menampilkan nama pengguna -->
                            <p>{{ $comment->content }}</p>
                            <span class="text-muted">{{ $comment->created_at->format('d F Y H:i') }}</span> <!-- Menampilkan tanggal komentar -->
                        </div>
                    @endforeach
                </div>
            </div>


        </div>
    </div>


</div>

@endsection