@extends('layouts.app')

@section('active_quiz', 'active-page')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h3>Edit Quiz</h3>
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{ route('admin.quiz.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-3">
                                <input type="hidden" name="id" value="{{ $quiz->id }}">
                                <label for="">Title</label>
                                <input type="text" class="form-control" name="title" value="{{ $quiz->title }}" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Description</label>
                                <textarea name="description" id="editor" cols="30" rows="10" class="form-control" required style="overflow:scroll; max-height:300px">{{ $quiz->description }}</textarea>
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Status</label>
                                <select name="status" id="status" class="form-select">
                                    <option value="publish" {{ $quiz->status == 'publish' ? 'selected' : '' }}>Publish</option>
                                    <option value="draft" {{ $quiz->status == 'draft' ? 'selected' : '' }}>Draft</option>
                                </select>
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