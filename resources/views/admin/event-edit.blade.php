@extends('layouts.app')

@section('active_event', 'active-page')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h3>Edit Event</h3>
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{ route('admin.event.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $event->id }}">
                            <div class="form-group mb-3">
                                <label for="">Photo Featured</label>
                                <input type="file" class="form-control" name="photo" accept="image/*">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Title</label>
                                <input type="text" class="form-control" name="title" required value="{{ $event->title }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Content</label>
                                <textarea name="content" id="editor" cols="30" rows="10" class="form-control" required style="overflow:scroll; max-height:300px">{{ $event->content }}</textarea>
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Author</label>
                                <input type="text" class="form-control" name="author" required value="{{ $event->author }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Status</label>
                                <select name="status" id="" class="form-control">
                                    <option value="active" {{ $event->status == 'active' ? 'selected' : '' }}>Active</option>
                                    <option value="draft" {{ $event->status == 'draft' ? 'selected' : '' }}>Draft</option>
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