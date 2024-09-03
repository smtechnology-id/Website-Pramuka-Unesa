@extends('layouts.app')

@section('active_lesson', 'active-page')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h3>Materi</h3>

                <div class="row">
                    @foreach ($lesson as $new)
                        <div class="col-md-4"> <!-- Changed from col-md-6 to col-md-4 for better layout -->
                            <div class="card mb-3"> <!-- Added margin-bottom for spacing -->
                                <div class="card-body">
                                    <h5>{{ $new->title }}</h5>
                                    <p>By Admin</p>
                                    <p>{!! Str::limit($new->description, 100) !!}</p>
                                    <a href="{{ route('user.lesson.show', $new->id) }}" target="_blank" class="btn btn-primary">Detail Materi</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection