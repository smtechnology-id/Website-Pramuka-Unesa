@extends('layouts.landing')


@section('content')
    <div class="container">
        <h1 class="text-center mb-4">Diskusi</h1> <!-- Centered title with margin -->

        <!-- Form untuk memposting topik diskusi -->
        @if (Auth::check())
            <form action="{{ route('diskusi.store') }}" method="POST" class="mb-4"> <!-- Added margin bottom -->
                @csrf
                <div class="form-group">
                    <textarea name="content" id="" cols="30" rows="3" class="form-control" placeholder="Tulis Diskusi..." aria-label="Tulis Diskusi..." required></textarea>
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                </div>
                <button type="submit" class="btn btn-primary">Posting</button>
            </form>
        @endif

        <hr>

        <!-- Daftar topik diskusi -->
        <div class="diskusi-list">
            @foreach ($diskusi as $item)
                <div class="diskusi-item mb-4 p-4 border border-light rounded shadow-sm">
                    <div class="d-flex align-items-center mb-3">
                        @php
                            $photo = $item->user->photo;
                            if ($photo != null) {
                                $photo = asset('storage/user/' . $photo);
                            } else {
                                $photo = asset('images/user.jpg');
                            }
                        @endphp
                        <img src="{{$photo}}" alt="User Avatar" class="rounded-circle border border-primary" width="60" height="60"> <!-- Increased size and added border -->
                        <h3 class="ml-3 text-primary font-weight-bold">{{ $item->user->name }}</h3> <!-- Changed text color and weight -->
                    </div>
                    <p class="text-muted mb-2">Posted on {{ $item->created_at->format('d F Y') }}</p>
                    <p class="font-weight-bold text-dark">{{ $item->content }}</p> <!-- Changed text color -->
                    <a href="{{ route('diskusi.show', $item->id) }}" class="btn btn-outline-primary mt-2">Lihat Diskusi</a> <!-- Changed button style -->
                </div>
            @endforeach
        </div>
    </div>
@endsection
