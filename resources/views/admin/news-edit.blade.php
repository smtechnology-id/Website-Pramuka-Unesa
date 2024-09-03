@extends('layouts.app')

@section('active_news', 'active-page')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h3>Edit News</h3>
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{ route('admin.news.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $news->id }}">
                            <div class="form-group mb-3">
                                <label for="">Photo Featured</label>
                                <input type="file" class="form-control" name="photo" accept="image/*">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Title</label>
                                <input type="text" class="form-control" name="title" value="{{ $news->title }}" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Content</label>
                                <textarea name="content" id="editor" cols="30" rows="10" class="form-control" required style="overflow:scroll; max-height:300px">{{ $news->content }}</textarea>
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Author</label>
                                <input type="text" class="form-control" name="author" value="{{ $news->author }}" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Status</label>
                                <select name="status" id="" class="form-control">
                                    <option value="active" {{ $news->status == 'active' ? 'selected' : '' }}>Active</option>
                                    <option value="draft" {{ $news->status == 'draft' ? 'selected' : '' }}>Draft</option>
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection