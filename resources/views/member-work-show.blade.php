@extends('layouts.landing')

@section('content')
<div class="container-fluid" style="padding: 0; margin:0;">
    <div class="banner" style="padding: 0; margin:0;">
        <div class="jumbotron jumbotron-fluid"
            style="background-image: url('{{ asset('storage/member-work/' . $memberWork->photo) }}'); background-size: cover; background-position: center; height: 300px; width: 100%; position: relative;">
            <div style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background-color: rgba(0, 0, 0, 0.5);"></div> <!-- Overlay hitam -->
            <div class="container-fluid" style="position: relative; z-index: 1;">
                <h1 class="display-4" style="color: white;">Karya Anggota</h1>
                <p class="lead text-white">
                    {{ $memberWork->title }}
                </p>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container">
            <div class="row">
                
                <div class="col-md-8">
                    <h1>{{ $memberWork->title }}</h1>
                    <p>Author: {{ $memberWork->user->name }} | {{ $memberWork->created_at->format('d F Y') }}</p>
                    <img src="{{ asset('storage/member-work/' . $memberWork->photo) }}" alt="{{ $memberWork->title }}" style="width: 100%; height: 500px; margin-top: 20px; margin-bottom: 20px;">
                    <p>{!! $memberWork->content !!}</p>
                </div>
                <div class="col-md-4">
                    {{-- Rekomendasi Lainnya --}}
                    <h4>Rekomendasi Lainnya</h4>
                    @foreach ($memberWorks as $item)
                    <div class="card mb-4">
                        <div class="card-body">
                             <h5><a href="{{ route('member-work.show', $item->slug) }}">{{ $item->title }}</a></h5>
                            <p>{{ $item->user->name }} | {{ $item->created_at->format('d F Y') }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    {{-- Komentar --}}
    <div class="komentar">
        <div class="container">
            <h3>Komentar</h3>
            <div class="row">
                <div class="col-md-6">
                    @foreach ($comments as $comment)
                    <div class="border p-3 rounded bg-light">
                        <p><strong>{{ $comment->user->name }}</strong></p>
                        <p><em>{{ $comment->user->email }}</em></p>
                        <p>{!! $comment->content !!}</p>
                    </div>
                    @endforeach
                </div>
                <div class="col-md-6">
                    <h4>Tambah Komentar</h4>
                    @if (Auth::check())
                    <form action="{{ route('comment-member-work.store') }}" method="post" class="bg-light p-4 rounded shadow-sm">
                        @csrf
                        <input type="hidden" name="member_work_id" value="{{ $memberWork->id }}">
                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input type="text" class="form-control" name="name" required placeholder="Masukkan nama Anda" value="{{ Auth::user()->name }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" required placeholder="Masukkan email Anda" value="{{ Auth::user()->email }}" readonly>
                        </div>
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        <div class="form-group">
                            <label for="komentar">Komentar</label>
                            <textarea class="form-control" name="content" required rows="3" placeholder="Tulis komentar Anda di sini"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Kirim</button>
                    </form>
                    @else
                    <p>Silahkan <a href="{{ route('login') }}">Login</a> untuk berkomentar</p>
                    @endif
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection