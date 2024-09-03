@extends('layouts.app')

@section('active_lesson', 'active-page')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h3>Edit Materi</h3>
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{ route('admin.lesson.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="">Title</label>
                                <input type="text" class="form-control" name="title" required value="{{ $lesson->title }}">
                                <input type="hidden" class="form-control" name="id" required value="{{ $lesson->id }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Description</label>
                                <textarea type="text" id="editor" class="form-control" name="description" required>{{ $lesson->description }}</textarea>
                            </div>
                            <div class="form-group mb-3">
                                <label for="">File</label>
                                <input type="file" class="form-control" name="file">
                                <a href="{{ asset('storage/lesson/' . $lesson->file) }}" target="_blank" class="btn btn-outline-primary">Download Materi</a>
                            </div>
                            <div class="form-group mb-3">
                                <label for="">External Link</label>
                                <input type="text" class="form-control" name="external_link" required value="{{ $lesson->external_link }}">
                            </div>
                            <div class="form-group mb-3">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection